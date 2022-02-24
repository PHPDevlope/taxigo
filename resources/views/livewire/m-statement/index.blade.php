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
                            <th scope="col">
                                {{ trans('cruds.mStatement.fields.user') }}
                                @include('components.table.sort', ['field' => 'user.name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mStatement.fields.document') }}
                                @include('components.table.sort', ['field' => 'document.document_name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mStatement.fields.files') }}
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
                                    @if($mStatement->user)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bi bi-success"></i>
                                            {{ $mStatement->user->name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($mStatement->document)
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bi bi-success"></i>
                                            {{ $mStatement->document->document_name ?? '' }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @foreach($mStatement->files as $key => $entry)
                                        <a class="link-light-blue" href="{{ $entry['url'] }}">
                                            <i class="far fa-file">
                                            </i>
                                            {{ $entry['file_name'] }}
                                        </a>
                                    @endforeach
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('m_statement_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-statements.show', $mStatement) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('m_statement_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-statements.edit', $mStatement) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('m_statement_delete')
                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $mStatement->id }})" wire:loading.attr="disabled">
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
