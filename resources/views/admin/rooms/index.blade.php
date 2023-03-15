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
                    <th scope="col">Room No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Price(Kyat)</th>
                    <th scope="col">USD</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td class="align-middle" scope="row">{{ $room->id }}</td>
                    <td class="align-middle">{{ $room->room_number }}</td>
                    <td class="align-middle">{{ $room->title }}</td>
                    <td class="align-middle">{{ $room->roomType->name }}</td>
                    <td class="align-middle">{{ $room->beds }}, {{ $room->bed_count }}</td>
                    <td class="align-middle">{{ $room->price }} Kyats</td>
                    <td class="align-middle">${{ $room->usd }}</td>
                    <td class="align-middle">${{ $room->discount }}%</td>
                    <td class="align-middle">{{ $room->status }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.roomEdit', $room->id) }}" class="action edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="" class="action delete"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table end -->
@endsection
