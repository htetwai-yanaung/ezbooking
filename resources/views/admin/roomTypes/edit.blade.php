@extends('admin.layouts.app')

@section('content')
    <!-- room type -->
    <h4 class="text-muted">Edit Room Type</h4>
    <div class="">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('dashboard.roomTypeUpdate', $roomType->id) }}" method="POST" class=" bg-white p-3 rounded shadow-sm">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <label for="">Room Type Name</label>
                            <input type="text" name="name" value="{{ $roomType->name }}" class="form-control" placeholder="input room type name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <a href="{{ route('dashboard.roomTypeIndex') }}" class="btn btn-danger">Cancle</a>
                            <button class="btn btn-primary float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- room type -->
@endsection
