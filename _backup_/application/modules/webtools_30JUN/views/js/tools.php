<script>
    $(document).ready(function () {
	var logown="<?php echo $this->auth_user_id ?>";	
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
                    className: 'btnExcel',
                    text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                    titleAttr: 'Export Data In Excel',
                    title: 'Teachers Observation Data',
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
                'url'       : "<?php echo site_url('webtools/Webtools/All_Observed_Data'); ?>",
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
                                
                                data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
								
                            }
            },
            'columns': [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            {"data": "emp_code"},
                            {"data": "emp_name"},
                            {"data": "emp_region"},
                            {"data": "emp_kvname"},
                            {"data": "emp_kvcode"},
                            {"data": "obs_name"},
                            {"data": "overall_grading"},
                            {"data": "created_at"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(row.created_by==logown){
                                    return '<a href="<?php echo site_url(); ?>new-web-tools/' + row.enc_sno + '"><i class="fa fa-pencil-square-o text-success" aria-hidden="true">&nbsp;View & Edit</i></a>';
                                    }else{
                                    return '<a href="<?php echo site_url(); ?>new-web-tools/' + row.enc_sno + '"><i class="fa fa-eye text-warning" aria-hidden="true">&nbsp; View</i></a>';   
                                    }
                                }
                            },
                           /* {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>web-tools-delete/' + row.sno + '"><i class="fa fa-pencil-square-o text-danger" aria-hidden="true">&nbsp;Delete</i></a>';
                                }
                            },
                            */
                            
                           
                    ],
        });
	
    });
	
</script>
<script>
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
                        $('#school_div_initial').css("display", "block");
                        $('#section_div_initial').css("display", "none");
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
                        $('#section_div_initial').css("display", "block");
                        $('#school_div_initial').css("display", "none");
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
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        
                        
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
                        $('#school_div_initial').css("display", "none");
                        $('#section_div_initial').css("display", "none");
                        getdesignation(3);
                        
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
                        getdesignation(4);
                        
                    }
                });
            }else{
                $('#school_div_initial').css("display", "none");
                $('#section_div_initial').css("display", "none");
            }
            
        }
    }
</script>