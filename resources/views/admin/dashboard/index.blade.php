@extends('admin.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')
    <div class="row g-2 mb-4">
        @foreach($modals as $modal)
            <div class="col-6 col-md-4 col-lg-3 col-xl-3">
                <a href="{{ route('admin.' . $modal['name'] . '.index') }}" class="text-decoration-none text-dark">
                    <div class="border rounded-4 p-4 shadow-sm bg-white">
                        <div class="fs-5 fw-semibold">
                           Total @lang('app.' . $modal['name']):
                        </div>
                        <div class="fs-3 fw-bold text-dark">
                            {{ $modal['total'] }} <span class="rounded-4 bg-opacity-25 bg-danger px-2"><i class="bi bi-{{$modal['icon']}} fs-4"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection