<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    
</head>
<div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact & Suggestions</li>
				
            </ol>
            <div class="card mb-3">
                <div class="card-header"><i class="fa fa-envelope-open">&nbsp;&nbsp;EMPLOYEE CONTACT / SUGGESTION FORM</i></div>
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

                    <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
                    <div class="row">
                        <input type="hidden" name="msg_send" id="msg_send" value="<?php echo isset($uid) ? $uid : ''; ?>" autocomplete="off">
                        <label for="" class="col-sm-12 col-form-label">Select Recipient:<span class="reqd">*</span></label>
                        <div class="col-sm-6">
                        <select name="msg_rcvr" class="select2 form-control validate[required]" id="msg_rcvr" autocomplete="off">
                        <option value="" selected="selected">Select Recipient</option>
                        <?php
                       // foreach($E as $e){
                       //     echo '<option value="'.$e->ID.'">'.$e->NAME.'</option>';
                       // }
                        ?>
                        </select>
                        <span class="error" style="display: none;">Select Recipient</span>
                        </div>
                        <div class="col-sm-6">&nbsp;</div>
                        
                        <label for="" class="col-sm-12 col-form-label">Subject:<span class="reqd">*</span></label>
                        <div class="col-sm-6">
                        <input type="text" name="msg_sub" value="" placeholder="Subject..."  class="txtOnly validate[required] form-control" autocomplete="off">
                        <span class="error"></span>
                        </div>
                        <div class="col-sm-6">&nbsp;</div>
                        <label for="" class="col-sm-2 col-form-label">Message / Suggestions:<span class="reqd">*</span></label>
                        <div class="col-md-12">
                        <textarea name="msg_desc" id="editor" placeholder="Your Message..." class="form-control" autocomplete="off">
                            
                        </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div  style="float:right;"> 
                                <div class="btn btn-primary" onclick="chkValidData();"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;Send Message</div>
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
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    $(document).ready(function(){
    $("#msg_rcvr").select2({
    ajax: { 
        url: function (params) {
        return base_url + 'admin/Contact/GetRecipientAddress/' + params.term;
    },
    type: "post",
    dataType: 'json',
    delay: 250,
    data: get_csrf_token_name + '=' + get_csrf_hash,
    processResults: function (resp) {
        return {
            results: $.map(resp, function(obj) {
            return { id: obj.ID, text: obj.NAME };
            })
        };
   }
   //cache: true
  }
 });
});
</script>
</body>
</html>
