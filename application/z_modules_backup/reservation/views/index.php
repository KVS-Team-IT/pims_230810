<?php //show($E); ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"> <!-- Resource style -->
<link href="<?php echo base_url(); ?>css/typehead.css" rel="stylesheet">
<script src="<?php echo base_url();?>js/modernizr.js"></script> <!-- Modernizr -->
<div id="content-wrapper">
    <div class="container-fluid">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Register</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-money" aria-hidden="true"></i>&nbsp; Register
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
        <?php echo form_open_multipart("reservation/register",array("id" =>"formID", "class" =>"register", "autocomplete" =>"off"));?>

        <h5>REGISTER</h5>
        <div class="background_div">
            <div class="row">
                <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Category <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("category", array("" => "Select Category") + designation_category_lists(), '', 'id="category" class="validate[required] form-control" onchange="getdesignation();" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('category'); ?></span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="" class="col-sm-12 col-form-label">Designation  <span class="reqd">*</span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("present_designation", array("" => "Select Designation") + designation_lists(), '', 'id="designation" class="validate[required] form-control" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('designation'); ?></span
                </div>
                </div>
            </div>
            <div class="form-group col-md-4" id="subjectdiv" style="display:none;">
                <label for="" class="col-sm-12 col-form-label">Subject  <span class="reqd"></span></label>
                <div class="col-sm-12">
                    <?php echo form_dropdown("present_subject", array("" => "Select Subject") + subject_lists(), '', 'id="subject" class=" form-control" autocomplete="off"');    ?>
                    <span class="error"><?php echo form_error('subject'); ?></span
                </div>
                </div>
            </div>
                <!-- <div class="form-group col-md-4">
                    <label for="" class="col-sm-12 col-form-label"> Designation:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("present_designation", '', 'placeholder=" Designation" id="present_post_designation"  class="form-control validate[required] typeahead" autocomplete="off" '); ?>
                        <input type="hidden" value="<?php echo $PrePost->present_designationid; ?>" name="present_designationid" id="present_post_id" autocomplete="off">
                        <span class="error"><?php echo form_error('present_designation'); ?></span>
                        <span class="col-sm-12 error" id="desg_valid"></span>
                    </div>
                    
                </div>

                <div class="form-group col-md-4" <?php if(empty($PrePost->present_subject)) echo 'style="display:none;"';  ?>  id="subject_div_present">
                    <label for="" class="col-sm-12 col-form-label"> Subject    <span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("present_subject", array("" => "Select") + subject_lists(), '', 'id="subject_id_present" data-id="c" class="form-control validate[required]" autocomplete="off" '); ?>
                        <span class="error"><?php echo form_error('present_subject_id'); ?></span> 
                    </div>
                </div> -->
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Method Of Recruitment <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("method_recruitment", array("" => "Select") + direct_recruitment(), '', 'class="form-control validate[required]" id="method_recruitment" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('method_recruitment'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Percentage of Reservation prescribed for SC <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("sc", '', 'class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('method_recruitment'); ?></span> 
                    </div>
                </div>

                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Percentage of Reservation prescribed for ST <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("st", '', 'class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('method_recruitment'); ?></span> 
                    </div>
                </div>

                <div class="form-group col-md-4" >
                    <label for="" class="col-sm-12 col-form-label">Percentage of Reservation prescribed for OBC <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_input("obc", '', 'class="numericOnly validate[required] form-control" autocomplete="off"'); ?>
                        <span class="error"><?php echo form_error('method_recruitment'); ?></span> 
                    </div>
                </div>

            </div>
            
        </div>
<!--================================ PRESENT SERVICE DETAILS END =================================-->
        <div class="col-sm-12">
            <div  style="float:right;"> 
                <!-- <input class="btn btn-primary" type="reset" value="Reset"> -->
                <?php  echo form_submit('register', 'Reservation Register', 'class="btn btn-primary"');?>
                <?php  echo form_submit('roaster', 'Reservation Roaster Register', 'class="btn btn-primary"');?>
            </div>
        </div>

        <div class="text-right rg-footer"></div>
        <?php echo form_close(); ?>
    </div>
        </div>  
    </div>
</div>

<script>
    $(document).ready(function () {
       // $('#perSaveBtn').attr("disabled", false);
    });
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    var sample_data = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '<?php echo base_url(); ?>autocomplete/fetch',
        remote: {
            url: '<?php echo base_url(); ?>autocomplete/fetch/%QUERY',
            wildcard: '%QUERY'
        }
    });
    
    $('#present_post_designation').typeahead(null, {
        name: 'sample_data',
        display: 'name',
        source: sample_data,
        limit: 10,
        templates: {
            suggestion: Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
        }
    });
    $('#present_post_designation').on('typeahead:selected', function (evt, item) {
        var present_post_designation = $("#present_post_designation").val();
        if (present_post_designation != '') {
            processPresentDesignationAjaxCall(present_post_designation);
        }
    });
    $("#present_post_designation").blur(function () {
        var present_post_designation = $("#present_post_designation").val();
        if (present_post_designation != '') {
            processPresentDesignationAjaxCall(present_post_designation);
        }
    });
    function processPresentDesignationAjaxCall(present_post_designation) {
        $.ajax({
            url: base_url + 'autocomplete/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&designation=' + present_post_designation,
            type: 'POST',
            success: function (response) {
                    if(response != false) {
                        $.each(response, function (key, value) {
                            $("#present_post_designation").val(value);
                            $("#present_post_id").val(key);
                            if (key == '5' || key == '6' || key == '7' || key == '8') {
                                $("#subject_div_present").css("display", "block");
                            }else {
                                $("#subject_div_present").css("display", "none");
                            }
                        });
                    }else {
                    $("#present_post_designation").val('');
                        alert('Designation is not exist. Please select correct designation.');
                    $("#subject_div_present").css("display", "none");
                }
            }
        });
    }
    
    
</script>

<script type="text/javascript">

    function getdesignation()
    {
        $('#subject').val('');
        var catid = $('#category').val(); 
        $.ajax({
            url: base_url + 'section/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&c_id=' + catid,
            type: 'POST',
            success : function (response) {
                if(catid==1)
                {
                    $('#subjectdiv').show(); 
                }else{
                    $('#subjectdiv').hide();
                    $('#subject').val(0)
                }
                
                $('#designation').html(response);  
            }

       })
    }

    function register()
    {
        var desid = $('#present_post_id').val();
        var subid = $('#subject_id_present').val();
        var rid = $('#method_recruitment').val(); 
        $.ajax({
            url: base_url + 'reservation/get_query',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&d_id=' + desid + '&s_id=' + subid + '&mor=' +rid,
            type: 'POST',    
            success : function(response)
            {
                //alert(response);
                
            }
        })
    }
    
</script>
