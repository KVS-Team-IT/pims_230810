<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | Entry Level Assessment abilities</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo base_url(); ?>vendor/datatable/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>js/encrypt.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
    <style>
        @font-face {
		font-family: 'text-security-disc';
		src: url('fonts/text-security-disc.eot');
		src: url('fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
		url('fonts/text-security-disc.woff') format('woff'),
		url('fonts/text-security-disc.ttf') format('truetype'),
		url('images/text-security-disc.svg#text-security') format('svg');
	}
	input.password {
		font-family: 'text-security-disc';
	}
        .splash {
            position: absolute;
            margin: 0px auto;
            z-index: 2000;
            background: white;
            color: gray;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .splash-title{
            text-align: center;
            vertical-align: middle;
            margin-top: 15%;
        }
    </style>
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
    text-align: center;
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
vertical-align: middle;}
.col-form-label{font-family: 'Roboto', sans-serif;}
</style>
</head>

<body class="">
    <!--[if lt IE 7]>
    <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <input type="hidden" id="url" value="<?php echo base_url();?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash'=>$this->security->get_csrf_hash()));?>
    <div id="content-wrapper">
        <div class="container-fluid">
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add MiddleTerm Abilities</li>
	</ol>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Entry Level Assessment abilities</h5>
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div>
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3">
     
           
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding: 0px!important;"> 
                <div class="row">
				<?php // print_r($details); ?>
                    <div class="form-group col-md-4">
                        <label for="" class="col-sm-12 col-form-label">KV NAME:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_NAME"><?php echo $details->name_of_kv; ?></div>
                    </div>
					 <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">REGION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_REGION"><?php echo $details->region_name; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">School Email:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo ($details->email)?$details->email: '---'; ?></div>
                    </div>
					
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">NAME:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_CODE"><?php echo $details->stu_name; ?></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">GENDER:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_SHIFT"><?php echo $details->gender; ?></div>
                    </div>
					
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">CATEGORY:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->category; ?></div>
                    </div>
					
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">ADMISSION NO:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->adminssion_no; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">PARENT MOBILE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->parent_mobile_no; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">PARENT EMAIL:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->parent_email_id; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">FATHER'S QUALIFICATION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->father_qualification; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">MOTHER'S QUALIFICATION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->mother_qualification; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">MOTHER TONGUE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->mother_tongu; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Admission Priority:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->admission_priority; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Whether admitted under RTE quota?:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_rte_quota; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Whether admitted under special dispensation quota?:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_dispensation_quota; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Whether the child is differently abled? :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_differently_abled; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">If the child is differently abled, please choose the type:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->if_differently_abled; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">No. of years of pre-schooling exposure to the child. If no pre-schooling exposure, choose NIL. :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->years_of_pre-schooling; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Number of Siblings :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->number_of_sibling; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Whether the sibling(s) is/are studying in the same KV? : :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_sibling_studying_same; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Classes in which siblings are studying :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->sibling_class; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Type of Gadgets available :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->type_of_gadgets; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Number of Gadgets available  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->no_of_gadgets; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Gadget availability - Time :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->gadget_availability_time; ?></div>
                    </div> 
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Whether the parents have any specific competence which can be utilized by the KV?:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_parent_competence; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">If the parents have any specific competence which can be utilized by the KV and willing to extend support to KV, choose the relevant item :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->if_parent_competence; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">If vocation related competence of parents(s.no.5) is chosen above, Please specify the area of competence :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->parent_competence_area; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">If the child has any exceptional quality/talent/capacity, please describe  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->if_quality_talent_capacity; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Oral Language Ability in English   :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->oral_language_eng; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Writing Ability in English  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->write_language_eng; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Reading Ability in English  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->read_language_eng; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Numeracy Skills  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->is_numeracy_skills; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">मौखिक भाषा क्षमता ( हिंदी)  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->oral_language_hindi; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">लेखन क्षमता (हिंदी)   :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->write_language_hindi; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">पठन क्षमता (हिंदी) :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->read_language_hindi; ?></div>
                    </div>


                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Oral Language Ability in English(Mid Term)   :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->oral_language_eng_mid_term; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Writing Ability in English(Mid Term)  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->write_language_eng_mid_term; ?></div>
                    </div><div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">Reading Ability in English(Mid Term)  :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->read_language_eng_mid_term; ?></div>
                    </div> 
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">मौखिक भाषा क्षमता ( हिंदी) (Mid Term) :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->oral_language_hindi_mid_term; ?></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">लेखन क्षमता (हिंदी)(Mid Term)   :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->write_language_hindi_mid_term; ?></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">पठन क्षमता (हिंदी)(Mid Term) :<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->read_language_hindi_mid_term; ?></div>
                    </div>
                </div>
            </div>
            
            <?php //print_r($this->session->userdata()); ?> 
        </div> 
    </div>
    </div>
<!-- ======================================== JS START ================================== -->
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
	});
            }, 4000);
        $(window).bind("load", function () {
            // Remove splash screen after load
            $('.splash').css('display', 'none');
        });
</script>
<script>
     
    function LockedST(RO_ID){
        if(RO_ID){
            $("#state_id").prop("disabled", true);
        }else{
            $("#state_id").prop("disabled", false);
        }
        $('#KvList').find('option').not(':first').remove();
        FilteredKV();
    }
	function GETSTU(KV_ID){
        $('#KvStu').find('option').not(':first').remove();
        FilteredKVSTU();
    }
	
    function FilteredKV(){
        var RO = $("#region_id").val(); 
        if(!RO && !ST){
            alert("Please Select State or Region First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'assesment_filtered-kv',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData){
                        $('#KvList').select2();
                        var options = $('#KvList');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.NME).text(this.NME));
                        });
                      //  $('.kv-list').css("display", "block");
                    }else{
                       // $('.kv-list').css("display", "none");
                    }
                }
            });
        }
    }
    
	function FilteredKVSTU(){
        var KvStu = $("#KvStu").val(); 
		var RO = $("#region_id").val(); 
        if(!RO){
            alert("Please Select Student First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'filtered-kvstu',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&KV_ID=' + KvStu,
                type: 'POST',
                success: function (jsonData) { 
                    if(jsonData){
                        $('#KvStu').select2();
                        var options = $('#KvStu');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.NME).text(this.NME));
                        });
                       // $('.kv-student').css("display", "block");
                    }else{
                        //$('.kv-student').css("display", "none");
                    }
                }
            });
        }
    }
    
    
    function ProfileKV(){
        var RO = $("#region_id").val();
        //var KV = $("#KvList").val(); 
        if(!RO && !ST){
            alert("Please Select Region First");
            return false;
        }else if($('#KvList').val() == ''){
            alert('Select Vidyalaya');
            return false;
        }else{
            //console.log('Coming');
            //console.log(KV);
            $.ajax({
                url: base_url + 'kv-profile-details',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&ST_ID=' + ST+ '&KV_ID=' + KV,
                type: 'POST',
                success: function (jsonData) {
                    if(jsonData.length>0){
                        JData = JSON.parse(jsonData);
                        K = JData.KV;
                        C = JData.CLS;
                        $('.KV_NAME').html(K.NME);
                        $('.KV_CODE').html(K.KOD);
                        $('.KV_SHIFT').html(K.SFT);
                        $('.KV_REGION').html(K.REG);
                        $('.KV_STATE').html(K.STA);
                       
                        $('#tbody').html("");
                        if(C.length>0){
                        $.each(C, function (index, item) {
                            var eachrow = "<tr>"
                                        + "<td class='cls'>" + item['CLS'] + "</td>"
                                        + "<td class='text-center'>" + item['SEC'] + "</td>"
                                        + "<td class='text-center'>" + item['AVL'] + "</td>"
                                        + "<td class='text-center'>" + item['PRE'] + "</td>"
                                        + "<td class='text-center'>" + item['LEN'] +'  <b>X</b>  '+item['WTH']+"</td>"
                                        + "<td class='text-center'>" + item['UPD'] + "</td>"
                                        + "</tr>";
                            $('#tbody').append(eachrow);
                        });
                        }else{
                            var norow = "<tr><td colspan='6' class='text-center text-danger'>Sorry! No Data Available</td></tr>";
                            $('#tbody').append(norow);
                        }
                   $('.card-body').css("display", "block"); 
                   }else{
                   $('.card-body').css("display", "none"); 
                   }
                }
            });
        }
    }
</script>
</body>
</html>
