@extends('admin.layouts.app')

@section('content')
<section>
    <article class="calendar">
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
    </article>
</section>
@endsection
