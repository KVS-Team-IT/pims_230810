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
		<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Reports</li>
	</ol>
        <div class="card mb-3">
	<div class="card-header">
            <div class="row">
                <div class="col-md-12 text-center"><i class="fas fa-tasks"></i>&nbsp; Registered Employee's Report Against Sanctioned Post</div>
            </div>
        </div>
        <hr>
        <div class="card-header">    
            <form>
            <div class="row">
                    <div class="form-group col-md-3" >
                        <label class="col-sm-12 col-form-label text-white">Place of Posting  <span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_role_id", array("" => "Select") + role_lists(), '', 'id="role_id_initial" data-id="c" onchange="processRegionInitialDiv();" class="form-control validate[required]"  '); ?>
                            <span class="error"><?php echo form_error('initial_role_id'); ?></span> 
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="region_div_initial" style="display:none;">
                        <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Regions<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_region_id", array("" => "Select") + region_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();"  class="form-control validate[required]" ');    ?>
                            <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="school_div_initial" style="display:none;">
                        <label  class="col-sm-12 col-form-label text-white">Schools<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_school_id", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="getdesignation(5)" '); ?>
                            <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="section_div_initial" style="display:none;">
                        <label class="col-sm-12 col-form-label text-white">Section<span class="reqd">*</span></label>
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_section_id", array("" => "Select") + section_lists(), '', 'class="form-control validate[required]"  id="initial_section_id" data-id="c" onchange="getdesignation(2)" '); ?>
                            <span class="error"><?php echo form_error('initial_section_id'); ?></span>
                        </div>
                    </div>
            
                
                <div class="form-group col-md-3" id="designation" style="display:none;">
                    <label class="col-sm-12 col-form-label text-white">Designation<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_dropdown("desiganition_id", array("" => "Select") + designation_lists(), '', 'id="desiganition_id" data-id="c"  class="form-control" onchange="getsubject()" ');    ?>
                    </div>
                </div>
                
                <div class="form-group col-md-3" id="subject" style="display:none;" >
                    <label class="col-sm-12 col-form-label text-white" id="">Subject<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                    <?php echo form_dropdown("subject_id", array("" => "Select") + subject_lists(), '', 'id="subject_id" data-id="c"  class="form-control validate[required]" ');    ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-sm-12">
                    <button type="button" id="btn_filter" class="btn btn-warning btn-block float-left"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
                </div>
            </div>
            </form>
                
	</div>
			
           <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>EMP. CODE</th>
                            <th>STATUS</th>
                            <th>NAME</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT</th>
                            <th>DATE OF BIRTH</th>
                            <th>REGION/UNIT</th>
                            <th>SCHOOL</th>
                            <th>PROFILE</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    
                    </table>
                </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("reports/js/reports/reports_js",'',true); ?>     
        

