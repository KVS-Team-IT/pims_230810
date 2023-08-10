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
<div id="content-wrapper">
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
        <div class="card-header text-center">UNIT WISE REGISTERED EMPLOYEE REPORT</div>
        <hr>
            <div class="table-responsive">
                <table id="AasitIN" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>SL.NO.</th>
                        <th>HQ/RO/ZIET NAME</th>
                        <th>HQ/RO/ZIET CODE</th>
                        <th>SANCTIONED POST(KVS APPROVAL)</th>
                        <th>EMPLOYEES IN-POSITION AS PER PIMS PORTAL</th>
                        <th>EMPLOYEES DATA VERIFIED AS PER PIMS PORTAL</th>
                        <th>EMPLOYEES DATA NOT VERIFIED AS PER PIMS PORTAL</th>
                        <th>VACANCIES REFLECTED ON PORTAL</th>
                        <th>WHETHER VACANCIES SHOWING ON PORTAL ARE CORRECT ? (YES / NO )</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $SNO=1; foreach($MAS AS $M){?>
                    <tr>
                        <td><?php echo $SNO; ?></td>
                        <td><?php echo $M['NAME']; ?></td>
                        <td><?php echo $M['CODE']; ?></td>
                        <td><?php echo $M['SAN']; ?></td>
                        <td><?php echo $M['POS']; ?></td>
                        <td><?php echo $M['VFY']; ?></td>
                        <td><?php echo $M['POS']-$M['VFY']; ?></td>
                        <td><?php echo $M['VAC']; ?></td>
                        <td></td>
                    </tr>
                    <?php $SNO++;} ?>
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

            "lengthMenu": [[50], [50]],
            "columnDefs": [
                                { "className": 'text-center', targets: [0,2,3,4,5,6,7] },
                                { "width": "12%", "targets": 1 }
                            ],
            "dom": 'lBfrtip',
            "buttons": [
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o"></i> Export In Excel',
                        titleAttr: 'EXCEL',
                        title: 'Consolidated Unit Report',
                        exportOptions: {
                        modifier: {
                            search: 'applied',
                            order: 'applied'
                        },columns: [1,2,3,4,5,6,7,8]
                    }
                },
            ],
        });
    });
</script>

    

