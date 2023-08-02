<div class="row mt-0 m-1" style="background:#ffffff!important;" id="Summary_PDF">
<div class="col-md-12"><hr></div>

<div class="col-md-12">
    <div class="h-100">
        <div class="row h-100">
            <div class="col-12">
                
                <div class="profile-card card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-sm-12  text-center" style="border:1px solid #cccccc; background: #ffffff; padding: 10px 0px; border-top-left-radius:5px;border-top-right-radius:5px;">
                            <img class="rounded-circle" src="<?php echo base_url()."img/ProImage/".$PerData->emp_photo;?>" style="height:75px!important; width: 75px!important;"/>    
                            </div>
                            
                            <div class="col-sm-12 text-left" style="border:1px solid #cccccc; min-height: 300px; padding-top: 10px;">
                            <?php 
                            //show($PresentServiceData);
                            if($PerData->emp_title==1){ $title='Sh.'; } 
                            elseif ($PerData->emp_title==2) { $title='Smt.'; } 
                            elseif ($PerData->emp_title==3) { $title='Ms.'; } 
                            else {  $title=''; }
                            echo '<b>Employee Name : </b> '.$title.' '.$PerData->emp_name;
                            echo '<hr><b>Employee Code  &nbsp;: </b> '.$PerData->emp_code; 
                            echo '<hr><b>Mobile Number&nbsp;&nbsp;&nbsp;: </b> '.$PerData->emp_mobile_no; 
                            echo '<hr><b>Email Id : </b> '.$PerData->emp_email;
                            echo '<hr>';
                            ?>
                            </div>
                            
                        </div>
                       
                        <div class="col-md-8 text-left">
                            <div class="col-sm-12" style="color: #014a69;font-size: 16px;font-weight: bold;"> Present Service Details:</div>
                            <div class="col-sm-12"><hr><hr></div>
                            <div class="col-sm-12">
                            <?php 
                            echo '<b>Designation : </b> '.ucfirst($PresentServiceData->designationname).' / '.ucfirst($PresentServiceData->subjectname); 
                            if($PresentServiceData->present_place=='5'){ echo '<br><b>Place of Posting : </b>'.$PresentServiceData->school.' / '.'Code: '.$PresentServiceData->present_kvcode; } 
                            if($PresentServiceData->present_unit=='5') { echo '<br><b>Place of Posting : </b>'.$PresentServiceData->section.' / '.'Code: '.$PresentServiceData->present_kvcode; }
                            echo '<br><b>Region : </b>'.$PresentServiceData->region; 
                            echo '<br><b>Date of Joining: </b>'.$PresentServiceData->present_joiningdate; 
                            ?>
                            </div>
                            <div class="col-sm-12"><hr></div>
                            <?php if(sizeof($AllServiceData)>0){ ?>
                            
                            <div class="col-sm-12" style="color: #014a69;font-size: 16px;font-weight: bold;"> All Service Details:</div>
                            <div class="col-sm-12"><hr><hr></div>
                            <?php 
                            foreach($AllServiceData as $All):
                            echo '<div class="col-sm-12">';
                            echo '<b>Designation :</b> '.ucfirst($All->designationname).' / '.ucfirst($All->subjectname); 
                            if($All->all_place=='5'){ echo '<br><b>Place of Posting : </b>'.$All->school.' / '.'Code: '.$All->all_kvcode; } 
                            if($All->all_unit=='5') { echo '<br><b>Place of Posting : </b>'.$All->section.' / '.'Code: '.$All->all_kvcode; }
                            echo '<br><b>Region : </b>'.$All->region; 
                            echo '<br><b>Date of Joining : </b>'.$All->s_from; 
                            ?>
                            <hr>
                            </div>
                            <?php                   
                            endforeach;
                            }
                            ?>
                        </div>
                    </div>    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12"><hr></div>
</div>
