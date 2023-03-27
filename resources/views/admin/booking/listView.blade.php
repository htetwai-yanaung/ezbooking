@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Calendar View</a>
            <a href="{{ route('booking.list') }}" class="btn btn-outline-primary">List View</a>
        </div>
    <!-- table start -->
    <div class="mt-3">
        <div class="contianer">
            <div class="row">
                <div class="col">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <span class="h5">Booking list</span>
                        </div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="text-body-tertiary">
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Check In</th>
                                        <th scope="col">Check Out</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking_list as $booking)
                                    <tr>
                                        <td class="align-middle" scope="row">{{ $booking->id }}</td>
                                        <td class="align-middle">{{ $booking->first_name ." ".$booking->last_name}}</td>
                                        <td class="align-middle">{{ $booking->room_id }}</td>
                                        <td class="align-middle">{{ $booking->check_in }}</td>
                                        <td class="align-middle">{{ $booking->check_out }}</td>
                                        <td class="align-middle">{{ $booking->room->price * $booking->total_days }}</td>
                                        <td class="align-middle">{{ $booking->phone }}</td>
                                        <td class="align-middle">
                                            @if ($booking->status == '0')
                                                <span class="bg-danger rounded p-2 text-white">Reject</span>
                                            @elseif ($booking->status == '1')
                                                <span class="bg-warning rounded p-2 text-white">Panding</span>
                                            @else
                                                <span class="bg-success rounded p-2 text-white">Success</span>
                                            @endif
                                        </td>
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
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- table end -->
    </section>
@endsection
