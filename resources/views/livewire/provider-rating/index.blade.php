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
                                {{ trans('cruds.providerRating.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.request') }}
                                @include('components.table.sort', ['field' => 'request.total_distance'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.user_name') }}
                                @include('components.table.sort', ['field' => 'user_name.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.provider_name') }}
                                @include('components.table.sort', ['field' => 'provider_name.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.rating') }}
                                @include('components.table.sort', ['field' => 'rating'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.date_time') }}
                                @include('components.table.sort', ['field' => 'date_time'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.providerRating.fields.comments') }}
                                @include('components.table.sort', ['field' => 'comments'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($providerRatings as $providerRating)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $providerRating->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $providerRating->id }}
                                </td>
                                <td>
                                    @if($providerRating->request)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $providerRating->request->total_distance ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($providerRating->userName)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $providerRating->userName->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($providerRating->providerName)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $providerRating->providerName->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $providerRating->rating }}
                                </td>
                                <td>
                                    {{ $providerRating->date_time }}
                                </td>
                                <td>
                                    {{ $providerRating->comments }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('provider_rating_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.provider-ratings.show', $providerRating) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('provider_rating_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.provider-ratings.edit', $providerRating) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('provider_rating_delete')
                                            <button class="btn btn-sm btn-neutral btn-square text-danger-hover" type="button" wire:click="confirm('delete', {{ $providerRating->id }})" wire:loading.attr="disabled">
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
            {{ $providerRatings->links() }}
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
