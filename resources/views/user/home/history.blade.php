@extends('user.layouts.app')

@section('content')
    <section style="margin: 8rem 0;" class="px-3">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('room.index') }}" class="text-decoration-none"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                </div>
            </div>
            <div class="row" style="overflow: auto">
                <div class="col">
                    @foreach ($bookings as $booking)
                    <table class="table shadow-sm" style="min-width: 900px;">
                        <thead class="bg-light">
                            <tr>
                                <th>Booking No.</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Adult</th>
                                <th>Child</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($booking as $b)
                                <tr>
                                    <td>{{ $b->booking_number }}</td>
                                    <td>{{ $b->room->room_number }}</td>
                                    <td>{{ $b->check_in }}</td>
                                    <td>{{ $b->check_out }}</td>
                                    <td>{{ $b->adult }}</td>
                                    <td>{{ $b->child }}</td>
                                    <td>
                                        @if (Auth::user()->nationality == "myanmar")
                                            <span class="kyats">{{ $b->room->price * $b->total_days }} Kyats</span>
                                        @else
                                            <span class="usd">$ {{ $b->room->usd * $b->total_days }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($b->status == '0')
                                            <span class="fw-bold text-danger">Reject</span>
                                        @elseif ($b->status == '1')
                                            <span class="fw-bold text-warning">Panding</span>
                                        @else
                                            <span class="fw-bold text-success">Success</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class=""></td>
                                    <td class="fw-bold">Total</td>
                                    <td>
                                        @if (Auth::user()->nationality == "myanmar")
                                        <?php
                                        $price = 0;
                                        foreach ($booking as $key => $b) {
                                            $price += $b->room->price;
                                        }
                                        echo $price * $b->total_days . " Kyats";
                                        ?>
                                        @else
                                        <?php
                                        $price = 0;
                                        foreach ($booking as $key => $b) {
                                            $price += $b->room->usd;
                                        }
                                        echo "$ " . $price * $b->total_days;
                                        ?>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class=""></td>
                                    <td class="fw-bold">Deposit</td>
                                    <td>
                                        @if (Auth::user()->nationality == "myanmar")
                                        {{ $booking[0]->first_charge }} Kyats
                                        @else
                                        $ {{ $booking[0]->first_charge }}
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

