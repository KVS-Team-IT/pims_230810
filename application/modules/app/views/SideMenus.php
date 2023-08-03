<?php $cur_url = current_url(); ?>
<ul class="sidebar navbar-nav">
    <!-- ============================== PIMS HOME ============================= -->

    <li class="active nav-item <?php if (strpos($cur_url, 'home') !== false) {
                                    echo 'menu_active active';
                                } ?>">
        <a class="nav-link" href="<?php echo site_url('home'); ?>">
            <i class="fas fa-home"></i>
            <span>&nbsp;HOME</span>
        </a>
    </li>


    <!-- ============================== PIMS DASHBOARD ============================= -->
    <?php
    if (has_permission('menu-dashboard')) {
        if (has_permission('admin/dashboard') && $this->role_id != 6) {
    ?>
            <li class="active nav-item <?php if (strpos($cur_url, 'dashboard') !== false || strpos($cur_url, 'Update-Default-Password') !== false) {
                                            echo 'menu_active active';
                                        } ?>">
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

    <!-- ======================= KVS (HQ)/ WEB ADMIN ROLE: 1 / CAT:0 =================== -->
    <?php
    if (has_permission('menu-dashboard')) {
        if ($this->role_id == 1 && $this->role_category == 0) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                    || strpos($cur_url, 'consolidated-unit-report') !== false
                                                    || strpos($cur_url, 'consolidated-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-unit-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CONSOLIDATED EMPLOYEE REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-post-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CONSOLIDATED POST REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;GOVT. APPROVAL REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown
        <?php if (
                strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">


                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <!--<a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
            </a>
            <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="<?php echo site_url('observation-dashboard'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Dashboard
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>

                    <!--<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('observed-data'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ALL OBSERVATION
            </a>-->
                </div>
            </li>

            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'assessment/all') !== false
                                                    ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                                ) {
                                                    echo 'menu_active';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>ASSESSMENT OF FLN</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">



                    <a class="dropdown-item" href="<?php echo site_url('assessment/all/1'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 1
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/all/2'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 2
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/all/3'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 3
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('recycle_bin_list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;RECYCLE BIN
                    </a>
                </div>
            </li>

            <li class="active nav-item  <?php if (
                                            strpos($cur_url, 'Activity-Logs') !== false
                                        ) {
                                            echo 'menu_active active';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('Activity-Logs'); ?>">
                    <i class="fa fa-history"></i>
                    <span>USERS ACTIVITY</span>
                </a>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
            <!-- ================================ MASTER DATA ================================-->
            <li><label style="color: #014A69;text-align: center;width: 100%;font-size: x-small;letter-spacing: 10px;background: #E76C26;">
                    <hr>MASTER DATA
                    <hr>
                </label></li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'user-master') !== false
                                                    || strpos($cur_url, 'emp-master') !== false
                                                    || strpos($cur_url, 'add-user') !== false
                                                    || strpos($cur_url, 'add-employee') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>PIMS USER</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('user-master'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;USERS
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('emp-master'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;EMPLOYEES
                    </a>

                </div>
            </li>

            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cogs" aria-hidden="true"></i>
                    <span>PIMS MASTER</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('admin/roles'); ?>">
                        <i class="fas fa-address-card"></i>&nbsp;ROLES MASTER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy/index'); ?>">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;VACANCY MASTER
                    </a>

                    <?php if (has_permission('master/designation_category')) {  ?>
                        <div class="dropdown-divider"></div>
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
                    <?php } ?>

                    <?php if (has_permission('master/category')) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/category'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CATEGORY MASTER
                        </a>
                    <?php } ?>

                    <?php if (has_permission('master/region')) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/region'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGION MASTER
                        </a>
                    <?php } ?>

                    <?php if (has_permission('master/school')) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/school'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SCHOOL MASTER
                        </a>
                    <?php } ?>

                    <?php if (has_permission('master/subject')) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/subject'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBJECTS MASTER
                        </a>
                    <?php } ?>

                    <?php if (has_permission('master/level_range')) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/level_range'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;PAY LEVEL
                        </a>
                    <?php } ?>
                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KVS (HQ)/ EDP CELL ROLE: 1 / CAT:1 ==================== -->
    <?php
    if (has_permission('menu-dashboard')) {
        if ($this->role_id == 1 && $this->role_category == 1) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                    || strpos($cur_url, 'consolidated-unit-report') !== false
                                                    || strpos($cur_url, 'consolidated-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-unit-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CONSOLIDATED REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;GOVT. APPROVAL REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown
        <?php if (
                strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">


                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <!--<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('observed-data'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ALL OBSERVATION
            </a>-->
                </div>
            </li>
            <li class="active nav-item  <?php if (
                                            strpos($cur_url, 'Activity-Logs') !== false
                                        ) {
                                            echo 'menu_active active';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('Activity-Logs'); ?>">
                    <i class="fa fa-history"></i>
                    <span>USERS ACTIVITY</span>
                </a>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
            <!-- ================================ MASTER DATA ================================-->
            <li><label style="color: #014A69;text-align: center;width: 100%;font-size: x-small;letter-spacing: 10px;background: #E76C26;">
                    <hr>MASTER DATA
                    <hr>
                </label></li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'user-master') !== false
                                                    || strpos($cur_url, 'emp-master') !== false
                                                    || strpos($cur_url, 'add-user') !== false
                                                    || strpos($cur_url, 'add-employee') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cogs"></i>
                    <span>MANAGE USER</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('user-master'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;USERS
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('emp-master'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;EMPLOYEES
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KVS (HQ)/ COMMISSIONER / JC ROLE: 1 / CAT:2 ==================== -->
    <?php
    if (has_permission('menu-dashboard')) {
        if ($this->role_id == 1 && $this->role_category == 2) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                    || strpos($cur_url, 'consolidated-unit-report') !== false
                                                    || strpos($cur_url, 'consolidated-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('consolidated-unit-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CONSOLIDATED REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown
        <?php if (
                strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                </div>
            </li>
            <li class="active nav-item  <?php if (
                                            strpos($cur_url, 'Activity-Logs') !== false
                                        ) {
                                            echo 'menu_active active';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('Activity-Logs'); ?>">
                    <i class="fa fa-history"></i>
                    <span>USERS ACTIVITY</span>
                </a>
            </li>
    <?php
        }
    }
    ?>
    <!-- ==========================  END OF COMMISSIONER PART  ========================= -->
    <!-- ======================= KVS (HQ)/ ALL SECTIONS ROLE: 2 / CAT:(1-7) ============ -->
    <?php
    if (has_permission('menu-dashboard')) {
        if ($this->role_id == 2 && ($this->role_category == 1 || $this->role_category == 2 || $this->role_category == 3 || $this->role_category == 4 || $this->role_category == 5 || $this->role_category == 6 || $this->role_category == 7)) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <!--<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('observed-data'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ALL OBSERVATION
            </a>-->
                </div>
            </li>
            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>
                    <?php if ($this->session->userdata['role_id'] == '2' && $this->session->userdata['role_category'] == '3') { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('pending-for-resolution'); ?>">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;PENDING FOR RESOLUTION
                        </a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KVS (HQ)/ ESTABLISH - I ROLE: 2 / CAT:9 =============== -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 2 && $this->role_category == 9) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>

            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KVS (HQ)/ ESTABLISH - II & III ROLE: 2 / CAT:10 ======= -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 2 && $this->role_category == 10) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>

            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= REGIONAL OFFICE - I ROLE: 3 / CAT:0 =================== -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 3 && $this->role_category == 0) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-assign-observer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ASSIGN OBSERVER
                    </a>
                </div>
            </li>

            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'assessment/all') !== false
                                                    ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                                ) {
                                                    echo 'menu_active';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>ASSESSMENT OF FLN</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">



                    <a class="dropdown-item" href="<?php echo site_url('assessment/all/1'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 1
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/all/2'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 2
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('recycle_bin_list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;RECYCLE BIN
                    </a>
                </div>
            </li>


            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'class-section-proposal-ro') !== false
                                                    ||  strpos($cur_url, 'post-strength-proposal-ro') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i><span>NEW PROPOSAL</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('class-section-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('post-strength-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH PROPOSAL
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= REGIONAL OFFICE - II ROLE: 3 / CAT:1 ================== -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 3 && $this->role_category == 1) {
    ?>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-assign-observer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ASSIGN OBSERVER
                    </a>

                    <!--<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('observed-data'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ALL OBSERVATION
            </a>-->
                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= ZIET OFFICE - II ROLE: 4 / CAT:0     ================== -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 4 && $this->role_category == 0) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <!--<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo site_url('observed-data'); ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ALL OBSERVATION
            </a>-->
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'class-section-proposal-ro') !== false
                                                    ||  strpos($cur_url, 'post-strength-proposal-ro') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i><span>NEW PROPOSAL</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('class-section-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('post-strength-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH PROPOSAL
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KENDRIYA VIDYALAYA ROLE: 5 / CAT:0     ================ -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 5 && $this->role_category == 0) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-assign-observer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ASSIGN OBSERVER
                    </a>
                </div>
            </li>

            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'school-profile') !== false
                                                    ||  strpos($cur_url, 'school-class-profile') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-school"></i>
                    <span>SCHOOL PROFILE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <!--<a class="dropdown-item" href="<?php // echo site_url('school-profile'); 
                                                        ?>">
                <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;School Profile
            </a>
            <div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="<?php echo site_url('school-class-profile'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Class Strength
                    </a>
                    <?php if ($this->role_id == 5) { ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo site_url('admin/master/addschool/' . $this->session->userdata['school_id']); ?>">

                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Update Profile
                        </a>
                    <?php } ?>
                </div>
            </li>


            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'class-section-proposal-ro') !== false
                                                    ||  strpos($cur_url, 'post-strength-proposal-ro') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i><span> NEW PROPOSAL</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('class-section-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('post-strength-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH PROPOSAL
                    </a>
                </div>
            </li>

            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'assessment') !== false
                                                    ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                                ) {
                                                    echo 'menu_active show';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>ASSESSMENT OF FLN</span>
                </a>

                <div class="dropdown-menu <?php if (
                                                strpos($cur_url, 'assessment') !== false
                                                ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                            ) {
                                                echo 'show';
                                            } ?>" aria-labelledby="pagesDropdown" x-placement="top-start">


                    <a class="dropdown-item" href="<?php echo site_url('assessment/1'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 1
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/2'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 2
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/3'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 3
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('recycle_bin_list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;RECYCLE BIN
                    </a>
                </div>
            </li>


            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>

            <!--<li class="active nav-item dropdown <?php if (
                                                        strpos($cur_url, 'My-Inbox') !== false
                                                        || strpos($cur_url, 'Compose-Message') !== false
                                                        || strpos($cur_url, 'Reply-Message') !== false
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
            <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-envelope-open"></i>
                <span>Students</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start" >
                <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Add Student
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Student Lists
                </a>
                
            </div>
        </li>-->
    <?php
        }
    }
    ?>
    <!-- ======================= KENDRIYA VIDYALAYA (VP)ROLE: 5 / CAT:1     ================ -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 5 && $this->role_category == 1) {
    ?>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KENDRIYA VIDYALAYA (HM)ROLE: 5 / CAT:2     ================ -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 5 && $this->role_category == 2) {
    ?>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= KENDRIYA VIDYALAYA (GUEST CLASS OBSERVER)ROLE: 5 / CAT:3     ================ -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 5 && $this->role_category == 3) {
    ?>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= ALL EMPLOYEE ROLE: 6 / CAT:0     ====================== -->
    <?php
    if (has_permission('menu-dashboard')) {
        if ($this->role_id == 6 && $this->role_category == 0) {
            $EC = $this->user_name;
            $MyURI = 'my-profile/' . EncryptIt($EC);
    ?>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'assessment') !== false
                                                    ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                                ) {
                                                    echo 'menu_active show';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>ASSESSMENT OF FLN</span>
                </a>

                <div class="dropdown-menu <?php if (
                                                strpos($cur_url, 'assessment') !== false
                                                ||  strpos($cur_url, 'assessment/recycle_bin') !== false
                                            ) {
                                                echo 'show';
                                            } ?>" aria-labelledby="pagesDropdown" x-placement="top-start">


                    <a class="dropdown-item" href="<?php echo site_url('assessment/teacher_listing/1'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 1
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('assessment/teacher_listing/2'); ?>">
                        <i class="fa fa-users" aria-hidden="true"></i>&nbsp; Class 2
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('recycle_bin_list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;RECYCLE BIN
                    </a>
                </div>
            </li>

            <li class="active nav-item <?php if (strpos($cur_url, 'my-profile') !== false) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url($MyURI); ?>">
                    <i class="fas fa-address-card"></i>
                    <span>MY PROFILE</span>
                </a>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>
    <!-- ======================= ABROAD KV ROLE: 7 / CAT:0     ========================= -->
    <?php
    if (has_permission('menu-employee')) {
        if ($this->role_id == 7 && $this->role_category == 0) {
    ?>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'employee-master')      !== false
                || strpos($cur_url, 'personal-details')     !== false
                || strpos($cur_url, 'service-details')      !== false
                || strpos($cur_url, 'academic-details')     !== false
                || strpos($cur_url, 'family-details')       !== false
                || strpos($cur_url, 'payscale-details')     !== false
                || strpos($cur_url, 'award-details')        !== false
                || strpos($cur_url, 'training-details')     !== false
                || strpos($cur_url, 'performance-details')  !== false
                || strpos($cur_url, 'promotion-details')    !== false
                || strpos($cur_url, 'financial-details')    !== false
                || strpos($cur_url, 'teacher-exchange-details') !== false
                || strpos($cur_url, 'foreign-visit-details')    !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('employee-master'); ?>">
                    <i class="fas fa-user-cog" aria-hidden="true"></i><span>&nbsp;EDIT EMPLOYEE DATA</span>
                </a>
            </li>
            <li class="active nav-item 
        <?php if (
                strpos($cur_url, 'registered-employee') !== false
                || (strpos($cur_url, 'employee-details') !== false)

            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link" href="<?php echo site_url('registered-employee'); ?>">
                    <i class="fas fa-users" aria-hidden="true"></i>
                    <span>REGD. EMPLOYEE LIST</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'employee-report') !== false
                                                    || strpos($cur_url, 'vacancy-report') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>&nbsp;<span>MIS REPORTS</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('employee-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;REGD. EMPLOYEES REPORT
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('vacancy-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'new-web-tools') !== false
                                                    ||  strpos($cur_url, 'new-observed-data') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-edit"></i>
                    <span>CLASS OBSERVATION</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('new-web-tools'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;NEW OBSERVATION
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('new-observed-data'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;OBSERVED DATA
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'class-section-proposal-ro') !== false
                                                    ||  strpos($cur_url, 'post-strength-proposal-ro') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-book" aria-hidden="true"></i><span>NEW PROPOSAL</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('class-section-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;CLASS SECTION PROPOSAL
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('post-strength-proposal-ro'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;POST STRENGTH PROPOSAL
                    </a>
                </div>
            </li>
            <li class="active nav-item dropdown  <?php if (
                                                        (strpos($cur_url, 'support-staff-list') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-add') !== false)
                                                        ||
                                                        (strpos($cur_url, 'support-staff-edit') !== false)
                                                    ) {
                                                        echo 'menu_active ';
                                                    } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fas fa-users"></i>
                    <span>CONTRACTUAL POST</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('support-staff-list'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;VIEW LIST
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('support-staff-add'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;ADD NEW
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown
            <?php if (
                strpos($cur_url, 'initiate-transfer') !== false
                ||  strpos($cur_url, 'pending-for-approval') !== false
                ||  strpos($cur_url, 'pending-for-resolution') !== false
                ||  strpos($cur_url, 'transfer-history') !== false
                ||  strpos($cur_url, 'transferred-book-keeping') !== false
            ) {
                echo 'menu_active ';
            } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i>&nbsp;<span>TRANSFER </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">

                    <a class="dropdown-item" href="<?php echo site_url('initiate-transfer'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INITIATE TRANSFER
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('pending-for-approval'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;UPDATE REQUEST
                    </a>



                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transfer-history'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFER HISTORY
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('transferred-book-keeping'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;TRANSFERRED EMPLOYEE
                    </a>

                </div>
            </li>
            <li class="active nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--  <i class="fas fa-exchange-alt"></i> !-->
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                    <span>COMPLIANCE</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('submit-compliance'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;SUBMIT COMPLIANCE
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('compliance-report'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPLIANCE REPORT
                    </a>
                </div>
            </li>
            <li class="active nav-item <?php if (
                                            strpos($cur_url, 'profile-activities') !== false
                                        ) {
                                            echo 'menu_active ';
                                        } ?>">
                <a class="nav-link" href="<?php echo site_url('profile-activities'); ?>">
                    <i class="fas fa-list-alt"></i>
                    <span>PROFILE ACTIVITIES</span>
                </a>
            </li>
            <li class="active nav-item dropdown <?php if (
                                                    strpos($cur_url, 'My-Inbox') !== false
                                                    || strpos($cur_url, 'Compose-Message') !== false
                                                    || strpos($cur_url, 'Reply-Message') !== false
                                                ) {
                                                    echo 'menu_active ';
                                                } ?>">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-open"></i>
                    <span>MESSAGES</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown" x-placement="top-start">
                    <a class="dropdown-item" href="<?php echo site_url('My-Inbox'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;INBOX
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('Compose-Message'); ?>">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;COMPOSE
                    </a>

                </div>
            </li>
    <?php
        }
    }
    ?>

    <!-- ============================ END MENU ARRANGEMENT ============================ -->


</ul>