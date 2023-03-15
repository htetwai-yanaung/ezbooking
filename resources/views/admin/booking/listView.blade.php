@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Calendar View</a>
            <a href="{{ route('booking.list') }}" class="btn btn-outline-primary">List View</a>
        </div>
    <!-- table start -->
    <div class="mt-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="text-muted">Booking list</h4>
        </div>
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Room Number</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>
                    <th scope="col">Price</th>
                    <th scope="col">Phone</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking_list as $booking)
                <tr>
                    <td class="align-middle" scope="row">{{ $booking->id }}</td>
                    <td class="align-middle">{{ $booking->user->first_name ." ".$booking->user->last_name}}</td>
                    <td class="align-middle">{{ $booking->room->room_number }}</td>
                    <td class="align-middle">{{ $booking->check_in }}</td>
                    <td class="align-middle">{{ $booking->check_out }}</td>
                    <td class="align-middle">{{ $booking->price }}</td>
                    <td class="align-middle">{{ $booking->user->phone }}</td>
                    {{-- <td class="align-middle">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="status" @if($room->status == 'Available') checked @endif type="checkbox" role="switch" id="status">
                            <label class="form-check-label" for="status">{{ $room->status == 'Available' ? 'Available' : 'Maintenance' }}</label>
                        </div>
                    </td> --}}
                    <td class="text-center">
                        <a href="{{ route('booking.details', $booking->id) }}" class="action edit"><i class="fa-solid fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- table end -->
    </section>
@endsection
