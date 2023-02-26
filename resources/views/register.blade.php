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
                    <div class="row my-4">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name...">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email...">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter phone...">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password...">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter password...">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            Already user? <a href="{{ route('user.login') }}" class="text-decoration-none">Login here</a>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <button class="btn btn-primary col-12">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
