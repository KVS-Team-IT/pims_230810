<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>ckeditor/samples/js/sample.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
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
</head>
<div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact & Suggestions Inbox</li>
				
            </ol>
            <div class="card mb-3">
                <div class="card-header"><i class="fa fa-envelope-open">&nbsp;&nbsp;INBOX</i></div>
                <div></div>
                <div class="card-body shape-shadow">
                    
                    <?php if (isset($error_msg) && !empty($error_msg)) { ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $error_msg; ?>.
                        </div>
                    <?php } if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>

                    
                    <div class="card-body">
                <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
                            <thead>   <tr>
                                <th>SNO</th>
                                <th>TYPE</th>
                                <th>SUBJECT</th>
                                <th>FROM / TO</th>
                                
                                <th>DATE</th>
                                <th>DETAILS</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $SNO=1;
                            $Uid=$this->user_id;
                            foreach($M as $e){
                            ?>
                            <tr>
                                <td><?php echo $SNO; ?></td>
                                <td><?php echo ($e->msg_type==1 && ($e->msg_send==$Uid))? '<div class="btn btn-warning btn-block">SENT</div>':'<div class="btn btn-success btn-block">RECEIVED</div>'; ?></td>
                                <td><?php echo $e->msg_sub; ?></td>
                                
                                <td><?php echo ($e->msg_type==1 && ($e->msg_send==$Uid))? $e->rcvr_name:$e->send_name; ?></td>
                                <td><?php echo $e->cr_date; ?></td>
                                <td><?php echo '<a href="'. base_url().'Reply-Message/'.$e->msg_id.'" class="btn btn-primary btn-block">Details</a>'; ?></td>
                            </tr>
                            <?php
                            $SNO++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
</div>
<script>
	initSample();
        $('.select2').select2({
            placeholder: 'Select Recipient',
            closeOnSelect: true
        });
        //========================================= Check Percentage =============================//
        function chkValidData(){
            $('#formID').submit();
        }
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>
</html>
