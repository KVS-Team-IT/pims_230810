<?php  //show($this->session->all_userdata()); ?>
<style>
    .buttons-excel{
       background-color: green;
       color: white;
       display:none;
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
}

</style>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Observed Data</li>
	</ol>
	<div class="card mb-3">
        <div class="card-header"><i class="fa fa-users"></i>&nbsp; Teacher's Observation Data</div>
        <hr>
        <div class="card-header">    
            <?php echo form_open("", array("autocomplete" => "off" )); ?>
            <div class="row">
                    
                <div class="form-group col-md-3" id="region_div_initial">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Regions<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_region_id", array("" => "Select") + masterregion_lists(), '', 'id="c_region_initial" data-id="c" onchange="processSchoolInitialDiv();"  class="form-control validate[required]" ');    ?>
                        <span class="error"><?php echo form_error('initial_region_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-3" id="school_div_initial" style="display:none;">
                    <label  class="col-sm-12 col-form-label text-white">Schools<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("initial_school_id", array("" => "Select") + school_lists(), '', 'class="form-control validate[required]"  id="c_school_initial" data-id="c" '); ?>
                        <span class="error"><?php echo form_error('initial_school_id'); ?></span>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label  class="col-sm-12 col-form-label text-white">&nbsp;</label>
                    <div class="form-check">
                        <input class="form-check-input form-check-inline" type="checkbox" name="FilterChk" id="FilterChk" checked>
                        <label class="col-form-label text-white" for="FilterChk" style=" font-size: 16px!important; padding-top: 0px!important;">                          
                            &nbsp;Filter Applied.
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-sm-12 col-form-label">&nbsp;</label>
                    <div class="col-sm-12">
                    <button type="button" id="btn_filter" class="btn btn-warning btn-block float-left"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
                
	</div>
	
	<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>REGION</th>
                            <th>KV NAME</th>
                            <th>EMP. NAME</th>
                            <th>EMP. CODE</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT</th>
                            <th>OBSERVER</th>
                            <th>POST</th>
                            <th>GRADE</th>
                            <th>SUBMISSION DATE</th>
                            <th>EDIT</th>
                            <!-- <th>DELETE</th> -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                    
                    </table>
                </div>
            <div class="row">
                <div class="col-sm-12">
                    <button  onclick="DownObsData();" class="btn btn-success float-right">
                    <i class="fa fa-download" aria-hidden="true"></i>&nbsp;DOWNLOAD EXCEL
                    </button>
                </div>
            </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("webtools/js/tools",'',true); ?>     
        

