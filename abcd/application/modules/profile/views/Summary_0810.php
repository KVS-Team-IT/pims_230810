<style>
figure {
  display: inline-block;
  border: 10px solid #ffffff;
}
figure img {
  vertical-align: top;
}
figure figcaption {
  padding: 5px 0;
  text-align: center;
  background: #9BC90D;
}
.wrapper a {
  color: #fff;
}
/*****************/

.wrapper {
    margin: auto;
    width: 144px;
    height: 175px;
    position: inherit;
}
.ribbon-wrapper-green {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: -1px;
  right: -1px;
}
.ribbon-green {
    font-size: 10px;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    font-weight: bold;
    line-height: 20px;
    transform: rotate(50deg);
    width: 120px;
    display: block;
    background: #79A70A;
    background: linear-gradient(#9BC90D 0%, #79A70A 100%);
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 25px;
    right: -33px;
}
.ribbon-green:before,
.ribbon-green:after {
  content: '';
  position: absolute;
  left: 0px;
  top: 100%;
  z-index: -1;
  border-left: 3px solid #79A70A;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #79A70A;
}


.ribbon-wrapper-red {
  width: 85px;
  height: 88px;
  overflow: hidden;
  position: absolute;
  top: -1px;
  right: -1px;
}
.ribbon-red {
  font-size: 10px;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    font-weight: bold;
    line-height: 20px;
    transform: rotate(50deg);
    width: 120px;
    display: block;
    background: #F00;
    background: linear-gradient(#F00 0%, #F00 100%);
    box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
    position: absolute;
    top: 25px;
    right: -33px;
}
.ribbon-red:before,
.ribbon-red:after {
  content: '';
  position: absolute;
  left: 0px;
  top: 100%;
  z-index: -1;
  border-left: 3px solid #F00;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #79A70A;
}
@media (max-width: 992px) {
  .wrapper {
    margin: 20px auto;
    width: 100%;
    height: auto;
    position: relative;
  }
}
</style>
<div class="row mt-0 m-1" style="background:#ffffff!important;" id="Summary_PDF"></div>
<div class="col-md-12"><hr></div>
<div class="col-md-12">
    <div class="h-100">
        <div class="row h-100">
            <div class="col-12">
            <div class="profile-card card">
                <div class="card-body" style="background: #e0e0e0;">
                    <div class="row">
                        <div class="col-md-2">
                        <div class="wrapper">
                            <figure>
                                <img class="img-responsive" src="<?php echo base_url()."img/ProImage/".$PerData->emp_photo;?>" width="125" height="145"/>
<!--                                <figcaption><strong>Profile Verified</strong></figcaption>-->
                            </figure>
                            <?php 
                            if($PerData->emp_acceptance==1){
                            ?>
                            <div class="ribbon-wrapper-green">
                                <div class="ribbon-green">Verified</div>
                            </div>
                            <?php }else { ?>
                            <div class="ribbon-wrapper-red">
                                <div class="ribbon-red">Not Verified</div>
                            </div>
                            <?php } ?>
                        </div>
                        </div>
                        
                        <div class="col-md-4">
                            <h5>Personal Information:</h5><hr>
                            <?php 
                            if($PerData->emp_title==1){ $title='Sh.'; } 
                            elseif ($PerData->emp_title==2) { $title='Smt.'; } 
                            elseif ($PerData->emp_title==3) { $title='Ms.'; } 
                            else {  $title=''; }
                            echo '<b>Employee Name : </b> '.$title.' '.$PerData->emp_name;
                            echo '<br><b>Employee Code  &nbsp;: </b> '.$PerData->emp_code; 
                            echo '<br><b>Mobile Number&nbsp;&nbsp;&nbsp;: </b> '.$PerData->emp_mobile_no; 
                            echo '<br><b>Email Id : </b> '.$PerData->emp_email;
                            echo '<br><b>Profile Verified : </b> '.$PerData->PV;
                            echo '<hr>';
                            ?>
                        </div>
                        
                        <div class="col-md-6">
                            <h5>Present Posting Details:</h5><hr>
                            <?php 
                            echo '<b>Designation : </b> '.$PresentServiceData->designationname; 
                            echo '<br><b>Subject : </b>'.$PresentServiceData->subjectname;
                            if($PresentServiceData->present_place=='5'){ echo '<br><b>Place of Posting : </b>'.$PresentServiceData->school.' / '.'Code: '.$PresentServiceData->present_kvcode; } 
                            if($PresentServiceData->present_unit=='5') { echo '<br><b>Place of Posting : </b>'.$PresentServiceData->section.' / '.'Code: '.$PresentServiceData->present_kvcode; }
                            echo '<br><b>Region : </b>'.$PresentServiceData->region; 
                            echo '<br><b>Date of Joining: </b>'.$PresentServiceData->present_joiningdate; 
                            echo '<hr>';
                            ?>
                        </div>
                        <!--========================= PROFILE VERIFIED TAB ===============================-->
                        <?php 
                        if($PerData->emp_acceptance==1){
                        ?>
                            <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="check" checked="checked">
                            <label class="custom-control-label" for="customCheck">
                                Profile Verified On : <?php echo date("d-m-Y H:i:A", strtotime($PerData->emp_acceptancedate)); ?>
                            </label>
                        </div>
                        </div>
                        <?php
                        }else{
                            if($PerData->emp_code==$this->user_name){
                            echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); 
                        ?>
                        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($EmpCode) ? $EmpCode : ''; ?>" autocomplete="off">
                        <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="check">
                            <label class="custom-control-label" for="customCheck">
                                 I hereby accept that all the information filled in KVS - Personnel Information Management System is true to the best of my knowledge. 
                                <br>(Information filled in personnel details can not be altered.)  
                            </label>
                        </div>
                        </div>
                        <div class="col-md-12 float-right">
                            <div class="btn btn-warning" onclick="validAccept();" style="float:right;">Accept</div>
                        </div>
                        <?php 
                        echo form_close(); 
                        }}
                        ?>
                    </div>    
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
<div class="col-md-12">
    <hr>
</div>
<script>
    function validAccept(){
        if ($('#customCheck').is(":checked")){
            alertify.confirm('Profile Verification',
                             'This action cannot be undone. Are you confirm your verification?',
            function(){ 
                $('#formID').submit();
            }, function(){
                alertify.error('Action Cancelled');
            }).set('labels', {ok:'Agree', cancel:'Disagree'}); ;
        }else{
            alertify.error('Select checkbox to Accept');
            return false;
        }
        
    }
</script>
