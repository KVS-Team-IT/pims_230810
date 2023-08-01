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
vertical-align: middle;}
.col-form-label {
    color: #014a69 !important;
}
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Assessment Of FLN</li>
	</ol>
        <!-- DataTables Example --> 
	<div class="card mb-3"> 
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
            <div><?php 
             //show($this->session->userdata);?></div>
			 <?php 
                        $role_id=$this->session->userdata['role_id'];
                        $region_id=$this->session->userdata['region_id'];  
                           ?>
			  
            <div class="card-body">
                <div class="table-responsive">
                   <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SR.No.</th> 
							<th>Admission No.</th>
							<th>KV Name</th>
                            <th>Name</th>
							<th>Gender</th>
							<th>Category</th>  
                            <th>Oral Ability(Entry)</th>  
                            <th>Writing Ability(Entry)</th>  
                            <th>Reading Ability(Entry)</th>  
                            <th>Numeracy Ability(Entry)</th>  
                            <th>मौखिक भाषा(Entry)</th>  
                            <th>लेखन क्षमता(Entry)</th>  
                            <th>पठन क्षमता(Entry)</th>  
                            <th>Oral Ability(MidTerm)</th>  
                            <th>Writing Ability(MidTerm)</th>  
                            <th>Reading Ability(MidTerm)</th>  
                            <th>Numeracy Ability(MidTerm)</th>
                            <th>मौखिक भाषा(MidTerm)</th>  
                            <th>लेखन क्षमता(MidTerm)</th>  
                            <th>पठन क्षमता(MidTerm)</th>  
                        </tr>
                    </thead>
                    <tbody id="tbody">
						
                    </tbody>
                    </table>
                    </table>
                </div>
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
 
	 $(document).ready(function () { 
		//  var option_all = $("#Groupby option:selected").map(function () {
			return $(this).val();
				}).get().join(',');  
				
        var oTable = $('#dataTableIdCon').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "lengthMenu": [[10, 25, 50,100,2000,-1], [10, 25, 50,100,2000,"ALL"]],
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
                        columns: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,16]
                    }
                    
                },
        ],
            "ajax": {
                "url": "<?php echo site_url('download_data_excel'); ?>",
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
                    data.R_ID =<?php echo $region_id; ?>;  
                } 
            },

            "columns": [
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
                {"data": "oral_language_eng"},    
                {"data": "write_language_eng"},    
                {"data": "read_language_eng"},    
                {"data": "is_numeracy_skills"},    
                {"data": "oral_language_hindi"},    
                {"data": "write_language_hindi"},    
                {"data": "read_language_hindi"},    
                {"data": "oral_language_eng_mid_term"},    
                {"data": "write_language_eng_mid_term"},    
                {"data": "read_language_eng_mid_term"},    
                {"data": "is_numeracy_skills_mid_term"},    
                {"data": "oral_language_hindi_mid_term"},    
                {"data": "write_language_hindi_mid_term"},    
                {"data": "read_language_hindi_mid_term"},    
					
            ],
        });
		
        $('#btn_filter').click(function(){ 
			oTable.api().ajax.reload(); 
		});
		 $('#btn_filterDp').click(function(){ 
			oTable.api().ajax.reload(); 
		});
	 

   
</script>
