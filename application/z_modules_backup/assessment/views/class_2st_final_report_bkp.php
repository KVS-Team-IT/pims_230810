
     
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
					    		<td><?php if($firstSec->Total!=0){echo number_format($firstSec->MALE*100/$firstSec->Total); } else{ echo '0'; }  ?></td>
					    	</tr>
					    	<tr>
					    		<th>Girls</th>
					    		<td><?php echo $firstSec->FEMALE;?></td>
					    		<td><?php if($firstSec->Total!=0){ echo number_format($firstSec->FEMALE*100/$firstSec->Total);} else{ echo '0'; }   ?></td>
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
					    		<td><?php if($firstSec->Total!=0){ echo number_format($firstSec->General*100/$firstSec->Total); }  else{ echo '0'; }   ?></td>
					    	</tr>
					    	<tr>
					    		<th>OBC</th>
					    		<td><?php echo $firstSec->OBC;?></td>
					    		<td><?php if($firstSec->Total!=0){ echo number_format($firstSec->OBC*100/$firstSec->Total); }  else{ echo '0'; } ?></td>
					    	</tr>
					    	<tr>
					    		<th>SC</th>
					    		<td><?php echo $firstSec->SC;?></td>
					    		<td><?php if($firstSec->Total!=0){ echo number_format($firstSec->SC*100/$firstSec->Total);}  else{ echo '0'; } ?></td>
					    	</tr>
					    	<tr>
					    		<th>ST</th>
					    		<td><?php echo $firstSec->ST;?></td>
					    		<td><?php if($firstSec->Total!=0){ echo number_format($firstSec->ST*100/$firstSec->Total); } else{ echo '0'; }   ?></td>
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
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment Score</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th>
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndOral->oral_converseA); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_converseB); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_converseC); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_converseD); ?></td>
								<td> <?php  echo number_format(($YearEndOral->oral_converseA  + $YearEndOral->oral_converseB*2+ $YearEndOral->oral_converseC*3 + $YearEndOral->oral_converseD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndOral->oral_talksA); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_talksB); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_talksC); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_talksD); ?></td>
								<td> <?php echo number_format(($YearEndOral->oral_talksA  + $YearEndOral->oral_talksB*2+ $YearEndOral->oral_talksC*3 + $YearEndOral->oral_talksD*4)/$YearEndOral->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndOral->oral_recitesA); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_recitesB); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_recitesC); ?></td>
					    		<td><?php echo number_format($YearEndOral->oral_recitesD); ?></td> 
								<td> <?php echo number_format(($YearEndOral->oral_recitesA  + $YearEndOral->oral_recitesB*2+ $YearEndOral->oral_recitesC*3 + $YearEndOral->oral_recitesD*4)/$YearEndOral->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndOral->oral_converseA+$YearEndOral->oral_talksA+ $YearEndOral->oral_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndOral->oral_converseB+$YearEndOral->oral_talksB+ $YearEndOral->oral_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndOral->oral_converseC+$YearEndOral->oral_talksC+ $YearEndOral->oral_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndOral->oral_converseD+$YearEndOral->oral_talksD+ $YearEndOral->oral_recitesD)/3,2); ?></td>
								<td> <?php  $oral_A= number_format(($YearEndOral->oral_converseA  + $YearEndOral->oral_converseB*2+ $YearEndOral->oral_converseC*3 + $YearEndOral->oral_converseD*4)/$YearEndOral->Total,2); 
								$oral_B= number_format(($YearEndOral->oral_talksA  + $YearEndOral->oral_talksB*2+ $YearEndOral->oral_talksC*3 + $YearEndOral->oral_talksD*4)/$YearEndOral->Total,2);
								$oral_C= number_format(($YearEndOral->oral_recitesA  + $YearEndOral->oral_recitesB*2+ $YearEndOral->oral_recitesC*3 + $YearEndOral->oral_recitesD*4)/$YearEndOral->Total,2);
								echo number_format(($oral_A+$oral_B+$oral_C)/3,2); 
									?></td>	
								<td>
								<?php 
								echo number_format(($oral_A+$oral_B+$oral_C)/3,2)-number_format(($EntryData->oral_eng1A  + $EntryData->oral_eng1B*2+ $EntryData->oral_eng1C*3 + $EntryData->oral_eng1D*4)/$YearEndOral->Total,2); ?>
								</td>
					    	</tr> 
					    </tbody> 
						
					</table>
					</div>

					<div class="col-sm-6"> 
						<table class="table">
					    <thead>
					    <th colspan="7" style="background: #4caf50 !important;">Year End Assessment Score</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th>
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse and talks about the print available in the classroom.</td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOral->oral_L1  + $Class2YearEndOral->oral_L2*2+ $Class2YearEndOral->oral_L3*3 + $Class2YearEndOral->oral_L4*4)/$Class2YearEndOral->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Engages in conversation to ask questions and listens to others.</td>					    		
					    		<td><?php echo number_format($Class2YearEndOral->oral_ii_A); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_ii_B); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_ii_C); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_ii_D); ?></td>
								<td> <?php echo number_format(($Class2YearEndOral->oral_ii_A  + $Class2YearEndOral->oral_ii_B*2+ $Class2YearEndOral->oral_ii_C*3 + $Class2YearEndOral->oral_ii_D*4)/$Class2YearEndOral->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recitation of songs/ poems.</td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_iii_A); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_iii_B); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_iii_C); ?></td>
					    		<td><?php echo number_format($Class2YearEndOral->oral_iii_D); ?></td> 
								<td> <?php echo number_format(($Class2YearEndOral->oral_iii_A  + $Class2YearEndOral->oral_iii_B*2+ $Class2YearEndOral->oral_iii_C*3 + $Class2YearEndOral->oral_iii_D*4)/$Class2YearEndOral->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndOral->oral_L1+$Class2YearEndOral->oral_ii_A+ $Class2YearEndOral->oral_iii_A)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOral->oral_L2+$Class2YearEndOral->oral_ii_B+ $Class2YearEndOral->oral_iii_B)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOral->oral_L3+$Class2YearEndOral->oral_ii_C+ $Class2YearEndOral->oral_iii_C)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOral->oral_L4+$Class2YearEndOral->oral_ii_D+ $Class2YearEndOral->oral_iii_D)/3,2); ?></td>
								<td> <?php  
								$oral_A= number_format(($Class2YearEndOral->oral_L1  + $Class2YearEndOral->oral_L2*2+ $Class2YearEndOral->oral_L3*3 + $Class2YearEndOral->oral_L4*4)/$Class2YearEndOral->Total,2); 
								$oral_B= number_format(($Class2YearEndOral->oral_ii_A  + $Class2YearEndOral->oral_ii_B*2+ $Class2YearEndOral->oral_ii_C*3 + $Class2YearEndOral->oral_ii_D*4)/$Class2YearEndOral->Total,2);
								$oral_C= number_format(($Class2YearEndOral->oral_iii_A  + $Class2YearEndOral->oral_iii_B*2+ $Class2YearEndOral->oral_iii_C*3 + $Class2YearEndOral->oral_iii_D*4)/$Class2YearEndOral->Total,2);
								echo number_format(($oral_A+$oral_B+$oral_C)/3,2); 
									?></td>	
								<td>
								<?php 
								//echo number_format(($oral_A+$oral_B+$oral_C)/3,2)-number_format(($EntryData->oral_eng1A  + $EntryData->oral_eng1B*2+ $EntryData->oral_eng1C*3 + $EntryData->oral_eng1D*4)/$Class2YearEndOral->Total,2); ?>
								</td>
					    	</tr> 
					    </tbody> 
						
					</table>
						 </div>	
					</div>
						<div class="row">
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of READING ABILITIES (ENGLISH).</th>
					      <tr>
					        <th style="width: 48%;">Reading Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Reads and narrates /retells the stories from children's literature/ textbook. </td>
					    		<td><?php echo number_format($YearEndReading->read_partA); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_partB); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_partC); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_partD); ?></td>
								<td> <?php  echo number_format(($YearEndReading->read_partA  + $YearEndReading->read_partB*2+ $YearEndReading->read_partC*3 + $YearEndReading->read_partD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Makes new words from the letters of a given word.</td>
					    		<td><?php echo number_format($YearEndReading->read_usesA); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_usesB); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_usesC); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_usesD); ?></td>
								<td> <?php  echo number_format(($YearEndReading->read_usesA  + $YearEndReading->read_usesB*2+ $YearEndReading->read_usesC*3 + $YearEndReading->read_usesD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(iii). Reads unknown text of 8 to 10 sentences with simple words with appropriate speed approximately 30 to 45 words per minute correctly and clarity</td>
					    		<td><?php echo number_format($YearEndReading->read_tenceA); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_tenceB); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_tenceC); ?></td>
					    		<td><?php echo number_format($YearEndReading->read_tenceD); ?></td>
								<td> <?php  echo number_format(($YearEndReading->read_tenceA  + $YearEndReading->read_tenceB*2+ $YearEndReading->read_tenceC*3 + $YearEndReading->read_tenceD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndReading->read_partA+$YearEndReading->read_usesA+ $YearEndReading->read_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndReading->read_partB+$YearEndReading->read_usesB+ $YearEndReading->read_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndReading->read_partC+$YearEndReading->read_usesC+ $YearEndReading->read_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndReading->read_partD+$YearEndReading->read_usesD+ $YearEndReading->read_tenceD)/3,2); ?></td>
								<td> <?php  $YearEndR_A= number_format(($YearEndReading->read_partA  + $YearEndReading->read_partB*2+ $YearEndReading->read_partC*3 + $YearEndReading->read_partD*4)/$YearEndReading->Total,2); 
								$YearEndR_B= number_format(($YearEndReading->read_usesA  + $YearEndReading->read_usesB*2+ $YearEndReading->read_usesC*3 + $YearEndReading->read_usesD*4)/$YearEndReading->Total,2);
								$YearEndR_C= number_format(($YearEndReading->read_tenceA  + $YearEndReading->read_tenceB*2+ $YearEndReading->read_tenceC*3 + $YearEndReading->read_tenceD*4)/$YearEndReading->Total,2);
								echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2); 
									?></td>		
							<td><?php echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2)-number_format(($EntryData->read_eng1A  + $EntryData->read_eng1B*2+ $EntryData->read_eng1C*3 + $EntryData->read_eng1D*4)/$YearEndOral->Total,2); ?> </td>
					    	</tr>
						 </tbody>
						 </table>
						 </div>
					<div class="col-sm-6">		
					<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of READING ABILITIES (ENGLISH).</th>
					      <tr>
					        <th style="width: 48%;">Reading Language Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities </td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_i_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_i_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_i_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_i_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndReading->reading_i_L1  + $Class2YearEndReading->reading_i_L2*2+ $Class2YearEndReading->reading_i_L3*3 + $Class2YearEndReading->reading_i_L4*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words </td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_ii_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_ii_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_ii_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_ii_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndReading->reading_ii_L1  + $Class2YearEndReading->reading_ii_L2*2+ $Class2YearEndReading->reading_ii_L3*3 + $Class2YearEndReading->reading_ii_L4*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an age appropriate unknown text. </td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_iii_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_iii_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_iii_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndReading->reading_iii_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndReading->reading_iii_L1  + $Class2YearEndReading->reading_iii_L2*2+ $Class2YearEndReading->reading_iii_L3*3 + $Class2YearEndReading->reading_iii_L4*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndReading->reading_i_L1+$Class2YearEndReading->reading_ii_L1+ $Class2YearEndReading->reading_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndReading->reading_i_L2+$Class2YearEndReading->reading_ii_L2+ $Class2YearEndReading->reading_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndReading->reading_i_L3+$Class2YearEndReading->reading_ii_L3+ $Class2YearEndReading->reading_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndReading->reading_i_L4+$Class2YearEndReading->reading_ii_L4+ $Class2YearEndReading->reading_iii_L4)/3,2); ?></td>
								<td> <?php  $YearEndR_A= number_format(($Class2YearEndReading->reading_i_L1  + $Class2YearEndReading->reading_i_L2*2+ $Class2YearEndReading->reading_i_L3*3 + $Class2YearEndReading->reading_i_L4*4)/$Class2YearEndReading->Total,2); 
								$YearEndR_B= number_format(($Class2YearEndReading->reading_ii_L1  + $Class2YearEndReading->reading_ii_L2*2+ $Class2YearEndReading->reading_ii_L3*3 + $Class2YearEndReading->reading_ii_L4*4)/$Class2YearEndReading->Total,2);
								$YearEndR_C= number_format(($Class2YearEndReading->reading_iii_L1  + $Class2YearEndReading->reading_iii_L2*2+ $Class2YearEndReading->reading_iii_L3*3 + $Class2YearEndReading->reading_iii_L4*4)/$Class2YearEndReading->Total,2);
								echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2); 
									?></td>		
							<td><?php //echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2)-number_format(($EntryData->read_eng1A  + $EntryData->read_eng1B*2+ $EntryData->read_eng1C*3 + $EntryData->read_eng1D*4)/$YearEndOral->Total,2); ?> </td>
					    	</tr>
						 </tbody>
						 </table>				 
					</div>
						 </div>
						 
						 <div class="row">
					
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of WRITING ABILITIES (ENGLISH)</th>
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndWriting->write_wordA); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_wordB); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_wordC); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_wordD); ?></td>
								<td> <?php  echo number_format(($YearEndWriting->write_wordA  + $YearEndWriting->write_wordB*2+ $YearEndWriting->write_wordC*3 + $YearEndWriting->write_wordD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndWriting->write_conveyA); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_conveyB); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_conveyC); ?></td>
					    		<td><?php echo number_format($YearEndWriting->write_conveyD); ?></td>
								<td> <?php  echo number_format(($YearEndWriting->write_conveyA  + $YearEndWriting->write_conveyB*2+ $YearEndWriting->write_conveyC*3 + $YearEndWriting->write_conveyD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndWriting->write_wordA+$YearEndWriting->write_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndWriting->write_wordB+$YearEndWriting->write_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndWriting->write_wordC+$YearEndWriting->write_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndWriting->write_wordD+$YearEndWriting->write_conveyD)/2,2); ?></td>
								<td> <?php  if($YearEndWriting->Total!=0){ $write_word_T1= number_format(($YearEndWriting->write_wordA  + $YearEndWriting->write_wordB*2+ $YearEndWriting->write_wordC*3 + $YearEndWriting->write_wordD*4)/$YearEndWriting->Total,2); } else{ echo '0.00'; } 
								
								if($YearEndWriting->Total!=0){ $write_convey_T2= number_format(($YearEndWriting->write_conveyA  + $YearEndWriting->write_conveyB*2+ $YearEndWriting->write_conveyC*3 + $YearEndWriting->write_conveyD*4)/$YearEndWriting->Total,2); } else{ echo '0'; }  
								echo number_format(($write_word_T1+$write_convey_T2)/2,2); 
									?></td>				
								<td><?php if($YearEndOral->Total!=0){ echo number_format(($write_word_T1+$write_convey_T2)/2,2)- number_format(($EntryData->write_eng1A  + $EntryData->write_eng1B*2+ $EntryData->write_eng1C*3 + $EntryData->write_eng1D*4)/$YearEndOral->Total,2); } else{ echo '0'; }   ?> </td>
					    	</tr>
						 </tbody>
						 </table>
							</div> 
							<div class="col-sm-6">
					 	<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of WRITING ABILITIES (ENGLISH)</th>
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_i_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_i_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_i_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_i_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndWriting->writing_i_L1  + $Class2YearEndWriting->writing_i_L2*2+ $Class2YearEndWriting->writing_i_L3*3 + $Class2YearEndWriting->writing_i_L4*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_ii_L1); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_ii_L2); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_ii_L3); ?></td>
					    		<td><?php echo number_format($Class2YearEndWriting->writing_ii_L4); ?></td>
								<td> <?php  echo number_format(($Class2YearEndWriting->writing_ii_L1  + $Class2YearEndWriting->writing_ii_L2*2+ $Class2YearEndWriting->writing_ii_L3*3 + $Class2YearEndWriting->writing_ii_L4*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($Class2YearEndWriting->writing_i_L1+$Class2YearEndWriting->writing_ii_L1)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndWriting->writing_i_L2+$Class2YearEndWriting->writing_ii_L2)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndWriting->writing_i_L3+$Class2YearEndWriting->writing_ii_L3)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndWriting->writing_i_L4+$Class2YearEndWriting->writing_ii_L4)/2,2); ?></td>
								<td> <?php  if($Class2YearEndWriting->Total!=0){ $write_word_T1= number_format(($Class2YearEndWriting->writing_i_L1  + $Class2YearEndWriting->writing_i_L2*2+ $Class2YearEndWriting->writing_i_L3*3 + $Class2YearEndWriting->writing_i_L4*4)/$Class2YearEndWriting->Total,2); } else{ echo '0.00'; } 
								
								if($Class2YearEndWriting->Total!=0){ $write_convey_T2= number_format(($Class2YearEndWriting->writing_ii_L1  + $Class2YearEndWriting->writing_ii_L2*2+ $Class2YearEndWriting->writing_ii_L3*3 + $Class2YearEndWriting->writing_ii_L4*4)/$Class2YearEndWriting->Total,2); } else{ echo '0'; }  
								echo number_format(($write_word_T1+$write_convey_T2)/2,2); 
									?></td>				
								<td><?php //if($YearEndOral->Total!=0){ echo number_format(($write_word_T1+$write_convey_T2)/2,2)- number_format(($EntryData->write_eng1A  + $EntryData->write_eng1B*2+ $EntryData->write_eng1C*3 + $EntryData->write_eng1D*4)/$YearEndOral->Total,2); } else{ echo '0'; }   ?> </td>
					    	</tr>
						 </tbody>
						 </table>
					</div>
							</div>
							 <div class="row">
					
					<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of NUMERACY ABILITIES</th>
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th><th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndNumeracy->num_countA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_countB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_countC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_countD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_countA  + $YearEndNumeracy->num_countB*2+ $YearEndNumeracy->num_countC*3 + $YearEndNumeracy->num_countD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndNumeracy->num_readA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_readB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_readC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_readD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_readA  + $YearEndNumeracy->num_readB*2+ $YearEndNumeracy->num_readC*3 + $YearEndNumeracy->num_readD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndNumeracy->num_addA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_addB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_addC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_addD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_addA  + $YearEndNumeracy->num_addB*2+ $YearEndNumeracy->num_addC*3 + $YearEndNumeracy->num_addD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndNumeracy->num_obsrA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_obsrB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_obsrC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_obsrD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_obsrA  + $YearEndNumeracy->num_obsrB*2+ $YearEndNumeracy->num_obsrC*3 + $YearEndNumeracy->num_obsrD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using non-standard non-uniform units like hand span, footstep, fingers, etc and capacity using nonstandard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndNumeracy->num_unitA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_unitB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_unitC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_unitD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_unitA  + $YearEndNumeracy->num_unitB*2+ $YearEndNumeracy->num_unitC*3 + $YearEndNumeracy->num_unitD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndNumeracy->num_reciteA); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_reciteB); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_reciteC); ?></td>
					    		<td><?php echo number_format($YearEndNumeracy->num_reciteD); ?></td>
								<td> <?php  echo number_format(($YearEndNumeracy->num_reciteA  + $YearEndNumeracy->num_reciteB*2+ $YearEndNumeracy->num_reciteC*3 + $YearEndNumeracy->num_reciteD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNumeracy->num_countA+$YearEndNumeracy->num_readA+ $YearEndNumeracy->num_addA +$YearEndNumeracy->num_obsrA+ $YearEndNumeracy->num_unitA+ $YearEndNumeracy->num_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNumeracy->num_countB+$YearEndNumeracy->num_readB+ $YearEndNumeracy->num_addB +$YearEndNumeracy->num_obsrB+ $YearEndNumeracy->num_unitB+ $YearEndNumeracy->num_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNumeracy->num_countC+$YearEndNumeracy->num_readC+ $YearEndNumeracy->num_addC +$YearEndNumeracy->num_obsrC+ $YearEndNumeracy->num_unitC+ $YearEndNumeracy->num_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNumeracy->num_countD+$YearEndNumeracy->num_readD+ $YearEndNumeracy->num_addD +$YearEndNumeracy->num_obsrD+ $YearEndNumeracy->num_unitD+ $YearEndNumeracy->num_reciteD)/6,2); ?></td>
							<td> <?php  if($YearEndNumeracy->Total!=0){$NUM_A= number_format(($YearEndNumeracy->num_countA  + $YearEndNumeracy->num_countB*2+ $YearEndNumeracy->num_countC*3 + $YearEndNumeracy->num_countD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($YearEndNumeracy->Total!=0){$NUM_B= number_format(($YearEndNumeracy->num_readA  + $YearEndNumeracy->num_readB*2+ $YearEndNumeracy->num_readC*3 + $YearEndNumeracy->num_readD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($YearEndNumeracy->Total!=0){ $NUM_C= number_format(($YearEndNumeracy->num_addA  + $YearEndNumeracy->num_addB*2+ $YearEndNumeracy->num_addC*3 + $YearEndNumeracy->num_addD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($YearEndNumeracy->Total!=0){$NUM_D= number_format(($YearEndNumeracy->num_obsrA  + $YearEndNumeracy->num_obsrB*2+ $YearEndNumeracy->num_obsrC*3 + $YearEndNumeracy->num_obsrD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($YearEndNumeracy->Total!=0){ $NUM_E= number_format(($YearEndNumeracy->num_unitA  + $YearEndNumeracy->num_unitB*2+ $YearEndNumeracy->num_unitC*3 + $YearEndNumeracy->num_unitD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($YearEndNumeracy->Total!=0){ $NUM_F= number_format(($YearEndNumeracy->num_reciteA  + $YearEndNumeracy->num_reciteB*2+ $YearEndNumeracy->num_reciteC*3 + $YearEndNumeracy->num_reciteD*4)/$YearEndNumeracy->Total,2); } else{ echo '0'; } 
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2);  
									?></td>	
							<td> <?php if($YearEndOral->Total!=0){ echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2)-number_format(($EntryData->numeric1A  + $EntryData->numeric1B*2+ $EntryData->numeric1C*3 + $EntryData->numeric1D*4)/$YearEndOral->Total,2); } else{ echo '0'; }  
									?></td>
					    </tr>
						 </tbody>
						 </table>	
							</div> 
							<div class="col-sm-6">
						<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of NUMERACY ABILITIES  </th>
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th><th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_countA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_countB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_countC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_countD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_countA  + $Class2YearEndNumeracy->num_countB*2+ $Class2YearEndNumeracy->num_countC*3 + $Class2YearEndNumeracy->num_countD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_readA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_readB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_readC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_readD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_readA  + $Class2YearEndNumeracy->num_readB*2+ $Class2YearEndNumeracy->num_readC*3 + $Class2YearEndNumeracy->num_readD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_addA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_addB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_addC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_addD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_addA  + $Class2YearEndNumeracy->num_addB*2+ $Class2YearEndNumeracy->num_addC*3 + $Class2YearEndNumeracy->num_addD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_obsrA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_obsrB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_obsrC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_obsrD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_obsrA  + $Class2YearEndNumeracy->num_obsrB*2+ $Class2YearEndNumeracy->num_obsrC*3 + $Class2YearEndNumeracy->num_obsrD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using non-standard non-uniform units like hand span, footstep, fingers, etc and capacity using nonstandard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_unitA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_unitB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_unitC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_unitD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_unitA  + $Class2YearEndNumeracy->num_unitB*2+ $Class2YearEndNumeracy->num_unitC*3 + $Class2YearEndNumeracy->num_unitD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_reciteA); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_reciteB); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_reciteC); ?></td>
					    		<td><?php echo number_format($Class2YearEndNumeracy->num_reciteD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndNumeracy->num_reciteA  + $Class2YearEndNumeracy->num_reciteB*2+ $Class2YearEndNumeracy->num_reciteC*3 + $Class2YearEndNumeracy->num_reciteD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndNumeracy->num_countA+$Class2YearEndNumeracy->num_readA+ $Class2YearEndNumeracy->num_addA +$Class2YearEndNumeracy->num_obsrA+ $Class2YearEndNumeracy->num_unitA+ $Class2YearEndNumeracy->num_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndNumeracy->num_countB+$Class2YearEndNumeracy->num_readB+ $Class2YearEndNumeracy->num_addB +$Class2YearEndNumeracy->num_obsrB+ $Class2YearEndNumeracy->num_unitB+ $Class2YearEndNumeracy->num_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndNumeracy->num_countC+$Class2YearEndNumeracy->num_readC+ $Class2YearEndNumeracy->num_addC +$Class2YearEndNumeracy->num_obsrC+ $Class2YearEndNumeracy->num_unitC+ $Class2YearEndNumeracy->num_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndNumeracy->num_countD+$Class2YearEndNumeracy->num_readD+ $Class2YearEndNumeracy->num_addD +$Class2YearEndNumeracy->num_obsrD+ $Class2YearEndNumeracy->num_unitD+ $Class2YearEndNumeracy->num_reciteD)/6,2); ?></td>
							<td> <?php  if($Class2YearEndNumeracy->Total!=0){$NUM_A= number_format(($Class2YearEndNumeracy->num_countA  + $Class2YearEndNumeracy->num_countB*2+ $Class2YearEndNumeracy->num_countC*3 + $Class2YearEndNumeracy->num_countD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($Class2YearEndNumeracy->Total!=0){$NUM_B= number_format(($Class2YearEndNumeracy->num_readA  + $Class2YearEndNumeracy->num_readB*2+ $Class2YearEndNumeracy->num_readC*3 + $Class2YearEndNumeracy->num_readD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($Class2YearEndNumeracy->Total!=0){ $NUM_C= number_format(($Class2YearEndNumeracy->num_addA  + $Class2YearEndNumeracy->num_addB*2+ $Class2YearEndNumeracy->num_addC*3 + $Class2YearEndNumeracy->num_addD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($Class2YearEndNumeracy->Total!=0){$NUM_D= number_format(($Class2YearEndNumeracy->num_obsrA  + $Class2YearEndNumeracy->num_obsrB*2+ $Class2YearEndNumeracy->num_obsrC*3 + $Class2YearEndNumeracy->num_obsrD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($Class2YearEndNumeracy->Total!=0){ $NUM_E= number_format(($Class2YearEndNumeracy->num_unitA  + $Class2YearEndNumeracy->num_unitB*2+ $Class2YearEndNumeracy->num_unitC*3 + $Class2YearEndNumeracy->num_unitD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; }  
								if($Class2YearEndNumeracy->Total!=0){ $NUM_F= number_format(($Class2YearEndNumeracy->num_reciteA  + $Class2YearEndNumeracy->num_reciteB*2+ $Class2YearEndNumeracy->num_reciteC*3 + $Class2YearEndNumeracy->num_reciteD*4)/$Class2YearEndNumeracy->Total,2); } else{ echo '0'; } 
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2);  
									?></td>	
							<td> <?php if($YearEndOral->Total!=0){ echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2)-number_format(($EntryData->numeric1A  + $EntryData->numeric1B*2+ $EntryData->numeric1C*3 + $EntryData->numeric1D*4)/$YearEndOral->Total,2); } else{ echo '0'; }  
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
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of ORAL ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndHindi->oral_frndhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_frndhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_frndhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_frndhD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->oral_frndhA  + $YearEndHindi->oral_frndhB*2+ $YearEndHindi->oral_frndhC*3 + $YearEndHindi->oral_frndhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndHindi->oral_conveyhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_conveyhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_conveyhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_conveyhs); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->oral_conveyhA  + $YearEndHindi->oral_conveyhB*2+ $YearEndHindi->oral_conveyhC*3 + $YearEndHindi->oral_conveyhs*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndHindi->oral_storyhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_storyhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_storyhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->oral_storyhD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->oral_storyhA  + $YearEndHindi->oral_storyhB*2+ $YearEndHindi->oral_storyhC*3 + $YearEndHindi->oral_storyhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndHindi->oral_frndhA+$YearEndHindi->oral_conveyhA+ $YearEndHindi->oral_storyhA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->oral_frndhB+$YearEndHindi->oral_conveyhB+ $YearEndHindi->oral_storyhB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->oral_frndhC+$YearEndHindi->oral_conveyhC+ $YearEndHindi->oral_storyhC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->oral_frndhD+$YearEndHindi->oral_conveyhs+ $YearEndHindi->oral_storyhD)/3,2); ?></td>	
							<td> <?php  $YearEndR_A= number_format(($YearEndHindi->oral_frndhA  + $YearEndHindi->oral_frndhB*2+ $YearEndHindi->oral_frndhC*3 + $YearEndHindi->oral_frndhD*4)/$YearEndHindi->Total,2); 
								$YearEndR_B= number_format(($YearEndHindi->oral_conveyhA  + $YearEndHindi->oral_conveyhB*2+ $YearEndHindi->oral_conveyhC*3 + $YearEndHindi->oral_conveyhs*4)/$YearEndHindi->Total,2);
								$YearEndR_C= number_format(($YearEndHindi->oral_storyhA  + $YearEndHindi->oral_storyhB*2+ $YearEndHindi->oral_storyhC*3 + $YearEndHindi->oral_storyhD*4)/$YearEndHindi->Total,2);
								echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2)-number_format(($EntryHindi->oral_hindiA  + $EntryHindi->oral_hindiB*2+ $EntryHindi->oral_hindiC*3 + $EntryHindi->oral_hindiD*4)/$YearEndOral->Total,2); 
									?></td>
					    	</tr>
						 </tbody>
						 </table>
						 </div>

					<div class="col-sm-6">
					 <table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of ORAL ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">मौखिक भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_frndhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_frndhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_frndhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_frndhD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->oral_frndhA  + $Class2YearEndOralHindi->oral_frndhB*2+ $Class2YearEndOralHindi->oral_frndhC*3 + $Class2YearEndOralHindi->oral_frndhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_conveyhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_conveyhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_conveyhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_conveyhs); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->oral_conveyhA  + $Class2YearEndOralHindi->oral_conveyhB*2+ $Class2YearEndOralHindi->oral_conveyhC*3 + $Class2YearEndOralHindi->oral_conveyhs*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    	<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_storyhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_storyhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_storyhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->oral_storyhD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->oral_storyhA  + $Class2YearEndOralHindi->oral_storyhB*2+ $Class2YearEndOralHindi->oral_storyhC*3 + $Class2YearEndOralHindi->oral_storyhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($Class2YearEndOralHindi->oral_frndhA+$Class2YearEndOralHindi->oral_conveyhA+ $Class2YearEndOralHindi->oral_storyhA)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->oral_frndhB+$Class2YearEndOralHindi->oral_conveyhB+ $Class2YearEndOralHindi->oral_storyhB)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->oral_frndhC+$Class2YearEndOralHindi->oral_conveyhC+ $Class2YearEndOralHindi->oral_storyhC)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->oral_frndhD+$Class2YearEndOralHindi->oral_conveyhs+ $Class2YearEndOralHindi->oral_storyhD)/3,2); ?></td>	
							<td> <?php  $YearEndR_A= number_format(($Class2YearEndOralHindi->oral_frndhA  + $Class2YearEndOralHindi->oral_frndhB*2+ $Class2YearEndOralHindi->oral_frndhC*3 + $Class2YearEndOralHindi->oral_frndhD*4)/$Class2YearEndOralHindi->Total,2); 
								$YearEndR_B= number_format(($Class2YearEndOralHindi->oral_conveyhA  + $Class2YearEndOralHindi->oral_conveyhB*2+ $Class2YearEndOralHindi->oral_conveyhC*3 + $Class2YearEndOralHindi->oral_conveyhs*4)/$Class2YearEndOralHindi->Total,2);
								$YearEndR_C= number_format(($Class2YearEndOralHindi->oral_storyhA  + $Class2YearEndOralHindi->oral_storyhB*2+ $Class2YearEndOralHindi->oral_storyhC*3 + $Class2YearEndOralHindi->oral_storyhD*4)/$Class2YearEndOralHindi->Total,2);
								echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndR_A+$YearEndR_B+$YearEndR_C)/3,2)-number_format(($EntryHindi->oral_hindiA  + $EntryHindi->oral_hindiB*2+ $EntryHindi->oral_hindiC*3 + $EntryHindi->oral_hindiD*4)/$YearEndOral->Total,2); 
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
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of READING ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndHindi->read_storyhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_storyhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_storyhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_storyhD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->read_storyhA  + $YearEndHindi->read_storyhB*2+ $YearEndHindi->read_storyhC*3 + $YearEndHindi->read_storyhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndHindi->read_soundhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_soundhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_soundhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_soundhD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->read_soundhA  + $YearEndHindi->read_soundhB*2+ $YearEndHindi->read_soundhC*3 + $YearEndHindi->read_soundhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndHindi->read_wordhA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_wordhB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_wordhC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->read_wordhD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->read_wordhA  + $YearEndHindi->read_wordhB*2+ $YearEndHindi->read_wordhC*3 + $YearEndHindi->read_wordhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndHindi->read_storyhA+$YearEndHindi->read_soundhA+ $YearEndHindi->read_wordhA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->read_storyhB+$YearEndHindi->read_soundhB+ $YearEndHindi->read_wordhB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->read_storyhC+$YearEndHindi->read_soundhC+ $YearEndHindi->read_wordhC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->read_storyhD+$YearEndHindi->read_soundhD+ $YearEndHindi->read_wordhD)/3,2); ?></td>
								<td> <?php  $YearEndWH_A= number_format(($YearEndHindi->read_storyhA  + $YearEndHindi->read_storyhB*2+ $YearEndHindi->read_storyhC*3 + $YearEndHindi->read_storyhD*4)/$YearEndHindi->Total,2); 
								$YearEndWH_B= number_format(($YearEndHindi->read_soundhA  + $YearEndHindi->read_soundhB*2+ $YearEndHindi->read_soundhC*3 + $YearEndHindi->read_soundhD*4)/$YearEndHindi->Total,2);
								$YearEndWH_C= number_format(($YearEndHindi->read_wordhA  + $YearEndHindi->read_wordhB*2+ $YearEndHindi->read_wordhC*3 + $YearEndHindi->read_wordhD*4)/$YearEndHindi->Total,2);
								echo number_format(($YearEndWH_A+$YearEndWH_B+$YearEndWH_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndWH_A+$YearEndWH_B+$YearEndWH_C)/3,2)-number_format(($EntryHindi->read_hindiA  + $EntryHindi->read_hindiB*2+ $EntryHindi->read_hindiC*3 + $EntryHindi->read_hindiD*4)/$YearEndOral->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>	
						 </div>
						 <div class="col-sm-6">
					  <table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of READING ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_storyhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_storyhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_storyhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_storyhD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->read_storyhA  + $Class2YearEndOralHindi->read_storyhB*2+ $Class2YearEndOralHindi->read_storyhC*3 + $Class2YearEndOralHindi->read_storyhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_soundhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_soundhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_soundhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_soundhD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->read_soundhA  + $Class2YearEndOralHindi->read_soundhB*2+ $Class2YearEndOralHindi->read_soundhC*3 + $Class2YearEndOralHindi->read_soundhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_wordhA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_wordhB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_wordhC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->read_wordhD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->read_wordhA  + $Class2YearEndOralHindi->read_wordhB*2+ $Class2YearEndOralHindi->read_wordhC*3 + $Class2YearEndOralHindi->read_wordhD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->read_storyhA+$Class2YearEndOralHindi->read_soundhA+ $Class2YearEndOralHindi->read_wordhA)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->read_storyhB+$Class2YearEndOralHindi->read_soundhB+ $Class2YearEndOralHindi->read_wordhB)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->read_storyhC+$Class2YearEndOralHindi->read_soundhC+ $Class2YearEndOralHindi->read_wordhC)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->read_storyhD+$Class2YearEndOralHindi->read_soundhD+ $Class2YearEndOralHindi->read_wordhD)/3,2); ?></td>
								<td> <?php  $YearEndWH_A= number_format(($Class2YearEndOralHindi->read_storyhA  + $Class2YearEndOralHindi->read_storyhB*2+ $Class2YearEndOralHindi->read_storyhC*3 + $Class2YearEndOralHindi->read_storyhD*4)/$Class2YearEndOralHindi->Total,2); 
								$YearEndWH_B= number_format(($Class2YearEndOralHindi->read_soundhA  + $Class2YearEndOralHindi->read_soundhB*2+ $Class2YearEndOralHindi->read_soundhC*3 + $Class2YearEndOralHindi->read_soundhD*4)/$Class2YearEndOralHindi->Total,2);
								$YearEndWH_C= number_format(($Class2YearEndOralHindi->read_wordhA  + $Class2YearEndOralHindi->read_wordhB*2+ $Class2YearEndOralHindi->read_wordhC*3 + $Class2YearEndOralHindi->read_wordhD*4)/$Class2YearEndOralHindi->Total,2);
								echo number_format(($YearEndWH_A+$YearEndWH_B+$YearEndWH_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndWH_A+$YearEndWH_B+$YearEndWH_C)/3,2)-number_format(($EntryHindi->read_hindiA  + $EntryHindi->read_hindiB*2+ $EntryHindi->read_hindiC*3 + $EntryHindi->read_hindiD*4)/$YearEndOral->Total,2); 
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
					      <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of WRITING ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">लेखन  भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndHindi->writing_hindihA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->writing_hindihB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->writing_hindihC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->writing_hindihD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->writing_hindihA  + $YearEndHindi->writing_hindihB*2+ $YearEndHindi->writing_hindihC*3 + $YearEndHindi->writing_hindihD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndHindi->hindi_drawinghA); ?></td>
					    		<td><?php echo number_format($YearEndHindi->hindi_drawinghB); ?></td>
					    		<td><?php echo number_format($YearEndHindi->hindi_drawinghC); ?></td>
					    		<td><?php echo number_format($YearEndHindi->hindi_drawinghD); ?></td>
								<td> <?php  echo number_format(($YearEndHindi->hindi_drawinghA  + $YearEndHindi->hindi_drawinghB*2+ $YearEndHindi->hindi_drawinghC*3 + $YearEndHindi->hindi_drawinghD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	 <tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndHindi->writing_hindihA+$YearEndHindi->hindi_drawinghA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->writing_hindihB+$YearEndHindi->hindi_drawinghB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->writing_hindihC+$YearEndHindi->hindi_drawinghC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndHindi->writing_hindihD+$YearEndHindi->hindi_drawinghD)/2,2); ?></td>
								<td> <?php  $writing_hindih_T1= number_format(($YearEndHindi->writing_hindihA  + $YearEndHindi->writing_hindihB*2+ $YearEndHindi->writing_hindihC*3 + $YearEndHindi->writing_hindihD*4)/$YearEndHindi->Total,2); 
								$hindi_drawingh_T2= number_format(($YearEndHindi->hindi_drawinghA  + $YearEndHindi->hindi_drawinghB*2+ $YearEndHindi->hindi_drawinghC*3 + $YearEndHindi->hindi_drawinghD*4)/$YearEndHindi->Total,2);
								echo number_format(($writing_hindih_T1+$hindi_drawingh_T2)/2,2); 
									?></td>		
								<td> <?php  echo number_format(($writing_hindih_T1+$hindi_drawingh_T2)/2,2)-number_format(($EntryHindi->write_hindiA  + $EntryHindi->write_hindiB*2+ $EntryHindi->write_hindiC*3 + $EntryHindi->write_hindiD*4)/$YearEndOral->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 	<table class="table">
					    <thead> 
					      <th colspan="7" style="background: #4caf50 !important;">Year End Assessment of WRITING ABILITIES (HINDI)</th>
					      <tr>
					        <th style="width: 48%;">लेखन  भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->writing_hindihA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->writing_hindihB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->writing_hindihC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->writing_hindihD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->writing_hindihA  + $Class2YearEndOralHindi->writing_hindihB*2+ $Class2YearEndOralHindi->writing_hindihC*3 + $Class2YearEndOralHindi->writing_hindihD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->hindi_drawinghA); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->hindi_drawinghB); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->hindi_drawinghC); ?></td>
					    		<td><?php echo number_format($Class2YearEndOralHindi->hindi_drawinghD); ?></td>
								<td> <?php  echo number_format(($Class2YearEndOralHindi->hindi_drawinghA  + $Class2YearEndOralHindi->hindi_drawinghB*2+ $Class2YearEndOralHindi->hindi_drawinghC*3 + $Class2YearEndOralHindi->hindi_drawinghD*4)/$YearEndOral->Total,2); 
									?></td>								
					    	</tr> 
					    	 <tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($Class2YearEndOralHindi->writing_hindihA+$Class2YearEndOralHindi->hindi_drawinghA)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->writing_hindihB+$Class2YearEndOralHindi->hindi_drawinghB)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->writing_hindihC+$Class2YearEndOralHindi->hindi_drawinghC)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndOralHindi->writing_hindihD+$Class2YearEndOralHindi->hindi_drawinghD)/2,2); ?></td>
								<td> <?php  $writing_hindih_T1= number_format(($Class2YearEndOralHindi->writing_hindihA  + $Class2YearEndOralHindi->writing_hindihB*2+ $Class2YearEndOralHindi->writing_hindihC*3 + $Class2YearEndOralHindi->writing_hindihD*4)/$Class2YearEndOralHindi->Total,2); 
								$hindi_drawingh_T2= number_format(($Class2YearEndOralHindi->hindi_drawinghA  + $Class2YearEndOralHindi->hindi_drawinghB*2+ $Class2YearEndOralHindi->hindi_drawinghC*3 + $Class2YearEndOralHindi->hindi_drawinghD*4)/$Class2YearEndOralHindi->Total,2);
								echo number_format(($writing_hindih_T1+$hindi_drawingh_T2)/2,2); 
									?></td>		
								<td> <?php  echo number_format(($writing_hindih_T1+$hindi_drawingh_T2)/2,2)-number_format(($EntryHindi->write_hindiA  + $EntryHindi->write_hindiB*2+ $EntryHindi->write_hindiC*3 + $EntryHindi->write_hindiD*4)/$YearEndOral->Total,2); 
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
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students WITH Pre Schooling</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_converseA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_converseB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_converseC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_converseD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchl->oralpre_converseA  + $YearEndPreSchl->oralpre_converseB*2+ $YearEndPreSchl->oralpre_converseC*3 + $YearEndPreSchl->oralpre_converseD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_talksA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_talksB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_talksC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_talksD) ; ?></td>
								<td> <?php echo number_format(($YearEndPreSchl->oralpre_talksA  + $YearEndPreSchl->oralpre_talksB*2+ $YearEndPreSchl->oralpre_talksC*3 + $YearEndPreSchl->oralpre_talksD*4)/$YearEndPreSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_recitesA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_recitesB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_recitesC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->oralpre_recitesD) ; ?></td> 
								<td> <?php echo number_format(($YearEndPreSchl->oralpre_recitesA  + $YearEndPreSchl->oralpre_recitesB*2+ $YearEndPreSchl->oralpre_recitesC*3 + $YearEndPreSchl->oralpre_recitesD*4)/$YearEndPreSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchl->oralpre_converseA+$YearEndPreSchl->oralpre_talksA+ $YearEndPreSchl->oralpre_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->oralpre_converseB+$YearEndPreSchl->oralpre_talksB+ $YearEndPreSchl->oralpre_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->oralpre_converseC+$YearEndPreSchl->oralpre_talksC+ $YearEndPreSchl->oralpre_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->oralpre_converseD+$YearEndPreSchl->oralpre_talksD+ $YearEndPreSchl->oralpre_recitesD)/3,2); ?></td>
								<td> <?php  $YearEndPre_A= number_format(($YearEndPreSchl->oralpre_converseA  + $YearEndPreSchl->oralpre_converseB*2+ $YearEndPreSchl->oralpre_converseC*3 + $YearEndPreSchl->oralpre_converseD*4)/$YearEndPreSchl->Total,2); 
								$YearEndPre_B= number_format(($YearEndPreSchl->oralpre_talksA  + $YearEndPreSchl->oralpre_talksB*2+ $YearEndPreSchl->oralpre_talksC*3 + $YearEndPreSchl->oralpre_talksD*4)/$YearEndPreSchl->Total,2);
								$YearEndPre_C= number_format(($YearEndPreSchl->oralpre_recitesA  + $YearEndPreSchl->oralpre_recitesB*2+ $YearEndPreSchl->oralpre_recitesC*3 + $YearEndPreSchl->oralpre_recitesD*4)/$YearEndPreSchl->Total,2);
								echo number_format(($YearEndPre_A+$YearEndPre_B+$YearEndPre_C)/3,2); 
									?></td>	
						<td> <?php  echo number_format(($YearEndPre_A+$YearEndPre_B+$YearEndPre_C)/3,2)-number_format(($EntryDataPre->oral_PreA  + $EntryDataPre->oral_PreB*2+ $EntryDataPre->oral_PreC*3 + $EntryDataPre->oral_PreD*4)/$EntryDataPre->Total,2); 
									?></td>										
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 <table class="table">
					    <thead>
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students WITH Pre Schooling</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_i_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_i_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_i_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_i_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->oral_i_L1  + $Class2YearEndPreSchl->oral_i_L2*2+ $Class2YearEndPreSchl->oral_i_L3*3 + $Class2YearEndPreSchl->oral_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_ii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_ii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_ii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_ii_L4) ; ?></td>
								<td> <?php echo number_format(($Class2YearEndPreSchl->oral_ii_L1  + $Class2YearEndPreSchl->oral_ii_L2*2+ $Class2YearEndPreSchl->oral_ii_L3*3 + $Class2YearEndPreSchl->oral_ii_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_iii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_iii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_iii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->oral_iii_L4) ; ?></td> 
								<td> <?php echo number_format(($Class2YearEndPreSchl->oral_iii_L1  + $Class2YearEndPreSchl->oral_iii_L2*2+ $Class2YearEndPreSchl->oral_iii_L3*3 + $Class2YearEndPreSchl->oral_iii_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->oral_i_L1+$Class2YearEndPreSchl->oral_ii_L1+ $Class2YearEndPreSchl->oral_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->oral_i_L2+$Class2YearEndPreSchl->oral_ii_L2+ $Class2YearEndPreSchl->oral_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->oral_i_L3+$Class2YearEndPreSchl->oral_ii_L3+ $Class2YearEndPreSchl->oral_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->oral_i_L4+$Class2YearEndPreSchl->oral_ii_L4+ $Class2YearEndPreSchl->oral_iii_L4)/3,2); ?></td>
								<td> <?php  $YearEndPre_A= number_format(($Class2YearEndPreSchl->oral_i_L1  + $Class2YearEndPreSchl->oral_i_L2*2+ $Class2YearEndPreSchl->oral_i_L3*3 + $Class2YearEndPreSchl->oral_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
								$YearEndPre_B= number_format(($Class2YearEndPreSchl->oral_ii_L1  + $Class2YearEndPreSchl->oral_ii_L2*2+ $Class2YearEndPreSchl->oral_ii_L3*3 + $Class2YearEndPreSchl->oral_ii_L4*4)/$Class2YearEndPreSchl->Total,2);
								$YearEndPre_C= number_format(($Class2YearEndPreSchl->oral_iii_L1  + $Class2YearEndPreSchl->oral_iii_L2*2+ $Class2YearEndPreSchl->oral_iii_L3*3 + $Class2YearEndPreSchl->oral_iii_L4*4)/$Class2YearEndPreSchl->Total,2);
								echo number_format(($YearEndPre_A+$YearEndPre_B+$YearEndPre_C)/3,2); 
									?></td>	
						<td> <?php  echo number_format(($YearEndPre_A+$YearEndPre_B+$YearEndPre_C)/3,2)-number_format(($EntryDataPre->oral_PreA  + $EntryDataPre->oral_PreB*2+ $EntryDataPre->oral_PreC*3 + $EntryDataPre->oral_PreD*4)/$EntryDataPre->Total,2); 
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
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_partA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_partB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_partC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_partD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchl->readpre_partA  + $YearEndPreSchl->readpre_partB*2+ $YearEndPreSchl->readpre_partC*3 + $YearEndPreSchl->readpre_partD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($YearEndPreSchl->readpre_usesA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_usesB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_usesC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_usesD) ; ?></td>
								<td> <?php echo number_format(($YearEndPreSchl->readpre_usesA  + $YearEndPreSchl->readpre_usesB*2+ $YearEndPreSchl->readpre_usesC*3 + $YearEndPreSchl->readpre_usesD*4)/$YearEndPreSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_tenceA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_tenceB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_tenceC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->readpre_tenceD) ; ?></td> 
								<td> <?php echo number_format(($YearEndPreSchl->readpre_tenceA  + $YearEndPreSchl->readpre_tenceB*2+ $YearEndPreSchl->readpre_tenceC*3 + $YearEndPreSchl->readpre_tenceD*4)/$YearEndPreSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchl->readpre_partA+$YearEndPreSchl->readpre_usesA+ $YearEndPreSchl->readpre_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->readpre_partB+$YearEndPreSchl->readpre_usesB+ $YearEndPreSchl->readpre_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->readpre_partC+$YearEndPreSchl->readpre_usesC+ $YearEndPreSchl->readpre_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->readpre_partD+$YearEndPreSchl->readpre_usesD+ $YearEndPreSchl->readpre_tenceD)/3,2); ?></td>
								<td> <?php  $YearEndPreR_A= number_format(($YearEndPreSchl->readpre_partA  + $YearEndPreSchl->readpre_partB*2+ $YearEndPreSchl->readpre_partC*3 + $YearEndPreSchl->readpre_partD*4)/$YearEndPreSchl->Total,2); 
								$YearEndPreR_B= number_format(($YearEndPreSchl->readpre_usesA  + $YearEndPreSchl->readpre_usesB*2+ $YearEndPreSchl->readpre_usesC*3 + $YearEndPreSchl->readpre_usesD*4)/$YearEndPreSchl->Total,2);
								$YearEndPreR_C= number_format(($YearEndPreSchl->readpre_tenceA  + $YearEndPreSchl->readpre_tenceB*2+ $YearEndPreSchl->readpre_tenceC*3 + $YearEndPreSchl->readpre_tenceD*4)/$YearEndPreSchl->Total,2);
								echo number_format(($YearEndPreR_A+$YearEndPreR_B+$YearEndPreR_C)/3,2); 
									?></td>		
							<td> <?php  echo number_format(($YearEndPreR_A+$YearEndPreR_B+$YearEndPreR_C)/3,2)-number_format(($EntryDataPre->read_PreA  + $EntryDataPre->read_PreB*2+ $EntryDataPre->read_PreC*3 + $EntryDataPre->read_PreD*4)/$EntryDataPre->Total,2); 
									?></td>	
					    	</tr>
					    </tbody> 						
					</table>
					</div>
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
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_i_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_i_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_i_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_i_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->reading_i_L1  + $Class2YearEndPreSchl->reading_i_L2*2+ $Class2YearEndPreSchl->reading_i_L3*3 + $Class2YearEndPreSchl->reading_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_ii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_ii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_ii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_ii_L4) ; ?></td>
								<td> <?php echo number_format(($Class2YearEndPreSchl->reading_ii_L1  + $Class2YearEndPreSchl->reading_ii_L2*2+ $Class2YearEndPreSchl->reading_ii_L3*3 + $Class2YearEndPreSchl->reading_ii_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_iii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_iii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_iii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->reading_iii_L4) ; ?></td> 
								<td> <?php echo number_format(($Class2YearEndPreSchl->reading_iii_L1  + $Class2YearEndPreSchl->reading_iii_L2*2+ $Class2YearEndPreSchl->reading_iii_L3*3 + $Class2YearEndPreSchl->reading_iii_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->reading_i_L1+$Class2YearEndPreSchl->reading_ii_L1+ $Class2YearEndPreSchl->reading_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->reading_i_L2+$Class2YearEndPreSchl->reading_ii_L2+ $Class2YearEndPreSchl->reading_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->reading_i_L3+$Class2YearEndPreSchl->reading_ii_L3+ $Class2YearEndPreSchl->reading_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->reading_i_L4+$Class2YearEndPreSchl->reading_ii_L4+ $Class2YearEndPreSchl->reading_iii_L4)/3,2); ?></td>
								<td> <?php  $YearEndPreR_A= number_format(($Class2YearEndPreSchl->reading_i_L1  + $Class2YearEndPreSchl->reading_i_L2*2+ $Class2YearEndPreSchl->reading_i_L3*3 + $Class2YearEndPreSchl->reading_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
								$YearEndPreR_B= number_format(($Class2YearEndPreSchl->reading_ii_L1  + $Class2YearEndPreSchl->reading_ii_L2*2+ $Class2YearEndPreSchl->reading_ii_L3*3 + $Class2YearEndPreSchl->reading_ii_L4*4)/$Class2YearEndPreSchl->Total,2);
								$YearEndPreR_C= number_format(($Class2YearEndPreSchl->reading_iii_L1  + $Class2YearEndPreSchl->reading_iii_L2*2+ $Class2YearEndPreSchl->reading_iii_L3*3 + $Class2YearEndPreSchl->reading_iii_L4*4)/$Class2YearEndPreSchl->Total,2);
								echo number_format(($YearEndPreR_A+$YearEndPreR_B+$YearEndPreR_C)/3,2); 
									?></td>		
							<td> <?php  echo number_format(($YearEndPreR_A+$YearEndPreR_B+$YearEndPreR_C)/3,2)-number_format(($EntryDataPre->read_PreA  + $EntryDataPre->read_PreB*2+ $EntryDataPre->read_PreC*3 + $EntryDataPre->read_PreD*4)/$EntryDataPre->Total,2); 
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
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_wordA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_wordB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_wordC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_wordD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchl->writepre_wordA  + $YearEndPreSchl->writepre_wordB*2+ $YearEndPreSchl->writepre_wordC*3 + $YearEndPreSchl->writepre_wordD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_conveyA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_conveyB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_conveyC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchl->writepre_conveyD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchl->writepre_conveyA  + $YearEndPreSchl->writepre_conveyB*2+ $YearEndPreSchl->writepre_conveyC*3 + $YearEndPreSchl->writepre_conveyD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchl->writepre_wordA+$YearEndPreSchl->writepre_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->writepre_wordB+$YearEndPreSchl->writepre_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->writepre_wordC+$YearEndPreSchl->writepre_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchl->writepre_wordD+$YearEndPreSchl->writepre_conveyD)/2,2); ?></td>
								<td> <?php  $writepre_word_r1= number_format(($YearEndPreSchl->writepre_wordA  + $YearEndPreSchl->writepre_wordB*2+ $YearEndPreSchl->writepre_wordC*3 + $YearEndPreSchl->writepre_wordD*4)/$YearEndPreSchl->Total,2); 
								$writepre_convey_r2= number_format(($YearEndPreSchl->writepre_conveyA  + $YearEndPreSchl->writepre_conveyB*2+ $YearEndPreSchl->writepre_conveyC*3 + $YearEndPreSchl->writepre_conveyD*4)/$YearEndPreSchl->Total,2);
								echo number_format(($writepre_word_r1+$writepre_convey_r2)/2,2); 
									?></td>
								<td> <?php  echo number_format(($writepre_word_r1+$writepre_convey_r2)/2,2)-number_format(($EntryDataPre->write_PreA  + $EntryDataPre->write_PreB*2+ $EntryDataPre->write_PreC*3 + $EntryDataPre->write_PreD*4)/$EntryDataPre->Total,2); 
									?></td>	
							
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_i_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_i_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_i_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_i_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->writingh_i_L1  + $Class2YearEndPreSchl->writingh_i_L2*2+ $Class2YearEndPreSchl->writingh_i_L3*3 + $Class2YearEndPreSchl->writingh_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_ii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_ii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_ii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->writingh_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->writingh_ii_L1  + $Class2YearEndPreSchl->writingh_ii_L2*2+ $Class2YearEndPreSchl->writingh_ii_L3*3 + $Class2YearEndPreSchl->writingh_ii_L4*4)/$Class2YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->writingh_i_L1+$Class2YearEndPreSchl->writingh_ii_L1)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->writingh_i_L2+$Class2YearEndPreSchl->writingh_ii_L2)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->writingh_i_L3+$Class2YearEndPreSchl->writingh_ii_L3)/2,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->writingh_i_L4+$Class2YearEndPreSchl->writingh_ii_L4)/2,2); ?></td>
								<td> <?php  $writepre_word_r1= number_format(($Class2YearEndPreSchl->writingh_i_L1  + $Class2YearEndPreSchl->writingh_i_L2*2+ $Class2YearEndPreSchl->writingh_i_L3*3 + $Class2YearEndPreSchl->writingh_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
								$writepre_convey_r2= number_format(($Class2YearEndPreSchl->writingh_ii_L1  + $Class2YearEndPreSchl->writingh_ii_L2*2+ $Class2YearEndPreSchl->writingh_ii_L3*3 + $Class2YearEndPreSchl->writingh_ii_L4*4)/$Class2YearEndPreSchl->Total,2);
								echo number_format(($writepre_word_r1+$writepre_convey_r2)/2,2); 
									?></td>
								<td> <?php  echo number_format(($writepre_word_r1+$writepre_convey_r2)/2,2)-number_format(($EntryDataPre->write_PreA  + $EntryDataPre->write_PreB*2+ $EntryDataPre->write_PreC*3 + $EntryDataPre->write_PreD*4)/$EntryDataPre->Total,2); 
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
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_countA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_countB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_countC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_countD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_countA  + $YearEndPreNumSchl->pre_countB*2+ $YearEndPreNumSchl->pre_countC*3 + $YearEndPreNumSchl->pre_countD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_readA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_readB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_readC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_readD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_readA  + $YearEndPreNumSchl->pre_readB*2+ $YearEndPreNumSchl->pre_readC*3 + $YearEndPreNumSchl->pre_readD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_addA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_addB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_addC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_addD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_addA  + $YearEndPreNumSchl->pre_addB*2+ $YearEndPreNumSchl->pre_addC*3 + $YearEndPreNumSchl->pre_addD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_obsrA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_obsrB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_obsrC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_obsrD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_obsrA  + $YearEndPreNumSchl->pre_obsrB*2+ $YearEndPreNumSchl->pre_obsrC*3 + $YearEndPreNumSchl->pre_obsrD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using pre_-standard pre_-uniform units like hand span, footstep, fingers, etc and capacity using pre_standard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_unitA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_unitB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_unitC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_unitD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_unitA  + $YearEndPreNumSchl->pre_unitB*2+ $YearEndPreNumSchl->pre_unitC*3 + $YearEndPreNumSchl->pre_unitD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_reciteA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_reciteB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_reciteC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreNumSchl->pre_reciteD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreNumSchl->pre_reciteA  + $YearEndPreNumSchl->pre_reciteB*2+ $YearEndPreNumSchl->pre_reciteC*3 + $YearEndPreNumSchl->pre_reciteD*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>

							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreNumSchl->pre_countA+$YearEndPreNumSchl->pre_readA+ $YearEndPreNumSchl->pre_addA +$YearEndPreNumSchl->pre_obsrA+ $YearEndPreNumSchl->pre_unitA+ $YearEndPreNumSchl->pre_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreNumSchl->pre_countB+$YearEndPreNumSchl->pre_readB+ $YearEndPreNumSchl->pre_addB +$YearEndPreNumSchl->pre_obsrB+ $YearEndPreNumSchl->pre_unitB+ $YearEndPreNumSchl->pre_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreNumSchl->pre_countC+$YearEndPreNumSchl->pre_readC+ $YearEndPreNumSchl->pre_addC +$YearEndPreNumSchl->pre_obsrC+ $YearEndPreNumSchl->pre_unitC+ $YearEndPreNumSchl->pre_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreNumSchl->pre_countD+$YearEndPreNumSchl->pre_readD+ $YearEndPreNumSchl->pre_addD +$YearEndPreNumSchl->pre_obsrD+ $YearEndPreNumSchl->pre_unitD+ $YearEndPreNumSchl->pre_reciteD)/6,2); ?></td>
							<td> <?php  $pre_A= number_format(($YearEndPreNumSchl->pre_countA  + $YearEndPreNumSchl->pre_countB*2+ $YearEndPreNumSchl->pre_countC*3 + $YearEndPreNumSchl->pre_countD*4)/$YearEndPreNumSchl->Total,2); 
								$pre_B= number_format(($YearEndPreNumSchl->pre_readA  + $YearEndPreNumSchl->pre_readB*2+ $YearEndPreNumSchl->pre_readC*3 + $YearEndPreNumSchl->pre_readD*4)/$YearEndPreNumSchl->Total,2);
								$pre_C= number_format(($YearEndPreNumSchl->pre_addA  + $YearEndPreNumSchl->pre_addB*2+ $YearEndPreNumSchl->pre_addC*3 + $YearEndPreNumSchl->pre_addD*4)/$YearEndPreNumSchl->Total,2);
								$pre_D= number_format(($YearEndPreNumSchl->pre_obsrA  + $YearEndPreNumSchl->pre_obsrB*2+ $YearEndPreNumSchl->pre_obsrC*3 + $YearEndPreNumSchl->pre_obsrD*4)/$YearEndPreNumSchl->Total,2);
								$pre_E= number_format(($YearEndPreNumSchl->pre_unitA  + $YearEndPreNumSchl->pre_unitB*2+ $YearEndPreNumSchl->pre_unitC*3 + $YearEndPreNumSchl->pre_unitD*4)/$YearEndPreNumSchl->Total,2);
								$pre_F= number_format(($YearEndPreNumSchl->pre_reciteA  + $YearEndPreNumSchl->pre_reciteB*2+ $YearEndPreNumSchl->pre_reciteC*3 + $YearEndPreNumSchl->pre_reciteD*4)/$YearEndPreNumSchl->Total,2);
								echo number_format(($pre_A+$pre_B+$pre_C+$pre_D+$pre_E+$pre_F)/6,2); 
									?></td>	
							<td> <?php  echo number_format(($pre_A+$pre_B+$pre_C+$pre_D+$pre_E+$pre_F)/6,2)-number_format(($EntryDataPre->numeric_preA  + $EntryDataPre->numeric_preB*2+ $EntryDataPre->numeric_preC*3 + $EntryDataPre->numeric_preD*4)/$EntryDataPre->Total,2); 
									?></td>	
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 	<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_i_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_i_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_i_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_i_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_i_L1  + $Class2YearEndPreSchl->numeracy_i_L2*2+ $Class2YearEndPreSchl->numeracy_i_L3*3 + $Class2YearEndPreSchl->numeracy_i_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_ii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_ii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_ii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_ii_L1  + $Class2YearEndPreSchl->numeracy_ii_L2*2+ $Class2YearEndPreSchl->numeracy_ii_L3*3 + $Class2YearEndPreSchl->numeracy_ii_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iii_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iii_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iii_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iii_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_iii_L1  + $Class2YearEndPreSchl->numeracy_iii_L2*2+ $Class2YearEndPreSchl->numeracy_iii_L3*3 + $Class2YearEndPreSchl->numeracy_iii_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iv_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iv_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iv_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_iv_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_iv_L1  + $Class2YearEndPreSchl->numeracy_iv_L2*2+ $Class2YearEndPreSchl->numeracy_iv_L3*3 + $Class2YearEndPreSchl->numeracy_iv_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using pre_-standard pre_-uniform units like hand span, footstep, fingers, etc and capacity using pre_standard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_v_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_v_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_v_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_v_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_v_L1  + $Class2YearEndPreSchl->numeracy_v_L2*2+ $Class2YearEndPreSchl->numeracy_v_L3*3 + $Class2YearEndPreSchl->numeracy_v_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_vi_L1) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_vi_L2) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_vi_L3) ; ?></td>
					    		<td><?php echo number_format($Class2YearEndPreSchl->numeracy_vi_L4) ; ?></td>
								<td> <?php  echo number_format(($Class2YearEndPreSchl->numeracy_vi_L1  + $Class2YearEndPreSchl->numeracy_vi_L2*2+ $Class2YearEndPreSchl->numeracy_vi_L3*3 + $Class2YearEndPreSchl->numeracy_vi_L4*4)/$YearEndPreSchl->Total,2); 
									?></td>								
					    	</tr>

							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->numeracy_i_L1+$Class2YearEndPreSchl->numeracy_ii_L1+ $Class2YearEndPreSchl->numeracy_iii_L1 +$Class2YearEndPreSchl->numeracy_iv_L1+ $Class2YearEndPreSchl->numeracy_v_L1+ $Class2YearEndPreSchl->numeracy_vi_L1)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->numeracy_i_L2+$Class2YearEndPreSchl->numeracy_ii_L2+ $Class2YearEndPreSchl->numeracy_iii_L2 +$Class2YearEndPreSchl->numeracy_iv_L2+ $Class2YearEndPreSchl->numeracy_v_L2+ $Class2YearEndPreSchl->numeracy_vi_L2)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->numeracy_i_L3+$Class2YearEndPreSchl->numeracy_ii_L3+ $Class2YearEndPreSchl->numeracy_iii_L3 +$Class2YearEndPreSchl->numeracy_iv_L3+ $Class2YearEndPreSchl->numeracy_v_L3+ $Class2YearEndPreSchl->numeracy_vi_L3)/6,2); ?></td>
					    	<td><?php echo number_format(($Class2YearEndPreSchl->numeracy_i_L4+$Class2YearEndPreSchl->numeracy_ii_L4+ $Class2YearEndPreSchl->numeracy_iii_L4 +$Class2YearEndPreSchl->numeracy_iv_L4+ $Class2YearEndPreSchl->numeracy_v_L4+ $Class2YearEndPreSchl->numeracy_vi_L4)/6,2); ?></td>
							<td> <?php  $pre_A= number_format(($Class2YearEndPreSchl->numeracy_i_L1  + $Class2YearEndPreSchl->numeracy_i_L2*2+ $Class2YearEndPreSchl->numeracy_i_L3*3 + $Class2YearEndPreSchl->numeracy_i_L4*4)/$Class2YearEndPreSchl->Total,2); 
								$pre_B= number_format(($Class2YearEndPreSchl->numeracy_ii_L1  + $Class2YearEndPreSchl->numeracy_ii_L2*2+ $Class2YearEndPreSchl->numeracy_ii_L3*3 + $Class2YearEndPreSchl->numeracy_ii_L4*4)/$Class2YearEndPreSchl->Total,2);
								$pre_C= number_format(($Class2YearEndPreSchl->numeracy_iii_L1  + $Class2YearEndPreSchl->numeracy_iii_L2*2+ $Class2YearEndPreSchl->numeracy_iii_L3*3 + $Class2YearEndPreSchl->numeracy_iii_L4*4)/$Class2YearEndPreSchl->Total,2);
								$pre_D= number_format(($Class2YearEndPreSchl->numeracy_iv_L1  + $Class2YearEndPreSchl->numeracy_iv_L2*2+ $Class2YearEndPreSchl->numeracy_iv_L3*3 + $Class2YearEndPreSchl->numeracy_iv_L4*4)/$Class2YearEndPreSchl->Total,2);
								$pre_E= number_format(($Class2YearEndPreSchl->numeracy_v_L1  + $Class2YearEndPreSchl->numeracy_v_L2*2+ $Class2YearEndPreSchl->numeracy_v_L3*3 + $Class2YearEndPreSchl->numeracy_v_L4*4)/$Class2YearEndPreSchl->Total,2);
								$pre_F= number_format(($Class2YearEndPreSchl->numeracy_vi_L1  + $Class2YearEndPreSchl->numeracy_vi_L2*2+ $Class2YearEndPreSchl->numeracy_vi_L3*3 + $Class2YearEndPreSchl->numeracy_vi_L4*4)/$Class2YearEndPreSchl->Total,2);
								echo number_format(($pre_A+$pre_B+$pre_C+$pre_D+$pre_E+$pre_F)/6,2); 
									?></td>	
							<td> <?php  echo number_format(($pre_A+$pre_B+$pre_C+$pre_D+$pre_E+$pre_F)/6,2)-number_format(($EntryDataPre->numeric_preA  + $EntryDataPre->numeric_preB*2+ $EntryDataPre->numeric_preC*3 + $EntryDataPre->numeric_preD*4)/$EntryDataPre->Total,2); 
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
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_preA) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_preB) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_preC) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_preD) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->oral_preA  + $YearEndPreHindiSchl->oral_preB*2+ $YearEndPreHindiSchl->oral_preC*3 + $YearEndPreHindiSchl->oral_preD*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_conveypre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_conveypre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_conveypre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_conveypre_s) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->oral_conveypre_A  + $YearEndPreHindiSchl->oral_conveypre_B*2+ $YearEndPreHindiSchl->oral_conveypre_C*3 + $YearEndPreHindiSchl->oral_conveypre_s*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_storypre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_storypre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_storypre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->oral_storypre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->oral_storypre_A  + $YearEndPreHindiSchl->oral_storypre_B*2+ $YearEndPreHindiSchl->oral_storypre_C*3 + $YearEndPreHindiSchl->oral_storypre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreHindiSchl->oral_preA+$YearEndPreHindiSchl->oral_conveypre_A+ $YearEndPreHindiSchl->oral_storypre_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->oral_preB+$YearEndPreHindiSchl->oral_conveypre_B+ $YearEndPreHindiSchl->oral_storypre_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->oral_preC+$YearEndPreHindiSchl->oral_conveypre_C+ $YearEndPreHindiSchl->oral_storypre_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->oral_preD+$YearEndPreHindiSchl->oral_conveypre_s+ $YearEndPreHindiSchl->oral_storypre_D)/3,2); ?></td>
								<td> <?php  $YearEndPreOH_A= number_format(($YearEndPreHindiSchl->oral_preA  + $YearEndPreHindiSchl->oral_preB*2+ $YearEndPreHindiSchl->oral_preC*3 + $YearEndPreHindiSchl->oral_preD*4)/$YearEndPreHindiSchl->Total,2); 
								$YearEndPreOH_B= number_format(($YearEndPreHindiSchl->oral_conveypre_A  + $YearEndPreHindiSchl->oral_conveypre_B*2+ $YearEndPreHindiSchl->oral_conveypre_C*3 + $YearEndPreHindiSchl->oral_conveypre_s*4)/$YearEndPreHindiSchl->Total,2);
								$YearEndPreOH_C= number_format(($YearEndPreHindiSchl->oral_storypre_A  + $YearEndPreHindiSchl->oral_storypre_B*2+ $YearEndPreHindiSchl->oral_storypre_C*3 + $YearEndPreHindiSchl->oral_storypre_D*4)/$YearEndPreHindiSchl->Total,2); 
								echo number_format(($YearEndPreOH_A+$YearEndPreOH_B+$YearEndPreOH_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndPreOH_A+$YearEndPreOH_B+$YearEndPreOH_C)/3,2)-number_format(($EntryPreHindi->oral_hindipreA  + $EntryPreHindi->oral_hindipreB*2+ $EntryPreHindi->oral_hindipreC*3 + $EntryPreHindi->oral_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
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
					    		<td>(i). कक्षा में उपलब्ध प्रकाशित सामग्री/ पुस्तक के बारे में चर्चा एवं वार्तालाप करें।</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_i_l4	) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlorl->oral_preA  + $YearEndPreHindiSchlorl->oral_preB*2+ $YearEndPreHindiSchlorl->oral_preC*3 + $YearEndPreHindiSchlorl->oral_preD*4)/$YearEndPreHindiSchlorl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). प्रश्न करने और दूसरों को सुनने के लिए वार्तालाप में व्यस्त रहता है</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlorl->oral_conveypre_A  + $YearEndPreHindiSchlorl->oral_conveypre_B*2+ $YearEndPreHindiSchlorl->oral_conveypre_C*3 + $YearEndPreHindiSchlorl->oral_conveypre_s*4)/$YearEndPreHindiSchlorl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). गीतों/कविताओं का पाठ</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_iii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlorl->oral_hindi_iii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlorl->oral_storypre_A  + $YearEndPreHindiSchlorl->oral_storypre_B*2+ $YearEndPreHindiSchlorl->oral_storypre_C*3 + $YearEndPreHindiSchlorl->oral_storypre_D*4)/$YearEndPreHindiSchlorl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreHindiSchlorl->oral_hindi_i_L1+$YearEndPreHindiSchlorl->oral_hindi_ii_L1+ $YearEndPreHindiSchlorl->oral_hindi_iii_L1)/3,2); ?></td>
							
					    	<td><?php echo number_format(($YearEndPreHindiSchlorl->oral_hindi_i_L2+$YearEndPreHindiSchlorl->oral_hindi_ii_L2+ $YearEndPreHindiSchlorl->oral_hindi_iii_L2)/3,2); ?></td>
							
					    	<td><?php echo number_format(($YearEndPreHindiSchlorl->oral_hindi_i_L3+$YearEndPreHindiSchlorl->oral_hindi_ii_L3+ $YearEndPreHindiSchlorl->oral_hindi_iii_L3)/3,2); ?></td>
							
					    	<td><?php echo number_format(($YearEndPreHindiSchlorl->oral_hindi_i_L4+$YearEndPreHindiSchlorl->oral_hindi_ii_L4+ $YearEndPreHindiSchlorl->oral_hindi_iii_L4)/3,2); ?></td>

								<td> <?php  $YearEndPreOH_A= number_format(($YearEndPreHindiSchlorl->oral_preA  + $YearEndPreHindiSchlorl->oral_preB*2+ $YearEndPreHindiSchlorl->oral_preC*3 + $YearEndPreHindiSchlorl->oral_preD*4)/$YearEndPreHindiSchlorl->Total,2); 
								$YearEndPreOH_B= number_format(($YearEndPreHindiSchlorl->oral_conveypre_A  + $YearEndPreHindiSchlorl->oral_conveypre_B*2+ $YearEndPreHindiSchlorl->oral_conveypre_C*3 + $YearEndPreHindiSchlorl->oral_conveypre_s*4)/$YearEndPreHindiSchlorl->Total,2);
								$YearEndPreOH_C= number_format(($YearEndPreHindiSchlorl->oral_storypre_A  + $YearEndPreHindiSchlorl->oral_storypre_B*2+ $YearEndPreHindiSchlorl->oral_storypre_C*3 + $YearEndPreHindiSchlorl->oral_storypre_D*4)/$YearEndPreHindiSchlorl->Total,2); 
								echo number_format(($YearEndPreOH_A+$YearEndPreOH_B+$YearEndPreOH_C)/3,2); 
									?></td>	
							<td> <?php  echo number_format(($YearEndPreOH_A+$YearEndPreOH_B+$YearEndPreOH_C)/3,2)-number_format(($EntryPreHindi->oral_hindipreA  + $EntryPreHindi->oral_hindipreB*2+ $EntryPreHindi->oral_hindipreC*3 + $EntryPreHindi->oral_hindipreD*4)/$EntryPreHindi->Total,2); 
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
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_storypre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_storypre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_storypre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_storypre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->read_storypre_A  + $YearEndPreHindiSchl->read_storypre_B*2+ $YearEndPreHindiSchl->read_storypre_C*3 + $YearEndPreHindiSchl->read_storypre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_soundpre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_soundpre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_soundpre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_soundpre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->read_soundpre_A  + $YearEndPreHindiSchl->read_soundpre_B*2+ $YearEndPreHindiSchl->read_soundpre_C*3 + $YearEndPreHindiSchl->read_soundpre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_wordpre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_wordpre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_wordpre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->read_wordpre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->read_wordpre_A  + $YearEndPreHindiSchl->read_wordpre_B*2+ $YearEndPreHindiSchl->read_wordpre_C*3 + $YearEndPreHindiSchl->read_wordpre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreHindiSchl->read_storypre_A+$YearEndPreHindiSchl->read_soundpre_A+ $YearEndPreHindiSchl->read_wordpre_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->read_storypre_B+$YearEndPreHindiSchl->read_soundpre_B+ $YearEndPreHindiSchl->read_wordpre_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->read_storypre_C+$YearEndPreHindiSchl->read_soundpre_C+ $YearEndPreHindiSchl->read_wordpre_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->read_storypre_D+$YearEndPreHindiSchl->read_soundpre_D+ $YearEndPreHindiSchl->read_wordpre_D)/3,2); ?></td>
								<td> <?php  $YearEndPreOR_A= number_format(($YearEndPreHindiSchl->read_storypre_A  + $YearEndPreHindiSchl->read_storypre_B*2+ $YearEndPreHindiSchl->read_storypre_C*3 + $YearEndPreHindiSchl->read_storypre_D*4)/$YearEndPreHindiSchl->Total,2); 
								$YearEndPreOR_B= number_format(($YearEndPreHindiSchl->read_soundpre_A  + $YearEndPreHindiSchl->read_soundpre_B*2+ $YearEndPreHindiSchl->read_soundpre_C*3 + $YearEndPreHindiSchl->read_soundpre_D*4)/$YearEndPreHindiSchl->Total,2);
								$YearEndPreOR_C= number_format(($YearEndPreHindiSchl->read_wordpre_A  + $YearEndPreHindiSchl->read_wordpre_B*2+ $YearEndPreHindiSchl->read_wordpre_C*3 + $YearEndPreHindiSchl->read_wordpre_D*4)/$YearEndPreHindiSchl->Total,2);
								echo number_format(($YearEndPreOR_A+$YearEndPreOR_B+$YearEndPreOR_C)/3,2); 
									?></td>
							<td> <?php  echo number_format(($YearEndPreOR_A+$YearEndPreOR_B+$YearEndPreOR_C)/3,2)-number_format(($EntryPreHindi->read_hindipreA  + $EntryPreHindi->read_hindipreB*2+ $EntryPreHindi->read_hindipreC*3 + $EntryPreHindi->read_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>	
						 </div>
						 <div class="col-sm-6">
					      <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">पढ़न भाषा </th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). बाल साहित्य/ पाठ्यपुस्तक से कहानियों को पढ़ता है और सुनाता/पुन: सुनाता है।</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_i_l4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlreading->read_storypre_A  + $YearEndPreHindiSchlreading->read_storypre_B*2+ $YearEndPreHindiSchlreading->read_storypre_C*3 + $YearEndPreHindiSchlreading->read_storypre_D*4)/$YearEndPreHindiSchlreading->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii).  दिए गए शब्द के वर्णों से नए शब्द बनाता है।</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlreading->read_soundpre_A  + $YearEndPreHindiSchlreading->read_soundpre_B*2+ $YearEndPreHindiSchlreading->read_soundpre_C*3 + $YearEndPreHindiSchlreading->read_soundpre_D*4)/$YearEndPreHindiSchlreading->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii).  8 से 10 वाक्यों की सरल शब्दों की अज्ञात पाठ्य सामग्री को लगभग 30 से 45 शब्द प्रति मिनट की उपयुक्त गति से सही ढंग से और स्पष्टता के साथ पढ़ता है।</td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_iii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchlreading->reading_iii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchlreading->read_wordpre_A  + $YearEndPreHindiSchlreading->read_wordpre_B*2+ $YearEndPreHindiSchlreading->read_wordpre_C*3 + $YearEndPreHindiSchlreading->read_wordpre_D*4)/$YearEndPreHindiSchlreading->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreHindiSchlreading->reading_i_L1+$YearEndPreHindiSchlreading->reading_ii_L1+ $YearEndPreHindiSchlreading->reading_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchlreading->reading_i_L2+$YearEndPreHindiSchlreading->reading_ii_L2+ $YearEndPreHindiSchlreading->reading_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchlreading->reading_i_L3+$YearEndPreHindiSchlreading->reading_ii_L3+ $YearEndPreHindiSchlreading->reading_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchlreading->reading_i_L4+$YearEndPreHindiSchlreading->reading_ii_L4+ $YearEndPreHindiSchlreading->reading_iii_L4)/3,2); ?></td>
								<td> <?php  $YearEndPreOR_A= number_format(($YearEndPreHindiSchlreading->read_storypre_A  + $YearEndPreHindiSchlreading->read_storypre_B*2+ $YearEndPreHindiSchlreading->read_storypre_C*3 + $YearEndPreHindiSchlreading->read_storypre_D*4)/$YearEndPreHindiSchlreading->Total,2); 
								$YearEndPreOR_B= number_format(($YearEndPreHindiSchlreading->read_soundpre_A  + $YearEndPreHindiSchlreading->read_soundpre_B*2+ $YearEndPreHindiSchlreading->read_soundpre_C*3 + $YearEndPreHindiSchlreading->read_soundpre_D*4)/$YearEndPreHindiSchlreading->Total,2);
								$YearEndPreOR_C= number_format(($YearEndPreHindiSchlreading->read_wordpre_A  + $YearEndPreHindiSchlreading->read_wordpre_B*2+ $YearEndPreHindiSchlreading->read_wordpre_C*3 + $YearEndPreHindiSchlreading->read_wordpre_D*4)/$YearEndPreHindiSchlreading->Total,2);
								echo number_format(($YearEndPreOR_A+$YearEndPreOR_B+$YearEndPreOR_C)/3,2); 
									?></td>
							<td> <?php  echo number_format(($YearEndPreOR_A+$YearEndPreOR_B+$YearEndPreOR_C)/3,2)-number_format(($EntryPreHindi->read_hindipreA  + $EntryPreHindi->read_hindipreB*2+ $EntryPreHindi->read_hindipreC*3 + $EntryPreHindi->read_hindipreD*4)/$EntryPreHindi->Total,2); 
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
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->writing_hindipre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->writing_hindipre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->writing_hindipre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->writing_hindipre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->writing_hindipre_A  + $YearEndPreHindiSchl->writing_hindipre_B*2+ $YearEndPreHindiSchl->writing_hindipre_C*3 + $YearEndPreHindiSchl->writing_hindipre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->hindi_drawingpre_A) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->hindi_drawingpre_B) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->hindi_drawingpre_C) ; ?></td>
					    		<td><?php echo number_format($YearEndPreHindiSchl->hindi_drawingpre_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreHindiSchl->hindi_drawingpre_A  + $YearEndPreHindiSchl->hindi_drawingpre_B*2+ $YearEndPreHindiSchl->hindi_drawingpre_C*3 + $YearEndPreHindiSchl->hindi_drawingpre_D*4)/$YearEndPreHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreHindiSchl->writing_hindipre_A+$YearEndPreHindiSchl->hindi_drawingpre_A)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->writing_hindipre_B+$YearEndPreHindiSchl->hindi_drawingpre_B)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->writing_hindipre_C+$YearEndPreHindiSchl->hindi_drawingpre_C)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreHindiSchl->writing_hindipre_D+$YearEndPreHindiSchl->hindi_drawingpre_D)/2,2); ?></td>
								<td> <?php  $writing_hindipreH_r1= number_format(($YearEndPreHindiSchl->writing_hindipre_A  + $YearEndPreHindiSchl->writing_hindipre_B*2+ $YearEndPreHindiSchl->writing_hindipre_C*3 + $YearEndPreHindiSchl->writing_hindipre_D*4)/$YearEndPreHindiSchl->Total,2); 
								
								$hindi_drawingpreH_r2= number_format(($YearEndPreHindiSchl->hindi_drawingpre_A  + $YearEndPreHindiSchl->hindi_drawingpre_B*2+ $YearEndPreHindiSchl->hindi_drawingpre_C*3 + $YearEndPreHindiSchl->hindi_drawingpre_D*4)/$YearEndPreHindiSchl->Total,2); 
								echo number_format(($writing_hindipreH_r1+$hindi_drawingpreH_r2)/2,2); 
									?></td>	
								<td> <?php  echo number_format(($writing_hindipreH_r1+$hindi_drawingpreH_r2)/2,2)-number_format(($EntryPreHindi->write_hindipreA  + $EntryPreHindi->write_hindipreB*2+ $EntryPreHindi->write_hindipreC*3 + $EntryPreHindi->write_hindipreD*4)/$EntryPreHindi->Total,2); 
									?></td>
					    	</tr>
						 </tbody>
						 </table>
						 </div>
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
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlwriting->writing_hindipre_A  + $YearEndPreSchlwriting->writing_hindipre_B*2+ $YearEndPreSchlwriting->writing_hindipre_C*3 + $YearEndPreSchlwriting->writing_hindipre_D*4)/$YearEndPreSchlwriting->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting->writing_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlwriting->hindi_drawingpre_A  + $YearEndPreSchlwriting->hindi_drawingpre_B*2+ $YearEndPreSchlwriting->hindi_drawingpre_C*3 + $YearEndPreSchlwriting->hindi_drawingpre_D*4)/$YearEndPreSchlwriting->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreSchlwriting->writing_i_L1+$YearEndPreSchlwriting->writing_ii_L1)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting->writing_i_L2+$YearEndPreSchlwriting->writing_ii_L2)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting->writing_i_L3+$YearEndPreSchlwriting->writing_ii_L3)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting->writing_i_L4+$YearEndPreSchlwriting->writing_i_L4)/2,2); ?></td>
								<td> <?php  $writing_hindipreH_r1= number_format(($YearEndPreSchlwriting->writing_hindipre_A  + $YearEndPreSchlwriting->writing_hindipre_B*2+ $YearEndPreSchlwriting->writing_hindipre_C*3 + $YearEndPreSchlwriting->writing_hindipre_D*4)/$YearEndPreSchlwriting->Total,2); 
								
								$hindi_drawingpreH_r2= number_format(($YearEndPreSchlwriting->hindi_drawingpre_A  + $YearEndPreSchlwriting->hindi_drawingpre_B*2+ $YearEndPreSchlwriting->hindi_drawingpre_C*3 + $YearEndPreSchlwriting->hindi_drawingpre_D*4)/$YearEndPreSchlwriting->Total,2); 
								echo number_format(($writing_hindipreH_r1+$hindi_drawingpreH_r2)/2,2); 
									?></td>	
								<td> <?php  echo number_format(($writing_hindipreH_r1+$hindi_drawingpreH_r2)/2,2)-number_format(($EntryPreHindi->write_hindipreA  + $EntryPreHindi->write_hindipreB*2+ $EntryPreHindi->write_hindipreC*3 + $EntryPreHindi->write_hindipreD*4)/$EntryPreHindi->Total,2); 
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
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students WITH NO Pre Schooling.</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_converseA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_converseB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_converseC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_converseD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonSchl->oralnon_converseA  + $YearEndNonSchl->oralnon_converseB*2+ $YearEndNonSchl->oralnon_converseC*3 + $YearEndNonSchl->oralnon_converseD*4)/$YearEndNonSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_talksA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_talksB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_talksC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_talksD) ; ?></td>
								<td> <?php echo number_format(($YearEndNonSchl->oralnon_talksA  + $YearEndNonSchl->oralnon_talksB*2+ $YearEndNonSchl->oralnon_talksC*3 + $YearEndNonSchl->oralnon_talksD*4)/$YearEndNonSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_recitesA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_recitesB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_recitesC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->oralnon_recitesD) ; ?></td> 
								<td> <?php echo number_format(($YearEndNonSchl->oralnon_recitesA  + $YearEndNonSchl->oralnon_recitesB*2+ $YearEndNonSchl->oralnon_recitesC*3 + $YearEndNonSchl->oralnon_recitesD*4)/$YearEndNonSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonSchl->oralnon_converseA+$YearEndNonSchl->oralnon_talksA+ $YearEndNonSchl->oralnon_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->oralnon_converseB+$YearEndNonSchl->oralnon_talksB+ $YearEndNonSchl->oralnon_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->oralnon_converseC+$YearEndNonSchl->oralnon_talksC+ $YearEndNonSchl->oralnon_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->oralnon_converseD+$YearEndNonSchl->oralnon_talksD+ $YearEndNonSchl->oralnon_recitesD)/3,2); ?></td>
								<td> <?php  $oralor_A= number_format(($YearEndNonSchl->oralnon_converseA  + $YearEndNonSchl->oralnon_converseB*2+ $YearEndNonSchl->oralnon_converseC*3 + $YearEndNonSchl->oralnon_converseD*4)/$YearEndNonSchl->Total,2); 
								$oralor_B= number_format(($YearEndNonSchl->oralnon_talksA  + $YearEndNonSchl->oralnon_talksB*2+ $YearEndNonSchl->oralnon_talksC*3 + $YearEndNonSchl->oralnon_talksD*4)/$YearEndNonSchl->Total,2);
								$oralor_C= number_format(($YearEndNonSchl->oralnon_recitesA  + $YearEndNonSchl->oralnon_recitesB*2+ $YearEndNonSchl->oralnon_recitesC*3 + $YearEndNonSchl->oralnon_recitesD*4)/$YearEndNonSchl->Total,2);
								echo number_format(($oralor_A+$oralor_B+$oralor_C)/3,2); 
									?></td>	
