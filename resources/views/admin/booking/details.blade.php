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
            <h4 class="text-muted">Booking Information</h4>
        </div>
        {{-- {{ $booking }} --}}

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Name :</div>
                        <div class="col">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Email :</div>
                        <div class="col">{{ $booking->user->email }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Phone :</div>
                        <div class="col">{{ $booking->user->phone }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Nationality :</div>
                        <div class="col">{{ $booking->user->nationality }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">NRC Number :</div>
                        <div class="col">{{ $booking->user->NRC }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Passport Number :</div>
                        <div class="col">{{ $booking->user->passport }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Room Number :</div>
                        <div class="col">{{ $booking->room->room_number }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Check in :</div>
                        <div class="col">{{ $booking->check_in }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Check out :</div>
                        <div class="col">{{ $booking->check_out }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Adult :</div>
                        <div class="col">{{ $booking->adult }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Child :</div>
                        <div class="col">{{ $booking->child }}</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Extra Services :</div>
                        <div class="col">
                        @foreach ($ext_services as $ext_service)
                            {{ $ext_service->name }}
                        @endforeach
                        </div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Price :</div>
                        <div class="col">{{ $booking->price }} Kyats</div>
                    </div>
                    <div class="row bg-white p-2 mb-1">
                        <div class="col-5">Fitst Charge :</div>
                        <div class="col">{{ $booking->first_charge }} Kyats</div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">Payment</div>
                    </div>
                    <div class="row">
                        <img src="{{ url('asset/images/'.$booking->payment_ss) }}" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- table end -->
    </section>
@endsection
