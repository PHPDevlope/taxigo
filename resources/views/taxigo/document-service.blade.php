@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">Document Service</h1>
                    </div>
                    <div class="col-6 text-end">
                        <div class="mx-n1"></div>
                    </div>
                </div>
                <ul class="nav nav-tabs mt-4 overflow-x border-0"></ul>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row">
                <div class="card bg-blueGray-100 col-xl-12 col-lg-12 col-md-12 rounded-0 shadow-none">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Provider Service Type Allocation</h4>
                        </div>
                        <div>
                            @livewire('provider-service.index')
                            <livewire:provider-service.edit :id="[request('id')]"/>
                        </div>
                    </div>
                </div>
                <div class="card bg-blueGray-100 col-xl-12 col-lg-12 col-md-12 mt-3 rounded-0 shadow-none">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Provider Documents</h4>
                        </div>
                        <div>
                            @livewire('provider-document.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
