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
                                {{ trans('cruds.serviceType.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.service_name') }}
                                @include('components.table.sort', ['field' => 'service_name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.service_maker_image') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.service_image') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.rental_per_hour') }}
                                @include('components.table.sort', ['field' => 'rental_per_hour'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.peak_time') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.night_fare') }}
                                @include('components.table.sort', ['field' => 'night_fare'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.geo_fencing') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.serviceType.fields.status') }}
                                @include('components.table.sort', ['field' => 'status'])
                            </th>
                            <th scope="col">
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
                                    {{ $serviceType->rental_per_hour }}
                                </td>
                                <td>
                                    @foreach($serviceType->peakTime as $key => $entry)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bi bi-success"></i>
                                            {{ $entry->peak_price }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $serviceType->night_fare }}
                                </td>
                                <td>
                                    @foreach($serviceType->geoFencing as $key => $entry)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bi bi-success"></i>
                                            {{ $entry->city_name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $serviceType->status_label }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('service_type_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.service-types.show', $serviceType) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('service_type_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.service-types.edit', $serviceType) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('service_type_delete')
                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $serviceType->id }})" wire:loading.attr="disabled">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="16">No entries found.</td>
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
