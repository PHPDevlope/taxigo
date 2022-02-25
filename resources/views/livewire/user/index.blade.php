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
                                {{ trans('cruds.user.fields.id') }}
                                @include('components.table.sort', ['field' => 'id'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.profile') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.name') }}
                                @include('components.table.sort', ['field' => 'name'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.mobile') }}
                                @include('components.table.sort', ['field' => 'mobile'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.mobile_verified_at') }}
                                @include('components.table.sort', ['field' => 'mobile_verified_at'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.email') }}
                                @include('components.table.sort', ['field' => 'email'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.email_verified_at') }}
                                @include('components.table.sort', ['field' => 'email_verified_at'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.locale') }}
                                @include('components.table.sort', ['field' => 'locale'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.otp') }}
                                @include('components.table.sort', ['field' => 'otp'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.firebase_token') }}
                                @include('components.table.sort', ['field' => 'firebase_token'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.device_token') }}
                                @include('components.table.sort', ['field' => 'device_token'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.device_type') }}
                                @include('components.table.sort', ['field' => 'device_type'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.device') }}
                                @include('components.table.sort', ['field' => 'device'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.bio') }}
                                @include('components.table.sort', ['field' => 'bio'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.gender') }}
                                @include('components.table.sort', ['field' => 'gender'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.dob') }}
                                @include('components.table.sort', ['field' => 'dob'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.address') }}
                                @include('components.table.sort', ['field' => 'address'])
                            </th>
                            <th scope="col">
                                {{ trans('cruds.user.fields.provider_status') }}
                                @include('components.table.sort', ['field' => 'provider_status'])
                            </th>
                            <th scope="col">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                                </td>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    @foreach($user->profile as $key => $entry)
                                        <a class="link-photo" href="{{ $entry['url'] }}">
                                            <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->mobile }}
                                </td>
                                <td>
                                    {{ $user->mobile_verified_at }}
                                </td>
                                <td>
                                    <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                        <i class="far fa-envelope fa-fw">
                                        </i>
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td>
                                    {{ $user->email_verified_at }}
                                </td>
                                <td>
                                    @foreach($user->roles as $key => $entry)
                                        <span class="badge badge-dot badge-lg">
                                            <i class="bg-success"></i>
                                            {{ $entry->title }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $user->locale }}
                                </td>
                                <td>
                                    {{ $user->otp }}
                                </td>
                                <td>
                                    {{ $user->firebase_token }}
                                </td>
                                <td>
                                    {{ $user->device_token }}
                                </td>
                                <td>
                                    {{ $user->device_type_label }}
                                </td>
                                <td>
                                    {{ $user->device }}
                                </td>
                                <td>
                                    {{ $user->bio }}
                                </td>
                                <td>
                                    {{ $user->gender_label }}
                                </td>
                                <td>
                                    {{ $user->dob }}
                                </td>
                                <td>
                                    {{ $user->address }}
                                </td>
                                <td>
                                    {{--                                    {{ $user->provider_status_label }}--}}
                                    @if($user->provider_status === "yes")
                                        <span class="badge rounded-pill bg-success">Active</span>
                                    @elseif($user->provider_status === "no")
                                        <span class="badge rounded-pill bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="flex justify-end">
                                        @can('user_show')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.users.show', $user) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
                                        @can('user_edit')
                                            <a class="btn btn-sm btn-neutral" href="{{ route('admin.users.edit', $user) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
                                        @can('user_delete')
                                            <button class="btn btn-sm btn-square btn-neutral text-danger-hover" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
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
            {{ $users->links() }}
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
