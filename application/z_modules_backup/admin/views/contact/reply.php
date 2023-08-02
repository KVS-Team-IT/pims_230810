<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>ckeditor/samples/js/sample.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
</head>
<div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact & Suggestions Details</li>
				
            </ol>
            <div class="card mb-3">
                <div class="card-header"><i class="fa fa-envelope-open">&nbsp;&nbsp;Message Details</i></div>
                <div></div>
                <div class="card-body shape-shadow">
                    
                    <?php if (isset($error_msg) && !empty($error_msg)) { ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $error_msg; ?>.
                        </div>
                    <?php } if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="form-group col-md-12">
                            
                        <?php
                        $Uid=$this->session->userdata['user_id'];
                        foreach($M as $x){
                            $main_msg_sub=$x->msg_sub;
                        }
                            echo '<label for="" class="col-sm-12 col-form-label"><h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;&nbsp;Subject:&nbsp;'.$main_msg_sub.'</h5></label>';
                        ?>
                        
                            <hr>
                        <?php
                        
                        foreach($M as $e){
                            $msg_id=$e->msg_id;
                            $msg_sub=$e->msg_sub;
                            $sender=$e->msg_send;
                            $receiver=$e->msg_rcvr;
                            if($sender==$Uid){
                            echo '<label for="" class="col-sm-12 col-form-label" style="color: #FF5722 !important; font-size: 14px!important;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;'.$e->send_name.' / ( '.$e->cr_date.' )<br><i class="fa fa-commenting" aria-hidden="true"></i></label>';
                            }else{
                            echo '<label for="" class="col-sm-12 col-form-label" style="font-size: 14px!important;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;'.$e->send_name.' / ( '.$e->cr_date.' )<br><i class="fa fa-commenting" aria-hidden="true"></i></label>';    
                            }
                            echo '<div class="col-sm-12" style="border: 1px Solid #9E9E9E; margin:-8px 0 0px 18px; width: 75%; border-radius: 5px;">&nbsp;'.html_entity_decode($e->msg_desc).'</div>';
                          
                        }
                        if($sender==$Uid){
                            $reply=$receiver;
                        }else{
                            $reply=$sender;
                        }
                        ?>
                        </div>    
                    </div>
                    <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
                    <div class="row">
                        <input type="hidden" name="msg_send" id="msg_send" value="<?php echo isset($uid) ? $uid : ''; ?>" autocomplete="off">
                        <input type="hidden" name="msg_rcvr" id="msg_rcvr" value="<?php echo $reply; ?>" autocomplete="off">
                        <input type="hidden" name="msg_sub" id="msg_sub" value="<?php echo $msg_sub; ?>" autocomplete="off">
                        <input type="hidden" name="msg_id" id="msg_id" value="<?php echo $msg_id; ?>" autocomplete="off">
                        
                        <label for="" class="col-sm-12 col-form-label">Reply Message / Suggestions:<span class="reqd">*</span></label>
                        <div class="col-md-12">
                        <textarea name="msg_desc" id="editor" placeholder="Your Message..." class="form-control" autocomplete="off">
                            
                        </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div  style="float:right;"> 
                                <div class="btn btn-primary" onclick="chkValidData();"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Reply Message</div>
                            </div>
                        </div>
                    </div>
        
        <div class="text-right rg-footer"></div>    
        <?php echo form_close(); ?>
                </div>
            </div>
</div>
<script>
	initSample();
        $('.select2').select2({
            placeholder: 'Select Recipient',
            closeOnSelect: true
        });
        //========================================= Check Percentage =============================//
        function chkValidData(){
            $('#formID').submit();
        }
</script>
</body>
</html>
