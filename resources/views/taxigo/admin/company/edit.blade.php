@extends('taxigo.layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.company.title_singular') }}:
                    {{ trans('cruds.company.fields.id') }}
                    {{ $company->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('company.edit', [$company])
        </div>
    </div>
</div>
@endsection