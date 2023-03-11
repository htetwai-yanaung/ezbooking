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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
</head>
<body>
    <div class="wrapper">
        <div class="side-nav bg-white">
            <div class="nav-top-container">
                <a href="" class="logo">EZbooking</a>
                <span id="close-nav"><i class="fa-solid fa-close"></i></span>
            </div>
            <div class="nav-item-container">
                <a href="{{ route('dashboard') }}" class="@if(Route::currentRouteName() == 'dashboard' || Route::currentRouteName() == 'booking.list') active @endif"><i class="uis uis-apps"></i><span class="nav-text">Bookings</span></a>
                <a href="{{ route('dashboard.roomTypeIndex') }}" class="@if(Route::currentRouteName() == 'dashboard.roomTypeIndex') active @endif"><i class="fa-solid fa-hotel"></i><span class="nav-text">Room Types</span></a>
                <a href="{{ route('dashboard.roomIndex') }}" class="@if(Route::currentRouteName() == 'dashboard.roomIndex' || Route::currentRouteName() == 'dashboard.roomCreate') active @endif"><i class="fa-solid fa-bed"></i><span class="nav-text">Rooms</span></a>
                <a href="{{ route('services.index') }}" class="@if(Route::currentRouteName() == 'services.index') active @endif"><i class="fa-solid fa-heart"></i><span class="nav-text">Services</span></a>
                <a href="" class=""><i class="fa-solid fa-comment"></i><span class="nav-text">Message</span></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button><i class="fa-solid fa-right-from-bracket"></i><span class="nav-text">Logout</span></button>
                </form>
            </div>
        </div>
        <div class="main bg-light p-3">
            <span class="btn btn-outline-dark mb-2" id="menu-bar"><i class="fa-solid fa-bars"></i></span>
            @yield('content')






        </div>
    </div>
</body>
@yield('scriptSource')
<script>
    const menuBar = document.querySelector('#menu-bar');
    const nav = document.querySelector('.side-nav');
    const closeBtn = document.querySelector('#close-nav');
    menuBar.onclick = () => {
        nav.classList.toggle('active');
    }
    closeBtn.onclick = () => {
        nav.classList.remove('active');
    }
</script>
</html>



















{{-- <!DOCTYPE html>
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
<body>
<header>
    <div>
        <a href="#" class="menu-bars"><i class="fa-solid fa-bars"></i></a>
        <a href="#" class="logo">LOGO</a>
    </div>
    <a href="#" class="user-icon"><i class="fa-solid fa-user"></i></a>
</header>
<nav class="nav-bar">
    <a href="{{ route('dashboard') }}" class="active"><i class="uil uil-apps"></i> bookings</a>
    <a href="{{ route('dashboard.roomCreate') }}"><i class="uil uil-home"></i> rooms</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href=""><button class="logout-btn"><i class="uil uil-sign-out-alt"></i> logout</button></a>
    </form>
</nav>
@yield('content')
@yield('scriptSource')
</body>

<script>
    let bars = document.querySelector('.menu-bars');
    let navBar = document.querySelector('.nav-bar');
    bars.onclick = () => {
        document.querySelector('.fa-solid').classList.toggle('fa-close');
        navBar.classList.toggle('active');
    }
</script>
</html> --}}
