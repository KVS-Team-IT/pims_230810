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
   <link href="<?php echo base_url(); ?>vendor/datatable/jquery.dataTables.min.css" rel="stylesheet"/> 
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
}
.btn-primary.disabled, .btn-primary:disabled {
    color: #000000;
    background-color: #aaa;
    border-color: #aaa;
}
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
            <h5>Entry Level Assessment abilities in respect of the students</h5>
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
            <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; font-family: auto; letter-spacing: 1px;">Entry Level Assessment abilities</label>
        </div>
        <hr>
        <div class="card-header" style="margin: 0px 15px 15px 15px!important;padding-bottom: 10px !important;">
            <form>
            <div class="row">  
                <div class="form-group col-md-3">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Region:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php echo form_dropdown("region_id", array("" => "Select") + masterregion_lists(), '', 'id="region_id" class="form-control validate[required]" onchange="LockedST(this.value)"');    ?>
                        <span class="error"><?php echo form_error('region_id'); ?></span>
                    </div>
                </div>
                <!--=========================== KVS FILTER START =================================-->
                <div class="form-group col-md-3 kv-list">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Kendriya Vidyalaya:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <!--select id="KvList" name="KvList" class="form-control" style="width:235px!important;" onchange="GETSTU(this.value)"-->
                        <select id="KvList" name="KvList" class="form-control" style="width:235px!important;">
                            <option value="">Select </option>
                        </select>
                    </div>
                </div>
				 <!--div class="form-group col-md-3 kv-student">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Student:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <select id="KvStu" name="KvStu" class="form-control" style="width:235px!important;">
                            <option value="">Select </option>
                        </select>
                    </div>
                </div-->
                <!--=========================== KVS FILTER END =================================-->
                <div class="form-group col-md-2">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="btn_filter" class="btn btn-warning btn-block float-right"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
		</div>				
            </div>
            </form>		
	</div>    
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding-top: 0px!important; display:block;padding-bottom: 0;">
                <hr>
                <div class="container row">
	<div class="row col-md-3"> <label for=""> Find Duplicate Records On  </label> </div>	
	<div class="row col-md-7"> <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Choose Column:<span class="reqd"></span></label>
                        <div class="col-sm-6">  
						<select id="Groupby" name="groupby" class="form-control" style="width:235px!important;" multiple>
                            <option value="">Select </option>
							<option value="name">Name </option>
							<option value="category">Category </option>
							<option value="parent_mobile_no">Parent Mobile </option>
							<option value="parent_email_id">Parent Email </option>
							<option value="mother_tongu">Mother tongue </option>
                        </select>
						
                    </div>    
                    <div class="form-group col-md-3">
                          <button type="button"  id="btn_filterDp" class="btn btn-warning btn-block float-right"><i class="fa fa-filter"></i>&nbsp; FIND</button>
                   
                    </div>  
                </div></div>
	       	<div class="row col-md-2" style="right: 0;display: inline;">
			      
			 <a href="<?php echo base_url() . 'assessment/add_new' ?>" class="btn btn-primary btn-block float-right" style="float:right;line-height: 5px;"><i class="fa fa-plus-circle"></i>&nbsp;Add New</a>
           	   	 </div>	 
                    
            </div>
              </div>
            <div class="card-body">
           	<?php 
			 if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
            <div class="row">
                <div class="from-group col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SR.No.</th> 
							<th>Admission No.</th>
							<th>KV Name</th>
                            <th>Name</th>
							<th>Gender</th>
							<th>Category</th> 
                            <th>Parent Mobile</th>
                            <th>Parent Email</th>
							<th>MidTerm</th>
							<th>YearEnd</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
						
                    </tbody>
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
	
	 $(document).ready(function () { 
		//  var option_all = $("#Groupby option:selected").map(function () {
			return $(this).val();
				}).get().join(',');  
				
        var oTable = $('#dataTableIdCon').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "ajax": {
                "url": "<?php echo site_url('kv-student-details'); ?>",
                'dataType': 'json',
                'type': 'POST',
                'error': function(jqXHR, thrownError) { 
                    //alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                'statusCode': {
                    200: function() { 
                      //console.log('OK 200') 
                    },
                    204: function() {
                      //console.log('Empty 204') 
                      $('#dataTableIdCon tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty">Empty Result Set</td></tr>')
                    },
                    400: function() {
                      //console.log('Bad Request 400');
                      $('#dataTableIdCon tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty text-danger">Bad request</td></tr>')
                    },
                    500: function() {
                      //console.log('Internal server error 500');
                      $('#dataTableIdCon tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty text-danger">Internal server error</td></tr>')
                    }
                  },
                "data": function (data) {

                    data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
                    data.KV_ID = $("#KvList").val();
                    data.column =$("#Groupby option:selected").map(function () {
			return $(this).val();
				}).get().join(',');  

                }

            },

            "columns": [
                {
                    "orderable": false,
                    "render": function (data, type, row) {
                        return  row.serial_no;
                    }
                },

                {"data": "adminssion_no"},
                {"data": "name_of_kv"},
                {"data": "name"},
                {"data": "gender"},
                {"data": "category"},
                {"data": "parent_mobile_no"},
                {"data": "parent_email_id"},               
				{
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<div class="col-md-4 p-0">'+                           
						'<a href="<?php echo site_url('assessment/middle/'); ?>'+ row.id + '" data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Update</a>'+                           
                      '</div>';
                    }
                },
				{
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<div class="col-md-4 p-0">'+                           
						'<button data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</button>'+                           
                      '</div>';
                    }
                },	

                {
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                           
				'<a href="<?php echo site_url(); ?>admin/master/categorydetails/' + row.id + '" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" category_id="'+row.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                           
                                '</div>';
                    }
                },
					
            ],
        });
		
        $('#btn_filter').click(function(){ 
			oTable.api().ajax.reload(); 
		});
		 $('#btn_filterDp').click(function(){ 
			oTable.api().ajax.reload(); 
		});
		
		
        $('#dataTableIdCon').on('click', 'a.delete_data', function (e) {
           var row_id = $(this).attr("category_id");   
           if(confirm('Are you sure to delete this Record')) {  
                $.ajax({  
                     url:"<?php echo base_url('delete_duplicate'); ?>",  
                     method:"POST",  
                     data:{row_id:row_id,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                     success:function(data) {						
					  alert("Record Deleted Successfully.");
				      oTable.api().ajax.reload();
					  return true;
                     }  
                });  
           }  
           else {  
                return false;       
           }  
      	});  
	$(document).ready(function() {
        $("#Groupby").select2({
                multiple: true,
            });
			  });
   /* 
	function GETSTU(KV_ID){
        $('#KvStu').find('option').not(':first').remove();
        FilteredKVSTU();
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
    
    
    function KVStudentList(){
        var RO = $("#region_id").val();
         var KV = $("#KvList").val(); 
        if(!RO){
            alert("Please Select Region First");
            return false;
        }else if($('#KvList').val() == ''){
            alert('Select Vidyalaya');
            return false;
        }else{ 
            //console.log(KV);
            $.ajax({
                url: base_url + 'kv-student-details',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&KV_ID=' + KV,
                type: 'POST',
                success: function (jsonData) {
                    if(jsonData.length>0){
                        JData = JSON.parse(jsonData);
						C = JData.CLS; 
                        $('#tbody').html("");
                        if(C.length>0){
							$i=1;
                        $.each(C, function (index, item) {
                            var eachrow = "<tr>"
                                        + "<td class='cls'>" + $i + "</td>"
                                        + "<td class='text-center'>" + item['adminssion_no'] + "</td>"
                                        + "<td class='text-center'>" + item['name_of_kv'] + "</td>"
                                        + "<td class='text-center'>" + item['name'] + "</td>"
                                        + "<td class='text-center'>" + item['gender'] + "</td>"
                                        + "<td class='text-center'>" + item['category'] + "</td>"
                                        + "<td class='text-center'>" + item['parent_mobile_no'] + "</td>"
                                        + "<td class='text-center'>" + item['parent_email_id'] + "</td>"
                                        + "<td class='text-center'><a href='#'>View</a> | <a href='#' class='text-danger'>Delete</a></td>"
                                        + "</tr>";
                            $('#tbody').append(eachrow);
							$i++;
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
	
	function FindDuplicates(){
        var RO = $("#region_id").val();
         var KV = $("#KvList").val(); 
		  var option_all = $("#Groupby option:selected").map(function () {
			return $(this).val();
				}).get().join(',');  
	
        if(!RO){
            alert("Please Select Region First");
            return false;
        }else if($('#KvList').val() == ''){
            alert('Select Vidyalaya');
            return false;
        }else{ 
            //console.log(KV);
            $.ajax({
                url: base_url + 'kv-dup-details',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&KV_ID=' + KV + '&column=' + option_all,
                type: 'POST',
                success: function (jsonData) {
                    if(jsonData.length>0){
                        JData = JSON.parse(jsonData);
						C = JData.CLS; 
                        $('#tbody').html("");
                        if(C.length>0){
							$i=1;
                        $.each(C, function (index, item) {
                            var eachrow = "<tr>"
                                        + "<td class='cls'>" + $i + "</td>"
                                        + "<td class='text-center'>" + item['adminssion_no'] + "</td>"
                                        + "<td class='text-center'>" + item['name_of_kv'] + "</td>"
                                        + "<td class='text-center'>" + item['name'] + "</td>"
                                        + "<td class='text-center'>" + item['gender'] + "</td>"
                                        + "<td class='text-center'>" + item['category'] + "</td>"
                                        + "<td class='text-center'>" + item['parent_mobile_no'] + "</td>"
                                        + "<td class='text-center'>" + item['parent_email_id'] + "</td>"
                                        + "<td class='text-center'>Delete</td>"
                                        + "</tr>";
                            $('#tbody').append(eachrow);
							$i++;
                        });
                        }else{
                            var norow = "<tr><td colspan='9' class='text-center text-danger'>Sorry! No Data Available</td></tr>";
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
	
	//$('#Groupby').multiSelect('select', 'value');
	$(document).ready(function() {
        $("#Groupby").select2({
                multiple: true,
            });
           // $('#Groupby').select2('val', selectedValuesTest);
    */
</script>
</body>
</html>
