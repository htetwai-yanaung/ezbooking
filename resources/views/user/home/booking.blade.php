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

        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    @foreach ($rooms as $room)
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">
                          <div class="col-lg-5">
                            <div class="" style="width: 100%; aspect-ratio: 1/1;">
                                <img src="{{ url('asset/images/'.$room->cover_photo) }}" class="img-fluid rounded-start" alt="..." style="height: 100%; width: 100%; object-fit: cover;">
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="card-body h-100 position-relative">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title lh-1">{{ $room->title }}</h5>
                                    <div class="">
                                        <input type="checkbox" class="btn-check" id="{{ $room->id }}" autocomplete="off">
                                        <label class="btn btn-outline-primary btn-sm" for="{{ $room->id }}"><i class="fa-solid fa-check"></i></label>
                                    </div>
                                </div>
                                <span class="h6 text-primary">{{ $room->price }}Kyat/<small>Night</small></span>
                                <p class="card-text mt-2">{{ $room->description }}</p>
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
                <div class="col-5">
                    <form class="bg-light p-3 border rounded">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Check Out</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Check Out</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Adult</label>
                                <input type="number" value="1" class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Child</label>
                                <input type="number" value="0" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Guest Or User</label>
                                <select name="guest_or_user" id="" class="form-select">
                                    <option value="guest">Guest</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="first name">
                            </div>
                            <div class="col">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email">
                            </div>
                            <div class="col">
                                <label for="">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="phone">
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
                                <input type="email" name="address" class="form-control" placeholder="address">
                            </div>
                            <div class="col">
                                <label for="">NRC Number</label>
                                <input type="number" name="nrc_number" class="form-control" placeholder="nrc number">
                            </div>
                        </div>
                        <div class="row mb-2" id="passport_section">
                            <div class="col">
                                <label for="">Passport</label>
                                <input type="text" name="passport" class="form-control" placeholder="passport number">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <button class="btn btn-primary col-12">Book Now</button>
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
    $(document).ready(function(){
        //nationality
        $('#passport_section').hide();
        $('#nationality').change(function(e){
            if(e.target.value == 'myanmar'){
                $('#address_section').show();
                $('#passport_section').hide();
            }else{
                $('#address_section').hide();
                $('#passport_section').show();
            }
        })
    })
</script>
@endsection

