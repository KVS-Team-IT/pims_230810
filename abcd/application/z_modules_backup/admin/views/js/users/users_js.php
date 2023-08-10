<script>
    $(document).ready(function () {
        
    var oTable = $('#dataTableId').dataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "desc" ]],
        "oLanguage": {   "sSearch": "Search By Name / Code" },
        "lengthMenu": [[25, 50,100,-1], [25, 50,100,"ALL"]],
        "dom": 'lBfrtip',
        "buttons": [
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'Export Data In Excel',
                    title: 'Registered User Records',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3,4]
                    }
                    
                },
        ],

        "ajax":{
            "url": "<?php echo site_url('admin/users/get_users'); ?>",
            'dataType': 'json',
            'type': 'POST',
            'error': function(jqXHR, thrownError) {
                    //console.log(jqXHR);
                    //alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                'statusCode': {
                    200: function() { 
                      //console.log('OK 200') 
                    },
                    204: function() {
                      //console.log('Empty 204') 
                      $('#dataTableId tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty">Empty Result Set</td></tr>')
                    },
                    400: function() {
                      //console.log('Bad Request 400');
                      $('#dataTableId tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty text-danger">Bad request</td></tr>')
                    },
                    500: function() {
                      //console.log('Internal server error 500');
                      $('#dataTableId tbody')
                        .empty()
                        .append('<tr><td colspan="10" class="dataTables_empty text-danger">Internal server error</td></tr>')
                    }
                  },
            "data": function ( data ) {
                data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            }
        },
        "columns": [
                {
                    "orderable": false,
                    "render": function(data, type, row) {
                        return  row.serial_no;
                    }
                },
                { "data": "UNAME" },
                { "data": "NAME" },
                {
                    "render": function(data, type, row) {
                        if(row.ID=='1'){
                            return '<button type="button" class="btn btn-danger btn-block" id="status_'+row.ID+'" disabled><i class="fa fa-check-circle"></i>&nbsp;Approved</button>';				
                        }else{
                            if(row.ACT=='<?php echo PENDING; ?>'){
                                var status = 'Pending'; 
                            }
                            else if(row.ACT=='<?php echo APPROVED; ?>'){
                                var status = 'Approved';
                            }
                            else if(row.ACT=='<?php echo REJECTED; ?>'){
                                var status = 'Rejected';
                            }
                            else{
                                var status = 'Retired';
                            }

                            return '<button type="button" class="btn btn-primary btn-block" id="status_'+row.ID+'" onclick="change_status('+row.ID+')"><i class="fa fa-check-circle"></i>&nbsp;'+status+'</button>';
                        }
                    }
                },
                {
                    "orderable": false,
                    "render": function(data, type, row) {
                        if(row.ROLE==1){
                            return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                            <?php   if(has_permission('users/details')){    ?>
                                    '<a href="<?php echo site_url();?>admin/users/details/'+row.ID+'" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                            <?php   }   ?>
                                '</div>';
                        }else if(row.ROLE==1){
                            return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                            <?php   if(has_permission('users/details')){    ?>
                                '<a href="<?php echo site_url();?>admin/users/details/'+row.ID+'" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                            <?php   }   if(has_permission('users/delete')){ ?>
                                '<a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" user_id="'+row.ID+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+
                            <?php	}   ?>
                                '</div>';
                        }else{
                                return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                            <?php   if(has_permission('users/details')){    ?>
                                '<a href="<?php echo site_url();?>admin/users/details/'+row.ID+'" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                            <?php   }   if(has_permission('users/edit')){   ?>
                                '<a href="<?php echo site_url();?>admin/users/edit/'+row.ID+'" data-toggle="tooltip" title="Edit"><i class="far fa-edit" aria-hidden="true"></i></a>'+	
                            <?php   }   if(has_permission('users/delete')){ ?>
                                '<a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" user_id="'+row.ID+'"><i class="fa fa-trash" aria-hidden="true"></i></a>'+	
                            <?php   }   ?>
                                 '<a class="btn btn-block btn-warning" href="javascripts:void(0)" data-toggle="tooltip" onclick="change_pass('+row.ID+')"><i class="fa fa-lock" aria-hidden="true">&nbsp;Change Password</i></a>'+
                                 '</div>';
                        }
                    }
                },
        ],  
    });
		
	


        $('#dataTableId').on('click', 'a.delete_data', function (e) {
            var user_id = $(this).attr("user_id");  
            if(confirm('Are you sure to delete this user')) {  
                $.ajax({  
                    url:"<?php echo base_url(); ?>admin/users/delete",  
                    method:"POST",  
                    data:{user_id:user_id,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                    success:function(data) {						
                        alert("User Deleted Successfully.");
                        oTable.api().ajax.reload();
                        return true;
                    }  
                });  
            }else {  
                return false;       
            }  
        }); 
    });
    </script>

    <script>
//===================================== Doc.Ready Ends Here ======================================//	
    function change_status(user_id){
 	$('#user_id').val(user_id);
 	$('#statusModal').modal('show');
    }
    function change_pass(user_id){
        $('#user_id_forpass').val(user_id);
 	$('#resetPassModal').modal('show');
    }
    
    $('#status_save').on('click',function(){
 	if($('#status').val()==''){
            $('#status_err').html('Please select status').css('color','red');	
 	}else{
            $('#status_err').html('');	
            var user_id=$('#user_id').val();
            var status=$('#status').val();
            var form_data=$('#status_form').serialize();
            var con = confirm("Are you sure you wnat to change status.");
            if(con){
 		$.ajax({
 			url:$('#url').val()+'admin/users/change_status',
 			data:form_data,
 			type:'post',
 			beforeSend:function(){
                            $('#status_msg').html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
 			},
 			success:function(response){
                            if(response==1){
 				if(status==1){
                                    var user_status='Approved';
 				}else if(status==2){
                                    var user_status='Rejected';
 				}else{
                                    var user_status='Pending';
 				}
                                    $('#status_'+user_id).html(user_status);
                                    $('#status_msg').html('Status Changed Successfully').css('color','green');
                                    location.reload();
 				}
                            }
 		});
            }
 	}
    });
    $("#reasion").css("display", "none");
    $('select').on('change', function() {
        var status = this.value ;
	if(status==2){
            $("#reasion").css("display", "block");
	}else{
            $("#reasion").css("display", "none");
	}
        //alert(status);
    });
    
</script>