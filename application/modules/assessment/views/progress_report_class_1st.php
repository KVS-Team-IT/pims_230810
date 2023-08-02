<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | Progress Report of Class 1st</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <style type="text/css">
        .card-body {
            font-family: inherit;
        }.col-form-label {
            font-family: inherit;
        }.space {
    color: snow;
}
    </style>
</head>

<body class=""> 
    <input type="hidden" id="url" value="<?php echo base_url();?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash'=>$this->security->get_csrf_hash()));?>
    <div id="content-wrapper">
        <div class="container-fluid">
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Progress Report of <?php echo $details->stu_name; ?></li>
	</ol>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Entry Level Assessment abilities</h5>
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div>
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3"> 
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding: 0px!important;"> 
                <div class="row">
				<?php //echo "<pre>"; print_r($details); ?> 
					
                    <div class="form-group col-md-4">
                        <label for="" class="col-sm-12 col-form-label">NAME OF STUDENT:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_CODE"><?php echo $details->stu_name; ?></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">GENDER:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_SHIFT"><?php echo $details->gender; ?></div>
                    </div>
					
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">CATEGORY:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->category; ?></div>
                    </div>
					
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">ADMISSION NO:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->adminssion_no; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">PARENT MOBILE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->parent_mobile_no; ?></div>
                    </div> 
               </div>
                </div>
            </div>

             <div class="card-body">
                <div class="table-responsive">
                   <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="2">ENTRY LEVEL OF CLASS 1</th> 
                            <th colspan="2">EXIT LEVEL OF CLASS 1 & ENTRY LEVEL OF CLASS 2</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">                        
                        <tr>
                            <th>EO</th>
                            <td><?php 
                                if($details->oral_language_eng=='Shows hesitation / faces difficulty in responding; needs support'){ echo 'L1'; } 
                                if($details->oral_language_eng=='Able to respond to age appropriate words and ideas'){ echo 'L2'; } 
                                if($details->oral_language_eng=='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.'){ echo 'L3'; } 
                                if($details->oral_language_eng=='Speaks audibly and expresses thoughts, feelings, and ideas clearly.'){ echo 'L4'; } 
                                ?>
                            </td>
                            <th>EO1</th>
                            <td><?php 
                                if($details->oral_converse=='1'){ echo 'L1'; } 
                                if($details->oral_converse=='2'){ echo 'L2'; } 
                                if($details->oral_converse=='3'){ echo 'L3'; } 
                                if($details->oral_converse=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>EO2</th>
                            <td><?php 
                                if($details->oral_talks=='1'){ echo 'L1'; } 
                                if($details->oral_talks=='2'){ echo 'L2'; } 
                                if($details->oral_talks=='3'){ echo 'L3'; } 
                                if($details->oral_talks=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>
                            <th>EO3</th>
                            <td><?php 
                                if($details->oral_recites=='1'){ echo 'L1'; } 
                                if($details->oral_recites=='2'){ echo 'L2'; } 
                                if($details->oral_recites=='3'){ echo 'L3'; } 
                                if($details->oral_recites=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>     
                        </tr>
                         <tr>
                            <th>ER</th>                            
                            <td><?php 
                                if($details->read_language_eng=='Has difficulty in recognizing the letters of the alphabet; needs support'){ echo 'L1'; } 
                                if($details->read_language_eng=='Able to recognize and read all the letters of the alphabet and a few words'){ echo 'L2'; } 
                                if($details->read_language_eng=='Able to recognize and read a few words and their meanings'){ echo 'L3'; } 
                                if($details->read_language_eng=='Able to read simple sentences fluently and comprehend them'){ echo 'L4'; } 
                                ?></td>                            
                            <th>ER1</th>
                            <td><?php 
                                if($details->reading_participate=='1'){ echo 'L1'; } 
                                if($details->reading_participate=='2'){ echo 'L2'; } 
                                if($details->reading_participate=='3'){ echo 'L3'; } 
                                if($details->reading_participate=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                         <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>ER2</th>
                            <td><?php 
                                if($details->reading_uses=='1'){ echo 'L1'; } 
                                if($details->reading_uses=='2'){ echo 'L2'; } 
                                if($details->reading_uses=='3'){ echo 'L3'; } 
                                if($details->reading_uses=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>ER3</th>
                            <td><?php 
                                if($details->reading_sentences=='1'){ echo 'L1'; } 
                                if($details->reading_sentences=='2'){ echo 'L2'; } 
                                if($details->reading_sentences=='3'){ echo 'L3'; } 
                                if($details->reading_sentences=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>    
                        </tr>
                        <tr>
                            <th>EW</th>                            
                            <td><?php 
                                if($details->write_language_eng=='Yet to learn basic strokes of writing; needs support'){ echo 'L1'; } 
                                if($details->write_language_eng=='Able to recognize and write a few letters/symbols and draw sketches of a few objects.'){ echo 'L2'; } 
                                if($details->write_language_eng=='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.'){ echo 'L3'; } 
                                if($details->write_language_eng=='Able to write many words and draw good sketches of many objects.'){ echo 'L4'; } 
                                ?></td>                            
                            <th>EW1</th>
                            <td><?php 
                                if($details->writing_words=='1'){ echo 'L1'; } 
                                if($details->writing_words=='2'){ echo 'L2'; } 
                                if($details->writing_words=='3'){ echo 'L3'; } 
                                if($details->writing_words=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>EW2</th>
                            <td><?php 
                                if($details->writing_convey=='1'){ echo 'L1'; } 
                                if($details->writing_convey=='2'){ echo 'L2'; } 
                                if($details->writing_convey=='3'){ echo 'L3'; } 
                                if($details->writing_convey=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                        <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>    
                        </tr>
                        <tr>
                            <th>HO</th>                            
                            <td><?php 
                                if($details->oral_language_hindi=='कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।'){ echo 'L1'; } 
                                if($details->oral_language_hindi=='आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । '){ echo 'L2'; } 
                                if($details->oral_language_hindi=='उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।'){ echo 'L3'; } 
                                if($details->oral_language_hindi=='उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।'){ echo 'L4'; } 
                                ?></td>                            
                            <th>HO1</th>
                            <td><?php 
                                if($details->oral_hindi_frnd=='1'){ echo 'L1'; } 
                                if($details->oral_hindi_frnd=='2'){ echo 'L2'; } 
                                if($details->oral_hindi_frnd=='3'){ echo 'L3'; } 
                                if($details->oral_hindi_frnd=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>HO2</th>
                            <td><?php 
                                if($details->oral_hindi_convey=='1'){ echo 'L1'; } 
                                if($details->oral_hindi_convey=='2'){ echo 'L2'; } 
                                if($details->oral_hindi_convey=='3'){ echo 'L3'; } 
                                if($details->oral_hindi_convey=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                         <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>HO3</th>
                            <td><?php 
                                if($details->oral_hindi_story=='1'){ echo 'L1'; } 
                                if($details->oral_hindi_story=='2'){ echo 'L2'; } 
                                if($details->oral_hindi_story=='3'){ echo 'L3'; } 
                                if($details->oral_hindi_story=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                        <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>  
                        </tr>
                        <tr>
                            <th>HR</th>                            
                            <td><?php 
                                if($details->read_language_hindi=='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।'){ echo 'L1'; } 
                                if($details->read_language_hindi=='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।'){ echo 'L2'; } 
                                if($details->read_language_hindi=='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।'){ echo 'L3'; } 
                                if($details->read_language_hindi=='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । '){ echo 'L4'; } 
                                ?></td>                            
                            <th>HR1</th>
                            <td><?php 
                                if($details->read_hindi_story=='1'){ echo 'L1'; } 
                                if($details->read_hindi_story=='2'){ echo 'L2'; } 
                                if($details->read_hindi_story=='3'){ echo 'L3'; } 
                                if($details->read_hindi_story=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>HR2</th>
                            <td><?php 
                                if($details->read_hindi_sound=='1'){ echo 'L1'; } 
                                if($details->read_hindi_sound=='2'){ echo 'L2'; } 
                                if($details->read_hindi_sound=='3'){ echo 'L3'; } 
                                if($details->read_hindi_sound=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                         <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>HR3</th>
                            <td><?php 
                                if($details->read_hindi_word=='1'){ echo 'L1'; } 
                                if($details->read_hindi_word=='2'){ echo 'L2'; } 
                                if($details->read_hindi_word=='3'){ echo 'L3'; } 
                                if($details->read_hindi_word=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                        <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>   
                        </tr>
                        <tr>
                            <th>HW</th>                            
                            <td><?php 
                                if($details->write_language_hindi=='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।'){ echo 'L1'; } 
                                if($details->write_language_hindi=='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।'){ echo 'L2'; } 
                                if($details->write_language_hindi=='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।'){ echo 'L3'; } 
                                if($details->write_language_hindi=='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।'){ echo 'L4'; } 
                                ?></td>                            
                            <th>HW1</th>
                            <td><?php 
                                if($details->writing_hindi=='1'){ echo 'L1'; } 
                                if($details->writing_hindi=='2'){ echo 'L2'; } 
                                if($details->writing_hindi=='3'){ echo 'L3'; } 
                                if($details->writing_hindi=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>HW2</th>
                            <td><?php 
                                if($details->writing_hindi_drawing=='1'){ echo 'L1'; } 
                                if($details->writing_hindi_drawing=='2'){ echo 'L2'; } 
                                if($details->writing_hindi_drawing=='3'){ echo 'L3'; } 
                                if($details->writing_hindi_drawing=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 
                        <tr>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>
                            <th><span class="space">---------------------------</span></th>
                            <td><span class="space">---------------------------</span></td>  
                        </tr>
                        <tr>
                            <th>N</th>                            
                            <td><?php 
                                if($details->is_numeracy_skills=='Knows and counts numbers upto 10'){ echo 'L1'; } 
                                if($details->is_numeracy_skills=='Able to write numbers upto 10'){ echo 'L2'; } 
                                if($details->is_numeracy_skills=='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral'){ echo 'L3'; } 
                                if($details->is_numeracy_skills=='Able to perform operations and recognize shapes and patterns'){ echo 'L4'; } 
                                ?></td>                            
                            <th>N1</th>
                            <td><?php 
                                if($details->numeracy_count=='1'){ echo 'L1'; } 
                                if($details->numeracy_count=='2'){ echo 'L2'; } 
                                if($details->numeracy_count=='3'){ echo 'L3'; } 
                                if($details->numeracy_count=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>N2</th>
                            <td><?php 
                                if($details->numeracy_read=='1'){ echo 'L1'; } 
                                if($details->numeracy_read=='2'){ echo 'L2'; } 
                                if($details->numeracy_read=='3'){ echo 'L3'; } 
                                if($details->numeracy_read=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>N3</th>
                            <td><?php 
                                if($details->numeracy_addition=='1'){ echo 'L1'; } 
                                if($details->numeracy_addition=='2'){ echo 'L2'; } 
                                if($details->numeracy_addition=='3'){ echo 'L3'; } 
                                if($details->numeracy_addition=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>N4</th>
                            <td><?php 
                                if($details->numeracy_observes=='1'){ echo 'L1'; } 
                                if($details->numeracy_observes=='2'){ echo 'L2'; } 
                                if($details->numeracy_observes=='3'){ echo 'L3'; } 
                                if($details->numeracy_observes=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>N5</th>
                            <td><?php 
                                if($details->numeracy_units=='1'){ echo 'L1'; } 
                                if($details->numeracy_units=='2'){ echo 'L2'; } 
                                if($details->numeracy_units=='3'){ echo 'L3'; } 
                                if($details->numeracy_units=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr>
                        <tr>
                            <th></th>                            
                            <td></td>                            
                            <th>N6</th>
                            <td><?php 
                                if($details->numeracy_recites=='1'){ echo 'L1'; } 
                                if($details->numeracy_recites=='2'){ echo 'L2'; } 
                                if($details->numeracy_recites=='3'){ echo 'L3'; } 
                                if($details->numeracy_recites=='4'){ echo 'L4'; } 
                                ?></td>
                        </tr> 

                    </tbody>
                    </table>
                    </table>
                </div>
            </div>
        </div> 
    </div> 
</body>
</html>