<td> <?php  echo number_format(($oralor_A+$oralor_B+$oralor_C)/3,2)-number_format(($EntryDataNoPre->oral_NoPreA  + $EntryDataNoPre->oral_NoPreB*2+ $EntryDataNoPre->oral_NoPreC*3 + $EntryDataNoPre->oral_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>									
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					<table class="table">
					    <thead>
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students WITH NO Pre Schooling.</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse and talks about the print available in the classroom.</td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldata->oral_i_L1  + $YearEndPreSchloraldata->oral_L2*2+ $YearEndPreSchloraldata->oral_L3*3 + $YearEndPreSchloraldata->oral_L4*4)/$YearEndPreSchloraldata->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Engages in conversation to ask questions and listens to others</td>					    		
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_ii_L4) ; ?></td>
								<td> <?php echo number_format(($YearEndPreSchloraldata->oral_ii_L1  + $YearEndPreSchloraldata->oral_ii_L2*2+ $YearEndPreSchloraldata->oral_ii_L3*3 + $YearEndPreSchloraldata->oral_ii_L4*4)/$YearEndPreSchloraldata->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii).Recitation of songs/ poems</td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iii_L4) ; ?></td> 
								<td> <?php echo number_format(($YearEndPreSchloraldata->oral_iii_L1  + $YearEndPreSchloraldata->oral_iii_L2*2+ $YearEndPreSchloraldata->oral_iii_L3*3 + $YearEndPreSchloraldata->oral_iii_L4*4)/$YearEndPreSchloraldata->Total,2); 
									?></td>	
					    	</tr>
							<tr>
					    		<td>(iv).Repeats familiar words occurring in stories/ poems/ print.</td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iv_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iv_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iv_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldata->oral_iv_L4) ; ?></td> 
								<td> <?php echo number_format(($YearEndPreSchloraldata->oral_iv_L1  + $YearEndPreSchloraldata->oral_iv_L2*2+ $YearEndPreSchloraldata->oral_iv_L3*3 + $YearEndPreSchloraldata->oral_vi_L4*4)/$YearEndPreSchloraldata->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreSchloraldata->oral_i_L1+$YearEndPreSchloraldata->oral_ii_L1+ $YearEndPreSchloraldata->oral_iii_L1+ $YearEndPreSchloraldata->oral_iv_L1)/4,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldata->oral_i_L2+$YearEndPreSchloraldata->oral_ii_L2+ $YearEndPreSchloraldata->oral_iii_L2 + $YearEndPreSchloraldata->oral_iv_L2)/4,2); ?></td>
							
					    	<td><?php echo number_format(($YearEndPreSchloraldata->oral_i_L3+$YearEndPreSchloraldata->oral_ii_L3+ $YearEndPreSchloraldata->oral_iii_L3 + $YearEndPreSchloraldata->oral_iv_L3)/4,2); ?></td>
							
							<td><?php echo number_format(($YearEndPreSchloraldata->oral_i_L4+$YearEndPreSchloraldata->oral_ii_L4+ $YearEndPreSchloraldata->oral_iii_L4 + $YearEndPreSchloraldata->oral_iv_L4)/4,2); ?></td>
							
					    	<td><?php echo number_format(($YearEndPreSchloraldata->oralnon_converseD+$YearEndPreSchloraldata->oralnon_talksD+ $YearEndPreSchloraldata->oralnon_recitesD)/3,2); ?></td>
								<td> <?php  $oralor_A= number_format(($YearEndPreSchloraldata->oralnon_converseA  + $YearEndPreSchloraldata->oralnon_converseB*2+ $YearEndPreSchloraldata->oralnon_converseC*3 + $YearEndPreSchloraldata->oralnon_converseD*4)/$YearEndPreSchloraldata->Total,2); 
								$oralor_B= number_format(($YearEndPreSchloraldata->oralnon_talksA  + $YearEndPreSchloraldata->oralnon_talksB*2+ $YearEndPreSchloraldata->oralnon_talksC*3 + $YearEndPreSchloraldata->oralnon_talksD*4)/$YearEndPreSchloraldata->Total,2);
								$oralor_C= number_format(($YearEndPreSchloraldata->oralnon_recitesA  + $YearEndPreSchloraldata->oralnon_recitesB*2+ $YearEndPreSchloraldata->oralnon_recitesC*3 + $YearEndPreSchloraldata->oralnon_recitesD*4)/$YearEndPreSchloraldata->Total,2);
								echo number_format(($oralor_A+$oralor_B+$oralor_C)/3,2); 
									?></td>	
