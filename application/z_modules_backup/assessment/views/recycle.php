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
vertical-align: middle;}
.col-form-label {
    color: #014a69 !important;
}
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Recycle Bin</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
	 
            <div class="card-header"><i class="fa fa-users"></i> Deleted Student's List</div>
                <?php   if($this->session->flashdata('success'))
                {
                    ?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
            <div><?php 
            //show($this->session->userdata);?></div>
			
			<div class="row">  
                <?php if($this->session->userdata('role_id')=='1'){ ?>
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
                        <select id="KvList" name="KvList" class="form-control" style="width:235px!important;">
                            <option value="">Select KV </option>
                        </select>
                    </div>
                </div> 

            <?php  }  ?>
                <!--=========================== KVS FILTER END =================================-->
                <div class="form-group col-md-3 kv-list">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Class:<span class="reqd">*</span></label>
                    <div class="col-sm-12"> 
                        <select id="class" name="class" class="form-control" style="width:235px!important;"> 
                            <option value="1">Class 1st</option>
                            <option value="2">Class 2nd</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group col-md-2">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="btn_filter" class="btn btn-warning btn-block float-right"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
		          </div>				
            </div>
            <div class="card-body">
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
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
						
                    </tbody>
                    </table>
                    </table>
                </div>
            </div>
	</div>
    </div>
</div> 
        
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
                            options.append($("<option />").val(this.KVID).text(this.NME));
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
            "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
			'columnDefs': [{ className: 'text-center', targets: [4,5] }],
            "dom": 'lBfrtip',
			 "buttons": [
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'EXCEL',
                    title: 'Deleted Student List',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3,4,5,6,7]
                    }
                    
                },
        ],
            "ajax": {
                "url": "<?php echo site_url('deleted-data-list'); ?>",
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
					<?php if($this->session->userdata('role_id')=='1'){ ?>
                    data.KV_ID = $("#KvList").val();
					<?php } elseif($this->session->userdata('role_id')=='6'){ ?>
                    data.KV_ID = <?php echo "'".$emp_list->present_kvcode."'"; ?>;
					<?php } else { ?> data.KV_ID = <?php echo "'".$this->session->userdata('master_code')."'"; ?>;
					<?php  }  ?>
                    data.Class_ID = $("#class").val();
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
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                           
				'<a href="javascripts:void(0)" data-toggle="tooltip" title="Undo" class="undo_data" stu_id="'+row.id+'"><i class="fa fa-undo" aria-hidden="true"></i></a>'+
				<?php if($this->session->userdata('role_id')=='1'){ ?>
				'<a href="javascripts:void(0)" data-toggle="tooltip" title="Permanent Delete" class="delete_data" stu_id="'+row.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
				<?php  } ?>
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
           var row_id = $(this).attr("stu_id");   
           if(confirm('Are you sure to permanent delete this Record')) {  
                $.ajax({  
                     url:"<?php echo base_url('permanent_delete'); ?>",  
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
		
		  $('#dataTableIdCon').on('click', 'a.undo_data', function (e) {
           var row_id = $(this).attr("stu_id");    
           var Class_ID = $("#class").val();   
                $.ajax({  
                     url:"<?php echo base_url('restore_data'); ?>",  
                     method:"POST",  
                     data:{row_id:row_id,cid:Class_ID,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                     success:function(data) {						
					  alert("Restore data Successfully.");
				      oTable.api().ajax.reload();
					  return true;
                     }  
                });  
             
      	});  
		
	$(document).ready(function() {
        $("#Groupby").select2({
                multiple: true,
            });
			  });
   
</script>
