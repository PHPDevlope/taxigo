<div>
    <div wire:loading.delay>
        Loading...
    </div>
    <div class="row card bg-white">
        <div class="row align-items-center pt-4">
            <div class="col-md-1 col-12 mb-3 mb-md-0">
                <select wire:model="perPage" class="form-select">
                    @foreach($paginationOptions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 col-12 mb-3 mb-md-0">
                @can('user_delete')
                    <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                        {{ __('Delete Selected') }}
                    </button>
                @endcan
            </div>

            <div class="col-md-6 col-12 text-end">
                <div class="mx-n1">
                    <input type="text" wire:model.debounce.300ms="search" placeholder="Search" class="btn d-inline-flex btn-sm btn-neutral border-base"/>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-spaced">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.user') }}
                                @include('components.table.sort', ['field' => 'user.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.logo') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.docs') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.name') }}
                                @include('components.table.sort', ['field' => 'name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.address') }}
                                @include('components.table.sort', ['field' => 'address'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.commission_type') }}
                                @include('components.table.sort', ['field' => 'commission_type'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.commission_value') }}
                                @include('components.table.sort', ['field' => 'commission_value'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.company.fields.status') }}
                                @include('components.table.sort', ['field' => 'status'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $company->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $company->id }}
                                </td>
                                <td>
                                    @if($company->user)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bi bi-success"></i>
                                            {{ $company->user->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($company->logo as $key => $entry)
                                        <a class="link-photo" href="{{ $entry['url'] }}">
                                            <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($company->docs as $key => $entry)
                                        <a class="link-light-blue" href="{{ $entry['url'] }}">
                                            <i class="far fa-file">
                                            </i>
                                            {{ $entry['file_name'] }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $company->name }}
                                </td>
                                <td>
                                    {{ $company->address }}
                                </td>
                                <td>
                                    {{ $company->commission_type_label }}
                                </td>
                                <td>
                                    {{ $company->commission_value }}
                                </td>
                                <td>
                                    {{ $company->status_label }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('company_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.companies.show', $company) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('company_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.companies.edit', $company) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('company_delete')
                                            <button class="btn btn-sm btn-neutral btn-square text-danger-hover" type="button" wire:click="confirm('delete', {{ $company->id }})" wire:loading.attr="disabled">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11">No entries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $companies->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush
