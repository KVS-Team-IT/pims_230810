$.validator.addMethod("pwcheck", function(value) {
//  return /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[\@\#\$\%\^\&\*\(\)\_\+\!]).{8,16}$/.test(value)
//          &&/[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) 
//          && /[a-z]/.test(value) 
//          && /[0-9]/.test(value) 
//          && /[A-Z]/.test(value) // has a digit
//          && /{6,}/.test(value)
//===================== Password Check ===================//
    return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) 
            && /[A-Z]/.test(value) 
            && /[a-z]/.test(value) 
            && /[0-9]/.test(value) 
    },"Password should have One Uppercase Letter, One Lowercase Letter, One Number & One Special Character.");

$(function(){
	$('#formID').validate({
            rules:{
                    old_password:{
                            required:true
                    },
                    new_password:{
                            required:true,
                            pwcheck:true,
                            minlength:6    
                    },
                    confirm_password:{
                            required:true,
                            equalTo:'#new_password'
                    }
            },
            messages:{
                    old_password:{
                            required:'Please enter your old password',
                    },
                    new_password:{
                            required:'Please enter your new password with Minimum length 6'
                    },
                    confirm_password:{
                            required:'Please enter your confirm password',
                            equalTo:'Please enter same password again'
                    }
            },
            submitHandler:function(form){
                    generateHashPassword();
                    form.submit();
            }
	});
});
function generateHashPassword() {
		
    var old_password = document.getElementById('old_password');
    var hashPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
    hashPassword.update(old_password.value);
    old_password.value = hashPassword.getHash("HEX");

    var password = document.getElementById('new_password');
    var hashPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
    hashPassword.update(password.value);
    password.value = hashPassword.getHash("HEX");

    var cpassword = document.getElementById('confirm_password');
    var hashCPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
    hashCPassword.update(cpassword.value);
    cpassword.value = hashCPassword.getHash("HEX");
    return true;
} 