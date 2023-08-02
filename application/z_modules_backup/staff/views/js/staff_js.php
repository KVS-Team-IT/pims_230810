<script>
    $(document).ready(function () {
        var logown="<?php echo $this->session->userdata['user_id'] ?>";
        var oTable = $('#dataTableId').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
           // "oLanguage": {   "sSearch": "Search By Name / Code" },
            "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
            'columnDefs': [{ className: 'text-center', targets: [4,5] }],
            "dom": 'lBfrtip',
           "buttons": [
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'EXCEL',
                    title: 'Registered Staff Records',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3,4,5,6]
                    }
                    
                },
        ],
            "ajax": {
                "url"       : "<?php echo site_url('staff/Staff/AllStaffList'); ?>",
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

                            
                            {"data": "emp_type"},
                            {"data": "emp_post"},
                            {"data": "emp_sub"},
                            {"data": "emp_region"},
                            {"data": "emp_school"},
                            {"data": "emp_strength"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.emp_own==logown || logown==1){
                                    return '<a href="<?php echo site_url(); ?>support-staff-edit/'+row.decode_id+'" class="text-warning"><i class="fas fa-edit" title="Update">&nbsp;Edit</i></a>';
                                    }else{
                                    return '<a href="javascript:void(0)" disabled class=" text-danger"><i class="fas fa-ban" title="Denied">&nbsp;Denied</i></a>';    
                                    }
                                }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.emp_own==logown || logown==1){
                                        SSId="'"+row.decode_id+"'";
                                    return '<a onclick="DeleteSS('+SSId+');" class="text-danger"><i class="fas fa-trash" title="Reset">&nbsp;Trash</i></a>';
                                    }else{
                                    return '<a href="javascript:void(0)" disabled class=" text-danger"><i class="fas fa-ban" title="Denied">&nbsp;Denied</i></a>';    
                                    }
                                }
                            },
                    ],
        });
    });
</script>
