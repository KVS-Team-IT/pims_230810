<style>
    .col-form-label-data{
    color: #014a69;
    font-weight: bold;
    font-size: 12px;
    text-align: left;
    }
</style>
<?php //show($CsPro);?>
<div id="content-wrapper">
    <div class="container-fluid">
        
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>dashboard">Dashboard</a>
            </li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
            <div class="card-header text-center"><i class="fas fa-users"></i>&nbsp;KV Classes Strength </div>
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
                <div class=" background_div">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">Kendriya Vidyalaya Name:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("kv_name",set_value('kv_name', $KvPro->name), 'placeholder="KV NAME" id="kv_name" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">KV Code:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("kv_kv_code",set_value('kv_name', $KvPro->kv_code), 'placeholder="KV CODE" id="kv_kv_code" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">KV Shift:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("kv_shift",set_value('kv_name', $KvPro->shift_name), 'placeholder="KV SHIFT" id="kv_shift" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group col-md-12" style="margin-top: -10px;"><hr></div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">CLASS<span class="reqd">*</span></label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">NO. OF SECTION<span class="reqd">*</span></label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">STUDENT STRENGTH<span class="reqd">*</span></label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">STUDENT ON ROLL<span class="reqd">*</span></label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">CLASSROOM LENGTH<br>(in Mtr.)<span class="reqd">*</span></label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="col-sm-12 col-form-label-data">CLASSROOM WIDTH<br>(in Mtr.)<span class="reqd">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($CsPro){
                            foreach($CsPro as $val){ ?>
                        <div class="form-group col-md-12"><hr></div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_cls",set_value('kv_cls', $val->name), 'placeholder="Class" id="kv_cls" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_sec",set_value('kv_sec', $val->section), 'placeholder="Section" id="kv_sec" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_sec_stu", set_value('kv_sec_stu', $val->class_strength), 'placeholder="Student Per Section" id="kv_sec_stu" class="numericOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_onroll_stu",set_value('kv_onroll_stu', $val->class_strength_onroll), 'placeholder="Student on Roll" id="kv_onroll_stu" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_length",set_value('kv_length', $val->classroom_length), 'placeholder="Classroom Length" id="kv_length" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_width",set_value('kv_width', $val->classroom_width), 'placeholder="Classroom Width" id="kv_width" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                            </div>
                        </div> 
                            <?php } }else{ 
                        foreach(observed_class() as $key=>$val){  ?>
                        <div class="form-group col-md-12"><hr></div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_cls",set_value('kv_cls', $val), 'placeholder="Class" id="kv_cls" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_sec", set_value('kv_sec',0), 'placeholder="Section" id="kv_sec" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_sec_stu", set_value('kv_sec_stu', 40), 'placeholder="Student Per Section" id="kv_sec_stu" class="numericOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_onroll_stu",set_value('kv_onroll_stu', 0), 'placeholder="Student on Roll" id="kv_onroll_stu" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_length",set_value('kv_length', 0), 'placeholder="Classroom Length" id="kv_length" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="col-sm-12">
                                <?php echo form_input("kv_width",set_value('kv_width',0), 'placeholder="Classroom Width" id="kv_width" class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                                <span class="error"><?php echo form_error('emp_name'); ?></span>
                            </div>
                        </div> 
                        <?php }} ?>
                        

                        
                    </div>
                </div>
            </div>
	</div>
    </div>
</div>
<script>
    $(document).ready(function() {
        //$('#example').DataTable();
        
    });
    function GenerateLPC(){
        alertify.error('Initiate Transfer to Generate LPC');
    }
</script>

    