<td> <?php  echo number_format(($oralor_A+$oralor_B+$oralor_C)/3,2)-number_format(($EntryDataNoPre->oral_NoPreA  + $EntryDataNoPre->oral_NoPreB*2+ $EntryDataNoPre->oral_NoPreC*3 + $EntryDataNoPre->oral_NoPreD*4)/$EntryDataNoPre->Total,2); 
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
					        <th style="width: 48%;"> Reading Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_partA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_partB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_partC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_partD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonSchl->readnon_partA  + $YearEndNonSchl->readnon_partB*2+ $YearEndNonSchl->readnon_partC*3 + $YearEndNonSchl->readnon_partD*4)/$YearEndNonSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($YearEndNonSchl->read_usesA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->read_usesB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->read_usesC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->read_usesD) ; ?></td>
								<td> <?php echo number_format(($YearEndNonSchl->read_usesA  + $YearEndNonSchl->read_usesB*2+ $YearEndNonSchl->read_usesC*3 + $YearEndNonSchl->read_usesD*4)/$YearEndNonSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_tenceA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_tenceB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_tenceC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->readnon_tenceD) ; ?></td> 
								<td> <?php echo number_format(($YearEndNonSchl->readnon_tenceA  + $YearEndNonSchl->readnon_tenceB*2+ $YearEndNonSchl->readnon_tenceC*3 + $YearEndNonSchl->readnon_tenceD*4)/$YearEndNonSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonSchl->readnon_partA+$YearEndNonSchl->read_usesA+ $YearEndNonSchl->readnon_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->readnon_partB+$YearEndNonSchl->read_usesB+ $YearEndNonSchl->readnon_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->readnon_partC+$YearEndNonSchl->read_usesC+ $YearEndNonSchl->readnon_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->readnon_partD+$YearEndNonSchl->read_usesD+ $YearEndNonSchl->readnon_tenceD)/3,2); ?></td>
								<td> <?php  $oralrr_A= number_format(($YearEndNonSchl->readnon_partA  + $YearEndNonSchl->readnon_partB*2+ $YearEndNonSchl->readnon_partC*3 + $YearEndNonSchl->readnon_partD*4)/$YearEndNonSchl->Total,2); 
								$oralrr_B= number_format(($YearEndNonSchl->read_usesA  + $YearEndNonSchl->read_usesB*2+ $YearEndNonSchl->read_usesC*3 + $YearEndNonSchl->read_usesD*4)/$YearEndNonSchl->Total,2);
								$oralrr_C= number_format(($YearEndNonSchl->readnon_tenceA  + $YearEndNonSchl->readnon_tenceB*2+ $YearEndNonSchl->readnon_tenceC*3 + $YearEndNonSchl->readnon_tenceD*4)/$YearEndNonSchl->Total,2);
								echo number_format(($oralrr_A+$oralrr_B+$oralrr_C)/3,2); 
									?></td>		
										<td> <?php  echo number_format(($oralrr_A+$oralrr_B+$oralrr_C)/3,2)-number_format(($EntryDataNoPre->read_NoPreA  + $EntryDataNoPre->read_NoPreB*2+ $EntryDataNoPre->read_NoPreC*3 + $EntryDataNoPre->read_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>	
					    	</tr>
					    </tbody> 						
					</table>
					</div>

					<div class="col-sm-6">
					 <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;"> Reading Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
							<th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i).Reads and narrates /retells the stories from children's literature/ textbook</td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_i_L3) ; ?></td>
					    	
								<td> <?php  echo number_format(($YearEndPreSchloraldatareading->reading_i_L1  + $YearEndPreSchloraldatareading->reading_i_L2*2+ $YearEndPreSchloraldatareading->reading_i_L3*3 )/$YearEndPreSchloraldatareading->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Makes new words from the letters of a given word.</td>					    		
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_ii_L3) ; ?></td>
					    		
								<td> <?php echo number_format(($YearEndPreSchloraldatareading->reading_ii_L1  + $YearEndPreSchloraldatareading->reading_ii_L2*2+ $YearEndPreSchloraldatareading->reading_ii_L3*3)/$YearEndPreSchloraldatareading->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads unknown text of 8 to 10 sentences with simple words with appropriate speed approximately 30 to 45 words per minute correctly and clarity</td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatareading->reading_iii_L3) ; ?></td>
								<td> <?php echo number_format(($YearEndPreSchloraldatareading->readnon_tenceA  + $YearEndPreSchloraldatareading->reading_iii_L1*2+ $YearEndPreSchloraldatareading->reading_iii_L2*3 + $YearEndPreSchloraldatareading->reading_iii_L3*4)/$YearEndPreSchloraldatareading->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatareading->reading_i_L1+$YearEndPreSchloraldatareading->reading_ii_L1+ $YearEndPreSchloraldatareading->reading_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatareading->reading_i_L2+$YearEndPreSchloraldatareading->reading_ii_L2+ $YearEndPreSchloraldatareading->reading_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatareading->reading_i_L3+$YearEndPreSchloraldatareading->reading_ii_L3+ $YearEndPreSchloraldatareading->reading_iii_L3)/3,2); ?></td>
					    
								<td> <?php  $oralrr_A= number_format(($YearEndPreSchloraldatareading->readnon_partA  + $YearEndPreSchloraldatareading->readnon_partB*2+ $YearEndPreSchloraldatareading->readnon_partC*3 + $YearEndPreSchloraldatareading->readnon_partD*4)/$YearEndPreSchloraldatareading->Total,2); 
								$oralrr_B= number_format(($YearEndPreSchloraldatareading->read_usesA  + $YearEndPreSchloraldatareading->read_usesB*2+ $YearEndPreSchloraldatareading->read_usesC*3 + $YearEndPreSchloraldatareading->read_usesD*4)/$YearEndPreSchloraldatareading->Total,2);
								$oralrr_C= number_format(($YearEndPreSchloraldatareading->readnon_tenceA  + $YearEndPreSchloraldatareading->readnon_tenceB*2+ $YearEndPreSchloraldatareading->readnon_tenceC*3 + $YearEndPreSchloraldatareading->readnon_tenceD*4)/$YearEndPreSchloraldatareading->Total,2);
								echo number_format(($oralrr_A+$oralrr_B+$oralrr_C)/3,2); 
									?></td>		
										<td> <?php  echo number_format(($oralrr_A+$oralrr_B+$oralrr_C)/3,2)-number_format(($EntryDataNoPre->read_NoPreA  + $EntryDataNoPre->read_NoPreB*2+ $EntryDataNoPre->read_NoPreC*3 + $EntryDataNoPre->read_NoPreD*4)/$EntryDataNoPre->Total,2); 
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
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_wordA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_wordB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_wordC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_wordD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonSchl->writenon_wordA  + $YearEndNonSchl->writenon_wordB*2+ $YearEndNonSchl->writenon_wordC*3 + $YearEndNonSchl->writenon_wordD*4)/$YearEndNonSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_conveyA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_conveyB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_conveyC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonSchl->writenon_conveyD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonSchl->writenon_conveyA  + $YearEndNonSchl->writenon_conveyB*2+ $YearEndNonSchl->writenon_conveyC*3 + $YearEndNonSchl->writenon_conveyD*4)/$YearEndNonSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonSchl->writenon_wordA+$YearEndNonSchl->writenon_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->writenon_wordB+$YearEndNonSchl->writenon_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->writenon_wordC+$YearEndNonSchl->writenon_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonSchl->writenon_wordD+$YearEndNonSchl->writenon_conveyD)/2,2); ?></td>
								<td> <?php  $writenon_wordwr1= number_format(($YearEndNonSchl->writenon_wordA  + $YearEndNonSchl->writenon_wordB*2+ $YearEndNonSchl->writenon_wordC*3 + $YearEndNonSchl->writenon_wordD*4)/$YearEndNonSchl->Total,2); 
								$hindi_drawingpreH_wr2= number_format(($YearEndNonSchl->writenon_conveyA  + $YearEndNonSchl->writenon_conveyB*2+ $YearEndNonSchl->writenon_conveyC*3 + $YearEndNonSchl->writenon_conveyD*4)/$YearEndNonSchl->Total,2);
								echo number_format(($writenon_wordwr1+$hindi_drawingpreH_wr2)/2,2); 
									?></td>	
								<td> <?php  echo number_format(($writenon_wordwr1+$hindi_drawingpreH_wr2)/2,2)-number_format(($EntryDataNoPre->write_NoPreA  + $EntryDataNoPre->write_NoPreB*2+ $EntryDataNoPre->write_NoPreC*3 + $EntryDataNoPre->write_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>		
					    	</tr>
						 </tbody>
						 </table>
						 </div>

					<div class="col-sm-6">
					 <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i).Writes short/ simple sentences correctly to express herself.</td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldatawriting->writing_i_L1  + $YearEndPreSchloraldatawriting->writing_i_L2*2+ $YearEndPreSchloraldatawriting->writing_i_L3*3 + $YearEndPreSchloraldatawriting->writing_i_L4*4)/$YearEndPreSchloraldatawriting->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Recognises naming words , action words and punctuation marks.</td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldatawriting->writing_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldatawriting->writing_ii_L1  + $YearEndPreSchloraldatawriting->writing_ii_L2*2+ $YearEndPreSchloraldatawriting->writing_ii_L3*3 + $YearEndPreSchloraldatawriting->writing_ii_L4*4)/$YearEndPreSchloraldatawriting->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatawriting->writing_i_L1+$YearEndPreSchloraldatawriting->writing_ii_L1)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatawriting->writing_i_L2+$YearEndPreSchloraldatawriting->writing_ii_L2)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatawriting->writing_i_L3+$YearEndPreSchloraldatawriting->writing_ii_L3)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldatawriting->writing_i_L4+$YearEndPreSchloraldatawriting->writing_ii_L4)/2,2); ?></td>
								<td> <?php  $writenon_wordwr1= number_format(($YearEndPreSchloraldatawriting->writenon_wordA  + $YearEndPreSchloraldatawriting->writenon_wordB*2+ $YearEndPreSchloraldatawriting->writenon_wordC*3 + $YearEndPreSchloraldatawriting->writenon_wordD*4)/$YearEndPreSchloraldatawriting->Total,2); 
								$hindi_drawingpreH_wr2= number_format(($YearEndPreSchloraldatawriting->writenon_conveyA  + $YearEndPreSchloraldatawriting->writenon_conveyB*2+ $YearEndPreSchloraldatawriting->writenon_conveyC*3 + $YearEndPreSchloraldatawriting->writenon_conveyD*4)/$YearEndPreSchloraldatawriting->Total,2);
								echo number_format(($writenon_wordwr1+$hindi_drawingpreH_wr2)/2,2); 
									?></td>	
								<td> <?php  echo number_format(($writenon_wordwr1+$hindi_drawingpreH_wr2)/2,2)-number_format(($EntryDataNoPre->write_NoPreA  + $EntryDataNoPre->write_NoPreB*2+ $EntryDataNoPre->write_NoPreC*3 + $EntryDataNoPre->write_NoPreD*4)/$EntryDataNoPre->Total,2); 
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
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndNonNumSchl->noncountA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->noncountB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->noncountC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->noncountD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->noncountA  + $YearEndNonNumSchl->noncountB*2+ $YearEndNonNumSchl->noncountC*3 + $YearEndNonNumSchl->noncountD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreadA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreadB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreadC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreadD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->nonreadA  + $YearEndNonNumSchl->nonreadB*2+ $YearEndNonNumSchl->nonreadC*3 + $YearEndNonNumSchl->nonreadD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonaddA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonaddB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonaddC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonaddD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->nonaddA  + $YearEndNonNumSchl->nonaddB*2+ $YearEndNonNumSchl->nonaddC*3 + $YearEndNonNumSchl->nonaddD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonobsrA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonobsrB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonobsrC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonobsrD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->nonobsrA  + $YearEndNonNumSchl->nonobsrB*2+ $YearEndNonNumSchl->nonobsrC*3 + $YearEndNonNumSchl->nonobsrD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using non-standard non-uniform units like hand span, footstep, fingers, etc and capacity using nonstandard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonunitA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonunitB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonunitC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonunitD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->nonunitA  + $YearEndNonNumSchl->nonunitB*2+ $YearEndNonNumSchl->nonunitC*3 + $YearEndNonNumSchl->nonunitD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreciteA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreciteB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreciteC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonNumSchl->nonreciteD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonNumSchl->nonreciteA  + $YearEndNonNumSchl->nonreciteB*2+ $YearEndNonNumSchl->nonreciteC*3 + $YearEndNonNumSchl->nonreciteD*4)/$YearEndNonNumSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonNumSchl->noncountA+$YearEndNonNumSchl->nonreadA+ $YearEndNonNumSchl->nonaddA +$YearEndNonNumSchl->nonobsrA+ $YearEndNonNumSchl->nonunitA+ $YearEndNonNumSchl->nonreciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonNumSchl->noncountB+$YearEndNonNumSchl->nonreadB+ $YearEndNonNumSchl->nonaddB +$YearEndNonNumSchl->nonobsrB+ $YearEndNonNumSchl->nonunitB+ $YearEndNonNumSchl->nonreciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonNumSchl->noncountC+$YearEndNonNumSchl->nonreadC+ $YearEndNonNumSchl->nonaddC +$YearEndNonNumSchl->nonobsrC+ $YearEndNonNumSchl->nonunitC+ $YearEndNonNumSchl->nonreciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonNumSchl->noncountD+$YearEndNonNumSchl->nonreadD+ $YearEndNonNumSchl->nonaddD +$YearEndNonNumSchl->nonobsrD+ $YearEndNonNumSchl->nonunitD+ $YearEndNonNumSchl->nonreciteD)/6,2); ?></td>
							<td> <?php  $NUM_A= number_format(($YearEndNonNumSchl->noncountA  + $YearEndNonNumSchl->noncountB*2+ $YearEndNonNumSchl->noncountC*3 + $YearEndNonNumSchl->noncountD*4)/$YearEndNonNumSchl->Total,2); 
								$NUM_B= number_format(($YearEndNonNumSchl->nonreadA  + $YearEndNonNumSchl->nonreadB*2+ $YearEndNonNumSchl->nonreadC*3 + $YearEndNonNumSchl->nonreadD*4)/$YearEndNonNumSchl->Total,2);
								$NUM_C= number_format(($YearEndNonNumSchl->nonaddA  + $YearEndNonNumSchl->nonaddB*2+ $YearEndNonNumSchl->nonaddC*3 + $YearEndNonNumSchl->nonaddD*4)/$YearEndNonNumSchl->Total,2);
								$NUM_D= number_format(($YearEndNonNumSchl->nonobsrA  + $YearEndNonNumSchl->nonobsrB*2+ $YearEndNonNumSchl->nonobsrC*3 + $YearEndNonNumSchl->nonobsrD*4)/$YearEndNonNumSchl->Total,2);
								$NUM_E= number_format(($YearEndNonNumSchl->nonunitA  + $YearEndNonNumSchl->nonunitB*2+ $YearEndNonNumSchl->nonunitC*3 + $YearEndNonNumSchl->nonunitD*4)/$YearEndNonNumSchl->Total,2);
								$NUM_F= number_format(($YearEndNonNumSchl->nonreciteA  + $YearEndNonNumSchl->nonreciteB*2+ $YearEndNonNumSchl->nonreciteC*3 + $YearEndNonNumSchl->nonreciteD*4)/$YearEndNonNumSchl->Total,2);
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2); 
									?></td>	
