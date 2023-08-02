
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
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Assessment  Of FLN</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
	
            <div class="card-header"><i class="fa fa-users"></i> Registered Student's List</div>
                <?php   if($this->session->flashdata('success'))
                {
                    ?>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
            <div> 
			</div>
			
			 <div class="card-body" style="padding-top: 0px!important; display:block;padding-bottom: 0;">
                <br>
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
                </div>
				</div>
	       	<div class="row col-md-2" style="right: 0;display: inline;">
			      
			 <a href="<?php echo base_url() . 'assessmentclasstwo/add_new' ?>" class="btn btn-primary btn-block float-right" style="float:right;line-height: 5px;"><i class="fa fa-plus-circle"></i>&nbsp;Add New</a>
			 
			 
           	   	 </div>	 
				 <div class="row col-md-2" style="right: 0;display: inline;">
			      
			 <a href="<?php echo base_url() . 'assessmentclasstwo/promote_in_new_class/2022-2023' ?>" class="btn btn-primary btn-block float-right" style="float:right;line-height: 5px;"><i class="fa fa-plus-circle"></i>&nbsp;Promote</a>
			 
			 
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
							
							<th>MidTerm</th>
							<th>YearEnd</th>
							
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
                    title: 'Assessment Abilities',
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
                "url": "<?php echo site_url('kv-student-list-for-me-two'); ?>",
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
                    data.KV_ID = '<?php echo $emp_list->present_kvcode; ?>';
                    data.EMP_ID = '<?php echo $emp_list->emp_code; ?>';
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
						if(row.MidStColumn==1){
							  /*$html='<a href="<?php //echo site_url('assessmentclasstwo/middle/'); ?>'+ row.id + '" data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</a>';*/
							  
							$html='<button data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</button>';
						 }else {
							/* $html='<a href="<?php echo site_url('assessmentclasstwo/reason/'); ?>'+ row.id + '" data-toggle="tooltip" title="Why Not Updated ?" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Reason</a>';*/
							$html='<a href="<?php echo site_url('assessmentclasstwo/middle/'); ?>'+ row.id + '" data-toggle="tooltip" title="Update" class="btn btn-primary btn-xs" disabled><i class="fa fa-edit" aria-hidden="true"></i> Update</a>';
 
						 }		
						 
                        return '<div class="col-md-4 p-0">'+ $html +'</div>';
                    }
                },
				{
                    "orderable": false,
                    "render": function (data, type, row) {

                        return '<div class="col-md-4 p-0" disabled>'+                           
						'<a href="<?php echo site_url('assessmentclasstwo/year_end/'); ?>'+ row.id +'" data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-edit" aria-hidden="true"></i> Update</a>'+                           
                      '</div>';
                    }
                },	
				
				

                {
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                           
				'<a href="<?php echo site_url(); ?>assessmentclasstwo/details/' + row.id + '" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" category_id="'+row.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                           
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
   
</script>
