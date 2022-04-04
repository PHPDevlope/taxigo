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
                                {{ trans('cruds.mStatement.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.booking') }}
                                @include('components.table.sort', ['field' => 'booking'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.picked_up') }}
                                @include('components.table.sort', ['field' => 'picked_up'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.dropped') }}
                                @include('components.table.sort', ['field' => 'dropped'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.commission') }}
                                @include('components.table.sort', ['field' => 'commission'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.request') }}
                                @include('components.table.sort', ['field' => 'request.total_distance'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.status') }}
                                @include('components.table.sort', ['field' => 'status'])
                            </th>
                            <th>
                                {{ trans('cruds.mStatement.fields.eraned') }}
                                @include('components.table.sort', ['field' => 'eraned'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mStatements as $mStatement)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $mStatement->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $mStatement->id }}
                                </td>
                                <td>
                                    {{ $mStatement->booking }}
                                    {{ $mStatement->request->id ?? '' }}
                                </td>
                                <td>
                                    {{ $mStatement->picked_up }}
                                    {{ $mStatement->request->source_address ?? '' }}
                                </td>
                                <td>
                                    {{ $mStatement->dropped }}
                                    {{ $mStatement->request->dist_address ?? '' }}
                                </td>
                                <td>
                                    {{ $mStatement->commission }}
                                    {{ $mStatement->request->provider_admin_commission ?? '' }}
                                </td>
                                <td>
                                    @if($mStatement->request)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>
                                            {{ $mStatement->request->total_distance ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $mStatement->status }}
                                    {{ $mStatement->request->ride_status ?? '' }}
                                </td>
                                <td>
                                    {{ $mStatement->eraned }}
                                    {{ $mStatement->request->provider_earning ?? '' }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('request_history_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.request-histories.show', $mStatement->request) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
{{--                                        @can('m_statement_show')--}}
{{--                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-statements.show', $mStatement) }}">--}}
{{--                                                {{ trans('global.view') }}--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}
{{--                                        @can('m_statement_edit')--}}
{{--                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-statements.edit', $mStatement) }}">--}}
{{--                                                {{ trans('global.edit') }}--}}
{{--                                            </a>--}}
{{--                                        @endcan--}}
{{--                                        @can('m_statement_delete')--}}
{{--                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $mStatement->id }})" wire:loading.attr="disabled">--}}
{{--                                                <i class="bi bi-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        @endcan--}}
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
            {{ $mStatements->links() }}
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
