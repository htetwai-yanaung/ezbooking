@extends('admin.layouts.app')

@section('content')
    <h4 class="text-muted">Create Room</h4>
    <form action="{{ route('dashboard.roomUpdate', $room->id) }}" method="POST" class="bg-white p-3 rounded shadow-sm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Title</label>
                <input type="text" name="title" value="{{ $room->title, old('title') }}" class="form-control" placeholder="input title">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Room Number</label>
                <input type="text" name="room_number" value="{{ $room->room_number, old('room_number') }}" class="form-control" placeholder="input room number">
                @error('room_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Room Type</label>
                <select name="room_type" class="form-select">
                    <option value="" class="d-none">Choose a room type</option>
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}" @if($room->room_type_id == $roomType->id) selected @endif>{{ $roomType->name }}</option>
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
                        <input type="number" name="price" value="{{ $room->price, old('price') }}" class="form-control" placeholder="Kyat">
                    </div>
                    <div class="col-4">
                        <input type="number" name="usd" value="{{ $room->usd, old('usd') }}" class="form-control" placeholder="USD">
                    </div>
                    <div class="col-4">
                        <input type="number" name="discount" value="{{ $room->discount, old('discount') }}" class="form-control" placeholder="Discount">
                    </div>
                </div>
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-sm-6 mb-2">
                <label for="">Beds</label>
                <div class="row">
                    <div class="col-9">
                        <select name="beds" class="form-select">
                            <option value="" class="d-none">Choose a bed size</option>
                            <option value="Small bed" @selected($room->beds == "Small bed")>Small bed</option>
                            <option value="Double/Full bed" @selected($room->beds == "Double/Full bed")>Double/Full bed</option>
                            <option value="Medium bed" @selected($room->beds == "Medium bed")>Medium bed</option>
                            <option value="Queen bed" @selected($room->beds == "Queen bed")>Queen bed</option>
                            <option value="King bed" @selected($room->beds == "King bed")>King bed</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="number" name="bed_count" class="form-control" value="{{ $room->bed_count, old('bed_count') }}"
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
                            <input class="form-check-input" name="services[]" type="checkbox"
                            @foreach ($oldServices as $oldService)
                                @if($service->name == $oldService)
                                    checked
                                @endif
                            @endforeach
                            value="{{ $service->name }}" id="{{ $service->id }}">
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
                <textarea name="description" class="form-control" cols="30" rows="5">{{ $room->description, old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6 mb-2">
                <label>Status</label>
                <div class="form-check">
                    <input class="form-check-input" name="status" value="Available" @checked($room->status == 'Available') type="radio" checked role="switch" id="available">
                    <label class="form-check-label" for="available">Available</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="status" value="Maintenance" @checked($room->status == 'Maintenance') type="radio" role="switch" id="maintenance">
                    <label class="form-check-label" for="maintenance">Maintenance</label>
                </div>
            </div>


            <div class="col-12 mb-2">
                <button class="btn btn-primary float-end">Save</button>
            </div>
        </div>
    </form>
@endsection
