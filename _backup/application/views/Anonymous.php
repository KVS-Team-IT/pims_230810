<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | KV PROFILE</title>
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
    vertical-align: middle;
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
        <div class="container-fluid" style="width:85%!important;">
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>PERSONNEL INFORMATION MANAGEMENT SYSTEM</h5>
			Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div>
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3">
        <div class="card-header text-center" style="margin: 15px 15px 0px 15px!important;padding-bottom: 0px !important;">
            <img class="rounded" src="<?php echo base_url(); ?>img/kvs-logo1bk.png" width="75" height="60">
            <br>
            <label style="margin-bottom: -2px!important; font-size:18px;font-weight:bold;font-family: none;letter-spacing: 5px;margin-left: 5px;color: #9E9E9E;text-shadow: 1px 0px 2px #a56a12;">PIMS</label>
            <hr style="margin-top: 0px!important;">
            <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; font-family: auto; letter-spacing: 1px;">Personnel Information Management System</label>
			<a href="https://pis.kvs.gov.in/Anonymous/exportAllData" target="_blank" style="display:none;color: #9E9E9E;"><label>Export All Data</label></a>
        </div>
        <hr>
        <div class="card-header" style="margin: 0px 15px 15px 15px!important;padding-bottom: 10px !important;">
            <form>
            <div class="row">
                <div class="form-group col-md-3" >
                    <label class="col-sm-12 col-form-label text-white">Select State : <span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("state_id", array("" => "Select") + state_lists(), '', 'id="state_id" class="form-control validate[required]" onchange="LockedRO(this.value);"');?>
                        <span class="error"><?php echo form_error('state_id'); ?></span> 
                    </div>
                </div>
                <div class="form-group col-md-1 text-center" style="margin-top: 30px; font-weight: 500;"> -  Or  - </div>
                <div class="form-group col-md-3">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Region:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("region_id", array("" => "Select") + masterregion_lists(), '', 'id="region_id" class="form-control validate[required]" onchange="LockedST(this.value)"');    ?>
                        <span class="error"><?php echo form_error('region_id'); ?></span>
                    </div>
                </div>
                <!--=========================== KVS FILTER START =================================-->
                <div class="form-group col-md-3 kv-list" style="display:none;">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Kendriya Vidyalaya:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <select id="KvList" name="KvList" class="form-control" style="width:235px!important;">
                            <option value="">Select </option>
                        </select>
                    </div>
                </div>
                <!--=========================== KVS FILTER END =================================-->
                <div class="form-group col-md-2">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="btn_filter" class="btn btn-warning btn-block float-right" onclick="ProfileKV();"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
		</div>				
            </div>
            </form>		
	</div>    
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding-top: 0px!important; display:none;">
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="" class="col-sm-12 col-form-label">KV NAME:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_NAME"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">KV CODE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_CODE"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">SHIFT:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_SHIFT"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">REGION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_REGION"></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">STATE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"></div>
                    </div>
                </div>
            </div>
            
            <div class="card-body" style="padding-top: 0px!important; display:none;">
            <hr style="margin-top:0px!important;"> 
            <div class="card-header text-center" style="margin: 0px 1px !important;padding-bottom: 0px !important;">
                <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; font-family: auto; letter-spacing: 1px;">STUDENT ENROLLMENT DETAILS CLASS WISE</label>
            </div>
            <div class="row">
                <div class="from-group col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CLASS</th>
                            <th>NO. OF SECTION(S)</th>
                            <th>SANCTIONED STRENGTH PER SECTION</th>
                            <th>TOTAL STUDENTS ENROLLED</th>
                            <th>SIZE OF CLASSROOM [ L X B ] in mtrs.</th>
                            <th>UPDATED ON</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                           
                    </tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td id="total_enrolled" style="text-align:center;"></td>
							<td></td>
							<td></td>
						</tr>
					</tfoot>
                    </table>
                </div>
                </div>
            </div>
            </div>
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
    function LockedRO(ST_ID){
        if(ST_ID){
            $("#region_id").prop("disabled", true);
        }else{
            $("#region_id").prop("disabled", false);
        }
        $('#KvList').find('option').not(':first').remove();
        FilteredKV();
    }
    function LockedST(RO_ID){
        if(RO_ID){
            $("#state_id").prop("disabled", true);
        }else{
            $("#state_id").prop("disabled", false);
        }
        $('#KvList').find('option').not(':first').remove();
        FilteredKV();
    }
    function FilteredKV(){
        var RO = $("#region_id").val();
        var ST = $("#state_id").val();
        if(!RO && !ST){
            alert("Please Select State or Region First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'filtered-kv',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&ST_ID=' + ST,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData){
                        $('#KvList').select2();
                        var options = $('#KvList');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.COD).text(this.NME));
                        });
                        $('.kv-list').css("display", "block");
                    }else{
                        $('.kv-list').css("display", "none");
                    }
                }
            });
        }
    }
    
    
    function ProfileKV(){
        var RO = $("#region_id").val();
        var ST = $("#state_id").val();
        var KV = $("#KvList").val(); 
        if(!RO && !ST){
            alert("Please Select State or Region First");
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
						$('#total_enrolled').html("<strong>Total Enrolled :</strong> "+JData.total_enrolled);
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
