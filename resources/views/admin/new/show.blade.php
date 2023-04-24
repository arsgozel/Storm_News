@extends('Manager.layouts.app')
@section('title')
    @lang('app.apps')
@endsection
@section('content')
    <div class="h4 mb-3">
        <a href="{{ route('manager.apps.index') }}" class="text-decoration-none">
            @lang('app.apps')
        </a>
        <i class="bi-chevron-right small"></i>
        @lang('app.show')
    </div>
    <div class="container-xxl p-0 m-0">
        <div class="position-relative d-flex">
            <div class="splide p-0 m-0" role="group" id="splide-gallery">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <img class="img-fluid" src="{{ asset('img/slider2.jpg') }}" alt="">
                        </li>
                        <li class="splide__slide">
                            <img class="img-fluid" src="{{ asset('img/slider.jpg') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>

            <div class="d-flex position-absolute text-white top-50 end-0 px-3 translate-middle-y">
                <div>
                    <div class="text-uppercase fw-bold display-1">
                        {{$app->getName()}}
                    </div>
                    <div class="px-3 fw-semibold h6 text-end text-white"><span class="rounded-5 bg-primary p-1">{{$app->app_status()}}</span>/<span class="rounded-5 bg-primary p-1">{{$app->status()}}</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl mt-3">
        <div class="row g-0">
            <div class="col-6 col-md-4 col-lg-2 col-xl-1">
                <img src="{{ $app->getImage() }}" alt="{{ $app->image }}" class="img-fluid rounded-5 text-center"
                     style="max-height:5rem;">
            </div>
            <div class="vr"></div>
            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                <div class="text-center px-3 h5 pt-2">
                    <div class="text-success mb-2">Rating</div>
                    {{$app->rating}}
                    @for($i = 0; $i < $app->rating; ++$i)
                        <i class="bi-star-fill text-warning"></i>
                    @endfor
                </div>
            </div>
            <div class="vr"></div>
            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                <div class="pt-2 px-3 h5 text-center">
                    <div class="text-success mb-2">Ýaş aýratynlyk:</div>
                    {{$app->age_rating->getName()}}
                </div>
            </div>
            <div class="vr"></div>
            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                <div class="pt-2 px-3 h5 text-center">
                    <div class="text-success mb-2">Dili:</div>
                    {{$app->language->getName()}}
                </div>
            </div>
            <div class="vr"></div>
            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                <div class="pt-2 px-3 h5 text-center">
                    <div class="text-success mb-2">Ýüklenen sany:</div>
                    {{$app->downloads}}
                </div>
            </div>
            <div class="vr"></div>
        </div>
    </div>
    <div class="container-xxl">
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-3 col-xl-4">
                <div class="rounded-5 p-2 border border-primary mt-4">
                    <div class="fs-5 text-center">
                        @foreach($app->types as $type)
                            <span>{{ $type->getName() }};</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 col-xl-3">
                <div class="rounded-5 p-2 border border-primary mt-4">
                    <div class="fs-5 text-center">
                        @foreach($app->devices as $device)
                            <span>{{ $device->getName() }}</span>
                        @endforeach
                        üçin
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="rounded-5 p-2 border border-primary mt-4">
                    <div class="fs-5 text-center">
                       Version: {{$app-> version}}
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                <div class="rounded-5 p-2 border border-primary mt-4">
                    <div class="fs-5 text-center">
                        App size: {{$app->size}}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            Released at: {{$app->created_at->format('d-m-y')}}
        </div>
        <div>
            Latest update: {{$app->updated_at->format('d-m-y')}}
        </div>

        <div class="mt-4">
            <div class="fw-bold h4">Programma hakynda</div>
            <div class="w-50">{{$app->description}}</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var splide = new Splide('#splide-gallery', {
                type: 'loop',
                autoplay: true,
                gap: '1rem',
                interval: 3000,
                perPage: 1,
                perMove: 1,

            });
            splide.mount();
        });
    </script>
@endsection