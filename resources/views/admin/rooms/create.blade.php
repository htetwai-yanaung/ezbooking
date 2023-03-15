@extends('admin.layouts.app')

@section('content')
    <h4 class="text-muted">Create Room</h4>
    <form action="{{ route('dashboard.roomStore') }}" method="POST" class="bg-white p-3 rounded shadow-sm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Room title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Room Number</label>
                <input type="text" name="room_number" value="{{ old('room_number') }}" class="form-control" placeholder="Enter room number">
                @error('room_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Room Type</label>
                <select name="room_type" class="form-select">
                    <option value="" class="d-none">Choose a room type</option>
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                    @endforeach
                </select>
                @error('room_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Price</label>
                <div class="row">
                    <div class="col-4">
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="Kyat">
                    </div>
                    <div class="col-4">
                        <input type="number" name="usd" value="{{ old('usd') }}" class="form-control" placeholder="USD">
                    </div>
                    <div class="col-4">
                        <input type="number" name="discount" value="{{ old('discount') }}" class="form-control" placeholder="Discount">
                    </div>
                </div>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('usd')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('discount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Beds</label>
                <div class="row">
                    <div class="col-9">
                        <select name="beds" class="form-select">
                            <option value="" class="d-none">Choose a bed size</option>
                            <option value="Small bed">Small bed</option>
                            <option value="Double/Full bed">Double/Full bed</option>
                            <option value="Medium bed">Medium bed</option>
                            <option value="Queen bed">Queen bed</option>
                            <option value="King bed">King bed</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="number" name="bed_count" class="form-control" value="1"
                            placeholder="input total bed">
                    </div>
                </div>
                @error('beds')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('bed_count')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Cover Photo</label>
                <input type="file" name="cover_photo" class="form-control">
                @error('cover_photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label>Images</label>
                <label for="images" class="btn btn-outline-secondary col-12">Choose Images</label>
                <input type="file" name="images[]" class="d-none" id="images" multiple>
                @error('images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('images.*')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <label for="">Services</label>
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="form-check">
                            <input class="form-check-input" name="services[]" type="checkbox" value="{{ $service->name }}" id="{{ $service->id }}">
                            <label class="form-check-label" for="{{ $service->id }}">
                            {{ $service->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @error('services')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Add description...">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 mb-2">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" name="status" value="Available" type="radio" checked role="switch" id="available">
                    <label class="form-check-label" for="available">Available</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="status" value="Maintenance" type="radio" role="switch" id="maintenance">
                    <label class="form-check-label" for="maintenance">Maintenance</label>
                </div>
            </div>


            <div class="col-12 mb-2">
                <button class="btn btn-primary float-end">Save</button>
            </div>
        </div>
    </form>
@endsection
