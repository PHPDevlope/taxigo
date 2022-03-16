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
                                {{ trans('cruds.requestHistory.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.user_name') }}
                                @include('components.table.sort', ['field' => 'user_name.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.provider_name') }}
                                @include('components.table.sort', ['field' => 'provider_name.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.total_amount') }}
                                @include('components.table.sort', ['field' => 'total_amount'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.coupon_deduction') }}
                                @include('components.table.sort', ['field' => 'coupon_deduction'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.coupon') }}
                                @include('components.table.sort', ['field' => 'coupon.promocode'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.requestHistory.fields.ride_status') }}
                                @include('components.table.sort', ['field' => 'ride_status'])
                            </th>
                            <th scope="col">
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
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $requestHistory->userName->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($requestHistory->providerName)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $requestHistory->providerName->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $requestHistory->total_amount }}
                                </td>
                                <td>
                                    {{ $requestHistory->coupon_deduction }}
                                </td>
                                <td>
                                    @if($requestHistory->coupon)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $requestHistory->coupon->promocode ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $requestHistory->ride_status_label }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('request_history_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.request-histories.show', $requestHistory) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('request_history_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.request-histories.edit', $requestHistory) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('request_history_delete')
                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $requestHistory->id }})" wire:loading.attr="disabled">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="24">No entries found.</td>
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
