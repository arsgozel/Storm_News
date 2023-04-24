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
        @lang('app.edit')
    </div>
    <div class="mb-3">
            <form action="{{ route('manager.apps.update', $obj->id) }}" method="post">
                @method('PUT')
                @csrf
                @honeypot

                <div class="row g-5">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="name_tm" class="form-label fw-semibold">
                                @lang('app.name')
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   id="name" value="{{ $obj->name }}" required>
                            @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">
                                @lang('app.description')
                            </label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                   id="description" value="{{ $obj->description }}">
                            @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="is_approved" class="form-label fw-semibold">
                                        @lang('app.ad')
                                    </label>
                                    <div class="form-check @error('has_add') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="has_add" id="has_add"
                                               value="1" {{ $obj->has_add == 1 ? 'checked':'' }}>
                                        <label class="form-check-label" for="has_add">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </label>
                                    </div>
                                    <div class="form-check @error('has_add') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="has_add" id="has_add"
                                               value="0" {{ $obj->has_add == 0 ? 'checked':'' }}>
                                        <label class="form-check-label" for="has_add">
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        </label>
                                    </div>
                                    @error('has_add')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="is_approved" class="form-label fw-semibold">
                                        @lang('app.status')
                                    </label>
                                    <div class="form-check @error('app_status') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="app_status" id="app_status"
                                               value="1" {{ $obj->app_status == 1 ? 'checked':'' }}>
                                        <label class="form-check-label" for="app_status">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                        </label>
                                    </div>
                                    <div class="form-check @error('app_status') is-invalid @enderror">
                                        <input class="form-check-input" type="radio" name="app_status" id="app_status"
                                               value="0" {{ $obj->app_status == 0 ? 'checked':'' }}>
                                        <label class="form-check-label" for="app_status">
                                            <i class="bi bi-x-circle-fill text-danger"></i>
                                        </label>
                                    </div>
                                    @error('app_status')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                            <div class="mb-3">
                                <label for="languages" class="form-label fw-semibold">
                                    @lang('app.language')
                                </label>
                                <select class="form-select @error('languages') is-invalid @enderror"
                                        name="languages"
                                        id="languages">
                                    <option value>-</option>
                                    @foreach($characteristics[1]->values as $characteristicValue)
                                        <option value="{{$characteristicValue->id}}" {{ $characteristicValue->id == $obj->languages_id ? 'selected' : ''}}>{{ $characteristicValue->getName() }}</option>
                                    @endforeach
                                </select>
                                @error('age_rating')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(count($characteristics) > 2)
                                @foreach($characteristics as $characteristic)
                                    <div class="mb-3">
                                        <label for="{{ strtolower($characteristic->name_en) }}" class="form-label fw-semibold">
                                            {{$characteristic->getName() }}
                                        </label>
                                        <select class="form-select @error('{{ strtolower($characteristic->name_en) }}') is-invalid @enderror"
                                                name="{{ strtolower($characteristic->name_en) }}"
                                                id="{{ strtolower($characteristic->name_en) }}">
                                            <option value>-</option>
                                            @foreach($characteristic->values as $characteristicValue)
                                                <option value="{{$characteristicValue->id}}">{{ $characteristicValue->getName() }}</option>
                                            @endforeach
                                        </select>
                                        @error('{{ strtolower($characteristic->name_en) }}')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            @endif
                        </div>


                        <div class="mb-3">
                            <label for="image" class="form-label fw-semibold">
                                @lang('app.image')
                            </label>
                            <div class="row">
                                @if(count($images) > 0)
                                    <div>
                                        @foreach($images as $image)
                                            <img src="{{  $image }}" alt="{{ $obj->getName() }}" class="img-fluid rounded"
                                                 style="max-height:5rem;">
                                        @endforeach
                                    </div>
                                @endif
                                <div>
                                    <div class="input-group mb-3">
                                        <input type="file" accept="image/jpeg"
                                               class="form-control @error('image') is-invalid @enderror"
                                               name="images[]" id="image" multiple>
                                        <label class="input-group-text" for="image">Upload</label>
                                    </div>
                                    @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="row g-5">
                            <div class="col-10 col-sm-8 col-md-6 col-lg-6">
                                <div class="fw-semibold">@lang('app.types')
                                    <span class="text-danger">*</span></div>
                                @foreach($types as $type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $type['id'] }}" id="type{{$type['id'] }}" name="types[]" {{ $type['id'] ? 'checked':'' }}>
                                        <label class="form-check-label" for="type{{ $type['id'] }}">
                                            {{ $type['name_tm'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-10 col-sm-8 col-md-6 col-lg-6">
                                <div class="fw-semibold">@lang('app.devices')
                                    <span class="text-danger">*</span></div>
                                @foreach($devices as $device)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $device['id'] }}" id="device{{$device['id'] }}" name="devices[]" {{ $device['id'] ? 'checked':'' }}>
                                        <label class="form-check-label" for="type{{ $device['id'] }}">
                                            {{ $device['name_tm'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-danger mt-3">
                    @lang('app.update')
                </button>
            </form>
    </div>
@endsection