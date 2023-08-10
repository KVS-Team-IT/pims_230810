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
            <li class="breadcrumb-item active">Kv Not Fill Student</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3">
	
			
			 <div class="card-body" style="padding-top: 0px!important; display:block;padding-bottom: 0;">
                <br>
                <div class="container row">
		
		
		
	       	 
                    
            </div>
              </div>
            <div class="card-body">
                <div class="table-responsive">  
                   <table class="table table-bordered" id="dataTableIdCon" width="100%">
				
                    <thead>
                        <tr>
                            
							<th>SR.No.</th>
							<th>kv Code </th>
							<th>KV Name</th>
                            <th>Region Name</th>
							
                                                        
                            
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
			'columnDefs': [{ className: 'text-center', targets: [1,2] }],
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
                        columns: [1,2,3,4]
                    }
                    
                },
        ],
            "ajax": {
                "url": "<?php echo site_url('assessmentclasstwo/get_data_not_filled_kv_json'); ?>",
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

                {"data": "actual"},
                {"data": "school_name"},
                {"data": "region_name"},
               
				],
        });
		
        $('#btn_filter').click(function(){ 
			oTable.api().ajax.reload(); 
		});
		 
		
		
          
	
   
</script>


