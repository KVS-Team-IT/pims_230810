<?php //show($this->region_id); ?>
<style>
    @font-face {
        font-family: 'text-security-disc';
        src:    url('../../fonts/text-security-disc.eot');
        src:    url('../../fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
                url('../../fonts/text-security-disc.woff') format('woff'),
                url('../../fonts/text-security-disc.ttf') format('truetype'),
                url('../../images/text-security-disc.svg#text-security') format('svg');
    }
    input.password {
        font-family: 'text-security-disc';
    }
    .Assign_Header{
        background: #014a69;
        color: #ffffff;
        padding: 5px 10px;
        text-align: center;
        font-size: 20px;
        border-radius: 5px
    }
</style>
<div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mt-5">
        <div class="Assign_Header">Assign School & Observer for Class Observation</div>
    </div>
    <div class="card-body">
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
        <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
        <h5 style="color: #014a69;">Select School for Observation :<hr></h5>
        <div class="row">
            <div class="form-group col-md-3" id="region_div_initial">
                <label class="col-sm-12 col-form-label" id="initial_region_label">Region<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_region_id", array("" => "Select") + masterregion_lists(),'', 'id="initial_region_id" onchange="processSchoolInitialDiv();"  class="form-control validate[required]" readonly');    ?>
                    <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-3" id="school_div_initial">
                <label  class="col-sm-12 col-form-label">School<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("initial_school_id", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="initial_school_id"'); ?>
                    <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                </div>
            </div>
        </div>
        <h5 style="color: #014a69;"><hr>Select Observer for Class Observation :<hr></h5>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Organization Level:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("role_id", array("" => "Select Level") + ObserverRole(), isset($users->role_id) ? set_value('role_id', $users->role_id) : set_value('role_id'), 'class="form-control role" onchange="processRegionDiv();" id="role_id" data-id="c" autocomplete="off"'); ?>
                    <span class="error"><?php echo form_error('role_id'); ?></span>
                </div>
            </div>
           
            <div class="form-group col-md-4" id="region_div" style="display:none;">
                <label for="" class="col-sm-12 col-form-label" id="region_label">Regions:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php //echo form_dropdown("region", array("" => "Select Region") + region_lists(), isset($users->region) ? set_value('region', $users->region) : set_value('region'), 'class="form-control region"  id="c_region" data-id="c" autocomplete="off"'); ?>
                    <select class="form-control region" name="region_id" id="region_id" autocomplete="off">
                        <option value="">Select Region</option>
                    </select> 
                    <span class="error"><?php echo form_error('region'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4" id="school_div" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Schools:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <select class="form-control school" name="school_id" id="school_id" autocomplete="off">
                        <option value="">Select School</option>
                    </select> 

                    <span class="error"><?php echo form_error('school'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4" id="observer_div" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Select Observer:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <select class="validate[required] form-control"  name="observer_id" id="observer_id" autocomplete="off" onchange="SetObserverName();"required="required">
                       
                    </select> 
                    <span class="error"><?php echo form_error('observer'); ?></span>
                    <input type="hidden" name="observer_name" id="observer_name" value="">
                </div>
            </div>
            <div class="form-group col-md-4" id="observer_date_div" style="display:none;">
                 <label for="" class="col-sm-12 col-form-label">Select Observe Date:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_input("observe_date", '', 'placeholder="Observe Date"  id="observe_date" class="datepicker-here form-control future_datepicker validate[required]" autocomplete="off"'); ?>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <span class="error"><?php echo form_error('obs_sub_date'); ?></span>
                </div>
            </div>
        </div>
        <div class="modal-footer text-right rg-footer">
            <div class="col-md-6">
                &nbsp; 
            </div>
            <div class="col-md-3">
                <div class="btn btn-warning btn-block" onclick="rstform();">Cancel</div>
            </div>
            <div class="col-md-3">
                <div class="btn btn-primary btn-block" id="perSaveBtn" onclick="chkform();">Submit</div>  
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table-sm" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background:#014a69!important;color:#ffffff;">
                            <th>#SL. NO.</th>
                            <th>USER ID</th>
                            <th>OBSERVER NAME</th>
                            <th>OBS. REGION</th>
                            <th>OBS. SCHOOL</th>
                            <th>KV REGION</th>
                            <th>KV NAME</th>
                            <th width="9.5%">OBSERVE DATE</th>
                            <th style="text-align:center;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     if(sizeof($OBS)>0){
                         foreach($OBS as $K=>$V){
                             if($V->OBS_STATUS=='ACTIVE'){$ACT='btn-success';}else{$ACT='btn-default';}
                             if($V->CR_BY==$this->auth_user_id){
                             echo '<tr><td style="text-align:center;">'.($K+1).'</td><td>'.$V->OBS_ID.'</td><td>'.$V->OBS_NAME.'</td><td>'.$V->OBS_REGION.'</td><td>'.$V->OBS_SCHOOL.'</td><td>'.$V->REGION.'</td><td>'.$V->SCHOOL.'</td><td><button class="btn '.$ACT.' btn-sm">'.$V->OBS_DATE.'</button></td><td style="text-align:center;"><button class="btn btn-danger btn-sm" onclick="DeleteObs('.$V->ID.')"> DELETE</button></td></tr>';
                             }else{
                             echo '<tr><td style="text-align:center;">'.($K+1).'</td><td>'.$V->OBS_ID.'</td><td>'.$V->OBS_NAME.'</td><td>'.$V->OBS_REGION.'</td><td>'.$V->OBS_SCHOOL.'</td><td>'.$V->REGION.'</td><td>'.$V->SCHOOL.'</td><td><button class="btn '.$ACT.' btn-sm">'.$V->OBS_DATE.'</button></td><td style="text-align:center;"><button class="btn btn-default btn-sm">DENIED</button></td></tr>';    
                             }
                         }
                     }else{
                         echo '<tr><td colspan="9" style="text-align:center;color:#f00;">No Records found.</td></tr>';
                     }
                     ?>
                    </tbody>                    
                    </table>
                </div>
            </div>
</div>
</div>
<script>
$( document ).ready(function() {
    console.log( "ready!" );
    var RoId="<?php echo $this->region_id; ?>";
    var RoleId="<?php echo $this->role_id; ?>";
    var KvId="<?php echo $this->school_id; ?>";
    if((RoId) && (RoId>0)){
        $("#initial_region_id").val(RoId).trigger('change');
        setTimeout(function() { 
            if((RoleId==5) && (KvId>0)){
                $("#initial_school_id").val(KvId).trigger('change');
                $('#initial_school_id').attr('readonly', true);
            }
        }, 1000);
        
    }
});        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();
        function CallObserver(role_id,region_id,kv_id){
            $.ajax({
                    url: base_url + 'webtools/Webtools/AssignObserverUser',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id+'&ro_id=' + region_id+'&kv_id=' + kv_id,
                    type: 'POST',
                    success: function (resp) {
                        //console.log(resp);
                        $('#observer_id').html(resp);
                        $("#observer_div").css("display", "block");
                        $("#observer_date_div").css("display", "block");
                    }
                });
        }
        function processRegionDiv(){
            var role_id = $("#role_id").val();
            $("#observer_id").val('').trigger('change');
            if(role_id=='2'){ //KVS HQ
                $('#region_id').html('');
                $("#region_div").css("display", "none");
                var RoId=null;
                var KvId=null;
                CallObserver(role_id,RoId,KvId);
            }
            if(role_id=='3'){ //RO // KV
                $('#school_id').html('');
                $("#school_div").css("display", "none");
                $.ajax({
                    url: base_url + 'admin/users/get_region',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                    type: 'POST',
                    success: function (response) {
                        $('#region_id').html(response);
                        $("#region_div").css("display", "block");
                    }
                });
            }
            if(role_id=='5' ){ //RO // KV
                $.ajax({
                    url: base_url + 'admin/users/get_region',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                    type: 'POST',
                    success: function (response) {
                        $('#region_id').html(response);
                        $("#region_div").css("display", "block");
                    }
                });
            }
        }
            
        $('.region').on('change', function () {
            var role_id = $("#role_id").val();
            var region_id    = $("#region_id").val();
            if(role_id==3){
                var KvId=null;
                CallObserver(role_id,region_id,KvId);;
            }else if(role_id==5){
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#school_id').html(response);
                        $("#school_div").css("display", "block");
                    }
                });
            }else{
                alertify.error('Select Organisation Level'); 
            }
        });
        $('.school').on('change', function () {
            var role_id   = $("#role_id").val();
            var region_id = $("#region_id").val();
            var school_id = $("#school_id").val();
            if(school_id){
                CallObserver(role_id,region_id,school_id);
            
            }else{
                alertify.error('Select Organisation Level'); 
            }
        });
 function DeleteObs(ObsId){
     if(ObsId){
         $.ajax({
                    url: base_url + 'webtools/Webtools/delete_ro_observer',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&ObsId=' + ObsId,
                    type: 'POST',
                    success: function (resp) {
                        console.log(resp);
                        if(resp==1){
                            location.reload();
                        }
                    }
                });
     }
 }

