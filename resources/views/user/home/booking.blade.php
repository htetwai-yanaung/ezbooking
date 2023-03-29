@extends('user.layouts.app')

@section('content')
    <section style="margin: 8rem 0;" class="px-3">
        {{-- design --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- <div class="container">
            @foreach ($rooms as $room)
            <div class="row mb-4 rounded-4 shadow-sm overflow-hidden bg-white border">
                <div class="col-md-6 p-0">
                    <img src="{{ url('asset/images/'.$room->cover_photo) }}" alt="" width="100%" height="100%" style="aspect-ratio: 3/2; object-fit: cover;">
                </div>
                <div class="col-md-6 py-3">
                    <div class="content d-flex flex-column justify-content-around h-100">
                        <h5>${{ $room->price }}/<small>Night</small></h5>
                        <h3>{{ $room->name }}</h3>
                        <p>{{ $room->description }}</p>
                        <div class="container mb-3 border-bottom pb-2">
                            <div class="row my-2">
                                <div class="col p-0">1-3 persons</div>
                                <div class="col p-0">{{ $room->bed_count }}-{{ $room->beds }}</div>
                                <div class="col p-0">200 sqft room</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-4 p-0">Free Wifi</div>
                                <div class="col-4 p-0">{{ $room->roomType->name }}</div>
                            </div>
                        </div>
                        <a href="{{ route('room.details',$room->id) }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div> --}}
        {{-- <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                @foreach ($rooms as $room)
                <div class="col mb-3">
                    <div class="card h-100 text-left shadow-sm">
                      <div class="" style="height: 200px; overflow: hidden;">
                        <img class="card-img-top" src="{{ url('asset/images/'.$room->cover_photo) }}" alt="" style="width: 100%; height: 100%; object-fit: cover">
                      </div>
                      <div class="card-body">
                        <h4 class="card-title">{{ $room->name }}</h4>
                        <span class="fw-bold"><span class="fs-4 text-primary">${{ $room->price }}</span>/Night</span>
                        <p class="card-text mt-2">{{ Str::substr($room->description, 0, 100) }} ...</p>
                        <div class="mb-2">
                            @foreach (json_decode($room->services) as $service)
                                <span class="d-block"><i class="uil uil-check-circle text-success"></i> {{ $service }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('room.details',$room->id) }}" class="btn btn-primary">Book Now</a>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}
        {{-- design --}}


        {{-- @foreach ($rooms as $room)
            <div class="">
                <span class="text-danger">{{ $room->title }}</span>
                <ul>
                    @foreach (json_decode($room->services) as $room_service)
                    <li>
                        @foreach ($freeServices as $freeService)
                            @if ($freeService->id == $room_service)
                                {{ $freeService->name }}
                            @endif
                        @endforeach
                    </li>
                    @endforeach
                </ul>
            </div>
        @endforeach --}}

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

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-7">
                    @foreach ($rooms as $room)
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                          <div class="col-sm-6">
                            <div class="image-container">
                                <img src="{{ url('asset/images/'.$room->cover_photo) }}" class="img-fluid rounded-start" alt="..." style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="card-body h-100 position-relative">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title lh-1">{{ $room->title }}</h5>
                                    <div class="">
                                        <input type="checkbox" name="room_id[]" class="btn-check" value="{{ $room->id }},{{ $room->price }},{{ $room->usd }},{{ $room->title }}" id="{{ $room->id }}" autocomplete="off">
                                        <label class="btn btn-outline-primary btn-sm" for="{{ $room->id }}"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>
                                <span class="kyats h6 text-primary">{{ $room->price }}Kyats/<small>Night</small></span>
                                <span class="usd h6 text-primary">$ {{ $room->usd }}/<small>Night</small></span>
                                <p class="card-text mt-2">{{ Str::substr($room->description, 0, 120) }} ...</p>
                                <div class="">
                                    <div class="row">
                                        @foreach (json_decode($room->services) as $room_service)
                                        <div class="col-6">
                                            @foreach ($freeServices as $freeService)
                                                @if ($freeService->id == $room_service)
                                                <i class="uil uil-check-circle text-success"></i> {{ $freeService->name }}
                                                @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                        {{-- @for ($i=1; $i<=4; $i++)
                                            <div class="col-6">
                                                @foreach ($freeServices as $freeService)
                                                    @if ($freeService->id == json_decode($room->services)[$i])
                                                    <i class="uil uil-check-circle text-success"></i>{{ $freeService->name }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endfor --}}
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('room.details',$room->id) }}" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-12 col-md-6 col-lg-5">

                    @error('room_id_arr')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Please!</strong> Select A Room.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror


                    <form action="{{ route('confirmBooking') }}" method="POST" class="bg-light p-3 border rounded" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="room_id_arr" name="room_id_arr">
                        <input type="hidden" id="price" name="price">
                        <input type="hidden" id="total_days" name="total_days">
                        <input type="hidden" id="booking_number" name="booking_number">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Check-In Date</label>
                                <input name="check_in" value="{{ old('check_in') }}" type="date" class="form-control @error('check_in') is-invalid @enderror" placeholder="check in">
                            </div>
                            <div class="col">
                                <label for="">Check-Out Date</label>
                                <input name="check_out" value="{{ old('check_out') }}" type="date" class="form-control @error('check_out') is-invalid @enderror" placeholder="check out">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Adult</label>
                                <input name="adult" value="1" type="number" class="form-control @error('adult') is-invalid @enderror">
                            </div>
                            <div class="col">
                                <label for="">Child</label>
                                <input name="child" value="0" type="number" class="form-control @error('child') is-invalid @enderror">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-2">
                            <div class="col kyats">
                                <label for="">Total</label>
                                <label for="" class="float-end"><span id="total_price">0</span> Kyats</label>
                            </div>
                            <div class="col usd">
                                <label for="">Total</label>
                                <label for="" class="float-end">$ <span id="total_usd">0</span></label>
                            </div>
                        </div>
                        <hr>
                        @if (!Auth::check())
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Login with Guest Or User</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="guestOrUser" value="guest" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Guest
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="guestOrUser" value="user" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      User
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="first name">
                            </div>
                            <div class="col">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="last name">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email">
                            </div>
                            <div class="col">
                                <label for="">Phone</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="phone">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Nationality</label>
                                <select name="nationality" id="nationality" class="form-select">
                                    <option value="myanmar" selected>Myanmar</option>
                                    <option value="foreign">Foreign</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2" id="address_section">
                            <div class="col">
                                <label for="">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" placeholder="address">
                            </div>
                            <div class="col">
                                <label for="">NRC Number</label>
                                <input type="text" name="nrc_number" value="{{ old('nrc_number') }}" class="form-control @error('nrc_number') is-invalid @enderror" placeholder="nrc number">
                            </div>
                        </div>
                        <div class="row mb-2" id="passport_section">
                            <div class="col">
                                <label for="">Passport</label>
                                <input type="text" name="passport" value="{{ old('passport') }}" class="form-control @error('passport') is-invalid @enderror" placeholder="passport number">
                            </div>
                        </div>
                        <hr>
                        @endif
                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="">Payment Method</label>
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
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Deposit Amount</label>
                                <input type="number" name="first_charge" value="{{ old('first_charge') }}" placeholder="Eg. 100000" class="form-control @error('first_charge') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="mb-2" for="">Payment Reciept</label>
                            <div class="col-12 d-flex">
                                <label for="payment_ss" class="bg-white rounded border" id="payment_photo_btn">+</label>
                                <input type="file" name="payment_ss" id="payment_ss" class="d-none">
                                <div class="border rounded payment-photo-container ms-1">
                                    <img src="" class="" data-bs-toggle="modal" data-bs-target="#exampleModal" id="payment_photo">
                                </div>
                            </div>
                            @error('payment_ss')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <button class="btn btn-primary col-12" id="save">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptSource')
<script>
    let calendar = flatpickr("input[type=date]", {
        minDate: "today",
    });
    // console.log(calendar.selectedDates);
</script>
<script>
    $(document).ready(function(){
        //nationality
        $('#passport_section').hide();
        $('#usd').hide();
        $nationality = localStorage.getItem('nationality');
        if($nationality == 'myanmar'){
            $('#nationality option[value="myanmar"]').prop('selected', true);
            $('#address_section').show();
            $('#passport_section').hide();
            $('.kyats').show();
            $('.usd').hide();
        }else{
            $('#nationality option[value="foreign"]').prop('selected', true);
            $('#address_section').hide();
            $('#passport_section').show();
            $('.kyats').hide();
            $('.usd').show();
        }
        $('#nationality').change(function(e){
            if(e.target.value == 'myanmar'){
                $('#address_section').show();
                $('#passport_section').hide();
                $('.kyats').show();
                $('.usd').hide();
                localStorage.setItem('nationality', e.target.value);
            }else{
                $('#address_section').hide();
                $('#passport_section').show();
                $('.kyats').hide();
                $('.usd').show();
                localStorage.setItem('nationality', e.target.value);
            }
        })

        $('.payment-photo-container').hide();

        $('#payment_ss').change(function(e){
            console.log(e.target.files);
            document.querySelector('#payment_photo').src = URL.createObjectURL(e.target.files[0])
            document.querySelector('#payment_photo2').src = URL.createObjectURL(e.target.files[0])
            $('.payment-photo-container').show();
        })

        //btn-check
        $total_price = 0;
        $total_usd = 0;
        $total_day = 1;
        $room_id_arr = [];
        $selected_room = JSON.parse(localStorage.getItem('room_id_arr'));
        // for($i=0;$i<$selected_room.length;$i++){
        //     $room_id_arr.push($selected_room[$i]);
        //     document.getElementById($selected_room[$i]).checked = true
        // }
        // console.log($room_id_arr);




        $('.btn-check').change(function() {
            if ($(this).is(':checked')) {
                [$id, $price, $usd, $title] = $(this).val().split(',');
                $room_id_arr.push($id);
                $('#room_id_arr').val($room_id_arr);

                localStorage.setItem('room_id_arr', JSON.stringify($room_id_arr));
                $total_price += $price*1;
                $total_usd += $usd*1;
                $('#total_price').html($total_price);
                $('#total_usd').html($total_usd);
                total();
            }
            else {
                [$id, $price, $usd, $title] = $(this).val().split(',');
                $index = $room_id_arr.indexOf($id);
                $room_id_arr.splice($index, 1);
                $('#room_id_arr').val($room_id_arr);

                localStorage.setItem('room_id_arr', JSON.stringify($room_id_arr));
                $total_price -= $price*1;
                $total_usd -= $usd*1;
                $('#total_price').html($total_price);
                $('#total_usd').html($total_usd);
                total();
            }
        });

        $('input[name="guestOrUser"]').change(function(e) {
            $role = e.target.value;
            if($role == 'user'){
                location.href = 'http://139.180.190.148/ezbooking/public/login';
            }
        });

        let date1 = new Date();
        let date2 = new Date();

        $('input[name="check_in"]').change(function(e){
            date1 = new Date(e.target.value);
            calDay(date1, date2);
        })
        $('input[name="check_out"]').change(function(e){
            date2 = new Date(e.target.value);
            calDay(date1, date2);
        })

        function calDay(date1, date2){
            // Calculate the time difference between the two dates in milliseconds
            const timeDiff = Math.abs(date2.getTime() - date1.getTime());
            // Calculate the number of days between the two dates by dividing the time difference by the number of milliseconds in a day (86400000)
            const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            $total_day = diffDays;
            console.log($total_day);
            total();
        }

        total = () => {
            $final_price = $total_price * $total_day;
            $final_usd = $total_usd * $total_day;
            $('#total_price').text($final_price);
            $('#total_usd').text($final_usd);
            $('#price').val($final_price);
            $('#total_days').val($total_day);
        }

        $('#save').click(function() {
            $random = Math.floor(Math.random() * 100001);
            $clCode = 'EZB'+$random;
            $('#booking_number').val($clCode);
        })

    })
</script>
@endsection

