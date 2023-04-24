@extends('admin.layouts.app')
@section('title')
    @lang('app.dashboard')
@endsection
@section('content')
    <div class="row g-2 mb-4">
        @foreach($modals as $modal)
            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                <a href="{{ route('admin.' . $modal['name'] . '.index') }}" class="text-decoration-none text-dark">
                    <div class="border-start border-danger border-3 rounded-3 p-3 shadow-sm bg-white">
                        <div class="fs-5 fw-semibold">
                           @lang('app.' . $modal['name']):
                        </div>
                        <div class="fs-3 fw-bold text-dark">
                            {{ $modal['total'] }} <span class="rounded-4 bg-light px-2"><i class="bi bi-{{$modal['icon']}} fs-4"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card rounded-3 shadow-sm">
                <a href="{{ route('admin.news.index', ['status' => 1])}}" class="d-flex justify-content-between align-items-center text-decoration-none card-header rounded-3 bg-white">
                    <div class="fw-semibold">@lang('app.visible') - @lang('app.news')</div>
                </a>
                <div class="card-body small p-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <tbody>
                            @forelse($visible as $obj)
                                <tr>
                                    <td>
                                        <span><img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                        <span class="fw-normal">{{ $obj->getName()}}</span>
                                    </td>
                                    <td>{{$obj->category->name_tm}}</td>
                                    <td>{{$obj->created_at}}</td>
                                    <td>
                                        <span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span>
                                    </td>
                                    <td><i class="bi-eye-fill"></i> {{$obj->viewed}}</td>
                                </tr>
                            @empty
                                <tr class="table-warning">
                                    <td>Not found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card rounded-3 shadow-sm">
                <a href="{{ route('admin.news.index', ['status' => 0] )}}" class="d-flex justify-content-between align-items-center text-decoration-none card-header rounded-3 bg-white">
                    <div class="fw-semibold">@lang('app.not-visible') - @lang('app.news')</div>
                </a>
                <div class="card-body small p-1">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <tbody>
                            @forelse($not_visible as $obj)
                                <tr>
                                    <td>
                                        <span><img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5" style="max-height:2rem;"></span>
                                        <span class="fw-normal">{{ $obj->getName()}}</span>
                                    </td>
                                    <td>{{$obj->category->name_tm}}</td>
                                    <td>{{$obj->created_at}}</td>
                                    <td>
                                        <span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span>
                                    </td>
                                    <td><i class="bi-eye-fill"></i> {{$obj->viewed}}</td>
                                </tr>
                            @empty
                                <tr class="table-warning">
                                    <td>Not found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection