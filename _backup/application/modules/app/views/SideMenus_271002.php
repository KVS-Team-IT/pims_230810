<?php $cur_url = current_url(); ?>
<ul class="sidebar navbar-nav">
    
    <!-- ============================== PIMS DASHBOARD ============================= -->
    <?php
    if(has_permission('menu-dashboard')){
        if(has_permission('admin/dashboard')&& $this->role_id!=6){
    ?>
    <li class="active nav-item <?php if (strpos($cur_url, 'dashboard') !== false || strpos($cur_url, 'Update-Default-Password') !== false){echo'menu_active active'; }?>">
        <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    <?php
        }
    }
    ?>
    <!-- ============================== PIMS DASHBOARD END ============================= -->
    
    
    <!-- ============================== EMPLOYEE MANAGEMENT ============================= -->
    <?php
    if(has_permission('menu-employee')){
        if($this->role_id==3 || $this->role_id==4 || $this->role_id==5 || $this->role_id==7){
    ?>
        <li class="active nav-item 
            <?php if(
                   strpos($cur_url, 'employee-master')   !== false 
                || strpos($cur_url, 'personal-details') !== false 
                || strpos($cur_url, 'service-details')   !== false 
                || strpos($cur_url, 'academic-details')  !== false 
                || strpos($cur_url, 'family-details')    !== false 
                || strpos($cur_url, 'payscale-details')  !== false
                || strpos($cur_url, 'award-details')     !== false 
                || strpos($cur_url, 'training-details')  !== false
                || strpos($cur_url, 'performance-details') !== false 
                || strpos($cur_url, 'promotion-details')   !== false
                || strpos($cur_url, 'financial-details')   !== false 
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false 
                ){ echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;UPDATE EMPLOYEE DATA</span>
            </a>
        </li>
    <?php
        }
        else if($this->role_id==2 &&($this->role_category==9 || $this->role_category==10) ){
    ?>
        <li class="active nav-item 
            <?php if(
                   strpos($cur_url, 'employee-master')   !== false 
                || strpos($cur_url, 'personal-details') !== false 
                || strpos($cur_url, 'service-details')   !== false 
                || strpos($cur_url, 'academic-details')  !== false 
                || strpos($cur_url, 'family-details')    !== false 
                || strpos($cur_url, 'payscale-details')  !== false
                || strpos($cur_url, 'award-details')     !== false 
                || strpos($cur_url, 'training-details')  !== false
                || strpos($cur_url, 'performance-details') !== false 
                || strpos($cur_url, 'promotion-details')   !== false
                || strpos($cur_url, 'financial-details')   !== false 
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false 
                ){ echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;UPDATE EMPLOYEE DATA</span>
            </a>
        </li>
    <?php
        }
    }
    ?>
    <!-- ============================== PROFILE MANAGEMENT ============================= -->
    <?php
    if(has_permission('menu-profile')){
    ?>
    <li class="active nav-item 
        <?php if(
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'personal-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'service-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'academic-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'family-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'payscale-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'award-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'training-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'performance-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'promotion-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'financial-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'teacher-exchange-details') !== false && $this->role_id!=5)
                || (strpos($cur_url, 'foreign-visit-details') !== false && $this->role_id!=5)
        ) { echo'menu_active '; } ?>">
        <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
            <i class="fas fa-users" aria-hidden="true"></i>
            <span>REGD. EMPLOYEE LIST</span>
        </a>
    </li> 
    <?php } ?>
    <!-- ============================== PROFILE MANAGEMENT END ============================= -->
    
    <?php if(($this->role_id!=1) && ($this->role_id!=6)){ ?>
    
    <li class="active nav-item dropdown  <?php if (
            (strpos($cur_url, 'support-staff-list') !== false)
            ||
            (strpos($cur_url, 'support-staff-add') !== false)
            ||
            (strpos($cur_url, 'support-staff-edit') !== false)
            ) {  echo'menu_active ';  } ?>">
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!--  <i class="fas fa-exchange-alt"></i> !-->
                      <i class="fas fa-users"></i>
                <span>CONTRACTUAL POST</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
                
                <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW 
                </a>
               
            </div>
        </li>
        <?php if($this->role_id==2 && $this->role_category==9){
                
            } else if($this->role_id==2 && $this->role_category==10){
            
            }else{ ?>
        <li class="active nav-item dropdown <?php if (
            (strpos($cur_url, 'class-section-proposal') !== false)
            ||
            (strpos($cur_url, 'post-strength-proposal') !== false)
            ||
            (strpos($cur_url, 'class-section-proposal-ro') !== false)
			||
            (strpos($cur_url, 'post-strength-proposal-ro') !== false)
			||
            (strpos($cur_url, 'post-strength-proposal-hq') !== false)
			||
            (strpos($cur_url, 'class-post-proposal-hq') !== false)
            ) {
        echo'menu_active ';
    } ?>">
            
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>NEW PROPOSAL</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
                <?php if($this->session->userdata('role_id')==5){?>
				
                <a class="dropdown-item" href="<?php echo site_url('class-section-proposal'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php  echo site_url('post-strength-proposal'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH PROPOSAL
                </a>
				
                <?php } ?>
                <?php if($this->session->userdata('role_id')==3){?>
                
                <a class="dropdown-item" href="<?php  echo site_url('class-section-proposal-ro'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                </a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php  echo site_url('post-strength-proposal-ro'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH  PROPOSAL
                </a>
				
                <?php } ?>
                <?php if($this->session->userdata('role_id')==2 && $this->session->userdata('role_category')==1){?>
                
                <a class="dropdown-item" href="<?php  echo site_url('class-section-proposal-hq'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL 
                </a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="<?php  echo site_url('post-strength-proposal-hq'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH  PROPOSAL
                </a>
				
            <?php } ?>
                
            </div>
        </li>
    <?php
    }}
    ?>
    <!-- ============================== MY PROFILE  ============================= -->
    <?php
    if (has_permission('menu-myprofile')) {
        $EC=$this->user_name;
        $MyURI='my-profile/'. EncryptIt($EC);
    ?>
        <li class="active nav-item <?php if (strpos($cur_url, 'my-profile') !== false) {  echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url($MyURI); ?>">
                <i class="fas fa-address-card"></i>
                <span>MY PROFILE</span>
            </a>
        </li>
    <?php
    }
    ?>
    <!-- ============================== MIS REPORT ============================= -->
    <?php
    if(has_permission('menu-mis-report')){
        if($this->role_id != '6'){
        ?>
        <li class="active nav-item dropdown <?php if (
                strpos($cur_url, 'employee-report') !== false
                || strpos($cur_url, 'vacancy-report') !== false 
                || strpos($cur_url, 'consolidated-report') !== false 
                ){  echo'menu_active '; } ?>">
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-newspaper-o"></i>
                <span>MIS REPORTS</span>
            </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
            <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
            </a>
            <div class="dropdown-divider"></div>
            <?php if($this->role_id == '5'){ ?>
            <a class="dropdown-item" href="<?php  echo site_url('comparative-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPARATIVE REPORT
            </a>
            <?php } if($this->role_id == '1'){ ?>
            <a class="dropdown-item" href="<?php  echo site_url('consolidated-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CONSOLIDATED REPORT
            </a>
            <?php } ?>
        </div>
        </li>
        <?php
        }
    }
    ?>
    <!-- ============================== TRANSFER MANAGEMENT ============================= -->
    <?php
    if(has_permission('menu-transfer')){
    ?>
        <li class="active nav-item dropdown
            <?php if (
                    strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false 
                ||  strpos($cur_url, 'pending-for-resolution') !== false 
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
                    ){  echo'menu_active '; } ?>">
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-exchange-alt"></i>
                <span>TRANSFER DETAILS</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
                <?php if (has_permission('swap/index')) { ?>
                <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                </a>
                <?php } if (has_permission('swap/pending_for_approval') && $this->session->userdata['role_id']!='1') { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE TRANSFER REQUEST
                </a>
                <?php } if (has_permission('swap/pending_for_resolution')) { ?>
                <?php if($this->session->userdata['role_id']=='2' && $this->session->userdata['role_category']=='3'){ ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('pending-for-resolution'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;PENDING FOR RESOLUTION
                </a>
                <?php } ?>
                <?php } if (has_permission('swap/transfer_history')) { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                </a>
                <?php } ?>
                <?php if (has_permission('swap/transfer_history')) { ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                </a>
                <?php } ?>
            </div>
        </li>
    <?php
    }
    ?>
     <!-- ============================== COMPLIANCE REPORT ============================= -->
    <?php
    if(has_permission('menu-com-report')){
    ?>
    <li class="active nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!--  <i class="fas fa-exchange-alt"></i> !-->
		  <i class="fa fa-gavel" aria-hidden="true"></i>
            <span>COMPLIANCE</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
            <?php
            if($this->session->userdata['role_id']!='1'){
            ?>
            <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
            </a>
            <?php
            }
            if($this->session->userdata['role_id']=='3'){
            ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
            </a>
            <?php
            }
            ?>
            <?php
            if($this->session->userdata['role_id']== '2' || $this->session->userdata['role_category']=='3'){
            ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
            </a>
            <?php
            }
            ?>
        </div>
    </li>
    <?php
    }
    ?>
    
    <!-- ============================== USER ACTIVITY ============================= -->
    <?php
    if(has_permission('menu-user')){
        ?>
        <li class="active nav-item  <?php if (
                strpos($cur_url, 'Activity-Logs') !== false
                ) { echo'menu_active active'; } ?>">
            <a class="nav-link" href="<?php echo site_url('Activity-Logs'); ?>">
                <i class="fa fa-history"></i>
                <span>USERS ACTIVITY</span>
            </a>
        </li>
        <?php
    }?>
    <!-- ============================== EMPLOYEE PROFILE ============================= -->
    
    <?php
    if (has_permission('menu-notify')) {
    ?>
        <li class="active nav-item <?php if (
                strpos($cur_url, 'notifications') !== false
                ) {  echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('notifications'); ?>">
                <i class="fas fa-comment"></i>
                <span>NOTIFICATIONS</span>
            </a>
        </li>
    <?php
    if($this->session->userdata['role_id']== '6'){
    ?>
        <li class="active nav-item <?php if (
                strpos($cur_url, 'send-notifications') !== false
                ) {  echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('send-notifications'); ?>">
                <i class="fas fa-comment"></i>
                <span>FEEDBACKS</span>
            </a>
        </li>
    <?php
        }
    }
    ?>
    <li class="active nav-item <?php if (
            strpos($cur_url, 'profile-activities') !== false
            ) {  echo'menu_active '; } ?>">
        <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
            <i class="fas fa-list-alt"></i>
            <span>PROFILE ACTIVITIES</span>
        </a>
    </li>
     <!-- ============================== MESSAGES REPORT ============================= -->
        <li class="active nav-item dropdown <?php if (
            strpos($cur_url, 'My-Inbox') !== false
            || strpos($cur_url, 'Compose-Message') !== false
            || strpos($cur_url, 'Reply-Message') !== false 
            ) {  echo'menu_active '; } ?>">
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-envelope-open"></i>
                <span>MESSAGES</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
                <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                </a>
                
            </div>
        </li>
      
    <!-- ============================== TRANSFER MANAGEMENT ============================= -->
    
    <!-- ============================== USER MASTER ============================= -->
    <?php
    if(has_permission('menu-user') && $this->session->userdata['role_id']=='1'){
        ?>
        <li><label style="color: #014A69;text-align: center;width: 100%;font-size: x-small;letter-spacing: 10px;background: #E76C26;"><hr>MASTER DATA<hr></label></li>
        <li class="active nav-item  <?php if (strpos($cur_url, 'admin/users/index') !== false) {
            echo'menu_active active';
        } ?>">
            <a class="nav-link" href="<?php echo site_url('admin/users/index'); ?>">
                <i class="fas fa-users" aria-hidden="true"></i>
                <span>USERS MASTER</span>
            </a>
        </li>
        
        <?php
    }?>
    <!-- ============================== ROLE MASTER ============================= -->   
    <?php
    if (has_permission('menu-role') && $this->session->userdata['role_id']=='1') {
        ?>
        <li class="active nav-item <?php if (strpos($cur_url, 'admin/roles') !== false) {  echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('admin/roles'); ?>">
                <i class="fas fa-address-card"></i>
                <span>ROLES MASTER</span>
            </a>
        </li>
        <?php
    }
    ?>
    <!-- ============================== VACANCY MASTER ============================= -->
    <?php
    if(has_permission('menu-master') && $this->session->userdata['role_id']=='1'){
    ?>
    <li class="active nav-item <?php if (strpos($cur_url, 'vacancy/index') !== false) { echo'menu_active '; } ?>">
            <a class="nav-link" href="<?php echo site_url('vacancy/index'); ?>">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <span>VACANCY MASTER</span>
            </a>
    </li>
    <?php
    }
    ?>
    <!-- ============================== ALL MASTERS ============================= -->   
    <?php
        if(has_permission('menu-master') && $this->session->userdata['role_id']=='1') {
    ?>
    <li class="active nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs" aria-hidden="true"></i>
            <span>PIMS MASTER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
            <?php if (has_permission('master/designation_category')) {  ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/master/designation_category'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;DESIGNATIONS CATEGORY
                </a>
                <?php }
            ?>
            <?php if (has_permission('master/designation')) { ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/designation'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;DESIGNATIONS MASTER
            </a>
            <?php }?>
            
            <?php if (has_permission('master/category')) { ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/category'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CATEGORY MASTER
            </a>
            <?php }?>
            
            <?php if (has_permission('master/region')) { ?>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/region'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGION MASTER
            </a>
            <?php }?>
            
            <?php if (has_permission('master/school')) { ?>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/school'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SCHOOL MASTER
            </a>
            <?php }?>
            
            <?php if (has_permission('master/subject')) { ?>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/subject'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBJECTS MASTER
            </a>
            <?php }?>
           
            <?php if (has_permission('master/level_range')) { ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('admin/master/level_range'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;PAY LEVEL
            </a>
            <?php }?>
        </div>
    </li>
    
    <?php
        }
    ?>
</ul>