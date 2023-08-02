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
    <?php 
    /*$sql=$this->db->select('SUM(sanctioned_post) as total_reg_vacancy');
        $this->db->from('ci_vacancy_master');
        $this->db->where('code',$code);
        $q = $ci->db->get();*/
    ?>
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
            <div class="row" style="padding: 6px;">  
             <div class="form-group col-md-3">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Region:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <?php 
                        $role_id=$this->session->userdata['role_id'];
                        $region_id=$this->session->userdata['region_id']; 
                        if($role_id==3){
                            echo form_dropdown('region_id',masterregion_lists(),isset($region_id)?$region_id:'',' id="region_id" class="form-control validate[required]" disabled onchange="LockedST(this.value)"');   
                        }else{
                            $options=masterregion_lists();
                            echo '<select name="region_id" id="region_id" class="form-control validate[required]" disabled onchange="LockedST(this.value)">'; 
                            echo '<option value="001">KVS-HQ</option>';
                            foreach ($options as $key => $value) { 
                                    echo '<option value="'.$key.'">'.$value.'</option>';
                        }                                               
                            echo "<select>";
                            //echo form_dropdown('region_id',array(masterregion_lists(),'test'), isset($region_id)?$region_id:'',' id="region_id" class="form-control validate[required]" disabled onchange="LockedST(this.value)"');    
                        }  ?>
                        <span class="error"><?php echo form_error('region_id'); ?></span>
                    </div>
                </div>
                <!--=========================== KVS FILTER START =================================-->
                <div class="form-group col-md-3 kv-list">
                    <label class="col-sm-12 col-form-label text-white" id="initial_region_label">Select Kendriya Vidyalaya:<span class="reqd">*</span></label>
                    <div class="col-sm-12">
                        <!--select id="KvList" name="KvList" class="form-control" style="width:235px!important;" onchange="GETSTU(this.value)"-->
                        <select id="KvList" name="KvList" class="form-control" style="width:235px!important;">
                            <option value="">Select KV </option>
                        </select>
                    </div>
                </div> 
                <!--=========================== KVS FILTER END =================================-->
                <div class="form-group col-md-2">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="btn_filter" class="btn btn-warning btn-block float-right"><i class="fa fa-filter"></i>&nbsp; SEARCH</button>
                    </div>
                </div>
                <?php /*if($role_id==3){  ?>
                <div class="form-group col-md-3">
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                    <div class="col-sm-12">
                        <button type="button"  id="Download_Excel" class="btn btn-primary btn-block float-right"><i class="fa fa-filter"></i>&nbsp; Download Excel</button>
                    </div>
                </div>  
            <?php  }*/  ?>

                    <div class="form-group col-md-2">                        
                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label>
                        <button type="button"  id="AssessmentStatus" class="btn btn-success btn-block float-right">Assessment Status</button>
                    </div>

                <div class="form-group col-md-2">  

                    <label class="col-sm-12 col-form-label text-white">&nbsp;<span class="reqd"></span></label> 
                        
                         <button type="button"  id="FinReportGen" class="btn btn-success btn-block float-right"><i class="fa fa-filter"></i>&nbsp; Final Report</button>                           
                    </div>
                    <?php  if($role_id==1){  ?>
                    <div class="form-group col-md-2">      
                        <button type="button"  id="FinReportGenBoy" class="btn btn-success btn-block float-right"><i class="fa fa-filter"></i>&nbsp; Final Report Boy</button>
                    </div>
                    <div class="form-group col-md-2">                            
                           <button type="button"  id="FinReportGenGirl" class="btn btn-success btn-block float-right"><i class="fa fa-filter"></i>&nbsp; Final Report Girl</button>

                    </div>
                      <?php }   ?>
                </div>  
            </div>
              
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
                            <th>Parent Mobile</th>
                            <th>Parent Email</th> 
                            <th>Entry Status</th> 
                            <th>YearEnd Status</th> 
                            <th>Action</th>
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
    ClassID='<?php echo $this->uri->segment(3); ?>'; 
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
    <?php  if($role_id==3){ ?>

     LockedST(<?php echo $region_id; ?>);
    <?php } else{ ?> 
    UnLockedST();  
    <?php   }  ?>  
   function LockedST(RO_ID){ 
        if(RO_ID==<?php echo $region_id; ?>){ 
            $("#region_id").prop("disabled", true);
        }else{
            $("#region_id").prop("disabled", false);
        }
        $('#KvList').find('option').not(':first').remove();
        FilteredKV();
    } 
       function UnLockedST(RO_ID){
        $("#region_id").prop("disabled", false);
         FilteredKV();
       }
    function FilteredKV(){
         <?php  if($role_id==3){ ?>
      var RO =<?php echo $region_id; ?>;
    <?php } else{ ?>
          var RO = $("#region_id").val(); 
    <?php   }  ?>       
        if(RO ==''){
            alert("Please Select Region First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'filtered_kv_list',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData){
                        $('#KvList').select2();
                        var options = $('#KvList');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.KVID).text(this.NME));
                        });
                      //  $('.kv-list').css("display", "block");
                    }else{
                       // $('.kv-list').css("display", "none");
                    }
                }
            });
        }
    }
    
     $(document).ready(function () { 
        //  var option_all = $("#Groupby option:selected").map(function () {
            return $(this).val();
                }).get().join(',');  
                
        var oTable = $('#dataTableIdCon').dataTable({
			
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
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
                        columns: [1,2,3,4,5,6,7]
                    }
                    
                },
        ],
            "ajax": {
                "url": "<?php echo site_url('kv-all-student'); ?>",
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
                    data.KV_ID = $("#KvList").val();
                    data.CLASS_ID = ClassID
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

                {"data": "adminssion_no"},
                {"data": "name_of_kv"},
                {"data": "name"},
                {"data": "gender"},
                {"data": "category"},
                {"data": "parent_mobile_no"},
                {"data": "parent_email_id"},    
                {"data": "is_mid_updated"},    
                {"data": "class2ndStatus"},  
                {
                    "orderable": false,
                    "render": function (data, type, row) {
						
                        if(ClassID==2){
                            $link='<?php echo site_url('assessment/year_end/'); ?>'+ClassID+'/'+ row.id;                            
                        }else{
                            $link='<?php echo site_url(); ?>assessment/details/'+ClassID+'/' + row.id;
                        } 
                        $progressLink='<?php echo site_url(); ?>assessment/progress_report/'+ClassID+'/' + row.id;
                        return '<div class="col-md-4 p-0"></div><div class="col-md-4 p-0">'+
                           
                '<a href="'+$link+'" data-toggle="tooltip" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="javascripts:void(0)" data-toggle="tooltip" title="Delete" class="delete_data" category_id="'+row.id+'"><i class="fa fa-trash" aria-hidden="true"></i></a><a href="'+$progressLink+'" data-toggle="tooltip" title="Progress"><i class="fa fa-line-chart" aria-hidden="true"></i></a>'+
                            
                                '</div>';
                    }
                },
                    
            ],
        });
        
        $('#btn_filter').click(function(){ 
            oTable.api().ajax.reload(); 
        });
         $('#btn_filterDp').click(function(){ 
            oTable.api().ajax.reload(); 
        });
        
        
        $('#dataTableIdCon').on('click', 'a.delete_data', function (e) {
           var row_id = $(this).attr("category_id");              
           ClassID='<?php echo $this->uri->segment(2); ?>'; 
           if(confirm('Are you sure to delete this Record')) {  
                $.ajax({  
                     url:"<?php echo base_url('delete_duplicate'); ?>",  
                     method:"POST",  
                     data:{row_id:row_id,cid:ClassID,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},  
                     success:function(data) {                       
                      alert("Record Deleted Successfully.");
                      oTable.api().ajax.reload();
                      return true;
                     }  
                });  
           }  
           else {  
                return false;       
           }  
        });  
    $(document).ready(function() {
        $("#Groupby").select2({
                multiple: true,
            });
              });

    $('#ReportGen').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            var ClassID = '<?php echo $this->uri->segment(3); ?>'; 
            if(R_ID!='') {  
                window.location="<?php echo base_url('assessment/generate_report'); ?>/"+R_ID+"/"+ClassID;
            }  
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        }); 
        
        $('#FinReportGen').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            var KVID = $("#KvList").val();  
            var ClassID = '<?php echo $this->uri->segment(3); ?>'; 
            if(ClassID==1) {  
                window.location="<?php echo base_url('assessment/class1st_final_report'); ?>/"+R_ID;
            } else if(ClassID==2){
                window.location="<?php echo base_url('assessment/class2st_final_report'); ?>/"+R_ID;
            } 
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        }); 

        $('#AssessmentStatus').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            var KVID = $("#KvList").val();  
            var ClassID = '<?php echo $this->uri->segment(3); ?>';   
            if(R_ID!='') {  
                window.location="<?php echo base_url('assessment/assessment_status'); ?>/"+R_ID+"/"+ClassID;
            }  
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        });

        $('#FinReportGenBoy').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            var KVID = $("#KvList").val();  
            var ClassID = '<?php echo $this->uri->segment(3); ?>';  
            if(R_ID!='') {  
                window.location="<?php echo base_url('assessment/assessmentboy/final_report'); ?>/"+R_ID+"/"+KVID+"/"+ClassID;
            }  
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        });
        $('#FinReportGenGirl').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            var KVID = $("#KvList").val();  
            var ClassID = '<?php echo $this->uri->segment(3); ?>';  
            if(R_ID!='') {  
                window.location="<?php echo base_url('assessment/assessmentgirl/final_report'); ?>/"+R_ID+"/"+KVID+"/"+ClassID;
            }  
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        });

    $('#Download_Excel').on('click', function (e) {
            var R_ID = $("#region_id").val();  
            if(R_ID!='') {  
                window.location="<?php echo base_url('assessment/download_excel'); ?>/"+R_ID;
            }  
           else {  
            alert("Please Select Region First.");
                return false;       
           }  
        }); 

   
</script>