<td> <?php  echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2)-number_format(($EntryDataNoPre->numeric_NoPreA  + $EntryDataNoPre->numeric_NoPreB*2+ $EntryDataNoPre->numeric_NoPreC*3 + $EntryDataNoPre->numeric_NoPreD*4)/$EntryDataNoPre->Total,2); 
									?></td>									
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					  <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i).Reads and writes numbers up to 999 </td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->noncountA  + $YearEndPreSchloraldataNumeracy->numeracy_i_L1*2+ $YearEndPreSchloraldataNumeracy->numeracy_i_L2*3 + $YearEndPreSchloraldataNumeracy->numeracy_i_L3 + $YearEndPreSchloraldataNumeracy->numeracy_i_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii).  Uses addition and subtraction of numbers up to 99, sum not exceeding situations 99 in daily life</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_ii_L1  + $YearEndPreSchloraldataNumeracy->numeracy_ii_L2*2+ $YearEndPreSchloraldataNumeracy->numeracy_ii_L3*3 + $YearEndPreSchloraldataNumeracy->numeracy_ii_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Performs multiplication as repeated addition and division as equal distribution/ sharing and constructs multiplication facts (tables) of 2, 3 and 4</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_iii_L1  + $YearEndPreSchloraldataNumeracy->numeracy_iii_L2*2+ $YearEndPreSchloraldataNumeracy->numeracy_iii_L3*3 + $YearEndPreSchloraldataNumeracy->numeracy_iii_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv).  Estimates and measure: length distance / capacity using nonstandard uniform units like rod, pencil, thread, cup, spoon, mug etc and compares weight using simple balance</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iv_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iv_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iv_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_iv_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_iv_L1  + $YearEndPreSchloraldataNumeracy->numeracy_iv_L2*2+ $YearEndPreSchloraldataNumeracy->numeracy_iv_L3*3 + $YearEndPreSchloraldataNumeracy->numeracy_iv_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v).Identifies and describes 2D & 3 D shapes like rectangle, triangle, circle, oval ,cone, cube, cuboid, sphere etc.</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_v_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_v_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_v_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_v_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_v_L1  + $YearEndPreSchloraldataNumeracy->numeracy_v_L2*2+ $YearEndPreSchloraldataNumeracy->numeracy_v_L3*3 + $YearEndPreSchloraldataNumeracy->numeracy_v_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Uses spatial vocabulary like far /near, in/out, above /below, front/ behind, left/right, top / bottom etc. </td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_vi_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_vi_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_vi_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataNumeracy->numeracy_vi_L1) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_vi_L1  + $YearEndPreSchloraldataNumeracy->numeracy_vi_L2*2+ $YearEndPreSchloraldataNumeracy->numeracy_vi_L3*3 + $YearEndPreSchloraldataNumeracy->numeracy_vi_L4*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_i_L1+$YearEndPreSchloraldataNumeracy->numeracy_ii_L1+ $YearEndPreSchloraldataNumeracy->numeracy_iii_L1 +$YearEndPreSchloraldataNumeracy->numeracy_iv_L1+ $YearEndPreSchloraldataNumeracy->numeracy_v_L1+ $YearEndPreSchloraldataNumeracy->numeracy_vi_L1)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_i_L2+$YearEndPreSchloraldataNumeracy->numeracy_ii_L2+ $YearEndPreSchloraldataNumeracy->numeracy_iii_L2 +$YearEndPreSchloraldataNumeracy->numeracy_iv_L2+ $YearEndPreSchloraldataNumeracy->numeracy_v_L2+ $YearEndPreSchloraldataNumeracy->numeracy_vi_L2)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_i_L3+$YearEndPreSchloraldataNumeracy->numeracy_ii_L3+ $YearEndPreSchloraldataNumeracy->numeracy_iii_L3 +$YearEndPreSchloraldataNumeracy->numeracy_iv_L3+ $YearEndPreSchloraldataNumeracy->numeracy_v_L3+ $YearEndPreSchloraldataNumeracy->numeracy_i_L3)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataNumeracy->numeracy_i_L4+$YearEndPreSchloraldataNumeracy->numeracy_ii_L4+ $YearEndPreSchloraldataNumeracy->numeracy_iii_L4 +$YearEndPreSchloraldataNumeracy->numeracy_iv_L4+ $YearEndPreSchloraldataNumeracy->numeracy_v_L4+ $YearEndPreSchloraldataNumeracy->numeracy_vi_L4)/6,2); ?></td>
							<td> <?php  $NUM_A= number_format(($YearEndPreSchloraldataNumeracy->noncountA  + $YearEndPreSchloraldataNumeracy->noncountB*2+ $YearEndPreSchloraldataNumeracy->noncountC*3 + $YearEndPreSchloraldataNumeracy->noncountD*4)/$YearEndPreSchloraldataNumeracy->Total,2); 
								$NUM_B= number_format(($YearEndPreSchloraldataNumeracy->nonreadA  + $YearEndPreSchloraldataNumeracy->nonreadB*2+ $YearEndPreSchloraldataNumeracy->nonreadC*3 + $YearEndPreSchloraldataNumeracy->nonreadD*4)/$YearEndPreSchloraldataNumeracy->Total,2);
								$NUM_C= number_format(($YearEndPreSchloraldataNumeracy->nonaddA  + $YearEndPreSchloraldataNumeracy->nonaddB*2+ $YearEndPreSchloraldataNumeracy->nonaddC*3 + $YearEndPreSchloraldataNumeracy->nonaddD*4)/$YearEndPreSchloraldataNumeracy->Total,2);
								$NUM_D= number_format(($YearEndPreSchloraldataNumeracy->nonobsrA  + $YearEndPreSchloraldataNumeracy->nonobsrB*2+ $YearEndPreSchloraldataNumeracy->nonobsrC*3 + $YearEndPreSchloraldataNumeracy->nonobsrD*4)/$YearEndPreSchloraldataNumeracy->Total,2);
								$NUM_E= number_format(($YearEndPreSchloraldataNumeracy->nonunitA  + $YearEndPreSchloraldataNumeracy->nonunitB*2+ $YearEndPreSchloraldataNumeracy->nonunitC*3 + $YearEndPreSchloraldataNumeracy->nonunitD*4)/$YearEndPreSchloraldataNumeracy->Total,2);
								$NUM_F= number_format(($YearEndPreSchloraldataNumeracy->nonreciteA  + $YearEndPreSchloraldataNumeracy->nonreciteB*2+ $YearEndPreSchloraldataNumeracy->nonreciteC*3 + $YearEndPreSchloraldataNumeracy->nonreciteD*4)/$YearEndPreSchloraldataNumeracy->Total,2);
								echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2); 
									?></td>	
