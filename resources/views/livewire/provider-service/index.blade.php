<div>
    <div wire:loading.delay>
        Loading...
    </div>
    <div class="row bg-white">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-spaced">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">
                            Service
                        </th>
                        <th scope="col">
                            Service Number
                        </th>
                        <th scope="col">
                            Service Model
                        </th>
                        <th scope="col">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($providerServices as $providerService)
                        <tr>
                            <td>
                                @if($providerService->serviceName)
                                    <span class="badge badge-lg badge-dot">
                                        <i class="bg-success"></i>
                                        {{ $providerService->serviceName->service_name ?? '' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ $providerService->service_number }}
                            </td>
                            <td>
                                {{ $providerService->service_model }}
                            </td>
                            <td class="text-end">
                                <div class="flex justify-end">
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-danger text-danger-hover" type="button" wire:click="confirm('delete', {{ $providerService->id }})" wire:loading.attr="disabled">
                                            Delete
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
    <hr>
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
