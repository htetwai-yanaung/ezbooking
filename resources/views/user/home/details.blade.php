@extends('user.layouts.app')

@section('content')
<section class="mb-b">

    <div class="container">
        <div class="row shadow rounded overflow-hidden p-3">
            <div class="col-6 px-0">
                <div class="content h-100 d-flex flex-column justify-content-between">
                    <h5>${{ $room->price }}/Night</h5>
                    <h3>{{ $room->name }}</h3>
                    <p>{{ $room->description }}</p>
                    <div class="container">
                        <div class="row my-2">
                            <div class="col p-0"><i class="fa-solid fa-users"></i> 1-3 persons</div>
                            <div class="col p-0"><i class="fa-solid fa-bed"></i> Triple Bed</div>
                            <div class="col p-0"><i class="fa-solid fa-couch"></i> 200 sqft room</div>
                        </div>
                        <div class="row my-2">
                            <div class="col-4 p-0"><i class="fa-solid fa-wifi"></i> Free Wifi</div>
                            <div class="col-4 p-0"><i class="fa-solid fa-bath"></i> 1 Bath</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 bg-danger px-0">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($images as $key=>$image)
                            <div class="carousel-item @if($key == 0) active @endif" style="height: 300px;">
                                <img src="{{ url('asset/images/'.$image) }}" class="d-block w-100 h-100 mx-auto object-fit-cover" alt="...">
                            </div>
                        @endforeach
                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-sm px-sm-1" style="margin: 50px auto;">
        <div class="row">
            {{-- <div class="col-12 col-md-6 mb-3">
                <div class="px-3 bg-white shadow h-100 pb-2 rounded">
                    <h3 class="text-center p-3">Information</h3>
                    <div class="row">
                        <div class="content">
                            <h5>${{ $room->price }}/Night</h5>
                            <h3>{{ $room->name }}</h3>
                            <p>{{ $room->description }}</p>
                            <div class="container mb-3 border-bottom pb-2">
                                <div class="row my-2">
                                    <div class="col p-0">1-3 persons</div>
                                    <div class="col p-0">Triple Bed</div>
                                    <div class="col p-0">200 sqft room</div>
                                </div>
                                <div class="row my-2">
                                    <div class="col-4 p-0">Free Wifi</div>
                                    <div class="col-4 p-0">1 Bath</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="carouselExample" class="carousel carousel-dark slide">
                            <div class="carousel-inner">
                            @foreach ($images as $key=>$image)
                            <div class="carousel-item @if($key == 0) active @endif" style="height: 300px;">
                                <img src="{{ url('asset/images/'.$image) }}" class="d-block h-100 mx-auto object-fit-contain" alt="...">
                            </div>
                            @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-12 col-md-6 mb-3">
                <form action="{{ route('booking') }}" method="POST" class="px-3 bg-white shadow h-100 rounded">
                    <h3 class="text-center p-3">Booking</h3>
                    <input type="hidden" name="room_type_id" value="{{ $room->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : null }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Check-in</label>
                            <input type="date" name="check_in" class="form-control">
                            @error('check_in')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Check-out</label>
                            <input type="date" name="check_out" class="form-control">
                            @error('check_out')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Adult</label>
                            <input type="number" name="adult" value="1" class="form-control">
                            @error('adult')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Children</label>
                            <input type="number" name="child" value="0" class="form-control">
                            @error('child')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="h5" for="">Services</label>
                            <select name="wifi" id="services" class="form-select">
                                <option value="">Wifi</option>
                                <option value="1">Normal - $5/day</option>
                                <option value="2">Strong - $10/day</option>
                                <option value="3">Vip - $50/day</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="breakfast" id="breakfast">
                                <label class="form-check-label" for="breakfast">Breakfast</label>
                                <label class="form-check-label float-end">$30 / Day</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="dinner" id="dinner">
                                <label class="form-check-label" for="dinner">Dinner</label>
                                <label class="form-check-label float-end">$40 / Day</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="driver" id="driver">
                                <label class="form-check-label" for="driver">Driver</label>
                                <label class="form-check-label float-end">$15 / Day</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <button class="btn btn-primary">Book Now</button>
                            <span class="float-end align-middle fw-bold">Total $<span id="total">50</span></span>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
        <form action="{{ route('booking') }}" method="POST" class="row">
            <div class="col-6">
                <div class="rounded-3 shadow bg-white p-3 pt-0">
                    <h3 class="text-center p-3">Booking</h3>
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Check-in</label>
                            <input type="date" name="check_in" id="checkIn" class="form-control">
                            @error('check_in')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Check-out</label>
                            <input type="date" name="check_out" id="checkOut" class="form-control">
                            @error('check_out')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Adult</label>
                            <input type="number" name="adult" value="1" class="form-control">
                            @error('adult')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Children</label>
                            <input type="number" name="child" value="0" class="form-control">
                            @error('child')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="h5" for="">Services</label>
                            <select name="wifi" id="services" class="form-select">
                                <option value="">Wifi</option>
                                <option value="1">Normal - $5/day</option>
                                <option value="2">Strong - $10/day</option>
                                <option value="3">Vip - $50/day</option>
                            </select>
                        </div>
                        {{-- <div class="col">
                            <label class="h5" for="">Services</label>
                            <select name="services" class="form-select">
                                <option value="">Choose service</option>
                                <option value="">Choose service</option>
                                <option value="">Choose service</option>
                                <option value="">Choose service</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="breakfast" id="breakfast">
                                <label class="form-check-label" for="breakfast">Breakfast</label>
                                <label class="form-check-label float-end">$30 / Day</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="dinner" id="dinner">
                                <label class="form-check-label" for="dinner">Dinner</label>
                                <label class="form-check-label float-end">$40 / Day</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check border-bottom py-2">
                                <input class="form-check-input" name="ext_services[]" type="checkbox" value="driver" id="driver">
                                <label class="form-check-label" for="driver">Driver</label>
                                <label class="form-check-label float-end">$15 / Day</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="float-end align-middle fw-bold">Total $<span id="total">{{ $room->price }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="rounded-3 shadow bg-white p-3 pt-0">
                    <h3 class="text-center p-3">Guest</h3>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Name</label>
                            <input type="text" name="guestName" class="form-control" placeholder="Enter your full name">
                            @error('guestName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Email</label>
                            <input type="email" name="guestEmail" class="form-control" placeholder="Enter your email">
                            @error('guestEmail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="h5" for="">Phone Number</label>
                            <input type="number" name="guestPhone" class="form-control" placeholder="Enter your phone number">
                            @error('guestPhone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="h5" for="">Nationality</label>
                            <input type="text" name="guestNationality" class="form-control" placeholder="Eg: Myanmar">
                            @error('guestNationality')
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
            </div>
        </form>
    </div>
    {{-- <div class="container">
        <h3>Lac-Beauport, Canada</h3>
        <div class="container">
            <div class="row" style="border-radius: 12px; overflow: hidden;">
                <div class="col-lg-6 col-sm-12 p-0 pe-1 img-container">
                    <img id="room-img" src="https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720" alt="">
                </div>
                <div class="col-lg-6 col-sm-12 container">
                    <div class="row">
                        <div class="col-6 p-0 pe-1 pb-1 img-container">
                            <img id="room-img" src="https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720" alt="">
                        </div>
                        <div class="col-6 px-0 pb-1 img-container">
                            <img id="room-img" src="https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-0 pe-1 img-container">
                            <img id="room-img" src="https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720" alt="">
                        </div>
                        <div class="col-6 px-0 img-container">
                            <img id="room-img" src="https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p>
                The "MICA", high-end micro-housing located in the heart of the "Maelström" recreational-forestry area. Live the immersive experience of a boreal nature just 25 minutes from Old Quebec. Enjoy panoramic views of Laurentian Park as well as breathtaking sunsets at the highest peak of Lac-Beauport. Discover the unique topography of the mountain by exploring the 20km of trails accessible in any season.
            </p>
        </div>
    </div> --}}
</section>
@endsection

@section('scriptSource')
<script>
    $(document).ready(function() {
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
        $('#checkIn').change(function(e){
            [$checkIn.year, $checkIn.month, $checkIn.day] = e.target.value.split('-');
            calculateDayAndPrice();
        })

        $('#checkOut').change(function(e){
            [$checkOut.year, $checkOut.month, $checkOut.day] = e.target.value.split('-');
            calculateDayAndPrice();
        })

        calculateDayAndPrice = () => {
            if($checkIn.year == $checkOut.year){
                if($checkIn.month == $checkOut.month){
                    $total_day = $checkOut.day*1 - $checkIn.day*1;
                    $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
                    console.log($total_day);
                }else{
                    $checkin_month_dates = new Date($checkIn.year,$checkIn.month,0).getDate();
                    $total_day = ($checkin_month_dates - $checkIn.day*1) + $checkOut.day*1;
                    $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
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
            $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
        })

        $('#breakfast').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 30;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
            else {
                $servicePrice -= 30;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
        });

        $('#dinner').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 40;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
            else {
                $servicePrice -= 40;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
        })

        $('#driver').change(function() {
            if ($(this).is(':checked')) {
                $servicePrice += 15;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
            else {
                $servicePrice -= 15;
                $('#total').html(($servicePrice + $originalPrice + $wifi) * $total_day);
            }
        })
    });
</script>
@endsection
