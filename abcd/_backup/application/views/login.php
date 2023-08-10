<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>js/encrypt.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JS1YXSR0Q1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-JS1YXSR0Q1');
    </script>


    <style>
    @font-face {
        font-family: 'text-security-disc';
        src: url('fonts/text-security-disc.eot');
        src: url('fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
            url('fonts/text-security-disc.woff') format('woff'),
            url('fonts/text-security-disc.ttf') format('truetype'),
            url('images/text-security-disc.svg#text-security') format('svg');
    }

    input.password {
        font-family: 'text-security-disc';
    }

    .splash {
        position: absolute;
        margin: 0px auto;
        z-index: 2000;
        background: white;
        color: gray;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .splash-title {
        text-align: center;
        vertical-align: middle;
        margin-top: 15%;
    }
    </style>
</head>

<body class="login-bg">

    <!--[if lt IE 7]>
    <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash' => $this->security->get_csrf_hash())); ?>
    <div class="container">
        <!-- ======================= Loader / Splash Div =======================-->
        <!-- <div class="splash">
            <div class="splash-title">
                <h5>PERSONNEL INFORMATION MANAGEMENT SYSTEM</h5>
                Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40"
                    height="40"> Please Wait.
            </div>
        </div> -->
        <!-- ======================= Loader / Splash Div =======================-->
        <div class="card card-login mx-auto mt-5">
            <div class="card-header text-center" style="margin: 15px 15px !important;padding-bottom: 0px !important;">
                <img class="rounded" src="<?php echo base_url(); ?>img/kvs-logo1bk.png" width="75" height="60">
                <br>
                <label
                    style="margin-bottom: -2px!important; font-size:18px;font-weight:bold;font-family: none;letter-spacing: 5px;margin-left: 5px;color: #9E9E9E;text-shadow: 1px 0px 2px #a56a12;">PIMS</label>
                <hr style="margin-top: 0px!important;">
                <label
                    style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; font-family: auto; letter-spacing: 1px;">Personnel
                    Information Management System</label>
            </div>
            <div class="card-body" style="padding-top: 0px!important;">
                <?php
                if (isset($error_msg) && !empty($error_msg)) {
                ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_msg; ?>.
                </div>
                <?php
                }
                if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php
                }
                if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
                }
                ?>
                <?php echo form_open('', array('id' => 'login_form', 'autocomplete' => "off")); ?>
                <div class="form-group">
                    <label><i class="fas fa-user" aria-hidden="true"></i>&nbsp;Username<span
                            class="reqd">*</span></label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" value=""
                        placeholder="Username">
                    <span class="error"><?php echo form_error('username'); ?></span>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-key" aria-hidden="true"></i>&nbsp;Password<span
                            class="reqd">*</span></label>
                    <input type="text" name="password" id="password" class="form-control password" autocomplete="off"
                        value="" placeholder="Password">
                    <span class="error"><?php echo form_error('password'); ?></span>
                </div>
                <div class="form-group clear">
                    <div class="row">
                        <div class="col-sm-6">
                            <label style="color: #0c304a;font-size: 12px;margin-bottom: 10px;">Can't read the code?
                                &nbsp; &nbsp;<a href="javascript:void(0)" id="refresh_captcha"><img
                                        src="<?php echo base_url(); ?>img/refresh.png"
                                        title="Refresh Captcha"></a></label>
                            <span id="captcha_img"><?php echo $captchaImg; ?></span>
                        </div>
                        <div class="col-sm-6">
                            <label>Captcha<span class="reqd">*</span></label>
                            <input type="text" name="captcha" id="captcha" class="form-control" autocomplete="off"
                                placeholder="Captcha">

                        </div>
                    </div>
                </div>
                <div class="form-group clear">
                    <span class="error"><?php echo form_error('captcha'); ?></span>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-block disableAutoFillSubmit">
                <?php echo form_close(); ?>
                <br>
                <label class="btn btn-default btn-block">Forgot Password ? &nbsp;&nbsp;<a class=""
                        href="<?php echo site_url('Reset-Password'); ?>">Click to Reset Password.</a></label>
            </div>
        </div>
    </div>

    <script>
    $('#login_form').validate({
        rules: {
            /*email:{
                required:true,
                email:true,
            },*/
            username: {
                required: true,
            },
            password: {
                required: true,
            },
            captcha: {
                required: true,
            }
        },
        messages: {
            /*email:{
                required:'Please enter email id',
            },*/
            username: {
                required: 'Please enter username',
            },
            password: {
                required: 'Please enter password',
            },
            captcha: {
                required: 'Please enter captcha code',
            }
        },
        submitHandler: function(form) {
            generateHashPassword();
            form.submit();
        }
    });

    function generateHashPassword() {
        <?php if (isset($enKey) && $enKey != "") { ?>
        var pwdObj = document.getElementById('password');
        var hashObj = new jsSHA("SHA-512", "TEXT", {
            numRounds: 1
        });
        hashObj.update(pwdObj.value);
        var hash = hashObj.getHash("HEX");
        var hmacObj = new jsSHA("SHA-512", "TEXT");
        hmacObj.setHMACKey("<?= $enKey; ?>", "TEXT");
        hmacObj.update(hash);
        pwdObj.value = hmacObj.getHMAC("HEX");
        return true;
        <?php } else { ?>
        return false;
        <?php } ?>
    }
    $('#refresh_captcha').on('click', function() {
        var base_url = $('#url').val();
        //console.log(base_url);
        $.ajax({
            url: base_url + 'refresh-captcha',
            type: 'get',
            data: 'captcha=1',
            beforeSend: function() {
                $('#captcha_img').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                console.log(response);
                $('#captcha_img').html(response);
            }

        });
    });
    </script>
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
    $(window).bind("load", function() {
        // Remove splash screen after load
        $('.splash').css('display', 'none');
    });
    </script>


</body>

</html>