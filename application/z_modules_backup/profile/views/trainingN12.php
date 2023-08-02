<div style="background:#ffffff!important;" id="training_PDF">

    
    <?php if(count($TrainingData) > 0 || count($OtherTrainingData) > 0 || count($ExempTrainingData) > 0):?>
    <div class="row m-1" style="background:#ffffff!important;">
        <div class="col-md-12 p-2 pt-2">
            <hr>
            <?php if($TrainingData[0]->is_attended_training == 1) ?>
            <h6>Training Details : </h6>  
            <hr>
        
            <?php 
           
            foreach($TrainingData as $row):
                if($row->is_attended_training == 1):
            ?>
            
            <table width="100%" cellpadding="5">
            <tr>
                <td><b>Course</b></td><td>:</td><td><?php echo course_type($row->course); ?></td>
                <td><b>Topic</b></td><td>:</td><td><?php echo $row->topic; ?></td>
                <td><b>Designation </b></td><td>:</td><td><?php echo ucfirst($row->designationname); ?></td>
                
            </tr>
            <tr>
                <?php if($row->cat_id == 1) { ?><td ><b>Subject</b></td><td style="">:</td><td style=";"><?php echo ucfirst($row->subjectname); ?></td><?php } ?>
                <td style=""> <b>Spell</b></td><td style="">:</td><td style=""><?php echo  spell($row->spell); ?></td>
                <td style=""><b>Duration</b></td><td style="">:</td><td style=""><?php echo $row->duration.' days'; ?></td>
            </tr>
            <tr>
                <td style=""><b>Role </b></td><td style="">:</td><td style=""><?php echo training_role($row->role); ?></td>
                <?php if($row->role == 4) { ?><td style=""> <b>Grading</b></td><td style="">:</td><td style=""><?php echo  ucfirst($row->grading); ?></td><?php } ?>
                <?php if($row->role == 3) { ?><td style=""> <b>Course Conducted For</b></td><td style="">:</td><td style=""><?php echo  conductedfor($row->conductedfor); ?></td><?php } ?>
            </tr>
            <tr>
                <td style=""><b>Venue </b></td><td style="">:</td><td style=""><?php echo $row->rolename1; ?></td>
                <td><b><?php if($row->venuetype1=='2') echo 'Unit '; elseif($row->venuetype1=='4') echo 'Zeit '; else echo 'Region '; ?></b></td><td style="">:</td><td><?php echo $row->region1; ?></td>
                <?php if($row->venuetype1=='5') { ?><td><b>School </b></td><td style="">:</td><td><?php echo $row->school1; ?></td><?php } ?>
            </tr>
            <?php if(!empty($row->venuetype2)&&($row->spell==2||$row->spell==3)) { ?>
            <tr>
                <td style=""><b>Venue2 </b></td><td style="">:</td><td style=""><?php echo $row->rolename2; ?></td>
                <td><b><?php if($row->venuetype2=='2') echo 'Unit '; elseif($row->venuetype2=='4') echo 'Zeit '; else echo 'Region '; ?></b></td><td style="">:</td><td><?php echo $row->region2; ?></td>
                <?php if($row->venuetype2=='5') { ?><td><b>School </b></td><td style="">:</td><td><?php echo $row->school2; ?></td><?php } ?>
            </tr>
           <?php } ?>
           <?php if(!empty($row->venuetype3)&&$row->spell==3) { ?>
            <tr>
                <td style=""><b>Venue3 </b></td><td style="">:</td><td style=""><?php echo $row->rolename3; ?></td>
                <td><b><?php if($row->venuetype3=='2') echo 'Unit '; elseif($row->venuetype3=='4') echo 'Zeit '; else echo 'Region '; ?></b></td><td style="">:</td><td><?php echo $row->region3; ?></td>
                <?php if($row->venuetype3=='5') { ?><td><b>School </b></td><td style="">:</td><td><?php echo $row->school3; ?></td><?php } ?>
            </tr>
           <?php } ?>
           <?php if(!empty($row->venuetype4)&&$row->spell==3) { ?>
            <tr>
                <td style=""><b>Venue 4</b></td><td style="">:</td><td style=""><?php echo $row->rolename4; ?></td>
                <td><b><?php if($row->venuetype4=='2') echo 'Unit '; elseif($row->venuetype4=='4') echo 'Zeit '; else echo 'Region '; ?></b></td><td style="">:</td><td><?php echo $row->region4; ?></td>
                <?php if($row->venuetype4=='5') { ?><td><b>School </b></td><td style="">:</td><td><?php echo $row->school4; ?></td><?php } ?>
            </tr>
           <?php } ?>

           
            </table>
            <hr>
            
            <?php     
                   
                endif;
                endforeach;
                
            ?>
         
        </div>
        </div>
        
        <div class="row m-1" style="background:#ffffff!important;">
        <div class="col-md-12 p-2 pt-2">
            <hr>
            <h6>Workshop Details : </h6>  
            <?php if(count($OtherTrainingData) == 0) { ?>
                <p class="text-center text-bold"><em>No Workshop detail available.</em></p>
            <?php } ?>  
            <hr>
            <?php 
                foreach($OtherTrainingData as $r):
           ?>
            
            <table width="100%" cellpadding="5">
            <tr>
                <td><b>Organizing Agency</b></td><td>:</td><td><?php echo training_agency($r->organizing_agency); ?></td>
                <?php if($r->organizing_agency==1) { ?><td><b>Govt Agency Name </b></td><td>:</td><td><?php echo govt_org($r->govt_agency); ?></td><?php } ?>
                <?php if($r->organizing_agency==2) { ?><td><b>Non Govt Agency Name </b></td><td>:</td><td><?php echo ucfirst($r->non_gov_agency_name); ?></td><?php } ?>
            </tr>
            <tr>
                <td ><b>Address Of Organization:</b></td><td style="">:</td><td style=";"><?php echo ucfirst($r->org_address); ?></td>
                <td style=""><b>Training Venue</b></td><td style="">:</td><td style=""><?php echo  ucfirst($r->trainingvenue); ?></td>
                <td style=""><b>Trainingtopic</b></td><td style="">:</td><td style=""><?php echo ucfirst($r->trainingtopic); ?></td>
            </tr>
            <tr>
                <td style=""><b>Date From </b></td><td style="">:</td><td style=""><?php echo ($r->t_from); ?></td>
                <td style=""> <b>Date To</b></td><td style="">:</td><td style=""><?php echo  ($r->t_to); ?></td>
                <td style=""><b>Duration</b></td><td style="">:</td><td style=""><?php echo $r->duration; ?></td>
            </tr>
            <tr>
                <td><b>Designation </b></td><td>:</td><td><?php echo ucfirst($r->designationname); ?></td>
                <?php if($row->cat_id == 1) { ?><td ><b>Subject</b></td><td style="">:</td><td style=";"><?php echo ucfirst($r->subjectname); ?></td><?php } ?>
                <td style=""><b>Role </b></td><td style="">:</td><td style=""><?php echo training_role($r->role); ?></td>
            </tr>
            <tr>
                <?php if($row->role == 4) { ?><td style=""> <b>Grading</b></td><td style="">:</td><td style=""><?php echo  ucfirst($row->grading); ?></td><?php } ?>
            </tr>
           
            </table>
            <hr>
            
            <?php     
                endforeach;
            ?>
           
          
            
         
        </div>
        </div>

        <div class="row m-1" style="background:#ffffff!important;">
        <div class="col-md-12 p-2 pt-2">
            <hr>
            <h6>Exemption Details : </h6>  
            <?php if($ExempTrainingData[0]->is_exemption==2) { ?>
                <p class="text-center text-bold"><em>No Training Exemption Taken.</em></p>
            <?php } ?>  
            <hr>
            <?php 
                foreach($ExempTrainingData as $r):
                    if($ExempTrainingData[0]->is_exemption==1): 
           ?>
            
            <table width="100%" cellpadding="5">
            <tr>
                <td><b>Course </b></td><td>:</td><td><?php echo course_type($r->course); ?></td>
                <td style=""><b>Ground </b></td><td style="">:</td><td style=""><?php echo  exemption_ground($r->ground); ?></td>
                <td style=""><b>Reason For Exemption</b></td><td style="">:</td><td style=""><?php echo ucfirst($r->reason); ?></td>
            </tr>
            
            </table>
            <hr>
            
            <?php  
                endif;   
                endforeach;
            ?>
           
          
            
         
        </div>
        </div>
    
    <?php else:
                echo '<div class="col-md-12 p-2 pt-2"><div class="col-md-12 text-danger text-center"><hr>No Record Found<hr></div></div>'; 
        endif;?> 
    </div>  
                  