<td> <?php  echo number_format(($NUM_A+$NUM_B+$NUM_C+$NUM_D+$NUM_E+$NUM_F)/6,2)-number_format(($EntryDataNoPre->numeric_NoPreA  + $EntryDataNoPre->numeric_NoPreB*2+ $EntryDataNoPre->numeric_NoPreC*3 + $EntryDataNoPre->numeric_NoPreD*4)/$EntryDataNoPre->Total,2); 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_nonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_nonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_nonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_nonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->oral_nonA  + $YearEndNonHindiSchl->oral_nonB*2+ $YearEndNonHindiSchl->oral_nonC*3 + $YearEndNonHindiSchl->oral_nonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_conveynonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_conveynonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_conveynonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_conveynons) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->oral_conveynonA  + $YearEndNonHindiSchl->oral_conveynonB*2+ $YearEndNonHindiSchl->oral_conveynonC*3 + $YearEndNonHindiSchl->oral_conveynons*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_storynonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_storynonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_storynonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->oral_storynonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->oral_storynonA  + $YearEndNonHindiSchl->oral_storynonB*2+ $YearEndNonHindiSchl->oral_storynonC*3 + $YearEndNonHindiSchl->oral_storynonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonHindiSchl->oral_nonA+$YearEndNonHindiSchl->oral_conveynonA+ $YearEndNonHindiSchl->oral_storynonA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->oral_nonB+$YearEndNonHindiSchl->oral_conveynonB+ $YearEndNonHindiSchl->oral_storynonB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->oral_nonC+$YearEndNonHindiSchl->oral_conveynonC+ $YearEndNonHindiSchl->oral_storynonC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->oral_nonD+$YearEndNonHindiSchl->oral_conveynons+ $YearEndNonHindiSchl->oral_storynonD)/3,2); ?></td>
								<td> <?php  $oral_non1= number_format(($YearEndNonHindiSchl->oral_nonA  + $YearEndNonHindiSchl->oral_nonB*2+ $YearEndNonHindiSchl->oral_nonC*3 + $YearEndNonHindiSchl->oral_nonD*4)/$YearEndNonHindiSchl->Total,2); 
								$oral_conveynon2= number_format(($YearEndNonHindiSchl->oral_conveynonA  + $YearEndNonHindiSchl->oral_conveynonB*2+ $YearEndNonHindiSchl->oral_conveynonC*3 + $YearEndNonHindiSchl->oral_conveynons*4)/$YearEndNonHindiSchl->Total,2);
								$oral_storynon3= number_format(($YearEndNonHindiSchl->oral_storynonA  + $YearEndNonHindiSchl->oral_storynonB*2+ $YearEndNonHindiSchl->oral_storynonC*3 + $YearEndNonHindiSchl->oral_storynonD*4)/$YearEndNonHindiSchl->Total,2);
								//echo $oral_non1.'-'.$oral_conveynon2.'-'.$oral_storynon3;
								echo number_format(($oral_non1+$oral_conveynon2+$oral_storynon3)/3,2); 
									?></td>			
	<td> <?php  echo number_format(($oral_non1+$oral_conveynon2+$oral_storynon3)/3,2)-number_format(($EntryNoPreHindi->oral_hindinopreA  + $EntryNoPreHindi->oral_hindinopreB*2+ $EntryNoPreHindi->oral_hindinopreC*3 + $EntryNoPreHindi->oral_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>										
					    	</tr>
						 </tbody>
						 </table>
						 </div>
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i).कक्षा में उपलब्ध प्रकाशित सामग्री/ पुस्तक के बारे में चर्चा एवं वार्तालाप करें।</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataoral->oral_i_L1  + $YearEndPreSchloraldataoral->oral_i_L2*2+ $YearEndPreSchloraldataoral->oral_i_L3*3 + $YearEndPreSchloraldataoral->oral_i_L4*4)/$YearEndPreSchloraldataoral->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). प्रश्न करने और दूसरों को सुनने के लिए वार्तालाप में व्यस्त रहता है।</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataoral->oral_ii_L1  + $YearEndPreSchloraldataoral->oral_ii_L2*2+ $YearEndPreSchloraldataoral->oral_ii_L3*3 + $YearEndPreSchloraldataoral->oral_ii_L4*4)/$YearEndPreSchloraldataoral->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). गीतों/कविताओं का पाठ</td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_iii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchloraldataoral->oral_iii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchloraldataoral->oral_iii_L1  + $YearEndPreSchloraldataoral->oral_iii_L2*2+ $YearEndPreSchloraldataoral->oral_iii_L3*3 + $YearEndPreSchloraldataoral->oral_iii_L4*4)/$YearEndPreSchloraldataoral->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreSchloraldataoral->oral_i_L1+$YearEndPreSchloraldataoral->oral_ii_L1+ $YearEndPreSchloraldataoral->oral_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataoral->oral_i_L2+$YearEndPreSchloraldataoral->oral_ii_L2+ $YearEndPreSchloraldataoral->oral_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataoral->oral_i_L3+$YearEndPreSchloraldataoral->oral_ii_L3+ $YearEndPreSchloraldataoral->oral_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchloraldataoral->oral_nonD+$YearEndPreSchloraldataoral->oral_conveynons+ $YearEndPreSchloraldataoral->oral_storynonD)/3,2); ?></td>
								<td> <?php  $oral_non1= number_format(($YearEndPreSchloraldataoral->oral_nonA  + $YearEndPreSchloraldataoral->oral_nonB*2+ $YearEndPreSchloraldataoral->oral_nonC*3 + $YearEndPreSchloraldataoral->oral_nonD*4)/$YearEndPreSchloraldataoral->Total,2); 
								$oral_conveynon2= number_format(($YearEndPreSchloraldataoral->oral_conveynonA  + $YearEndPreSchloraldataoral->oral_conveynonB*2+ $YearEndPreSchloraldataoral->oral_conveynonC*3 + $YearEndPreSchloraldataoral->oral_conveynons*4)/$YearEndPreSchloraldataoral->Total,2);
								$oral_storynon3= number_format(($YearEndPreSchloraldataoral->oral_storynonA  + $YearEndPreSchloraldataoral->oral_storynonB*2+ $YearEndPreSchloraldataoral->oral_storynonC*3 + $YearEndPreSchloraldataoral->oral_storynonD*4)/$YearEndPreSchloraldataoral->Total,2);
								//echo $oral_non1.'-'.$oral_conveynon2.'-'.$oral_storynon3;
								echo number_format(($oral_non1+$oral_conveynon2+$oral_storynon3)/3,2); 
									?></td>			
	<td> <?php  echo number_format(($oral_non1+$oral_conveynon2+$oral_storynon3)/3,2)-number_format(($EntryNoPreHindi->oral_hindinopreA  + $EntryNoPreHindi->oral_hindinopreB*2+ $EntryNoPreHindi->oral_hindinopreC*3 + $EntryNoPreHindi->oral_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_storynonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_storynonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_storynonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_storynonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->read_storynonA  + $YearEndNonHindiSchl->read_storynonB*2+ $YearEndNonHindiSchl->read_storynonC*3 + $YearEndNonHindiSchl->read_storynonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_soundnonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_soundnonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_soundnonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_soundnonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->read_soundnonA  + $YearEndNonHindiSchl->read_soundnonB*2+ $YearEndNonHindiSchl->read_soundnonC*3 + $YearEndNonHindiSchl->read_soundnonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_wordnonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_wordnonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_wordnonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->read_wordnonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->read_wordnonA  + $YearEndNonHindiSchl->read_wordnonB*2+ $YearEndNonHindiSchl->read_wordnonC*3 + $YearEndNonHindiSchl->read_wordnonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonHindiSchl->read_storynonA+$YearEndNonHindiSchl->read_soundnonA+ $YearEndNonHindiSchl->read_wordnonA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->read_storynonB+$YearEndNonHindiSchl->read_soundnonB+ $YearEndNonHindiSchl->read_wordnonB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->read_storynonC+$YearEndNonHindiSchl->read_soundnonC+ $YearEndNonHindiSchl->read_wordnonC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->read_storynonD+$YearEndNonHindiSchl->read_soundnonD+ $YearEndNonHindiSchl->read_wordnonD)/3,2); ?></td>
								<td> <?php  $read_storynon1= number_format(($YearEndNonHindiSchl->read_storynonA  + $YearEndNonHindiSchl->read_storynonB*2+ $YearEndNonHindiSchl->read_storynonC*3 + $YearEndNonHindiSchl->read_storynonD*4)/$YearEndNonHindiSchl->Total,2); 
								$read_soundnon2= number_format(($YearEndNonHindiSchl->read_soundnonA  + $YearEndNonHindiSchl->read_soundnonB*2+ $YearEndNonHindiSchl->read_soundnonC*3 + $YearEndNonHindiSchl->read_soundnonD*4)/$YearEndNonHindiSchl->Total,2);
								$read_wordnon3= number_format(($YearEndNonHindiSchl->read_wordnonA  + $YearEndNonHindiSchl->read_wordnonB*2+ $YearEndNonHindiSchl->read_wordnonC*3 + $YearEndNonHindiSchl->read_wordnonD*4)/$YearEndNonHindiSchl->Total,2);
								echo number_format(($read_storynon1+$read_soundnon2+$read_wordnon3)/3,2); 
									?></td>		
<td> <?php  echo number_format(($read_storynon1+$read_soundnon2+$read_wordnon3)/3,2)-number_format(($EntryNoPreHindi->read_hindinopreA  + $EntryNoPreHindi->read_hindinopreB*2+ $EntryNoPreHindi->read_hindinopreC*3 + $EntryNoPreHindi->read_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>									
					    	</tr> 
						 </tbody>
						 </table>
							</div>
						<div class="col-sm-6">
					      <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">पढ़न भाषा</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). बाल साहित्य/ पाठ्यपुस्तक से कहानियों को पढ़ता है और सुनाता/पुन: सुनाता है। </td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_i_L3) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlreading->reading_i_L1  + $YearEndPreSchlreading->reading_i_L2*2+ $YearEndPreSchlreading->reading_i_L3*3)/$YearEndPreSchlreading->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii).दिए गए शब्द के वर्णों से नए शब्द बनाता है।</td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_ii_L3) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlreading->reading_ii_L1  + $YearEndPreSchlreading->reading_ii_L2*2+ $YearEndPreSchlreading->reading_ii_L3*3)/$YearEndPreSchlreading->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). 8 से 10 वाक्यों की सरल शब्दों की अज्ञात पाठ्य सामग्री को लगभग 30 से 45 शब्द प्रति मिनट की उपयुक्त गति से सही ढंग से और स्पष्टता के साथ पढ़ता है।</td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_iii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_iii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlreading->reading_iii_L3) ; ?></td>
					    		
								<td> <?php  echo number_format(($YearEndPreSchlreading->reading_iii_L1  + $YearEndPreSchlreading->reading_iii_L3*2+ $YearEndPreSchlreading->reading_iii_L3*3)/$YearEndPreSchlreading->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreSchlreading->reading_i_L1+$YearEndPreSchlreading->reading_ii_L1+ $YearEndPreSchlreading->reading_iii_L1)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlreading->reading_i_L2+$YearEndPreSchlreading->reading_i_L2+ $YearEndPreSchlreading->reading_iii_L2)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlreading->reading_i_L3+$YearEndPreSchlreading->reading_ii_31+ $YearEndPreSchlreading->reading_iii_L3)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlreading->read_storynonD+$YearEndPreSchlreading->read_soundnonD+ $YearEndPreSchlreading->read_wordnonD)/3,2); ?></td>
								<td> <?php  $read_storynon1= number_format(($YearEndPreSchlreading->read_storynonA  + $YearEndPreSchlreading->read_storynonB*2+ $YearEndPreSchlreading->read_storynonC*3 + $YearEndPreSchlreading->read_storynonD*4)/$YearEndPreSchlreading->Total,2); 
								$read_soundnon2= number_format(($YearEndPreSchlreading->read_soundnonA  + $YearEndPreSchlreading->read_soundnonB*2+ $YearEndPreSchlreading->read_soundnonC*3 + $YearEndPreSchlreading->read_soundnonD*4)/$YearEndPreSchlreading->Total,2);
								$read_wordnon3= number_format(($YearEndPreSchlreading->read_wordnonA  + $YearEndPreSchlreading->read_wordnonB*2+ $YearEndPreSchlreading->read_wordnonC*3 + $YearEndPreSchlreading->read_wordnonD*4)/$YearEndPreSchlreading->Total,2);
								echo number_format(($read_storynon1+$read_soundnon2+$read_wordnon3)/3,2); 
									?></td>		
