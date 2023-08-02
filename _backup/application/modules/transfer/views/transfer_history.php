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
<div id="content-wrapper">
    <div class="container-fluid">
	<!-- Breadcrumbs-->
	<ol class="breadcrumb">
	  <li class="breadcrumb-item">
		<a href="<?php echo base_url();?>dashboard">Dashboard</a>
	  </li>
	  <li class="breadcrumb-item active"><a href="<?php echo base_url();?>initiate-transfer">Transfer</a>  / Transfer History</li>
	</ol>

	<!-- DataTables Example -->
	<div class="card mb-3">
            <div class="card-header"><i class="fa fa-user"></i> Employee List</div>
            <?php if(isset($error_msg) && !empty($error_msg)){?>
                <div class="alert alert-danger"><strong>Error!</strong> <?php echo $error_msg;?>.</div>
                <?php } if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
                        </div>
                <?php } if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                        </div>
                <?php } ?>
            <div class="card-body">
                <?php
                //show($TF);
                ?>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NAME (EMP CODE)</th>
                <th>TRANSFER FROM PLACE</th>
                
                <th>TRANSFER FROM UNIT</th>
                <th>DESIG. FROM</th>
                <th>SUBJECT</th>
                <th>TRANSFER TO PLACE</th>
               
                <th>TRANSFER TO UNIT</th>
                <th>DESIG. TO</th>
                <th>SUBJECT</th>
                <th>STATUS</th>
				<th>Revert</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($TH as $T){ ?>
            <tr>
                <td><?php echo $T->EMP_TTL.''.$T->EMP_NAME.'('.$T->EMP_ID.')'; ?></td>
                <td>
                <?php  
                if($T->EMP_PRE_PLACE=='Kendriya Vidyalaya'){
                    echo $T->EMP_PRE_SCHOOL;  
                }else{
                    echo $T->EMP_PRE_PLACE.'/'.$T->TRA_KCODE;
					
                }
                ?>
                </td>
                <td><?php echo $T->EMP_PRE_UNIT; ?></td>
                <td><?php echo $T->EMP_PRE_DESIG ;?></td>
                <td><?php echo $T->EMP_PRE_SUB ;?></td>
                <td>
                    <?php if( $T->EMP_TRA_PLACE=='Kendriya Vidyalaya'){
                        echo $T->EMP_TRA_SCHOOL;
                    }else{
                        echo $T->EMP_TRA_PLACE;
                    } ?>
                </td>
             
                <td><?php echo $T->EMP_TRA_UNIT; ?></td>
                <td><?php echo $T->EMP_TRA_DESIG ;?></td>
                <td><?php echo $T->EMP_TRA_SUB ;?></td>
                <td><?php echo $T->EMP_TRA_STS ;?></td>
               <!-- <td><button  class="btn-revert" id="<?php //echo $T->EMP_ID;?>">Revert</button> -->
				<td><?php if($T->EMP_TRA_STS=='PENDING'){ ?>
				<input type="button" value="Revert" onclick="revertdata('<?php echo $T->EMP_ID;?>')"> <?php } ?></td>
				
            </tr>
            <?php } ?>
        </tbody>
    </table>
                </div>
            </div>
	</div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script type="text/javascript">
    function revertdata(element){
		//var id=element
		var get_csrf_token_name = $('#get_csrf_token_name').val();
		var get_csrf_hash = $('#get_csrf_hash').val();
	     // alert(element);
			if(confirm('Are you sure?')==true)
			{
				$.ajax({
					url:'<?php echo base_url('transferrevert'); ?>',
					method:"post",
					//dataType:"json",
					//data: get_csrf_token_name + '=' + get_csrf_hash + 'id=' + element,
					data: get_csrf_token_name + '=' + get_csrf_hash + '&id=' + element,
					success:function(response)
					{
                      alert('Revert data Successfully');
					 // window.location.reload();
					}
				})
			}
	}
</script>

    

