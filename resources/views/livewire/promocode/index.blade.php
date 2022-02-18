<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('promocode_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Promocode" format="csv" />
                <livewire:excel-export model="Promocode" format="xlsx" />
                <livewire:excel-export model="Promocode" format="pdf" />
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
                            {{ trans('cruds.promocode.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.promocode') }}
                            @include('components.table.sort', ['field' => 'promocode'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.discount') }}
                            @include('components.table.sort', ['field' => 'discount'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.promocodes_use') }}
                            @include('components.table.sort', ['field' => 'promocodes_use'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.use_count') }}
                            @include('components.table.sort', ['field' => 'use_count'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.from_date') }}
                            @include('components.table.sort', ['field' => 'from_date'])
                        </th>
                        <th>
                            {{ trans('cruds.promocode.fields.expiration') }}
                            @include('components.table.sort', ['field' => 'expiration'])
                        </th>
                        <th>
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
                            <td>
                                <div class="flex justify-end">
                                    @can('promocode_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.promocodes.show', $promocode) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('promocode_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.promocodes.edit', $promocode) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('promocode_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $promocode->id }})" wire:loading.attr="disabled">
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