<?php $cur_url = current_url(); ?>
<section>
<nav>
    <ol class="cd-breadcrumb triangle">
        <li <?php if (strpos($cur_url, 'personal-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'personal-details"'; }else{ echo 'href="'.base_url().'personal-details/'.$EnEmpId.'"'; } ?>>Personal</a> 
        </li>
        <li <?php if (strpos($cur_url, 'service-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'service-details"'; }else{ echo 'href="'.base_url().'service-details/'.$EnEmpId.'"'; } ?>>Service</a> 
        </li>
        <li <?php if (strpos($cur_url, 'academic-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'academic-details"'; }else{ echo 'href="'.base_url().'academic-details/'.$EnEmpId.'"'; } ?>>Academic</a> 
        </li>
        <li <?php if (strpos($cur_url, 'family-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'family-details"'; }else{ echo 'href="'.base_url().'family-details/'.$EnEmpId.'"'; } ?>>Family</a> 
        </li>
        <li <?php if (strpos($cur_url, 'payscale-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'payscale-details"'; }else{ echo 'href="'.base_url().'payscale-details/'.$EnEmpId.'"'; } ?>>Pay-Level</a> 
        </li>
        <li <?php if (strpos($cur_url, 'award-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'award-details"'; }else{ echo 'href="'.base_url().'award-details/'.$EnEmpId.'"'; } ?>>Awards</a> 
        </li>
        <li <?php if (strpos($cur_url, 'training-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'training-details"'; }else{ echo 'href="'.base_url().'training-details/'.$EnEmpId.'"'; } ?>>Training</a> 
        </li>
        <li <?php if (strpos($cur_url, 'performance-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'performance-details"'; }else{ echo 'href="'.base_url().'performance-details/'.$EnEmpId.'"'; } ?>>APAR</a> 
        </li>
        <li <?php if (strpos($cur_url, 'promotion-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'promotion-details"'; }else{ echo 'href="'.base_url().'promotion-details/'.$EnEmpId.'"'; } ?>>Hierarchical Upgradation</a> 
        </li>
        <li <?php if (strpos($cur_url, 'financial-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'financial-details"'; }else{ echo 'href="'.base_url().'financial-details/'.$EnEmpId.'"'; } ?>>Financial Upgradation</a> 
        </li>
        <li <?php if (strpos($cur_url, 'teacher-exchange-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'teacher-exchange-details"'; }else{ echo 'href="'.base_url().'teacher-exchange-details/'.$EnEmpId.'"'; } ?>>Teacher Exchange Program</a> 
        </li>
        <li <?php if (strpos($cur_url, 'foreign-visit-details') !== false) {  echo 'class="current"'; } ?>>
            <a <?php if (empty($EnEmpId)){ echo 'href="'.base_url().'foreign-visit-details"'; }else{ echo 'href="'.base_url().'foreign-visit-details/'.$EnEmpId.'"'; } ?>>Foreign Visit</a> 
        </li>
    </ol>
    </nav>
</section>