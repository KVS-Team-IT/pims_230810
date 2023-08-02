

<script>
    $(document).ready(function () {
        
	var logown="<?php echo $this->auth_user_id ?>";
        var role="<?php echo $this->role_id ?>";	
        var region="<?php echo $this->region_id?>";
        var school="<?php echo $this->school_id?>";
        if(role==3){
            $('#c_region_initial').val(region).trigger('change');
            $("#c_region_initial").attr("readonly", true); 
        }else if(role==5){
            $('#c_region_initial').val(region).trigger('change');
            $("#c_region_initial").attr("readonly", true); 
            setTimeout(function() { 
                    $('#c_school_initial').val(school).trigger('change'); 
                    $("#c_school_initial").attr("readonly", true); 
                }, 200);
        }else{
            $("#c_region_initial").attr("readonly", false);
            $("#c_school_initial").attr("readonly", false); 
        }
        var oTable = $('#dataTableId').dataTable({
            "processing": true,
            "serverSide": true,
            "order": [[1, "asc"]],
            "oLanguage": {   "sSearch": "Search By Name / Code" },
            "lengthMenu": [[10, 25, 50,100,-1], [10, 25, 50,100,"ALL"]],
            // 'columnDefs': [{ className: 'text-center', targets: [4,5] }],
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
                                data.initial_region_id = $('#c_region_initial').val();
				data.initial_school_id = $('#c_school_initial').val();
                                data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
								
                            }
            },
            'columns': [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            
                            {"data": "emp_region"},
                            {"data": "emp_kvname"},
                            {"data": "emp_name"},
                            {"data": "emp_code"},
                            {"data": "emp_desig"},
                            {"data": "emp_subject"},
                            {"data": "obs_name"},
                            {"data": "obs_desig"},
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
	$('#btn_filter').click(function(){ oTable.api().ajax.reload(); });
    });
</script>
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    function processSchoolInitialDiv() {
        var region_id = $("#c_region_initial").val();
        if (region_id != '') {
                $.ajax({
                    url: base_url + 'admin/users/get_school',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + region_id,
                    type: 'POST',
                    success: function (response) {
                        $('#school_div_initial').css("display", "block");
                        $('#c_school_initial').html(response);
                    }
                });
            }else{
                $('#school_div_initial').css("display", "none");
                $('#section_div_initial').css("display", "none");
            }
    }
</script>
<script>
    function DownObsData(){
        var R = $('#c_region_initial').val(); if(!R){R=null;}
        var S = $('#c_school_initial').val(); if(!S){S=null;}

        var url = "<?php echo site_url('new-send-observed-data'); ?>/"+R+"/"+S;
        $("<a>").prop({
            target: "_blank",
            href: url
        })[0].click();
    }
</script>
