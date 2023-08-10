<?php //show($OD); ?>
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
</style>
<div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header register-header">Create new Login for Observer</div>
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
        <?php echo form_open("", array("id" => "form", "class" => "register", "autocomplete" => "off")); ?>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo isset($users->id) ? $users->id : ''; ?>">
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
                    <select class="validate[required] form-control"  name="observer_id" id="observer_id" autocomplete="off" required="required">
                       
                    </select> 
                    <span class="error"><?php echo form_error('observer'); ?></span>
                </div>
            </div>
            
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Password:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <input type="password" name="password" id="password" class="form-control password" value="" minlength="8" autocomplete="off" placeholder="Password" autocomplete="off" required>
                    <span class="error"><?php echo form_error('password'); ?></span>
                    
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Confirm Password:<span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <input type="password" name="cpassword" id="cpassword" class="form-control password" value="" autocomplete="off"  placeholder="Confirm Password" autocomplete="off" required>
                    <span class="error"><?php echo form_error('cpassword'); ?></span>
                    
                </div>
            </div>
        </div>
        <div class="modal-footer text-right rg-footer">
            <div class="col-md-12">
                <input type="reset" value="Cancel" class="btn btn-default">
                <?php  echo form_submit('', 'Submit', 'class="btn btn-primary"');?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
<hr>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>USER ID</th>
                            <th>OBSERVER NAME</th>
                            <th>DESIGNATION</th>
                            <th>REGION</th>
                            <th>UNIT</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                            <!-- <th>DELETE</th> -->
                        </tr>
                    </thead>
                    <tbody>
                     <?php
                     if(sizeof($OBS)>0){
                         foreach($OBS as $K=>$V){
                             echo '<tr><td>'.($K+1).'</td><td>'.$V->USER_ID.'</td><td>'.$V->OBSERVER_NAME.'</td><td>'.$V->DESIGNATION.'</td><td>'.$V->REGION.'</td><td>'.$V->UNIT.'</td><td>'.$V->STATUS.'</td><td><button class="btn btn-danger" onclick="DeleteObs('.$V->ID.')">Delete</button></td></tr>';
                         }
                     }else{
                         echo '<tr><td colspan="8">No Record found.</td></tr>';
                     }
                     ?>
                    </tbody>
                    
                    </table>
                </div>
            </div>
</div>
</div>
<script>
        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();
        function CallObserver(role_id,region_id,kv_id){
            $.ajax({
                    url: base_url + 'webtools/Webtools/get_observer',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id+'&ro_id=' + region_id+'&kv_id=' + kv_id,
                    type: 'POST',
                    success: function (resp) {
                        console.log(resp);
                        $('#observer_id').html(resp);
                        $("#observer_div").css("display", "block");

                    }
                });
        }
        function processRegionDiv(){
            var role_id = $("#role_id").val();
            if(role_id=='2'){ //KVS HQ
                var RoId=null;
                var KvId=null;
                CallObserver(role_id,RoId,KvId);
            }
            if(role_id=='3' || role_id=='5' ){ //RO // KV
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
                    url: base_url + 'webtools/Webtools/delete_observer',
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