<td> <?php  echo number_format(($read_storynon1+$read_soundnon2+$read_wordnon3)/3,2)-number_format(($EntryNoPreHindi->read_hindinopreA  + $EntryNoPreHindi->read_hindinopreB*2+ $EntryNoPreHindi->read_hindinopreC*3 + $EntryNoPreHindi->read_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->writing_hindinonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->writing_hindinonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->writing_hindinonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->writing_hindinonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->writing_hindinonA  + $YearEndNonHindiSchl->writing_hindinonB*2+ $YearEndNonHindiSchl->writing_hindinonC*3 + $YearEndNonHindiSchl->writing_hindinonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->hindi_drawingnonA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->hindi_drawingnonB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->hindi_drawingnonC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonHindiSchl->hindi_drawingnonD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonHindiSchl->hindi_drawingnonA  + $YearEndNonHindiSchl->hindi_drawingnonB*2+ $YearEndNonHindiSchl->hindi_drawingnonC*3 + $YearEndNonHindiSchl->hindi_drawingnonD*4)/$YearEndNonHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	 <tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonHindiSchl->writing_hindinonA+$YearEndNonHindiSchl->hindi_drawingnonA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->writing_hindinonB+$YearEndNonHindiSchl->hindi_drawingnonB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->writing_hindinonC+$YearEndNonHindiSchl->hindi_drawingnonC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonHindiSchl->writing_hindinonD+$YearEndNonHindiSchl->hindi_drawingnonD)/2,2); ?></td>
								<td> <?php  $writing_hindinon1= number_format(($YearEndNonHindiSchl->writing_hindinonA  + $YearEndNonHindiSchl->writing_hindinonB*2+ $YearEndNonHindiSchl->writing_hindinonC*3 + $YearEndNonHindiSchl->writing_hindinonD*4)/$YearEndNonHindiSchl->Total,2); 
								$hindi_drawingnon2= number_format(($YearEndNonHindiSchl->hindi_drawingnonA  + $YearEndNonHindiSchl->hindi_drawingnonB*2+ $YearEndNonHindiSchl->hindi_drawingnonC*3 + $YearEndNonHindiSchl->hindi_drawingnonD*4)/$YearEndNonHindiSchl->Total,2);
								echo number_format(($writing_hindinon1+$hindi_drawingnon2)/2,2); 
									?></td>	
							
							<td> <?php  echo number_format(($writing_hindinon1+$hindi_drawingnon2)/2,2)-number_format(($EntryNoPreHindi->write_hindinopreA  + $EntryNoPreHindi->write_hindinopreB*2+ $EntryNoPreHindi->write_hindinopreC*3 + $EntryNoPreHindi->write_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>	
						</div>
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i).स्वयं को अभिव्यक्त करने के लिए छोटे/ सरल वाक्यों को सही ढंग से लिखता है।</td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_i_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_i_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_i_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_i_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlwriting_data->writing_i_L1  + $YearEndPreSchlwriting_data->writing_i_L2*2+ $YearEndPreSchlwriting_data->writing_i_L3*3 + $YearEndPreSchlwriting_data->writing_i_L4*4)/$YearEndPreSchlwriting_data->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii).संज्ञा शब्दों, क्रिया शब्दों और विराम चिह्नों को पहचानता है।</td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_ii_L1) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_ii_L2) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_ii_L3) ; ?></td>
					    		<td><?php echo number_format($YearEndPreSchlwriting_data->writing_ii_L4) ; ?></td>
								<td> <?php  echo number_format(($YearEndPreSchlwriting_data->writing_ii_L1  + $YearEndPreSchlwriting_data->writing_ii_L2*2+ $YearEndPreSchlwriting_data->writing_ii_L3*3 + $YearEndPreSchlwriting_data->writing_ii_L3*4)/$YearEndPreSchlwriting_data->Total,2); 
									?></td>								
					    	</tr> 
					    	 <tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndPreSchlwriting_data->writing_i_L1+$YearEndPreSchlwriting_data->writing_ii_L1)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting_data->writing_i_L2+$YearEndPreSchlwriting_data->writing_ii_L2)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting_data->writing_i_L3+$YearEndPreSchlwriting_data->writing_i_L3)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndPreSchlwriting_data->writing_i_L4+$YearEndPreSchlwriting_data->writing_i_L4)/2,2); ?></td>
								<td> <?php  $writing_hindinon1= number_format(($YearEndPreSchlwriting_data->writing_hindinonA  + $YearEndPreSchlwriting_data->writing_hindinonB*2+ $YearEndPreSchlwriting_data->writing_hindinonC*3 + $YearEndPreSchlwriting_data->writing_hindinonD*4)/$YearEndPreSchlwriting_data->Total,2); 
								$hindi_drawingnon2= number_format(($YearEndPreSchlwriting_data->hindi_drawingnonA  + $YearEndPreSchlwriting_data->hindi_drawingnonB*2+ $YearEndPreSchlwriting_data->hindi_drawingnonC*3 + $YearEndPreSchlwriting_data->hindi_drawingnonD*4)/$YearEndPreSchlwriting_data->Total,2);
								echo number_format(($writing_hindinon1+$hindi_drawingnon2)/2,2); 
									?></td>	
							
							<td> <?php  echo number_format(($writing_hindinon1+$hindi_drawingnon2)/2,2)-number_format(($EntryNoPreHindi->write_hindinopreA  + $EntryNoPreHindi->write_hindinopreB*2+ $EntryNoPreHindi->write_hindinopreC*3 + $EntryNoPreHindi->write_hindinopreD*4)/$EntryNoPreHindi->Total,2); 
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
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students WITH Educated Parents.</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th><th>Diff</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_converseA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_converseB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_converseC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_converseD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentSchl->oralparent_converseA  + $YearEndParentSchl->oralparent_converseB*2+ $YearEndParentSchl->oralparent_converseC*3 + $YearEndParentSchl->oralparent_converseD*4)/$YearEndParentSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_talksA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_talksB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_talksC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_talksD) ; ?></td>
								<td> <?php echo number_format(($YearEndParentSchl->oralparent_talksA  + $YearEndParentSchl->oralparent_talksB*2+ $YearEndParentSchl->oralparent_talksC*3 + $YearEndParentSchl->oralparent_talksD*4)/$YearEndParentSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_recitesA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_recitesB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_recitesC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->oralparent_recitesD) ; ?></td> 
								<td> <?php echo number_format(($YearEndParentSchl->oralparent_recitesA  + $YearEndParentSchl->oralparent_recitesB*2+ $YearEndParentSchl->oralparent_recitesC*3 + $YearEndParentSchl->oralparent_recitesD*4)/$YearEndParentSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndParentSchl->oralparent_converseA+$YearEndParentSchl->oralparent_talksA+ $YearEndParentSchl->oralparent_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->oralparent_converseB+$YearEndParentSchl->oralparent_talksB+ $YearEndParentSchl->oralparent_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->oralparent_converseC+$YearEndParentSchl->oralparent_talksC+ $YearEndParentSchl->oralparent_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->oralparent_converseD+$YearEndParentSchl->oralparent_talksD+ $YearEndParentSchl->oralparent_recitesD)/3,2); ?></td>
								<td> <?php  $oralorp_A= number_format(($YearEndParentSchl->oralparent_converseA  + $YearEndParentSchl->oralparent_converseB*2+ $YearEndParentSchl->oralparent_converseC*3 + $YearEndParentSchl->oralparent_converseD*4)/$YearEndParentSchl->Total,2); 
								$oralorp_B= number_format(($YearEndParentSchl->oralparent_talksA  + $YearEndParentSchl->oralparent_talksB*2+ $YearEndParentSchl->oralparent_talksC*3 + $YearEndParentSchl->oralparent_talksD*4)/$YearEndParentSchl->Total,2);
								$oralorp_C= number_format(($YearEndParentSchl->oralparent_recitesA  + $YearEndParentSchl->oralparent_recitesB*2+ $YearEndParentSchl->oralparent_recitesC*3 + $YearEndParentSchl->oralparent_recitesD*4)/$YearEndParentSchl->Total,2);
								echo number_format(($oralorp_A+$oralorp_B+$oralorp_C)/3,2); 
									?></td>		
<td> <?php  echo number_format(($oralorp_A+$oralorp_B+$oralorp_C)/3,2)- number_format(($EntryDataEdu->oral_EduA  + $EntryDataEdu->oral_EduB*2+ $EntryDataEdu->oral_EduC*3 + $EntryDataEdu->oral_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>										
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_partA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_partB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_partC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_partD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentSchl->readparent_partA  + $YearEndParentSchl->readparent_partB*2+ $YearEndParentSchl->readparent_partC*3 + $YearEndParentSchl->readparent_partD*4)/$YearEndParentSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($YearEndParentSchl->readparent_usesA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_usesB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_usesC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_usesD) ; ?></td>
								<td> <?php echo number_format(($YearEndParentSchl->readparent_usesA  + $YearEndParentSchl->readparent_usesB*2+ $YearEndParentSchl->readparent_usesC*3 + $YearEndParentSchl->readparent_usesD*4)/$YearEndParentSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_tenceA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_tenceB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_tenceC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->readparent_tenceD) ; ?></td> 
								<td> <?php echo number_format(($YearEndParentSchl->readparent_tenceA  + $YearEndParentSchl->readparent_tenceB*2+ $YearEndParentSchl->readparent_tenceC*3 + $YearEndParentSchl->readparent_tenceD*4)/$YearEndParentSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndParentSchl->readparent_partA+$YearEndParentSchl->readparent_usesA+ $YearEndParentSchl->readparent_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->readparent_partB+$YearEndParentSchl->readparent_usesB+ $YearEndParentSchl->readparent_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->readparent_partC+$YearEndParentSchl->readparent_usesC+ $YearEndParentSchl->readparent_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->readparent_partD+$YearEndParentSchl->readparent_usesD+ $YearEndParentSchl->readparent_tenceD)/3,2); ?></td>
								<td> <?php  $oralrrp_A= number_format(($YearEndParentSchl->readparent_partA  + $YearEndParentSchl->readparent_partB*2+ $YearEndParentSchl->readparent_partC*3 + $YearEndParentSchl->readparent_partD*4)/$YearEndParentSchl->Total,2); 
								$oralrrp_B= number_format(($YearEndParentSchl->readparent_usesA  + $YearEndParentSchl->readparent_usesB*2+ $YearEndParentSchl->readparent_usesC*3 + $YearEndParentSchl->readparent_usesD*4)/$YearEndParentSchl->Total,2);
								$oralrrp_C= number_format(($YearEndParentSchl->readparent_tenceA  + $YearEndParentSchl->readparent_tenceB*2+ $YearEndParentSchl->readparent_tenceC*3 + $YearEndParentSchl->readparent_tenceD*4)/$YearEndParentSchl->Total,2);
								echo number_format(($oralrrp_A+$oralrrp_B+$oralrrp_C)/3,2); 
									?></td>	<td> <?php  echo number_format(($oralrrp_A+$oralrrp_B+$oralrrp_C)/3,2)-number_format(($EntryDataEdu->read_EduA  + $EntryDataEdu->read_EduB*2+ $EntryDataEdu->read_EduC*3 + $EntryDataEdu->read_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>								
					    	</tr> 
					    </tbody> 						
					</table>
						</div>
						<div class="col-sm-6">
					   	 
						</div> 
						</div>
						
					<div class="row">
					
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_wordA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_wordB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_wordC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_wordD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentSchl->writeparent_wordA  + $YearEndParentSchl->writeparent_wordB*2+ $YearEndParentSchl->writeparent_wordC*3 + $YearEndParentSchl->writeparent_wordD*4)/$YearEndParentSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_conveyA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_conveyB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_conveyC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentSchl->writeparent_conveyD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentSchl->writeparent_conveyA  + $YearEndParentSchl->writeparent_conveyB*2+ $YearEndParentSchl->writeparent_conveyC*3 + $YearEndParentSchl->writeparent_conveyD*4)/$YearEndParentSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndParentSchl->writeparent_wordA+$YearEndParentSchl->writeparent_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->writeparent_wordB+$YearEndParentSchl->writeparent_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->writeparent_wordC+$YearEndParentSchl->writeparent_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentSchl->writeparent_wordD+$YearEndParentSchl->writeparent_conveyD)/2,2); ?></td>
								<td> <?php  $writeparent_wordr1= number_format(($YearEndParentSchl->writeparent_wordA  + $YearEndParentSchl->writeparent_wordB*2+ $YearEndParentSchl->writeparent_wordC*3 + $YearEndParentSchl->writeparent_wordD*4)/$YearEndParentSchl->Total,2); 
								$writeparent_convey2= number_format(($YearEndParentSchl->writeparent_conveyA  + $YearEndParentSchl->writeparent_conveyB*2+ $YearEndParentSchl->writeparent_conveyC*3 + $YearEndParentSchl->writeparent_conveyD*4)/$YearEndParentSchl->Total,2);
								echo number_format(($writeparent_wordr1+$writeparent_convey2)/2,2); 
									?></td>	<td> <?php  echo number_format(($writeparent_wordr1+$writeparent_convey2)/2,2)-number_format(($EntryDataEdu->write_EduA  + $EntryDataEdu->write_EduB*2+ $EntryDataEdu->write_EduC*3 + $EntryDataEdu->write_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>							
					    	</tr>
							
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
						</div> 
						</div>
						 <div class="row">
					
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_countA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_countB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_countC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_countD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_countA  + $YearEndParentNumSchl->parent_countB*2+ $YearEndParentNumSchl->parent_countC*3 + $YearEndParentNumSchl->parent_countD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_readA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_readB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_readC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_readD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_readA  + $YearEndParentNumSchl->parent_readB*2+ $YearEndParentNumSchl->parent_readC*3 + $YearEndParentNumSchl->parent_readD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_addA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_addB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_addC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_addD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_addA  + $YearEndParentNumSchl->parent_addB*2+ $YearEndParentNumSchl->parent_addC*3 + $YearEndParentNumSchl->parent_addD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_obsrA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_obsrB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_obsrC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_obsrD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_obsrA  + $YearEndParentNumSchl->parent_obsrB*2+ $YearEndParentNumSchl->parent_obsrC*3 + $YearEndParentNumSchl->parent_obsrD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using parent_-standard parent_-uniform units like hand span, footstep, fingers, etc and capacity using parent_standard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_unitA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_unitB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_unitC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_unitD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_unitA  + $YearEndParentNumSchl->parent_unitB*2+ $YearEndParentNumSchl->parent_unitC*3 + $YearEndParentNumSchl->parent_unitD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_reciteA) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_reciteB) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_reciteC) ; ?></td>
					    		<td><?php echo number_format($YearEndParentNumSchl->parent_reciteD) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentNumSchl->parent_reciteA  + $YearEndParentNumSchl->parent_reciteB*2+ $YearEndParentNumSchl->parent_reciteC*3 + $YearEndParentNumSchl->parent_reciteD*4)/$YearEndParentNumSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndParentNumSchl->parent_countA+$YearEndParentNumSchl->parent_readA+ $YearEndParentNumSchl->parent_addA +$YearEndParentNumSchl->parent_obsrA+ $YearEndParentNumSchl->parent_unitA+ $YearEndParentNumSchl->parent_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentNumSchl->parent_countB+$YearEndParentNumSchl->parent_readB+ $YearEndParentNumSchl->parent_addB +$YearEndParentNumSchl->parent_obsrB+ $YearEndParentNumSchl->parent_unitB+ $YearEndParentNumSchl->parent_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentNumSchl->parent_countC+$YearEndParentNumSchl->parent_readC+ $YearEndParentNumSchl->parent_addC +$YearEndParentNumSchl->parent_obsrC+ $YearEndParentNumSchl->parent_unitC+ $YearEndParentNumSchl->parent_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentNumSchl->parent_countD+$YearEndParentNumSchl->parent_readD+ $YearEndParentNumSchl->parent_addD +$YearEndParentNumSchl->parent_obsrD+ $YearEndParentNumSchl->parent_unitD+ $YearEndParentNumSchl->parent_reciteD)/6,2); ?></td>
							<td> <?php  $parent_count1= number_format(($YearEndParentNumSchl->parent_countA  + $YearEndParentNumSchl->parent_countB*2+ $YearEndParentNumSchl->parent_countC*3 + $YearEndParentNumSchl->parent_countD*4)/$YearEndParentNumSchl->Total,2); 
								$parent_read1= number_format(($YearEndParentNumSchl->parent_readA  + $YearEndParentNumSchl->parent_readB*2+ $YearEndParentNumSchl->parent_readC*3 + $YearEndParentNumSchl->parent_readD*4)/$YearEndParentNumSchl->Total,2);
								$parent_add3= number_format(($YearEndParentNumSchl->parent_addA  + $YearEndParentNumSchl->parent_addB*2+ $YearEndParentNumSchl->parent_addC*3 + $YearEndParentNumSchl->parent_addD*4)/$YearEndParentNumSchl->Total,2);
								$parent_obsr4= number_format(($YearEndParentNumSchl->parent_obsrA  + $YearEndParentNumSchl->parent_obsrB*2+ $YearEndParentNumSchl->parent_obsrC*3 + $YearEndParentNumSchl->parent_obsrD*4)/$YearEndParentNumSchl->Total,2);
								$parent_unit5= number_format(($YearEndParentNumSchl->parent_unitA  + $YearEndParentNumSchl->parent_unitB*2+ $YearEndParentNumSchl->parent_unitC*3 + $YearEndParentNumSchl->parent_unitD*4)/$YearEndParentNumSchl->Total,2);
								$parent_recite6= number_format(($YearEndParentNumSchl->parent_reciteA  + $YearEndParentNumSchl->parent_reciteB*2+ $YearEndParentNumSchl->parent_reciteC*3 + $YearEndParentNumSchl->parent_reciteD*4)/$YearEndParentNumSchl->Total,2);
								echo number_format(($parent_count1+$parent_read1+$parent_add3+$parent_obsr4+$parent_unit5+$parent_recite6)/6,2); 
									?></td>
<td> <?php  echo number_format(($parent_count1+$parent_read1+$parent_add3+$parent_obsr4+$parent_unit5+$parent_recite6)/6,2)-number_format(($EntryDataEdu->numeric_EduA  + $EntryDataEdu->numeric_EduB*2+ $EntryDataEdu->numeric_EduC*3 + $EntryDataEdu->numeric_EduD*4)/$EntryDataEdu->Total,2); 
									?></td>									
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_parent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_parent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_parent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_parent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->oral_parent_A  + $YearEndParentHindiSchl->oral_parent_B*2+ $YearEndParentHindiSchl->oral_parent_C*3 + $YearEndParentHindiSchl->oral_parent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_conveyparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_conveyparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_conveyparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_conveyparent_s) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->oral_conveyparent_A  + $YearEndParentHindiSchl->oral_conveyparent_B*2+ $YearEndParentHindiSchl->oral_conveyparent_C*3 + $YearEndParentHindiSchl->oral_conveyparent_s*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_storyparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_storyparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_storyparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->oral_storyparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->oral_storyparent_A  + $YearEndParentHindiSchl->oral_storyparent_B*2+ $YearEndParentHindiSchl->oral_storyparent_C*3 + $YearEndParentHindiSchl->oral_storyparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->oral_parent_A+$YearEndParentHindiSchl->oral_conveyparent_A+ $YearEndParentHindiSchl->oral_storyparent_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->oral_parent_B+$YearEndParentHindiSchl->oral_conveyparent_B+ $YearEndParentHindiSchl->oral_storyparent_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->oral_parent_C+$YearEndParentHindiSchl->oral_conveyparent_C+ $YearEndParentHindiSchl->oral_storyparent_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->oral_parent_D+$YearEndParentHindiSchl->oral_conveyparent_s+ $YearEndParentHindiSchl->oral_storyparent_D)/3,2); ?></td>
								<td> <?php  $oral_parent_1= number_format(($YearEndParentHindiSchl->oral_parent_A  + $YearEndParentHindiSchl->oral_parent_B*2+ $YearEndParentHindiSchl->oral_parent_C*3 + $YearEndParentHindiSchl->oral_parent_D*4)/$YearEndParentHindiSchl->Total,2); 
								$oral_conveyparent_2= number_format(($YearEndParentHindiSchl->oral_conveyparent_A  + $YearEndParentHindiSchl->oral_conveyparent_B*2+ $YearEndParentHindiSchl->oral_conveyparent_C*3 + $YearEndParentHindiSchl->oral_conveyparent_s*4)/$YearEndParentHindiSchl->Total,2);
								$oral_storyparent_3= number_format(($YearEndParentHindiSchl->oral_storyparent_A  + $YearEndParentHindiSchl->oral_storyparent_B*2+ $YearEndParentHindiSchl->oral_storyparent_C*3 + $YearEndParentHindiSchl->oral_storyparent_D*4)/$YearEndParentHindiSchl->Total,2);
								echo number_format(($oral_parent_1+$oral_conveyparent_2+$oral_storyparent_3)/3,2); 
									?></td>		
							<td> <?php  echo number_format(($oral_parent_1+$oral_conveyparent_2+$oral_storyparent_3)/3,2)-number_format(($EntryEduHindi->oral_hindi_EduA  + $EntryEduHindi->oral_hindi_EduB*2+ $EntryEduHindi->oral_hindi_EduC*3 + $EntryEduHindi->oral_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_storyparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_storyparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_storyparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_storyparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->read_storyparent_A  + $YearEndParentHindiSchl->read_storyparent_B*2+ $YearEndParentHindiSchl->read_storyparent_C*3 + $YearEndParentHindiSchl->read_storyparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_soundparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_soundparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_soundparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_soundparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->read_soundparent_A  + $YearEndParentHindiSchl->read_soundparent_B*2+ $YearEndParentHindiSchl->read_soundparent_C*3 + $YearEndParentHindiSchl->read_soundparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_wordparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_wordparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_wordparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->read_wordparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->read_wordparent_A  + $YearEndParentHindiSchl->read_wordparent_B*2+ $YearEndParentHindiSchl->read_wordparent_C*3 + $YearEndParentHindiSchl->read_wordparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndParentHindiSchl->read_storyparent_A+$YearEndParentHindiSchl->read_soundparent_A+ $YearEndParentHindiSchl->read_wordparent_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->read_storyparent_B+$YearEndParentHindiSchl->read_soundparent_B+ $YearEndParentHindiSchl->read_wordparent_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->read_storyparent_C+$YearEndParentHindiSchl->read_soundparent_C+ $YearEndParentHindiSchl->read_wordparent_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->read_storyparent_D+$YearEndParentHindiSchl->read_soundparent_D+ $YearEndParentHindiSchl->read_wordparent_D)/3,2); ?></td>
								<td> <?php  $read_storyparent_1= number_format(($YearEndParentHindiSchl->read_storyparent_A  + $YearEndParentHindiSchl->read_storyparent_B*2+ $YearEndParentHindiSchl->read_storyparent_C*3 + $YearEndParentHindiSchl->read_storyparent_D*4)/$YearEndParentHindiSchl->Total,2); 
								$read_soundparent_2= number_format(($YearEndParentHindiSchl->read_soundparent_A  + $YearEndParentHindiSchl->read_soundparent_B*2+ $YearEndParentHindiSchl->read_soundparent_C*3 + $YearEndParentHindiSchl->read_soundparent_D*4)/$YearEndParentHindiSchl->Total,2);
								$read_wordparent_3= number_format(($YearEndParentHindiSchl->read_wordparent_A  + $YearEndParentHindiSchl->read_wordparent_B*2+ $YearEndParentHindiSchl->read_wordparent_C*3 + $YearEndParentHindiSchl->read_wordparent_D*4)/$YearEndParentHindiSchl->Total,2);
								echo number_format(($read_storyparent_1+$read_soundparent_2+$read_wordparent_3)/3,2); 
									?></td>		
