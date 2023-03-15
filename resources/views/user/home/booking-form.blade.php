@extends('user.layouts.app')

@section('content')
<section style="min-height: 100vh">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Your Photo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" id="payment_photo2" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-2">
                <div class="container border rounded-2 shadow-sm">
                    <div class="row bg-light p-1 text-center">
                        <span class="h3">Receipt</span>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Check in</div>
                        <div class="col h6">{{ $booking_data['check_in'] }}</div>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Check out</div>
                        <div class="col h6">{{ $booking_data['check_out'] }}</div>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Total days</div>
                        <div class="col h6">{{ $booking_data['total_day'] }}</div>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Adult</div>
                        <div class="col h6">{{ $booking_data['adult'] }}</div>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Child</div>
                        <div class="col h6">{{ $booking_data['child'] }}</div>
                    </div>
                    <div class="row p-1 my-1">
                        <div class="col h6">Room Price</div>
                        <div class="col h6">{{ $booking_data['total_day'] }} &times; {{ $room->price }}</div>
                    </div>
                    @foreach ($extServices as $extService)
                    <div class="row p-1 my-1">
                        <div class="col h6">{{ $extService->name }}</div>
                        <div class="col h6">{{ $booking_data['total_day'] }} &times; {{ $extService->price }}</div>
                    </div>
                    @endforeach
                    <div class="row px-1 py-2 bg-light" style="border-top: 1px dashed #999;">
                        <div class="col h6">Total</div>
                        <div class="col h6">{{ $booking_data['price'] }} Kyats</div>
                    </div>
                </div>

            </div>
            <form action="{{ route('confirmBooking') }}" method="POST" enctype="multipart/form-data" class="col-12 col-md-6 mb-2">
                @csrf
                <input type="hidden" name="check_in" value="{{ $booking_data['check_in'] }}">
                <input type="hidden" name="check_out" value="{{ $booking_data['check_out'] }}">
                <input type="hidden" name="adult" value="{{ $booking_data['adult'] }}">
                <input type="hidden" name="child" value="{{ $booking_data['child'] }}">
                <input type="hidden" name="room_id" value="{{ $booking_data['room_id'] }}">
                <input type="hidden" name="price" value="{{ $booking_data['price'] }}">
                <input type="hidden" name="ext_services" value="{{ $extServices }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="container border rounded-2 shadow-sm">
                    <div class="row bg-light p-1 text-center">
                        <span class="h3">Confirm Payment</span>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="h5">Reserve</label>
                            <input type="number" name="first_charge" class="form-control" placeholder="amount">
                        </div>
                        @error('payment_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="" class="h5">Payment Method</label>
                            {{-- payment type  --}}
                            <ul class="nav nav-pills bg-light mb-1" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                <button class="nav-link tab-link active me-4" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">1. Mobile Pay</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                <button class="nav-link tab-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">2. Bank Transfer</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="kbz_pay" name="payment_type" id="pay_one" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <label class="ms-2" for="pay_one">KBZ Pay</label>
                                            </div>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="aya_pay" name="payment_type" id="pay_two" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <label class="ms-2" for="pay_two">AYA Pay</label>
                                            </div>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="wave_pay" name="payment_type" id="pay_three" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                <label class="ms-2" for="pay_three">WAVE Pay</label>
                                            </div>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="kbz_bank" name="payment_type" id="pay_four" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                <label class="ms-2" for="pay_four">KBZ Bank</label>
                                            </div>
                                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="aya_bank" name="payment_type" id="pay_five" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                                <label class="ms-2" for="pay_five">AYA Bank</label>
                                            </div>
                                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="p-2">
                                                <input type="radio" value="yoma_bank" name="payment_type" id="pay_six" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                                <label class="ms-2" for="pay_six">Yoma Bank</label>
                                            </div>
                                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                                                <div class="py-2 ps-4 bg-light accordion-body">
                                                    <span class="ms-2">Admin: 09971234567</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('payment_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- payment type  --}}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="h5" for="">Upload Payment Screenshort</label>
                        <div class="col-12 d-flex">
                            <label for="payment_ss" class="bg-light rounded border" id="payment_photo_btn">+</label>
                            <input type="file" name="payment_ss" id="payment_ss" class="d-none">
                            <div class="border rounded payment-photo-container ms-1">
                                <img src="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" id="payment_photo">
                            </div>
                        </div>
                        @error('payment_ss')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <div class="row">
            <div class="col-6 rounded-3 shadow-sm bg-white p-3 pt-0">
                <div class="row mb-4">
                    <div class="col">
                        <label for="" class="h5">Payment</label>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Mobile Pay</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Bank Account</button>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 rounded-bottom pt-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="kbz_pay" data-bs-toggle="collapse" data-bs-target="#kbzpay" aria-expanded="false" aria-controls="kbzpay" name="payment_method" id="kbz">
                                            <label for="kbz">KBZ Pay</label>
                                        </div>
                                        <div class="collapse" id="kbzpay">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="aya_pay" data-bs-toggle="collapse" data-bs-target="#ayapay" aria-expanded="false" aria-controls="ayapay" name="payment_method" id="aya">
                                            <label for="aya">AYA Pay</label>
                                        </div>
                                        <div class="collapse" id="ayapay">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="wave_pay" data-bs-toggle="collapse" data-bs-target="#wavepay" aria-expanded="false" aria-controls="wavepay" name="payment_method" id="wave">
                                            <label for="wave">WAVE Pay</label>
                                        </div>
                                        <div class="collapse" id="wavepay">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="Kbz_bank" data-bs-toggle="collapse" data-bs-target="#kbz_bank" aria-expanded="false" aria-controls="kbz_bank" name="payment_method" id="kbzBank">
                                            <label for="kbzBank">KBZ Bank</label>
                                        </div>
                                        <div class="collapse" id="kbz_bank">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="aya_bank" data-bs-toggle="collapse" data-bs-target="#aya_bank" aria-expanded="false" aria-controls="aya_bank" name="payment_method" id="ayaBank">
                                            <label for="ayaBank">AYA Bank</label>
                                        </div>
                                        <div class="collapse" id="aya_bank">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div>
                                            <input type="radio" value="yoma_bank" data-bs-toggle="collapse" data-bs-target="#yona_bank" aria-expanded="false" aria-controls="yona_bank" name="payment_method" id="yonaBank">
                                            <label for="yonaBank">YOMA Bank</label>
                                        </div>
                                        <div class="collapse" id="yona_bank">
                                            <div class="card card-body">
                                                Admin: 09123456789
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('payment_method')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="h5" for="">Upload Payment Screenshort</label>
                    <div class="col-12 d-flex">
                        <label for="payment_ss" class="bg-light rounded border" id="payment_photo_btn">+</label>
                        <input type="file" name="payment_ss" id="payment_ss" class="d-none">
                        <div class="border rounded payment-photo-container ms-1">
                            <img src="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" id="payment_photo">
                        </div>
                        @error('payment_ss')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary float-end">Book Now</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
        $('.payment-photo-container').hide();

        $('#payment_ss').change(function(e){
            console.log(e.target.files);
            document.querySelector('#payment_photo').src = URL.createObjectURL(e.target.files[0])
            document.querySelector('#payment_photo2').src = URL.createObjectURL(e.target.files[0])
            $('.payment-photo-container').show();
        })
    })
</script>
@endsection
