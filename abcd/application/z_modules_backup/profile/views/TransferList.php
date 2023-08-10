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
            <li class="breadcrumb-item active">Transferred Employee's</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-users"></i> Transferred Employee's Book Keeping</div>
                <?php   if($this->session->flashdata('success'))
                {
                    ?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
            <div><?php 
            //show($this->session->userdata);?></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color:#1a1a1a;">
                            <th>#</th>
                            <th>EMP_CODE</th>
                            <th>NAME</th>
                            <th>PRE. PLACE / DEPT.</th>
                            <th>PRE. DESIGN. / SUB.</th>
                            <th>TRA. PLACE / DEPT.</th>
                            <th>TRA. DESIGN. / SUB.</th>
                            <th>FROM/JOINING </th>
                            <th>TO/TRANSFER </th>
                            <th style="text-align: center;">VIEW</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("profile/js/profile/transfer_js",'',true); ?>     
        

