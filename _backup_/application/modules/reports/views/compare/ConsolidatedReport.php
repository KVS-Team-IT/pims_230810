<?php //show($RO); ?>
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
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Consolidated Report</li>
	</ol>

	<div class="card mb-3">
           
            <div class="card-header">
            <div class="row">
                <div class="col-md-12 text-center"><i class="fas fa-tasks"></i>&nbsp; Consolidated Report of Sanctioned Post As Per Government & KVS Approval</div>
            </div>
        </div>
        <hr>
        <div class="card-header">
                <form>
            <div class="row col-md-12">
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Select Region :  </label>
                    <div class="col-sm-12">
                        <select class="form-control js-example-basic-single" name="RegId" id="RegId">
                        <option value="">Select Region</option>
                        <?php $I=0; foreach($RO as $R){
                        if($I==0){$Auto='selected="selected"';}else{$Auto=' ';}
                         ?>
                        <option value="<?php echo $R->id;?>" <?php echo $Auto;?>><?php echo $R->name; ?></option>;
                        
                        <?php $I++; } ?>
                        </select>
                    </div>
                </div>
                                
                    <div class="form-group col-md-3">
                        <label for="" class="col-sm-12 col-form-label">&nbsp;</label>
                        <button type="button" id="btn_filter" class="btn btn-warning btn-block float-left"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
                    
                    
            </div>
            </form>
        </div> 
        <div class="card-body">
                <div class="table-responsive">
                    <div id="btnTpVertical" class="btn btn-small btn-info" autocomplete="off" style="position: absolute; left: 27%; line-height: 13px; box-shadow: 0px 0px 2px var(--dark); z-index: 1000;"><i class="fas fa-list"></i>&nbsp;Transpose Table</div>
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL.NO.</th>
                            <th>VIDYALAYA NAME</th>
                            <th>CODE</th>
                            <th>REGION</th>
                            <th>SECTOR</th>
                            <th>BUILDING</th>
                            <th>INFRASTRUCTURE</th>
                            <th>CLASSES APPROVED BY GOVT.</th>
                            <th>SECTIONS APPROVED BY GOVT.</th>
                            <th>CLASSES APPROVED BY KVS</th>
                            <!--<th>SECTIONS APPROVED BY KVS.</th>-->
                            <th>GOVT. APPROVED TEACHING POST</th>
                            <th>GOVT. APPROVED NON-TEACHING POST</th>
                            <th>KVS APPROVED TEACHING</th>
                            <th>KVS APPROVED NONTEACHING</th>
                            <th>IN-POSITION TEACHING POST</th>
                            <th>IN-POSITION NONTEACHING POST</th>
                            <th>VACANCY TEACHING POST</th>
                            <th>VACANCY NON-TEACHING POST</th>
                            <th>UTILIZATION - UNDER(+), OVER(-), NEUTRAL(0)</th>
                            <th>CONTRACTUAL TEACHER</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                    
                </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("reports/js/reports/consolidated_js",'',true); ?>     
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>       

