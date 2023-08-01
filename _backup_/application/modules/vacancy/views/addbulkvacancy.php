<link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/modernizr.js"></script> <!-- Modernizr -->
<div class="container">
    <div class="card card-register mx-auto mt-5 mte8">
        <div class="card-header register-header">
            Add Bulk Vacancy
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
        <?php
       // show($Resp);
            if(!empty($Resp)){
                foreach($Resp as $R){
                    if($R['status']=='Failed'){
                        $Failed[]=$R['sno'];
                    }
                    if($R['status']=='Success'){
                        $Success[]=$R['sno'];
                    }
                }
                if(isset($Success)&& count($Success)>0){
                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> Data saved successfully.
                </div>
                <hr>
                <?php    
                }
                if(isset($Failed)&& count($Failed)>0){
                ?>
                <div class="alert alert-warning">
                     Alert! Following Serial No's are not saved. <strong><?php echo implode(", ", $Failed);?></strong>
                </div>
                <hr>
                <?php  
                }
            }
       ?>
<!-- ======================= Upload Vacancy Start ========================= -->
<?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
    <input type="hidden" name="id" value="<?php echo isset($roles->id) ? $roles->id : ''; ?>">
    <div class="card-body user_view">
        <div class="row">
            <div class="col-md-2">
                <label>Upload Excel:<span class="reqd">*</span>
                    <br>
                    <span style="font-size: 11px; color: #f36d1b; font-family: inherit;">Download Sample File </span>[ <a href="<?php echo base_url(); ?>Excel/Vacancy_Master_Sample.xlsx" download="download"><i class="fa fa-download" aria-hidden="true"></i></a> ]
                </label>
            </div>
            <div class="col-md-4">
                <input type="file" required="" name="VacancyFile" id="VacancyFile" onchange="return chkFile();" class="form-control" autocomplete="off">
                <small class="text-success">Only .xls/.xlsx file allowed</small><br>
                <span class="error" id="errMessage"></span>
            </div>
            <div class="col-md-4">
                <div class="btn btn-primary" onclick="return chkFile();">Upload File</div>
                <input type="reset" value="Cancel" class="btn btn-default">
            </div>
        </div>
    </div>            
<?php echo form_close(); ?>
</div>
</div>

<script>
    function chkFile(){
        var fileInput = document.getElementById('VacancyFile');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.xls|\.xlsx)$/i;
        if(!allowedExtensions.exec(filePath)){
            $('#errMessage').html('Please upload file having extensions .xls/.xlsx only.');
            fileInput.value = '';
            return false;
        }else{
            $('#formID').submit();
        }
    }
</script>

