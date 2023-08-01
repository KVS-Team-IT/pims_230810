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
}
.dt-buttons {
    width: 64%;
    float: left;
}
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
<?php $Class_ID=$this->uri->segment(2); ?>
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
	<!--div class="row col-md-3"> <label for=""> Find Duplicate Records On  </label> </div-->	
		<?php if($this->session->userdata('role_id')=='5'){ ?>
	<div class="row col-md-3"> <button type="button"  id="btn_filterDp" class="btn btn-warning btn-block float-right"><i class="fa fa-filter"></i>&nbsp; ASSIGN TEACHER</button></div>	
		<?php  }  ?>
		<?php $LoggedID=$this->session->userdata('master_code');
		$ifExist= check_kv_shift_availibility($LoggedID);  
		if($ifExist==1){
		?>
		<div class="row col-md-3" style="margin: 0px;"> <button type="button" onclick="AssginShift(<?php echo $LoggedID.'02'; ?>)"  id="btn_filterDp" class="btn btn-success btn-block float-right"><i class="fa fa-filter"></i>&nbsp; ASSIGN TO SHIFT II</button></div>	
			<div class="row col-md-4"> </div>
		<?php  } else{ 
	if(strlen($LoggedID)==6){//for shift two
		$kvCode1=substr($LoggedID, 0, -2);
			?>
			<div class="row col-md-3" style="margin: 0px;"> <button type="button" onclick="AssginShift(<?php echo $kvCode1; ?>)" id="btn_filterDp" class="btn btn-success btn-block float-right"><i class="fa fa-filter"></i>&nbsp; ASSIGN TO SHIFT I</button></div>	
			<div class="row col-md-4"> </div>
			<?php } else { ?>
			<div class="row col-md-7">  </div>
		<?php } } ?>
	       	<div class="row col-md-3" style="right: 0;display: inline;">
			      
			<a href="<?php echo base_url() . 'assessment/add_new/'.$Class_ID; ?>" class="btn btn-primary btn-block float-right" style="float:right;"><i class="fa fa-plus-circle"></i>&nbsp;Add New Student</a>
           	   	 </div>	 
                    
            </div>
              </div>
            <div class="card-body">
                <div class="table-responsive">  
                   <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
				
                    <thead>
                        <tr>
                            <th>   <input type="checkbox" id="selectAll" value="sds32233wed232"/> </th> 
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content"> 
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Select Teacher</label>
              <input type="hidden" name="kd_id" id="kd_id" value="<?php echo $LoggedID; ?>">
              <select name="emp_id" class="form-control" id="empID" autocomplete="off"> 
							<option value="">Choose</option>
							<?php foreach($emp_list as $val){ ?>
							<option value="<?php echo $val->emp_code ?>"><?php echo $val->emp_title. $val->emp_name.' ('. $val->emp_desig.')'; ?> </option> 
							<?php  }  ?>
							</select>
            </div>
             <div class="col-sm-3 pull-right">
            <button type="button" class="btn btn-primary btn-block" id="save_data"><span class="glyphicon glyphicon-off"></span> Submit</button>
			</div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button> 
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
      ClassID='<?php echo $this->uri->segment(2); ?>'; 
	 $(document).ready(function () { 
		//  var option_all = $("#Groupby option:selected").map(function () {
			return $(this).val();
				}).get().join(',');   
            var oTable = $('#dataTableIdCon').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "desc"]],
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
                "url": "<?php echo site_url('kv-student-list'); ?>/"+ClassID,
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
                    data.KV_ID = '<?php echo $this->session->userdata('master_code'); ?>';
                    data.Class_ID = ClassID;
                    data.column =$("#Groupby option:selected").map(function () {
            return $(this).val();
                }).get().join(',');  

                }

            },

            "columns": [ 
                {
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<input type="checkbox" class="stulist" id="row_Id" value="'+row.id+'"  name="row_Id[]"/>';               
                    }
                },
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
                       $html='<button data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</button>';                           
                        return '<div class="col-md-4 p-0">'+ $html +'</div>';
                    }
                },
                {
                    "orderable": false,
                    "render": function (data, type, row) {
                       if(ClassID==2){
                            $link='<?php echo site_url('assessment/update_class_second/'); ?>'+ClassID+'/'+ row.id;

                             if(row.class2ndStatus=='1'){
                            return '<div class="col-md-4 p-0">'+                           
                        '<button data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</button>'+'</div>';
                        }else{
                            return '<div class="col-md-4 p-0">'+                           
                        '<a href="'+$link+'" data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Update</a>'+'</div>';
                        } 
                        }else{
                            $link='<?php echo site_url('assessment/year_end/'); ?>'+ClassID+'/'+ row.id;

                             if(row.endstatus=='1'){
                            return '<div class="col-md-4 p-0">'+                           
                        '<button data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs" disabled><i class="fa fa-ban" aria-hidden="true"></i> Update</button>'+'</div>';
                        }else{
                            return '<div class="col-md-4 p-0">'+                           
                        '<a href="'+$link+'" data-toggle="tooltip" title="Details" class="btn btn-primary btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Update</a>'+'</div>';
                        } 
                        }
                    }
                },  

                {
                    "orderable": false,
                    "render": function (data, type, row) {
                    if(ClassID==2){
                            $link='<?php echo site_url('assessment/year_end/'); ?>'+ClassID+'/'+ row.id;                            
                        }else{
                            $link='<?php echo site_url(); ?>assessment/details/'+ClassID+'/' + row.id;
                        } 
                        $progressLink='<?php echo site_url(); ?>assessment/progress_report/'+ClassID+'/' + row.id;
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                           
                    '<a href="'+$link+'" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" category_id="'+row.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><a href="'+$progressLink+'" data-toggle="tooltip" title="Progress"><i class="fa fa-line-chart" aria-hidden="true"></i></a>'+
                            
                                '</div>';
                    }
                }, 

                 
                    
            ],
        });
            
       
        $('#btn_filter').click(function(){ 
			oTable.api().ajax.reload(); 
		});
		 $('#btn_filterDp').click(function(){ 
			//oTable.api().ajax.reload(); 
			var myCheckboxes = new Array();
			$('input:checked').each(function(i){
			 myCheckboxes.push($(this).val());
			}); 
			if(myCheckboxes!='')
			{
			$('#myModal').modal('show');			 
			}else{
				alert('Please select at least one Record.');
			}
		});
		
		
        $('#dataTableIdCon').on('click', 'a.delete_data', function (e) {
           var row_id = $(this).attr("category_id");   
           ClassID='<?php echo $this->uri->segment(2); ?>'; 
           if(confirm('Are you sure to delete this Record')) {  
                $.ajax({  
                     url:"<?php echo base_url('delete_duplicate'); ?>",  
                     method:"POST",  
                     data:{row_id:row_id,cid:ClassID,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
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
		$('#save_data').click(function(){ 
           var emp_Id = $('#empID :selected').val();
           var kvs_Id = <?php echo $LoggedID; ?>;
		      if(emp_Id=='')
					{
						 alert("Please select Employee.");
						 return false;
					}
		  var rowID = new Array();
			$('input:checked').each(function(i){
			 rowID.push($(this).val());
			});  
          // if(confirm('Are you sure to delete this Record')) {  
                $.ajax({  
                     url:"<?php echo base_url('assigned_employee'); ?>",  
                     method:"POST",  
                     data:{emp_Id:emp_Id,kv_Id:kvs_Id,row_id:rowID,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                     success:function(data) {		
					if(data=='0')
					{
						 alert("Please select at least one Record.");
					}else{
						  alert("Record has been assigned Successfully.");
					}
					
					   $('#myModal').modal('hide');						   
				      oTable.api().ajax.reload();
					  $("#selectAll").prop("checked",false);
					  return true;
                     }  
                });  
          /* }  
           else {  
                return false;       
           }  */
      	});  
		
		 function AssginShift(Id){  		   
		  var rowID = new Array();
			$('input:checked').each(function(i){
			 rowID.push($(this).val());
			});  
			if(rowID=='') 
			{
				alert('Please select at least one Record.');
				return false;
			}
            if(confirm('Are you sure that you want to move these records ?')) {  
                $.ajax({  
                     url:"<?php echo base_url('assign_student_to_shift'); ?>",  
                     method:"POST",  
                     data:{shiftID:Id,row_id:rowID,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                     success:function(data) {		
					if(data=='0')
					{
						 alert("Please select at least one Record.");
					}else{
						  alert("Record has been moved Successfully.");
					}
					
					   $('#myModal').modal('hide');						   
				      oTable.api().ajax.reload();
					  $("#selectAll").prop("checked",false);
					  return true;
                     }  
                });  
			}
          }
		  
	$(document).ready(function() {
        $("#Groupby").select2({
                multiple: true,
            }); 

 $("#selectAll").click(function () {
        $(".stulist").prop('checked', $(this).prop('checked'));
    });
    
    $(".stulist").change(function(){
        if (!$(this).prop("checked")){
            $("#selectAll").prop("checked",false);
        }
    });
			  });
   
</script>
