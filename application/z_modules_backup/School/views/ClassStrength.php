<?php //show($this->session->all_userdata());?>
<style>
.buttons-excel{
       background-color: green;
       color: white;
    }
.table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 1px !important;
    font-size: 12px!important;
    letter-spacing: .9px;
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

.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
    font-size: 12px!important;
    vertical-align: middle;
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
            <div class="card-header text-center"><i class="fas fa-users"></i>&nbsp;KV CLASS STRENGTH </div>
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
                    <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">KENDRIYA VIDYALAYA NAME:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <?php echo form_input("kv_name",set_value('kv_name', $KvPro->name), 'placeholder="KV NAME" id="kv_name" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">KENDRIYA VIDYALAYA CODE:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <input type="hidden" name="kv_code" id="kv_code" value="<?php echo $KvPro->code; ?>" autocomplete="off">
                                <?php echo form_input("kv_kv_code",set_value('kv_name', $KvPro->kv_code), 'placeholder="KV CODE" id="kv_kv_code" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="col-sm-12 col-form-label">KENDRIYA VIDYALAYA SHIFT:<span class="reqd"></span></label>
                            <div class="col-sm-12">
                                <input type="hidden" name="kv_shift" id="kv_shift" value="<?php echo $KvPro->shift; ?>" autocomplete="off">
                                <?php echo form_input("kv_shift_name",set_value('kv_shift_name', $KvPro->shift_name), 'placeholder="KV SHIFT" id="kv_shift" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="row" style="margin:0px -0.5px!important;">
                        
                        <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:9%;">Class Name</th>
                            <th style="width:12.5%;">No. of Section(s)</th>
                            <th style="width:20%;">Students Per Section [ Approved ]</th>
                            <th style="width:15%;">Total Students Enrolled</th>
                            <th style="width:17%;">Classroom Length [ in Mtr. ]</th>
                            <th style="width:16.5%;">Classroom Width [ in Mtr. ]</th>
                            <th style="width:10%;">Class Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($CSPro as $C){
                                if($C->CLS_STS==1){ echo '<tr style="background:#e6ffe6;">'; }else { echo '<tr style="background:#ffe6e6;">'; }
                        ?>   
                            <td>
                                <input type="hidden" name="kv_cls_id[]" id="kv_cls_id" value="<?php echo $C->CLS_ID; ?>" autocomplete="off">
                                <?php echo form_input("kv_cls[]",set_value('kv_cls', $C->CLS_NAME), 'placeholder="Class" id="kv_cls" class="txtOnly validate[required] form-control" autocomplete="off" readonly'); ?>
                            </td>
                            <td><?php echo form_input("kv_sec[]",set_value('kv_sec', $C->CLS_SEC), 'placeholder="Section" id="kv_sec" class="numericOnly validate[required] form-control" autocomplete="off"'); ?></td>
                            <td><?php echo form_input("kv_sec_stu[]", set_value('kv_sec_stu', $C->CLS_STU), 'placeholder="Student Per Section" id="kv_sec_stu" class="numericOnly validate[required] form-control" autocomplete="off" readonly'); ?></td>
                            <td><?php echo form_input("kv_onroll_stu[]",set_value('kv_onroll_stu', $C->CLS_STU_ONROLL), 'placeholder="Student on Roll" id="kv_onroll_stu" class="numericOnly validate[required] form-control" autocomplete="off"'); ?></td>
                            <td><?php echo form_input("kv_length[]",set_value('kv_length', $C->CLS_LEN), 'placeholder="Classroom Length" id="kv_length" class="decimalNumericOnly validate[required] form-control" autocomplete="off"'); ?></td>
                            <td><?php echo form_input("kv_width[]",set_value('kv_width', $C->CLS_WTH), 'placeholder="Classroom Width" id="kv_width" class="decimalNumericOnly validate[required] form-control" autocomplete="off"'); ?></td>
                            <td><?php echo form_dropdown("kv_status[]", array("0" => "Inactive","1"=>"Active"), isset($C->CLS_STS) ? set_value('kv_status', $C->CLS_STS) : set_value('kv_status',0), ' id="kv_status" class="form-control validate[required]" autocomplete="off" '); ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-sm-12" style="margin: -25px 0px 40px 22px!important;">
                        <div class="col-sm-12">
                        <div  style="float:right;"> 
                            <input class="btn btn-warning" type="submit" value="SAVE / UPDATE CLASS DATA">
                        </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
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

    

