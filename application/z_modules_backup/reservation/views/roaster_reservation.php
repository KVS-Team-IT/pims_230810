<?php //show($E); ?>
<style>
    em{ color: #014a69;}
    .lpc{
    border: 0;
    width: 100%;
    background: transparent;
    border-bottom: 1px dotted #9E9E9E;
    }
    .lpcx{
    border: 0;
    width: 100px;
    background: transparent;
    border-bottom: 1px dotted #9E9E9E;
    }
    .lpcxx{
    border: 0;
    width: 200px;
    background: transparent;
    border-bottom: 1px dotted #9E9E9E;
    }
    @media print
    {
    body * { visibility: hidden; }
    #roaster_print * { visibility: visible; }
    #roaster_print { position: absolute; top: 40px; left: 30px; }
    }
    table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Reservation Roaster Register</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-money" aria-hidden="true"></i>&nbsp; Reservation Roaster Register
            </div>
            <div class="card-body user_view" id="roaster_print" >
            <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
            <!-- <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($ID) ? $ID : ''; ?>"> -->
            <div style="text-align: center!important; width: 100%; margin: 0px auto;">
                <hr>
            <h5>RESERVATION ROASTER REGISTER</h5>
            </div>
            
            <div style="width: 75%; margin: 0px auto;">
                <p style="text-align: justify;">
                    <?php if(!empty($emp_details[0]->subject)) $post= $desig->designation.'('.$emp_details[0]->subject.')'; else $post =$desig->designation; ?>
                    <b>1. Name of the post : </b> <?php echo $post; ?>
                </p>
                <p style="text-align: justify;"><b>2. Method of Recruitment :</b> <?php echo direct_recruitment($mor); ?> </p>
                <p style="text-align: justify;"><b>3. Number of Posts in the cadre :</b> <?php echo $counts; ?></p>
                <p style="text-align: justify;">
                    <b>4. Percentage of Reservation prescribed : SCs</b> <?php echo $sc; ?>, <b>STs </b><?php echo $st; ?>, <b>OBCs</b> <?php echo $obc; ?>
                </p>
               
                <div class="row">
                    <div class="form-group col-md-12">
                        
                        <table width="100%;">
                            <tr><th style="width:5%;">Cycle No./Point No.</th><th style="width:15%;">UR or reserved for SC/ST/OBC</th><th style="width:20%;">Name</th><th style="width:15%;">Date of appointment</th><th style="width:15%;">Whether SC/ST/OBC/General</th><th style="width:15%;">Filled as UR or as reserved for SC/ST/OBC</th><th style="width:15%;">Signature of appointing authority or other authorised officer</th><th style="width:15%;text-align:left;">Remarks</th></tr>
                            <tr><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th></tr>
                            <?php if(empty($emp_details)) 
                            {
                                echo '<tr><td colspan="7">NO RECORD FOUND.</td></tr>';
                            }else{
                                $sc=0;$st=0;$obc=0;$gen=0;
                                foreach ($emp_details as $key => $value) { 
                                    if($value->emp_category==1) $gen++; if($value->emp_category==2) $obc++; if($value->emp_category==3) $sc++; if($value->emp_category==4) $st++; 
                            ?>
                                    <tr><td><?php if($value->emp_category==1) echo $gen; if($value->emp_category==2) echo $obc; if($value->emp_category==3) echo $sc; if($value->emp_category==4) echo $st; ?> </td><td><?php echo $value->category; ?> </td><td><?php echo $value->name; ?></td><td><?php echo $value->present_joiningdate; ?></td><td><?php echo $value->category; ?> </td><td><?php echo reserve_post($value->present_category); ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <?php }     
                            }
                            
                             ?>
                        </table>
                    </div>
                </div>
               
                
                
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary print" type="submit" value="Print">

                        </div>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>
            </div>
        </div>	
    </div>
</div>

<script>
$('.print').click(function() {
    w=window.open();
    w.document.write($('#roaster_print').html());
    w.print();
    w.close();
});

</script>