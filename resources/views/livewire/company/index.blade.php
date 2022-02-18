<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('company_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Company" format="csv" />
                <livewire:excel-export model="Company" format="xlsx" />
                <livewire:excel-export model="Company" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.company.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.docs') }}
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.commission_type') }}
                            @include('components.table.sort', ['field' => 'commission_type'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.commission_value') }}
                            @include('components.table.sort', ['field' => 'commission_value'])
                        </th>
                        <th>
                            {{ trans('cruds.company.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
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
                                    <span class="badge badge-relationship">{{ $company->user->name ?? '' }}</span>
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
                            <td>
                                <div class="flex justify-end">
                                    @can('company_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.companies.show', $company) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('company_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.companies.edit', $company) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('company_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $company->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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