<td> <?php  echo number_format(($read_storyparent_1+$read_soundparent_2+$read_wordparent_3)/3,2)-number_format(($EntryEduHindi->read_hindi_EduA  + $EntryEduHindi->read_hindi_EduB*2+ $EntryEduHindi->read_hindi_EduC*3 + $EntryEduHindi->read_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>										
					    	</tr>
						 </tbody>
						 </table>	
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->writing_hindiparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->writing_hindiparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->writing_hindiparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->writing_hindiparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->writing_hindiparent_A  + $YearEndParentHindiSchl->writing_hindiparent_B*2+ $YearEndParentHindiSchl->writing_hindiparent_C*3 + $YearEndParentHindiSchl->writing_hindiparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->hindi_drawingparent_A) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->hindi_drawingparent_B) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->hindi_drawingparent_C) ; ?></td>
					    		<td><?php echo number_format($YearEndParentHindiSchl->hindi_drawingparent_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndParentHindiSchl->hindi_drawingparent_A  + $YearEndParentHindiSchl->hindi_drawingparent_B*2+ $YearEndParentHindiSchl->hindi_drawingparent_C*3 + $YearEndParentHindiSchl->hindi_drawingparent_D*4)/$YearEndParentHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndParentHindiSchl->writing_hindiparent_A+$YearEndParentHindiSchl->hindi_drawingparent_A)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->writing_hindiparent_B+$YearEndParentHindiSchl->hindi_drawingparent_B)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->writing_hindiparent_C+$YearEndParentHindiSchl->hindi_drawingparent_C)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndParentHindiSchl->writing_hindiparent_D+$YearEndParentHindiSchl->hindi_drawingparent_D)/2,2); ?></td>
								<td> <?php  $writing_hindiparent_1= number_format(($YearEndParentHindiSchl->writing_hindiparent_A  + $YearEndParentHindiSchl->writing_hindiparent_B*2+ $YearEndParentHindiSchl->writing_hindiparent_C*3 + $YearEndParentHindiSchl->writing_hindiparent_D*4)/$YearEndParentHindiSchl->Total,2); 
								$hindi_drawingparent_2= number_format(($YearEndParentHindiSchl->hindi_drawingparent_A  + $YearEndParentHindiSchl->hindi_drawingparent_B*2+ $YearEndParentHindiSchl->hindi_drawingparent_C*3 + $YearEndParentHindiSchl->hindi_drawingparent_D*4)/$YearEndParentHindiSchl->Total,2);
								echo number_format(($writing_hindiparent_1+$hindi_drawingparent_2)/2,2); 
									?></td>	
										<td> <?php  echo number_format(($writing_hindiparent_1+$hindi_drawingparent_2)/2,2)-number_format(($EntryEduHindi->write_hindi_EduA  + $EntryEduHindi->write_hindi_EduB*2+ $EntryEduHindi->write_hindi_EduC*3 + $EntryEduHindi->write_hindi_EduD*4)/$EntryEduHindi->Total,2); 
									?></td>	
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
					</div> 
						 </div>
						 <div class="row">
						 
					 
					<div class="col-sm-6">
						 <table class="table">
					    <thead>
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of students Who are First Generation Learners.</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_converseA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_converseB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_converseC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_converseD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduSchl->oralnonedu_converseA  + $YearEndNonEduSchl->oralnonedu_converseB*2+ $YearEndNonEduSchl->oralnonedu_converseC*3 + $YearEndNonEduSchl->oralnonedu_converseD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_talksA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_talksB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_talksC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_talksD) ; ?></td>
								<td> <?php echo number_format(($YearEndNonEduSchl->oralnonedu_talksA  + $YearEndNonEduSchl->oralnonedu_talksB*2+ $YearEndNonEduSchl->oralnonedu_talksC*3 + $YearEndNonEduSchl->oralnonedu_talksD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_recitesA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_recitesB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_recitesC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->oralnonedu_recitesD) ; ?></td> 
								<td> <?php echo number_format(($YearEndNonEduSchl->oralnonedu_recitesA  + $YearEndNonEduSchl->oralnonedu_recitesB*2+ $YearEndNonEduSchl->oralnonedu_recitesC*3 + $YearEndNonEduSchl->oralnonedu_recitesD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->oralnonedu_converseA+$YearEndNonEduSchl->oralnonedu_talksA+ $YearEndNonEduSchl->oralnonedu_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->oralnonedu_converseB+$YearEndNonEduSchl->oralnonedu_talksB+ $YearEndNonEduSchl->oralnonedu_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->oralnonedu_converseC+$YearEndNonEduSchl->oralnonedu_talksC+ $YearEndNonEduSchl->oralnonedu_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->oralnonedu_converseD+$YearEndNonEduSchl->oralnonedu_talksD+ $YearEndNonEduSchl->oralnonedu_recitesD)/3,2); ?></td>
								<td> <?php  $oralnonedu_converse1= number_format(($YearEndNonEduSchl->oralnonedu_converseA  + $YearEndNonEduSchl->oralnonedu_converseB*2+ $YearEndNonEduSchl->oralnonedu_converseC*3 + $YearEndNonEduSchl->oralnonedu_converseD*4)/$YearEndNonEduSchl->Total,2); 
								$oralnonedu_talks2= number_format(($YearEndNonEduSchl->oralnonedu_talksA  + $YearEndNonEduSchl->oralnonedu_talksB*2+ $YearEndNonEduSchl->oralnonedu_talksC*3 + $YearEndNonEduSchl->oralnonedu_talksD*4)/$YearEndNonEduSchl->Total,2);
								$oralnonedu_recites3= number_format(($YearEndNonEduSchl->oralnonedu_recitesA  + $YearEndNonEduSchl->oralnonedu_recitesB*2+ $YearEndNonEduSchl->oralnonedu_recitesC*3 + $YearEndNonEduSchl->oralnonedu_recitesD*4)/$YearEndNonEduSchl->Total,2);
								echo number_format(($oralnonedu_converse1+$oralnonedu_talks2+$oralnonedu_recites3)/3,2); 
									?></td>	
<td> <?php  echo number_format(($oralnonedu_converse1+$oralnonedu_talks2+$oralnonedu_recites3)/3,2)-number_format(($EntryDataNoEdu->oral_NoEduA  + $EntryDataNoEdu->oral_NoEduB*2+ $EntryDataNoEdu->oral_NoEduC*3 + $EntryDataNoEdu->oral_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>										
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_partA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_partB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_partC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_partD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduSchl->readnonedu_partA  + $YearEndNonEduSchl->readnonedu_partB*2+ $YearEndNonEduSchl->readnonedu_partC*3 + $YearEndNonEduSchl->readnonedu_partD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_usesA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_usesB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_usesC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_usesD) ; ?></td>
								<td> <?php echo number_format(($YearEndNonEduSchl->readnonedu_usesA  + $YearEndNonEduSchl->readnonedu_usesB*2+ $YearEndNonEduSchl->readnonedu_usesC*3 + $YearEndNonEduSchl->readnonedu_usesD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_tenceA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_tenceB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_tenceC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->readnonedu_tenceD) ; ?></td> 
								<td> <?php echo number_format(($YearEndNonEduSchl->readnonedu_tenceA  + $YearEndNonEduSchl->readnonedu_tenceB*2+ $YearEndNonEduSchl->readnonedu_tenceC*3 + $YearEndNonEduSchl->readnonedu_tenceD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonEduSchl->readnonedu_partA+$YearEndNonEduSchl->readnonedu_usesA+ $YearEndNonEduSchl->readnonedu_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->readnonedu_partB+$YearEndNonEduSchl->readnonedu_usesB+ $YearEndNonEduSchl->readnonedu_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->readnonedu_partC+$YearEndNonEduSchl->readnonedu_usesC+ $YearEndNonEduSchl->readnonedu_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->readnonedu_partD+$YearEndNonEduSchl->readnonedu_usesD+ $YearEndNonEduSchl->readnonedu_tenceD)/3,2); ?></td>
								<td> <?php  $readnonedu_part1= number_format(($YearEndNonEduSchl->readnonedu_partA  + $YearEndNonEduSchl->readnonedu_partB*2+ $YearEndNonEduSchl->readnonedu_partC*3 + $YearEndNonEduSchl->readnonedu_partD*4)/$YearEndNonEduSchl->Total,2); 
								$readnonedu_uses2= number_format(($YearEndNonEduSchl->readnonedu_usesA  + $YearEndNonEduSchl->readnonedu_usesB*2+ $YearEndNonEduSchl->readnonedu_usesC*3 + $YearEndNonEduSchl->readnonedu_usesD*4)/$YearEndNonEduSchl->Total,2);
								$readnonedu_tence3= number_format(($YearEndNonEduSchl->readnonedu_tenceA  + $YearEndNonEduSchl->readnonedu_tenceB*2+ $YearEndNonEduSchl->readnonedu_tenceC*3 + $YearEndNonEduSchl->readnonedu_tenceD*4)/$YearEndNonEduSchl->Total,2);
								echo number_format(($readnonedu_part1+$readnonedu_uses2+$readnonedu_tence3)/3,2); 
									?></td>		
<td> <?php  echo number_format(($readnonedu_part1+$readnonedu_uses2+$readnonedu_tence3)/3,2)- number_format(($EntryDataNoEdu->read_NoEduA  + $EntryDataNoEdu->read_NoEduB*2+ $EntryDataNoEdu->read_NoEduC*3 + $EntryDataNoEdu->read_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>									
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 
					</div> 
					</div>
						<div class="row">						 
					
					<div class="col-sm-6">
						<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_wordA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_wordB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_wordC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_wordD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduSchl->writenonedu_wordA  + $YearEndNonEduSchl->writenonedu_wordB*2+ $YearEndNonEduSchl->writenonedu_wordC*3 + $YearEndNonEduSchl->writenonedu_wordD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_conveyA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_conveyB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_conveyC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduSchl->writenonedu_conveyD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduSchl->writenonedu_conveyA  + $YearEndNonEduSchl->writenonedu_conveyB*2+ $YearEndNonEduSchl->writenonedu_conveyC*3 + $YearEndNonEduSchl->writenonedu_conveyD*4)/$YearEndNonEduSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonEduSchl->writenonedu_wordA+$YearEndNonEduSchl->writenonedu_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->writenonedu_wordB+$YearEndNonEduSchl->writenonedu_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->writenonedu_wordC+$YearEndNonEduSchl->writenonedu_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduSchl->writenonedu_wordD+$YearEndNonEduSchl->writenonedu_conveyD)/2,2); ?></td>
								<td> <?php  $writenonedu_word1= number_format(($YearEndNonEduSchl->writenonedu_wordA  + $YearEndNonEduSchl->writenonedu_wordB*2+ $YearEndNonEduSchl->writenonedu_wordC*3 + $YearEndNonEduSchl->writenonedu_wordD*4)/$YearEndNonEduSchl->Total,2); 
								$writenonedu_convey2= number_format(($YearEndNonEduSchl->writenonedu_conveyA  + $YearEndNonEduSchl->writenonedu_conveyB*2+ $YearEndNonEduSchl->writenonedu_conveyC*3 + $YearEndNonEduSchl->writenonedu_conveyD*4)/$YearEndNonEduSchl->Total,2);
								echo number_format(($writenonedu_word1+$writenonedu_convey2)/2,2); 
									?></td>	
<td> <?php  echo number_format(($writenonedu_word1+$writenonedu_convey2)/2,2)- number_format(($EntryDataNoEdu->write_NoEduA  + $EntryDataNoEdu->write_NoEduB*2+ $EntryDataNoEdu->write_NoEduC*3 + $EntryDataNoEdu->write_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>									
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
					</div> 
						 </div>
						 <div class="row">						 
					
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_countA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_countB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_countC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_countD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_countA  + $YearEndNonEduNumSchl->nonedu_countB*2+ $YearEndNonEduNumSchl->nonedu_countC*3 + $YearEndNonEduNumSchl->nonedu_countD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_readA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_readB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_readC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_readD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_readA  + $YearEndNonEduNumSchl->nonedu_readB*2+ $YearEndNonEduNumSchl->nonedu_readC*3 + $YearEndNonEduNumSchl->nonedu_readD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_addA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_addB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_addC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_addD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_addA  + $YearEndNonEduNumSchl->nonedu_addB*2+ $YearEndNonEduNumSchl->nonedu_addC*3 + $YearEndNonEduNumSchl->nonedu_addD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_obsrA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_obsrB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_obsrC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_obsrD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_obsrA  + $YearEndNonEduNumSchl->nonedu_obsrB*2+ $YearEndNonEduNumSchl->nonedu_obsrC*3 + $YearEndNonEduNumSchl->nonedu_obsrD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using nonedu_-standard nonedu_-uniform units like hand span, footstep, fingers, etc and capacity using nonedu_standard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_unitA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_unitB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_unitC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_unitD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_unitA  + $YearEndNonEduNumSchl->nonedu_unitB*2+ $YearEndNonEduNumSchl->nonedu_unitC*3 + $YearEndNonEduNumSchl->nonedu_unitD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_reciteA) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_reciteB) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_reciteC) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduNumSchl->nonedu_reciteD) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduNumSchl->nonedu_reciteA  + $YearEndNonEduNumSchl->nonedu_reciteB*2+ $YearEndNonEduNumSchl->nonedu_reciteC*3 + $YearEndNonEduNumSchl->nonedu_reciteD*4)/$YearEndNonEduNumSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonEduNumSchl->nonedu_countA+$YearEndNonEduNumSchl->nonedu_readA+ $YearEndNonEduNumSchl->nonedu_addA +$YearEndNonEduNumSchl->nonedu_obsrA+ $YearEndNonEduNumSchl->nonedu_unitA+ $YearEndNonEduNumSchl->nonedu_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduNumSchl->nonedu_countB+$YearEndNonEduNumSchl->nonedu_readB+ $YearEndNonEduNumSchl->nonedu_addB +$YearEndNonEduNumSchl->nonedu_obsrB+ $YearEndNonEduNumSchl->nonedu_unitB+ $YearEndNonEduNumSchl->nonedu_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduNumSchl->nonedu_countC+$YearEndNonEduNumSchl->nonedu_readC+ $YearEndNonEduNumSchl->nonedu_addC +$YearEndNonEduNumSchl->nonedu_obsrC+ $YearEndNonEduNumSchl->nonedu_unitC+ $YearEndNonEduNumSchl->nonedu_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduNumSchl->nonedu_countD+$YearEndNonEduNumSchl->nonedu_readD+ $YearEndNonEduNumSchl->nonedu_addD +$YearEndNonEduNumSchl->nonedu_obsrD+ $YearEndNonEduNumSchl->nonedu_unitD+ $YearEndNonEduNumSchl->nonedu_reciteD)/6,2); ?></td>
							<td> <?php  $nonedu_count1= number_format(($YearEndNonEduNumSchl->nonedu_countA  + $YearEndNonEduNumSchl->nonedu_countB*2+ $YearEndNonEduNumSchl->nonedu_countC*3 + $YearEndNonEduNumSchl->nonedu_countD*4)/$YearEndNonEduNumSchl->Total,2); 
								$nonedu_read1= number_format(($YearEndNonEduNumSchl->nonedu_readA  + $YearEndNonEduNumSchl->nonedu_readB*2+ $YearEndNonEduNumSchl->nonedu_readC*3 + $YearEndNonEduNumSchl->nonedu_readD*4)/$YearEndNonEduNumSchl->Total,2);
								$nonedu_add3= number_format(($YearEndNonEduNumSchl->nonedu_addA  + $YearEndNonEduNumSchl->nonedu_addB*2+ $YearEndNonEduNumSchl->nonedu_addC*3 + $YearEndNonEduNumSchl->nonedu_addD*4)/$YearEndNonEduNumSchl->Total,2);
								$nonedu_obsr4= number_format(($YearEndNonEduNumSchl->nonedu_obsrA  + $YearEndNonEduNumSchl->nonedu_obsrB*2+ $YearEndNonEduNumSchl->nonedu_obsrC*3 + $YearEndNonEduNumSchl->nonedu_obsrD*4)/$YearEndNonEduNumSchl->Total,2);
								$nonedu_unit5= number_format(($YearEndNonEduNumSchl->nonedu_unitA  + $YearEndNonEduNumSchl->nonedu_unitB*2+ $YearEndNonEduNumSchl->nonedu_unitC*3 + $YearEndNonEduNumSchl->nonedu_unitD*4)/$YearEndNonEduNumSchl->Total,2);
								$nonedu_recite6= number_format(($YearEndNonEduNumSchl->nonedu_reciteA  + $YearEndNonEduNumSchl->nonedu_reciteB*2+ $YearEndNonEduNumSchl->nonedu_reciteC*3 + $YearEndNonEduNumSchl->nonedu_reciteD*4)/$YearEndNonEduNumSchl->Total,2);
								echo number_format(($nonedu_count1+$nonedu_read1+$nonedu_add3+$nonedu_obsr4+$nonedu_unit5+$nonedu_recite6)/6,2); 
									?></td>
<td> <?php  echo number_format(($nonedu_count1+$nonedu_read1+$nonedu_add3+$nonedu_obsr4+$nonedu_unit5+$nonedu_recite6)/6,2)-  number_format(($EntryDataNoEdu->numeric_NoEduA  + $EntryDataNoEdu->numeric_NoEduB*2+ $EntryDataNoEdu->numeric_NoEduC*3 + $EntryDataNoEdu->numeric_NoEduD*4)/$EntryDataNoEdu->Total,2); 
									?></td>									
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_nonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_nonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_nonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_nonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->oral_nonedu_A  + $YearEndNonEduHindiSchl->oral_nonedu_B*2+ $YearEndNonEduHindiSchl->oral_nonedu_C*3 + $YearEndNonEduHindiSchl->oral_nonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_conveynonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_conveynonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_conveynonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_conveynonedu_s) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->oral_conveynonedu_A  + $YearEndNonEduHindiSchl->oral_conveynonedu_B*2+ $YearEndNonEduHindiSchl->oral_conveynonedu_C*3 + $YearEndNonEduHindiSchl->oral_conveynonedu_s*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_storynonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_storynonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_storynonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->oral_storynonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->oral_storynonedu_A  + $YearEndNonEduHindiSchl->oral_storynonedu_B*2+ $YearEndNonEduHindiSchl->oral_storynonedu_C*3 + $YearEndNonEduHindiSchl->oral_storynonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->oral_nonedu_A+$YearEndNonEduHindiSchl->oral_conveynonedu_A+ $YearEndNonEduHindiSchl->oral_storynonedu_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->oral_nonedu_B+$YearEndNonEduHindiSchl->oral_conveynonedu_B+ $YearEndNonEduHindiSchl->oral_storynonedu_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->oral_nonedu_C+$YearEndNonEduHindiSchl->oral_conveynonedu_C+ $YearEndNonEduHindiSchl->oral_storynonedu_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->oral_nonedu_D+$YearEndNonEduHindiSchl->oral_conveynonedu_s+ $YearEndNonEduHindiSchl->oral_storynonedu_D)/3,2); ?></td>
								<td> <?php  $oral_nonedu_1= number_format(($YearEndNonEduHindiSchl->oral_nonedu_A  + $YearEndNonEduHindiSchl->oral_nonedu_B*2+ $YearEndNonEduHindiSchl->oral_nonedu_C*3 + $YearEndNonEduHindiSchl->oral_nonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
								$oral_conveynonedu_2= number_format(($YearEndNonEduHindiSchl->oral_conveynonedu_A  + $YearEndNonEduHindiSchl->oral_conveynonedu_B*2+ $YearEndNonEduHindiSchl->oral_conveynonedu_C*3 + $YearEndNonEduHindiSchl->oral_conveynonedu_s*4)/$YearEndNonEduHindiSchl->Total,2);
								$oral_storynonedu_3= number_format(($YearEndNonEduHindiSchl->oral_storynonedu_A  + $YearEndNonEduHindiSchl->oral_storynonedu_B*2+ $YearEndNonEduHindiSchl->oral_storynonedu_C*3 + $YearEndNonEduHindiSchl->oral_storynonedu_D*4)/$YearEndNonEduHindiSchl->Total,2);
								echo number_format(($oral_nonedu_1+$oral_conveynonedu_2+$oral_storynonedu_3)/3,2); 
									?></td>	
<td> <?php  echo number_format(($oral_nonedu_1+$oral_conveynonedu_2+$oral_storynonedu_3)/3,2)- number_format(($EntryNoEduHindi->oral_hindi_NoEduA  + $EntryNoEduHindi->oral_hindi_NoEduB*2+ $EntryNoEduHindi->oral_hindi_NoEduC*3 + $EntryNoEduHindi->oral_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>										
					    	</tr>  
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_storynonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_storynonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_storynonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_storynonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->read_storynonedu_A  + $YearEndNonEduHindiSchl->read_storynonedu_B*2+ $YearEndNonEduHindiSchl->read_storynonedu_C*3 + $YearEndNonEduHindiSchl->read_storynonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_soundnonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_soundnonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_soundnonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_soundnonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->read_soundnonedu_A  + $YearEndNonEduHindiSchl->read_soundnonedu_B*2+ $YearEndNonEduHindiSchl->read_soundnonedu_C*3 + $YearEndNonEduHindiSchl->read_soundnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_wordnonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_wordnonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_wordnonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->read_wordnonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->read_wordnonedu_A  + $YearEndNonEduHindiSchl->read_wordnonedu_B*2+ $YearEndNonEduHindiSchl->read_wordnonedu_C*3 + $YearEndNonEduHindiSchl->read_wordnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->read_storynonedu_A+$YearEndNonEduHindiSchl->read_soundnonedu_A+ $YearEndNonEduHindiSchl->read_wordnonedu_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->read_storynonedu_B+$YearEndNonEduHindiSchl->read_soundnonedu_B+ $YearEndNonEduHindiSchl->read_wordnonedu_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->read_storynonedu_C+$YearEndNonEduHindiSchl->read_soundnonedu_C+ $YearEndNonEduHindiSchl->read_wordnonedu_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->read_storynonedu_D+$YearEndNonEduHindiSchl->read_soundnonedu_D+ $YearEndNonEduHindiSchl->read_wordnonedu_D)/3,2); ?></td>
								<td> <?php  $read_storynonedu_1= number_format(($YearEndNonEduHindiSchl->read_storynonedu_A  + $YearEndNonEduHindiSchl->read_storynonedu_B*2+ $YearEndNonEduHindiSchl->read_storynonedu_C*3 + $YearEndNonEduHindiSchl->read_storynonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
								$read_soundnonedu_2= number_format(($YearEndNonEduHindiSchl->read_soundnonedu_A  + $YearEndNonEduHindiSchl->read_soundnonedu_B*2+ $YearEndNonEduHindiSchl->read_soundnonedu_C*3 + $YearEndNonEduHindiSchl->read_soundnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2);
								$read_wordnonedu_3= number_format(($YearEndNonEduHindiSchl->read_wordnonedu_A  + $YearEndNonEduHindiSchl->read_wordnonedu_B*2+ $YearEndNonEduHindiSchl->read_wordnonedu_C*3 + $YearEndNonEduHindiSchl->read_wordnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2);
								echo number_format(($read_storynonedu_1+$read_soundnonedu_2+$read_wordnonedu_3)/3,2); 
									?></td>	
<td> <?php  echo number_format(($read_storynonedu_1+$read_soundnonedu_2+$read_wordnonedu_3)/3,2)- number_format(($EntryNoEduHindi->read_hindi_NoEduA  + $EntryNoEduHindi->read_hindi_NoEduB*2+ $EntryNoEduHindi->read_hindi_NoEduC*3 + $EntryNoEduHindi->read_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>										
					    	</tr> 
						 </tbody>
						 </table>	
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->writing_hindinonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->writing_hindinonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->writing_hindinonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->writing_hindinonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_A  + $YearEndNonEduHindiSchl->writing_hindinonedu_B*2+ $YearEndNonEduHindiSchl->writing_hindinonedu_C*3 + $YearEndNonEduHindiSchl->writing_hindinonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->hindi_drawingnonedu_A) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->hindi_drawingnonedu_B) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->hindi_drawingnonedu_C) ; ?></td>
					    		<td><?php echo number_format($YearEndNonEduHindiSchl->hindi_drawingnonedu_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndNonEduHindiSchl->hindi_drawingnonedu_A  + $YearEndNonEduHindiSchl->hindi_drawingnonedu_B*2+ $YearEndNonEduHindiSchl->hindi_drawingnonedu_C*3 + $YearEndNonEduHindiSchl->hindi_drawingnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_A+$YearEndNonEduHindiSchl->hindi_drawingnonedu_A)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_B+$YearEndNonEduHindiSchl->hindi_drawingnonedu_B)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_C+$YearEndNonEduHindiSchl->hindi_drawingnonedu_C)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_D+$YearEndNonEduHindiSchl->hindi_drawingnonedu_D)/2,2); ?></td>
								<td> <?php  $writing_hindinonedu_1= number_format(($YearEndNonEduHindiSchl->writing_hindinonedu_A  + $YearEndNonEduHindiSchl->writing_hindinonedu_B*2+ $YearEndNonEduHindiSchl->writing_hindinonedu_C*3 + $YearEndNonEduHindiSchl->writing_hindinonedu_D*4)/$YearEndNonEduHindiSchl->Total,2); 
								$hindi_drawingnonedu_2= number_format(($YearEndNonEduHindiSchl->hindi_drawingnonedu_A  + $YearEndNonEduHindiSchl->hindi_drawingnonedu_B*2+ $YearEndNonEduHindiSchl->hindi_drawingnonedu_C*3 + $YearEndNonEduHindiSchl->hindi_drawingnonedu_D*4)/$YearEndNonEduHindiSchl->Total,2);
								echo number_format(($writing_hindinonedu_1+$hindi_drawingnonedu_2)/2,2); 
									?></td>	
<td> <?php  echo number_format(($writing_hindinonedu_1+$hindi_drawingnonedu_2)/2,2)- number_format(($EntryNoEduHindi->write_hindi_NoEduA  + $EntryNoEduHindi->write_hindi_NoEduB*2+ $EntryNoEduHindi->write_hindi_NoEduC*3 + $EntryNoEduHindi->write_hindi_NoEduD*4)/$EntryNoEduHindi->Total,2); 
									?></td>									
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
					</div> 
						 </div>
						 
					<div class="row">						 
					
					<div class="col-sm-6">	 
					<table class="table">
					    <thead>
					    <th colspan="7" style="background: #4caf50 !important;">Entry Level Assessment of Differently abled Students.</th>
					     
					      <tr>
					        <th style="width: 48%;">Oral Assessment Level</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> <th>Diff</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Converse with friends and class teacher about her needs, surroundings</td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_converseA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_converseB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_converseC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_converseD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisSchl->oraldisable_converseA  + $YearEndDisSchl->oraldisable_converseB*2+ $YearEndDisSchl->oraldisable_converseC*3 + $YearEndDisSchl->oraldisable_converseD*4)/$YearEndDisSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Talks about the print available in the classroom</td>					    		
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_talksA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_talksB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_talksC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_talksD) ; ?></td>
								<td> <?php echo number_format(($YearEndDisSchl->oraldisable_talksA  + $YearEndDisSchl->oraldisable_talksB*2+ $YearEndDisSchl->oraldisable_talksC*3 + $YearEndDisSchl->oraldisable_talksD*4)/$YearEndDisSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Recites rhymes/songs/poems with action</td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_recitesA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_recitesB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_recitesC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->oraldisable_recitesD) ; ?></td> 
								<td> <?php echo number_format(($YearEndDisSchl->oraldisable_recitesA  + $YearEndDisSchl->oraldisable_recitesB*2+ $YearEndDisSchl->oraldisable_recitesC*3 + $YearEndDisSchl->oraldisable_recitesD*4)/$YearEndDisSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndDisSchl->oraldisable_converseA+$YearEndDisSchl->oraldisable_talksA+ $YearEndDisSchl->oraldisable_recitesA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->oraldisable_converseB+$YearEndDisSchl->oraldisable_talksB+ $YearEndDisSchl->oraldisable_recitesB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->oraldisable_converseC+$YearEndDisSchl->oraldisable_talksC+ $YearEndDisSchl->oraldisable_recitesC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->oraldisable_converseD+$YearEndDisSchl->oraldisable_talksD+ $YearEndDisSchl->oraldisable_recitesD)/3,2); ?></td>
								<td> <?php  $oraldisable_converse1= number_format(($YearEndDisSchl->oraldisable_converseA  + $YearEndDisSchl->oraldisable_converseB*2+ $YearEndDisSchl->oraldisable_converseC*3 + $YearEndDisSchl->oraldisable_converseD*4)/$YearEndDisSchl->Total,2); 
								$oraldisable_talks2= number_format(($YearEndDisSchl->oraldisable_talksA  + $YearEndDisSchl->oraldisable_talksB*2+ $YearEndDisSchl->oraldisable_talksC*3 + $YearEndDisSchl->oraldisable_talksD*4)/$YearEndDisSchl->Total,2);
								$oraldisable_recites3= number_format(($YearEndDisSchl->oraldisable_recitesA  + $YearEndDisSchl->oraldisable_recitesB*2+ $YearEndDisSchl->oraldisable_recitesC*3 + $YearEndDisSchl->oraldisable_recitesD*4)/$YearEndDisSchl->Total,2);
								echo number_format(($oraldisable_converse1+$oraldisable_talks2+$oraldisable_recites3)/3,2); 
									?></td>	
