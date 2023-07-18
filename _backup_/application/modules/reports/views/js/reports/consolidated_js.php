<script>
    $(document).ready(function () {
        var logown="<?php echo $this->auth_user_id ?>";
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        var oTable = $('#dataTableId').dataTable({
            "fixedHeader": true,
            "processing": true,
            "serverSide": true,
            colReorder: true,
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
                    title: 'Consolidated Comparative Report-'+dateTime,
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]
                    }
                    
                },
        ],
            "ajax": {
                "url"       : "<?php echo site_url('reports/Reports/ConsolidatedData'); ?>",
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
                                data.RegId = $('#RegId').val();
                                data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
                                
                                //console.log(data);
                            }
            },
                
            "columns": [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>comparative-report/' + row.code + '" class="text-primary font-weight-bold" target="_blank">'+ row.name +'</a>';
                                }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>comparative-report/' + row.code + '" class="text-primary font-weight-bold" target="_blank">'+ row.code +'</a>';
                                }
                            },
                            
                            {"data": "region"},
                            {"data": "sector"},
                            {"data": "build"},
                            {"data": "infra"},
                            {"data": "govt_class"},
                            {"data": "govt_section"},
                            {"data": "kvs_class"},
                            //{"data": "kvs_section"},
                            {"data": "govt_teach"},
                            {"data": "govt_nonteach"},
                            {"data": "kvs_teach"},
                            {"data": "kvs_nonteach"},
                            {"data": "kv_teach"},
                            {"data": "kv_nonteach"},
                            {"data": "kv_teach_vac"},
                            {"data": "kv_nonteach_vac"},
                            {"data": "kv_utilization"},
                            {"data": "kv_contact"},
                            
                    ],
        });
        $('#btn_filter').click(function(){ oTable.api().ajax.reload(); });
        if (!$("#dataTableId").is(":blk-transpose"))
        {
            $("#dataTableId").transpose({ mode: 0 });
        }
        if (!$("#dataTableId").is(":blk-transpose"))
	{
            $("#dataTableId").transpose({ mode: 1});
        }

} );

$("#btnTpVertical").click(function () {
    var currentMode = $("#dataTableId").data("tp_mode");
    if (currentMode == undefined) {
        $("#dataTableId").transpose("transpose");
        $("#btnTpVertical").html("<i class='fas fa-undo'></i>&nbsp;Reset Table");
    }
    else {
        $("#dataTableId").transpose("reset");
        $("#btnTpVertical").html("<i class='fas fa-list'></i>&nbsp;Transpose Table");
    }
});
</script>
