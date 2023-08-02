<script>
    $(document).ready(function () {
		
        var ROLE ="<?php echo $this->session->userdata['role_id'] ?>";
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
                    titleAttr: 'Export Data In Excel',
                    title: 'Registered-Employee-Records',
                    exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },
                        columns: [1,2,3,4,5,6,7,8]
                    }
                    
                },
        ],
            "ajax": {
                'url'       : "<?php echo site_url('reports/get_profile'); ?>",
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
                                
                                data.initial_role_id = $('#role_id_initial').val();
				data.initial_region_id = $('#c_region_initial').val();
				data.initial_school_id = $('#c_school_initial').val();
				data.initial_section_id = $('#initial_section_id').val();
                                data.initial_kvcode = $('#kvcode_initial').val();
				data.initial_shift = $('#shift_initial').val();
				data.desiganition_id = $('#desiganition_id').val();
                                data.subject_id = $('#subject_id').val();
                                data.pre_emp_status = $('#pre_emp_status').val();
				//data.initial_section_id = $('#initial_section_id').val();
				data.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
								
                            }
            },
            'columns': [
                            {
                                "orderable": false,
                                "render": function (data, type, row) { return  row.serial_no; }
                            },
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    return '<a href="<?php echo site_url(); ?>employee-details/' + row.enc_emp_code + '" target="_blank" class="text-primary">' + row.emp_code + '</i></a>';
                                }
                            },
                            {"data": "emp_status"},
                            {"data": "emp_name"},
                            {"data": "emp_post"},
                            {"data": "emp_subject"},
                            {"data": "emp_dob"},
                            {"data": "emp_region"},
                            {"data": "emp_school"},
                            {
                                "orderable": false,
                                "render": function (data, type, row) {
                                    if(ROLE==1 && row.emp_acceptance=='1'){
                                        return '<div class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Verified </div>';
                                    }else if(row.emp_acceptance=='1'){
                                        var EmpIdName=row.emp_code+",'"+row.emp_name+"'";
                                    return '<div class="btn btn-block btn-danger" onclick="UnlockProfile('+EmpIdName+');"><i class="fas fa-lock" title="unlock">&nbsp;Locked</i></div>';
                                    }else if(ROLE==1 && row.emp_acceptance!='1'){
                                        return '<div class="text-danger"><i class="fa fa-check-circle" aria-hidden="true"></i> Pending </div>';
                                    }else{
                                        return '<div class="btn btn-block btn-success disabled"><i class="fas fa-unlock" title="Open">&nbsp;Unlocked</i></div>';
                                    }
                                }
                            },
                    ],
        });
	$('#btn_filter').click(function(){ oTable.api().ajax.reload(); });
    });
	
</script>
<script>
	var base_url = $('#url').val();
	var get_csrf_token_name = $('#get_csrf_token_name').val();
	var get_csrf_hash = $('#get_csrf_hash').val();
	function processRegionInitialDiv() {
        var role_id = $("#role_id_initial").val();
        $('#school_div_initial').css("display", "none");
        $('#c_school_initial').val('');
        $('#section_div_initial').css("display", "none");
        $('#initial_section_id').val('');
        $('#designation').css("display", "none");
        $('#desiganition_id').val('');
        $('#subject').css("display", "none");
        $('#subject_id').val('');
        if (role_id != '') {
            $.ajax({
                url: base_url + 'admin/users/get_region',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&r_id=' + role_id,
                type: 'POST',
                success: function (response) {
                    $('#c_region_initial').html(response);
                    $('#region_div_initial').css("display", "block");
                    if (role_id == '2') {
                        $("#initial_region_label").html("Units<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }
                    else if (role_id == '4') {
                        $("#initial_region_label").html("ZIET<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    } else {
                        $("#initial_region_label").html("Regions<span class='reqd'>*</span>");
                        $("#initial_zone").val('');
                    }
                }
            });
        }else{
            $('#region_div_initial').css("display", "none");
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

    
    function getdesignation(desig){
            $.ajax({
            url: base_url + 'reports/get_designation',
            data: get_csrf_token_name + '=' + get_csrf_hash + '&d_id=' + desig,
            type: 'POST',
            success: function (response) {
                if(response==0){
                    $('#designation').hide();
                    
                }else{
                    $('#designation').show();
                    
                    $('#desiganition_id').html(response);
                }
            }
        });
    }
    
    function getsubject(){
        var desid=$('#desiganition_id').val();
        //alert(desid);
        if(desid==5 || desid==6){
            $.ajax({
                url: base_url + 'reports/get_subject',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&d_id=' + desid,
                type: 'POST',
                success: function (response) {
                //console.log(response);
                    if(response==0){
                        $('#subject').hide();
                    }else{
                        $('#subject').show();
                        $('#subject_id').html(response); 
                    }
                }
            });
        }else{
            $('#subject').hide();
        }
    }
    
  function UnlockProfile(EmpId,EmpName){
      if (EmpId){
            alertify.confirm('Unlock Employee Profile',
                             'Are you sure to unlock the profile of '+EmpName+' ('+EmpId+') ?',
            function(){ 
                $.ajax({
                    url: base_url + 'reports/UnlockProfile',
                    data: get_csrf_token_name + '=' + get_csrf_hash + '&EmpId=' + EmpId,
                    type: 'POST',
                    success: function (response) {
                        console.log(response);
                        if(response==true){
                            alertify.success('Profile Unlocked');
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000); 
                        }else{
                            alertify.error('Action Cancelled, Contact PIMS Administrator');
                        }
                    }
                });
            }, function(){
                alertify.error('Action Cancelled');
            }).set('labels', {ok:'Agree', cancel:'Disagree'}); ;
        }else{
            alertify.error('Select checkbox to Accept');
            return false;
        }
  }
</script>