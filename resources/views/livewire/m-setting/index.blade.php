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

        <div class="col=12">
            <div class="table-responsive">
                <table class="table table-hover table-spaced">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.key') }}
                                @include('components.table.sort', ['field' => 'key'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.value') }}
                                @include('components.table.sort', ['field' => 'value'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.data') }}
                                @include('components.table.sort', ['field' => 'data'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.sub_data') }}
                                @include('components.table.sort', ['field' => 'sub_data'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.field_1') }}
                                @include('components.table.sort', ['field' => 'field_1'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.mSetting.fields.field_2') }}
                                @include('components.table.sort', ['field' => 'field_2'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mSettings as $mSetting)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $mSetting->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $mSetting->id }}
                                </td>
                                <td>
                                    {{ $mSetting->key }}
                                </td>
                                <td>
                                    {{ $mSetting->value }}
                                </td>
                                <td>
                                    {{ $mSetting->data }}
                                </td>
                                <td>
                                    {{ $mSetting->sub_data }}
                                </td>
                                <td>
                                    {{ $mSetting->field_1 }}
                                </td>
                                <td>
                                    {{ $mSetting->field_2 }}
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('m_setting_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-settings.show', $mSetting) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('m_setting_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.m-settings.edit', $mSetting) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('m_setting_delete')
                                            <button class="btn btn-sm btn-neutral btn-square text-danger-hover" type="button" wire:click="confirm('delete', {{ $mSetting->id }})" wire:loading.attr="disabled">
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
            {{ $mSettings->links() }}
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
