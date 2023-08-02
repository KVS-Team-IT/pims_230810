<script>
    $(document).ready(function () {
        var logown="<?php echo $this->session->userdata['user_id'] ?>";
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
                    titleAttr: 'EXCEL',
                    title: 'Registered Employee Records',
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
                "url"       : "<?php echo site_url('profile/TransferList/TransferBook'); ?>",
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
                "data"      : function (data) {
                                data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
                                
                                //console.log(data);
                            }
            },
            "columns": [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            {"data": "EMP_CODE"},
                            {"data": "EMP_NAME"},
                            {"data": "PRE_EMP_PLACE_DEPT"},
                            {"data": "PRE_EMP_DESIG_SUB"},
                            {"data": "TRA_EMP_PLACE_DEPT"},
                            {"data": "TRA_EMP_DESIG_SUB"},
                            {"data": "EMP_FROM_DT"},
                            {"data": "EMP_TRA_DT"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>employee-details/' + row.ENC_EMP_CODE + '" class="text-success"><i class="fas fa-eye" title="View">&nbsp;View</i></a>';
                                }
                            },
                            
                    ],
        });
    });
</script>
