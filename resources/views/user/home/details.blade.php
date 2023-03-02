@extends('user.layouts.app')

@section('content')
<section class="mb-b">
    <div class="container-sm px-sm-1" style="margin: 100px auto;">
        <div class="row">
            <div class="col-md col-sm-12 bg-white shadow-sm mx-2 pb-2 rounded">
                <h3 class="text-center p-3">Information</h3>
                <div class="row">
                    <div class="content">
                        <h5>${{ $roomType->price }}/Night</h5>
                        <h3>{{ $roomType->name }}</h3>
                        <p>{{ $roomType->description }}</p>
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
                          <div class="carousel-item" style="height: 300px;">
                            <img src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" class="d-block h-100 mx-auto object-fit-contain" alt="...">
                          </div>
                          <div class="carousel-item active" style="height: 300px;">
                            <img src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" class="d-block h-100 mx-auto object-fit-contain" alt="...">
                          </div>
                          <div class="carousel-item" style="height: 300px;">
                            <img src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" class="d-block h-100 mx-auto object-fit-contain" alt="...">
                          </div>
                          <div class="carousel-item" style="height: 300px;">
                            <img src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" class="d-block h-100 mx-auto object-fit-contain" alt="...">
                          </div>
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
                {{-- <div class="row mb-2 p-1">
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" alt="">
                    </div>
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-04.jpg" alt="">
                    </div>
                </div>
                <div class="row p-1">
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-05.jpg" alt="">
                    </div>
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-07.jpg" alt="">
                    </div>
                </div> --}}
            </div>
            <form action="{{ route('booking',Auth::user()->id) }}" method="POST" class="col-md col-sm-12 bg-white shadow-sm mx-2 rounded">
                <h3 class="text-center p-3">Booking</h3>
                <input type="hidden" name="room_type_id" value="{{ $roomType->id }}">
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
                <div class="row mb-4">
                    <div class="col">
                        <button class="btn btn-primary">Book Now</button>
                        <span class="float-end align-middle fw-bold">Total $<span id="total">50</span></span>
                    </div>
                </div>
            </form>
        </div>
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
        $total = 50;
        $wifi = 0;
        $('#services').change(function() {
            if(this.value == 1){
                $wifi = 5;
                console.log(this.value)
            }else if(this.value == 2){
                $wifi = 10;
                console.log(this.value)
            }else if(this.value == 3){
                $wifi = 50;
                console.log(this.value)
            }else{
                $wifi = 0;
            }
            $('#total').text($total + $wifi)
        })
        $('#breakfast').change(function() {
            if ($(this).is(':checked')) {
                $total += 30;
                console.log($total);
                $('#total').text($total + $wifi);
            }
            else {
                $total -= 30;
                console.log($total);
                $('#total').text($total + $wifi);
            }
        });
        $('#dinner').change(function() {
            if ($(this).is(':checked')) {
                $total += 40;
                console.log($total);
                $('#total').text($total + $wifi);
            }
            else {
                $total -= 40;
                console.log($total);
                $('#total').text($total + $wifi);
            }
        })
        $('#driver').change(function() {
            if ($(this).is(':checked')) {
                $total += 15;
                console.log($total);
                $('#total').text($total + $wifi);
            }
            else {
                $total -= 15;
                console.log($total);
                $('#total').text($total + $wifi);
            }
        })
    });
</script>
@endsection
