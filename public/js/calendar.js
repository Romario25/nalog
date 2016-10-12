$(document).ready(function(){


//     var date = new Date();
//     var year = date.getFullYear();
// alert(year);
    $("#datetimepickerFrom").datetimepicker( {pickTime: false, language: 'ru'});
    $("#datetimepickerTo").datetimepicker( {pickTime: false, language: 'ru'});
//
//     $("#datetimepickerFrom").data("DateTimePicker").setMinDate('1/1/'+year);
//     $("#datetimepickerFrom").data("DateTimePicker").setMaxDate('12/31/'+year);
//     $("#datetimepickerTo").data("DateTimePicker").setMinDate('1/1/'+year);
//     $("#datetimepickerTo").data("DateTimePicker").setMaxDate('12/31/'+year);



    // $("#datetimepickerFrom").on("dp.change",function (e) {
    //
    //     $("#datetimepickerTo").data("DateTimePicker").setMinDate(e.date);
    // });
    //
    // $("#datetimepickerTo").on("dp.change",function (e) {
    //     $("#datetimepickerFrom").data("DateTimePicker").setMaxDate(e.date);
    // });



    // $("#select-year").change(function(){
    //    alert($(this).val());
    //    year = $(this).val();
    //     alert(year);
    // });
});