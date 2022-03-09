@extends('taxigo.layouts.admin')
@section('content')
<header class="bg-surface-primary border-bottom pt-6 pb-6">
    <div class="container-fluid">
        <div class="mb-npx">
            <div class="row align-nav-item">
                <div class="col-6 mb-4 mb-sm-0">
                    <!-- Title -->
                    <h4 class="h4 mb-0 ls-tight">
                        {{ trans('global.create') }}
                        {{ trans('cruds.geoFencing.title_singular') }}
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
                    <div>
                        @livewire('geo-fencing.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
