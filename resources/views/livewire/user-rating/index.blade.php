<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('user_rating_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="UserRating" format="csv" />
                <livewire:excel-export model="UserRating" format="xlsx" />
                <livewire:excel-export model="UserRating" format="pdf" />
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
                            {{ trans('cruds.userRating.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.request') }}
                            @include('components.table.sort', ['field' => 'request.total_distance'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.user_name') }}
                            @include('components.table.sort', ['field' => 'user_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.provider_name') }}
                            @include('components.table.sort', ['field' => 'provider_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.rating') }}
                            @include('components.table.sort', ['field' => 'rating'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.date_time') }}
                            @include('components.table.sort', ['field' => 'date_time'])
                        </th>
                        <th>
                            {{ trans('cruds.userRating.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userRatings as $userRating)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $userRating->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $userRating->id }}
                            </td>
                            <td>
                                @if($userRating->request)
                                    <span class="badge badge-relationship">{{ $userRating->request->total_distance ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($userRating->userName)
                                    <span class="badge badge-relationship">{{ $userRating->userName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($userRating->providerName)
                                    <span class="badge badge-relationship">{{ $userRating->providerName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $userRating->rating }}
                            </td>
                            <td>
                                {{ $userRating->date_time }}
                            </td>
                            <td>
                                {{ $userRating->comments }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('user_rating_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.user-ratings.show', $userRating) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_rating_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.user-ratings.edit', $userRating) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_rating_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $userRating->id }})" wire:loading.attr="disabled">
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
            {{ $userRatings->links() }}
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