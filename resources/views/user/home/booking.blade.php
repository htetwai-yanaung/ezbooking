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
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-4">
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
        </div>
        {{-- design --}}
    </section>
@endsection

