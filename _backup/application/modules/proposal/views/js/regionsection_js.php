<script>
    $(document).ready(function () {
    var oTable = $('#dataTableId').dataTable( {
        "processing": true,
        "serverSide": true,
        "order": [[ 0, "asc" ]],
        "oLanguage": {   "sSearch": "Search By Name / Code" },
        "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
        "dom": 'lBfrtip',
        "buttons": [
                {
                    extend: 'excel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'Export Data In Excel',
                    title: 'Class Proposal Reports',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3]
                    }
                    
                },
        ],

        "ajax":{
            "url": "<?php echo site_url('proposal/region_section_report'); ?>",
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
                { "data": "name" },
                { "data": "code" },
                {
                    "orderable": false,
                    "render": function (data, type, row) {
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0"><a href="<?php echo site_url(); ?>proposal-details-ro/'+row.id+'">View Proposal</a></div>';
                    }
                },
               					
		],  
    });
 });
    </script>
