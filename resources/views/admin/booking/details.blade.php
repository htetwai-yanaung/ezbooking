@extends('admin.layouts.app')

@section('content')
    <section>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Calendar View</a>
            <a href="{{ route('booking.list') }}" class="btn btn-outline-primary">List View</a>
        </div>
        <div class="mt-3">
            <div class="container-fluid">
                <div class="row row-cols-2">
                    <div class="col-12 col-sm-6">
                        <div class="container bg-white rounded-3 shadow-sm h-100">
                            <h5 class="pt-3 px-2">Booking Info</h5>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Name :</div>
                                <div class="col">{{ $booking->first_name }} {{ $booking->last_name }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Email :</div>
                                <div class="col">{{ $booking->email }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Phone :</div>
                                <div class="col">{{ $booking->phone }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Nationality :</div>
                                <div class="col">{{ $booking->nationality }}</div>
                            </div>
                            @if ($booking->nationality == 'Myanmar')
                            <div class="row p-2 mb-1">
                                <div class="col-5">NRC Number :</div>
                                <div class="col">{{ $booking->nrc_number }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Address :</div>
                                <div class="col">{{ $booking->address }}</div>
                            </div>
                            @else
                            <div class="row p-2 mb-1">
                                <div class="col-5">Passport Number :</div>
                                <div class="col">{{ $booking->passport }}</div>
                            </div>
                            @endif
                            <div class="row p-2 mb-1">
                                <div class="col-5">Room Number :</div>
                                <div class="col">{{ $booking->room_id }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Check in :</div>
                                <div class="col">{{ $booking->check_in }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Check out :</div>
                                <div class="col">{{ $booking->check_out }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Adult :</div>
                                <div class="col">{{ $booking->adult }}</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Child :</div>
                                <div class="col">{{ $booking->child }}</div>
                            </div>
                            {{-- <div class="row p-2 mb-1">
                                <div class="col-5">Extra Services :</div>
                                <div class="col">
                                @foreach ($ext_services as $ext_service)
                                    {{ $ext_service->name }}
                                @endforeach
                                </div>
                            </div> --}}
                            <div class="row p-2 mb-1">
                                <div class="col-5">Price :</div>
                                <div class="col">{{ $booking->room->price * $booking->total_days }} Kyats</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Deposit :</div>
                                <div class="col">{{ $booking->first_charge }} Kyats</div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col-5">Remain :</div>
                                <div class="col">{{ ($booking->room->price * $booking->total_days) - $booking->first_charge }} Kyats</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="container bg-white rounded-3 shadow-sm h-100">
                            <div class="row p-2 mb-1">
                                <div class="col-5 mt-2">Status :</div>
                                <div class="col">
                                    <select name="" id="status" class="form-select">
                                        <option value="0" @if($booking->status == '0') selected @endif>Reject</option>
                                        <option value="1" @if($booking->status == '1') selected @endif>Panding</option>
                                        <option value="2" @if($booking->status == '2') selected @endif>Success</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row p-2 mb-1">
                                <div class="col">Payment Screenshot :</div>
                            </div>
                            <div class="row">
                                <img src="{{ url('asset/images/'.$booking->payment_ss) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
        $('#status').change(function() {
            $status = $(this).val();
            $bookingId = @json($booking->id);
            $.ajax({
                type: 'get',
                url: 'http://139.180.190.148/ezbooking/public/dashboard/booking/change/status',
                data: {
                    'id' : $bookingId,
                    'status' : $status,
                },
                dataType: 'json',
            })
        })
    })
</script>
@endsection
