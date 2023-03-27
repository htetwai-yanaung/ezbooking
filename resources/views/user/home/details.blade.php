@extends('user.layouts.app')

@section('content')
<section class="mb-b">

    {{-- <div class="container">
        <div class="row shadow rounded overflow-hidden">
            <div class="col-md-12 col-lg-6 px-0">
                <div class="swiper mySwiper bg-light"  style="height: 400px">
                    <div class="swiper-wrapper">
                        @foreach ($images as $key=>$image)
                        <div class="swiper-slide">
                            <img src="{{ url('asset/images/'.$image) }}" class="d-block w-100 h-100 mx-auto object-fit-cover" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 px-0">
                <div class="row">
                    @for ($i=0;$i<4;$i++)
                    <div class="col-3 col-md-3 col-lg-6 px-0" id="side-img">
                        <img src="{{ url('asset/images/'.$images[$i]) }}" alt="...">
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div> --}}

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Book As Guest or User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="">Are you a guest or user?</h5>
                    <div>
                        <a href="#registeration" class="text-decoration-none">
                            <button class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close" id="iamGuest">Guest</button>
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="container-sm px-sm-1" style="margin: 50px auto;">
        <form action="{{ route('bookingData', $room->id) }}" method="get" enctype="multipart/form-data" class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="rounded-3 p-2 pt-0 mb-3">
                    <div class="content h-100 d-flex flex-column justify-content-between">

                        @if (!Auth::check())
                            <h5>{{ $room->price }} Kyats/Night</h5>
                        @else
                            <h5>@if (Auth::user()->nationality == 'Myanmar')
                                {{ $room->price }} Kyats
                            @else
                                ${{ $room->usd }}
                            @endif /Night</h5>
                        @endif
                        <h3>{{ $room->title }}</h3>
                        <p>{{ $room->description }}</p>
                        <div class="container">
                            <div class="row">
                                @foreach (json_decode($room->services) as $room_service)
                                <div class="col-6 col-md-6 col-lg-4 p-0">
                                    @foreach ($freeServices as $freeService)
                                        @if ($freeService->id == $room_service)
                                        <i class="uil uil-check-circle text-success"></i> {{ $freeService->name }}
                                        @endif
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="">
                    <h3>Room Information</h3>
                    <div class="row">
                        <div class="col"><span class="h6">Bed</span></div>
                        <div class="col">{{ $room->bed_count }} - {{ $room->beds }}</div>
                    </div>
                    <div class="row">
                        <div class="col"><span class="h6">Room type</span></div>
                        <div class="col">{{ $room->roomType->name }}</div>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="swiper mySwiper bg-light rounded"  style="height: 350px">
                    <div class="swiper-wrapper">
                        @foreach ($images as $key=>$image)
                        <div class="swiper-slide">
                            <img src="{{ url('asset/images/'.$image) }}" class="d-block w-100 h-100 mx-auto object-fit-cover" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="container mt-2">
                    <div class="row gap-2">
                        @for ($i=0;$i<4;$i++)
                        <div class="col px-0" id="side-img">
                            <img src="{{ url('asset/images/'.$images[$i]) }}" alt="..." class="rounded">
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="content h-100 d-flex flex-column justify-content-between">
                    <h5>{{ $room->price }} Kyats/Night</h5>
                    <h3>{{ $room->title }}</h3>
                    <p>{{ $room->description }}</p>
                    <div class="container">
                        <div class="row">
                            @foreach (json_decode($room->services) as $room_service)
                            <div class="col-6 col-md-6 col-lg-4 p-0">
                                @foreach ($freeServices as $freeService)
                                    @if ($freeService->id == $room_service)
                                    <i class="uil uil-check-circle text-success"></i> {{ $freeService->name }}
                                    @endif
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <h3>Room Information</h3>
                    <div class="row">
                        <div class="col"><span class="h6">Bed</span></div>
                        <div class="col">{{ $room->bed_count }} - {{ $room->beds }}</div>
                    </div>
                    <div class="row">
                        <div class="col"><span class="h6">Room type</span></div>
                        <div class="col">{{ $room->roomType->name }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- <div class="rounded-3 shadow-sm bg-white p-3 pt-0">
        <h3 class="text-center p-3">Registeration</h3>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-6 mb-3 mb-lg-0">
                <label class="h5" for="">First Name</label>
                <input type="text" name="guestFirstName" class="form-control" placeholder="Enter your first name">
                @error('guestFirstName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6">
                <label class="h5" for="">Last Name</label>
                <input type="text" name="guestLastName" class="form-control" placeholder="Enter your last name">
                @error('guestLastName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-6 mb-3 mb-lg-0">
                <label class="h5" for="">Phone Number</label>
                <input type="number" name="guestPhone" class="form-control" placeholder="Enter your phone number">
                @error('guestPhone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6">
                <label class="h5" for="">Email</label>
                <input type="email" name="guestEmail" class="form-control" placeholder="Enter your email">
                @error('guestEmail')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 col-lg-6 mb-3 mb-lg-0">
                <label class="h5" for="">Nationality</label>
                <select name="guestNationality" id="nationality" class="form-select">
                    <option value="" class="d-none">Country</option>
                    <option value="myanmar" selected>Myanmar</option>
                    <option value="foreign">Foreign</option>
                </select>
                @error('guestNationality')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 col-lg-6" id="address">
                <label class="h5" for="">Address</label>
                <input type="text" name="guestAddress" class="form-control" placeholder="Enter your address">
                @error('guestAddress')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-4">
            <div class="col" id="NRC">
                <label for="" class="h5">NRC Number</label>
                <input type="text" class="form-control" name="nrc" placeholder="eg: 12/MaGaTa(N)123456">
                @error('nrc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col" id="Passport">
                <label for="" class="h5">Passport</label>
                <input type="text" class="form-control" name="passport" placeholder="your passport number">
                @error('passport')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
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
    </div> --}}
</section>
@endsection

@section('scriptSource')
<script src="{{ url('asset/js/room-details.js') }}"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
    //   slidesPerView: 4,
    //   spaceBetween: 30,
    //   pagination: {
    //     el: ".swiper-pagination",
    //     clickable: true,
    //   },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
</script>
{{-- <script>
    $(document).ready(function() {

        $('#registeration').hide();
        $('#bookBtn').click(function() {
            console.log('click');
        })
        $('#iamGuest').click(function() {
            $('#registeration').show();
        })


        $('.payment-photo-container').hide();

        $('#payment_ss').change(function(e){
            console.log(e.target.files);
            document.querySelector('#payment_photo').src = URL.createObjectURL(e.target.files[0])
            document.querySelector('#payment_photo2').src = URL.createObjectURL(e.target.files[0])
            $('.payment-photo-container').show();
        })

        $nationality = localStorage.getItem('nationality');
        $('#Passport').hide();
        if($nationality == 'myanmar'){
            $('#nationality option[value="myanmar"]').prop('selected', true);
            $('#NRC').show();
            $('#address').show();
            $('#Passport').hide();
        }
        if($nationality == 'foreign'){
            $('#nationality option[value="foreign"]').prop('selected', true);
            $('#NRC').hide();
            $('#address').hide();
            $('#Passport').show();
        }

        $('#nationality').change(function(e) {
            if(e.target.value == 'myanmar'){
                $('#NRC').show();
                $('#address').show();
                $('#Passport').hide();
                localStorage.setItem('nationality', 'myanmar');
            }else{
                $('#NRC').hide();
                $('#address').hide();
                $('#Passport').show();
                localStorage.setItem('nationality', 'foreign');
            }
        })

        $nationality2 = localStorage.getItem('nationality2');
        $('#Passport2').hide();
        if($nationality2 == 'myanmar'){
            $('#nationality2 option[value="myanmar"]').prop('selected', true);
            $('#NRC2').show();
            $('#address2').show();
            $('#Passport2').hide();
        }
        if($nationality2 == 'foreign'){
            $('#nationality2 option[value="foreign"]').prop('selected', true);
            $('#NRC2').hide();
            $('#address2').hide();
            $('#Passport2').show();
        }

        $('#nationality2').change(function(e) {
            if(e.target.value == 'myanmar'){
                $('#NRC2').show();
                $('#address2').show();
                $('#Passport2').hide();
                localStorage.setItem('nationality2', 'myanmar');
            }else{
                $('#NRC2').hide();
                $('#address2').hide();
                $('#Passport2').show();
                localStorage.setItem('nationality2', 'foreign');
            }
        })

        $originalPrice = <?php echo $room->price ?>;
        $servicePrice = 0;

        $checkIn = {
            year: 1,
            month: 2,
            day: 3,
        };

        $checkOut = {
            year: 1,
            month: 2,
            day: 3,
        };

        $total_day = 1;
        $check_in_date = '';
        $check_out_date = '';
        $adult = 1;
        $child = 0;
        $amount = 0;
        $dinner = null;
        $driver = null;
        $room_id = $('#room_id').val();
        $('#checkIn').change(function(e){
            [$checkIn.year, $checkIn.month, $checkIn.day] = e.target.value.split('-');
            calculateDayAndPrice();
            $check_in_date = e.target.value;
            localStorage.setItem('check_in', $check_in_date);
        })

        $('#checkOut').change(function(e){
            [$checkOut.year, $checkOut.month, $checkOut.day] = e.target.value.split('-');
            calculateDayAndPrice();
            $check_out_date = e.target.value;
            localStorage.setItem('check_out', $check_out_date);
        })

        $('#adult').change(function(e) {
            $adult = e.target.value;
            localStorage.setItem('adult', $adult);
        })
        $('#child').change(function(e) {
            $child = e.target.value;
            localStorage.setItem('child', $child);
        })

        calculateDayAndPrice = () => {
            if($checkIn.year == $checkOut.year){
                if($checkIn.month == $checkOut.month){
                    $total_day = $checkOut.day*1 - $checkIn.day*1;
                    result();
                    console.log($total_day);
                }else{
                    $checkin_month_dates = new Date($checkIn.year,$checkIn.month,0).getDate();
                    $total_day = ($checkin_month_dates - $checkIn.day*1) + $checkOut.day*1;
                    result();
                    console.log($total_day);
                }
            }
        }

        $wifi = 0;

        $('#services').change(function() {
            if(this.value == 1){
                $wifi = 5;
            }else if(this.value == 2){
                $wifi = 10;
            }else if(this.value == 3){
                $wifi = 50;
            }else{
                $wifi = 0;
            }
            console.log($wifi);
            result();
        })

        $('#breakfast').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 30;
                result();
            }
            else {
                $servicePrice -= 30;
                result();
            }
        });

        $('#dinner').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 40;
                $dinner = 'dinner';
                result();
            }
            else {
                $servicePrice -= 40;
                $dinner = null;
                result();
            }
        })

        $('#driver').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 15;
                $driver = 'driver';
                result();
            }
            else {
                $servicePrice -= 15;
                $driver = null;
                result();
            }
        })

        result = () => {
            $finalResult = ($servicePrice + $originalPrice + $wifi) * $total_day;
            $('#total').html($finalResult);
            $('#price').val($finalResult);
            $amount = $finalResult;
            localStorage.setItem('amount', $amount);
            localStorage.setItem('adult', $adult);
            localStorage.setItem('child', $child);
            localStorage.setItem('room_id', $room_id);
            localStorage.setItem('dinner', $dinner);
            localStorage.setItem('driver', $driver);
        }
    });
</script> --}}
@endsection
