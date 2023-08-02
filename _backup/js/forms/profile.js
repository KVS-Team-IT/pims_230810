var base_url=$('#url').val();
 $.validator.addMethod("pwcheck", function(value) {
        //===================== Password Check ===================//
        return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) 
                && /[A-Z]/.test(value) 
                && /[a-z]/.test(value) 
                && /[0-9]/.test(value) 
        },"Password should have One Uppercase Letter, One Lowercase Letter, One Number & One Special Character.");
        $('#form').validate({
            rules:{
                role_id:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true,
				   remote:base_url+'settings/cheque_unique_email?user_id='+$('#user_id').val(),
                },
                first_name:{
                    required:true
                },
                mobile:{
                    required:true,
                    remote:base_url+'settings/cheque_unique_mobile?user_id='+$('#user_id').val(),
                    maxlength:10,  
                    minlength:10,  
                },
                password:{
                    required:true,
                    pwcheck:true,
                    minlength: 6
                },
                cpassword:{
                    required:true,
                    equalTo:'#password',
                    minlength: 6
                }
                
            },
            messages:{
               role_id:{
                    required:'Please select application for'
                },
                email:{
                    required:'Please enter email',
                    remote:'This email already registered,please try another'
                },
                first_name:{
                    required:'Please enter first name'
                },
                mobile:{
                    required:'Please enter mobile number',
                    remote:'This mobile number already registered,please try another'
                },
                password:{
                    required:'Please enter your new password with Minimum length 6'
                    
                },
                cpassword:{
                    required:'Please enter confirm password',
                    equalTo:'Please enter same password again'
                }
            },
            submitHandler:function(form){
                form.submit();   
            }
           
        });
        


  
  