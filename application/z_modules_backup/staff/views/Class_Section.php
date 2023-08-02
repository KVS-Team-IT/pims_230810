<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Class & Staff Strength Proposal</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header"><i class="fa fa-university" aria-hidden="true"></i> Class, Section & Staff Strength Proposal</div>
            <?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
            <input type="hidden" name="id" value="<?php echo isset($school->id) ? $school->id : ''; ?>">
            <div class="card-body user_view">
                <div class="row">
                    <div class="col-md-2">
                        <label>Region <span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("reg_id", array("" => "Select Region") + masterregion_lists(), isset($school->regid) ? set_value('reg_id', $school->regid) : set_value('reg_id'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('reg_id');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>School Name:<span class="reqd">*</span></label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("name", isset($school->name) ? set_value('name', $school->name) : set_value('name'), 'class="txtOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('name');
                        ?>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-md-2">
                        <label>School Code:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Sector:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("sector", array("" => "Select Sector") + sector(), isset($school->sector) ? set_value('sector', $school->sector) : set_value('sector'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('sector');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Upto Class:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("upto_class", array("" => "Select Class") + upto_class(), isset($school->upto_class) ? set_value('upto_class', $school->upto_class) : set_value('upto_class'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('upto_class');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Year Of Opening:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("opening_year", array("" => "Select Year") + panel_years(), isset($school->opening_year) ? set_value('opening_year', $school->opening_year) : set_value('opening_year'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('opening_year');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Kv Building:</label>
                    </div>
                    <div class="col-md-1">
                        <label>Permanent:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building" class="form-control" required value="1" <?php echo ($school->building == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>Temporary:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="building" class="form-control"  value="2" <?php echo ($school->building == 2 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-2">
                        <label>Infrastructure Facilities Available:</label>
                    </div>
                    <div class="col-md-1">
                        <label>YES:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="infrastructure" class="form-control" required value="1" <?php echo ($school->infrastructure == 1 ? 'checked' : null); ?>>
                       
                    </div>
                    <div class="col-md-1">
                        <label>NO:</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" name="infrastructure" class="form-control" value="2" <?php echo ($school->infrastructure == 2 ? 'checked' : null); ?>>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of Sections As Per CCEA Approval:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Classes Approved By CCEA:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class=" validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of Classrooms Available:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No Of Teaching Post As Per CCEA Approval:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>No Of NonTeaching Post As Per CCEA Approval:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Total No Of Post As Per CCEA Approval:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                </div>
                
                <hr>
                <br>
                <div class="add_more_button" id="family_add_more_button_div" >
                    <a class="btn btn-primary" id="addmore" href="javascript:"> Add More</a>
                </div>
                
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <label>Clases:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_dropdown("sector", array("" => "Select Class") + upto_class(), isset($school->sector) ? set_value('sector', $school->sector) : set_value('sector'), 'class="validate[required] form-control" autocomplete="off"');
                        echo form_error('sector');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Enrollment As On:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <label>Expected Enrollment During:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>Section Sanctioned During Previous Year:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-2">
                        <label>Number Of Section Proposed By Principal:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
                        ?>
                    </div>
                    <div class="col-md-2">
                        <label>No Of Sections Recommended By DC:</label>
                    </div>
                    <div class="col-md-4">
                        <?php echo form_input("code", isset($school->code) ? set_value('code', $school->code) : set_value('code'), 'class="numericOnly validate[required] form-control" autocomplete="off"');
                        echo form_error('code');
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