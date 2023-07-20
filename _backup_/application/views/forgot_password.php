<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="KVS PIMS">
    <meta name="author" content="Aasit">
    <title>KVS PIMS FORGOT PASSWORD</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
</head>

<body class="login-bg">
    <input type="hidden" id="url" value="<?php echo base_url();?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash'=>$this->security->get_csrf_hash()));?>
    <div class="container">
        <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">KVS PIMS RESET PASSWORD</div>
        <div class="card-body forgot-passward">
        <div class="text-center mb-2">
            
        </div>
            <?php if(isset($error_msg) && !empty($error_msg)){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_msg;?>.
                </div>
            <?php } if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
                </div>
            <?php } if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                    <h6><u>Password reset link has been sent successfully</u></h6>
                    <?php echo $this->session->flashdata('success');?>
                    <h6><a href="<?php site_url('login');?>" class="btn btn-block btn-default">X &nbsp;Close</a></h6>
                </div>
            <?php }else{
                echo '<h4>Forgot your password?</h4>';
                echo '<p>Enter your Employee Code / User Id and we will send you instructions on how to reset your password on your registered mail id.</p>';
		echo form_open('',array('id'=>'password_form'));?>
                <div class="form-group">
                    <label>Login Id / Username<span class="reqd">*</span></label>
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Login Id / Username" autocomplete="off"> 
                    <?php echo form_error('uname');?>	
                </div>
                    <div class="form-group clear">
			<div class="captcha-control">
                        <label>Captcha<span class="reqd">*</span></label>
			<input type="text" name="captcha" id="captcha" class="form-control" autocomplete="off" placeholder="Captcha Text">
			
			</div>
			<div class="captcha-control">
                            <label>Can't read the code?&nbsp;<a href="javascript:void(0)" id="refresh_captcha"><img src="<?php echo base_url();?>img/refresh.png" title="Refresh Captcha"></a></label>
                            <span id="captcha_img"><?php echo $captchaImg;?> </span>
                        </div>
                    </div>
                    <div class="form-group clear">
                        <span class="error"><?php echo form_error('captcha');?></span>
                    </div>
                <input type="submit" value="Reset Password" class="btn btn-primary btn-block">
                <?php echo form_close();?>
                <br>
                <label class="btn btn-default btn-block"><a class="" href="<?php echo site_url('Login'); ?>">Back to Login</a></label>
            <?php } ?>
      </div>
    </div>
  </div>
  
   <script>
        $('#password_form').validate({
                rules:{
                    email:{
                        required:true,
                        email:true
                    },
                    captcha:{
                        required:true  
                    }   
                },
                messages:{
                    email:{
                        required:'Please enter email id',
                    },
					captcha:{
                        required:'Please enter captcha code',  
                    }   
                }
            });   
			
           
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
    </script>
</body>
</html>
