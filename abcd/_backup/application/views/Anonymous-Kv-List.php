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
                <!--=========================== KV FILTER START =================================-->
                <div class="form-group col-md-3 kv-list" style="display:block;">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Kendriya Vidyalaya:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("region_id", array("" => "Select") + masterregion_lists(), '', 'id="region_id" class="form-control validate[required]" onchange="LockedST(this.value)"');    ?>
                        <span class="error"><?php echo form_error('region_id'); ?></span>
                    </div>
                </div>
                <!--=========================== KV FILTER START =================================-->
                <div class="form-group col-md-2">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="btn_filter" class="btn btn-warning btn-block float-right" onclick="FilteredKV();"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
		</div>				
            </div>
            </form>		
	</div>    
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding-top: 0px!important; display:none;">
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>REGION</th>
                            <th>STATE</th>
                            <th>KV CODE</th>
                            <th>VIDYALAYA'S NAME</th>
                            <th>SHIFT</th>
                            <th>SECTOR</th>
                            <th>LOCATION</th>
                            <th>VIEW DETAILS</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
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
        FilteredKV();
    }
    function LockedST(RO_ID){
        if(RO_ID){
            $("#state_id").prop("disabled", true);
        }else{
            $("#state_id").prop("disabled", false);
        }
        FilteredKV();
    }
    function FilteredKV(){
        var RO = $("#region_id").val();
        var ST = $("#state_id").val();
        if(!RO && !ST){
            alert("Please Select State or Region First");
        }else{
            $.ajax({
                url: base_url + 'filtered-kv',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&ST_ID=' + ST,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData)
                    {
                        $('.card-body').css("display", "block");
                        $('#dataTableIdCon').dataTable({
                            "oLanguage": {   "sSearch": "Search : &nbsp;" },
                            //"lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                            "bLengthChange" : false, //thought this line could hide the LengthMenu
                            //"bInfo":false,
                            "columnDefs": [
                                { "className": 'text-center', targets: [0,1,2,4,5,6,7] },
                                { "width": "15%", "targets": 1 }
                            ],
                            "dom": 'lBfrtip',
                            "buttons": [
                                        {
                                            extend: 'excel',
                                            text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                                            titleAttr: 'Export Data In Excel',
                                            title: 'Contractual_Staff_Report',
                                            exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9]}
                                        }
                                    ],
                            "destroy": true,
                            "data":JSON.parse(jsonData),
                            "columns": [
                                            {"data": "REG"},
                                            {"data": "STA"},
                                            {"data": "KOD"},
                                            {"data": "NME"},
                                            {"data": "SFT"},
                                            {"data": "SEC"},
                                            {"data": "LOC"},
                                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    
                                        return '<a href="<?php echo site_url(); ?>kv-profile-details/' + row.COD + '" target="_blank" class="text-primary text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-eye"></i>&nbsp;&nbsp;View Details &nbsp;</a>';
                                    
                                }
                            },
                                        ]
                            });
                    }
                    else{
                        $('.card-body').css("display", "none");
                    }
                }
            });
        }
    }
</script>
</body>
</html>
