/**
 * Created by Lenovo on 8/2/2017.
 */

$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
/*---------------date picker for dob -----------------*/


$('#dob').datepicker({
    format: 'dd-M-yyyy'
});

/*---------------end ---------------------------------------*/


/*------------------ date picker for project --------*/

$('#fund_closing_date').datepicker({

    format: 'dd-M-yyyy'
});

$('#project_start_date').datepicker({
    format: 'dd-M-yyyy'
});

$('#project_end_date').datepicker({
    format: 'dd-M-yyyy'
});





/*--------------------end --------------------------------------------*/




/* ajax request to show borrower nrc when the borrower name is selected in drop down list in project UI*/
$(document).ready(function(){
    $(".nrc").hide();
    $("#borrower_id").change(function(){
        var borrower_id=$("#borrower_id option:selected").val();



        $.ajax({
            type:'get',
            url:'/borrowers/'+borrower_id,
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            cache:false,
            contentType:false,
            processData:false,

            success:function(data)
            {
                $(".nrc").show();
                var nrc=data['data'][0]['nrc'];

                $('#nrc').attr('value',nrc);
                console.log(data['data'][0]['nrc']);


            }
        });
    });

});
/* --------------------------end --------------------------------------------------*/

$(document).ready(function(){

    $("#state").change(function(){
        var state=$("#state option:selected").val();


        $.ajax({
            type:'get',
            url:'/township/'+state,
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            cache:false,
            contentType:false,
            processData:false,

            success:function(data)
            {


                $('#township').empty();
                for(var i=0;i<data['data'].length;i++)
                {
                    //console.log(data['data'][i]['township']);
                    $('#township').append("<option value='" + data['data'][i]['township'] +"'>" + data['data'][i]['township'] + "</option>");
                }

                //console.log(data['data'][0]['township']);



            }
        });
    });

});

/*------------------------ data table for officer ---------------------------*/

/*------------------------js for sidebar menu-------------------*/
