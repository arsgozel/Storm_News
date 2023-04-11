<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('app.login') - @lang('app.app-name')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-light">
@include('admin.layouts.alert')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <h3 class="mx-5 pt-5 fw-bold text-danger">Storm-News</h3>
                    </div>
                    <div class="row px-3 justify-content-center text-center mt-1 mb-0 border-line d-none d-sm-block">
                        <img src="{{asset('img/news2.avif')}}" class="img-fluid w-75 h-50">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <form action="{{ route('admin.login') }}" method="post">
                        @csrf
                        @honeypot
                        <div class="h4 mb-3 fw-bold text-center mb-5 pt-3 text-danger">@lang('app.login')</div>
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">
                                @lang('app.username')
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control rounded-0 @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                @lang('app.password')
                                <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control form-control rounded-0 @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required>
                            @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                            <label class="form-check-label px-1" for="remember">
                                @lang('app.rememberMe')
                            </label>
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-danger text-center rounded-0 fw-semibold">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-danger py-4">
            <div class="row px-3">
                <small class="ml-4 ml-sm-5 mb-2 text-white">Copyright &copy; 2023. All rights reserved.</small>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>