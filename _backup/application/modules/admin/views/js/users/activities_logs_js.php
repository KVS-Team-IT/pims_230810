<script>
 $(document).ready(function () {
            var oTable = $('#dataTableId').dataTable( {
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "desc" ]],
            "lengthMenu": [[10, 25, 50,100], [10, 25, 50,100]],
            "ajax":{
		    "url": "<?php echo site_url('admin/users/get_activities_logs'); ?>",
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
            },"columns":[
			    {
                                "orderable": false,
				"render": function(data, type, row) {
                                    return  row.serial_no;
				}
                            },

                                { "data": "username" },
                                { "data": "email" },
                                { "data": "role" },
                                { "data": "time" },
                                { "data": "last_login" },
                                { "data": "time" },
                                { "orderable": false, "render": function(data, type, row) { return  row.ipaddress; } },
                                { "data": "activity_type" },
                                { "data": "form_type" },
                                { "data": "activity_data" },
                                { "data": "status" },					
                        ],  
            });
});
	
	
</script>