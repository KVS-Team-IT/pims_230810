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
            <li class="breadcrumb-item active">Registered Support Staff</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-users"></i> Support Staff List</div>
                <?php   if($this->session->flashdata('success'))
                {
                    ?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
            <?php   if($this->session->flashdata('error'))
                {
                    ?>
                    <div class="alert alert-error">
                      <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
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
                        <tr>
                            <th>SNO#</th>

                            <th>TYPE</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT/DEPT.</th>
                            <th>REGION/UNIT</th>
                            <th>SCHOOL</th>
                            <th>STRENGTH</th>
                            <th style="text-align: center;">EDIT</th>
                            <th style="text-align: center;">TRASH</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr style="color:#1a1a1a;">
                            <th>SNO#</th>

                            <th>TYPE</th>
                            <th>DESIGNATION</th>
                            <th>SUBJECT/DEPT.</th>  
                            <th>REGION/UNIT</th>
                            <th>SCHOOL</th>
                            <th>STRENGTH</th>
                            <th style="text-align: center;">EDIT</th>
                            <th style="text-align: center;">TRASH</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
	</div>
    </div>
</div>
<?php echo $this->load->view("staff/js/staff_js",'',true); ?>     
<script>
    function DeleteSS(SsId) {
        var base_url = $('#url').val();
        var get_csrf_token_name = $('#get_csrf_token_name').val();
        var get_csrf_hash = $('#get_csrf_hash').val();
        alertify.confirm('Remove Post', 'Press Ok, if you want to remove post, but you cannot undo the action.', 
        function(){ 
             $.ajax({
                url: base_url + 'support-staff-delete',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&SsId=' + SsId,
                type: 'POST',
                success: function (resp) {
                    console.log(resp);
                    location.reload();
                }
            }); 
        }, 
        function(){ 
            alertify.error('Action Cancelled');
        });
    }
</script>
        

