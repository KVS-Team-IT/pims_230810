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
                <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>initiate-transfer">Transfer</a> / Generate LPC</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-print btn btn-danger print" aria-hidden="true">&nbsp;&nbsp;Print LPC</i> 
            </div>
            <div class="card-body user_view" id="lpc_print" >
            <div style="width: 90%; margin: 0px auto;">
                <h5 style="text-align:center;margin-bottom: 1px!important;">LAST PAY CERTIFICATE</h5>
                <div style="text-align:center; margin-top: 0px!important; padding-top: 0px!important;">(To be used in cases of transfers or leave deputationists)</div>
                <hr>
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>1.</b> Last pay certificate of <?php if(!empty($E['emp_name'])) {echo $E['emp_name'];}else{echo '________________';}?>, <?php if(!empty($E['emp_post'])) {echo $E['emp_post'];}else{echo '________________';}?> <?php if(!empty($E['emp_sub'])) {echo ' ('.$E['emp_sub'].') ';}else{echo '';}?>  of the Kendriya Vidyalaya / <?php if(!empty($E['emp_loc'])) {echo $E['emp_loc'];}else{echo '________________';}?> proceeding on transfer / leave from <?php if(!empty($E['leave_from'])) {echo $E['leave_from'];}else{echo '________________';}?> to <?php if(!empty($E['leave_to'])) {echo $E['leave_to'];}else{echo '________________';}?>
                </p>
                <p style="text-align: justify;margin-bottom: 2px!important;"><b>2.</b> He has been paid upto <?php if(!empty($E['paid_upto'])) {echo $E['paid_upto'];}else{echo '________________';}?> at the following rates:-</p>
               
                <div class="row">
                    <div class="form-group col-md-12">
                        
                        <table width="100%;">
                            <tr><th style="width:50%;"><u>Particular</u></th><th style="width:10%;"></th><th style="width:40%;text-align:left;"><u>Rate</u></th></tr>
                            <tr><td>Substantive Pay </td><td>:</td><td><?php if(!empty($E['sub_pay'])) {echo $E['sub_pay'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Officiating Pay </td><td>:</td><td><?php if(!empty($E['off_pay'])) {echo $E['off_pay'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Teaching Allowance </td><td>:</td><td><?php if(!empty($E['teach_all'])) {echo $E['teach_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Dearness Allowance </td><td>:</td><td><?php if(!empty($E['dear_all'])) {echo $E['dear_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>House Rent Allowance </td><td>:</td><td><?php if(!empty($E['house_all'])) {echo $E['house_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>City (Compensatory) Allowance </td><td>:</td><td><?php if(!empty($E['city_all'])) {echo $E['city_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Transport Allowance </td><td>:</td><td><?php if(!empty($E['trans_all'])) {echo $E['trans_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Hill Compensatory Allowance  </td><td>:</td><td><?php if(!empty($E['hill_all'])) {echo $E['hill_all'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Winter Allowance  </td><td>:</td><td><?php if(!empty($E['winter_all'])) {echo $E['winter_all'];}else{echo '0.00';}?></td></tr>
                            <tr><th><u>Deductions</u></th><th></th><th style="text-align:left;"><u>Rate</u></th></tr>
                            <tr><td>Income Tax </td><td>:</td><td><?php if(!empty($E['income_tax'])) {echo $E['income_tax'];}else{echo '0.00';}?></td></tr>
                            <tr><td>GPF/C.P.F. Subscriptions </td><td>:</td><td><?php if(!empty($E['gpf_cpf_nps_sub'])) {echo $E['gpf_cpf_nps_sub'];}else{echo '0.00';}?></td></tr>
                            <tr><td>GPF/C.P.F. Advance </td><td>:</td><td><?php if(!empty($E['gpf_cpf_nps_adv'])) {echo $E['gpf_cpf_nps_adv'];}else{echo '0.00';}?></td></tr>
                            <tr><td>Group Ins. Scheme </td><td>:</td><td><?php if(!empty($E['group_scheme'])) {echo $E['group_scheme'];}else{echo '0.00';}?></td></tr>
                        </table>
                    </div>
                </div>
               
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>3.</b> (a) His General provident Fund Account No.<?php if(!empty($E['gpf_cpf_nps_ac_1'])) {echo $E['gpf_cpf_nps_ac_1'];}else{echo '______________';}?> is maintained by Accountant General <?php if(!empty($E['ac_gen'])) {echo $E['ac_gen'];}else{echo '________________';}?>
                to whom credits have to be passed on.(for deputationists).
                <br>&emsp;(b) His GPF/CPF Account No.<?php if(!empty($E['gpf_cpf_nps_ac_2'])) {echo $E['gpf_cpf_nps_ac_2'];}else{echo '________________';}?> is maintained by KVS Head Office/Regional Office and his rate of subscriptions for GPF/CPF is Rs. <?php if(!empty($E['gpf_cpf_nps_rs'])) {echo $E['gpf_cpf_nps_rs'];}else{echo '________________';}?> p.m.
                <br>&emsp;(c) His contribution towords K.V.S. Employees Welfare Scheme recovered at the rate of Rs. <?php if(!empty($E['welfare_rs'])) {echo $E['welfare_rs'];}else{echo '________________';}?> p.m. is for the month up to <?php if(!empty($E['month_upto'])) {echo $E['month_upto'];}else{echo '________________';}?> as per entries made in Service Book.</li>
                    
                </ul> 
                </p>
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>4.</b> He made over charge as <?php if(!empty($E['made_over'])) {echo $E['made_over'];}else{echo '________________';}?> on <?php if(!empty($E['noon_type'])) {echo $E['noon_type'];}else{echo '___________noon';}?> of <?php if(!empty($E['made_over_date'])) {echo $E['made_over_date'];}else{echo '________________';}?>
                </p> 
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>5.</b> Recoveries are to be made from the pay of the employee as detailed on the reverse.
                </p> 
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>6.</b> He has been paid leave salary as detailed below. Deductions have been made as noted on the reverse.
                <table width="100%">
                    <tr>
                        <th colspan="2" style="width:50%;text-align: center;"><u>Period</u></th><th style="width:25%;"><u>Rate</u></th><th style="width:25%;"><u>Amount</u></th>
                    </tr>
                    <tr>
                        <td><?php if(!empty($E['paid_leave_from'][0])) {echo 'From '.$E['paid_leave_from'][0];}else{echo 'From '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_to'][0])) {echo 'To '.$E['paid_leave_to'][0];}else{echo 'To '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_rs'][0])) {echo 'at Rs. '.$E['paid_leave_rs'][0];}else{echo 'at Rs. '.'0.00';}?></td>
                        <td><?php if(!empty($E['paid_leave_month'][0])) {echo 'a month '.$E['paid_leave_month'][0];}else{echo 'a month '.'________';}?></td>
                    </tr>
                    <tr>
                        <td><?php if(!empty($E['paid_leave_from'][0])) {echo 'From '.$E['paid_leave_from'][0];}else{echo 'From '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_to'][0])) {echo 'To '.$E['paid_leave_to'][0];}else{echo 'To '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_rs'][0])) {echo 'at Rs. '.$E['paid_leave_rs'][0];}else{echo 'at Rs. '.'0.00';}?></td>
                        <td><?php if(!empty($E['paid_leave_month'][0])) {echo 'a month '.$E['paid_leave_month'][0];}else{echo 'a month '.'________';}?></td>
                    </tr>
                    <tr>
                        <td><?php if(!empty($E['paid_leave_from'][0])) {echo 'From '.$E['paid_leave_from'][0];}else{echo 'From '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_to'][0])) {echo 'To '.$E['paid_leave_to'][0];}else{echo 'To '.'__________';}?></td>
                        <td><?php if(!empty($E['paid_leave_rs'][0])) {echo 'at Rs. '.$E['paid_leave_rs'][0];}else{echo 'at Rs. '.'0.00';}?></td>
                        <td><?php if(!empty($E['paid_leave_month'][0])) {echo 'a month '.$E['paid_leave_month'][0];}else{echo 'a month '.'________';}?></td>
                    </tr>
                </table>
                </p> 
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>7.</b> He is entitled to draw the following :-<br>
                <div style="margin-left:15%; font-weight:bold;"><u>Period</u></div>
                    Pay from <?php if(!empty($E['pay_from_date'])) {echo $E['pay_from_date'];}else{echo '____________________';}?> to <?php if(!empty($E['pay_to_date'])) {echo $E['pay_to_date'];}else{echo '____________________';}?> etc.
                </p> 
                <p style="text-align: justify;margin-bottom: 2px!important;">
                    <b>8.</b> He is entitled to joining time for <?php if(!empty($E['joining_time'])) {echo $E['joining_time'];}else{echo '________________';}?> days/he is not entitled to joining time, vide letter no. <?php if(!empty($E['letter_no'])) {echo $E['letter_no'];}else{echo '________________';}?>.
                </p> 
            <hr>    
            </div>
            </div>
        </div>	
    </div>
</div>
<script>
$('.print').click(function() {
    w=window.open();
    w.document.write($('#lpc_print').html());
    w.print();
    w.close();
});

//--    var options = {
//--    };
//--    var pdf = new jsPDF('p', 'pt', 'a4');
    //pdf.setFontSize(10);
    //pdf.setFontStyle('italic');
    //pdf.text('Transfer Acknowledgement', 250,20);
    //pdf.text("Centered text",{align: "center"},250,15);
//--    pdf.addHTML($("#personal"), 10, 25, options, function() {
//--    pdf.save('Initiate_Transfer_Acknowledgement.pdf');
//--    });

</script>