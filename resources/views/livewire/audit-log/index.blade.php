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
                                {{ trans('cruds.auditLog.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.description') }}
                                @include('components.table.sort', ['field' => 'description'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.subject_id') }}
                                @include('components.table.sort', ['field' => 'subject_id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.subject_type') }}
                                @include('components.table.sort', ['field' => 'subject_type'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.user_id') }}
                                @include('components.table.sort', ['field' => 'user_id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.properties') }}
                                @include('components.table.sort', ['field' => 'properties'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.host') }}
                                @include('components.table.sort', ['field' => 'host'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.auditLog.fields.created_at') }}
                                @include('components.table.sort', ['field' => 'created_at'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($auditLogs as $auditLog)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $auditLog->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $auditLog->id }}
                                </td>
                                <td>
                                    {{ $auditLog->description }}
                                </td>
                                <td>
                                    {{ $auditLog->subject_id }}
                                </td>
                                <td>
                                    {{ $auditLog->subject_type }}
                                </td>
                                <td>
                                    {{ $auditLog->user_id }}
                                </td>
                                <td>
                                    {{ $auditLog->properties }}
                                </td>
                                <td>
                                    {{ $auditLog->host }}
                                </td>
                                <td>
                                    {{ $auditLog->created_at }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('audit_log_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.audit-logs.show', $auditLog) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('audit_log_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.audit-logs.edit', $auditLog) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('audit_log_delete')
                                            <button class="btn btn-sm btn-neutral btn-square text-danger-hover" type="button" wire:click="confirm('delete', {{ $auditLog->id }})" wire:loading.attr="disabled">
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
            {{ $auditLogs->links() }}
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
