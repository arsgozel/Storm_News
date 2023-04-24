@extends('admin.layouts.app')
@section('title')
    @lang('app.news')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            <a href="{{ route('admin.news.index') }}" class="text-decoration-none">
                @lang('app.news')</a>
        </div>
        <div>
            @include('admin.new.filter')
        </div>
    </div>
    <div class="table-responsive rounded-top bg-white shadow-sm">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col"><img src="{{ asset('img/flag/tkm.png') }}" alt="Türkmen" height="15"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/eng.png') }}" alt="English" height="15"> Name</th>
                <th scope="col"><img src="{{ asset('img/flag/rus.png') }}" alt="Русский" height="15"> Name</th>
                <th scope="col" width="10%"> Types</th>
                <th scope="col" width="10%"> Highlights</th>
                <th scope="col">Status</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @forelse($objs as $obj)
                <tr>
                    <td>
                        {{ $obj->id }}
                    </td>
                    <td>
                        <img src="{{ $obj->getImage() }}" alt="{{ $obj->image }}" class="img-fluid rounded-5"
                             style="max-height:4rem;">
                        <div class="pt-1 text-center small"><i class="bi-eye-fill"></i>{{$obj->viewed}}</div>
                    </td>
                    <td>
                        <div class="text-decoration-none">
                            {{ $obj->name_tm }}
                        </div>
                    </td>
                    <td>
                        {!! $obj->name_en ?: '<span>' . $obj->name_tm . '</span>' !!}
                    </td>
                    <td>
                        {!! $obj->name_ru ?: '<span>' . $obj->name_tm . '</span>' !!}
                    </td>
                    <td>
                            <div>{{ $obj->category->getName() }}</div>
                    </td>
                    <td>
                        <div>{{ $obj->highlights->getName() }}</div>
                    </td>
                    <td><span class="badge text-bg-{{ $obj->statusColor() }}">{{$obj->status()}}</span></td>
                    <td>{{$obj->created_at->format('d.m.y')}}</td>
                    <td>{{$obj->updated_at->format('d.m.y')}}</td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#delete{{ $obj->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $obj->id }}" tabindex="-1" aria-labelledby="delete{{ $obj->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post">
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
            @empty
                <tr>
                    <td colspan="10" class="text-center">
                        @lang('app.appNotFound')!
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        {{ $objs->links() }}
    </div>
@endsection
