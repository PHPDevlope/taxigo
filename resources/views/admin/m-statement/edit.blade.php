@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.mStatement.title_singular') }}:
                    {{ trans('cruds.mStatement.fields.id') }}
                    {{ $mStatement->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('m-statement.edit', [$mStatement])
        </div>
    </div>
</div>
@endsection