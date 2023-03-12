<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Account</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <article>
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
            <form action="{{ route('booking') }}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <input type="hidden" name="room_id" id="room_id">
                <input type="hidden" name="check_in" id="check_in">
                <input type="hidden" name="check_out" id="check_out">
                <input type="hidden" name="adult" id="adult">
                <input type="hidden" name="child" id="child">
                <input type="hidden" name="services" id="services">
                <input type="hidden" name="price" id="amount">
                <div class="col-12">
                    <div class="rounded-3 shadow-sm bg-white p-3 pt-0">
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
                                <button class="btn btn-primary float-end" id="bookBtn">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </article>
</body>
<script>
    $(document).ready(function(){
        $room_id = localStorage.getItem('room_id');
        $check_in = localStorage.getItem('check_in');
        $check_out = localStorage.getItem('check_out');
        $adult = localStorage.getItem('adult');
        $child = localStorage.getItem('child');
        $amount = localStorage.getItem('amount');
        $services = localStorage.getItem('dinner') + ', '+ localStorage.getItem('driver');

        $('#check_in').val($check_in);
        $('#room_id').val($room_id);
        $('#check_out').val($check_out);
        $('#adult').val($adult);
        $('#child').val($child);
        $('#services').val($services);
        $('#amount').val($amount);
        console.log($room_id);

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
    })
</script>
</html>
