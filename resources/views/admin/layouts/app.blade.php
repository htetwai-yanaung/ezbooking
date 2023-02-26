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
<body>
<header>
    <div>
        <a href="#" class="menu-bars"><i class="fa-solid fa-bars"></i></a>
        <a href="#" class="logo">LOGO</a>
    </div>
    <a href="#" class="user-icon"><i class="fa-solid fa-user"></i></a>
</header>
<nav class="nav-bar">
    <a href="#bookings" class="active"><i class="uil uil-apps"></i> bookings</a>
    <a href="#rooms"><i class="uil uil-home"></i> rooms</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href=""><button class="logout-btn"><i class="uil uil-sign-out-alt"></i> logout</button></a>
    </form>
</nav>
@yield('content')
</body>

<script>
    let bars = document.querySelector('.menu-bars');
    let navBar = document.querySelector('.nav-bar');
    bars.onclick = () => {
        document.querySelector('.fa-solid').classList.toggle('fa-close');
        navBar.classList.toggle('active');
    }

    let date = new Date();
    let currentDate = date.getDate();
    let currentMonth = date.getMonth();
    let currentYear = date.getFullYear();

    let months = ['January','February','Match','April','May','June','July','August','September','October','November','December'];

    const renderCalendar = () => {
        let list = '';
        let prevMonthDays = new Date(currentYear, currentMonth, 1).getDay();
        let currentMonthDates = new Date(currentYear, currentMonth+1, 0).getDate();
        for(var i=prevMonthDays; i>0; i--){
            list += `<span class="date"></span>`;
        }
        for(var i=1; i<=currentMonthDates; i++){
            list += `<span class="date" id=${i}>${i}</span>`;
        }
        document.querySelector('.calendar-header h3').innerText = `${months[currentMonth]} ${currentYear}`;
        document.querySelector('#dates').innerHTML = list;
        if(currentMonth == new Date().getMonth()){
            document.getElementById(currentDate).innerHTML += `<span class="name-tag success">Smith</span>`;
        }
    }
    renderCalendar();

    let prev = document.querySelector('#prev');
    let next = document.querySelector('#next');
    prev.onclick = () => {

        currentMonth = currentMonth==0 ? currentMonth : currentMonth - 1;
        console.log(currentMonth);
        renderCalendar();
    }
    next.onclick = () => {
        if(currentMonth == 11){
            currentMonth = 0;
            currentYear ++;
        }else{
            currentMonth++;
        }
        renderCalendar();
    }
</script>
</html>
