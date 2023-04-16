@extends('admin.layouts.app')
@section('title')
    @lang('app.categories')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            @lang('app.categories')
        </div>
        <div>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-danger btn-sm">
                <i class="bi-plus-lg"></i> @lang('app.add')
            </a>
        </div>
    </div>

    <div class="table-responsive shadow-sm bg-white rounded-top">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" width="5">@lang('app.sortOrder')</th>
                <th scope="col"><img src="{{ asset('img/flag/tkm.png') }}" alt="Türkmen" height="15"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/eng.png') }}" alt="English" height="15"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/rus.png') }}" alt="Русский" height="15"> Name</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($objs->sortBy('sort_order')->sortBy('sort_order') as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>{{ $obj->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.categories.index', $obj->slug) }}" class="text-decoration-none">
                            {{ $obj->name_tm }} <i class="bi-box-arrow-up-right"></i>
                        </a>
                    </td>
                    <td>
                        {!! $obj->name_en ?: '<span>' . $obj->name_tm . '</span>' !!}
                    </td>
                    <td>
                        {!! $obj->name_ru ?: '<span>' . $obj->name_tm . '</span>' !!}
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $obj->id) }}" class="btn btn-success btn-sm my-1">
                            <i class="bi-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-secondary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#delete{{ $obj->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $obj->id }}" tabindex="-1" aria-labelledby="delete{{ $obj->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5 fw-semibold" id="delete{{ $obj->id }}Label">
                                            {{ $obj->getName() }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.categories.destroy', $obj->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            @honeypot
                                            <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">@lang('app.close')</button>
                                            <button type="submit" class="btn btn-secondary btn-sm"><i class="bi-trash"></i> @lang('app.delete')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection