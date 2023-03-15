
flatpickr("input[type=date]", {
    // altInput: true,
    // altFormat: "F j, Y",
    // dateFormat: "d-m-Y",
    minDate: "today",
});

$(document).ready(function() {

    $room_price = $('#price').val();
    $ext_service_price = 0;
    $final_price = 0;
    $("input[name='ext_services[]']").change(function(e){
        if($(this).is(':checked')){
            $actual_value = e.target.value.split(',');
            $ext_service_price += $actual_value[1]*1;
        }else{
            $ext_service_price -= $actual_value[1]*1;
        }
        total();
    });

    //total day and price
    $total_day = 1;
    $checkIn = {
        year: 1,
        month: 2,
        day: 3,
    };
    $checkOut = {
        year: 1,
        month: 2,
        day: 3,
    };
    $('#checkIn').change(function(e){
        [$checkIn.year, $checkIn.month, $checkIn.day] = e.target.value.split('-');
        console.log(e.target.value);
        calculateDayAndPrice();
    })
    $('#checkOut').change(function(e){
        [$checkOut.year, $checkOut.month, $checkOut.day] = e.target.value.split('-');
        calculateDayAndPrice();
    })
    calculateDayAndPrice = () => {
        if($checkIn.year == $checkOut.year){
            if($checkIn.month == $checkOut.month){
                $total_day = $checkOut.day*1 - $checkIn.day*1;
                total();
            }else{
                $checkin_month_dates = new Date($checkIn.year,$checkIn.month,0).getDate();
                $total_day = ($checkin_month_dates - $checkIn.day*1) + $checkOut.day*1;
                total();
            }
        }
    }
    total = () => {
        $final_price = ($room_price*1 + $ext_service_price) * $total_day;
        $('#total').text($final_price);
        $('#price').val($final_price);
        $('#total_day').val($total_day);
    }
})
