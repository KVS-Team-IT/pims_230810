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
                        columns: [1,2,3,4,5,6]
                    }
                    
                },
        ],
            "ajax": {
                "url"       : "<?php echo site_url('profile/ProfileList/get_profile'); ?>",
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
                            {"data": "emp_code"},
                            {"data": "emp_name"},
                            {"data": "emp_post"},
                            {"data": "emp_place"},
                            {"data": "emp_region"},
                            {"data": "emp_school"},
                            {"data": "acceptance"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>employee-details/' + row.decode_id + '" class="text-success"><i class="fas fa-eye" title="View">&nbsp;View</i></a>';
                                }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.emp_own==logown || logown==1){
                                    return '<a href="<?php echo site_url(); ?>personal-details/'+row.decode_id+'" class="text-warning"><i class="fas fa-edit" title="Edit">&nbsp;Edit</i></a>';
                                    }else{
                                    return '<a href="javascript:void(0)" disabled class=" text-danger"><i class="fas fa-ban" title="Edit">&nbsp;Denied</i></a>';    
                                    }
                                }
                            },
                    ],
        });
    });
</script>
