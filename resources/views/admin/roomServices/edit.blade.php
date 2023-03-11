@extends('admin.layouts.app')

@section('content')
    <!-- room type -->
    <h4 class="text-muted">Edit Service</h4>
    <div class="">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('services.update', $service->id) }}" method="POST" class=" bg-white p-3 rounded shadow-sm">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Service Name</label>
                            <input type="text" name="name" value="{{ $service->name }}" class="form-control" placeholder="input room type name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Service Icon</label>
                            <label for="icon" class="btn btn-outline-primary d-block">Choose icon svg</label>
                            <input type="file" name="icon" class="d-none" id="icon">
                            @error('icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('services.index') }}" class="btn btn-danger">Cancle</a>
                            <button class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- room type -->
@endsection
