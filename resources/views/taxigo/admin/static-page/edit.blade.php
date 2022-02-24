@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.staticPage.title_singular') }}:
                    {{ trans('cruds.staticPage.fields.id') }}
                    {{ $staticPage->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('static-page.edit', [$staticPage])
        </div>
    </div>
</div>
@endsection