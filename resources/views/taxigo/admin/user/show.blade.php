@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6 pb-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-6 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h4 class="h4 mb-0 ls-tight">
                            {{ trans('global.view') }}
                            {{ trans('cruds.user.title_singular') }}:
                            {{ trans('cruds.user.fields.id') }}
                            {{ $user->id }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row">
                <div class="card bg-blueGray-100 col-xl-6 col-lg-6 col-md-12">
                    <div class="card-body">
                        <div class="pt-3">
                            <table class="table table-view">
                                <tbody class="bg-white">
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.profile') }}
                                        </th>
                                        <td>
                                            @foreach($user->profile as $key => $entry)
                                                <a class="link-photo" href="{{ $entry['url'] }}">
                                                    <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.mobile') }}
                                        </th>
                                        <td>
                                            {{ $user->mobile }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.mobile_verified_at') }}
                                        </th>
                                        <td>
                                            {{ $user->mobile_verified_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email') }}
                                        </th>
                                        <td>
                                            <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                                <i class="far fa-envelope fa-fw">
                                                </i>
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email_verified_at') }}
                                        </th>
                                        <td>
                                            {{ $user->email_verified_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.roles') }}
                                        </th>
                                        <td>
                                            @foreach($user->roles as $key => $entry)
                                                <span class="badge badge-relationship">{{ $entry->title }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.locale') }}
                                        </th>
                                        <td>
                                            {{ $user->locale }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.otp') }}
                                        </th>
                                        <td>
                                            {{ $user->otp }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.firebase_token') }}
                                        </th>
                                        <td>
                                            {{ $user->firebase_token }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.device_token') }}
                                        </th>
                                        <td>
                                            {{ $user->device_token }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.device_type') }}
                                        </th>
                                        <td>
                                            {{ $user->device_type_label }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.device') }}
                                        </th>
                                        <td>
                                            {{ $user->device }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.bio') }}
                                        </th>
                                        <td>
                                            {{ $user->bio }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.gender') }}
                                        </th>
                                        <td>
                                            {{ $user->gender_label }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.dob') }}
                                        </th>
                                        <td>
                                            {{ $user->dob }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.address') }}
                                        </th>
                                        <td>
                                            {{ $user->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.provider_status') }}
                                        </th>
                                        <td>
                                            {{ $user->provider_status_label }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-4">
                                <a href="{{ route('admin.users') }}" class="btn d-inline-flex btn-sm btn-secondary mx-1">
                                    {{ trans('global.back') }}
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
