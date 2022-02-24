@extends('taxigo.layouts.admin')
@section('content')
    <header class="bg-surface-primary border-bottom pt-6">
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">My Account</h1>
                    </div>
                </div>
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is("admin/my-account") ? "active" : ""}}" href="{{route("admin.my-account")}}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                            </i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link {{request()->is("admin/my-account/security") ? "active" : ""}}"  href="{{route("admin.my-account.security")}}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-lock">
                            </i>
                            Security
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </header>
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="card-body">
                        <div>
                            @if(request()->is("admin/my-account"))
                                @livewire('update-profile-information-form')
                            @else
                                @livewire('update-password-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
