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
    #lpc_print * { visibility: visible; }
    #lpc_print { position: absolute; top: 40px; left: 30px; }
    }
</style>
<div id="content-wrapper">
    <div class="container-fluid">
        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>swap/index">Transfer</a> / Generate LPC</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-money" aria-hidden="true"></i>&nbsp; Generate LPC
            </div>
            <div class="card-body user_view" id="lpc_print" >
            <?php echo form_open("", array("id" => "formID", "class" => "register", "autocomplete" => "off")); ?>
            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo isset($ID) ? $ID : ''; ?>">
            <div style="text-align: center!important; width: 100%; margin: 0px auto;">
                <hr>
            <h5>LAST PAY CERTIFICATE</h5>
            <span>(To be used in cases of transfers or leave deputationists)</span>
            </div>
            
            <div style="width: 75%; margin: 0px auto;">
                <hr>
                <p style="text-align: justify;">
                    <b>1.</b> Last pay certificate of <em><input type="text" name="emp_name" class="lpcxx" value="<?php echo $E->emp_title.' '.$E->emp_name; ?>"></em>,<em><input type="text" name="emp_post" class="lpcxx" value="<?php echo $E->designation; ?>"></em>( <em><input type="text" name="emp_sub" class="lpcxx" value="<?php if(!empty($E->subject)){ echo $E->subject; } ?>"> </em> ) of the Kendriya Vidyalaya / <em><input type="text" name="emp_loc" class="lpcxx" value="<?php echo $E->school; ?>"></em> proceeding on transfer / leave from <input type="text" name="leave_from" class="lpcx"> to <input type="text" name="leave_to" class="lpcx">
                </p>
                <p style="text-align: justify;"><b>2.</b> He has been paid upto <input type="text" name="paid_upto" class="lpcx"> at the following rates:-</p>
               
                <div class="row">
                    <div class="form-group col-md-12">
                        
                        <table width="100%;">
                            <tr><th style="width:50%;">Particular</th><th style="width:10%;"></th><th style="width:40%;text-align:left;">Rate</th></tr>
                            <tr><td>Substantive Pay </td><td>:</td><td><input type="text" name="sub_pay" class="lpc"></td></tr>
                            <tr><td>Officiating Pay </td><td>:</td><td><input type="text" name="off_pay" class="lpc"></td></tr>
                            <tr><td>Teaching Allowance </td><td>:</td><td><input type="text" name="teach_all" class="lpc"></td></tr>
                            <tr><td>Dearness Allowance </td><td>:</td><td><input type="text" name="dear_all" class="lpc"></td></tr>
                            <tr><td>House Rent Allowance </td><td>:</td><td><input type="text" name="house_all" class="lpc"></td></tr>
                            <tr><td>City (Compensatory) Allowance </td><td>:</td><td><input type="text" name="city_all" class="lpc"></td></tr>
                            <tr><td>Transport Allowance </td><td>:</td><td><input type="text" name="trans_all" class="lpc"></td></tr>
                            <tr><td>Hill Compensatory Allowance  </td><td>:</td><td><input type="text" name="hill_all" class="lpc"></td></tr>
                            <tr><td>Winter Allowance  </td><td>:</td><td><input type="text" name="winter_all" class="lpc"></td></tr>
                            <tr><th>Deductions</th><th></th><th style="text-align:left;">Rate</th></tr>
                            <tr><td>Income Tax </td><td>:</td><td><input type="text" name="income_tax" class="lpc"></td></tr>
                            <tr><td>GPF/C.P.F. Subscriptions </td><td>:</td><td><input type="text" name="gpf_cpf_nps_sub" class="lpc"></td></tr>
                            <tr><td>GPF/C.P.F. Advance </td><td>:</td><td><input type="text" name="gpf_cpf_nps_adv" class="lpc"></td></tr>
                            <tr><td>Group Ins. Scheme </td><td>:</td><td><input type="text" name="group_scheme" class="lpc"></td></tr>
                        </table>
                    </div>
                </div>
               
                <p style="text-align: justify;">
                    <b>3.</b> (a) His General provident Fund Account No.<em><input type="text" name="gpf_cpf_nps_ac_1" class="lpcxx" value="<?php if($E->emp_gpfcpfnps==1){echo $E->emp_gpfcpfnpsnumber;}else{echo '.....................';} ?>"></em> is maintained by Accountant General <input type="text" name="ac_gen" class="lpcx" value="">
                to whom credits have to be passed on.(for deputationists).
                <br><br>&emsp;(b) His GPF/CPF Account No.<em><input type="text" class="lpcxx" name="gpf_cpf_nps_ac_2" value="<?php if($E->emp_gpfcpfnps==1 || $E->emp_gpfcpfnps==2){echo $E->emp_gpfcpfnpsnumber;}else{echo '......................';} ?>"></em> is maintained by KVS Head Office/Regional Office and his rate of subscriptions for GPF/CPF is Rs. <input type="text" name="gpf_cpf_nps_rs" class="lpcx"> p.m.
                <br><br>&emsp;(c) His contribution towords K.V.S. Employees Welfare Scheme recovered at the rate of Rs. <input type="text" name="welfare_rs" class="lpcx"> p.m. is for the month up to <input type="text" name="month_upto" class="lpcx"> as per entries made in Service Book.</li>
                    
                </ul> 
                </p>
                <p style="text-align: justify;">
                    <b>4.</b> He made over charge as <input type="text" name="made_over" class="lpcx"> on <em><input type="text" name="noon_type" class="lpcxx" value="<?php if($E->transfer_period){echo $E->transfer_period;}else{echo '&#9;&#9;&#9;noon ';} ?>"></em> of <input type="text" name="made_over_date" class="lpcx">
                </p> 
                <p style="text-align: justify;">
                    <b>5.</b> Recoveries are to be made from the pay of the employee as detailed on the reverse.
                </p> 
                <p style="text-align: justify;">
                    <b>6.</b> He has been paid leave salary as detailed below. Deductions have been made as noted on the reverse.
                <table width="100%">
                    <tr>
                        <th colspan="2" style="width:50%;text-align: center;">Period</th><th style="width:25%;">Rate</th><th style="width:25%;">Amount</th>
                    </tr>
                    <tr>
                        <td>From <input type="text" name="paid_leave_from[]" class="lpcx"></td><td>To <input type="text" name="paid_leave_to[]" class="lpcx"></td><td>at Rs. <input type="text" name="paid_leave_rs[]" class="lpcx"></td><td>a month <input type="text" name="paid_leave_month[]" class="lpcx"></td>
                    </tr>
                    <tr>
                        <td>From <input type="text" name="paid_leave_from[]" class="lpcx"></td><td>To <input type="text" name="paid_leave_to[]" class="lpcx"></td><td>at Rs. <input type="text" name="paid_leave_rs[]" class="lpcx"></td><td>a month <input type="text" name="paid_leave_month[]" class="lpcx"></td>
                    </tr>
                    <tr>
                        <td>From <input type="text" name="paid_leave_from[]" class="lpcx"></td><td>To <input type="text" name="paid_leave_to[]" class="lpcx"></td><td>at Rs. <input type="text" name="paid_leave_rs[]" class="lpcx"></td><td>a month <input type="text" name="paid_leave_month[]" class="lpcx"></td>
                    </tr>
                </table>
                </p> 
                <p style="text-align: justify;">
                    <b>7.</b> He is entitled to draw the following :-<br>
                    <div style="margin-left:15%; font-weight:bold;"><u>Period</u></div>
                    Pay from <input type="text" name="pay_from_date" class="lpcx"> to <input type="text" name="pay_to_date" class="lpcx">
                </p> 
                <p style="text-align: justify;">
                    <b>8.</b> He is entitled to joining time for <input type="text" name="joining_time" class="lpcx"> days/he is not entitled to joining time, vide letter no. <input type="text" name="letter_no" class="lpcx">.
                </p> 
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div  style="float: right; margin-bottom: 30px; margin-top: 14px;"> 
                            <input class="btn btn-primary" type="submit" value="Generate LPC">

                        </div>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>
            </div>
        </div>	
    </div>
</div>
