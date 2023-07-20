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
            <li class="breadcrumb-item active">Reports</li>
			
	</ol>

			
            <div class="card-header">
            <div class="row">
                <div class="col-md-12 text-center"><i class="fas fa-tasks"></i>&nbsp; Report's of In-Position and Vacant Post Against Sanctioned Post</div>
            </div>
                </div>
            <div class="card mb-3">
                
            	 <form>
			<div class="row ml-1">
                <div class="form-group col-md-2" >
                    <label for="" class="col-sm-12 col-form-label">   Place of Posting  <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_role_id", array("" => "Select") + role_lists(), '', 'id="role_id_initial" data-id="c" onchange="processRegionInitialDiv();" class="form-control validate[required]"  '); ?>
                        <span class="error"><?php echo form_error('initial_role_id'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-2" id="region_div_initial" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label" id="initial_region_label">Regions<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_region_id", array("" => "Select") + region_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();" class="form-control validate[required]" ');    ?>
<!--                        <select  class="form-control validate[required] region_initial" name="region_id_initial" id="c_region_initial" data-id="c">
                            <option value="">Select</option>
                        </select> -->
                        
                        <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2" id="school_div_initial" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Schools<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_school_id", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="initialschcode()" '); ?>
                        <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2" id="section_div_initial" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label">Section<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_section_id", array("" => "Select") + section_lists(), '', 'class="form-control validate[required]"  id="c_section_initial" data-id="c" '); ?>
                        <span class="error"><?php echo form_error('initial_section_id'); ?></span>
                    </div>
                </div>
				 <?php /* <div class="form-group col-md-3" id="kvcode_div_initial" >
                    <label for="" class="col-sm-12 col-form-label">KV Code:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("initial_kvcode", isset($initialpost->initial_kvcode) ? set_value('initial_kvcode', $initialpost->initial_kvcode) : set_value('initial_kvcode'), 'readonly id="kvcode_initial" class=" validate[required] form-control" '); ?>
                        <span class="error"><?php echo form_error('initial_kvcode'); ?></span>
                    </div>
                </div>
               <div class="form-group col-md-3" id="shift_div_initial" style="display:none;"  >
                    <label for="" class="col-sm-12 col-form-label">Shift<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_shift", array("" => "Select Shift") + shift(), isset($initialpost->initial_shift) ? set_value('initial_shift', $initialpost->initial_shift) : set_value('initial_shift'), 'id="shift_initial" class="form-control"  '); ?>
                        <span class="error"><?php echo form_error('initial_shift'); ?></span> 
                    </div> */ ?>
					
				<div class="form-group col-md-2" id="" ">
                    <label for="" class="col-sm-12 col-form-label" id="">Designation<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("desiganition_id", array("" => "Select") + designation_lists(), '', 'id="desiganition_id" data-id="c"  class="form-control validate[required]" ');    ?>

                        
                        <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                    </div>
                </div>	
                            <div class="form-group col-md-2" id="desiganition_category_id_s" style="display:none;">
                    <label for="" class="col-sm-12 col-form-label" id=""><span>Category</span><span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("desiganition_category_id", array("" => "Select") + designation_category_lists(), '', 'id="desiganition_category_id" data-id="c"  class="form-control validate[required]" ');    ?>
                        <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                    </div>
                </div>

                <div class="form-group col-md-2" id="subject_id_s">
                    <label for="" class="col-sm-12 col-form-label" id="">Subject<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("subject_id", array("" => "Select") + subject_lists(), '', 'id="subject_id" data-id="c"  class="form-control validate[required]" ');    ?>
                        <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                    </div>
                </div>	
                 <div class="form-group col-md-2">
				     <label for="" class="col-sm-12 col-form-label">&nbsp;<span class="reqd"></span></label>
					<div class="col-sm-12">
                         <button type="button"  id="btn_filter" class="btn btn-primary float-right"><i class="fa fa-search"></i>&nbsp; SEARCH</button>
                    </div>
				</div>				
                </div>
				
		</form>		
				
            </div>    
            
                <?php   if($this->session->flashdata('success'))
                {
                    ?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>KV-CODE</th>
                            <th>UNIT</th>
                            <th>KV/REGION/ZIET</th>
                            <th>POST</th>
                            <th>CATEGORY</th>
                            <th>SUBJECT</th>
                            <th>SANCTIONED POST</th>
                            <th>IN-POSITION</th>
                            <th>VACANCY</th>
                            <th>CONTRACTUAL</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="clearfix"><hr></div>
            <div class="card-header" style="background-color: #17a2b8!important;">
            <div class="row">
            <div class="col-md-12"><i class="fa fa-handshake-o" aria-hidden="true"></i> CONSOLIDATED REPORT - CONTRACTUAL TEACHER, COACH  & OTHER POST / POSITIONS</div>
            </div>
            </div>
                <hr>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>PLACE</th>
                            <th>SECTION</th>
                            <th>REGION</th>
                            <th>KV/REGION/ZIET</th>
                            <th>CODE</th>
                            <th>TYPE</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT/POST</th>
                            <th>STRENGTH</th>
                            <th>ACTIVE</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
            </div>
                
            </div>
	</div>
    </div>


<?php echo $this->load->view("reports/js/vacancy/vacancy_js",'',true); ?> 
 <script>
$(document).ready(function () {
        var jsonData = '<?php echo $SD; ?>';

        $('#dataTableIdCon').dataTable({
            "oLanguage": {   "sSearch": "Search By Type / Designation" },
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "columnDefs": [{ className: 'text-center', targets: [4,5] }],
            "dom": 'lBfrtip',
            "buttons": [
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                            titleAttr: 'Export Data In Excel',
                            title: 'Contractual_Staff_Report',
                            exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9]}
                        }
                    ],
            "data":JSON.parse(jsonData),
            "columns": [
                            {"data": "PLC"},
                            {"data": "SEC"},
                            {"data": "REG"},
                            {"data": "KVD"},
                            {"data": "KVC"},
                            {"data": "TYP"},
                            {"data": "DES"},
                            {"data": "SUB"},
                            {"data": "TOT"},
                            {"data": "ACT"},
                        ]
            });
});
</script>       

