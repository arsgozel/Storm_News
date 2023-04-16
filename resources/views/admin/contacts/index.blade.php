@extends('admin.layouts.app')
@section('title')
    @lang('app.contacts')
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            @lang('app.contacts')
        </div>
        <div>
            @include('admin.contacts.filter')
        </div>
    </div>

    <div class="table-responsive shadow-sm bg-white rounded-top rounded-5">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" width="15%">Phone</th>
                <th scope="col" width="8%">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Message</th>
                <th scope="col">Received at</th>
                <th scope="col" width="3%" class="text-center"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($objs as $obj)
                <tr>
                    <td>{{ $obj->id }}</td>
                    <td>
                        <a href="tel:+993{{ $obj->phone }}" class="text-decoration-none">
                            +993 {{ $obj->phone }}
                        </a>
                    </td>
                    <td>
                        <a href="mailto:{{ $obj->email }}" class="text-decoration-none">
                            {{ $obj->email }}
                        </a>
                    </td>
                    <td>{{ $obj->name}}</td>
                    <td>
                        @if($obj->message)
                            {{ $obj->message }}
                        @endif
                    </td>
                    <td>{{ $obj->received_at }}</td>
                    <td>
                        <div class="modal-footer">
                            <form action="{{ route('admin.contacts.destroy', $obj->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                @honeypot
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi-trash"></i> @lang('app.delete')</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection