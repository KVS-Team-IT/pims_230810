<style>
    .table thead th {
        background:#014a69!important;
        color:#ffffff!important;
    }
</style>
    <div id="content-wrapper">
    <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#">School / Sanction Post</a>
                </li>
            </ol>
    <div class="card mb-3">
        <div class="card-header register-header">
            <div class="col-md-12 text-center btn btn-block text-white" style=" line-height:15px; font-size: 18px;">
                Comparative Report of Sanctioned Post As Per Government & KVS Approval
            </div>
        </div>
        
        <div class="card-body shape-shadow"> 
        <!-- ===================================== Form Starts From Here ====================================== -->    
        <div class="row">
            <div class="form-group col-md-12">
                <table width="100%" class="table table-of-contents">
                    <thead><tr><th colspan="9" style="text-align:center; letter-spacing: 5px;">DETAILS OF VIDYALAYA</th></tr></thead>
                <tbody>
                    
                    <tr>
                        <th>Name / Shift</th><th>:</th><td><?php echo $GOV->name.' / SHIFT - '.$GOV->shift ;?></td>
                        <th>KV Code </th><th>:</th><td><?php echo $GOV->code;?></td>
                        <th>Region </th><th>:</th><td><?php echo $GOV->region;?></td>
                    </tr>
                    <tr>
                        <th>Sector </th><th>:</th><td><?php echo $GOV->sector;?></td>
                        <th>Building Type </th><th>:</th><td><?php echo $GOV->building;?></td>
                        <th>Available Infrastructure </th><th>:</th><td><?php echo $GOV->infra;?></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-12">
                <table width="100%" class="table table-of-contents">
                    
                    <thead>
                    <tr>
                        <th style="text-align: left;"><span class="small" style="font-size:14px;">SANCTIONED POST DETAILS</span></th>
                        <th style="text-align: center;"><span class="small" style="font-size:14px;">GOVT. APPROVED NUMBER OF POST </span></th>
                        <th style="text-align: center;"><span class="small" style="font-size:14px;">KVS APPROVED NUMBER OF POST </span></th>
                    </tr>
                    </thead>
                <tbody>
                <tr>
                    <th>No. of Classes</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo $GOV->ccea_upto_class;?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo $GOV->kv_upto_class;?></th>
                </tr>
                <!--<tr>
                    <th>No. of Sections</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php //echo $GOV->kv_upto_section;?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php //echo $GOV->ccea_upto_section;?></th>
                </tr>-->
                <tr>
                    <th>No. of Teaching Post</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo $GOV->ccea_teach_post;?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo $KVS->teach;?></th>
                </tr>
                <tr>
                    <th>No. of Non-Teaching Post</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo $GOV->ccea_nonteach_post;?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo $KVS->nonteach;?></th>
                </tr>
                <tr>
                    <th>Total No. of Post</th>
                    <th style="color: var(--success)!important; text-align: center; padding-left:3.5%;"> <?php echo ($GOV->ccea_teach_post+$GOV->ccea_nonteach_post);?> &nbsp;&nbsp;[ A ]</th>
                    <th style="color: var(--orange)!important;  text-align: center; padding-left:3.5%;"> <?php echo ($KVS->teach+$KVS->nonteach);?> &nbsp;&nbsp;[ B ]</th>
                </tr>
                <tr style="background: #014a69;">
                    <th style="color:#ffffff;"><span class="small" style="font-size:14px;">Govt. Approved No. Of Post Utilization [ A - B ]</span></th>
                    <?php
                    $tot=($GOV->ccea_teach_post+$GOV->ccea_nonteach_post)-($KVS->teach+$KVS->nonteach);
                    if($tot>0){?>
                    <th  colspan="2"  style="text-align: center; color: var(--green)!important;">
                        <span class="small" style="font-size:14px;">Under Utilization ( <i class="fa fa-arrow-down" aria-hidden="true"></i> ) : <?php echo preg_replace('/[^0-9\.]/', '', $tot); ?></span>
                    </th>
                    <?php } if($tot<0){ ?>
                    <th  colspan="2" style="text-align: center; color: var(--red)!important;">
                        <span class="small" style="font-size:14px;">Over Utilization ( <i class="fa fa-arrow-up" aria-hidden="true"></i> ) : <?php echo preg_replace('/[^0-9\.]/', '', $tot); ?></span>
                    </th>
                    <?php } if($tot==0){ ?>
                        <th  colspan="2" style="text-align: center; color: var(--gray)!important;">
                            <span class="small" style="font-size:14px;">No Change in Utilization ( <i class="fa fa-arrow-right" aria-hidden="true"></i> ) : <?php echo preg_replace('/[^0-9\.]/', '', $tot); ?></span>
                        </th>
                    <?php } ?>
                   

                </tr>
                </tbody>
                </table>
            </div>
        </div>
         <hr>
        <div class="row">
            <div class="form-group col-md-12">
                <table width="100%" class="table table-of-contents">
                    
                    <thead>
                    <tr>
                    <th style="text-align: left;"><span class="small" style="font-size:14px;">ACTUAL POSTING DETAILS</span></th>
                    <th style="text-align: center;"><span class="small" style="font-size:14px;">IN-POSITION</span></th>
                    <th style="text-align: center;"><span class="small" style="font-size:14px;">VACANCY</span></th>
                    <th style="text-align: center;"><span class="small" style="font-size:14px;">CONTRACTUAL TEACHER </span>( <span class="small">AGAINST VACANT POST </span> ) </th>
                    </tr>
                    </thead>
                <tbody>
                <tr>
                    <th>No. of Teaching Post</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo $ACT->teach; ?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo ($KVS->teach-$ACT->teach);?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo $KVS->incontra;?></th>
                </tr>
                <tr>
                    <th>No. of Non-Teaching Post</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo $ACT->nonteach; ?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo ($KVS->nonteach-$ACT->nonteach);?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo $KVS->innoncontra;?></th>
                </tr>
                <tr>
                    <th>Total No. of Post</th>
                    <th style="color: var(--success)!important; text-align: center;"><?php echo ($ACT->teach+$ACT->nonteach); ?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo ($KVS->teach-$ACT->teach)+($KVS->nonteach-$ACT->nonteach);?></th>
                    <th style="color: var(--orange)!important;  text-align: center;"><?php echo ($KVS->incontra+$KVS->innoncontra);?></th>
                </tr>
                </tbody>
                </table><hr>
            </div>
        </div>
         
<!--================================ PRESENT SERVICE DETAILS STARTS =================================-->
        <div class="text-right rg-footer"></div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function () {
       // $('#perSaveBtn').attr("disabled", false);
    });
</script>
