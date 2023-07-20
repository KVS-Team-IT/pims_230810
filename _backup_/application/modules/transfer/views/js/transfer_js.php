<script>
    $(document).ready(function () {
		
        var ROLE ="<?php echo $this->session->userdata['role_id'] ?>";
        var oTable = $('#dataTableId').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "oLanguage": {   "sSearch": "Search By Name / Code" },
            "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
            'columnDefs': [{ className: 'text-center', targets: [4,5] }],
            "dom": 'lBfrtip',
            "buttons": [
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'Export Data In Excel',
                    title: 'Registered-Employee-Records',
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
                'url'       : "<?php echo site_url('transfer/Transfer/unit_employee_list'); ?>",
                'dataType'  : 'json',
                'type'      : 'POST',
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
                'data'      : function (data) {
                                data.pre_emp_status = $('#pre_emp_status').val();
				data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
								
                            }
            },
            'columns': [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                           
                            {"data": "emp_name_code"},
                            {"data": "emp_status"},
                            {"data": "emp_unit"},
                            {"data": "emp_place"},
                            {"data": "emp_desig"},
                            {"data": "emp_subject"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.emp_trans=='1'){
                                        return '<a href="javascript:void(0)" class="btn btn-success btn-block" disabled>In-Process</a>';
                                    }else if(row.emp_trans=='2'){
                                        return '<a href="javascript:void(0)" class="btn btn-default btn-block" disabled>Transferred</a>';
                                    }else if(row.emp_trans=='3'){
                                        return '<a href="javascript:void(0)" class="btn btn-warning btn-block" disabled>In-Process(HQ)</a>';
                                    }else{
                                        return '<a href="<?php echo site_url(); ?>execute-transfer-order/1/' + row.enc_emp_code + '" target="_blank" class="btn btn-primary btn-block">Initiate Transfer</a>';
                                    }
                                }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.emp_trans=='1'){
                                        return '<a href="<?php echo site_url(); ?>generate-lpc-letter/1/' + row.enc_emp_code + '" target="_blank" class="btn btn-success btn-block">LPC</a>';
                                    }else{
                                        return '<button class="btn btn-danger btn-block" data-toggle="tooltip" data-placement="left" title="First Initiate Transfer" onclick="GenerateLPC();">LPC</button>';
                                    }
                                }
                            },
                    ],
        });
	$('#btn_filter').click(function(){ oTable.api().ajax.reload(); });
    });
    function GenerateLPC(){
        alertify.error('Initiate Transfer to Generate LPC');
    }
</script>
