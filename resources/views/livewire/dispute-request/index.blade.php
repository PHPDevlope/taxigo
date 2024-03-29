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
                                {{ trans('cruds.disputeRequest.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.disputeRequest.fields.user_provider') }}
                                @include('components.table.sort', ['field' => 'user_provider'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.disputeRequest.fields.request_detail') }}
                                @include('components.table.sort', ['field' => 'request_detail'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.disputeRequest.fields.dispute') }}
                                @include('components.table.sort', ['field' => 'dispute.dispute_type'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.disputeRequest.fields.comment') }}
                                @include('components.table.sort', ['field' => 'comment'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.disputeRequest.fields.status') }}
                                @include('components.table.sort', ['field' => 'status'])
                            </th>
                            <th>
                                {{ trans('cruds.disputeRequest.fields.refund_amount') }}
                                @include('components.table.sort', ['field' => 'refund_amount'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($disputeRequests as $disputeRequest)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $disputeRequest->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $disputeRequest->id }}
                                </td>
                                <td>
                                    {{ $disputeRequest->user_provider }}
                                </td>
                                <td>
                                    {{ $disputeRequest->request_detail }}

                                </td>
                                <td>
                                    @if($disputeRequest->dispute->dispute_type)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $disputeRequest->dispute->dispute_type }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $disputeRequest->comment }}
                                </td>
                                <td>
                                    {{ $disputeRequest->status }}
                                </td>
                                <td>
                                    {{ $disputeRequest->refund_amount }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('dispute_request_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.dispute-requests.show', $disputeRequest) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('dispute_request_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.dispute-requests.edit', $disputeRequest) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('dispute_request_delete')
                                            <button class="btn btn-sm btn-neutral btn-square text-danger-hover" type="button" wire:click="confirm('delete', {{ $disputeRequest->id }})" wire:loading.attr="disabled">
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
            {{ $disputeRequests->links() }}
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
