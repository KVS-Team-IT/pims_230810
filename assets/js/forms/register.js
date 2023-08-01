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
                    required:true
                },
                email:{
                    required:true,
                    email:true,
                    remote:base_url+'register/cheque_unique_email'
                },
                first_name:{
                    required:true
                },
                mobile:{
                    required:true,
                    remote:base_url+'register/cheque_unique_mobile',
                    maxlength:10,  
                    minlength:10  
                },
                password:{
                    required:true,
                    pwcheck:true,
                    minlength:6 
                },
                cpassword:{
                    required:true,
                    equalTo:'#password'
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
                generateHashPassword();
                form.submit();   
            }
           
        });
        
        function generateHashPassword() {
                var password = document.getElementById('password');
                var hashPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
                hashPassword.update(password.value);
                password.value = hashPassword.getHash("HEX"); 

                var cpassword = document.getElementById('cpassword');
                var hashPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
                hashPassword.update(cpassword.value);
                cpassword.value = hashPassword.getHash("HEX"); 
                return true;
            } 

        

        $('#refresh_captcha').on('click',function(){
                var base_url=$('#url').val();
                $.ajax({
                    url:base_url+'Register/RefreshCaptcha',
                    type:'get',
                    data:'captcha=1',
                    beforeSend:function(){
                        $('#captcha_img').html('<i class="fa fa-spinner fa-spin"></i>');        
                    },
                    success:function(response){
                        $('#captcha_img').html(response);        
                    }

                });
            });

  