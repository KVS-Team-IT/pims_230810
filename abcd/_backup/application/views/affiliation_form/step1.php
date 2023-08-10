<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | KV PROFILE</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo base_url(); ?>vendor/datatable/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>js/encrypt.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
    <style>
        @font-face {
		font-family: 'text-security-disc';
		src: url('fonts/text-security-disc.eot');
		src: url('fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
		url('fonts/text-security-disc.woff') format('woff'),
		url('fonts/text-security-disc.ttf') format('truetype'),
		url('images/text-security-disc.svg#text-security') format('svg');
	}
	input.password {
		font-family: 'text-security-disc';
	}
        .splash {
            position: absolute;
            margin: 0px auto;
            z-index: 2000;
            background: white;
            color: gray;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .splash-title{
            text-align: center;
            vertical-align: middle;
            margin-top: 15%;
        }
    </style>
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
    text-align: center;
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
.step-box {
    border: 1px solid #ccc;
    padding: 11px 3px 0px 5px;
    background: #014a69;
    color: #fff;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}
h6.step-title-0 {
    font-family: 'Roboto', sans-serif;
}
label{font-family: 'Roboto', sans-serif;}
</style>
</head>

<body class="">
<div id="content-wrapper">
    <div class="container-fluid" style="width:85%!important;">
		<div class="card mb-3">
           <div class="card-header text-center" style="padding-bottom: 0px !important;">
            <img class="rounded" src="<?php echo base_url(); ?>img/kvs-logo1bk.png" width="75" height="60">
            <br>
            <label style="margin-bottom: -2px!important; font-size:18px;font-weight:bold;font-family: none;letter-spacing: 5px;margin-left: 5px;color: #9E9E9E;text-shadow: 1px 0px 2px #a56a12;">PIMS</label>
            <hr style="margin-top: 0px!important;">
            <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; letter-spacing: 1px;">
			SURVEY REPORT FOR THE OPENING OF NEW KENDRIYA VIDYALAYA
			</label>
        </div> 
		<div class="row card-body">
                    <div class="col-md-2 step-box active">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 1</span></h6>
                    </div>
                    <div class="col-md-2 step-box">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 2</span></h6>
                    </div>
                    <div class="col-md-2 step-box">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 3 </span> </h6>
                    </div>
					 <div class="col-md-2 step-box">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 4 </span> </h6>
                    </div>
					 <div class="col-md-2 step-box">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 5 </span> </h6>
                    </div>
					<div class="col-md-2 step-box">
                        <h6 class="step-title-0"> <span class="fa fa-circle"></span> <span class="break-line"></span> <span class="step-title">STEP 6 </span> </h6>
                    </div>
                </div> 
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-note"></i>1. LOCATION</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
            <input type="hidden" name="id" value="<?php echo isset($school->id) ? $school->id : ''; ?>">
            <div class="card-body user_view">
                <div class="row">
                    <div class="col-md-2">
                        <label>Name: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("name", isset($school->name) ? set_value('name', $school->name) : set_value('name'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('name');
                        ?>
                    </div>
					<div class="col-md-2">
                        <label>Full Address with Pincode: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php /*echo form_input("address", isset($school->address) ? set_value('address', $school->address) : set_value('address'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('address');*/
                        ?>
						<textarea class="form-control" name="emp_address"></textarea>
                    </div>
                    
                </div>
                <div class="row">
				 <div class="col-md-2">
                        <label>Place: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("place", isset($school->place) ? set_value('place', $school->place) : set_value('place'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('place');
                        ?>
                    </div>
					<div class="col-md-2">
                        <label>Post Office: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("post", isset($school->post) ? set_value('post', $school->post) : set_value('post'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('post');
                        ?>
                    </div>                   
                </div>
                
                <div class="row">
                     <div class="col-md-2">
                        <label>Region: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("region_id", array("" => "Select Region") + masterregion_lists(), isset($school->region_id) ? set_value('region_id', $school->region_id) : set_value('region_id'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('region_id');
                        ?>
                    </div> 
                    <div class="col-md-2">
                        <label>Nearest Railway Station: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("railway", isset($school->railway) ? set_value('railway', $school->railway) : set_value('railway'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('railway');
                        ?>
                    </div> 
                </div>
                
				<div class="row">
				 <div class="col-md-2">
                        <label>Nearest Bank Name: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("bank_name", isset($school->bank_name) ? set_value('bank_name', $school->bank_name) : set_value('bank_name'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('bank_name');
                        ?>
                    </div>
					<div class="col-md-2">
                        <label>Distance From Vidyalaya: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("post", isset($school->post) ? set_value('post', $school->post) : set_value('post'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('post');
                        ?>
                    </div>                   
                </div>
				
                <div class="row">
                    <div class="col-md-2">
                        <label>Security arrangements for keeing cash in the school premeses: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("security", isset($school->security) ? set_value('security', $school->security) : set_value('security'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('security');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Name of the sponsoring authrity: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("authrity", isset($school->authrity) ? set_value('authrity', $school->authrity) : set_value('authrity'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('authrity');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Full Name: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("full_name", isset($school->full_name) ? set_value('full_name', $school->full_name) : set_value('full_name'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('full_name');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Designation: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("designation", isset($school->designation) ? set_value('designation', $school->designation) : set_value('designation'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('designation');
                        ?>
                    </div>
                </div>
               <div class="row">
                    <div class="col-md-2">
                        <label>Address: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php //echo form_input("emp_address", isset($school->emp_address) ? set_value('emp_address', $school->emp_address) : set_value('emp_address'), 'class="validate[required] form-control" autocomplete="off"');
                        //echo form_error('emp_address');
                        ?>
						 <textarea class="form-control" name="emp_address"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Telephone: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("telephone", isset($school->telephone) ? set_value('telephone', $school->telephone) : set_value('telephone'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('telephone');
                        ?>
                    </div>
                </div>
                
                        
                 
            </div>
			 <div class="card-header"><i class="fas fa-note"></i>II.  BUILDING AND PLAYFROUND FACILITIES TO PROVIDED FOR SCHOOL</div>
			 <div class="card-body user_view">
			 <div class="row">
                    <div class="col-md-2">
                        <label>No of Class: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("class_no", isset($school->class_no) ? set_value('class_no', $school->class_no) : set_value('class_no'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('class_no');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No of Library: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("library_no", isset($school->library_no) ? set_value('library_no', $school->library_no) : set_value('library_no'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('library_no');
                        ?>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>No of Laboratory: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("laboratory", isset($school->laboratory) ? set_value('laboratory', $school->laboratory) : set_value('laboratory'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('laboratory');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No of Special Rooms: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("special_rooms", isset($school->special_rooms) ? set_value('special_rooms', $school->special_rooms) : set_value('special_rooms'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('special_rooms');
                        ?>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>No of Principal Rooms: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("p_rooms", isset($school->p_rooms) ? set_value('p_rooms', $school->p_rooms) : set_value('p_rooms'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('p_rooms');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No of Staff Rooms: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <?php echo form_input("s_rooms", isset($school->s_rooms) ? set_value('s_rooms', $school->s_rooms) : set_value('s_rooms'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('s_rooms');
                        ?>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>please attach sketch map and indicate the dimensions of various rooms: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                         <input type="file" class="form-control" name="room_sketch">
                    </div>
                    <div class="col-md-2">
                        <label>Facilities for fans: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>Yes:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building_type" class="form-control" required value="1">                       
                    </div>
                    <div class="col-md-1">
                        <label>No:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building_type" class="form-control"  value="2">                       
                    </div>					
                </div>
				
				<div class="row">                    
                    <div class="col-md-2">
                        <label>Facilities for electric: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>Yes:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="is_electric_facilities" class="form-control" required value="1">
                    </div>
                    <div class="col-md-1">
                        <label>No:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="is_electric_facilities" class="form-control"  value="2">
                    </div>
					<div class="col-md-2">
                        <label>Facilities for Water: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>Yes:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="is_water_facilities" class="form-control" required value="1">
                    </div>
                    <div class="col-md-1">
                        <label>No:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="is_water_facilities" class="form-control"  value="2">
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-4">
                        <label>Location of the proposed building and the existing campus with respect to the residential colony in the station: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                          <textarea class="form-control" name="sch_building"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label>Facilities for playgrounds and other open space for the use of students: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                          <textarea class="form-control" name="sch_building"></textarea>
                    </div>
					
					<div class="col-md-4">
                        <label>Amount of licence fe, if any ehurgeable lor land bwldmaetc.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                          <textarea class="form-control" name="sch_building"></textarea>
                    </div>
					<div class="col-md-4">
                        <label>THER PHYSICAL FACILITIES PROPOSED TO BE MADE AVAILABLE BY THE SPONSORING AUTHORITY IN THE NEAR FUTURE AND THE DATE BY WHICH TO BE MADE AVAILABLE   <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                          <textarea class="form-control" name="sch_building"></textarea>
                    </div>
                </div>
			</div>	
			
			<div class="card-header"><i class="fas fa-note"></i>V. LAND</div>
			 <div class="card-body user_view">
				<div class="row">
                    <div class="col-md-4">
                        <label>Any new site of building or school campus earmarked in the colony/station.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_building"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label>Area of the school site earmarked as above. Please enclose a map indicating the relative position of the site with respect to the residential colony. : <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="residential_colony"></textarea>
                    </div>
                </div>
					<div class="row">
					<div class="col-md-4">
                        <label>Feasibility for the free of cost transfer of land ( as per detail mentioned in terms and conditions) to Kendriya Vidyalaya Sangathan for construction of school building and premises.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
					</div>
			 </div>
			 
			 <div class="card-header"><i class="fas fa-note"></i>V.(A)  CATEGORIES OF PERSONNEL AT THE STATION AND NEAR ABOUT. </div>
			 <div class="card-body user_view">
				<div class="row">
                   <div class="col-md-4">
                        <label>Name of the departments and the number of personnel at the station and near about belonging to the following categories: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="name_of_department"></textarea>
                    </div>
                    <div class="col-md-2">
                        <label>Transferable Deptt. wise Defence personnel.: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                     <textarea class="form-control" name="transferable"></textarea>
                    </div>
					<div class="col-md-2">
                        <label>Transferable Deptt. wise Central Govt. employees and Officers of All India Services.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                     <textarea class="form-control" name="transferable"></textarea>
                    </div>
                </div>
					<div class="row">
					<div class="col-md-4">
                        <label>Transferable Deptt. wise Officers of autonomous bodies/projects/ Public Undertakings /Corporations.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
					
					<div class="col-md-4">
                        <label>Non-transferable Deptt wise Defence: personnel of Central Govt. employees/ autonomous bodies/projects/Corporations.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
					<div class="col-md-12">
					<p><b>NOTE</b> : The word <b>'transferable'</b> denotes only those employees who have actually been transferred from the station to another at least once during the preceding 07 years</p>
					</div>
					</div>
			 </div>
			 <div class="card-header"><i class="fas fa-note"></i>VI. AVAILABILITY OF STUDENTS FOR ENROLMENT: </div>
			 <div class="card-body user_view">
			<table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
			 <tr>
				<th>Class</th>
				<th>Student on rolls</th>
				<th>Student likely to be admitted</th>
			</tr>
			<tr>
				<td>I</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
			<tr>
				<td>II</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
			<tr>
				<td>III</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
			<tr>
				<td>IV</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
			<tr>
				<td>V</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
			<tr>
				<td>VI</td>
				<td><input type="text" class="form-control"></td>
				<td><input type="text" class="form-control"></td>				
			</tr>
				</table>
				<div class="row">
				<div class="col-md-12">
                        <label>2. Distribution of the students in accordance with categories of personnel as indicated in V (A), (a) and (c) above. <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-12">
                       <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
						 <tr>
							<th>Sr. no</th>
							<th></th> 
						</tr>
						<tr>
							<th>i)</th>
							<th><input type="text" class="form-control"></th> 
						</tr>
						<tr>
							<th>ii)</th>
							<th><input type="text" class="form-control"></th> 
						</tr>
						<tr>
							<th>iii)</th>
							<th><input type="text" class="form-control"></th> 
						</tr>
						</table>
                    </div>
					</div>
			</div>	
				
			 <div class="card-header"><i class="fas fa-note"></i>VII. FURNITURE AND OTHER TEACHING MATERIALS: </div>
			 <div class="card-body user_view">
				<div class="row">
					<div class="col-md-4">
                        <label>Details of furniture for students and teachers and other teaching materials like black-boards, maps, Lab. Equipments, etc. which will
be transferred to KVS free of cost.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
				</div>
			 </div>
			  <div class="card-header"><i class="fas fa-note"></i>VIII. SCHOOLING FACILITIES IN EXISTENCE: </div>
			 <div class="card-body user_view">
				<div class="row">
					<div class="col-md-4">
                        <label>Is there any School in existence, in the station and/or near about ? If so, the details indicating classes, subjects, medium of instructions,
affiliation with Secondary education Board (State/Central) etc. may be given. .  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
				</div>
			 </div>
			  <div class="card-header"><i class="fas fa-note"></i>IX. FACILITIES OF TRANSPORT TO THE PRINCIPAL IN CASE OF A
BRANCH KENDRIYA VIDYALAYA: </div>
			 <div class="card-body user_view">
				<div class="row">
					<div class="col-md-4">
                        <label>Facilities for transport at least twice a week to the Principal of the neighbouring Kendriya Vidyalaya can be made available for visits and
inspection of the Branch Kendriya Vidyalaya.  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
				</div>
			 </div>
			 <div class="card-header"><i class="fas fa-note"></i>X. IN CASE IT IS PROPOSED TO HAND OVER THE EXISTING SCHOOL IN THE CAMPUS TO THE KENDRIYA VIDYALAYA SANGATHANI
PLEASE GIVE THE INFORMATION IN ADDITION TO THE POINTS MENTIONED ABOVE) ON THE FOLLOWING POINTS. : </div>
			 <div class="card-body user_view">
				<div class="row">
					<div class="col-md-4">
                        <label>a). The details of the school building and campus, number of room etc  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
					<div class="col-md-4">
                        <label>b). Details of furniture for students and teaching materials, Lab. Equipment, Library books etc. available
in the school  <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
					<div class="col-md-4">
                        <label>c). Statement indicating the assets of the Vidyalaya both moveable and immovable (attach list)   <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-8">
                       <textarea class="form-control" name="sch_feasibility"></textarea>
                    </div>
				</div>
			 </div>
		</div>			 
       </div>	
		
                <div class="row"> 
                    <div class="col-md-12 text-right">
                        <?php echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                        <input type="reset" value="Cancel" class="btn btn-default">
                    </div>
                </div>
                <?php echo form_close(); ?>
    </div>
</div>
</div>
<script type="text/javascript">
    <?php /*if(($school) && !empty($school)){ ?>
        $("#year_of_establish").val("<?php echo $school->year_of_establish;?>").trigger("change");
    <?php } */?>
    
    function getstreamdiv(){
        var text=$('#ccea_class').val();
        if(text == 11 || text == 12)
        {
            $('.stream').show();

        }else{
            $('.stream').hide();
            $('#science').val('');
            $('#commerce').val('');
            $('#arts').val('');
        }
    }

    function getkvstreamdiv(){
        var text=$('#upto_class').val();
        if(text == 11 || text == 12)
        {
            $('.kvstream').show();

        }else{
            $('.kvstream').hide();
            $('#kvscience').val('');
            $('#kvcommerce').val('');
            $('#kvarts').val('');
        }
    }

    function caltotpost()
    {
        var tp = $('#teaching_post').val();
        var ntp = $('#nonteaching_post').val();
        var total = parseInt(tp)+parseInt(ntp);
        $('#total_post').val(total);
    }
</script>
</body>
</html>