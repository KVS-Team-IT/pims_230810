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
	  <li class="breadcrumb-item active">User Activity Log</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
	  <div class="card-header"><i class="fa fa-user"></i> User Activity Log List</div>
	  <div class="card-body">
		<div class="table-responsive">
		  <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
			<thead>
			  <tr>
			    <th><?php echo SN;?></th>
				<th>Username</th>
				<th>Email Id</th>
				<th>Role</th>
				<th>Last Access</th>
				<th>Last Login</th>
				<th>Created Date/Time</th>
				<th>Ip Address</th>
				<th>Activity Type</th>
				<th>Form Type</th>
				<th>Activity Data</th>
				<th>Status</th>
			  </tr>
			</thead>
		  </table>
		</div>
	  </div>
	</div>
  </div>
</div>

<?php echo $this->load->view("admin/js/users/activities_logs_js",'',true); ?>        

