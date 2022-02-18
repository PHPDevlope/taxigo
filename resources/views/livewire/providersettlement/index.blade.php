<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('providersettlement_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Providersettlement" format="csv" />
                <livewire:excel-export model="Providersettlement" format="xlsx" />
                <livewire:excel-export model="Providersettlement" format="pdf" />
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
                            {{ trans('cruds.providersettlement.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.providersettlement.fields.provider_name') }}
                            @include('components.table.sort', ['field' => 'provider_name'])
                        </th>
                        <th>
                            {{ trans('cruds.providersettlement.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.providersettlement.fields.type') }}
                            @include('components.table.sort', ['field' => 'type'])
                        </th>
                        <th>
                            {{ trans('cruds.providersettlement.fields.send') }}
                            @include('components.table.sort', ['field' => 'send'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($providersettlements as $providersettlement)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $providersettlement->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $providersettlement->id }}
                            </td>
                            <td>
                                {{ $providersettlement->provider_name }}
                            </td>
                            <td>
                                {{ $providersettlement->amount }}
                            </td>
                            <td>
                                {{ $providersettlement->type_label }}
                            </td>
                            <td>
                                {{ $providersettlement->send_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('providersettlement_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.providersettlements.show', $providersettlement) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('providersettlement_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.providersettlements.edit', $providersettlement) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('providersettlement_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $providersettlement->id }})" wire:loading.attr="disabled">
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
            {{ $providersettlements->links() }}
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