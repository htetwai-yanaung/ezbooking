<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="{{ url('asset/css/dashboard.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body style="min-height: 100vh;" class="d-flex align-items-center">
    <div class="container" >
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12 offset-0">
                <form action="{{ route('register') }}" method="POST" class="container shadow-sm rounded p-3">
                    @csrf
                    <h3 class="text-center">Register</h3>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter first name...">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter last name...">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email...">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter phone...">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nationality">Nationality</label>
                            <select name="nationality" id="nationality" class="form-select">
                                <option value="Myanmar" selected>Myanmar</option>
                                <option value="Foreign">Foreign</option>
                            </select>
                            @error('nationality')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row" id="nrc_section">
                        <div class="col-sm-6 mb-3">
                            <label for="nrc_number">NRC Number</label>
                            <input type="text" name="nrc_number" id="nrc_number" class="form-control" placeholder="Enter address...">
                             @error('nrc_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter address...">
                             @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row" id="passport_section">
                        <div class="col mb-3">
                            <label for="passport">Passport</label>
                            <input type="text" name="passport" id="passport" class="form-control" placeholder="Enter passport number...">
                            @error('passport')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="userOrGuest">Guest or User</label>
                            <select name="userOrGuest" id="userOrGuest" class="form-select">
                                <option value="Guest">Guest</option>
                                <option value="User" selected>User</option>
                            </select>
                            @error('userOrGuest')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div id="password_section">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password...">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter password...">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            Already user? <a href="{{ route('login') }}" class="text-decoration-none">Login here</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <button class="btn btn-primary col-12">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#passport_section').hide();
        $nationality = localStorage.getItem('nationality');
        if($nationality == 'Myanmar'){
            $('#nationality option[value="Myanmar"]').prop('selected', true);
            $('#passport_section').hide();
            $('#nrc_section').show();
        }
        if($nationality == 'Foreign'){
            $('#nationality option[value="Foreign"]').prop('selected', true);
            $('#passport_section').show();
            $('#nrc_section').hide();
        }
        $('#nationality').change(function(e) {
            if(e.target.value == 'Myanmar'){
                localStorage.setItem('nationality', 'Myanmar');
                $('#passport_section').hide();
                $('#nrc_section').show();
            }else{
                localStorage.setItem('nationality', 'Foreign');
                $('#passport_section').show();
                $('#nrc_section').hide();
            }
        })
        $('#userOrGuest').change(function(e) {
            if(e.target.value == 'User'){
                $('#password_section').show();
            }else{
                $('#password_section').hide();
            }
        })
    })
</script>
</body>
</html>
