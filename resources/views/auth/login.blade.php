@extends('taxigo.layouts.app')

@section('content')
    <div class="px-5 py-5 p-lg-0 bg-surface-secondary">
        <div class="d-flex justify-content-center">
            <div class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-dark d-none d-lg-flex flex-column">
                <!-- Logo -->
                <a class="d-block" >
                    <img src="{{asset('images/logo_wide.png')}}" class="h-20" >
                </a>
                <!-- Title -->
                <div class="mt-32 mb-20">
                    <h1 class="ls-tight font-bolder display-6 text-white mb-5">
                        Let’s build a better education community.
                    </h1>
                    <p class="text-white text-opacity-80">
                        It's time to create something new.
                    </p>
                </div>
                <!-- Circle -->
                <div class="w-56 h-56 bg-white rounded-circle position-absolute bottom-0 end-20 transform translate-y-1/2"></div>
            </div>
            <div class="col-12 col-md-9 col-lg-7 offset-lg-5 border-left-lg min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ms-xl-0">
                        <div class="mt-10 mt-lg-5 mb-6 d-flex align-items-center d-lg-block">
                            <span class="d-inline-block d-lg-block h1 mb-lg-6 me-3">👋</span>
                            <h1 class="ls-tight font-bolder h2">
                                Nice to see you!
                            </h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="email">Email / Phone</label>
                                <input type="email|phone" class="form-control form-control-muted" name="email" id="email">
                                @error('email')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control form-control-muted" name="password" id="password" autocomplete="current-password">
                                @error('password')
                                <span class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" name="check_example" id="check_example">
                                    <label class="form-check-label" for="check_example">
                                        Keep me logged in
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark w-full">
                                    {{ __('global.login') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
