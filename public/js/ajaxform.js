$(document).ready(function(){
    $('#sign-up').on('submit',function(e){
        // $.ajaxSetup({
        //     header:$('meta[name="_token"]').attr('content')
        // });
        // e.preventDefault(e);
        //alert("form");
        //alert($('select[name=group]').val());
        $.ajax({

            type:"POST",
            url:'/nalog/send',
            data: {'group':$('select[name=group]').val(),
                    '_token': $('input[name=_token]').val(),
                    'dateFrom' : $('input[name=dateFrom]').val(),
                    'dateTo' : $('input[name=dateTo]').val(),
                    'year' : $('select[name=year]').val(),
                    'period' : $('select[name=periodPay]').val(),
                    'locale' : $('select[name=locale]').val(),
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
                $( '#form-errors' ).empty();
                $("#response").empty();
                $("#response").append(data.declaration + data.esv + data.singleTax);
            },

            error :function( data ) {

                if( data.status === 422 ) {
                    //process validation errors here.
                    errors = data.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';

                    $( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                }
            }
        });
        return false;
    });
});


