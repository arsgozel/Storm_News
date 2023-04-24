@extends('admin.layouts.app')
@section('title') @lang('app.visitors') @endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="h4 mb-0">
            <a href="{{ route('admin.visitors.index') }}" class="text-decoration-none">@lang('app.visitors')</a>
        </div>
        <div>
            @include('admin.visitors.filter')
        </div>
    </div>
    <div class="table-responsive shadow-sm bg-white rounded-top">
        <table class="table table-hover">
            <thead>
            <tr class="fw-bold">
                <th scope="col">ID</th>
                <th scope="col">IP address</th>
                <th scope="col">Browser</th>
                <th scope="col">Browser version</th>
                <th scope="col">Device</th>
                <th scope="col">Device version</th>
                <th scope="col">Requests</th>
                <th scope="col">First visit</th>
                <th scope="col">Last visit</th>
                <th scope="col"><i class="bi-gear-fill"></i></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr>
            @forelse($visitors as $visitor)
                <tr>
                    <td>{{ $visitor->id }}</td>
                    <td>{{ $visitor->ip_address }}</td>
                    <td>{{ $visitor->userAgent->browser_login }}</td>
                    <td>{{ $visitor->userAgent->browser_version }}</td>
                    <td>{{ $visitor->userAgent->device_login }}</td>
                    <td>{{ $visitor->userAgent->device_version }}</td>
                    <td>{{ $visitor->requests }}</td>
                    <td>{{ $visitor->created_at }}</td>
                    <td>{{ $visitor->updated_at }}</td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm my-1" data-bs-toggle="modal" data-bs-target="#delete{{ $visitor->id }}">
                            <i class="bi-trash"></i>
                        </button>
                        <div class="modal fade" id="delete{{ $visitor->id }}" tabindex="-1" aria-labelledby="delete{{ $visitor->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title fs-5 fw-semibold" id="delete{{ $visitor->id }}Label">
                                            {{ $visitor->id}}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.visitors.destroy', $visitor->id) }}" method="post">
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
            </tbody>

            @empty
                <tr>
                    <td colspan="12">Not found</td>
                </tr>
            @endforelse
        </table>
    </div>
    {{ $visitors->links() }}
@endsection