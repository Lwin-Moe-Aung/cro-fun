$.validator.addMethod("checkamount", function(value, element) {
    var result=true;
    var amount = $('#percentage').val();
    if(amount>100)
    {
        result=false;
    }
    return result;

}, "<p style='color:red;'>Invalid Percentage</p>");

$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='project_progress']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side

            percentage:{
                required: true,
                number:true,
                checkamount:true

            },

            remark:{
                required:true
            },
            progress_date:{

                required:true
            }


        },
        // Specify validation error messages
        messages: {

            percentage:{
                required: "<p style='color:red;'>* Please enter percentage the project completion.</p>",
                number:"<p style='color:red;'>* Please enter only number</p>",


            },
            remark:{
                required: "<p style='color:red;'>* Please enter remark for the project</p>",
            },
            progress_date:{
                required:"<p style='color:red;'>* Please select the project progress date .</p>"
            }



        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});
$('#progress_date').datepicker({
    format: 'dd-M-yyyy'
});

