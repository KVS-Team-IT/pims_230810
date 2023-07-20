<div id="content-wrapper">
    <div class="container-fluid">
        <div class="breadcrumb">
            <marquee behavior="scroll" direction="left">WELCOME TO PERSONNEL INFORMATION MANAGEMENT SYSTEM</marquee>
        </div>
        <div class="card mb-4">
            <div class="card-body shape-shadow">
                <div class="row">
                    <div class="col-md-4">
                        <ul>
                            <i class="fas fa-user-shield"
                                style="font-size: 16px; color:#014a69;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->user_name; ?></i>
                            <hr>
                            <i class="fas fa-address-card"
                                style="font-size: 16px;color:#00BCD4;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $UD->NAME; ?>
                            <hr>
                            <i class="fas fa-envelope"
                                style="font-size: 16px; color:#F44336;"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $UD->EMAIL; ?>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <?php
                        if ($this->role_id == 5) {
                            echo '<i class="fas fa-building" style="font-size:200px;color: #014a69;border: 1px solid #ccc;border-radius: 150px;padding: 30px 50px 40px 50px;"></i>';
                        } else if ($this->role_id == 6) {
                            echo '<i class="fas fa-user" style="font-size:200px;color: #014a69;border: 1px solid #ccc;border-radius: 150px;padding: 30px 50px 40px 50px;"></i>';
                        } else {
                            echo '<i class="fas fa-university" style="font-size:200px;color: #014a69;border: 1px solid #ccc;border-radius: 150px;padding: 30px 50px 40px 50px;"></i>';
                        }
                        ?>
                        <?php echo '<br><div style="font-weight: bold; font-size: 24px; color: #aaa; letter-spacing: 5px; text-shadow: 1px 1px #1a1a1a;">' . strtoupper($UD->PLACE) . '</div><hr><div style="color: #f36d1b;font-size: 18px;">' . $UD->NAME; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if ($this->role_id == 6) { ?>
                    <i class="fas fa-user-edit" style="font-size: 22px; color: #01a0e2;"></i>
                    &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;"
                        href="<?php echo base_url('my-profile/') . EncryptIt($this->user_name); ?>">My Profile</a>
                    <?php } else { ?>
                    <i class="fas fa-chart-pie" style="font-size: 22px; color: #01a0e2;"></i>
                    &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;"
                        href="<?php echo base_url('dashboard'); ?>">Goto Dashboard</a>
                    <?php  } ?>
                    <hr>
                    <i class="fas fa-key" style="font-size: 22px; color: #ff9800;"></i>
                    &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold;"
                        href="<?php echo base_url('Update-Login-Password'); ?>">Update Password</a>
                    <hr>
                    <!--<i class="fas fa-info-circle" style="font-size: 22px; color:#F44336;"></i> 
                        &nbsp;&nbsp;<a style="font-size: 14px; font-weight: bold; color:#014A69;"  data-toggle="modal" data-target="#myModal">Basic Instructions</a>
                        <hr>-->
                    <a href="<?php echo base_url(''); ?>img/PIMS-Document1.0.pdf" target="_blank">
                        <i class="fas fa-download" style="font-size: 22px; color:#F44336;"></i>
                        &nbsp;&nbsp;<a style="font-size: 12px; font-weight: bold; color:#014A69;">Employee Service Data
                            Update Process Document<img src="<?php echo base_url(''); ?>img/new-gif-image.gif"
                                height="25"></a>
                    </a>
                    <hr>
                    <a href="<?php echo base_url(''); ?>img/PIMS-Document 2.0.pdf" target="_blank">
                        <i class="fas fa-download" style="font-size: 22px; color:#F44336;"></i>
                        &nbsp;&nbsp;<a style="font-size: 12px; font-weight: bold; color:#014A69;">Employee Profile
                            Transfer Process Document<img src="<?php echo base_url(''); ?>img/new-gif-image.gif"
                                height="25"></a>
                    </a>
                    <?php if ($this->role_id == 3) { ?>
                    <hr>
                    <a href="<?php echo base_url(''); ?>img/PIMS-Document 3.0.pdf" target="_blank">
                        <i class="fas fa-download" style="font-size: 22px; color:#F44336;"></i>
                        &nbsp;&nbsp;<a style="font-size: 12px; font-weight: bold; color:#014A69;">Assign External
                            Observer for Class Observation<img src="<?php echo base_url(''); ?>img/new-gif-image.gif"
                                height="25"></a>
                    </a>
                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
    <div style="color: #fff;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 0.75rem 1rem;
    margin-bottom: 1rem;
    list-style: none;
    background-color: rgb(240 15 0);">
        <em>For any Query / Support / Feedback Please Write us on the PIMS Portal Support Mail Id: <a
                href="mailto:kvspims@gmail.com"><u>kvspims@gmail.com</u></a> with Your KV/RO/ZIET Code And If the query
            is Employee Specific then mention the Employee Code with Designation and Subject(if any).</em>
    </div>

    <!-- =============================== MODAL POPUP START ==================================-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center text-default">PIMS - Sanctioned Post Update Notice</h5>
                </div>
                <div class="modal-body text-justify">
                    <h6 class="text-warning">The vacancy position of staff of your Vidyalaya for the session 2021-22 has
                        been updated in the PIMS portal.</h6>
                    <hr>

                    <p>Kindly, Check the In-position employees data against the sanctioned post data.</p>
                    <p>The Surplus staff position will be highlighted in Red color in the <a
                            href="<?php echo base_url('/vacancy-report'); ?>">post strength report</a> menu under MIS
                        Report. Kindly verify the sanctioned strength of your Vidyalaya for session 2021-22.</p>
                    <h6 class="text-warning">To update the employee's employment status, please follow the steps on the
                        PIMS portal...</h6>
                    <hr>
                    <ul>
                        <li>Log on to the PIMS portal from the Unit head (KV / RO / ZIET / KVS Estt. 1, and KVS Estt.
                            2&3) login credential.</li>

                        <li>Check and Unlock the employee profile.
                            <ul>
                                <li>- From the left-side menu navigate MIS REPORTS -> REGD. EMPLOYEES REPORT.</li>
                                <li>- Check the PROFILE column against the employee code.</li>
                                <li>- If it shows "Locked " then click on the Locked button, A pop-up window will appear
                                    then click on agree button to unlock the employee profile.</li>
                            </ul>
                        </li>
                        <li>After unlocking the employee Profile, to edit/update the employee data click on EDIT
                            EMPLOYEE DATA from the left-side menu.</li>

                        <li>From the Existing Employee block click on the edit/update button.</li>

                        <li>Enter the Employee code you want to update and press submit.</li>

                        <li>From the Personal tab go to the "Present Posting Details " section and update the Employment
                            Status & Effective date of Employment Status field and then press Save & Next button.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ================================ MODAL POPUP END ================================== -->
</div>
<style>
a[href^="mailto:"] {
    font-family: sans-serif;
    color: #ffffff;
    font-weight: bold;
}
</style>
<script>
$(document).ready(function() {
    var LogRole = '<?php echo $this->session->userdata('role_id'); ?>';
    if (LogRole && LogRole == 5) {
        // $('#myModal').modal('show');
    }
});
</script>