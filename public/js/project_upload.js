
var compare = function(startDateStr, endDateStr) {

    var sdate=new Date(startDateStr).getTime();
    var edate=new Date(endDateStr).getTime();

    if(sdate> edate) {
        return false;
    }
    else
    {
        return true;
    }

};
jQuery.validator.addMethod("compare", function(value, element) {

    return compare($('.startdate').val(),value);
}, "End date should be after start date");

var greaterThan = function(startDateStr, endDateStr) {

    var sdate=new Date(startDateStr).getTime();
    var edate=new Date(endDateStr).getTime();

    if(sdate> edate) {
        return false;
    }
    else
    {
        return true;
    }

};
jQuery.validator.addMethod("greaterThan", function(value, element) {

    return compare($('.sdate').val(),value);
}, "End date should be after start date");


$(function() {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='project_upload']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            project_title:"required",
            borrower_id:"required",
            category_id:"required",
            loan_value:{
                required:true,
                number:true,
                min:1
            },
            return_estimation_proposed:{
                required:true,
                number:true,
                min:1
            },
            minimum_investment_amount:
                {
                    required:true,
                    number:true
                },
            collateral_estimated_value:
                {
                    required:true,
                    number:true,
                    min:1
                },
            collateral_description:"required",
            collateral_evidence:"required",
            project_period:{
                required:true,
                number:true,
                min:1
            },
            project_location:"required",
            project_description:"required",
            project_image:"required",
            state:"required",
            township:"required",
            fund_closing_date: {

                required:true

            },
            project_start_date:{
                required:true,
                compare:true





            },
            project_end_date:{
                required:true,
                greaterThan:true





            },
            commodity:"required"



        },
        // Specify validation error messages
        messages: {
            project_title:"* Please enter your project title",
            borrower_id:"* Please select the borrower",
            category_id:"* please select the category",
            loan_value:{
                required:"* Please enter your loan value",
                number:"* Please enter only number",
                min: "* Please enter greater than 0"
            },
            return_estimation_proposed:{
                required:"* Please enter return estimation proposed",
                number:"* Please enter only number",
                min: "* Please enter greater than 0"
            },
            minimum_investment_amount:{
                required:"* Please enter your minimum investment amount",
                number:"* Please enter only number"
            },
            collateral_estimated_value:
                {
                    required:"* Please enter your collateral estimated value ",
                    number:"* Please enter only number",
                    min: "* Please enter greater than 0"
                },
            collateral_description:"* Please  collateral description",
            collateral_evidence:"* Please upload collateral evidence",
            project_period:
                {
                    required:"* Please enter your project period",
                    number:"please enter only number",
                    min: "* Please enter greater than 0"
                },
            project_location:"* Please enter your project location",
            project_description:"* Please enter your project description",
            project_image:"* Please upload your project image",
            fund_closing_date:
                {
                    required:"* Please select the fund closing date"
                },



            project_start_date:{

                required: "* Please select the project start date",
                compare:"* Please select the date greater than fund closing date"

            },
            project_end_date:{
                required: "* Please select the project end date",
                greaterThan:"* Please select the date greater than project start date"
            },
            commodity:"* Please enter the commodity",
            state:"Please select your state",
            township:"Please select your township"



        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});