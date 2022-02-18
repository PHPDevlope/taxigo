<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('request_history_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="RequestHistory" format="csv" />
                <livewire:excel-export model="RequestHistory" format="xlsx" />
                <livewire:excel-export model="RequestHistory" format="pdf" />
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
                            {{ trans('cruds.requestHistory.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.user_name') }}
                            @include('components.table.sort', ['field' => 'user_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.provider_name') }}
                            @include('components.table.sort', ['field' => 'provider_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.total_distance') }}
                            @include('components.table.sort', ['field' => 'total_distance'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.ride_start_time') }}
                            @include('components.table.sort', ['field' => 'ride_start_time'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.ride_end_time') }}
                            @include('components.table.sort', ['field' => 'ride_end_time'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.otp') }}
                            @include('components.table.sort', ['field' => 'otp'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.pickup_address') }}
                            @include('components.table.sort', ['field' => 'pickup_address'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.drop_address') }}
                            @include('components.table.sort', ['field' => 'drop_address'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.base_price') }}
                            @include('components.table.sort', ['field' => 'base_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.distance_price') }}
                            @include('components.table.sort', ['field' => 'distance_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.discount_price') }}
                            @include('components.table.sort', ['field' => 'discount_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.eta_discount_price') }}
                            @include('components.table.sort', ['field' => 'eta_discount_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.tax_price') }}
                            @include('components.table.sort', ['field' => 'tax_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.surge_price') }}
                            @include('components.table.sort', ['field' => 'surge_price'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.total_amount') }}
                            @include('components.table.sort', ['field' => 'total_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.coupon_deduction') }}
                            @include('components.table.sort', ['field' => 'coupon_deduction'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.coupon') }}
                            @include('components.table.sort', ['field' => 'coupon.promocode'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.paid_amount') }}
                            @include('components.table.sort', ['field' => 'paid_amount'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.provider_earnings') }}
                            @include('components.table.sort', ['field' => 'provider_earnings'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.provider_admin_commission') }}
                            @include('components.table.sort', ['field' => 'provider_admin_commission'])
                        </th>
                        <th>
                            {{ trans('cruds.requestHistory.fields.ride_status') }}
                            @include('components.table.sort', ['field' => 'ride_status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requestHistories as $requestHistory)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $requestHistory->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $requestHistory->id }}
                            </td>
                            <td>
                                @if($requestHistory->userName)
                                    <span class="badge badge-relationship">{{ $requestHistory->userName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($requestHistory->providerName)
                                    <span class="badge badge-relationship">{{ $requestHistory->providerName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $requestHistory->total_distance }}
                            </td>
                            <td>
                                {{ $requestHistory->ride_start_time }}
                            </td>
                            <td>
                                {{ $requestHistory->ride_end_time }}
                            </td>
                            <td>
                                {{ $requestHistory->otp }}
                            </td>
                            <td>
                                {{ $requestHistory->pickup_address }}
                            </td>
                            <td>
                                {{ $requestHistory->drop_address }}
                            </td>
                            <td>
                                {{ $requestHistory->base_price }}
                            </td>
                            <td>
                                {{ $requestHistory->distance_price }}
                            </td>
                            <td>
                                {{ $requestHistory->discount_price }}
                            </td>
                            <td>
                                {{ $requestHistory->eta_discount_price }}
                            </td>
                            <td>
                                {{ $requestHistory->tax_price }}
                            </td>
                            <td>
                                {{ $requestHistory->surge_price }}
                            </td>
                            <td>
                                {{ $requestHistory->total_amount }}
                            </td>
                            <td>
                                {{ $requestHistory->coupon_deduction }}
                            </td>
                            <td>
                                @if($requestHistory->coupon)
                                    <span class="badge badge-relationship">{{ $requestHistory->coupon->promocode ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $requestHistory->paid_amount }}
                            </td>
                            <td>
                                {{ $requestHistory->provider_earnings }}
                            </td>
                            <td>
                                {{ $requestHistory->provider_admin_commission }}
                            </td>
                            <td>
                                {{ $requestHistory->ride_status_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('request_history_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.request-histories.show', $requestHistory) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('request_history_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.request-histories.edit', $requestHistory) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('request_history_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $requestHistory->id }})" wire:loading.attr="disabled">
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
            {{ $requestHistories->links() }}
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