<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('service_type_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ServiceType" format="csv" />
                <livewire:excel-export model="ServiceType" format="xlsx" />
                <livewire:excel-export model="ServiceType" format="pdf" />
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
                            {{ trans('cruds.serviceType.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.service_name') }}
                            @include('components.table.sort', ['field' => 'service_name'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.provider_name') }}
                            @include('components.table.sort', ['field' => 'provider_name'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.service_maker_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.service_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.outstation_oneway_price') }}
                            @include('components.table.sort', ['field' => 'outstation_oneway_price'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.outstation_roundtrip_price') }}
                            @include('components.table.sort', ['field' => 'outstation_roundtrip_price'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.driver_bata') }}
                            @include('components.table.sort', ['field' => 'driver_bata'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.rental_per_hour') }}
                            @include('components.table.sort', ['field' => 'rental_per_hour'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.peak_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.night_fare') }}
                            @include('components.table.sort', ['field' => 'night_fare'])
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.geo_fencing') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceType.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($serviceTypes as $serviceType)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $serviceType->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $serviceType->id }}
                            </td>
                            <td>
                                {{ $serviceType->service_name }}
                            </td>
                            <td>
                                {{ $serviceType->provider_name }}
                            </td>
                            <td>
                                @foreach($serviceType->service_maker_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($serviceType->service_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $serviceType->description }}
                            </td>
                            <td>
                                {{ $serviceType->outstation_oneway_price }}
                            </td>
                            <td>
                                {{ $serviceType->outstation_roundtrip_price }}
                            </td>
                            <td>
                                {{ $serviceType->driver_bata }}
                            </td>
                            <td>
                                {{ $serviceType->rental_per_hour }}
                            </td>
                            <td>
                                @foreach($serviceType->peakTime as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->peak_price }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $serviceType->night_fare }}
                            </td>
                            <td>
                                @foreach($serviceType->geoFencing as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->city_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $serviceType->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('service_type_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.service-types.show', $serviceType) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('service_type_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.service-types.edit', $serviceType) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('service_type_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $serviceType->id }})" wire:loading.attr="disabled">
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
            {{ $serviceTypes->links() }}
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