<?php echo $this->load->view('app/Header'); ?>
<div id="wrapper">
    <?php echo $this->load->view('app/SideMenus'); ?>
    <?php echo (isset($content))?$content:''; ?>
    <?php echo $this->load->view('app/Footer'); ?>
</div>	


