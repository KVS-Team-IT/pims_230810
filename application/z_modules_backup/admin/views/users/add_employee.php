<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header register-header">ADD NEW / EXISTING EMPLOYEE</div>
    </div>
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
        <!-- ================================= CREATE USER START =====================================-->
        <?php echo form_open("", array("id" => "eform", "class" => "register", "autocomplete" => "off")); ?>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($users->id) ? $users->id : ''; ?>">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Employee Code:</label>
                <div class="col-sm-12">
                    <input type="text" name="username" value="<?php echo isset($users->username) ? set_value('username', $users->username) : set_value('username'); ?>" id="username" maxlength="6" class="form-control numericOnly" placeholder="Employee Code" autocomplete="off" onchange="CheckUnique();">
                    <span class="error" id="unerror"><?php echo form_error('username'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="" class="col-sm-12 col-form-label">Title:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("emp_title", array("" => "Select Title") + title_type(), isset($PerData->emp_title) ? set_value('emp_title', $PerData->emp_title) : set_value('emp_title'),' id="emp_title" class="form-control validate[required]" autocomplete="off"'); ?>
                    <span class="error" id="ttlerror"><?php echo form_error('emp_title'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Employee Name:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_name", isset($PerData->emp_name) ? set_value('emp_name', $PerData->emp_name) : set_value('emp_name'), 'placeholder="First Name" id="emp_name" class="txtOnly validate[required] form-control" autocomplete="off"'); ?>
                    <span class="error" id="nameerror"><?php echo form_error('emp_name'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="col-sm-12 col-form-label">Employee DOB:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("emp_dob", isset($PerData->emp_dob) ? set_value('emp_dob', date('d-m-Y', strtotime($PerData->emp_dob))) : set_value('emp_dob'), 'placeholder="dd-mm-yyyy"  id="emp_dob" class="datepicker-here form-control common_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error" id="doberror"><?php echo form_error('emp_dob'); ?></span>
                </div>
            </div>
            
        </div>
        <div class="modal-footer rg-footer">
            <div class="col-md-6 text-left">
                <label class="text-danger">*&nbsp;<small>Leave the Employee code field blank for generating a new Employee code by the system.</small></label>
            </div>
            <div class="col-md-6 text-right">
                <input type="reset" value="Cancel" class="btn btn-default">
                <div class="btn btn-primary" onclick="CheckUnique();" id="addemp">Add Employee</div> 
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script src="<?php echo base_url() ?>js/forms/add_user.js?v=1.1"></script>  
<script>
        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();

       
        function CheckUnique(){
            $('#unerror').html('');
            
            var Uid=$('#user_id').val();
            var Uname=$('#username').val();
            if((Uname)&& (Uname.length<4 || Uname.length>6)){
                $('#unerror').html('Username length should be 4 - 6 digits.');
                return false;
            }
            $.ajax({
                url: base_url + 'admin/users/cheque_unique_username',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&username=' + Uname+ '&user_id=' + Uid,
                type: 'GET',
                success: function (resp) {
                    console.log(resp);
                    if(resp=='true'){
                        $('#unerror').html('');
                        $('#eform').submit();
                    }else{
                        $('#unerror').html('Username Already Registered');
                        return false;
                    }
                }
            });
        }
</script>   
