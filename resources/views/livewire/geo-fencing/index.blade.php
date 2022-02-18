<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('geo_fencing_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="GeoFencing" format="csv" />
                <livewire:excel-export model="GeoFencing" format="xlsx" />
                <livewire:excel-export model="GeoFencing" format="pdf" />
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
                            {{ trans('cruds.geoFencing.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.city_name') }}
                            @include('components.table.sort', ['field' => 'city_name'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.distance') }}
                            @include('components.table.sort', ['field' => 'distance'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.distance_price') }}
                            @include('components.table.sort', ['field' => 'distance_price'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.city_limits') }}
                            @include('components.table.sort', ['field' => 'city_limits'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.minute_price') }}
                            @include('components.table.sort', ['field' => 'minute_price'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.pricing_logic') }}
                            @include('components.table.sort', ['field' => 'pricing_logic'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.hour_price') }}
                            @include('components.table.sort', ['field' => 'hour_price'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.base_price') }}
                            @include('components.table.sort', ['field' => 'base_price'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.base_distance') }}
                            @include('components.table.sort', ['field' => 'base_distance'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.unit_time_pricing') }}
                            @include('components.table.sort', ['field' => 'unit_time_pricing'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.unit_distance_price') }}
                            @include('components.table.sort', ['field' => 'unit_distance_price'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.seat_capacity') }}
                            @include('components.table.sort', ['field' => 'seat_capacity'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.waive_off_minutes') }}
                            @include('components.table.sort', ['field' => 'waive_off_minutes'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.per_minute_fare') }}
                            @include('components.table.sort', ['field' => 'per_minute_fare'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.night_fare') }}
                            @include('components.table.sort', ['field' => 'night_fare'])
                        </th>
                        <th>
                            {{ trans('cruds.geoFencing.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($geoFencings as $geoFencing)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $geoFencing->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $geoFencing->id }}
                            </td>
                            <td>
                                {{ $geoFencing->city_name }}
                            </td>
                            <td>
                                {{ $geoFencing->distance }}
                            </td>
                            <td>
                                {{ $geoFencing->distance_price }}
                            </td>
                            <td>
                                {{ $geoFencing->city_limits }}
                            </td>
                            <td>
                                {{ $geoFencing->minute_price }}
                            </td>
                            <td>
                                {{ $geoFencing->pricing_logic_label }}
                            </td>
                            <td>
                                {{ $geoFencing->hour_price }}
                            </td>
                            <td>
                                {{ $geoFencing->base_price }}
                            </td>
                            <td>
                                {{ $geoFencing->base_distance }}
                            </td>
                            <td>
                                {{ $geoFencing->unit_time_pricing }}
                            </td>
                            <td>
                                {{ $geoFencing->unit_distance_price }}
                            </td>
                            <td>
                                {{ $geoFencing->seat_capacity }}
                            </td>
                            <td>
                                {{ $geoFencing->waive_off_minutes }}
                            </td>
                            <td>
                                {{ $geoFencing->per_minute_fare }}
                            </td>
                            <td>
                                {{ $geoFencing->night_fare }}
                            </td>
                            <td>
                                {{ $geoFencing->status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('geo_fencing_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.geo-fencings.show', $geoFencing) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('geo_fencing_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.geo-fencings.edit', $geoFencing) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('geo_fencing_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $geoFencing->id }})" wire:loading.attr="disabled">
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
            {{ $geoFencings->links() }}
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