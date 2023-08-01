<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
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
</style>
<div id="content-wrapper" style="min-height:900px;">
    <div class="container-fluid">
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url();?>consolidated-unit-report">Consolidated Report</a>
            </li>
	</ol>
        <div class="card mb-3">
        <div class="card-header text-center">Add Student</div>
        <hr>
            <div class="table-responsive">
			<?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>
                <table id="AasitIN" class="table table-striped table-bordered" style="width:100%">
                
                <tbody>
                    
                    <tr>                        
                        <td>
							First Name: 
						</td>
						<td>
							<input type="text" name="f_name" id="f_name" class="txtOnly validate[required] form-control" onblur="generateUsername();"/>
						</td>
						<td>
							Last Name: 
						</td>
						<td>
							<input type="text" name="l_name" id="l_name" class="txtOnly validate[required] form-control"/>
						</td>
						<td>
							Email: 
						</td>
						<td>
							<input type="email" name="email" id="email" class="validate[required,custom[email]] form-control"/>
						</td>
                    </tr>
                    <tr>
						<td>Admission Number</td>
						<td><input type="text" name="admission_no" id="admission_no" class="validate[required] form-control" onblur="generateUsername();" /></td>
						<td>Class</td>
						<td>
							<select name="class_id" class="validate[required] form-control">
								<option value="">--Select Class--</option>
								<?php foreach($classes as $key=>$val) {?>
								<option value="<?php echo $val->id;?>"><?php echo $val->name;?></option>
								<?php }?>
							</select>
						</td>
						<td>Username</td>
						<td>
							<input type='text' name="username" id="username" readonly class="form-control"/>
						</td>
					</tr>
                </tbody>
                </table>
				<div class="col-sm-12">
				<div style="float:right;"> 
					<input class="btn btn-primary" type="reset" value="Reset">
					<input type="submit" class="btn btn-primary" />
				</div>
        </div>
		
				<?php echo form_close(); ?>
            </div>
        </div>
	</div>
    </div>
</div>
<script>
function generateUsername(){
	if($('#f_name').val()!='' && $('#admission_no').val()!=''){
		$('#username').val($('#f_name').val().toLowerCase()+'_'+$('#admission_no').val().toLowerCase());
	}
}
</script>
