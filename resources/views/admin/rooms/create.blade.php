@extends('admin.layouts.app')

@section('content')
    <h4 class="text-muted">Create Room</h4>
    <form action="" class="bg-white p-3 rounded shadow-sm">
        <div class="row">
            <div class="col-6 mb-2">
                <label for="">Room Name</label>
                <input type="text" name="name" class="form-control" placeholder="input name">
            </div>
            <div class="col-6 mb-2">
                <label for="">Room Type</label>
                <select name="room_type" class="form-select">
                    <option value="">Choose a room type</option>
                    <option value="">suite</option>
                    <option value="">family</option>
                </select>
            </div>
            <div class="col-6 mb-2">
                <label for="">Price</label>
                <input type="number" name="price" class="form-control" placeholder="input name">
            </div>
            <div class="col-6 mb-2">
                <label for="">Beds</label>
                <div class="row">
                    <div class="col-9">
                        <select name="bed_type" class="form-select">
                            <option value="">Choose a bed type</option>
                            <option value="">Single bed</option>
                            <option value="">Double bed</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="number" name="bed" class="form-control" value="1"
                            placeholder="input total bed">
                    </div>
                </div>
            </div>
            <div class="col-6 mb-2">
                <label for="">Cover Photo</label>
                <input type="file" name="cover_photo" class="form-control">
            </div>
            <div class="col-12 mb-2">
                <label for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <div class="col-6 mb-2">
                <label>Status</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" name="status" type="checkbox" role="switch" id="status">
                    <label class="form-check-label" for="status">Available</label>
                </div>
            </div>
            <div class="col-6 mb-2">
                <label>Images</label>
                <label for="images" class="btn btn-outline-secondary col-12">Choose Images</label>
                <input type="file" name="cover_photo" class="d-none" id="images">
            </div>

            <div class="col-12 mb-2">
                <button class="btn btn-primary float-end">Save</button>
            </div>
        </div>
    </form>
@endsection
