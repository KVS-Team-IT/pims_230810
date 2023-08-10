<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PIMS Home</title>
</head>
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">PIMS</a></li>
            <li class="breadcrumb-item active">Home</li>
        </ol>
        <div class="card mb-3">
<!--         <div class="card-header">
                <i class="fa fa-home"></i>
            </div>-->
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
        <div class="row text-center" style="border: 1px solid hsl(0deg 0% 80% / 30%);border-top-right-radius: 5px;border-top-left-radius: 5px;background: #014a69;margin:0px 2px 0px 2px;padding: 5px 10px 0px 10px;color: #ffffff;font-style: italic;">
            <div style="width:100%; text-align: center;"><h5>Welcome To Personnel Information Management System</h5></div>
        </div>
        <div class="row" style="border: 1px solid hsl(0deg 0% 80% / 30%);border-radius:5px;margin:0px 2px 0px 2px;">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4 text-center" style="margin-top: 0px;">
                        <br><br>
                        <?php 
                        if($this->role_id==5){
                        echo "<i class='fas fa-building' style='font-size:75px;color:#fd7e14;'></i>";
                        }else if($this->role_id==6){
                        echo "<i class='fas fa-user' style='font-size:75px;color:#fd7e14;'></i>";
                        }else{
                        echo "<i class='fas fa-university' style='font-size:75px;color:#fd7e14;'></i>";
                        }
                        ?>
                        <br>
                        <div style="color:#014A69; font-weight: bold;"><?php echo strtoupper($UD->PLACE); ?></div>
                    </div>
                    <div class="col-sm-6 col-md-5" style="padding:5px; margin-top:35px;">
                           
                            <i class="fas fa-user-shield" style="font-size: 16px; color:#014a69;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->user_name; ?></i>
                            <hr>
                            <i class="fas fa-address-card" style="font-size: 16px;color:#00BCD4;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $UD->NAME;?>
                            <hr>
                            <i class="fas fa-envelope" style="font-size: 16px; color:#F44336;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $UD->EMAIL;?>
                        
                        <?php //echo '<i class="fas fa-clock-o" aria-hidden="true"></i> &nbsp;&nbsp;:&nbsp;&nbsp;'.$this->benchmark->elapsed_time();?>
                        <?php //echo '<br><i class="fa fa-hdd-o" aria-hidden="true"></i> &nbsp;&nbsp;:&nbsp;&nbsp;'.$this->benchmark->memory_usage();?>   

                    </div>
                    <div class="col-sm-6 col-md-3" style="padding:5px; margin-top:25px;"></div>
                </div>
            </div>
        </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-8 text-center" style="margin-top: -30px;">
                        
                    </div>
                    <div class="col-sm-6 col-md-4" style="padding:5px;">
                        <br>
                        <?php if($this->role_id==6){ ?>
                         <i class="fas fa-user-edit" style="font-size: 22px; color: #01a0e2;"></i> 
                        &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;" href="<?php echo base_url('my-profile/'). EncryptIt($this->user_name); ?>">My Profile</a>   
                        <?php }else{ ?>
                        <i class="fas fa-chart-pie" style="font-size: 22px; color: #01a0e2;"></i> 
                        &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;" href="<?php echo base_url('dashboard'); ?>">Goto Dashboard</a>
                        <?php  } ?>
                        <hr>
                        <i class="fas fa-key" style="font-size: 22px; color: #ff9800;"></i> 
                        &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;" href="<?php echo base_url('Update-Login-Password');?>">Update Password</a>
                        <hr>
                        <i class="fas fa-info-circle" style="font-size: 22px; color:#F44336;"></i> 
                        &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold; color:#014A69;"  data-toggle="modal" data-target="#myModal">Basic Instructions</a>                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right rg-footer"></div>    

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="color:#014A69;">Basic Instructions</h4>
        </div>
        <div class="modal-body">
            <h5 class="modal-title" style="color:#014A69;">1. Unlock Employee Profile for Edit / Update:</h5>
            <ul>
                <li>From the left side menu list, Select MIS REPORTS -> REGD. EMPLOYEES REPORT</li>
                <li>Click on the Lock button from the profile column against the Employee code you want to unlock.</li>
                <li>A pop-up opens for your confirmation, click agree to unlock the profile for edit/update.</li>
                <li>Now you can able to edit/update the Employee profile.</li>
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    $(document).ready(function(){
   	// $('#myModal').modal("show");
    });
</script>
</body>
</html>
