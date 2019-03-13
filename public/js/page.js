
var customvalidation = function(inputvalue) {
    
     var a = /^[a-z0-9\_]+$/i;
     
    
    if(inputvalue.match(a)) {
        return true;
    }
    else
    {
        return false;
    }

};

jQuery.validator.addMethod("customvalidation", function(value, element) {
   return customvalidation($('#route').val());
});



$(function () {

    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='route_registration']").validate({
        // Specify validation rules
        ignore: [],
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            title: "required",
            description: {
                required: function (textarea) {
                    CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                    var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                    return editorcontent.length === 0;
                }
            },
            route: {
                required: true,
                customvalidation: true


            }

        },
        // Specify validation error messages
        messages: {
            title: "* Please enter title",
            description: "* Please enter description",
            route: {
                required:"* Please enter url",
                customvalidation:"Sorry, no special characters allowed"


            }

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