<td> <?php  echo number_format(($oraldisable_converse1+$oraldisable_talks2+$oraldisable_recites3)/3,2)- number_format(($EntryDisData->oral_DisA  + $EntryDisData->oral_DisB*2+ $EntryDisData->oral_DisC*3 + $EntryDisData->oral_DisD*4)/$EntryDisData->Total,2); 
									?></td>									
					    	</tr> 
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
					    <tbody>
					    	<tr>
					    		<td>(i). Participate in read aloud/story telling session and demonstrate comprehension through activities</td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_partA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_partB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_partC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_partD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisSchl->readdisable_partA  + $YearEndDisSchl->readdisable_partB*2+ $YearEndDisSchl->readdisable_partC*3 + $YearEndDisSchl->readdisable_partD*4)/$YearEndDisSchl->Total,2); 
									?></td>								
					    	</tr>
					    	<tr>
					    		<td>(ii). Uses sound symbol correspondence to read words</td>					    		
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_usesA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_usesB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_usesC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_usesD) ; ?></td>
								<td> <?php echo number_format(($YearEndDisSchl->readdisable_usesA  + $YearEndDisSchl->readdisable_usesB*2+ $YearEndDisSchl->readdisable_usesC*3 + $YearEndDisSchl->readdisable_usesD*4)/$YearEndDisSchl->Total,2); 
									?></td>									
					    	</tr>
					    	<tr>
					    		<td>(iii). Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_tenceA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_tenceB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_tenceC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->readdisable_tenceD) ; ?></td> 
								<td> <?php echo number_format(($YearEndDisSchl->readdisable_tenceA  + $YearEndDisSchl->readdisable_tenceB*2+ $YearEndDisSchl->readdisable_tenceC*3 + $YearEndDisSchl->readdisable_tenceD*4)/$YearEndDisSchl->Total,2); 
									?></td>	
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndDisSchl->readdisable_partA+$YearEndDisSchl->readdisable_usesA+ $YearEndDisSchl->readdisable_tenceA)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->readdisable_partB+$YearEndDisSchl->readdisable_usesB+ $YearEndDisSchl->readdisable_tenceB)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->readdisable_partC+$YearEndDisSchl->readdisable_usesC+ $YearEndDisSchl->readdisable_tenceC)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->readdisable_partD+$YearEndDisSchl->readdisable_usesD+ $YearEndDisSchl->readdisable_tenceD)/3,2); ?></td>
								<td> <?php  $readdisable_part1= number_format(($YearEndDisSchl->readdisable_partA  + $YearEndDisSchl->readdisable_partB*2+ $YearEndDisSchl->readdisable_partC*3 + $YearEndDisSchl->readdisable_partD*4)/$YearEndDisSchl->Total,2); 
								$readdisable_uses2= number_format(($YearEndDisSchl->readdisable_usesA  + $YearEndDisSchl->readdisable_usesB*2+ $YearEndDisSchl->readdisable_usesC*3 + $YearEndDisSchl->readdisable_usesD*4)/$YearEndDisSchl->Total,2);
								$readdisable_tence3= number_format(($YearEndDisSchl->readdisable_tenceA  + $YearEndDisSchl->readdisable_tenceB*2+ $YearEndDisSchl->readdisable_tenceC*3 + $YearEndDisSchl->readdisable_tenceD*4)/$YearEndDisSchl->Total,2);
								echo number_format(($readdisable_part1+$readdisable_uses2+$readdisable_tence3)/3,2); 
									?></td>		
<td> <?php  echo number_format(($readdisable_part1+$readdisable_uses2+$readdisable_tence3)/3,2)-number_format(($EntryDisData->read_DisA  + $EntryDisData->read_DisB*2+ $EntryDisData->read_DisC*3 + $EntryDisData->read_DisD*4)/$EntryDisData->Total,2); 
									?></td>									
					    	</tr>
					    </tbody> 						
					</table>
					</div>
					<div class="col-sm-6">
					 
					</div> 
					</div>
					
					<div class="row">						 
					 
					<div class="col-sm-6">
					<table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Writing Ability in English</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Basic writing abilities </td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_wordA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_wordB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_wordC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_wordD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisSchl->writedisable_wordA  + $YearEndDisSchl->writedisable_wordB*2+ $YearEndDisSchl->writedisable_wordC*3 + $YearEndDisSchl->writedisable_wordD*4)/$YearEndDisSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Convey meanings and represent names through drawing, writing, and making things </td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_conveyA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_conveyB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_conveyC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisSchl->writedisable_conveyD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisSchl->writedisable_conveyA  + $YearEndDisSchl->writedisable_conveyB*2+ $YearEndDisSchl->writedisable_conveyC*3 + $YearEndDisSchl->writedisable_conveyD*4)/$YearEndDisSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndDisSchl->writedisable_wordA+$YearEndDisSchl->writedisable_conveyA)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->writedisable_wordB+$YearEndDisSchl->writedisable_conveyB)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->writedisable_wordC+$YearEndDisSchl->writedisable_conveyC)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisSchl->writedisable_wordD+$YearEndDisSchl->writedisable_conveyD)/2,2); ?></td>
								<td> <?php  $writedisable_word1= number_format(($YearEndDisSchl->writedisable_wordA  + $YearEndDisSchl->writedisable_wordB*2+ $YearEndDisSchl->writedisable_wordC*3 + $YearEndDisSchl->writedisable_wordD*4)/$YearEndDisSchl->Total,2); 
								$writedisable_convey2= number_format(($YearEndDisSchl->writedisable_conveyA  + $YearEndDisSchl->writedisable_conveyB*2+ $YearEndDisSchl->writedisable_conveyC*3 + $YearEndDisSchl->writedisable_conveyD*4)/$YearEndDisSchl->Total,2);
								echo number_format(($writedisable_word1+$writedisable_convey2)/2,2); 
									?></td>	
<td> <?php  echo number_format(($writedisable_word1+$writedisable_convey2)/2,2)-number_format(($EntryDisData->write_DisA  + $EntryDisData->write_DisB*2+ $EntryDisData->write_DisC*3 + $EntryDisData->write_DisD*4)/$EntryDisData->Total,2); 
									?></td>										
					    	</tr> 
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
					</div>
						 </div>
						 
						 <div class="row">						 
					
					<div class="col-sm-6">
						 <table class="table">
					    <thead>  
					      <tr>
					        <th style="width: 48%;">Numeracy  Ability</th>
					        <th>L1</th>
					        <th>L2</th>	
					        <th>L3</th>
					        <th>L4</th> 
					        <th>Weightage</th> 
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). Counts objects up to 20 </td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_countA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_countB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_countC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_countD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_countA  + $YearEndDisNumSchl->disable_countB*2+ $YearEndDisNumSchl->disable_countC*3 + $YearEndDisNumSchl->disable_countD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). Reads and writes numbers upto 99</td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_readA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_readB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_readC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_readD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_readA  + $YearEndDisNumSchl->disable_readB*2+ $YearEndDisNumSchl->disable_readC*3 + $YearEndDisNumSchl->disable_readD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). Using addition and subtraction of numbers up to 9 in daily life situations</td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_addA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_addB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_addC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_addD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_addA  + $YearEndDisNumSchl->disable_addB*2+ $YearEndDisNumSchl->disable_addC*3 + $YearEndDisNumSchl->disable_addD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iv). Observes and describes physical properties of 3D shapes (solid shapes) around him/her like round/flat surfaces, number of corners and edges etc</td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_obsrA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_obsrB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_obsrC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_obsrD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_obsrA  + $YearEndDisNumSchl->disable_obsrB*2+ $YearEndDisNumSchl->disable_obsrC*3 + $YearEndDisNumSchl->disable_obsrD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(v). Estimates and verifies length using disable_-standard disable_-uniform units like hand span, footstep, fingers, etc and capacity using disable_standard uniform units like cup, spoon, mug etc.</td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_unitA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_unitB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_unitC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_unitD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_unitA  + $YearEndDisNumSchl->disable_unitB*2+ $YearEndDisNumSchl->disable_unitC*3 + $YearEndDisNumSchl->disable_unitD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(vi). Creates and recites short poems and stories using shapes and numbers </td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_reciteA) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_reciteB) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_reciteC) ; ?></td>
					    		<td><?php echo number_format($YearEndDisNumSchl->disable_reciteD) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisNumSchl->disable_reciteA  + $YearEndDisNumSchl->disable_reciteB*2+ $YearEndDisNumSchl->disable_reciteC*3 + $YearEndDisNumSchl->disable_reciteD*4)/$YearEndDisNumSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndDisNumSchl->disable_countA+$YearEndDisNumSchl->disable_readA+ $YearEndDisNumSchl->disable_addA +$YearEndDisNumSchl->disable_obsrA+ $YearEndDisNumSchl->disable_unitA+ $YearEndDisNumSchl->disable_reciteA)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisNumSchl->disable_countB+$YearEndDisNumSchl->disable_readB+ $YearEndDisNumSchl->disable_addB +$YearEndDisNumSchl->disable_obsrB+ $YearEndDisNumSchl->disable_unitB+ $YearEndDisNumSchl->disable_reciteB)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisNumSchl->disable_countC+$YearEndDisNumSchl->disable_readC+ $YearEndDisNumSchl->disable_addC +$YearEndDisNumSchl->disable_obsrC+ $YearEndDisNumSchl->disable_unitC+ $YearEndDisNumSchl->disable_reciteC)/6,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisNumSchl->disable_countD+$YearEndDisNumSchl->disable_readD+ $YearEndDisNumSchl->disable_addD +$YearEndDisNumSchl->disable_obsrD+ $YearEndDisNumSchl->disable_unitD+ $YearEndDisNumSchl->disable_reciteD)/6,2); ?></td>
							<td> <?php  $disable_count1= number_format(($YearEndDisNumSchl->disable_countA  + $YearEndDisNumSchl->disable_countB*2+ $YearEndDisNumSchl->disable_countC*3 + $YearEndDisNumSchl->disable_countD*4)/$YearEndDisNumSchl->Total,2); 
								$disable_read1= number_format(($YearEndDisNumSchl->disable_readA  + $YearEndDisNumSchl->disable_readB*2+ $YearEndDisNumSchl->disable_readC*3 + $YearEndDisNumSchl->disable_readD*4)/$YearEndDisNumSchl->Total,2);
								$disable_add3= number_format(($YearEndDisNumSchl->disable_addA  + $YearEndDisNumSchl->disable_addB*2+ $YearEndDisNumSchl->disable_addC*3 + $YearEndDisNumSchl->disable_addD*4)/$YearEndDisNumSchl->Total,2);
								$disable_obsr4= number_format(($YearEndDisNumSchl->disable_obsrA  + $YearEndDisNumSchl->disable_obsrB*2+ $YearEndDisNumSchl->disable_obsrC*3 + $YearEndDisNumSchl->disable_obsrD*4)/$YearEndDisNumSchl->Total,2);
								$disable_unit5= number_format(($YearEndDisNumSchl->disable_unitA  + $YearEndDisNumSchl->disable_unitB*2+ $YearEndDisNumSchl->disable_unitC*3 + $YearEndDisNumSchl->disable_unitD*4)/$YearEndDisNumSchl->Total,2);
								$disable_recite6= number_format(($YearEndDisNumSchl->disable_reciteA  + $YearEndDisNumSchl->disable_reciteB*2+ $YearEndDisNumSchl->disable_reciteC*3 + $YearEndDisNumSchl->disable_reciteD*4)/$YearEndDisNumSchl->Total,2);
								echo number_format(($disable_count1+$disable_read1+$disable_add3+$disable_obsr4+$disable_unit5+$disable_recite6)/6,2); 
									?></td>		
<td> <?php  echo number_format(($disable_count1+$disable_read1+$disable_add3+$disable_obsr4+$disable_unit5+$disable_recite6)/6,2)-number_format(($EntryDisData->numeric_DisA  + $EntryDisData->numeric_DisB*2+ $EntryDisData->numeric_DisC*3 + $EntryDisData->numeric_DisD*4)/$EntryDisData->Total,2); 
									?></td>									
					    </tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_disable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_disable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_disable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_disable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->oral_disable_A  + $YearEndDisHindiSchl->oral_disable_B*2+ $YearEndDisHindiSchl->oral_disable_C*3 + $YearEndDisHindiSchl->oral_disable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना</td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_conveydisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_conveydisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_conveydisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_conveydisable_s) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->oral_conveydisable_A  + $YearEndDisHindiSchl->oral_conveydisable_B*2+ $YearEndDisHindiSchl->oral_conveydisable_C*3 + $YearEndDisHindiSchl->oral_conveydisable_s*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना</td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_storydisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_storydisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_storydisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->oral_storydisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->oral_storydisable_A  + $YearEndDisHindiSchl->oral_storydisable_B*2+ $YearEndDisHindiSchl->oral_storydisable_C*3 + $YearEndDisHindiSchl->oral_storydisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr>  
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->oral_disable_A+$YearEndDisHindiSchl->oral_conveydisable_A+ $YearEndDisHindiSchl->oral_storydisable_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->oral_disable_B+$YearEndDisHindiSchl->oral_conveydisable_B+ $YearEndDisHindiSchl->oral_storydisable_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->oral_disable_C+$YearEndDisHindiSchl->oral_conveydisable_C+ $YearEndDisHindiSchl->oral_storydisable_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->oral_disable_D+$YearEndDisHindiSchl->oral_conveydisable_s+ $YearEndDisHindiSchl->oral_storydisable_D)/3,2); ?></td>
								<td> <?php  $oral_disable_1= number_format(($YearEndDisHindiSchl->oral_disable_A  + $YearEndDisHindiSchl->oral_disable_B*2+ $YearEndDisHindiSchl->oral_disable_C*3 + $YearEndDisHindiSchl->oral_disable_D*4)/$YearEndDisHindiSchl->Total,2); 
								$oral_conveydisable_2= number_format(($YearEndDisHindiSchl->oral_conveydisable_A  + $YearEndDisHindiSchl->oral_conveydisable_B*2+ $YearEndDisHindiSchl->oral_conveydisable_C*3 + $YearEndDisHindiSchl->oral_conveydisable_s*4)/$YearEndDisHindiSchl->Total,2);
								$oral_storydisable_3= number_format(($YearEndDisHindiSchl->oral_storydisable_A  + $YearEndDisHindiSchl->oral_storydisable_B*2+ $YearEndDisHindiSchl->oral_storydisable_C*3 + $YearEndDisHindiSchl->oral_storydisable_D*4)/$YearEndDisHindiSchl->Total,2);
								 echo number_format(($oral_disable_1+$oral_conveydisable_2+$oral_storydisable_3)/3,2); 
									?></td>		
							<td> <?php  echo number_format(($oral_disable_1+$oral_conveydisable_2+$oral_storydisable_3)/3,2)-number_format(($EntryDisHindi->oral_hindi_DisA  + $EntryDisHindi->oral_hindi_DisB*2+ $EntryDisHindi->oral_hindi_DisC*3 + $EntryDisHindi->oral_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>		
					    	</tr> 
						 </tbody>
						 </table>
						  </div>
						  <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन </td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_storydisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_storydisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_storydisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_storydisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->read_storydisable_A  + $YearEndDisHindiSchl->read_storydisable_B*2+ $YearEndDisHindiSchl->read_storydisable_C*3 + $YearEndDisHindiSchl->read_storydisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग</td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_sounddisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_sounddisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_sounddisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_sounddisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->read_sounddisable_A  + $YearEndDisHindiSchl->read_sounddisable_B*2+ $YearEndDisHindiSchl->read_sounddisable_C*3 + $YearEndDisHindiSchl->read_sounddisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr>
					    		<td>(iii). उम्र के अनुरूप चार पाँच सरल शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_worddisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_worddisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_worddisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->read_worddisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->read_worddisable_A  + $YearEndDisHindiSchl->read_worddisable_B*2+ $YearEndDisHindiSchl->read_worddisable_C*3 + $YearEndDisHindiSchl->read_worddisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
							<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndDisHindiSchl->read_storydisable_A+$YearEndDisHindiSchl->read_sounddisable_A+ $YearEndDisHindiSchl->read_worddisable_A)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->read_storydisable_B+$YearEndDisHindiSchl->read_sounddisable_B+ $YearEndDisHindiSchl->read_worddisable_B)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->read_storydisable_C+$YearEndDisHindiSchl->read_sounddisable_C+ $YearEndDisHindiSchl->read_worddisable_C)/3,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->read_storydisable_D+$YearEndDisHindiSchl->read_sounddisable_D+ $YearEndDisHindiSchl->read_worddisable_D)/3,2); ?></td>
								<td> <?php  
								$read_storydisable_1= number_format(($YearEndDisHindiSchl->read_storydisable_A  + $YearEndDisHindiSchl->read_storydisable_B*2+ $YearEndDisHindiSchl->read_storydisable_C*3 + $YearEndDisHindiSchl->read_storydisable_D*4)/$YearEndDisHindiSchl->Total,2); 
								
								
								$read_sounddisable_2= number_format(($YearEndDisHindiSchl->read_sounddisable_A  + $YearEndDisHindiSchl->read_sounddisable_B*2+ $YearEndDisHindiSchl->read_sounddisable_C*3 + $YearEndDisHindiSchl->read_sounddisable_D*4)/$YearEndDisHindiSchl->Total,2);
								$read_worddisable_3= number_format(($YearEndDisHindiSchl->read_worddisable_A  + $YearEndDisHindiSchl->read_worddisable_B*2+ $YearEndDisHindiSchl->read_worddisable_C*3 + $YearEndDisHindiSchl->read_worddisable_D*4)/$YearEndDisHindiSchl->Total,2);
								//echo $read_storydisable_1.'-'.$read_sounddisable_2.'-'.$read_worddisable_3;
								echo number_format(($read_storydisable_1+$read_sounddisable_2+$read_worddisable_3)/3,2); 
									?></td>	
<td> <?php  echo number_format(($read_storydisable_1+$read_sounddisable_2+$read_worddisable_3)/3,2)-number_format(($EntryDisHindi->read_hindi_DisA  + $EntryDisHindi->read_hindi_DisB*2+ $EntryDisHindi->read_hindi_DisC*3 + $EntryDisHindi->read_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>									
					    	</tr> 
						 </tbody>
						 </table>	
						 </div>
						 <div class="col-sm-6">
					 
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
					        <th>Diff</th> 
					      </tr>
					    </thead>
						<tbody>  
					    	<tr>
					    		<td>(i). मूलभूत लेखन योग्यताएँ </td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->writing_hindidisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->writing_hindidisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->writing_hindidisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->writing_hindidisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->writing_hindidisable_A  + $YearEndDisHindiSchl->writing_hindidisable_B*2+ $YearEndDisHindiSchl->writing_hindidisable_C*3 + $YearEndDisHindiSchl->writing_hindidisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr>
							<tr>
					    		<td>(ii). कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण</td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->hindi_drawingdisable_A) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->hindi_drawingdisable_B) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->hindi_drawingdisable_C) ; ?></td>
					    		<td><?php echo number_format($YearEndDisHindiSchl->hindi_drawingdisable_D) ; ?></td>
								<td> <?php  echo number_format(($YearEndDisHindiSchl->hindi_drawingdisable_A  + $YearEndDisHindiSchl->hindi_drawingdisable_B*2+ $YearEndDisHindiSchl->hindi_drawingdisable_C*3 + $YearEndDisHindiSchl->hindi_drawingdisable_D*4)/$YearEndDisHindiSchl->Total,2); 
									?></td>								
					    	</tr> 
					    	<tr style="background: #ffeb3b;"> 
							<td><b>Average Score</b></td> 
					    	<td><?php echo number_format(($YearEndDisHindiSchl->writing_hindidisable_A+$YearEndDisHindiSchl->hindi_drawingdisable_A)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->writing_hindidisable_B+$YearEndDisHindiSchl->hindi_drawingdisable_B)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->writing_hindidisable_C+$YearEndDisHindiSchl->hindi_drawingdisable_C)/2,2); ?></td>
					    	<td><?php echo number_format(($YearEndDisHindiSchl->writing_hindidisable_D+$YearEndDisHindiSchl->hindi_drawingdisable_D)/2,2); ?></td>
								<td> <?php  $writing_hindidisable_1= number_format(($YearEndDisHindiSchl->writing_hindidisable_A  + $YearEndDisHindiSchl->writing_hindidisable_B*2+ $YearEndDisHindiSchl->writing_hindidisable_C*3 + $YearEndDisHindiSchl->writing_hindidisable_D*4)/$YearEndDisHindiSchl->Total,2); 
								$hindi_drawingdisable_2= number_format(($YearEndDisHindiSchl->hindi_drawingdisable_A  + $YearEndDisHindiSchl->hindi_drawingdisable_B*2+ $YearEndDisHindiSchl->hindi_drawingdisable_C*3 + $YearEndDisHindiSchl->hindi_drawingdisable_D*4)/$YearEndDisHindiSchl->Total,2);
								//echo $writing_hindidisable_1.'-'.$hindi_drawingdisable_2;
								echo number_format(($writing_hindidisable_1+$hindi_drawingdisable_2)/2,2); 
									?></td>
<td> <?php  echo number_format(($writing_hindidisable_1+$hindi_drawingdisable_2)/2,2)-number_format(($EntryDisHindi->write_hindi_DisA  + $EntryDisHindi->write_hindi_DisB*2+ $EntryDisHindi->write_hindi_DisC*3 + $EntryDisHindi->write_hindi_DisD*4)/$EntryDisHindi->Total,2); 
									?></td>									
					    	</tr>
						 </tbody>
						 </table>
						 </div>
						 <div class="col-sm-6">
					 
					</div> 
						 </div>
							<!--figure class="highcharts-figure">
							<div id="container_eng"></div>
							</figure--> 
					
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
    //pdf.text("Centered text",{align: "center"},250,15);
    pdf.addHTML($("#Personal_PDF"), 10, 25, options, function() {
        pdf.save('Region_Reports_'+EmpInfo+'_'+cDateTime+'.pdf');
    });
});
	function printData()
{
   var divToPrint=document.getElementById("Personal_PDF");
   newWin= window.open("");
   newWin.document.write('<html><head><title>Report</title>'); 
   newWin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>css/print.css" type="text/css" />');
    newWin.document.write('</head><body >');
    newWin.document.write(divToPrint.outerHTML);
    newWin.document.write('</body></html>');

   //newWin.print();
   //newWin.close();
} 

	//English Graph Table 1A
  Highcharts.chart('container_eng', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Table 1 (A) % of students under various levels of Assessment Abilities (ORAL).'
    }, 
    xAxis: {
        categories: [
            'Converse Ability',
            'Talks Ability',
            'Recites Ability', 
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '% of students'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Level 1',
        data: [<?php echo number_format($YearEndOral->oral_converseA*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_talksA*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_recitesA*100/$firstSec->Total); ?>]

    }, {
        name: 'Level 2',
        data: [<?php echo number_format($YearEndOral->oral_converseB*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_talksB*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_recitesB*100/$firstSec->Total); ?>]

    }, {
        name: 'Level 3',
        data: [<?php echo number_format($YearEndOral->oral_converseC*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_talksC*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_recitesC*100/$firstSec->Total); ?>]

    }, {
        name: 'Level 4',
        data: [<?php echo number_format($YearEndOral->oral_converseD*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_talksD*100/$firstSec->Total); ?>, <?php echo number_format($YearEndOral->oral_recitesD*100/$firstSec->Total); ?>]

    }]
});
    
</script>
</body>
</html>
