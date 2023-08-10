<?php //show($OD); ?>
<style>
    @font-face {
        font-family: 'text-security-disc';
        src:    url('../../fonts/text-security-disc.eot');
        src:    url('../../fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
                url('../../fonts/text-security-disc.woff') format('woff'),
                url('../../fonts/text-security-disc.ttf') format('truetype'),
                url('../../images/text-security-disc.svg#text-security') format('svg');
    }
    input.password {
        font-family: 'text-security-disc';
    }
</style>
<div id="content-wrapper">
    <div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header register-header">Observation Dashboard</div>
    </div>
	<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTableId" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?php $i=1;?>S.No.</th>
                            <th>Region Name</th>
                            <th>Assistant Commissioner</th>
                            <th>Principal</th>
                            <th>Vice Principal</th>
                            <th>Head Master</th>
                            <th>Deputy Commissioner</th>
                            <th>Total Observed</th>							
                        </tr>
                    </thead>
					
                    <tbody>
                    <?php $total = 0;foreach($dashboardData as $key=>$val){ ?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $key;?></td>
							<td><?php echo (isset($val['ac'])?$val['ac']:0 )?></td>
							<td><?php echo (isset($val['Principal'])?$val['Principal']:0 )?></td>
							<td><?php echo (isset($val['vp'])?$val['vp']:0 )?></td>
							<td><?php echo (isset($val['hm'])?$val['hm']:0 )?></td>
							<td><?php echo (isset($val['dc'])?$val['dc']:0 )?></td>
							<td><?php echo $val['total'] ;$total = $total+$val['total'];?></td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="7" style="text-align:right;"><strong>Total</strong></td>
							<td><?php echo $total;?></td>
						</tr>					
                    </tbody>
                    
                    </table>
                </div>
            </div>
</div>
</div>