</script>  
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    function processSchoolInitialDiv() {
        var region_id = $("#initial_region_id").val();
        if (region_id != '') {
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#initial_school_id').html(response);
                    }
                });
            }else{
               $('#initial_school_id').html();
            }
    }
    function SetObserverName(){
        var ObsName = $('#observer_id').find(":selected").text();
        $("#observer_name").val(ObsName);
    }
    function rstform(){
        location.reload();
    }
    function chkform(){
        var initial_region_id = $('#initial_region_id').val();
        if(!initial_region_id){
            alertify.error('Please Select School Region');
            return false;
        }
        var initial_school_id = $('#initial_school_id').val();
        if(!initial_school_id){
            alertify.error('Please Select School for Observation');
            return false;
        }
        var role_id = $('#role_id').val();
        if(!role_id){
            alertify.error('Please Select Organization Level');
            return false;
        }
        var region_id = $('#region_id').val();
        if((role_id==3 || role_id==5) && (!region_id)){
            alertify.error('Please Select Observer Region');
            return false;
        }
        var school_id = $('#school_id').val();
        if((role_id==5) && (!school_id)){
            alertify.error('Please Select Observer School');
            return false;
        }
        var observer_id = $('#observer_id').val();
        if(!observer_id){
            alertify.error('Please select Observer');
            return false;
        }
        var observe_date = $('#observe_date').val();
        if(!observe_date){
            alertify.error('Observation Date required');
            return false;
        }
        $('#formID').submit();
    }
</script>
