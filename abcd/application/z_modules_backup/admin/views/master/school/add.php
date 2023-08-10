<?php //show($school); ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><?php if(isset($school->id) && $school->id!=''){?>Edit<?php }else{?>Add<?php }?> School</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header"><i class="fas fa-eye"></i> <?php if(isset($school->id) && $school->id!=''){?>Edit<?php }else{?>Add<?php }?> School</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
            <input type="hidden" name="id" value="<?php echo isset($school->id) ? $school->id : ''; ?>">
<?php if($this->role_id==5){$readonly="readonly";$readonlyDr="style='pointer-events: none'";} else{$readonly="";$readonlyDr="";}?>
            <div class="card-body user_view">
                <div class="row">
                    <div class="col-md-2">
                        <label>Zone: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("zone_id", array("" => "Select Zone") + zone(), isset($school->zone_id) ? set_value('zone_id', $school->zone_id) : set_value('zone_id'), 'class="validate[required] form-control" autocomplete="off" '.$readonlyDr.'');
                        echo form_error('zone_id');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Region: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("region_id", array("" => "Select Region") + masterregion_lists(), isset($school->region_id) ? set_value('region_id', $school->region_id) : set_value('region_id'), 'class="validate[required] form-control" autocomplete="off" '.$readonlyDr.'');
                        echo form_error('region_id');
                        ?>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Station Id: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("station_id", isset($school->station_id) ? set_value('station_id', $school->station_id) : set_value('station_id'), 'class="numericOnly validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('station_id');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Station Type: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("station_type", array("" => "Select Station") + master_station_lists(), isset($school->station_type) ? set_value('station_type', $school->station_type) : set_value('station_type'), 'class="validate[required] form-control" autocomplete="off" ');
                        echo form_error('station_type');
                        ?>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-2">
                        <label>School Name: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("name", isset($school->name) ? set_value('name', $school->name) : set_value('name'), 'class="txtOnly validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('name');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>School Code: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("kv_code", isset($school->kv_code) ? set_value('kv_code', $school->kv_code) : set_value('kv_code'), 'class="numericOnly validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('kv_code');
                        ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <label>Email: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("email", isset($school->email) ? set_value('email', $school->email) : set_value('email'), 'class="validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('email');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Sector: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("sector", array("" => "Select Sector") + sector(), isset($school->sector) ? set_value('sector', $school->sector) : set_value('sector'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('sector');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Year Of Opening: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("year_of_establish", array("" => "Select Year") + opening_years(), isset($school->year_of_establish) ? set_value('year_of_establish', $school->year_of_establish) : set_value('year_of_establish'), 'id="year_of_establish" class="validate[required] form-control" autocomplete="off"');
                        echo form_error('year_of_establish');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Upto Class: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("kv_upto_class", array("" => "Select Class") + upto_class(), isset($school->kv_upto_class) ? set_value('kv_upto_class', $school->kv_upto_class) : set_value('kv_upto_class'), 'class="validate[required] form-control" onchange="getkvstreamdiv();" id="upto_class" autocomplete="off"');
                        echo form_error('kv_upto_class');
                        ?>
                    </div>
                </div>
                <div class="row kvstream" <?php if($school->kv_upto_class==11 || $school->kv_upto_class==12) echo ''; else echo 'style="display: none;"';  ?> >
                    <div class="col-md-2 " >
                        <label>Stream:</label>
                    </div>
                    <div class="col-md-1">
                        <label>Science:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="kv_str_sci" id="kvscience" class="" value="1" <?php echo ($school->kv_str_sci == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Commerce:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="kv_str_com" id="kvcommerce" class="" value="1" <?php echo ($school->kv_str_com == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Humanities:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="kv_str_hum" id="kvarts" class="" value="1" <?php echo ($school->kv_str_hum == 1 ? 'checked' : null); ?>>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No of Section: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("kv_upto_section", isset($school->kv_upto_section) ? set_value('stationid', $school->kv_upto_section) : set_value('kv_upto_section'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('kv_upto_class');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Shift: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("shift", array("" => "Select Shift") + shift(), isset($school->shift) ? set_value('shift', $school->shift) : set_value('shift'), 'class="validate[required] form-control" autocomplete="off" '.$readonlyDr.'');
                        echo form_error('shift');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Kv Building: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>Permanent:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building_type" class="" required value="1" <?php echo ($school->building_type == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Temporary:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building_type" class=""  value="2" <?php echo ($school->building_type == 2 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-2">
                        <label>Infrastructure Facilities Available: </label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="infra_type" class="" required value="1" <?php echo ($school->infra_type == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>NO:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="infra_type" class="" value="2" <?php echo ($school->infra_type == 2 ? 'checked' : null); ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of Sections As Per CCEA Approval: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("ccea_upto_section", isset($school->ccea_upto_section) ? set_value('ccea_upto_section', $school->ccea_upto_section) : set_value('ccea_upto_section'), 'class="numericOnly validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('ccea_upto_section');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Classes Approved By CCEA: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("ccea_upto_class", array("" => "Select Class") + ccea_class(), isset($school->ccea_upto_class) ? set_value('ccea_upto_class', $school->ccea_upto_class) : set_value('ccea_upto_class'), 'onchange="getstreamdiv();" class="validate[required] form-control" id="ccea_class" autocomplete="off" ');
                        echo form_error('ccea_upto_class');
                        ?>
                    </div>
                </div>
                <div class="row stream" <?php if($school->ccea_upto_class==11 || $school->ccea_upto_class==12) echo ''; else echo 'style="display: none;"';  ?> >
                    <div class="col-md-2 " >
                        <label>Stream:</label>
                    </div>
                    <div class="col-md-1">
                        <label>Science:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="ccea_str_sci" id="science" class="" value="1" <?php echo ($school->ccea_str_sci == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Commerce:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="ccea_str_com" id="commerce" class="" value="1" <?php echo ($school->ccea_str_com == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Humanities:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="checkbox" name="ccea_str_hum" id="arts" class="" value="1" <?php echo ($school->ccea_str_hum == 1 ? 'checked' : null); ?>>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>UDISE Code: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("udise_code", isset($school->udise_code) ? set_value('udise_code', $school->udise_code) : set_value('udise_code'), 'class="numericOnly validate[required] form-control" autocomplete="off" '.$readonly.'');
                        echo form_error('udise_code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No Of Teaching Post As Per CCEA Approval: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("ccea_teach_post", isset($school->ccea_teach_post) ? set_value('ccea_teach_post', $school->ccea_teach_post) : set_value('ccea_teach_post'), 'id="teaching_post" class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="caltotpost();" '.$readonly.' ');
                        echo form_error('ccea_teach_post');
                        ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of NonTeaching Post As Per CCEA Approval: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("ccea_nonteach_post", isset($school->ccea_nonteach_post) ? set_value('ccea_nonteach_post', $school->ccea_nonteach_post) : set_value('ccea_nonteach_post'), 'id="nonteaching_post" class="numericOnly validate[required] form-control" autocomplete="off" onkeyup="caltotpost();" '.$readonly.'');
                        echo form_error('ccea_nonteach_post');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Total No Of Post As Per CCEA Approval: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("total_post", ($school->ccea_teach_post && $school->ccea_nonteach_post ) ? set_value('total_post', $school->ccea_teach_post+$school->ccea_nonteach_post) : set_value('total_post'), 'id="total_post" readonly class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('total_post');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of Classrooms Available: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("class_rooms", isset($school->class_rooms) ? set_value('class_rooms', $school->class_rooms) : set_value('class_rooms'), 'id="class_rooms" class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('class_rooms');
                        ?>
                    </div>
					
					<div class="col-md-2">
                        <label>Have identified gifted children?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_identified_gifted_child" class="" required value="1" <?php echo ($school->is_identified_gifted_child == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_identified_gifted_child" class=""  value="0" <?php echo ($school->is_identified_gifted_child == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					
                </div>
				
				<div class="row">
                    <div class="col-md-2">
                        <label>Have undertaken any activity under “Ek Bharat Shreshtha Bharat”?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_under_ebsb" class="" required value="1" <?php echo ($school->is_under_ebsb == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_under_ebsb" class=""  value="0" <?php echo ($school->is_under_ebsb == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Functional electricity facility?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_electric_facility" class="" required value="1" <?php echo ($school->is_electric_facility == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_electric_facility" class=""  value="0" <?php echo ($school->is_electric_facility == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>Functional girl's toilet facility?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_girls_toilet" class="" required value="1" <?php echo ($school->is_girls_toilet == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_girls_toilet" class=""  value="0" <?php echo ($school->is_girls_toilet == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Functional boy's toilet facility?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_boys_toilet" class="" required value="1" <?php echo ($school->is_boys_toilet == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_boys_toilet" class=""  value="0" <?php echo ($school->is_boys_toilet == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					
                </div>
				
				<div class="row">
                    <div class="col-md-2">
                        <label>Functional computer  used for pedagogical purpose?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_computer_for_ped" class="" required value="1" <?php echo ($school->is_computer_for_ped == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_computer_for_ped" class=""  value="0" <?php echo ($school->is_computer_for_ped == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Functional internet facility used for pedagogical purpose?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_net_for_ped" class="" required value="1" <?php echo ($school->is_net_for_ped == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_net_for_ped" class=""  value="0" <?php echo ($school->is_net_for_ped == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>CWSN friendly toilet?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_cwsn_toilet" class="" required value="1" <?php echo ($school->is_cwsn_toilet == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_cwsn_toilet" class=""  value="0" <?php echo ($school->is_cwsn_toilet == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Hand wash facility?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_handwash_fac" class="" required value="1" <?php echo ($school->is_handwash_fac == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_handwash_fac" class=""  value="0" <?php echo ($school->is_handwash_fac == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>Having Rainwater Harvesting facility?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_rw_harvesting" class="" required value="1" <?php echo ($school->is_rw_harvesting == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_rw_harvesting" class=""  value="0" <?php echo ($school->is_rw_harvesting == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Having kitchen gardens?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_kitchen_garden" class="" required value="1" <?php echo ($school->is_kitchen_garden == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_kitchen_garden" class=""  value="0" <?php echo ($school->is_kitchen_garden == 0 ? 'checked' : null); ?>>
						 
                    </div>				
					
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>Having Eco Clubs?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_echo_club" class="" required value="1" <?php echo ($school->is_echo_club == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_echo_club" class=""  value="0" <?php echo ($school->is_echo_club == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Having Youth Clubs?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_youth_club" class="" required value="1" <?php echo ($school->is_youth_club == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_youth_club" class=""  value="0" <?php echo ($school->is_youth_club == 0 ? 'checked' : null); ?>>
						 
                    </div>	
                </div>
				<div class="row">
                    <div class="col-md-2">
                        <label>Having Smart classrooms?: <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_smart_class" class="" required value="1" <?php echo ($school->is_smart_class == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_smart_class" class=""  value="0" <?php echo ($school->is_smart_class == 0 ? 'checked' : null); ?>>
						 
                    </div>
					
					<div class="col-md-2">
                        <label>Having ICT labs?:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label> 
					</div>	
					<div class="col-md-1">
					<input type="radio" name="is_ict_lab" class="" required value="1" <?php echo ($school->is_ict_lab == 1 ? 'checked' : null); ?>>
					</div>
					<div class="col-md-1">					
						 <label>NO:</label>
					</div>
					<div class="col-md-1">
					 <input type="radio" name="is_ict_lab" class=""  value="0" <?php echo ($school->is_ict_lab == 0 ? 'checked' : null); ?>>
						 
                    </div>	
                </div>
				<div class="row">
					<div class="col-md-2">
						<label>Total students appeared in Class Xth Board Examination: <span class="reqd">*</span></label>
					</div>
					<div class="col-md-4">
						<?php echo form_input("st_app_10_borad", isset($school->st_app_10_borad) ? set_value('st_app_10_borad', $school->st_app_10_borad) : set_value('st_app_10_borad'), 'id="st_app_10_borad" class="numericOnly validate[required] form-control" autocomplete="off"');
						echo form_error('st_app_10_borad');
						?>
					</div>
					<div class="col-md-2">
						<label>Total students passed in Class Xth Board Examination: <span class="reqd">*</span></label>
					</div>
					<div class="col-md-4">
						<?php echo form_input("st_pass_10_borad", isset($school->st_pass_10_borad) ? set_value('st_pass_10_borad', $school->st_pass_10_borad) : set_value('st_pass_10_borad'), 'id="st_pass_10_borad" class="numericOnly validate[required] form-control" autocomplete="off"');
						echo form_error('st_pass_10_borad');
						?>
					</div>
				</div>
					<div class="row">
						<div class="col-md-2">
							<label>Total students appeared in Class XIIth Board Examination: <span class="reqd">*</span></label>
						</div>
						<div class="col-md-4">
							<?php echo form_input("st_app_12_borad", isset($school->st_app_12_borad) ? set_value('st_app_12_borad', $school->st_app_12_borad) : set_value('st_app_12_borad'), 'id="st_app_12_borad" class="numericOnly validate[required] form-control" autocomplete="off"');
							echo form_error('st_app_12_borad');
							?>
						</div>
						<div class="col-md-2">
							<label>Total students passed in Class XIIth Board Examination: <span class="reqd">*</span></label>
						</div>
						<div class="col-md-4">
							<?php echo form_input("st_pass_12_borad", isset($school->st_pass_12_borad) ? set_value('st_pass_12_borad', $school->st_pass_12_borad) : set_value('st_pass_12_borad'), 'id="st_pass_12_borad" class="numericOnly validate[required] form-control" autocomplete="off"');
							echo form_error('st_pass_12_borad');
							?>
						</div>
					</div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <?php echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                        <input type="reset" value="Cancel" class="btn btn-default">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>	
    </div>
</div>

<script type="text/javascript">
var tp = $('#teaching_post').val();
var ntp = $('#nonteaching_post').val();
var total = parseInt(tp)+parseInt(ntp);
$('#total_post').val(total);
		
    <?php if(($school) && !empty($school)){ ?>
        $("#year_of_establish").val("<?php echo $school->year_of_establish;?>").trigger("change");
    <?php }?>
    
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