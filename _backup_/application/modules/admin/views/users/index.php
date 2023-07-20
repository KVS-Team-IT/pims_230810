<style>
    .buttons-excel{
       background-color: green;
       color: white;
    }
    .table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 1px !important;
    font-size: 11px!important;
    }
    .table thead th {
    vertical-align: bottom!important;
    border-bottom: 1px solid #dee2e6!important;
    background: #014a69!important;
    border-right: 1px solid #c4c0c0!important;
    color: #ffffff!important;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 5px 10px!important;
    border-bottom: 1px solid #111!important;
}
table.dataTable thead th, table.dataTable tfoot th {
    font-weight: 400!important;
}
.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
    font-size: 12px!important;
    vertical-align: middle;
</style>
<div id="content-wrapper">
    <div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
	  <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	  </li>
	  <li class="breadcrumb-item active">Users</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-users"></i> Registered Admin User List
            <?php if(has_permission('menu-user')){ ?>
                <a href="<?php echo base_url().'add-user'?>" class="btn btn-warning" style="float:right; line-height:5px;"><i class="fa fa-plus-circle"></i>&nbsp;Add User</a>	
            <?php } ?>
            </div>
            <?php if(isset($error_msg) && !empty($error_msg)){?>
		<div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $error_msg;?>.
		</div>
            <?php } if($this->session->flashdata('error')){ ?>
		<div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
            </div>
            <?php } if($this->session->flashdata('success')){ ?>
		<div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
            </div>
            <?php } ?>
            
            <div class="card-body">
		<div class="table-responsive">
		  <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
			<thead>
			  <tr>
			    <th><?php echo SN;?></th>
				<!--<th>Photo</th>-->
				<th>UNAME</th>
				<th>NAME</th>
				<th>STATUS</th>
				<th>ACTION</th>
			  </tr>
			</thead>
		  </table>
		</div>
            </div>
	</div>
    </div>
</div>

        <!-- Modal -->
        <div id="statusModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Change Status</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span class="success" id="status_msg"></span>
                    <?php echo form_open('',array('id'=>'status_form'));?>
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <div class="form-horizontal">
                            <div class="form-group">
                            <label class="col-form-label">Change Status</label>
                            <select name="status" id="status"  class="form-control">
                                <option value="">Select Option</option>
                                <option value="1">Approved</option>
                                <option value="2">Rejected</option>
                                <option value="3">Retired</option>
                            </select>
                            <span id="status_err"></span>
                            <div id="reasion">
                                <label class="col-form-label">Reason </label>
                                <textarea class="form-control" name="status_reason"></textarea>
                            </div>							
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="status_save">Submit</button>
                </div>
            </div>
            </div>
        </div>
        <!-- END CONTENT -->
        
        
    <!--Reset Pasword Modal -->
    <div id="resetPassModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
            <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Reset Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <span class="success text-center" id="resetpass_msg"></span>
        <?php  
            $action=base_url()."admin/users/admin_reset_password";
            echo form_open($action,array('id'=>'password_form'));
	?>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control password" autocomplete="off" placeholder="Password"> 
                <span class="error"><?php echo form_error('password');?></span>	
            </div>
            <div class="form-group">
                <input type="password" name="cpassword" id="cpassword" class="form-control password" autocomplete="off" placeholder="Confirm password"> 
                <span class="error"><?php echo form_error('cpassword');?></span>
            </div>
            
            <div class="form-group">
                <input type="hidden" name="user_id_forpass" id="user_id_forpass" value="">
                <input type="submit" value="Reset Password" class="btn btn-primary btn-block">
            </div>
            <?php  echo form_close(); ?>
    </div>
    </div>
    </div>
    </div>
    <!-- END CONTENT -->
    <?php echo $this->load->view("admin/js/users/users_js",'',true); ?> 
    <script>
	$.validator.addMethod("pwcheck", function(value) {
              //===================== Password Check ===================//
                return /[\@\#\$\%\^\&\*\(\)\_\+\!]/.test(value) 
                && /[A-Z]/.test(value) 
                && /[a-z]/.test(value) 
                && /[0-9]/.test(value) 
        },"Password should have One Uppercase Letter, One Lowercase Letter, One Number & One Special Character.");
        $('#password_form').validate({
            rules:{
                password:{
                    required:true,
                    pwcheck:true,
                    minlength: 6

                },
                cpassword:{
                    required:true,  
                    equalTo:"#password",
                    minlength: 6
                }
            },
            messages:{
                password:{
                    required:'Please enter your new password with Minimum length 6'
                },
                cpassword:{
                    required:'Please enter confirm password',  
                    equalTo:'Password and Confirm password does not matched'
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

        var confirm_password = document.getElementById('cpassword');
        var hashPassword = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
        hashPassword.update(confirm_password.value);
        confirm_password.value = hashPassword.getHash("HEX"); 
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
    //================================= ADMIN RESET PASSWORD START ==================================//
    </script>     
        
  

