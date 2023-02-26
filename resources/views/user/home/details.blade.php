@extends('user.layouts.app')

@section('content')
<section style="margin: 10rem 0;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row mb-2">
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-01.jpg" alt="">
                    </div>
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-04.jpg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-05.jpg" alt="">
                    </div>
                    <div class="img-container col-6 px-1">
                        <img id="room-img" src="https://demo.ovatheme.com/hotelft/wp-content/uploads/2022/02/gallery-product-room-07.jpg" alt="">
                    </div>
                </div>
            </div>
            <form action="" class="col">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <label class="h5" for="">Check-in</label>
                        <input type="date" name="" class="form-control">
                    </div>
                    <div class="col">
                        <label class="h5" for="">Check-out</label>
                        <input type="date" name="" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="h5" for="">Adult</label>
                        <input type="number" name="" value="1" class="form-control">
                    </div>
                    <div class="col">
                        <label class="h5" for="">Children</label>
                        <input type="number" name="" value="0" class="form-control">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <label class="h5" for="">Services</label>
                        <select name="services" id="" class="form-select">
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="h5" for="">Services</label>
                        <select name="services" id="" class="form-select">
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                            <option value="">Choose service</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-check border-bottom py-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck1">
                            <label class="form-check-label" for="flexCheck1">Breakfast</label>
                            <label class="form-check-label float-end" for="flexCheck1">$30 / Day</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check border-bottom py-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck2">
                            <label class="form-check-label" for="flexCheck2">Dinner</label>
                            <label class="form-check-label float-end" for="flexCheck2">$40 / Day</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check border-bottom py-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheck3">
                            <label class="form-check-label" for="flexCheck3">Driver</label>
                            <label class="form-check-label float-end" for="flexCheck3">$15 / Day</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary">Book Now</button>
                        <span class="float-end">Total $50</span>
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
