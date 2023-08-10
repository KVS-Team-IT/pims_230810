<script>
    $(document).ready(function () {
        var logown="<?php echo $this->session->userdata['user_id'] ?>";
        var oTable = $('#dataTableId').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "oLanguage": {   "sSearch": "Search By Subject / Code" },
            "lengthMenu": [[10, 25, 50, 100, 2500, 5500, 55000], [10, 25, 50, 100, 2500, 5500, 55000]],
            "columnDefs": [{ className: 'text-center', targets: [4,5] }],
            "dom": 'lBfrtip',
            "buttons": [
                        {
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel-o"></i> Export In Excel.',
                            titleAttr: 'Export Data In Excel.',
                            title: 'Vacancy-Report',
                            exportOptions: {columns: [1,2,3,4,5,6,7,8,9,10,11,12]}
                        }
                    ],
            "ajax":{
                "url"       : "<?php echo site_url('reports/get_all_vacancy'); ?>",
                'dataType'  : 'json',
                'type'      : 'POST',
                'error'     : function(jqXHR, thrownError) {
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
                "data"  : function (data) {
                            data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
                            data.initial_role_id = $('#role_id_initial').val();
                            data.initial_region_id = $('#c_region_initial').val();
                            data.initial_school_id = $('#c_school_initial').val();
                            //data.initial_section_id = $('#initial_section_id').val();
                            data.initial_kvcode = $('#kvcode_initial').val();
                            data.desiganition_category_id = $('#desiganition_category_id').val();
                            data.desiganition_id = $('#desiganition_id').val();
                            data.subject_id = $('#subject_id').val();
                            data.initial_shift = $('#shift_initial').val();
                }
            },
            "columns": [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            {"data": "KV_CODE"},
                            {"data": "ROLE"},
                            {"data": "KV_REGION_ZEIT"},
                            {"data": "IN_POST"},
                            {"data": "DESI_TYPE"},
                            {"data": "IN_SUBJECT"},
                            {"data": "PRE_SANCTION_POST"},
                            {"data": "SANCTION_POST"},
                            {"data": "IN_POSITION"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.IN_SURPLUS > 0){
                                        return '<a href="<?php echo site_url(); ?>initiate-transfer" target="_blank" class="btn btn-warning">' + row.IN_SURPLUS + '</i></a>';
                                    }else{
                                        return '<div class="btn btn-default">'+row.IN_SURPLUS+'</div>';
                                    }
                                }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.TOTAL_VACANCY < 0){
                                        return '<a href="<?php echo site_url(); ?>employee-report" target="_blank" class="btn btn-danger">' + row.TOTAL_VACANCY + '</i></a>';
                                    }else if(row.TOTAL_VACANCY > 0){
                                        return '<div class="btn btn-success">'+row.TOTAL_VACANCY+'</div>';
                                    }else{
                                        return '<div class="btn btn-default">'+row.TOTAL_VACANCY+'</div>';
                                    }
                                }
                            },
                            {"data": "IN_CONTRACTUAL"},
                        ]
            });
            $('#btn_filter').click(function(){ 
                oTable.api().ajax.reload(); 
            });
                    
    });
    </script>
    <!-- ========================== Report Filter Master Start =========================== -->
    <script>
	var base_url = $('#url').val();
	var get_csrf_token_name = $('#get_csrf_token_name').val();
	var get_csrf_hash       = $('#get_csrf_hash').val();
        
	function processRegionInitialDiv() {
        var role_id = $("#role_id_initial").val();
        $('#school_div').css("display", "none");
        $('#designation_div').css("display", "none");
        $('#subject_div').css("display", "none");
        $('#section_div').css("display", "none");
        
        if ((role_id) && (role_id!='')){
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#c_region_initial').html(response);
                    $('#region_div').css("display", "block");
                    if (role_id == '2') {
                        $("#initial_region_label").html("Units<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }else if (role_id == '4') {
                        $("#initial_region_label").html("ZIET<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }else {
                        $("#initial_region_label").html("Regions<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }
                }
            });
        }else{
            $('#region_div').css("display", "none");
        }
       
    }
    
    function processSchoolInitialDiv() {
        var region_id = $("#c_region_initial").val();
        var role_id = $("#role_id_initial").val();
        if (region_id != '') {
            if(role_id=='5' || role_id=='7'){
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#school_div').css("display", "block");
                        $('#section_div').css("display", "none");
                        $('#c_school_initial').html(response);
                    }
                });
            }else if(role_id=='2' && region_id=='5'){
                $.ajax({
                    url: base_url + 'admin/users/get_section',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#kvcode_initial').val('1917');
                        $('#initial_zone').val('12');
                        $('#section_div').css("display", "block");
                        $('#school_div').css("display", "none");
                        $('#c_section_initial').html(response);
                    }
                });
            }else if(role_id=='2'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        $('#kvcode_initial').val(result[0].trim());
                        $('#initial_zone').val(result[1]);
                        $('#school_div').css("display", "none");
                        $('#section_div').css("display", "none");
                        
                        
                    }
                });
            }else if(role_id=='3'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        console.log(result[1]);
                        $('#kvcode_initial').val(result[0].trim());
                        $('#initial_zone').val(result[1]);
                        $('#school_div').css("display", "none");
                        $('#section_div').css("display", "none");
                        processDesignationInitialDiv(3);
                        
                    }
                });
            }else if(role_id=='4'){
                $.ajax({
                    url: base_url + 'admin/users/get_zone',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        var result=response.split('#'); 
                        console.log(result[1]);
                        $('#kvcode_initial').val(result[0].trim());
                        $('#initial_zone').val(result[1]);
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        processDesignationInitialDiv(4);
                        
                    }
                });
            }else{
                $('#school_div_initial').css("display", "none");
                $('#section_div_initial').css("display", "none");
            }
            
        }
    }
    function processDesignationInitialDiv(desig) {
        $.ajax({
            url: base_url + 'reports/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&d_id=' + desig,
            type: 'POST',
            success: function (response) {
                if(response==0){
                    $('#designation_div').hide();
                }else{
                    $('#designation_div').show();
                    $('#desiganition_id').html(response);
                }
            }
        });
    }
    function processSubjectInitialDiv(desid) {
        if(desid==5 || desid==6){
            $.ajax({
                url: base_url + 'reports/get_subject',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&d_id=' + desid,
                type: 'POST',
                success: function (response) {
                    console.log(response);
                    if(response==0)
                    {
                       $('#subject_div').hide();
                    }else{
                        $('#subject_div').show();
                        $('#subject_id').html(response); 
                    }
                }
            });
        }else{
            $('#subject_div').hide();
        }
    }
    <!-- =========================== END OF DIV FUNCTION ===========================-->
   
  
</script>

