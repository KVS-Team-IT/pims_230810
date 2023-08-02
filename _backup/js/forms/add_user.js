var base_url = $('#url').val();
$.validator.addMethod("pwcheck", function (value) {
    //===================== Password Check ===================//
        return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) 
                && /[A-Z]/.test(value) 
                && /[a-z]/.test(value) 
                && /[0-9]/.test(value) 
        },"Password should have One Uppercase Letter, One Lowercase Letter, One Number & One Special Character.");
$('#form').validate({
    rules: {
        role_id: {
            required: true,
        },
        email_id: {
            required: true,
        },
        role_category: {
            required: true,
        },
        username: {
            required: true,
            remote: base_url + 'admin/users/cheque_unique_username?user_id=' + $('#user_id').val(),
            maxlength: 20,
            minlength: 5,
        },
        password: {
            required: true,
            pwcheck: true,
            minlength: 6
        },
        cpassword: {
            required: true,
            equalTo: '#password',
            minlength: 6
        }
    },
    messages: {
        role_id: {
            required: 'Please select organization level'
        },
        role_category: {
            required: 'Please select role category'
        },
        username: {
            required: 'Please enter username',
            remote: 'This username already taken,please try another'
        },
        email_id: {
            required: 'Please enter email'
         },
        password:{
                    required:'Please enter your new password with Minimum length 6'
                    
                },
        cpassword:{
            required:'Please enter confirm password',
            equalTo:'Please enter same password again'
        }
    },
    submitHandler: function (form) {
        form.submit();
    }

});
$('#eform').validate({
    rules: {
        emp_title: {
            required: true,
        },
        emp_name: {
            required: true,
        },
        emp_dob: {
            required: true,
        }
    },
    messages: {
        emp_title: {
            required: 'Select Employee Title'
        },
        emp_name: {
            required: 'Employee Name Required'
        },

        emp_dob: {
            required: 'Employee DOB required'
         }
       
    },
    submitHandler: function (form) {
        $('#addemp').prop('disabled',true);
        $('#addemp').hide();
		form.submit();
    }

});
function getRoleCategory() {
    var role_id = $("#role_id").val();
    $("#role_category").html('');
    if (role_id != '' && role_id == '2') {
        $("#category").css("display", "block");
        var role_category = '<option value="">Select Role Category</option><option value="1">Personnel</option><option value="2">Administration</option><option value="3">Training</option><option value="4">Academic</option><option value="5">Finance</option><option value="7">Works</option>';
        $("#role_category").html(role_category);
    }
    else if (role_id != '' && role_id == '3') {
//        var role_category = '<option value="">Select Role Category</option><option value="2">Administration</option><option value="5">Finance</option><option value="4">Academic</option>';
//        $("#role_category").html(role_category);
        $("#category").css("display", "none");
        
    }
    else if (role_id != '' && role_id == '4') {
//        var role_category = '<option value="">Select Role Category</option><option value="3">Training</option>';
//        $("#role_category").html(role_category);
        $("#category").css("display", "none");
    }
    else if (role_id != '' && role_id == '5') {
//        var role_category = '<option value="">Select Role Category</option><option value="6">Principal</option>';
//        $("#role_category").html(role_category);
        $("#category").css("display", "none");
    }
    else {
        var role_category = '<option value="">Select Role Category</option>';
        $("#role_category").html(role_category);
    }

}



  