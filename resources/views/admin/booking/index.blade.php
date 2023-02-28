@extends('admin.layouts.app')

@section('content')
<section>
    <article class="calendar">
        <div class="calendar-header">
            <?php $checkIn = $checkInes ?>
            <?php $userNames = $checkInUserNames ?>
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
    {{-- <input type="hidden" name="" id="checkInes" value="{{ $checkInes }}"> --}}
</section>
@endsection

@section('scriptSource')
<script>
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

        /*start*/
        var checkInes_array = <?php echo $checkIn; ?>;
        var userNames = <?php echo json_encode($userNames); ?>;
        for(var i=0; i<checkInes_array.length; i++){
            var checkIn_date = checkInes_array[i].split('-');
            var cdate = checkIn_date[2]*1;
            if(currentMonth == checkIn_date[1]*1 - 1){
                document.getElementById(cdate).innerHTML += `<span class="name-tag success">${userNames[i]}</span>`;
            }
        }
        /*end*/

        // if(currentMonth == new Date().getMonth()){
        //     document.getElementById(currentDate).innerHTML += `<span class="name-tag success">Smith</span>`;
        // }
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
@endsection
