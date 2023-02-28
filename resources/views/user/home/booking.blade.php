@extends('user.layouts.app')

@section('content')
    <section style="margin: 10rem 0; padding: 0 5rem;">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @foreach ($roomTypes as $roomType)
        <div class="d-flex mb-5" id="room-container">
            <div class="img">
                <img src="{{ $roomType->cover_photo }}" alt="">
            </div>
            <div class="content-container">
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
                            <div class="col-4 p-0">Breakfast</div>
                        </div>
                    </div>
                    <a href="{{ route('room.details',$roomType->id) }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection
