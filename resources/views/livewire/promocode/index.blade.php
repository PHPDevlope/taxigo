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
                                {{ trans('cruds.promocode.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th>
                                {{ trans('cruds.promocode.fields.user_id') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.promocode') }}
                                @include('components.table.sort', ['field' => 'promocode'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.discount') }}
                                @include('components.table.sort', ['field' => 'discount'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.promocodes_use') }}
                                @include('components.table.sort', ['field' => 'promocodes_use'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.use_count') }}
                                @include('components.table.sort', ['field' => 'use_count'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.from_date') }}
                                @include('components.table.sort', ['field' => 'from_date'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.promocode.fields.expiration') }}
                                @include('components.table.sort', ['field' => 'expiration'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($promocodes as $promocode)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $promocode->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $promocode->id }}
                                </td>
                                <td>
                                    @if($promocode->user)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $promocode->user->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $promocode->promocode }}
                                </td>
                                <td>
                                    {{ $promocode->discount }}
                                </td>
                                <td>
                                    {{ $promocode->promocodes_use_label }}
                                </td>
                                <td>
                                    {{ $promocode->use_count }}
                                </td>
                                <td>
                                    {{ $promocode->from_date }}
                                </td>
                                <td>
                                    {{ $promocode->expiration }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('promocode_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.promocodes.show', $promocode) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('promocode_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.promocodes.edit', $promocode) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('promocode_delete')
                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $promocode->id }})" wire:loading.attr="disabled">
                                                <i class="bi bi-trash"></i>
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
            {{ $promocodes->links() }}
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
