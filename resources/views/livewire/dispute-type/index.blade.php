<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('dispute_type_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="DisputeType" format="csv" />
                <livewire:excel-export model="DisputeType" format="xlsx" />
                <livewire:excel-export model="DisputeType" format="pdf" />
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
                            {{ trans('cruds.disputeType.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.disputeType.fields.dispute_type') }}
                            @include('components.table.sort', ['field' => 'dispute_type'])
                        </th>
                        <th>
                            {{ trans('cruds.disputeType.fields.dispute_issue') }}
                            @include('components.table.sort', ['field' => 'dispute_issue'])
                        </th>
                        <th>
                            {{ trans('cruds.disputeType.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($disputeTypes as $disputeType)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $disputeType->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $disputeType->id }}
                            </td>
                            <td>
                                {{ $disputeType->dispute_type_label }}
                            </td>
                            <td>
                                {{ $disputeType->dispute_issue }}
                            </td>
                            <td>
                                {{ $disputeType->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('dispute_type_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.dispute-types.show', $disputeType) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('dispute_type_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.dispute-types.edit', $disputeType) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('dispute_type_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $disputeType->id }})" wire:loading.attr="disabled">
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
            {{ $disputeTypes->links() }}
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