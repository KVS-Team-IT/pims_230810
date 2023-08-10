<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
    .buttons-excel{
       background-color: green;
       color: white;
       position: absolute;
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
 table.dataTable tbody td 
	    padding: 2px 10px;
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
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo base_url();?>consolidated-unit-report">Consolidated Post Report</a>
            </li>
	</ol>
        <div class="card mb-3">
        <div class="card-header text-center">CONSOLIDATED KVS APPROVED POST REPORT</div>
        <hr>
            <div class="table-responsive">
                <table id="AasitIN" class="table table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>SL.NO.</th>
                        <th>DESIGNATION</th>
                        <th>TYPE</th>
                        <th>SANCTIONED POST(KVS APPROVAL)</th>
                        <th>IN-POSITION POST</th>
                        <th>VACANCY</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $SNO=1; $SAN_POST=0;$IN_POST=0;$VAC_POST=0;
                    foreach($DES AS $D){ 
                        $SAN_POST=$SAN_POST+$D->SAN_POST;
                        $IN_POST =$IN_POST +$D->IN_POST;
                        $VAC_POST=$VAC_POST+($D->SAN_POST-$D->IN_POST);
                ?>
                    
                    <tr>
                        <td><?php echo $SNO; ?></td>
                        <td><?php echo $D->DESIG; ?></td>
                        <td><?php echo $D->TYPE; ?></td>
                        <td><?php echo $D->SAN_POST; ?></td>
                        <td><?php echo $D->IN_POST; ?></td>
                        <td><?php echo ($D->SAN_POST)-($D->IN_POST); ?></td>

                    </tr>
                    <?php $SNO++;} ?>
                    <tr style="font-weight: bold;background: #aaa; text-align:center;">
                        <td><?php echo $SNO; ?></td>
                        <td>Grand Total</td>
                        <td> -- </td>
                        <td><?php echo $SAN_POST; ?></td>
                        <td><?php echo $IN_POST; ?></td>
                        <td><?php echo $VAC_POST; ?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
	</div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#AasitIN').dataTable({

        "lengthMenu": [[60], [60]],
	    "bLengthChange" : false, //thought this line could hide the LengthMenu
        "dom": 'lBfrtip',
	    "columnDefs": [
                                { "className": 'text-center', targets: [0,2,3,4,5] },
                                { "width": "12%", "targets": 1 }
                          ],
            "buttons": [
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                        titleAttr: 'EXCEL',
                        title: 'ALL POST DETAILS',
                        exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },columns: [0,1,2,3,4,5]
                    }
                },
            ],
        });
    });
</script>

    

