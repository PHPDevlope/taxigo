@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6 pb-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-nav-item">
                    <div class="col-3">
                        <h1 class="h2 mb-0 ls-tight">Dispatcher Panel</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row align-items-center mb-6 bg-white">
                <div class="col-sm-6 col-12 mb-4 mb-sm-0">
{{--                        <h1 class="h2 mb-0 ls-tight">Company</h1>--}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" >
                                <span class="badge rounded-pill bg-info">Searching</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >
                                <span class="badge rounded-pill bg-info">Accepted</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >
                                <span class="badge rounded-pill bg-info">Cancelled</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 text-end">
                    <div class="mx-n1">
                        <a data-bs-toggle="offcanvas" href="#offcanvasMain" class="btn d-inline-flex btn-sm btn-success mx-1">
                            <span class=" pe-2">
                                <i class="bi bi-plus"></i>
                            </span>
                            <span>Add</span>
                        </a>
                    </div>
                </div>
        </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card my-card">
                        <div class="card-header bg-bluegray-50 text-uppercase">
                            <b>Map</b>
                        </div>
                        <div class="card-body" style="height: 450px;">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card my-card">
                        <div class="card-header bg-bluegray-50 text-uppercase">
                            <b>Map</b>
                        </div>
                        <div class="">
                            <div id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.70718479907!2d72.43965828122799!3d23.02049776666638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1646218326447!5m2!1sen!2sin" width="1054" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


