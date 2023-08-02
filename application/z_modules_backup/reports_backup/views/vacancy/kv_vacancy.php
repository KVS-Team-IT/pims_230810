
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
        <!-- DataTables Example --> 
	<div class="card mb-3">
        <form>
	<div class="row col-md-12">
                <div class="form-group col-md-3">
                    <label for="" class="col-form-label">Place of Posting  <span class="reqd">*</span></label>
                        <?php  $name = role_lists($this->session->userdata['role_id']) ;
			echo form_dropdown("initial_role_id",role_lists($this->session->userdata['role_id']),isset($name[3])?$name:'', 'id="role_id_initial"  class="form-control validate[required]"  '); ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-form-label">Regions<span class="reqd">*</span></label>
                    <?php echo form_dropdown("initial_region_id",region_lists($this->session->userdata['region_id']), '', 'id="c_region_initial"  class="form-control validate[required]" ');    ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-form-label">Schools<span class="reqd">*</span></label>
                    <?php echo form_dropdown("initial_school_id", school_lists_name($this->session->userdata['school_id']), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" onchange="initialschcode()" '); ?>
                </div>
               <div class="form-group col-md-3" id="">
                    <label for="" class="col-form-label" id="">Designation<span class="reqd">*</span></label>
                    <?php echo form_dropdown("desiganition_id", array("" => "Select") + designation_lists($this->session->userdata['role_id']), '', 'id="desiganition_id" data-id="c"  class="form-control validate[required]" ');    ?>
                </div>
                <div class="form-group col-md-9"></div>
                <div class="form-group col-md-3">
                    <button type="button" id="btn_filter" class="btn btn-primary float-right"><i class="fa fa-search"></i>&nbsp; SEARCH</button>
                </div>
        </div>
        </form>
            <div class="card-header">
            <div class="row">
                <div class="col-md-12"><i class="fas fa-list-alt"></i> CONSOLIDATED REPORT - SANCTIONED POST / IN-POSITION / VACANCY / CONTRACTUAL POST</div>
			
               
            </div>
                
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
                <hr>
            </div>
            <div class="card-header" style="background-color: #17a2b8!important;">
                <div class="row">
                <div class="col-md-12"><i class="fa fa-handshake-o" aria-hidden="true"></i> CONSOLIDATED REPORT - CONTRACTUAL TEACHER, COACH  & OTHER POST / POSITIONS</div>
		</div>
            </div>
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
        

