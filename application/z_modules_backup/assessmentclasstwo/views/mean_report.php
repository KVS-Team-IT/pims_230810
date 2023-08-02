
     
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
vertical-align: middle;}
.col-form-label{font-family: 'Roboto', sans-serif;}
.table th, .table td { 
    border: 1px solid #dee2e6;
}
</style>
</head>
 
    <div id="content-wrapper">
        <div class="container-fluid">
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Generated Report</li>
	</ol>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Generating Report</h5>
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div>
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3">
     
				<?php // print_r($details); ?>           
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
          <div class="col-sm-3 text-right"><button id="pdf1" class="btn btn-danger float-left m-1" autocomplete="off"><i class="fas fa-print"></i> Download Reports</button>
          <button id="print1" class="btn btn-success float-left m-1" autocomplete="off" onclick="printData();"><i class="fas fa-print"></i> Print</button>  
      </div>

            <div class="card-body" style="padding: 0px!important;" id="Personal_PDF">              	
            	<div class="table-responsive">                      
						<table class="table">
					    <thead>
					    	<th colspan="3" style="background: #999999 !important;">1. Assessment of Entry Level Abilities of Students of Class-1</th>
					      <tr>
					        <th style="width: 241px;">Particular</th>
					        <th>No.</th>  
					        <th>(%)</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<th>Boys</th>
					    		<td><?php echo $firstSec->MALE;?></td>
					    		<td><?php echo number_format($firstSec->MALE*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>Girls</th>
					    		<td><?php echo $firstSec->FEMALE;?></td>
					    		<td><?php echo number_format($firstSec->FEMALE*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>Total No. of students assessed :</th>
					    		<td><?php echo $firstSec->Total;?></td>
					    		<td></td>
					    	</tr>
					    </tbody>
					</table>
				</div>
				<div class="table-responsive">                      
						<table class="table">
					    <thead>
					    	<th colspan="3" style="background: #999999 !important;">2. Classification of students</th>
					      <tr>
					        <th style="width: 241px;">Category</th>
					        <th>No.</th>
					        <th>(%)</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<th>General</th>
					    		<td><?php echo $firstSec->General;?></td>
					    		<td><?php echo number_format($firstSec->General*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>OBC</th>
					    		<td><?php echo $firstSec->OBC;?></td>
					    		<td><?php echo number_format($firstSec->OBC*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>SC</th>
					    		<td><?php echo $firstSec->SC;?></td>
					    		<td><?php echo number_format($firstSec->SC*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>ST</th>
					    		<td><?php echo $firstSec->ST;?></td>
					    		<td><?php echo number_format($firstSec->ST*100/$firstSec->Total); ?> %</td>
					    	</tr>
					    	<tr>
					    		<th>Total No. of students assessed :</th>
					    		<td><?php echo $firstSec->Total;?></td>
					    		<td></td>
					    	</tr>
					    </tbody>
					</table>
				</div>
 
                <div class="table-responsive">  
					<div class="row">
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of ORAL ABILITIES (ENGLISH).</th>
					      <tr>
					        <th style="width: 48%;">Oral Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryData->oral_eng1A; ?></td>
					    		<td><?php echo $EntryData->oral_eng1B; ?></td>
					    		<td><?php echo $EntryData->oral_eng1C; ?></td>
					    		<td><?php echo $EntryData->oral_eng1D; ?></td>
								<td> <?php  echo number_format(($EntryData->oral_eng1A  + $EntryData->oral_eng1B*2+ $EntryData->oral_eng1C*3 + $EntryData->oral_eng1D*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
						 </div>						 
					<div class="col-sm-6">
						<table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of ORAL ABILITIES (ENGLISH).</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalOral->oral_converseA+$FinalOral->oral_talksA+ $FinalOral->oral_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalOral->oral_converseB+$FinalOral->oral_talksB+ $FinalOral->oral_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalOral->oral_converseC+$FinalOral->oral_talksC+ $FinalOral->oral_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalOral->oral_converseD+$FinalOral->oral_talksD+ $FinalOral->oral_recitesD)/3,2); ?></td>
								<td> <?php  $oral_A= number_format(($FinalOral->oral_converseA  + $FinalOral->oral_converseB*2+ $FinalOral->oral_converseC*3 + $FinalOral->oral_converseD*4)/$FinalOral->Total,2); 
								$oral_B= number_format(($FinalOral->oral_talksA  + $FinalOral->oral_talksB*2+ $FinalOral->oral_talksC*3 + $FinalOral->oral_talksD*4)/$FinalOral->Total,2);
								$oral_C= number_format(($FinalOral->oral_recitesA  + $FinalOral->oral_recitesB*2+ $FinalOral->oral_recitesC*3 + $FinalOral->oral_recitesD*4)/$FinalOral->Total,2);
								echo number_format(($oral_A+$oral_B+$oral_C)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 
						
					</table>
					</div>
					</div>
						<div class="row">
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of READING ABILITIES (ENGLISH).</th>
					      <tr>
					        <th style="width: 48%;">Reading Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryData->read_eng1A; ?></td>
					    		<td><?php echo $EntryData->read_eng1B; ?></td>
					    		<td><?php echo $EntryData->read_eng1C; ?></td>
					    		<td><?php echo $EntryData->read_eng1D; ?></td>
								<td> <?php  echo number_format(($EntryData->read_eng1A  + $EntryData->read_eng1B*2+ $EntryData->read_eng1C*3 + $EntryData->read_eng1D*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div>
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of READING ABILITIES (ENGLISH).</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalReading->read_partA+$FinalReading->read_usesA+ $FinalReading->read_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalReading->read_partB+$FinalReading->read_usesB+ $FinalReading->read_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalReading->read_partC+$FinalReading->read_usesC+ $FinalReading->read_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalReading->read_partD+$FinalReading->read_usesD+ $FinalReading->read_tenceD)/3,2); ?></td>
								<td> <?php  $FinalR_A= number_format(($FinalReading->read_partA  + $FinalReading->read_partB*2+ $FinalReading->read_partC*3 + $FinalReading->read_partD*4)/$FinalReading->Total,2); 
								$FinalR_B= number_format(($FinalReading->read_usesA  + $FinalReading->read_usesB*2+ $FinalReading->read_usesC*3 + $FinalReading->read_usesD*4)/$FinalReading->Total,2);
								$FinalR_C= number_format(($FinalReading->read_tenceA  + $FinalReading->read_tenceB*2+ $FinalReading->read_tenceC*3 + $FinalReading->read_tenceD*4)/$FinalReading->Total,2);
								echo number_format(($FinalR_A+$FinalR_B+$FinalR_C)/3,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of WRITING ABILITIES (ENGLISH).</th>
					      <tr>
					        <th style="width: 48%;">WRITING Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryData->write_eng1A; ?></td>
					    		<td><?php echo $EntryData->write_eng1B; ?></td>
					    		<td><?php echo $EntryData->write_eng1C; ?></td>
					    		<td><?php echo $EntryData->write_eng1D; ?></td>
								<td> <?php  echo number_format(($EntryData->write_eng1A  + $EntryData->write_eng1B*2+ $EntryData->write_eng1C*3 + $EntryData->write_eng1D*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div>
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of WRITING ABILITIES (ENGLISH)</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalWriting->write_wordA+$FinalWriting->write_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalWriting->write_wordB+$FinalWriting->write_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalWriting->write_wordC+$FinalWriting->write_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalWriting->write_wordD+$FinalWriting->write_conveyD)/2,2); ?></td>
								<td> <?php  $write_word_T1= number_format(($FinalWriting->write_wordA  + $FinalWriting->write_wordB*2+ $FinalWriting->write_wordC*3 + $FinalWriting->write_wordD*4)/$FinalWriting->Total,2); 
								$write_convey_T2= number_format(($FinalWriting->write_conveyA  + $FinalWriting->write_conveyB*2+ $FinalWriting->write_conveyC*3 + $FinalWriting->write_conveyD*4)/$FinalWriting->Total,2);
								echo number_format(($write_word_T1+$write_convey_T2)/2,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
							</div> 
							</div>
							 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of NUMERACY ABILITIES.</th>
					      <tr>
					        <th style="width: 48%;">NUMERACY Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryData->numeric1A; ?></td>
					    		<td><?php echo $EntryData->numeric1B; ?></td>
					    		<td><?php echo $EntryData->numeric1C; ?></td>
					    		<td><?php echo $EntryData->numeric1D; ?></td>
								<td> <?php  echo number_format(($EntryData->numeric1A  + $EntryData->numeric1B*2+ $EntryData->numeric1C*3 + $EntryData->numeric1D*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of NUMERACY ABILITIES</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    	<td><?php echo number_format(($FinalNumeracy->num_countA+$FinalNumeracy->num_readA+ $FinalNumeracy->num_addA +$FinalNumeracy->num_obsrA+ $FinalNumeracy->num_unitA+ $FinalNumeracy->num_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNumeracy->num_countB+$FinalNumeracy->num_readB+ $FinalNumeracy->num_addB +$FinalNumeracy->num_obsrB+ $FinalNumeracy->num_unitB+ $FinalNumeracy->num_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNumeracy->num_countC+$FinalNumeracy->num_readC+ $FinalNumeracy->num_addC +$FinalNumeracy->num_obsrC+ $FinalNumeracy->num_unitC+ $FinalNumeracy->num_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNumeracy->num_countD+$FinalNumeracy->num_readD+ $FinalNumeracy->num_addD +$FinalNumeracy->num_obsrD+ $FinalNumeracy->num_unitD+ $FinalNumeracy->num_reciteD)/6,2); ?></td>
							<td> <?php  $NUM_A= number_format(($FinalNumeracy->num_countA  + $FinalNumeracy->num_countB*2+ $FinalNumeracy->num_countC*3 + $FinalNumeracy->num_countD*4)/$FinalNumeracy->Total,2); 
								$NUM_B= number_format(($FinalNumeracy->num_readA  + $FinalNumeracy->num_readB*2+ $FinalNumeracy->num_readC*3 + $FinalNumeracy->num_readD*4)/$FinalNumeracy->Total,2);
								$NUM_C= number_format(($FinalNumeracy->num_addA  + $FinalNumeracy->num_addB*2+ $FinalNumeracy->num_addC*3 + $FinalNumeracy->num_addD*4)/$FinalNumeracy->Total,2);
								$NUM_D= number_format(($FinalNumeracy->num_obsrA  + $FinalNumeracy->num_obsrB*2+ $FinalNumeracy->num_obsrC*3 + $FinalNumeracy->num_obsrD*4)/$FinalNumeracy->Total,2);
								$NUM_E= number_format(($FinalNumeracy->num_unitA  + $FinalNumeracy->num_unitB*2+ $FinalNumeracy->num_unitC*3 + $FinalNumeracy->num_unitD*4)/$FinalNumeracy->Total,2);
								$NUM_F= number_format(($FinalNumeracy->num_reciteA  + $FinalNumeracy->num_reciteB*2+ $FinalNumeracy->num_reciteC*3 + $FinalNumeracy->num_reciteD*4)/$FinalNumeracy->Total,2);
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>	
							</div> 						 
						</div> 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of ORAL ABILITIES (HINDI).</th>
					      <tr>
					        <th style="width: 48%;">ORAL Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryHindi->oral_hindiA; ?></td>
					    		<td><?php echo $EntryHindi->oral_hindiB; ?></td>
					    		<td><?php echo $EntryHindi->oral_hindiC; ?></td>
					    		<td><?php echo $EntryHindi->oral_hindiD; ?></td>
								<td> <?php  echo number_format(($EntryHindi->oral_hindiA  + $EntryHindi->oral_hindiB*2+ $EntryHindi->oral_hindiC*3 + $EntryHindi->oral_hindiD*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of ORAL ABILITIES (HINDI)</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalHindi->oral_frndhA+$FinalHindi->oral_conveyhA+ $FinalHindi->oral_storyhA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->oral_frndhB+$FinalHindi->oral_conveyhB+ $FinalHindi->oral_storyhB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->oral_frndhC+$FinalHindi->oral_conveyhC+ $FinalHindi->oral_storyhC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->oral_frndhD+$FinalHindi->oral_conveyhs+ $FinalHindi->oral_storyhD)/3,2); ?></td>	
								<td> <?php  $FinalR_A= number_format(($FinalHindi->oral_frndhA  + $FinalHindi->oral_frndhB*2+ $FinalHindi->oral_frndhC*3 + $FinalHindi->oral_frndhD*4)/$FinalHindi->Total,2); 
								$FinalR_B= number_format(($FinalHindi->oral_conveyhA  + $FinalHindi->oral_conveyhB*2+ $FinalHindi->oral_conveyhC*3 + $FinalHindi->oral_conveyhs*4)/$FinalHindi->Total,2);
								$FinalR_C= number_format(($FinalHindi->oral_storyhA  + $FinalHindi->oral_storyhB*2+ $FinalHindi->oral_storyhC*3 + $FinalHindi->oral_storyhD*4)/$FinalHindi->Total,2);
								echo number_format(($FinalR_A+$FinalR_B+$FinalR_C)/3,2); 
									?></td>								
					    	</tr>
						 </tbody> 
						 </table>
						 </div>
						 </div>
						  <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of READING ABILITIES (HINDI).</th>
					      <tr>
					        <th style="width: 48%;">READING Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryHindi->read_hindiA; ?></td>
					    		<td><?php echo $EntryHindi->read_hindiB; ?></td>
					    		<td><?php echo $EntryHindi->read_hindiC; ?></td>
					    		<td><?php echo $EntryHindi->read_hindiD; ?></td>
								<td> <?php  echo number_format(($EntryHindi->read_hindiA  + $EntryHindi->read_hindiB*2+ $EntryHindi->read_hindiC*3 + $EntryHindi->read_hindiD*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of READING ABILITIES (HINDI)</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalHindi->read_storyhA+$FinalHindi->read_soundhA+ $FinalHindi->read_wordhA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->read_storyhB+$FinalHindi->read_soundhB+ $FinalHindi->read_wordhB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->read_storyhC+$FinalHindi->read_soundhC+ $FinalHindi->read_wordhC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->read_storyhD+$FinalHindi->read_soundhD+ $FinalHindi->read_wordhD)/3,2); ?></td>
								<td> <?php  $FinalWH_A= number_format(($FinalHindi->read_storyhA  + $FinalHindi->read_storyhB*2+ $FinalHindi->read_storyhC*3 + $FinalHindi->read_storyhD*4)/$FinalHindi->Total,2); 
								$FinalWH_B= number_format(($FinalHindi->read_soundhA  + $FinalHindi->read_soundhB*2+ $FinalHindi->read_soundhC*3 + $FinalHindi->read_soundhD*4)/$FinalHindi->Total,2);
								$FinalWH_C= number_format(($FinalHindi->read_wordhA  + $FinalHindi->read_wordhB*2+ $FinalHindi->read_wordhC*3 + $FinalHindi->read_wordhD*4)/$FinalHindi->Total,2);
								echo number_format(($FinalWH_A+$FinalWH_B+$FinalWH_C)/3,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>	
						 </div>
						 </div>
						  <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of WRITING ABILITIES (HINDI).</th>
					      <tr>
					        <th style="width: 48%;">WRITING Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryHindi->write_hindiA; ?></td>
					    		<td><?php echo $EntryHindi->write_hindiB; ?></td>
					    		<td><?php echo $EntryHindi->write_hindiC; ?></td>
					    		<td><?php echo $EntryHindi->write_hindiD; ?></td>
								<td> <?php  echo number_format(($EntryHindi->write_hindiA  + $EntryHindi->write_hindiB*2+ $EntryHindi->write_hindiC*3 + $EntryHindi->write_hindiD*4)/$FinalOral->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead> 
					      <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of WRITING ABILITIES (HINDI)</th>
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalHindi->writing_hindihA+$FinalHindi->hindi_drawinghA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->writing_hindihB+$FinalHindi->hindi_drawinghB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->writing_hindihC+$FinalHindi->hindi_drawinghC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalHindi->writing_hindihD+$FinalHindi->hindi_drawinghD)/2,2); ?></td>
								<td> <?php  $writing_hindih_T1= number_format(($FinalHindi->writing_hindihA  + $FinalHindi->writing_hindihB*2+ $FinalHindi->writing_hindihC*3 + $FinalHindi->writing_hindihD*4)/$FinalHindi->Total,2); 
								$hindi_drawingh_T2= number_format(($FinalHindi->hindi_drawinghA  + $FinalHindi->hindi_drawinghB*2+ $FinalHindi->hindi_drawinghC*3 + $FinalHindi->hindi_drawinghD*4)/$FinalHindi->Total,2);
								echo number_format(($writing_hindih_T1+$hindi_drawingh_T2)/2,2); 
									?></td>								
					    	</tr>
					    	 
						 </tbody>
						 </table>
						 </div>
						 </div>
						  
						  <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead> 
				<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of WITH Pre Schooling.</th>
					      <tr>
					        <th style="width: 48%;">ORAL Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataPre->oral_PreA; ?></td>
					    		<td><?php echo $EntryDataPre->oral_PreB; ?></td>
					    		<td><?php echo $EntryDataPre->oral_PreC; ?></td>
					    		<td><?php echo $EntryDataPre->oral_PreD; ?></td>
								<td> <?php  echo number_format(($EntryDataPre->oral_PreA  + $EntryDataPre->oral_PreB*2+ $EntryDataPre->oral_PreC*3 + $EntryDataPre->oral_PreD*4)/$EntryDataPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of students WITH Pre Schooling</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalPreSchl->oralpre_converseA+$FinalPreSchl->oralpre_talksA+ $FinalPreSchl->oralpre_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->oralpre_converseB+$FinalPreSchl->oralpre_talksB+ $FinalPreSchl->oralpre_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->oralpre_converseC+$FinalPreSchl->oralpre_talksC+ $FinalPreSchl->oralpre_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->oralpre_converseD+$FinalPreSchl->oralpre_talksD+ $FinalPreSchl->oralpre_recitesD)/3,2); ?></td>
								<td> <?php  $FinalPre_A= number_format(($FinalPreSchl->oralpre_converseA  + $FinalPreSchl->oralpre_converseB*2+ $FinalPreSchl->oralpre_converseC*3 + $FinalPreSchl->oralpre_converseD*4)/$FinalPreSchl->Total,2); 
								$FinalPre_B= number_format(($FinalPreSchl->oralpre_talksA  + $FinalPreSchl->oralpre_talksB*2+ $FinalPreSchl->oralpre_talksC*3 + $FinalPreSchl->oralpre_talksD*4)/$FinalPreSchl->Total,2);
								$FinalPre_C= number_format(($FinalPreSchl->oralpre_recitesA  + $FinalPreSchl->oralpre_recitesB*2+ $FinalPreSchl->oralpre_recitesC*3 + $FinalPreSchl->oralpre_recitesD*4)/$FinalPreSchl->Total,2);
								echo number_format(($FinalPre_A+$FinalPre_B+$FinalPre_C)/3,2); 
									?></td>								
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Reading Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataPre->read_PreA; ?></td>
					    		<td><?php echo $EntryDataPre->read_PreB; ?></td>
					    		<td><?php echo $EntryDataPre->read_PreC; ?></td>
					    		<td><?php echo $EntryDataPre->read_PreD; ?></td>
								<td> <?php  echo number_format(($EntryDataPre->read_PreA  + $EntryDataPre->read_PreB*2+ $EntryDataPre->read_PreC*3 + $EntryDataPre->read_PreD*4)/$EntryDataPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalPreSchl->readpre_partA+$FinalPreSchl->readpre_usesA+ $FinalPreSchl->readpre_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->readpre_partB+$FinalPreSchl->readpre_usesB+ $FinalPreSchl->readpre_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->readpre_partC+$FinalPreSchl->readpre_usesC+ $FinalPreSchl->readpre_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->readpre_partD+$FinalPreSchl->readpre_usesD+ $FinalPreSchl->readpre_tenceD)/3,2); ?></td>
								<td> <?php  $FinalPreR_A= number_format(($FinalPreSchl->readpre_partA  + $FinalPreSchl->readpre_partB*2+ $FinalPreSchl->readpre_partC*3 + $FinalPreSchl->readpre_partD*4)/$FinalPreSchl->Total,2); 
								$FinalPreR_B= number_format(($FinalPreSchl->readpre_usesA  + $FinalPreSchl->readpre_usesB*2+ $FinalPreSchl->readpre_usesC*3 + $FinalPreSchl->readpre_usesD*4)/$FinalPreSchl->Total,2);
								$FinalPreR_C= number_format(($FinalPreSchl->readpre_tenceA  + $FinalPreSchl->readpre_tenceB*2+ $FinalPreSchl->readpre_tenceC*3 + $FinalPreSchl->readpre_tenceD*4)/$FinalPreSchl->Total,2);
								echo number_format(($FinalPreR_A+$FinalPreR_B+$FinalPreR_C)/3,2); 
									?></td>								
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataPre->write_PreA; ?></td>
					    		<td><?php echo $EntryDataPre->write_PreB; ?></td>
					    		<td><?php echo $EntryDataPre->write_PreC; ?></td>
					    		<td><?php echo $EntryDataPre->write_PreD; ?></td>
								<td> <?php  echo number_format(($EntryDataPre->write_PreA  + $EntryDataPre->write_PreB*2+ $EntryDataPre->write_PreC*3 + $EntryDataPre->write_PreD*4)/$EntryDataPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalPreSchl->writepre_wordA+$FinalPreSchl->writepre_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->writepre_wordB+$FinalPreSchl->writepre_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->writepre_wordC+$FinalPreSchl->writepre_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreSchl->writepre_wordD+$FinalPreSchl->writepre_conveyD)/2,2); ?></td>
								<td> <?php  $writepre_word_r1= number_format(($FinalPreSchl->writepre_wordA  + $FinalPreSchl->writepre_wordB*2+ $FinalPreSchl->writepre_wordC*3 + $FinalPreSchl->writepre_wordD*4)/$FinalPreSchl->Total,2); 
								$writepre_convey_r2= number_format(($FinalPreSchl->writepre_conveyA  + $FinalPreSchl->writepre_conveyB*2+ $FinalPreSchl->writepre_conveyC*3 + $FinalPreSchl->writepre_conveyD*4)/$FinalPreSchl->Total,2);
								echo number_format(($writepre_word_r1+$writepre_convey_r2)/2,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataPre->numeric_preA; ?></td>
					    		<td><?php echo $EntryDataPre->numeric_preB; ?></td>
					    		<td><?php echo $EntryDataPre->numeric_preC; ?></td>
					    		<td><?php echo $EntryDataPre->numeric_preD; ?></td>
								<td> <?php  echo number_format(($EntryDataPre->numeric_preA  + $EntryDataPre->numeric_preB*2+ $EntryDataPre->numeric_preC*3 + $EntryDataPre->numeric_preD*4)/$EntryDataPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    <tr>
					    	<td><?php echo number_format(($FinalPreNumSchl->pre_countA+$FinalPreNumSchl->pre_readA+ $FinalPreNumSchl->pre_addA +$FinalPreNumSchl->pre_obsrA+ $FinalPreNumSchl->pre_unitA+ $FinalPreNumSchl->pre_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalPreNumSchl->pre_countB+$FinalPreNumSchl->pre_readB+ $FinalPreNumSchl->pre_addB +$FinalPreNumSchl->pre_obsrB+ $FinalPreNumSchl->pre_unitB+ $FinalPreNumSchl->pre_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalPreNumSchl->pre_countC+$FinalPreNumSchl->pre_readC+ $FinalPreNumSchl->pre_addC +$FinalPreNumSchl->pre_obsrC+ $FinalPreNumSchl->pre_unitC+ $FinalPreNumSchl->pre_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalPreNumSchl->pre_countD+$FinalPreNumSchl->pre_readD+ $FinalPreNumSchl->pre_addD +$FinalPreNumSchl->pre_obsrD+ $FinalPreNumSchl->pre_unitD+ $FinalPreNumSchl->pre_reciteD)/6,2); ?></td>
							<td> <?php  $pre_A= number_format(($FinalPreNumSchl->pre_countA  + $FinalPreNumSchl->pre_countB*2+ $FinalPreNumSchl->pre_countC*3 + $FinalPreNumSchl->pre_countD*4)/$FinalPreNumSchl->Total,2); 
								$pre_B= number_format(($FinalPreNumSchl->pre_readA  + $FinalPreNumSchl->pre_readB*2+ $FinalPreNumSchl->pre_readC*3 + $FinalPreNumSchl->pre_readD*4)/$FinalPreNumSchl->Total,2);
								$pre_C= number_format(($FinalPreNumSchl->pre_addA  + $FinalPreNumSchl->pre_addB*2+ $FinalPreNumSchl->pre_addC*3 + $FinalPreNumSchl->pre_addD*4)/$FinalPreNumSchl->Total,2);
								$pre_D= number_format(($FinalPreNumSchl->pre_obsrA  + $FinalPreNumSchl->pre_obsrB*2+ $FinalPreNumSchl->pre_obsrC*3 + $FinalPreNumSchl->pre_obsrD*4)/$FinalPreNumSchl->Total,2);
								$pre_E= number_format(($FinalPreNumSchl->pre_unitA  + $FinalPreNumSchl->pre_unitB*2+ $FinalPreNumSchl->pre_unitC*3 + $FinalPreNumSchl->pre_unitD*4)/$FinalPreNumSchl->Total,2);
								$pre_F= number_format(($FinalPreNumSchl->pre_reciteA  + $FinalPreNumSchl->pre_reciteB*2+ $FinalPreNumSchl->pre_reciteC*3 + $FinalPreNumSchl->pre_reciteD*4)/$FinalPreNumSchl->Total,2);
								echo number_format(($pre_A+$pre_B+$pre_C+$pre_D+$pre_E+$pre_F)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						  <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryPreHindi->oral_hindipreA; ?></td>
					    		<td><?php echo $EntryPreHindi->oral_hindipreB; ?></td>
					    		<td><?php echo $EntryPreHindi->oral_hindipreC; ?></td>
					    		<td><?php echo $EntryPreHindi->oral_hindipreD; ?></td>
								<td> <?php  echo number_format(($EntryPreHindi->oral_hindipreA  + $EntryPreHindi->oral_hindipreB*2+ $EntryPreHindi->oral_hindipreC*3 + $EntryPreHindi->oral_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						  <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalPreHindiSchl->oral_preA+$FinalPreHindiSchl->oral_conveypre_A+ $FinalPreHindiSchl->oral_storypre_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->oral_preB+$FinalPreHindiSchl->oral_conveypre_B+ $FinalPreHindiSchl->oral_storypre_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->oral_preC+$FinalPreHindiSchl->oral_conveypre_C+ $FinalPreHindiSchl->oral_storypre_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->oral_preD+$FinalPreHindiSchl->oral_conveypre_s+ $FinalPreHindiSchl->oral_storypre_D)/3,2); ?></td>
								<td> <?php  $FinalPreOH_A= number_format(($FinalPreHindiSchl->oral_preA  + $FinalPreHindiSchl->oral_preB*2+ $FinalPreHindiSchl->oral_preC*3 + $FinalPreHindiSchl->oral_preD*4)/$FinalPreHindiSchl->Total,2); 
								$FinalPreOH_B= number_format(($FinalPreHindiSchl->oral_conveypre_A  + $FinalPreHindiSchl->oral_conveypre_B*2+ $FinalPreHindiSchl->oral_conveypre_C*3 + $FinalPreHindiSchl->oral_conveypre_s*4)/$FinalPreHindiSchl->Total,2);
								$FinalPreOH_C= number_format(($FinalPreHindiSchl->oral_storypre_A  + $FinalPreHindiSchl->oral_storypre_B*2+ $FinalPreHindiSchl->oral_storypre_C*3 + $FinalPreHindiSchl->oral_storypre_D*4)/$FinalPreHindiSchl->Total,2); 
								echo number_format(($FinalPreOH_A+$FinalPreOH_B+$FinalPreOH_C)/3,2); 
									?></td>								
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryPreHindi->read_hindipreA; ?></td>
					    		<td><?php echo $EntryPreHindi->read_hindipreB; ?></td>
					    		<td><?php echo $EntryPreHindi->read_hindipreC; ?></td>
					    		<td><?php echo $EntryPreHindi->read_hindipreD; ?></td>
								<td> <?php  echo number_format(($EntryPreHindi->read_hindipreA  + $EntryPreHindi->read_hindipreB*2+ $EntryPreHindi->read_hindipreC*3 + $EntryPreHindi->read_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>   
						<tr> 
					    	<td><?php echo number_format(($FinalPreHindiSchl->read_storypre_A+$FinalPreHindiSchl->read_soundpre_A+ $FinalPreHindiSchl->read_wordpre_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->read_storypre_B+$FinalPreHindiSchl->read_soundpre_B+ $FinalPreHindiSchl->read_wordpre_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->read_storypre_C+$FinalPreHindiSchl->read_soundpre_C+ $FinalPreHindiSchl->read_wordpre_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->read_storypre_D+$FinalPreHindiSchl->read_soundpre_D+ $FinalPreHindiSchl->read_wordpre_D)/3,2); ?></td>
								<td> <?php  $FinalPreOR_A= number_format(($FinalPreHindiSchl->read_storypre_A  + $FinalPreHindiSchl->read_storypre_B*2+ $FinalPreHindiSchl->read_storypre_C*3 + $FinalPreHindiSchl->read_storypre_D*4)/$FinalPreHindiSchl->Total,2); 
								$FinalPreOR_B= number_format(($FinalPreHindiSchl->read_soundpre_A  + $FinalPreHindiSchl->read_soundpre_B*2+ $FinalPreHindiSchl->read_soundpre_C*3 + $FinalPreHindiSchl->read_soundpre_D*4)/$FinalPreHindiSchl->Total,2);
								$FinalPreOR_C= number_format(($FinalPreHindiSchl->read_wordpre_A  + $FinalPreHindiSchl->read_wordpre_B*2+ $FinalPreHindiSchl->read_wordpre_C*3 + $FinalPreHindiSchl->read_wordpre_D*4)/$FinalPreHindiSchl->Total,2);
								echo number_format(($FinalPreOR_A+$FinalPreOR_B+$FinalPreOR_C)/3,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>	
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">लेखन  भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryPreHindi->write_hindipreA; ?></td>
					    		<td><?php echo $EntryPreHindi->write_hindipreB; ?></td>
					    		<td><?php echo $EntryPreHindi->write_hindipreC; ?></td>
					    		<td><?php echo $EntryPreHindi->write_hindipreD; ?></td>
								<td> <?php  echo number_format(($EntryPreHindi->write_hindipreA  + $EntryPreHindi->write_hindipreB*2+ $EntryPreHindi->write_hindipreC*3 + $EntryPreHindi->write_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalPreHindiSchl->writing_hindipre_A+$FinalPreHindiSchl->hindi_drawingpre_A)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->writing_hindipre_B+$FinalPreHindiSchl->hindi_drawingpre_B)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->writing_hindipre_C+$FinalPreHindiSchl->hindi_drawingpre_C)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalPreHindiSchl->writing_hindipre_D+$FinalPreHindiSchl->hindi_drawingpre_D)/2,2); ?></td>
								<td> <?php  $writing_hindipreH_r1= number_format(($FinalPreHindiSchl->writing_hindipre_A  + $FinalPreHindiSchl->writing_hindipre_B*2+ $FinalPreHindiSchl->writing_hindipre_C*3 + $FinalPreHindiSchl->writing_hindipre_D*4)/$FinalPreHindiSchl->Total,2); 
								
								$hindi_drawingpreH_r2= number_format(($FinalPreHindiSchl->hindi_drawingpre_A  + $FinalPreHindiSchl->hindi_drawingpre_B*2+ $FinalPreHindiSchl->hindi_drawingpre_C*3 + $FinalPreHindiSchl->hindi_drawingpre_D*4)/$FinalPreHindiSchl->Total,2); 
								echo number_format(($writing_hindipreH_r1+$hindi_drawingpreH_r2)/2,2); 
									?></td>								
					    	</tr>
					    	 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
						<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of WITH No Pre Schooling.</th>
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoPre->oral_NoPreA; ?></td>
					    		<td><?php echo $EntryDataNoPre->oral_NoPreB; ?></td>
					    		<td><?php echo $EntryDataNoPre->oral_NoPreC; ?></td>
					    		<td><?php echo $EntryDataNoPre->oral_NoPreD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoPre->oral_NoPreA  + $EntryDataNoPre->oral_NoPreB*2+ $EntryDataNoPre->oral_NoPreC*3 + $EntryDataNoPre->oral_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of students WITH NO Pre Schooling.</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonSchl->oralnon_converseA+$FinalNonSchl->oralnon_talksA+ $FinalNonSchl->oralnon_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->oralnon_converseB+$FinalNonSchl->oralnon_talksB+ $FinalNonSchl->oralnon_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->oralnon_converseC+$FinalNonSchl->oralnon_talksC+ $FinalNonSchl->oralnon_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->oralnon_converseD+$FinalNonSchl->oralnon_talksD+ $FinalNonSchl->oralnon_recitesD)/3,2); ?></td>
								<td> <?php  $oralor_A= number_format(($FinalNonSchl->oralnon_converseA  + $FinalNonSchl->oralnon_converseB*2+ $FinalNonSchl->oralnon_converseC*3 + $FinalNonSchl->oralnon_converseD*4)/$FinalNonSchl->Total,2); 
								$oralor_B= number_format(($FinalNonSchl->oralnon_talksA  + $FinalNonSchl->oralnon_talksB*2+ $FinalNonSchl->oralnon_talksC*3 + $FinalNonSchl->oralnon_talksD*4)/$FinalNonSchl->Total,2);
								$oralor_C= number_format(($FinalNonSchl->oralnon_recitesA  + $FinalNonSchl->oralnon_recitesB*2+ $FinalNonSchl->oralnon_recitesC*3 + $FinalNonSchl->oralnon_recitesD*4)/$FinalNonSchl->Total,2);
								echo ($oralor_A+$oralor_B+$oralor_C)/3; 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">Reading Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoPre->read_NoPreA; ?></td>
					    		<td><?php echo $EntryDataNoPre->read_NoPreB; ?></td>
					    		<td><?php echo $EntryDataNoPre->read_NoPreC; ?></td>
					    		<td><?php echo $EntryDataNoPre->read_NoPreD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoPre->read_NoPreA  + $EntryDataNoPre->read_NoPreB*2+ $EntryDataNoPre->read_NoPreC*3 + $EntryDataNoPre->read_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonSchl->readnon_partA+$FinalNonSchl->read_usesA+ $FinalNonSchl->readnon_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->readnon_partB+$FinalNonSchl->read_usesB+ $FinalNonSchl->readnon_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->readnon_partC+$FinalNonSchl->read_usesC+ $FinalNonSchl->readnon_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->readnon_partD+$FinalNonSchl->read_usesD+ $FinalNonSchl->readnon_tenceD)/3,2); ?></td>
								<td> <?php  $oralrr_A= number_format(($FinalNonSchl->readnon_partA  + $FinalNonSchl->readnon_partB*2+ $FinalNonSchl->readnon_partC*3 + $FinalNonSchl->readnon_partD*4)/$FinalNonSchl->Total,2); 
								$oralrr_B= number_format(($FinalNonSchl->read_usesA  + $FinalNonSchl->read_usesB*2+ $FinalNonSchl->read_usesC*3 + $FinalNonSchl->read_usesD*4)/$FinalNonSchl->Total,2);
								$oralrr_C= number_format(($FinalNonSchl->readnon_tenceA  + $FinalNonSchl->readnon_tenceB*2+ $FinalNonSchl->readnon_tenceC*3 + $FinalNonSchl->readnon_tenceD*4)/$FinalNonSchl->Total,2);
								echo number_format(($oralrr_A+$oralrr_B+$oralrr_C)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">Writing Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoPre->write_NoPreA; ?></td>
					    		<td><?php echo $EntryDataNoPre->write_NoPreB; ?></td>
					    		<td><?php echo $EntryDataNoPre->write_NoPreC; ?></td>
					    		<td><?php echo $EntryDataNoPre->write_NoPreD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoPre->write_NoPreA  + $EntryDataNoPre->write_NoPreB*2+ $EntryDataNoPre->write_NoPreC*3 + $EntryDataNoPre->write_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonSchl->writenon_wordA+$FinalNonSchl->writenon_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->writenon_wordB+$FinalNonSchl->writenon_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->writenon_wordC+$FinalNonSchl->writenon_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonSchl->writenon_wordD+$FinalNonSchl->writenon_conveyD)/2,2); ?></td>
								<td> <?php  $writenon_wordwr1= number_format(($FinalNonSchl->writenon_wordA  + $FinalNonSchl->writenon_wordB*2+ $FinalNonSchl->writenon_wordC*3 + $FinalNonSchl->writenon_wordD*4)/$FinalNonSchl->Total,2); 
								$hindi_drawingpreH_wr2= number_format(($FinalNonSchl->writenon_conveyA  + $FinalNonSchl->writenon_conveyB*2+ $FinalNonSchl->writenon_conveyC*3 + $FinalNonSchl->writenon_conveyD*4)/$FinalNonSchl->Total,2);
								echo number_format(($writenon_wordwr1+$hindi_drawingpreH_wr2)/2,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">Numeracy Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoPre->numeric_NoPreA; ?></td>
					    		<td><?php echo $EntryDataNoPre->numeric_NoPreB; ?></td>
					    		<td><?php echo $EntryDataNoPre->numeric_NoPreC; ?></td>
					    		<td><?php echo $EntryDataNoPre->numeric_NoPreD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoPre->numeric_NoPreA  + $EntryDataNoPre->numeric_NoPreB*2+ $EntryDataNoPre->numeric_NoPreC*3 + $EntryDataNoPre->numeric_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    	<td><?php echo number_format(($FinalNonNumSchl->noncountA+$FinalNonNumSchl->nonreadA+ $FinalNonNumSchl->nonaddA +$FinalNonNumSchl->nonobsrA+ $FinalNonNumSchl->nonunitA+ $FinalNonNumSchl->nonreciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonNumSchl->noncountB+$FinalNonNumSchl->nonreadB+ $FinalNonNumSchl->nonaddB +$FinalNonNumSchl->nonobsrB+ $FinalNonNumSchl->nonunitB+ $FinalNonNumSchl->nonreciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonNumSchl->noncountC+$FinalNonNumSchl->nonreadC+ $FinalNonNumSchl->nonaddC +$FinalNonNumSchl->nonobsrC+ $FinalNonNumSchl->nonunitC+ $FinalNonNumSchl->nonreciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonNumSchl->noncountD+$FinalNonNumSchl->nonreadD+ $FinalNonNumSchl->nonaddD +$FinalNonNumSchl->nonobsrD+ $FinalNonNumSchl->nonunitD+ $FinalNonNumSchl->nonreciteD)/6,2); ?></td>
							<td> <?php  $NUM_A= number_format(($FinalNonNumSchl->noncountA  + $FinalNonNumSchl->noncountB*2+ $FinalNonNumSchl->noncountC*3 + $FinalNonNumSchl->noncountD*4)/$FinalNonNumSchl->Total,2); 
								$NUM_B= number_format(($FinalNonNumSchl->nonreadA  + $FinalNonNumSchl->nonreadB*2+ $FinalNonNumSchl->nonreadC*3 + $FinalNonNumSchl->nonreadD*4)/$FinalNonNumSchl->Total,2);
								$NUM_C= number_format(($FinalNonNumSchl->nonaddA  + $FinalNonNumSchl->nonaddB*2+ $FinalNonNumSchl->nonaddC*3 + $FinalNonNumSchl->nonaddD*4)/$FinalNonNumSchl->Total,2);
								$NUM_D= number_format(($FinalNonNumSchl->nonobsrA  + $FinalNonNumSchl->nonobsrB*2+ $FinalNonNumSchl->nonobsrC*3 + $FinalNonNumSchl->nonobsrD*4)/$FinalNonNumSchl->Total,2);
								$NUM_E= number_format(($FinalNonNumSchl->nonunitA  + $FinalNonNumSchl->nonunitB*2+ $FinalNonNumSchl->nonunitC*3 + $FinalNonNumSchl->nonunitD*4)/$FinalNonNumSchl->Total,2);
								$NUM_F= number_format(($FinalNonNumSchl->nonreciteA  + $FinalNonNumSchl->nonreciteB*2+ $FinalNonNumSchl->nonreciteC*3 + $FinalNonNumSchl->nonreciteD*4)/$FinalNonNumSchl->Total,2);
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoPreHindi->oral_hindinopreA; ?></td>
					    		<td><?php echo $EntryNoPreHindi->oral_hindinopreB; ?></td>
					    		<td><?php echo $EntryNoPreHindi->oral_hindinopreC; ?></td>
					    		<td><?php echo $EntryNoPreHindi->oral_hindinopreD; ?></td>
								<td> <?php  echo number_format(($EntryNoPreHindi->oral_hindinopreA  + $EntryNoPreHindi->oral_hindinopreB*2+ $EntryNoPreHindi->oral_hindinopreC*3 + $EntryNoPreHindi->oral_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonHindiSchl->oral_nonA+$FinalNonHindiSchl->oral_conveynonA+ $FinalNonHindiSchl->oral_storynonA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->oral_nonB+$FinalNonHindiSchl->oral_conveynonB+ $FinalNonHindiSchl->oral_storynonB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->oral_nonC+$FinalNonHindiSchl->oral_conveynonC+ $FinalNonHindiSchl->oral_storynonC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->oral_nonD+$FinalNonHindiSchl->oral_conveynons+ $FinalNonHindiSchl->oral_storynonD)/3,2); ?></td>
								<td> <?php  $oral_non1= number_format(($FinalNonHindiSchl->oral_nonA  + $FinalNonHindiSchl->oral_nonB*2+ $FinalNonHindiSchl->oral_nonC*3 + $FinalNonHindiSchl->oral_nonD*4)/$FinalNonHindiSchl->Total,2); 
								$oral_conveynon2= number_format(($FinalNonHindiSchl->oral_conveynonA  + $FinalNonHindiSchl->oral_conveynonB*2+ $FinalNonHindiSchl->oral_conveynonC*3 + $FinalNonHindiSchl->oral_conveynons*4)/$FinalNonHindiSchl->Total,2);
								$oral_storynon3= number_format(($FinalNonHindiSchl->oral_storynonA  + $FinalNonHindiSchl->oral_storynonB*2+ $FinalNonHindiSchl->oral_storynonC*3 + $FinalNonHindiSchl->oral_storynonD*4)/$FinalNonHindiSchl->Total,2);
								//echo $oral_non1.'-'.$oral_conveynon2.'-'.$oral_storynon3;
								echo number_format(($oral_non1+$oral_conveynon2+$oral_storynon3)/3,2); 
									?></td>								
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoPreHindi->read_hindinopreA; ?></td>
					    		<td><?php echo $EntryNoPreHindi->read_hindinopreB; ?></td>
					    		<td><?php echo $EntryNoPreHindi->read_hindinopreC; ?></td>
					    		<td><?php echo $EntryNoPreHindi->read_hindinopreD; ?></td>
								<td> <?php  echo number_format(($EntryNoPreHindi->read_hindinopreA  + $EntryNoPreHindi->read_hindinopreB*2+ $EntryNoPreHindi->read_hindinopreC*3 + $EntryNoPreHindi->read_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonHindiSchl->read_storynonA+$FinalNonHindiSchl->read_soundnonA+ $FinalNonHindiSchl->read_wordnonA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->read_storynonB+$FinalNonHindiSchl->read_soundnonB+ $FinalNonHindiSchl->read_wordnonB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->read_storynonC+$FinalNonHindiSchl->read_soundnonC+ $FinalNonHindiSchl->read_wordnonC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->read_storynonD+$FinalNonHindiSchl->read_soundnonD+ $FinalNonHindiSchl->read_wordnonD)/3,2); ?></td>
								<td> <?php  $read_storynon1= number_format(($FinalNonHindiSchl->read_storynonA  + $FinalNonHindiSchl->read_storynonB*2+ $FinalNonHindiSchl->read_storynonC*3 + $FinalNonHindiSchl->read_storynonD*4)/$FinalNonHindiSchl->Total,2); 
								$read_soundnon2= number_format(($FinalNonHindiSchl->read_soundnonA  + $FinalNonHindiSchl->read_soundnonB*2+ $FinalNonHindiSchl->read_soundnonC*3 + $FinalNonHindiSchl->read_soundnonD*4)/$FinalNonHindiSchl->Total,2);
								$read_wordnon3= number_format(($FinalNonHindiSchl->read_wordnonA  + $FinalNonHindiSchl->read_wordnonB*2+ $FinalNonHindiSchl->read_wordnonC*3 + $FinalNonHindiSchl->read_wordnonD*4)/$FinalNonHindiSchl->Total,2);
								echo number_format(($read_storynon1+$read_soundnon2+$read_wordnon3)/3,2); 
									?></td>								
					    	</tr>  
						 </tbody>
						 </table>
							</div>
							</div>
							
							<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">लेखन भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoPreHindi->write_hindinopreA; ?></td>
					    		<td><?php echo $EntryNoPreHindi->write_hindinopreB; ?></td>
					    		<td><?php echo $EntryNoPreHindi->write_hindinopreC; ?></td>
					    		<td><?php echo $EntryNoPreHindi->write_hindinopreD; ?></td>
								<td> <?php  echo number_format(($EntryNoPreHindi->write_hindinopreA  + $EntryNoPreHindi->write_hindinopreB*2+ $EntryNoPreHindi->write_hindinopreC*3 + $EntryNoPreHindi->write_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonHindiSchl->writing_hindinonA+$FinalNonHindiSchl->hindi_drawingnonA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->writing_hindinonB+$FinalNonHindiSchl->hindi_drawingnonB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->writing_hindinonC+$FinalNonHindiSchl->hindi_drawingnonC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonHindiSchl->writing_hindinonD+$FinalNonHindiSchl->hindi_drawingnonD)/2,2); ?></td>
								<td> <?php  $writing_hindinon1= number_format(($FinalNonHindiSchl->writing_hindinonA  + $FinalNonHindiSchl->writing_hindinonB*2+ $FinalNonHindiSchl->writing_hindinonC*3 + $FinalNonHindiSchl->writing_hindinonD*4)/$FinalNonHindiSchl->Total,2); 
								$hindi_drawingnon2= number_format(($FinalNonHindiSchl->hindi_drawingnonA  + $FinalNonHindiSchl->hindi_drawingnonB*2+ $FinalNonHindiSchl->hindi_drawingnonC*3 + $FinalNonHindiSchl->hindi_drawingnonD*4)/$FinalNonHindiSchl->Total,2);
								echo number_format(($writing_hindinon1+$hindi_drawingnon2)/2,2); 
									?></td>								
					    	</tr> 
					    	 
						 </tbody>
						 </table>	
						</div>
						</div>
					
						 
							<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of WITH Educated Parents.</th>
						<tr>
					        <th style="width: 48%;">ORAL Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataEdu->oral_EduA; ?></td>
					    		<td><?php echo $EntryDataEdu->oral_EduB; ?></td>
					    		<td><?php echo $EntryDataEdu->oral_EduC; ?></td>
					    		<td><?php echo $EntryDataEdu->oral_EduD; ?></td>
								<td> <?php  echo number_format(($EntryDataEdu->oral_EduA  + $EntryDataEdu->oral_EduB*2+ $EntryDataEdu->oral_EduC*3 + $EntryDataEdu->oral_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of students WITH Educated Parents.</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalParentSchl->oralparent_converseA+$FinalParentSchl->oralparent_talksA+ $FinalParentSchl->oralparent_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->oralparent_converseB+$FinalParentSchl->oralparent_talksB+ $FinalParentSchl->oralparent_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->oralparent_converseC+$FinalParentSchl->oralparent_talksC+ $FinalParentSchl->oralparent_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->oralparent_converseD+$FinalParentSchl->oralparent_talksD+ $FinalParentSchl->oralparent_recitesD)/3,2); ?></td>
								<td> <?php  $oralorp_A= number_format(($FinalParentSchl->oralparent_converseA  + $FinalParentSchl->oralparent_converseB*2+ $FinalParentSchl->oralparent_converseC*3 + $FinalParentSchl->oralparent_converseD*4)/$FinalParentSchl->Total,2); 
								$oralorp_B= number_format(($FinalParentSchl->oralparent_talksA  + $FinalParentSchl->oralparent_talksB*2+ $FinalParentSchl->oralparent_talksC*3 + $FinalParentSchl->oralparent_talksD*4)/$FinalParentSchl->Total,2);
								$oralorp_C= number_format(($FinalParentSchl->oralparent_recitesA  + $FinalParentSchl->oralparent_recitesB*2+ $FinalParentSchl->oralparent_recitesC*3 + $FinalParentSchl->oralparent_recitesD*4)/$FinalParentSchl->Total,2);
								echo number_format(($oralorp_A+$oralorp_B+$oralorp_C)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
						<tr>
					        <th style="width: 48%;">Reading Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataEdu->read_EduA; ?></td>
					    		<td><?php echo $EntryDataEdu->read_EduB; ?></td>
					    		<td><?php echo $EntryDataEdu->read_EduC; ?></td>
					    		<td><?php echo $EntryDataEdu->read_EduD; ?></td>
								<td> <?php  echo number_format(($EntryDataEdu->read_EduA  + $EntryDataEdu->read_EduB*2+ $EntryDataEdu->read_EduC*3 + $EntryDataEdu->read_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalParentSchl->readparent_partA+$FinalParentSchl->readparent_usesA+ $FinalParentSchl->readparent_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->readparent_partB+$FinalParentSchl->readparent_usesB+ $FinalParentSchl->readparent_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->readparent_partC+$FinalParentSchl->readparent_usesC+ $FinalParentSchl->readparent_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->readparent_partD+$FinalParentSchl->readparent_usesD+ $FinalParentSchl->readparent_tenceD)/3,2); ?></td>
								<td> <?php  $oralrrp_A= number_format(($FinalParentSchl->readparent_partA  + $FinalParentSchl->readparent_partB*2+ $FinalParentSchl->readparent_partC*3 + $FinalParentSchl->readparent_partD*4)/$FinalParentSchl->Total,2); 
								$oralrrp_B= number_format(($FinalParentSchl->readparent_usesA  + $FinalParentSchl->readparent_usesB*2+ $FinalParentSchl->readparent_usesC*3 + $FinalParentSchl->readparent_usesD*4)/$FinalParentSchl->Total,2);
								$oralrrp_C= number_format(($FinalParentSchl->readparent_tenceA  + $FinalParentSchl->readparent_tenceB*2+ $FinalParentSchl->readparent_tenceC*3 + $FinalParentSchl->readparent_tenceD*4)/$FinalParentSchl->Total,2);
								echo number_format(($oralrrp_A+$oralrrp_B+$oralrrp_C)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
						</div>
						</div>
						
						<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>    <tr>
					        <th style="width: 48%;">Writing Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataEdu->write_EduA; ?></td>
					    		<td><?php echo $EntryDataEdu->write_EduB; ?></td>
					    		<td><?php echo $EntryDataEdu->write_EduC; ?></td>
					    		<td><?php echo $EntryDataEdu->write_EduD; ?></td>
								<td> <?php  echo number_format(($EntryDataEdu->write_EduA  + $EntryDataEdu->write_EduB*2+ $EntryDataEdu->write_EduC*3 + $EntryDataEdu->write_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr> 
					    	<td><?php echo number_format(($FinalParentSchl->writeparent_wordA+$FinalParentSchl->writeparent_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->writeparent_wordB+$FinalParentSchl->writeparent_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->writeparent_wordC+$FinalParentSchl->writeparent_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentSchl->writeparent_wordD+$FinalParentSchl->writeparent_conveyD)/2,2); ?></td>
								<td> <?php  $writeparent_wordr1= number_format(($FinalParentSchl->writeparent_wordA  + $FinalParentSchl->writeparent_wordB*2+ $FinalParentSchl->writeparent_wordC*3 + $FinalParentSchl->writeparent_wordD*4)/$FinalParentSchl->Total,2); 
								$writeparent_convey2= number_format(($FinalParentSchl->writeparent_conveyA  + $FinalParentSchl->writeparent_conveyB*2+ $FinalParentSchl->writeparent_conveyC*3 + $FinalParentSchl->writeparent_conveyD*4)/$FinalParentSchl->Total,2);
								echo number_format(($writeparent_wordr1+$writeparent_convey2)/2,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						</div>
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>    <tr>
					        <th style="width: 48%;">Numeracy Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataEdu->numeric_EduA; ?></td>
					    		<td><?php echo $EntryDataEdu->numeric_EduB; ?></td>
					    		<td><?php echo $EntryDataEdu->numeric_EduC; ?></td>
					    		<td><?php echo $EntryDataEdu->numeric_EduD; ?></td>
								<td> <?php  echo number_format(($EntryDataEdu->numeric_EduA  + $EntryDataEdu->numeric_EduB*2+ $EntryDataEdu->numeric_EduC*3 + $EntryDataEdu->numeric_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr> 	
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    	<td><?php echo number_format(($FinalParentNumSchl->parent_countA+$FinalParentNumSchl->parent_readA+ $FinalParentNumSchl->parent_addA +$FinalParentNumSchl->parent_obsrA+ $FinalParentNumSchl->parent_unitA+ $FinalParentNumSchl->parent_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalParentNumSchl->parent_countB+$FinalParentNumSchl->parent_readB+ $FinalParentNumSchl->parent_addB +$FinalParentNumSchl->parent_obsrB+ $FinalParentNumSchl->parent_unitB+ $FinalParentNumSchl->parent_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalParentNumSchl->parent_countC+$FinalParentNumSchl->parent_readC+ $FinalParentNumSchl->parent_addC +$FinalParentNumSchl->parent_obsrC+ $FinalParentNumSchl->parent_unitC+ $FinalParentNumSchl->parent_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalParentNumSchl->parent_countD+$FinalParentNumSchl->parent_readD+ $FinalParentNumSchl->parent_addD +$FinalParentNumSchl->parent_obsrD+ $FinalParentNumSchl->parent_unitD+ $FinalParentNumSchl->parent_reciteD)/6,2); ?></td>
							<td> <?php  $parent_count1= number_format(($FinalParentNumSchl->parent_countA  + $FinalParentNumSchl->parent_countB*2+ $FinalParentNumSchl->parent_countC*3 + $FinalParentNumSchl->parent_countD*4)/$FinalParentNumSchl->Total,2); 
								$parent_read1= number_format(($FinalParentNumSchl->parent_readA  + $FinalParentNumSchl->parent_readB*2+ $FinalParentNumSchl->parent_readC*3 + $FinalParentNumSchl->parent_readD*4)/$FinalParentNumSchl->Total,2);
								$parent_add3= number_format(($FinalParentNumSchl->parent_addA  + $FinalParentNumSchl->parent_addB*2+ $FinalParentNumSchl->parent_addC*3 + $FinalParentNumSchl->parent_addD*4)/$FinalParentNumSchl->Total,2);
								$parent_obsr4= number_format(($FinalParentNumSchl->parent_obsrA  + $FinalParentNumSchl->parent_obsrB*2+ $FinalParentNumSchl->parent_obsrC*3 + $FinalParentNumSchl->parent_obsrD*4)/$FinalParentNumSchl->Total,2);
								$parent_unit5= number_format(($FinalParentNumSchl->parent_unitA  + $FinalParentNumSchl->parent_unitB*2+ $FinalParentNumSchl->parent_unitC*3 + $FinalParentNumSchl->parent_unitD*4)/$FinalParentNumSchl->Total,2);
								$parent_recite6= number_format(($FinalParentNumSchl->parent_reciteA  + $FinalParentNumSchl->parent_reciteB*2+ $FinalParentNumSchl->parent_reciteC*3 + $FinalParentNumSchl->parent_reciteD*4)/$FinalParentNumSchl->Total,2);
								echo number_format(($parent_count1+$parent_read1+$parent_add3+$parent_obsr4+$parent_unit5+$parent_recite6)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>    <tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryEduHindi->oral_hindi_EduA; ?></td>
					    		<td><?php echo $EntryEduHindi->oral_hindi_EduB; ?></td>
					    		<td><?php echo $EntryEduHindi->oral_hindi_EduC; ?></td>
					    		<td><?php echo $EntryEduHindi->oral_hindi_EduD; ?></td>
								<td> <?php  echo number_format(($EntryEduHindi->oral_hindi_EduA  + $EntryEduHindi->oral_hindi_EduB*2+ $EntryEduHindi->oral_hindi_EduC*3 + $EntryEduHindi->oral_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						  <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalParentHindiSchl->oral_parent_A+$FinalParentHindiSchl->oral_conveyparent_A+ $FinalParentHindiSchl->oral_storyparent_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->oral_parent_B+$FinalParentHindiSchl->oral_conveyparent_B+ $FinalParentHindiSchl->oral_storyparent_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->oral_parent_C+$FinalParentHindiSchl->oral_conveyparent_C+ $FinalParentHindiSchl->oral_storyparent_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->oral_parent_D+$FinalParentHindiSchl->oral_conveyparent_s+ $FinalParentHindiSchl->oral_storyparent_D)/3,2); ?></td>
								<td> <?php  $oral_parent_1= number_format(($FinalParentHindiSchl->oral_parent_A  + $FinalParentHindiSchl->oral_parent_B*2+ $FinalParentHindiSchl->oral_parent_C*3 + $FinalParentHindiSchl->oral_parent_D*4)/$FinalParentHindiSchl->Total,2); 
								$oral_conveyparent_2= number_format(($FinalParentHindiSchl->oral_conveyparent_A  + $FinalParentHindiSchl->oral_conveyparent_B*2+ $FinalParentHindiSchl->oral_conveyparent_C*3 + $FinalParentHindiSchl->oral_conveyparent_s*4)/$FinalParentHindiSchl->Total,2);
								$oral_storyparent_3= number_format(($FinalParentHindiSchl->oral_storyparent_A  + $FinalParentHindiSchl->oral_storyparent_B*2+ $FinalParentHindiSchl->oral_storyparent_C*3 + $FinalParentHindiSchl->oral_storyparent_D*4)/$FinalParentHindiSchl->Total,2);
								echo number_format(($oral_parent_1+$oral_conveyparent_2+$oral_storyparent_3)/3,2); 
									?></td>								
					    	</tr>   
						 </tbody>
						 </table>
						 </div>
						</div>
						<div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>    <tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryEduHindi->read_hindi_EduA; ?></td>
					    		<td><?php echo $EntryEduHindi->read_hindi_EduB; ?></td>
					    		<td><?php echo $EntryEduHindi->read_hindi_EduC; ?></td>
					    		<td><?php echo $EntryEduHindi->read_hindi_EduD; ?></td>
								<td> <?php  echo number_format(($EntryEduHindi->read_hindi_EduA  + $EntryEduHindi->read_hindi_EduB*2+ $EntryEduHindi->read_hindi_EduC*3 + $EntryEduHindi->read_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalParentHindiSchl->read_storyparent_A+$FinalParentHindiSchl->read_soundparent_A+ $FinalParentHindiSchl->read_wordparent_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->read_storyparent_B+$FinalParentHindiSchl->read_soundparent_B+ $FinalParentHindiSchl->read_wordparent_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->read_storyparent_C+$FinalParentHindiSchl->read_soundparent_C+ $FinalParentHindiSchl->read_wordparent_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->read_storyparent_D+$FinalParentHindiSchl->read_soundparent_D+ $FinalParentHindiSchl->read_wordparent_D)/3,2); ?></td>
								<td> <?php  $read_storyparent_1= number_format(($FinalParentHindiSchl->read_storyparent_A  + $FinalParentHindiSchl->read_storyparent_B*2+ $FinalParentHindiSchl->read_storyparent_C*3 + $FinalParentHindiSchl->read_storyparent_D*4)/$FinalParentHindiSchl->Total,2); 
								$read_soundparent_2= number_format(($FinalParentHindiSchl->read_soundparent_A  + $FinalParentHindiSchl->read_soundparent_B*2+ $FinalParentHindiSchl->read_soundparent_C*3 + $FinalParentHindiSchl->read_soundparent_D*4)/$FinalParentHindiSchl->Total,2);
								$read_wordparent_3= number_format(($FinalParentHindiSchl->read_wordparent_A  + $FinalParentHindiSchl->read_wordparent_B*2+ $FinalParentHindiSchl->read_wordparent_C*3 + $FinalParentHindiSchl->read_wordparent_D*4)/$FinalParentHindiSchl->Total,2);
								echo number_format(($read_storyparent_1+$read_soundparent_2+$read_wordparent_3)/3,2); 
									?></td>								
					    	</tr>  
						 </tbody>
						 </table>	
						 </div>
						 </div>
						 <div class="row">
					<div class="col-sm-6">
					<table class="table">
					    <thead>    <tr>
					        <th style="width: 48%;">लेखन भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryEduHindi->write_hindi_EduA; ?></td>
					    		<td><?php echo $EntryEduHindi->write_hindi_EduB; ?></td>
					    		<td><?php echo $EntryEduHindi->write_hindi_EduC; ?></td>
					    		<td><?php echo $EntryEduHindi->write_hindi_EduD; ?></td>
								<td> <?php  echo number_format(($EntryEduHindi->write_hindi_EduA  + $EntryEduHindi->write_hindi_EduB*2+ $EntryEduHindi->write_hindi_EduC*3 + $EntryEduHindi->write_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalParentHindiSchl->writing_hindiparent_A+$FinalParentHindiSchl->hindi_drawingparent_A)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->writing_hindiparent_B+$FinalParentHindiSchl->hindi_drawingparent_B)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->writing_hindiparent_C+$FinalParentHindiSchl->hindi_drawingparent_C)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalParentHindiSchl->writing_hindiparent_D+$FinalParentHindiSchl->hindi_drawingparent_D)/2,2); ?></td>
								<td> <?php  $writing_hindiparent_1= number_format(($FinalParentHindiSchl->writing_hindiparent_A  + $FinalParentHindiSchl->writing_hindiparent_B*2+ $FinalParentHindiSchl->writing_hindiparent_C*3 + $FinalParentHindiSchl->writing_hindiparent_D*4)/$FinalParentHindiSchl->Total,2); 
								$hindi_drawingparent_2= number_format(($FinalParentHindiSchl->hindi_drawingparent_A  + $FinalParentHindiSchl->hindi_drawingparent_B*2+ $FinalParentHindiSchl->hindi_drawingparent_C*3 + $FinalParentHindiSchl->hindi_drawingparent_D*4)/$FinalParentHindiSchl->Total,2);
								echo number_format(($writing_hindiparent_1+$hindi_drawingparent_2)/2,2); 
									?></td>								
					    	</tr> 
					    	 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">
						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of students Who are First Generation Learners.</th>
						<tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoEdu->oral_NoEduA; ?></td>
					    		<td><?php echo $EntryDataNoEdu->oral_NoEduB; ?></td>
					    		<td><?php echo $EntryDataNoEdu->oral_NoEduC; ?></td>
					    		<td><?php echo $EntryDataNoEdu->oral_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoEdu->oral_NoEduA  + $EntryDataNoEdu->oral_NoEduB*2+ $EntryDataNoEdu->oral_NoEduC*3 + $EntryDataNoEdu->oral_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of students Who are First Generation Learners.</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduSchl->oralnonedu_converseA+$FinalNonEduSchl->oralnonedu_talksA+ $FinalNonEduSchl->oralnonedu_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->oralnonedu_converseB+$FinalNonEduSchl->oralnonedu_talksB+ $FinalNonEduSchl->oralnonedu_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->oralnonedu_converseC+$FinalNonEduSchl->oralnonedu_talksC+ $FinalNonEduSchl->oralnonedu_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->oralnonedu_converseD+$FinalNonEduSchl->oralnonedu_talksD+ $FinalNonEduSchl->oralnonedu_recitesD)/3,2); ?></td>
								<td> <?php  $oralnonedu_converse1= number_format(($FinalNonEduSchl->oralnonedu_converseA  + $FinalNonEduSchl->oralnonedu_converseB*2+ $FinalNonEduSchl->oralnonedu_converseC*3 + $FinalNonEduSchl->oralnonedu_converseD*4)/$FinalNonEduSchl->Total,2); 
								$oralnonedu_talks2= number_format(($FinalNonEduSchl->oralnonedu_talksA  + $FinalNonEduSchl->oralnonedu_talksB*2+ $FinalNonEduSchl->oralnonedu_talksC*3 + $FinalNonEduSchl->oralnonedu_talksD*4)/$FinalNonEduSchl->Total,2);
								$oralnonedu_recites3= number_format(($FinalNonEduSchl->oralnonedu_recitesA  + $FinalNonEduSchl->oralnonedu_recitesB*2+ $FinalNonEduSchl->oralnonedu_recitesC*3 + $FinalNonEduSchl->oralnonedu_recitesD*4)/$FinalNonEduSchl->Total,2);
								echo number_format(($oralnonedu_converse1+$oralnonedu_talks2+$oralnonedu_recites3)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					
					<div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">Reading Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoEdu->read_NoEduA; ?></td>
					    		<td><?php echo $EntryDataNoEdu->read_NoEduB; ?></td>
					    		<td><?php echo $EntryDataNoEdu->read_NoEduC; ?></td>
					    		<td><?php echo $EntryDataNoEdu->read_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoEdu->read_NoEduA  + $EntryDataNoEdu->read_NoEduB*2+ $EntryDataNoEdu->read_NoEduC*3 + $EntryDataNoEdu->read_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduSchl->readnonedu_partA+$FinalNonEduSchl->readnonedu_usesA+ $FinalNonEduSchl->readnonedu_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->readnonedu_partB+$FinalNonEduSchl->readnonedu_usesB+ $FinalNonEduSchl->readnonedu_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->readnonedu_partC+$FinalNonEduSchl->readnonedu_usesC+ $FinalNonEduSchl->readnonedu_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->readnonedu_partD+$FinalNonEduSchl->readnonedu_usesD+ $FinalNonEduSchl->readnonedu_tenceD)/3,2); ?></td>
								<td> <?php  $readnonedu_part1= number_format(($FinalNonEduSchl->readnonedu_partA  + $FinalNonEduSchl->readnonedu_partB*2+ $FinalNonEduSchl->readnonedu_partC*3 + $FinalNonEduSchl->readnonedu_partD*4)/$FinalNonEduSchl->Total,2); 
								$readnonedu_uses2= number_format(($FinalNonEduSchl->readnonedu_usesA  + $FinalNonEduSchl->readnonedu_usesB*2+ $FinalNonEduSchl->readnonedu_usesC*3 + $FinalNonEduSchl->readnonedu_usesD*4)/$FinalNonEduSchl->Total,2);
								$readnonedu_tence3= number_format(($FinalNonEduSchl->readnonedu_tenceA  + $FinalNonEduSchl->readnonedu_tenceB*2+ $FinalNonEduSchl->readnonedu_tenceC*3 + $FinalNonEduSchl->readnonedu_tenceD*4)/$FinalNonEduSchl->Total,2);
								echo number_format(($readnonedu_part1+$readnonedu_uses2+$readnonedu_tence3)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
						<div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">Writing Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoEdu->write_NoEduA; ?></td>
					    		<td><?php echo $EntryDataNoEdu->write_NoEduB; ?></td>
					    		<td><?php echo $EntryDataNoEdu->write_NoEduC; ?></td>
					    		<td><?php echo $EntryDataNoEdu->write_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoEdu->write_NoEduA  + $EntryDataNoEdu->write_NoEduB*2+ $EntryDataNoEdu->write_NoEduC*3 + $EntryDataNoEdu->write_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduSchl->writenonedu_wordA+$FinalNonEduSchl->writenonedu_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->writenonedu_wordB+$FinalNonEduSchl->writenonedu_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->writenonedu_wordC+$FinalNonEduSchl->writenonedu_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduSchl->writenonedu_wordD+$FinalNonEduSchl->writenonedu_conveyD)/2,2); ?></td>
								<td> <?php  $writenonedu_word1= number_format(($FinalNonEduSchl->writenonedu_wordA  + $FinalNonEduSchl->writenonedu_wordB*2+ $FinalNonEduSchl->writenonedu_wordC*3 + $FinalNonEduSchl->writenonedu_wordD*4)/$FinalNonEduSchl->Total,2); 
								$writenonedu_convey2= number_format(($FinalNonEduSchl->writenonedu_conveyA  + $FinalNonEduSchl->writenonedu_conveyB*2+ $FinalNonEduSchl->writenonedu_conveyC*3 + $FinalNonEduSchl->writenonedu_conveyD*4)/$FinalNonEduSchl->Total,2);
								echo number_format(($writenonedu_word1+$writenonedu_convey2)/2,2); 
									?></td>								
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">Numeracy Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDataNoEdu->numeric_NoEduA; ?></td>
					    		<td><?php echo $EntryDataNoEdu->numeric_NoEduB; ?></td>
					    		<td><?php echo $EntryDataNoEdu->numeric_NoEduC; ?></td>
					    		<td><?php echo $EntryDataNoEdu->numeric_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryDataNoEdu->numeric_NoEduA  + $EntryDataNoEdu->numeric_NoEduB*2+ $EntryDataNoEdu->numeric_NoEduC*3 + $EntryDataNoEdu->numeric_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    	<td><?php echo number_format(($FinalNonEduNumSchl->nonedu_countA+$FinalNonEduNumSchl->nonedu_readA+ $FinalNonEduNumSchl->nonedu_addA +$FinalNonEduNumSchl->nonedu_obsrA+ $FinalNonEduNumSchl->nonedu_unitA+ $FinalNonEduNumSchl->nonedu_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduNumSchl->nonedu_countB+$FinalNonEduNumSchl->nonedu_readB+ $FinalNonEduNumSchl->nonedu_addB +$FinalNonEduNumSchl->nonedu_obsrB+ $FinalNonEduNumSchl->nonedu_unitB+ $FinalNonEduNumSchl->nonedu_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduNumSchl->nonedu_countC+$FinalNonEduNumSchl->nonedu_readC+ $FinalNonEduNumSchl->nonedu_addC +$FinalNonEduNumSchl->nonedu_obsrC+ $FinalNonEduNumSchl->nonedu_unitC+ $FinalNonEduNumSchl->nonedu_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduNumSchl->nonedu_countD+$FinalNonEduNumSchl->nonedu_readD+ $FinalNonEduNumSchl->nonedu_addD +$FinalNonEduNumSchl->nonedu_obsrD+ $FinalNonEduNumSchl->nonedu_unitD+ $FinalNonEduNumSchl->nonedu_reciteD)/6,2); ?></td>
							<td> <?php  $nonedu_count1= number_format(($FinalNonEduNumSchl->nonedu_countA  + $FinalNonEduNumSchl->nonedu_countB*2+ $FinalNonEduNumSchl->nonedu_countC*3 + $FinalNonEduNumSchl->nonedu_countD*4)/$FinalNonEduNumSchl->Total,2); 
								$nonedu_read1= number_format(($FinalNonEduNumSchl->nonedu_readA  + $FinalNonEduNumSchl->nonedu_readB*2+ $FinalNonEduNumSchl->nonedu_readC*3 + $FinalNonEduNumSchl->nonedu_readD*4)/$FinalNonEduNumSchl->Total,2);
								$nonedu_add3= number_format(($FinalNonEduNumSchl->nonedu_addA  + $FinalNonEduNumSchl->nonedu_addB*2+ $FinalNonEduNumSchl->nonedu_addC*3 + $FinalNonEduNumSchl->nonedu_addD*4)/$FinalNonEduNumSchl->Total,2);
								$nonedu_obsr4= number_format(($FinalNonEduNumSchl->nonedu_obsrA  + $FinalNonEduNumSchl->nonedu_obsrB*2+ $FinalNonEduNumSchl->nonedu_obsrC*3 + $FinalNonEduNumSchl->nonedu_obsrD*4)/$FinalNonEduNumSchl->Total,2);
								$nonedu_unit5= number_format(($FinalNonEduNumSchl->nonedu_unitA  + $FinalNonEduNumSchl->nonedu_unitB*2+ $FinalNonEduNumSchl->nonedu_unitC*3 + $FinalNonEduNumSchl->nonedu_unitD*4)/$FinalNonEduNumSchl->Total,2);
								$nonedu_recite6= number_format(($FinalNonEduNumSchl->nonedu_reciteA  + $FinalNonEduNumSchl->nonedu_reciteB*2+ $FinalNonEduNumSchl->nonedu_reciteC*3 + $FinalNonEduNumSchl->nonedu_reciteD*4)/$FinalNonEduNumSchl->Total,2);
								echo number_format(($nonedu_count1+$nonedu_read1+$nonedu_add3+$nonedu_obsr4+$nonedu_unit5+$nonedu_recite6)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoEduHindi->oral_hindi_NoEduA; ?></td>
					    		<td><?php echo $EntryNoEduHindi->oral_hindi_NoEduB; ?></td>
					    		<td><?php echo $EntryNoEduHindi->oral_hindi_NoEduC; ?></td>
					    		<td><?php echo $EntryNoEduHindi->oral_hindi_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryNoEduHindi->oral_hindi_NoEduA  + $EntryNoEduHindi->oral_hindi_NoEduB*2+ $EntryNoEduHindi->oral_hindi_NoEduC*3 + $EntryNoEduHindi->oral_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						  <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->oral_nonedu_A+$FinalNonEduHindiSchl->oral_conveynonedu_A+ $FinalNonEduHindiSchl->oral_storynonedu_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->oral_nonedu_B+$FinalNonEduHindiSchl->oral_conveynonedu_B+ $FinalNonEduHindiSchl->oral_storynonedu_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->oral_nonedu_C+$FinalNonEduHindiSchl->oral_conveynonedu_C+ $FinalNonEduHindiSchl->oral_storynonedu_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->oral_nonedu_D+$FinalNonEduHindiSchl->oral_conveynonedu_s+ $FinalNonEduHindiSchl->oral_storynonedu_D)/3,2); ?></td>
								<td> <?php  $oral_nonedu_1= number_format(($FinalNonEduHindiSchl->oral_nonedu_A  + $FinalNonEduHindiSchl->oral_nonedu_B*2+ $FinalNonEduHindiSchl->oral_nonedu_C*3 + $FinalNonEduHindiSchl->oral_nonedu_D*4)/$FinalNonEduHindiSchl->Total,2); 
								$oral_conveynonedu_2= number_format(($FinalNonEduHindiSchl->oral_conveynonedu_A  + $FinalNonEduHindiSchl->oral_conveynonedu_B*2+ $FinalNonEduHindiSchl->oral_conveynonedu_C*3 + $FinalNonEduHindiSchl->oral_conveynonedu_s*4)/$FinalNonEduHindiSchl->Total,2);
								$oral_storynonedu_3= number_format(($FinalNonEduHindiSchl->oral_storynonedu_A  + $FinalNonEduHindiSchl->oral_storynonedu_B*2+ $FinalNonEduHindiSchl->oral_storynonedu_C*3 + $FinalNonEduHindiSchl->oral_storynonedu_D*4)/$FinalNonEduHindiSchl->Total,2);
								echo number_format(($oral_nonedu_1+$oral_conveynonedu_2+$oral_storynonedu_3)/3,2); 
									?></td>								
					    	</tr>  
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						  <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoEduHindi->read_hindi_NoEduA; ?></td>
					    		<td><?php echo $EntryNoEduHindi->read_hindi_NoEduB; ?></td>
					    		<td><?php echo $EntryNoEduHindi->read_hindi_NoEduC; ?></td>
					    		<td><?php echo $EntryNoEduHindi->read_hindi_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryNoEduHindi->read_hindi_NoEduA  + $EntryNoEduHindi->read_hindi_NoEduB*2+ $EntryNoEduHindi->read_hindi_NoEduC*3 + $EntryNoEduHindi->read_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->read_storynonedu_A+$FinalNonEduHindiSchl->read_soundnonedu_A+ $FinalNonEduHindiSchl->read_wordnonedu_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->read_storynonedu_B+$FinalNonEduHindiSchl->read_soundnonedu_B+ $FinalNonEduHindiSchl->read_wordnonedu_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->read_storynonedu_C+$FinalNonEduHindiSchl->read_soundnonedu_C+ $FinalNonEduHindiSchl->read_wordnonedu_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->read_storynonedu_D+$FinalNonEduHindiSchl->read_soundnonedu_D+ $FinalNonEduHindiSchl->read_wordnonedu_D)/3,2); ?></td>
								<td> <?php  $read_storynonedu_1= number_format(($FinalNonEduHindiSchl->read_storynonedu_A  + $FinalNonEduHindiSchl->read_storynonedu_B*2+ $FinalNonEduHindiSchl->read_storynonedu_C*3 + $FinalNonEduHindiSchl->read_storynonedu_D*4)/$FinalNonEduHindiSchl->Total,2); 
								$read_soundnonedu_2= number_format(($FinalNonEduHindiSchl->read_soundnonedu_A  + $FinalNonEduHindiSchl->read_soundnonedu_B*2+ $FinalNonEduHindiSchl->read_soundnonedu_C*3 + $FinalNonEduHindiSchl->read_soundnonedu_D*4)/$FinalNonEduHindiSchl->Total,2);
								$read_wordnonedu_3= number_format(($FinalNonEduHindiSchl->read_wordnonedu_A  + $FinalNonEduHindiSchl->read_wordnonedu_B*2+ $FinalNonEduHindiSchl->read_wordnonedu_C*3 + $FinalNonEduHindiSchl->read_wordnonedu_D*4)/$FinalNonEduHindiSchl->Total,2);
								echo number_format(($read_storynonedu_1+$read_soundnonedu_2+$read_wordnonedu_3)/3,2); 
									?></td>								
					    	</tr>   
						 </tbody>
						 </table>	
						 </div>
						 </div>
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>     
						<tr>
					        <th style="width: 48%;">लेखन भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryNoEduHindi->write_hindi_NoEduA; ?></td>
					    		<td><?php echo $EntryNoEduHindi->write_hindi_NoEduB; ?></td>
					    		<td><?php echo $EntryNoEduHindi->write_hindi_NoEduC; ?></td>
					    		<td><?php echo $EntryNoEduHindi->write_hindi_NoEduD; ?></td>
								<td> <?php  echo number_format(($EntryNoEduHindi->write_hindi_NoEduA  + $EntryNoEduHindi->write_hindi_NoEduB*2+ $EntryNoEduHindi->write_hindi_NoEduC*3 + $EntryNoEduHindi->write_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->writing_hindinonedu_A+$FinalNonEduHindiSchl->hindi_drawingnonedu_A)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->writing_hindinonedu_B+$FinalNonEduHindiSchl->hindi_drawingnonedu_B)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->writing_hindinonedu_C+$FinalNonEduHindiSchl->hindi_drawingnonedu_C)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalNonEduHindiSchl->writing_hindinonedu_D+$FinalNonEduHindiSchl->hindi_drawingnonedu_D)/2,2); ?></td>
								<td> <?php  $writing_hindinonedu_1= number_format(($FinalNonEduHindiSchl->writing_hindinonedu_A  + $FinalNonEduHindiSchl->writing_hindinonedu_B*2+ $FinalNonEduHindiSchl->writing_hindinonedu_C*3 + $FinalNonEduHindiSchl->writing_hindinonedu_D*4)/$FinalNonEduHindiSchl->Total,2); 
								$hindi_drawingnonedu_2= number_format(($FinalNonEduHindiSchl->hindi_drawingnonedu_A  + $FinalNonEduHindiSchl->hindi_drawingnonedu_B*2+ $FinalNonEduHindiSchl->hindi_drawingnonedu_C*3 + $FinalNonEduHindiSchl->hindi_drawingnonedu_D*4)/$FinalNonEduHindiSchl->Total,2);
								echo number_format(($writing_hindinonedu_1+$hindi_drawingnonedu_2)/2,2); 
									?></td>								
					    	</tr>
					    	 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
					<div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
<th colspan="6" style="background: #f44336 !important;">Entry Level Assessment of Differently abled Students.</th>						<tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisData->oral_DisA; ?></td>
					    		<td><?php echo $EntryDisData->oral_DisB; ?></td>
					    		<td><?php echo $EntryDisData->oral_DisC; ?></td>
					    		<td><?php echo $EntryDisData->oral_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisData->oral_DisA  + $EntryDisData->oral_DisB*2+ $EntryDisData->oral_DisC*3 + $EntryDisData->oral_DisD*4)/$EntryDisData->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">	 
					<table class="table">
					    <thead>
					    <th colspan="6" style="background: #4caf50 !important;">Year End Assessment of Differently abled Students.</th>
					     
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalDisSchl->oraldisable_converseA+$FinalDisSchl->oraldisable_talksA+ $FinalDisSchl->oraldisable_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->oraldisable_converseB+$FinalDisSchl->oraldisable_talksB+ $FinalDisSchl->oraldisable_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->oraldisable_converseC+$FinalDisSchl->oraldisable_talksC+ $FinalDisSchl->oraldisable_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->oraldisable_converseD+$FinalDisSchl->oraldisable_talksD+ $FinalDisSchl->oraldisable_recitesD)/3,2); ?></td>
								<td> <?php  $oraldisable_converse1= number_format(($FinalDisSchl->oraldisable_converseA  + $FinalDisSchl->oraldisable_converseB*2+ $FinalDisSchl->oraldisable_converseC*3 + $FinalDisSchl->oraldisable_converseD*4)/$FinalDisSchl->Total,2); 
								$oraldisable_talks2= number_format(($FinalDisSchl->oraldisable_talksA  + $FinalDisSchl->oraldisable_talksB*2+ $FinalDisSchl->oraldisable_talksC*3 + $FinalDisSchl->oraldisable_talksD*4)/$FinalDisSchl->Total,2);
								$oraldisable_recites3= number_format(($FinalDisSchl->oraldisable_recitesA  + $FinalDisSchl->oraldisable_recitesB*2+ $FinalDisSchl->oraldisable_recitesC*3 + $FinalDisSchl->oraldisable_recitesD*4)/$FinalDisSchl->Total,2);
								echo number_format(($oraldisable_converse1+$oraldisable_talks2+$oraldisable_recites3)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					
					<div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>   
						<tr>
					        <th style="width: 48%;">Reading Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisData->read_DisA; ?></td>
					    		<td><?php echo $EntryDisData->read_DisB; ?></td>
					    		<td><?php echo $EntryDisData->read_DisC; ?></td>
					    		<td><?php echo $EntryDisData->read_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisData->read_DisA  + $EntryDisData->read_DisB*2+ $EntryDisData->read_DisC*3 + $EntryDisData->read_DisD*4)/$EntryDisData->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr> 
					    	<td><?php echo number_format(($FinalDisSchl->readdisable_partA+$FinalDisSchl->readdisable_usesA+ $FinalDisSchl->readdisable_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->readdisable_partB+$FinalDisSchl->readdisable_usesB+ $FinalDisSchl->readdisable_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->readdisable_partC+$FinalDisSchl->readdisable_usesC+ $FinalDisSchl->readdisable_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->readdisable_partD+$FinalDisSchl->readdisable_usesD+ $FinalDisSchl->readdisable_tenceD)/3,2); ?></td>
								<td> <?php  $readdisable_part1= number_format(($FinalDisSchl->readdisable_partA  + $FinalDisSchl->readdisable_partB*2+ $FinalDisSchl->readdisable_partC*3 + $FinalDisSchl->readdisable_partD*4)/$FinalDisSchl->Total,2); 
								$readdisable_uses2= number_format(($FinalDisSchl->readdisable_usesA  + $FinalDisSchl->readdisable_usesB*2+ $FinalDisSchl->readdisable_usesC*3 + $FinalDisSchl->readdisable_usesD*4)/$FinalDisSchl->Total,2);
								$readdisable_tence3= number_format(($FinalDisSchl->readdisable_tenceA  + $FinalDisSchl->readdisable_tenceB*2+ $FinalDisSchl->readdisable_tenceC*3 + $FinalDisSchl->readdisable_tenceD*4)/$FinalDisSchl->Total,2);
								echo number_format(($readdisable_part1+$readdisable_uses2+$readdisable_tence3)/3,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					</div>
					
					<div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<tr>
					        <th style="width: 48%;">Writing Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisData->write_DisA; ?></td>
					    		<td><?php echo $EntryDisData->write_DisB; ?></td>
					    		<td><?php echo $EntryDisData->write_DisC; ?></td>
					    		<td><?php echo $EntryDisData->write_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisData->write_DisA  + $EntryDisData->write_DisB*2+ $EntryDisData->write_DisC*3 + $EntryDisData->write_DisD*4)/$EntryDisData->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalDisSchl->writedisable_wordA+$FinalDisSchl->writedisable_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->writedisable_wordB+$FinalDisSchl->writedisable_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->writedisable_wordC+$FinalDisSchl->writedisable_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisSchl->writedisable_wordD+$FinalDisSchl->writedisable_conveyD)/2,2); ?></td>
								<td> <?php  $writedisable_word1= number_format(($FinalDisSchl->writedisable_wordA  + $FinalDisSchl->writedisable_wordB*2+ $FinalDisSchl->writedisable_wordC*3 + $FinalDisSchl->writedisable_wordD*4)/$FinalDisSchl->Total,2); 
								$writedisable_convey2= number_format(($FinalDisSchl->writedisable_conveyA  + $FinalDisSchl->writedisable_conveyB*2+ $FinalDisSchl->writedisable_conveyC*3 + $FinalDisSchl->writedisable_conveyD*4)/$FinalDisSchl->Total,2);
								echo number_format(($writedisable_word1+$writedisable_convey2)/2,2); 
									?></td>								
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
						 </div>
						 
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<tr>
					        <th style="width: 48%;">Numeracy Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisData->numeric_DisA; ?></td>
					    		<td><?php echo $EntryDisData->numeric_DisB; ?></td>
					    		<td><?php echo $EntryDisData->numeric_DisC; ?></td>
					    		<td><?php echo $EntryDisData->numeric_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisData->numeric_DisA  + $EntryDisData->numeric_DisB*2+ $EntryDisData->numeric_DisC*3 + $EntryDisData->numeric_DisD*4)/$EntryDisData->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    	<td><?php echo number_format(($FinalDisNumSchl->disable_countA+$FinalDisNumSchl->disable_readA+ $FinalDisNumSchl->disable_addA +$FinalDisNumSchl->disable_obsrA+ $FinalDisNumSchl->disable_unitA+ $FinalDisNumSchl->disable_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalDisNumSchl->disable_countB+$FinalDisNumSchl->disable_readB+ $FinalDisNumSchl->disable_addB +$FinalDisNumSchl->disable_obsrB+ $FinalDisNumSchl->disable_unitB+ $FinalDisNumSchl->disable_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalDisNumSchl->disable_countC+$FinalDisNumSchl->disable_readC+ $FinalDisNumSchl->disable_addC +$FinalDisNumSchl->disable_obsrC+ $FinalDisNumSchl->disable_unitC+ $FinalDisNumSchl->disable_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($FinalDisNumSchl->disable_countD+$FinalDisNumSchl->disable_readD+ $FinalDisNumSchl->disable_addD +$FinalDisNumSchl->disable_obsrD+ $FinalDisNumSchl->disable_unitD+ $FinalDisNumSchl->disable_reciteD)/6,2); ?></td>
							<td> <?php  $disable_count1= number_format(($FinalDisNumSchl->disable_countA  + $FinalDisNumSchl->disable_countB*2+ $FinalDisNumSchl->disable_countC*3 + $FinalDisNumSchl->disable_countD*4)/$FinalDisNumSchl->Total,2); 
								$disable_read1= number_format(($FinalDisNumSchl->disable_readA  + $FinalDisNumSchl->disable_readB*2+ $FinalDisNumSchl->disable_readC*3 + $FinalDisNumSchl->disable_readD*4)/$FinalDisNumSchl->Total,2);
								$disable_add3= number_format(($FinalDisNumSchl->disable_addA  + $FinalDisNumSchl->disable_addB*2+ $FinalDisNumSchl->disable_addC*3 + $FinalDisNumSchl->disable_addD*4)/$FinalDisNumSchl->Total,2);
								$disable_obsr4= number_format(($FinalDisNumSchl->disable_obsrA  + $FinalDisNumSchl->disable_obsrB*2+ $FinalDisNumSchl->disable_obsrC*3 + $FinalDisNumSchl->disable_obsrD*4)/$FinalDisNumSchl->Total,2);
								$disable_unit5= number_format(($FinalDisNumSchl->disable_unitA  + $FinalDisNumSchl->disable_unitB*2+ $FinalDisNumSchl->disable_unitC*3 + $FinalDisNumSchl->disable_unitD*4)/$FinalDisNumSchl->Total,2);
								$disable_recite6= number_format(($FinalDisNumSchl->disable_reciteA  + $FinalDisNumSchl->disable_reciteB*2+ $FinalDisNumSchl->disable_reciteC*3 + $FinalDisNumSchl->disable_reciteD*4)/$FinalDisNumSchl->Total,2);
								echo number_format(($disable_count1+$disable_read1+$disable_add3+$disable_obsr4+$disable_unit5+$disable_recite6)/6,2); 
									?></td>								
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 </div>
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisHindi->oral_hindi_DisA; ?></td>
					    		<td><?php echo $EntryDisHindi->oral_hindi_DisB; ?></td>
					    		<td><?php echo $EntryDisHindi->oral_hindi_DisC; ?></td>
					    		<td><?php echo $EntryDisHindi->oral_hindi_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisHindi->oral_hindi_DisA  + $EntryDisHindi->oral_hindi_DisB*2+ $EntryDisHindi->oral_hindi_DisC*3 + $EntryDisHindi->oral_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						  <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalDisHindiSchl->oral_disable_A+$FinalDisHindiSchl->oral_conveydisable_A+ $FinalDisHindiSchl->oral_storydisable_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->oral_disable_B+$FinalDisHindiSchl->oral_conveydisable_B+ $FinalDisHindiSchl->oral_storydisable_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->oral_disable_C+$FinalDisHindiSchl->oral_conveydisable_C+ $FinalDisHindiSchl->oral_storydisable_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->oral_disable_D+$FinalDisHindiSchl->oral_conveydisable_s+ $FinalDisHindiSchl->oral_storydisable_D)/3,2); ?></td>
								<td> <?php  $oral_disable_1= number_format(($FinalDisHindiSchl->oral_disable_A  + $FinalDisHindiSchl->oral_disable_B*2+ $FinalDisHindiSchl->oral_disable_C*3 + $FinalDisHindiSchl->oral_disable_D*4)/$FinalDisHindiSchl->Total,2); 
								$oral_conveydisable_2= number_format(($FinalDisHindiSchl->oral_conveydisable_A  + $FinalDisHindiSchl->oral_conveydisable_B*2+ $FinalDisHindiSchl->oral_conveydisable_C*3 + $FinalDisHindiSchl->oral_conveydisable_s*4)/$FinalDisHindiSchl->Total,2);
								$oral_storydisable_3= number_format(($FinalDisHindiSchl->oral_storydisable_A  + $FinalDisHindiSchl->oral_storydisable_B*2+ $FinalDisHindiSchl->oral_storydisable_C*3 + $FinalDisHindiSchl->oral_storydisable_D*4)/$FinalDisHindiSchl->Total,2);
								 echo number_format(($oral_disable_1+$oral_conveydisable_2+$oral_storydisable_3)/3,2); 
									?></td>								
					    	</tr> 
						 </tbody>
						 </table>
						  </div>
						 </div>
						  <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisHindi->read_hindi_DisA; ?></td>
					    		<td><?php echo $EntryDisHindi->read_hindi_DisB; ?></td>
					    		<td><?php echo $EntryDisHindi->read_hindi_DisC; ?></td>
					    		<td><?php echo $EntryDisHindi->read_hindi_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisHindi->read_hindi_DisA  + $EntryDisHindi->read_hindi_DisB*2+ $EntryDisHindi->read_hindi_DisC*3 + $EntryDisHindi->read_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr> 
					    	<td><?php echo number_format(($FinalDisHindiSchl->read_storydisable_A+$FinalDisHindiSchl->read_sounddisable_A+ $FinalDisHindiSchl->read_worddisable_A)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->read_storydisable_B+$FinalDisHindiSchl->read_sounddisable_B+ $FinalDisHindiSchl->read_worddisable_B)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->read_storydisable_C+$FinalDisHindiSchl->read_sounddisable_C+ $FinalDisHindiSchl->read_worddisable_C)/3,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->read_storydisable_D+$FinalDisHindiSchl->read_sounddisable_D+ $FinalDisHindiSchl->read_worddisable_D)/3,2); ?></td>
								<td> <?php  
								$read_storydisable_1= number_format(($FinalDisHindiSchl->read_storydisable_A  + $FinalDisHindiSchl->read_storydisable_B*2+ $FinalDisHindiSchl->read_storydisable_C*3 + $FinalDisHindiSchl->read_storydisable_D*4)/$FinalDisHindiSchl->Total,2); 
								
								
								$read_sounddisable_2= number_format(($FinalDisHindiSchl->read_sounddisable_A  + $FinalDisHindiSchl->read_sounddisable_B*2+ $FinalDisHindiSchl->read_sounddisable_C*3 + $FinalDisHindiSchl->read_sounddisable_D*4)/$FinalDisHindiSchl->Total,2);
								$read_worddisable_3= number_format(($FinalDisHindiSchl->read_worddisable_A  + $FinalDisHindiSchl->read_worddisable_B*2+ $FinalDisHindiSchl->read_worddisable_C*3 + $FinalDisHindiSchl->read_worddisable_D*4)/$FinalDisHindiSchl->Total,2);
								//echo $read_storydisable_1.'-'.$read_sounddisable_2.'-'.$read_worddisable_3;
								echo number_format(($read_storydisable_1+$read_sounddisable_2+$read_worddisable_3)/3,2); 
									?></td>								
					    	</tr>  
						 </tbody>
						 </table>	
						 </div>
						 </div>
						 <div class="row">						 
					<div class="col-sm-6">
					<table class="table">
					    <thead>    
						<tr>
					        <th style="width: 48%;">लेखन भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). </td>
					    		<td><?php echo $EntryDisHindi->write_hindi_DisA; ?></td>
					    		<td><?php echo $EntryDisHindi->write_hindi_DisB; ?></td>
					    		<td><?php echo $EntryDisHindi->write_hindi_DisC; ?></td>
					    		<td><?php echo $EntryDisHindi->write_hindi_DisD; ?></td>
								<td> <?php  echo number_format(($EntryDisHindi->write_hindi_DisA  + $EntryDisHindi->write_hindi_DisB*2+ $EntryDisHindi->write_hindi_DisC*3 + $EntryDisHindi->write_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>								
					    	</tr>
						 </tbody>
						 </table>
					</div> 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr> 
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	 <tr> 
					    	<td><?php echo number_format(($FinalDisHindiSchl->writing_hindidisable_A+$FinalDisHindiSchl->hindi_drawingdisable_A)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->writing_hindidisable_B+$FinalDisHindiSchl->hindi_drawingdisable_B)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->writing_hindidisable_C+$FinalDisHindiSchl->hindi_drawingdisable_C)/2,2); ?></td>
					    	<td><?php echo number_format(($FinalDisHindiSchl->writing_hindidisable_D+$FinalDisHindiSchl->hindi_drawingdisable_D)/2,2); ?></td>
								<td> <?php  $writing_hindidisable_1= number_format(($FinalDisHindiSchl->writing_hindidisable_A  + $FinalDisHindiSchl->writing_hindidisable_B*2+ $FinalDisHindiSchl->writing_hindidisable_C*3 + $FinalDisHindiSchl->writing_hindidisable_D*4)/$FinalDisHindiSchl->Total,2); 
								$hindi_drawingdisable_2= number_format(($FinalDisHindiSchl->hindi_drawingdisable_A  + $FinalDisHindiSchl->hindi_drawingdisable_B*2+ $FinalDisHindiSchl->hindi_drawingdisable_C*3 + $FinalDisHindiSchl->hindi_drawingdisable_D*4)/$FinalDisHindiSchl->Total,2);
								//echo $writing_hindidisable_1.'-'.$hindi_drawingdisable_2;
								echo number_format(($writing_hindidisable_1+$hindi_drawingdisable_2)/2,2); 
									?></td>								
					    	</tr> 
					    	 
						 </tbody>
						 </table>
						 </div>
						 </div>
							<figure class="highcharts-figure">
							<div id="container_eng"></div>
							</figure> 
					
				</div>     
				<div class="row">          
				
        </div>         
        </div> 
    </div>
    </div>
<!-- ======================================== JS START ================================== --> 
<script src="<?php echo base_url(); ?>vendor/jspdf/jspdf.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jspdf/html2canvas.js"></script>
<script src="<?php echo base_url(); ?>vendor/jspdf/jspdf.debug.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts/export-data.js"></script>
<script src="<?php echo base_url(); ?>js/highcharts/accessibility.js"></script>
<script type="text/javascript">
	$('#pdf1').click(function() {
    var options = {
    };
    var currentdate = new Date();
    var cDateTime = currentdate.getDate() + (currentdate.getMonth()+1) + currentdate.getFullYear() + currentdate.getHours()  + currentdate.getMinutes() + currentdate.getSeconds();
    var EmpInfo='test';
    var pdf = new jsPDF('p', 'pt', 'a4');
    pdf.setFontSize(10);
    pdf.setFontStyle('italic');
    pdf.text('Region_Reports - '+EmpInfo, 20,20); 
    pdf.addHTML($("#Personal_PDF"), 10, 25, options, function() {
        pdf.save('Region_Reports_'+EmpInfo+'_'+cDateTime+'.pdf');
    });
});
	 
</script>
</body>
</html>
