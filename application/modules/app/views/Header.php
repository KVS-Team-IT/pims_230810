<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta content="KVS-PIS" name="Kendriya Vidyalaya Sangathan" />
    <meta content="Kendriya Vidyalaya Sangathan" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
    <!--for js css-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/validation/validationEngine.jquery.css" rel="stylesheet" />
    <!--<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"/>-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatable/jquery.dataTables.min.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/jquery/ui-1.12.1/jquery-ui.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/vendor/alertify/css/alertify.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/vendor/alertify/css/themes/default.css" rel="stylesheet" />

    <!--for js script-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation/jquery.validationEngine.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation/jquery.validationEngine-en.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatable/jquery.table.transpose.min.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mustache.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/common.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/common_js.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/header.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/encrypt.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery/ui-1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/handlebars.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/typeahead.bundle.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/alertify/alertify.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/aes.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/samples/js/sample.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/select2/js/select2.js"></script>
    <link href="<?php echo base_url(); ?>assets/vendor/select2/css/select2.css" rel="stylesheet" />
    <script type="text/javascript">
        function aes_enc(txt, key) {
            var encrypted = CryptoJS.AES.encrypt(txt, key);
            return encrypted;
        }

        function aes_dec(txt, key) {
            var decrypted = CryptoJS.AES.decrypt(txt, key);
            return decrypted.toString(CryptoJS.enc.Utf8);
        }
    </script>
    <?php
    if (isset($javascripts)) {
        foreach ($javascripts as $jskey => $javascript) {
            if (is_string($jskey)) {
                echo $javascript . "\n";
            } else {
                echo script_tag($javascript) . "\n";
            }
        }
    }
    ?>
    <!-- for css style-->
    <?php
    if (isset($style_sheets)) {
        foreach ($style_sheets as $href => $media) {
            echo link_tag(array('href' => $media, 'rel' => 'stylesheet')) . "\n";
        }
    }
    ?>
</head>

<body>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>PERSONNEL INFORMATION MANAGEMENT SYSTEM</h5>
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>assets/img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div>
    </div>
    <!-- ======================= Loader / Splash Div =======================-->
    <!-- ====================== Common Data Across Sites =======================-->
    <input type="hidden" id="url" value="<?php echo base_url(); ?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash' => $this->security->get_csrf_hash())); ?>
    <!-- ====================== Top Static Navigation Bar =======================-->
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <div class="row  col-md-12">
            <div class="col-xl-4 col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <a class="anchor_logo" href="<?php echo site_url('home'); ?>">
                            <img class="kvs_logo" src="<?php echo base_url(''); ?>assets/img/kvs-logo1bk.png">
                        </a>
                    </div>
                    <div class="col-sm-8">
                        <h6 style="margin-bottom: 0; color: #ff8d17!important;font-size: 16px;text-shadow: 1px 1px 1px #1a1a1a;">
                            केंद्रीय विद्यालय संगठन </h6>
                        <div class="clearfix"></div>
                        <span style="text-shadow: 1px 1px 1px #1a1a1a;letter-spacing: 1px;color: #f8f8f9;font-size: 12.7px;">KENDRIYA
                            VIDYALAYA SANGATHAN</span>
                        <div class="clearfix"></div>
                        <small style="color: #54a706; text-shadow: 1px 1px 1px #1a1a1a; font-size: 75% !important">शिक्षा
                            मंत्रालय भारत सरकार के अधीन एवं स्वायत्त निकाय</small>
                        <div class="clearfix"></div>
                        <small style="color: #54a706; text-shadow: 1px 1px 1px #1a1a1a; font-size: 75% !important;position: absolute;margin-top: -5px;">An
                            Autonomous Body Under Ministry of Education,<br>
                            Government of India.</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12">
                <div class="row text-center">
                    <div class="col-sm-12">
                        <label style="letter-spacing: 7px;margin-bottom: -4px;color: #FF9800;text-shadow: 1px 1px 0px #4c9b0b;font-size: 24px;font-family: auto;">
                            <img src="<?php echo base_url(); ?>assets/img/PIMS.png" alt="Digital India" width="25" height="25" style=" margin-top: -8px; margin-right: 3px;">PIMS
                        </label>
                        <hr>
                        <label style="letter-spacing: 2px;font-size: 14px;color: #ffffff; font-family: sans-serif;text-shadow: 1px 1px 5px #1a1a1a;">[
                            Personnel Information Management System ]</label>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12 ">
                <div class="row">
                    <div class="col-sm-6 px-5">
                        <a href="http://digitalindiaportal.co.in/" title="Digital India" target="_blank">
                            <img src="<?php echo base_url(); ?>assets/img/digital-ind.png" alt="Digital India" width="175" height="75">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow text-center">
                                <a class="nav-link" href="<?php echo base_url('notifications'); ?>" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-comments fa-3" style="font-size: 40px; color: #8BC34A;">
                                        <?php
                                        $ids = $this->session->userdata('user_id');
                                        $msg = GetNotificationCount($ids);
                                        if (!empty($msg)) {
                                        ?>
                                            <span style="background: #f00; color: #cccccc; border-radius: 20px; padding: 2px 6px; position: absolute; top: 0px; right: 90%; font-size: 12px;">
                                                <?php echo $msg; ?>
                                            </span>
                                        <?php } ?>
                                    </i>
                                </a>
                            </li>
                            <li class="nav-item dropdown no-arrow text-center px-4">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-3" style="font-size:36px;"></i>
                                    <br><small>Hi! <?php echo ucfirst($this->user_name); ?></small>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?php echo site_url('Update-Login-Password'); ?>">Update Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo site_url('Logout'); ?>">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>