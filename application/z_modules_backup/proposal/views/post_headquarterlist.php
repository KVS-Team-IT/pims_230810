<style>
    .buttons-excel{
       background-color: green;
       color: white;
    }
    
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Post Proposal Report</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-book"></i> Post Proposal Report</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableId" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Region</th>
                                <th>School Name</th>
                                <th>School Code</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody >
                            
                        </tbody>
                    
                    </table>
                </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("proposal/js/posthqsection_js",'',true); ?>   



