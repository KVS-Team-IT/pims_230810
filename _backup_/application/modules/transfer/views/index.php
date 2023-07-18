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
                <a href="<?php echo base_url();?>dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url();?>initiate-transfer">Transfer</a>  / Employee List
            </li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
            <div class="card-header">
            <form>
            <div class="row">
            <div class="form-group col-md-3">    
                <label for="" class="col-form-label text-white"><h5><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Regd. Employees List </h5></label>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="col-form-label text-white">Present Employment Status:</label>
                <?php echo form_dropdown("pre_emp_status", array("" => "Select") + emp_status(), '', 'id="pre_emp_status" class="form-control" ');    ?>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="col-form-label">&nbsp;</label>
                <button type="button" id="btn_filter" class="btn btn-primary btn-block float-left"><i class="fa fa-search"></i>&nbsp; SEARCH</button>
            </div>
                <div class="form-group col-md-3">
                    <label for="" class="col-form-label" id="">&nbsp;</label>
                    <a href="<?php echo base_url('initiate-transfer'); ?>" class="btn btn-warning btn-block float-right"><i class="fa fa-sync"></i>&nbsp; RESET</a>
                </div>
            </div>
            </form>
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php echo SN;?></th>
                            <th>EMP. NAME(CODE)</th>
                            <th>STATUS</th>
                            <th>REGION/UNIT</th>
                            <th>PLACE</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT</th>
                            <th>STATE</th>
                            <th>LPC</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
            </div>
	</div>
    </div>
</div>

<?php echo $this->load->view("transfer/js/transfer_js",'',true); ?>   
<script>
    //$(document).ready(function() {
     //   $('#example').DataTable();
        
    //});
    //function GenerateLPC(){
    //    alertify.error('Initiate Transfer to Generate LPC');
    //}
</script>

    

