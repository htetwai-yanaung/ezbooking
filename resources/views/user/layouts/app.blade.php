<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="{{ url('asset/css/home.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<header>
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
        <a href="#" class="logo text-decoration-none text-danger">LOGO</a>
        <div class="d-flex col-lg-3 col-sm-6">
            <input type="text" name="" id="" class="form-control" placeholder="Search...">
            <button class="btn btn-outline-primary ms-2"><i class="fa-solid fa-search"></i></button>
        </div>
        <a href="#" class="user-icon"><i class="fa-solid fa-user"></i></a>
    </div>
    <nav class="nav-bar">
        <div class="d-flex">
            <a href="#" class="text-decoration-none text-muted active">
                <i class="fa-solid fa-water"></i><span>Lake View 1</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-umbrella-beach"></i><span>Lake View 2</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-cloud-sun"></i><span>2nd Row Lake View</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-tree"></i><span>3rd Row Lake View</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-mountain"></i><span>Mountain View</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-icicles"></i><span>Guide View</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-people-roof"></i><span>Guide Room</span>
            </a>
            <a href="#" class="text-decoration-none text-muted">
                <i class="fa-solid fa-bed"></i><span>Extra Bed</span>
            </a>
        </div>
    </nav>
</header>

@yield('content')
<footer class="p-3 text-center border-top">
    © 2023 Airbnb, Inc.
</footer>
</body>
</html>
