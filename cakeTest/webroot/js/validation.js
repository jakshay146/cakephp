$(document).ready(function(){



    jQuery.validator.addMethod("noSpace",function(value,element){
        return value=='' || value.trim().length != 0;
    }, "No space please and don't leave it empty");
    

    $('form').validate({

        rules: {
            first_name:{
                required: true,
                minlength: 3,
                noSpace: true
            },
            last_name: {
                required: true,
                minlength: 2,
                noSpace: true
            },
            password: {
                required: true,
                minlength: 5,
                noSpace: true
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password" 
            },
            email: {
                required: true,
                email: true
            },
            phone_number: {
                required: true,
                digits: true,
                minlength: 10,
                
            },
            // gen_radio:{
            //     required: true,
            // }
        },
        messages: {
            first_Name: {
                required: " Please enter a First Name",
                minlength: " Your First Name must consist of at least 3 characters",
            },
            last_Name: {
                required: " Please enter a Last Name",
                minlength: " Your Last Name must consist of at least 2 characters"
            },
            password: {
                required: " Please enter a password",
                minlength: " Your password must consist of at least 5 characters"
            },
            confirm_password: {
                required: " Please confirm your password",
                minlength: " Your password must be consist of at least 5 characters",
                equalTo: " Please enter the same password as in password"
            },
            phone_number: {
                required: " Please enter a phone Number",
                digits:"only numbers are allowed",
                minlength: " Your phone number must consist 10 numbers"
            },
            email: {
                required: " Please enter a email",
                email:"enter valid email"
            },
            // gen_radio:{
            //     required:"Please select gender<br/>",
            // }
        },
        // errorPlacement: function(error, element) 
        // {
        //     if ( element.is(":radio") ) 
        //     {
        //         error.appendTo( '.radioP');
        //     }
        //     else 
        //     { 
        //         error.insertAfter( element );
        //     }
        //  }

    });
    
});