@extends('admin.layouts.app')

@section('content')
<section>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Calendar View</a>
        <a href="{{ route('booking.list') }}" class="btn btn-outline-primary">List View</a>
    </div>
    <div id='calendar'></div>
    {{-- <article class="calendar">
        <div class="calendar-header">
            <h3></h3>
            <div>
                <button class="cbtn" id="prev"><i class="uil uil-angle-left"></i></button>
                <button class="cbtn" id="next"><i class="uil uil-angle-right"></i></button>
            </div>
        </div>
        <div class="days">
            <span class="day-name">Sunday</span>
            <span class="day-name">Monday</span>
            <span class="day-name">Tuesday</span>
            <span class="day-name">Wednesday</span>
            <span class="day-name">Thursday</span>
            <span class="day-name">Friday</span>
            <span class="day-name">Saturday</span>
        </div>
        <div id="dates">
            <span class="date">
                <span>0</span>
                <span class="name-tag success">John</span>
                <span class="name-tag pending">Smith</span>
                <span class="name-tag reject">Smith</span>
            </span>
        </div>
    </article> --}}
</section>
@endsection

@section('scriptSource')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        let events = @json($bookings);
        console.log(events);
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        events: events,
      });
      calendar.render();
    });

  </script>
{{-- <script>
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



</script> --}}
@endsection
