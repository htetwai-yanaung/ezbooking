@extends('admin.layouts.app')

@section('content')
    <!-- table start -->
    <div class="">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-muted">Room list</h4>
            <a href="{{ route('dashboard.roomCreate') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Room name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td class="align-middle" scope="row">{{ $room->id }}</td>
                    <td class="align-middle">{{ $room->name }}</td>
                    <td class="align-middle">{{ $room->roomType->name }}</td>
                    <td class="align-middle">{{ $room->beds }}, {{ $room->bed_count }}</td>
                    <td class="align-middle">{{ $room->price }}</td>
                    <td class="align-middle">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" @if($room->status == 'Available') checked @endif type="checkbox" role="switch" id="status">
                            <label class="form-check-label" for="status">{{ $room->status == 'Available' ? 'Available' : 'Maintenance' }}</label>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="" class="action edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="" class="action delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table end -->
@endsection
