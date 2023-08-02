<?php //show($this->session->userdata());
//show($KV); ?>
<style>
    .table thead th {
        background:#014a69!important;
        color:#ffffff!important;
    }
</style>
    <div id="content-wrapper">
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#">School / Section / Staff</a>
                </li>
            </ol>
    <div class="card mb-3">
        <div class="card-header register-header">
            <div class="col-md-12 text-center btn btn-block text-white" style=" line-height:15px; font-size: 18px;">
                <?php echo strtoupper($KV->school_name); ?>
            </div>
        </div>
        
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
        <!-- ===================================== Form Starts From Here ====================================== -->    
        <?php echo form_open_multipart("",array("id" =>"formID", "class" =>"staff", "autocomplete" =>"off"));?>

        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($EmpCode) ? $EmpCode : ''; ?>">
        <h6><strong>Consolidated Class / Section / Post Report - </strong></h6>
        <hr>
<!--================================ PRESENT SERVICE DETAILS STARTS =================================-->

        <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
            <div class="row">
                <div class="form-group col-md-12">
                    <table width="100%" class="table table-of-contents">
                    <thead>
                        <tr><th width="50%">Description</th><th width="1%"></th><th width="49%">Details / Allotted / Approved</th></tr>
                    </thead>
                    <tbody>
                    <tr><td>Region / Sector</td><th>:</th><td><?php echo $KD->REGION; ?> / <?php echo $KD->SECTOR; ?> </td></tr>
                    <tr><td>Building Type</td><th>:</th><td><?php echo $KD->BUILDING; ?></td></tr>
                    <tr><td>Infrastructure Facilities Available</td><th>:</th><td><?php echo $KD->INFRASTRUCTURE; ?></td></tr> 
                        
                    <tr><td>Upto Class</td><th>:</th><td><?php echo ($KD->UPTO_CLASS=='I')?$KD->UPTO_CLASS:'I - '.$KD->UPTO_CLASS; ?></td></tr>
                    <tr><td>No of Section's as per CCEA approval</td><th>:</th><td><?php echo $KD->SECTION; ?></td></tr>
                    <tr><td>Classes Approved By CCEA</td><th>:</th><td><?php echo ($KD->CCEA_CLASS=='I')?$KD->CCEA_CLASS:'I - '.$KD->CCEA_CLASS; ?>   </td></tr>
                    <thead>
                        <tr>
                            <th colspan="3">Approved Sanction Post Against Staff In-Position & Vacancies</th>
                        </tr>
                    </thead>
                    
                    <tr><td style="color:green;">No of Teaching post as per CCEA approval</td><th>:</th><td><?php echo $KD->CCEA_TECH; ?></td></tr>
                    <tr><td style="color:green;">No of Non-Teaching post as per CCEA approval</td><th>:</th><td><?php echo $KD->CCEA_NONTECH; ?></td></tr>
                    <tr><td style="color:green;">No of post as per CCEA approval</td><th>:</th><td><?php echo $KD->CCEA_TECH+$KD->CCEA_NONTECH; ?></td></tr>
                    <tr><td colspan="3"><hr></td></tr>
                    <tr><td class="text-warning">No of Teaching post as per KVS approval</td><th>:</th><td><?php echo $KV->TECH; ?></td></tr>
                    <tr><td class="text-warning">No of Non-Teaching post as per KVS approval</td><th>:</th><td><?php echo $KV->NONTECH; ?></td></tr>
                    <tr><td class="text-warning">No of post as per KVS approval</td><th>:</th><td><?php echo $KV->TECH+$KV->NONTECH; ?></td></tr>
                    <tr><td colspan="3"><hr></td></tr>
                    <tr><td>Actual Teaching post in-position </td><th>:</th><td><?php echo $KV->IN_TECH; ?></td></tr>
                    <tr><td>Actual Non-Teaching post in-position </td><th>:</th><td><?php echo $KV->IN_NONTECH; ?></td></tr>
                    <tr><td>Actual post in-position </td><th>:</th><td><?php echo $KV->IN_TECH+$KV->IN_NONTECH; ?></td></tr>
                    <tr><td colspan="3"><hr></td></tr>
                    <tr><td>Total available vacant post</td><th>:</th><td><?php echo ($KV->TECH+$KV->NONTECH)-($KV->IN_TECH+$KV->IN_NONTECH); ?></td></tr>
                    <tr><td>Contractual Teacher in-position </td><th>:</th><td><?php echo $KV->TECH_CON ?></td></tr>
					<?php 
						if(($KD->CCEA_TECH+$KD->CCEA_NONTECH)>($KV->TECH+$KV->NONTECH)){
					?>
						<tr><td style="color:green;">CCEA Approval Post Under Utilization</td><th>:</th><td><?php echo ($KD->CCEA_TECH+$KD->CCEA_NONTECH)-($KV->TECH+$KV->NONTECH); ?></td></tr>
					<?php
						}else{
					?>
						<tr><td style="color:red;">CCEA Approval Post Over Utilization</td><th>:</th><td><?php echo ($KD->CCEA_TECH+$KD->CCEA_NONTECH)-($KV->TECH+$KV->NONTECH); ?></td></tr>
					<?php } ?>
                    </tbody>
                </table>
                    <hr>
                </div>
            </div>
        <?php echo form_close(); ?>
        <div class="text-right rg-footer"></div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
       // $('#perSaveBtn').attr("disabled", false);
    });
</script>
