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
        <!-- Data Tables Example --> 
	<div class="card mb-3">
            <div class="card-header text-center"><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Registered Employee's Report<hr>
            <form>
            <div class="row col-md-12">
                    <div class="form-group col-md-3" >
                        
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_role_id", array("" => "Select Place of Posting") + role_lists(), '', 'id="role_id_initial" data-id="c" onchange="processRegionInitialDiv();" class="form-control validate[required]"  '); ?>
                            <span class="error"><?php echo form_error('initial_role_id'); ?></span> 
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="region_div_initial" style="display:none;">
                       
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_region_id", array("" => "Select Region") + region_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();"  class="form-control validate[required]" ');    ?>
                            <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="school_div_initial" style="display:none;">
                        
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_school_id", array("" => "Select School") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="getdesignation(5)" '); ?>
                            <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                        </div>
                    </div>
                    <div class="form-group col-md-3" id="section_div_initial" style="display:none;">
                        
                        <div class="col-sm-12">
                            <?php echo form_dropdown("initial_section_id", array("" => "Select Section") + section_lists(), '', 'class="form-control validate[required]"  id="initial_section_id" data-id="c" onchange="getdesignation(2)" '); ?>
                            <span class="error"><?php echo form_error('initial_section_id'); ?></span>
                        </div>
                    </div>
            </div>
            <div class="row col-md-12">
                <div class="form-group col-md-3" id="designation_alt" style="display:block;"></div>
                <div class="form-group col-md-3" id="designation" style="display:none;">
                    
                    <div class="col-sm-12">
                    <?php echo form_dropdown("desiganition_id", array("" => "Select Designation") + designation_lists(), '', 'id="desiganition_id" data-id="c"  class="form-control" onchange="getsubject()" ');    ?>
                    </div>
                </div>
                <div class="form-group col-md-3" id="subject_alt" style="display:block;"></div>
                <div class="form-group col-md-3" id="subject" style="display:none;" >

                    <div class="col-sm-12">
                    <?php echo form_dropdown("subject_id", array("" => "Select Subject") + subject_lists(), '', 'id="subject_id" data-id="c"  class="form-control validate[required]" ');    ?>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-sm-12">
                    <button type="button" id="btn_filter" class="btn btn-primary btn-block float-left"><i class="fa fa-search"></i>&nbsp; SEARCH</button>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-sm-12">
                    <a href="<?php echo base_url('employee-report'); ?>" class="btn btn-warning btn-block float-right"><i class="fa fa-sync"></i>&nbsp; RESET</a>
                    </div>
                </div>
                    
            </div>
            </form>
                </div>
	</div>
			
           <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>EMP CODE</th>
                            <th>NAME</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT</th>
                            <th>DATE OF BIRTH</th>
                            <th>REGION/UNIT</th>
                            <th>SCHOOL</th>
                           
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
        

