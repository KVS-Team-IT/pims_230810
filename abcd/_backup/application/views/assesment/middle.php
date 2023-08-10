<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KVS - PIMS | Entry Level Assessment abilities</title>
    <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
    <!-- <link href="<?php //echo base_url(); ?>vendor/datatable/jquery.dataTables.min.css" rel="stylesheet"/> -->
    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
    <script src="<?php echo base_url(); ?>js/encrypt.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>vendor/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>vendor/select2/js/select2.js"></script>
    <link  href="<?php echo base_url();?>vendor/select2/css/select2.css" rel="stylesheet"/>
    <style>
        @font-face {
		font-family: 'text-security-disc';
		src: url('fonts/text-security-disc.eot');
		src: url('fonts/text-security-disc.eot?#iefix') format('embedded-opentype'),
		url('fonts/text-security-disc.woff') format('woff'),
		url('fonts/text-security-disc.ttf') format('truetype'),
		url('images/text-security-disc.svg#text-security') format('svg');
	}
	input.password {
		font-family: 'text-security-disc';
	}
        .splash {
            position: absolute;
            margin: 0px auto;
            z-index: 2000;
            background: white;
            color: gray;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .splash-title{
            text-align: center;
            vertical-align: middle;
            margin-top: 15%;
        }
    </style>
    <style>
    .buttons-excel{
       background-color: green;
       color: white;
    }
    .table-bordered thead th, .table-bordered thead td {
    border-bottom-width: 1px !important;
    font-size: 11px!important;
    }
    .table thead th {
    vertical-align: bottom!important;
    border-bottom: 1px solid #dee2e6!important;
    background: #014a69!important;
    border-right: 1px solid #c4c0c0!important;
    color: #ffffff!important;
    text-align: center;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 5px 10px!important;
    border-bottom: 1px solid #111!important;
}
table.dataTable thead th, table.dataTable tfoot th {
    font-weight: 400!important;
}
.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
    font-size: 12px!important;
vertical-align: middle;}
.col-form-label{font-family: 'Roboto', sans-serif;}
</style>
</head>

<body class="">
    <!--[if lt IE 7]>
    <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <input type="hidden" id="url" value="<?php echo base_url();?>">
    <input type="hidden" id="get_csrf_token_name" value="<?php echo $this->security->get_csrf_token_name(); ?>">
    <input type="hidden" id="get_csrf_hash" value="<?php echo $this->security->get_csrf_hash(); ?>">
    <?php $this->session->set_userdata(array('csrf_hash'=>$this->security->get_csrf_hash()));?>
    <div id="content-wrapper">
        <div class="container-fluid" style="width:85%!important;">
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Entry Level Assessment abilities</h5>
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div>
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3">
        <div class="card-header text-center" style="margin: 15px 15px 0px 15px!important;padding-bottom: 0px !important;">
            <img class="rounded" src="<?php echo base_url(); ?>img/kvs-logo1bk.png" width="75" height="60">
            <br>
            <label style="margin-bottom: -2px!important; font-size:18px;font-weight:bold;font-family: none;letter-spacing: 5px;margin-left: 5px;color: #9E9E9E;text-shadow: 1px 0px 2px #a56a12;">PIMS</label>
            <hr style="margin-top: 0px!important;">
            <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; letter-spacing: 1px;">Entry Level Assessment abilities</label>
        </div> 
           
            <!-- =================== CONTRACTUAL REPORT START ==========================-->
            <div class="card-body" style="padding: 0px!important;">
                <hr>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="" class="col-sm-12 col-form-label">KV NAME:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_NAME"><?php echo $details->name_of_kv; ?></div>
                    </div>
					 <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">REGION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_REGION"><?php echo $details->region_name; ?></div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">NAME:<span class="reqd"></span></label>
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
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">PARENT EMAIL:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->parent_email_id; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">FATHER'S QUALIFICATION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->father_qualification; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">MOTHER'S QUALIFICATION:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->mother_qualification; ?></div>
                    </div>
					<div class="form-group col-md-2">
                        <label for="" class="col-sm-12 col-form-label">MOTHER TONGUE:<span class="reqd"></span></label>
                        <div class="col-sm-12 KV_STATE"><?php echo $details->mother_tongu; ?></div>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
            <hr style="margin-top:0px!important;"> 
            <div class="card-header text-center" style="margin: 0px 1px !important;padding-bottom: 0px !important;">
                <label style=" margin-top: -2px!important; font-size: 16px; font-weight: bold; margin-top: 10px; letter-spacing: 1px;">
				Entry Level Assessment abilities in respect of the students</label>
            </div>
            <div class="row">
                <div class="from-group col-md-12">
				<?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?>  
				<?php 
			 if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>	
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableIdCon" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SR.No.</th> 
							<th>Assessment Abilities</th> 
							<th>Language Abilities</th> 
                        </tr>
                    </thead>
                    <tbody id="tbody">
						<tr>
							<td>1.</td>
							<td>Oral Language Ability in English</td>
							<td>
							<select name="oral_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Shows hesitation / faces difficulties in responding; needs support" <?php echo ($details->oral_language_eng_mid_term=='Shows hesitation / faces difficulties in responding; needs support')? 'selected':''; echo   set_select('oral_language_eng_mid_term', 'Shows hesitation / faces difficulties in responding; needs support'); ?>>Shows hesitation / faces difficulties in responding; needs support </option>
							<option value="Able to respond to age appropriate words and ideas" <?php echo ($details->oral_language_eng_mid_term=='Able to respond to age appropriate words and ideas')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Able to respond to age appropriate words and ideas'); ?>>Able to respond to age appropriate words and ideas </option>
							<option value="Speaks audibly and but struggles to express thoughts, feelings, and ideas clearly" <?php echo ($details->oral_language_eng_mid_term=='Speaks audibly and but struggles to express thoughts, feelings, and ideas clearly')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Speaks audibly and but struggles to express thoughts, feelings, and ideas clearly'); ?>>Speaks audibly and but struggles to express thoughts, feelings, and ideas clearly. </option>
							<option value="Speaks audibly and expresses thoughts, feelings, and ideas clearly" <?php echo ($details->oral_language_eng_mid_term=='Speaks audibly and expresses thoughts, feelings, and ideas clearly')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Speaks audibly and expresses thoughts, feelings, and ideas clearly'); ?>>Speaks audibly and expresses thoughts, feelings, and ideas clearly. </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('oral_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>
						<tr>
							<td>2.</td>
							<td>Writing Ability in English</td>
							<td>
							<select name="write_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Yet to learn basic strokes of writing; needs support" <?php echo ($details->write_language_eng_mid_term=='Yet to learn basic strokes of writing; needs support')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Yet to learn basic strokes of writing; needs support'); ?>>Yet to learn basic strokes of writing; needs support </option>
							<option value="Able to recognize and write a few letters/symbols and draw sketches of a few objects" <?php echo ($details->write_language_eng_mid_term=='Able to recognize and write a few letters/symbols and draw sketches of a few objects')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Able to recognize and write a few letters/symbols and draw sketches of a few objects'); ?>>Able to recognize and write a few letters/symbols and draw sketches of a few objects </option>
							<option value="Able to write all the letters of the Alphabet/symbols and draw sketches of many objects" <?php echo ($details->write_language_eng_mid_term=='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Able to write all the letters of the Alphabet/symbols and draw sketches of many objects'); ?>>Able to write all the letters of the Alphabet/symbols and draw sketches of many objects</option>
							<option value="Able to write many words and draw good sketches of many objects" <?php echo ($details->write_language_eng_mid_term=='Able to write many words and draw good sketches of many objects')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Able to write many words and draw good sketches of many objects'); ?>>Able to write many words and draw good sketches of many objects </option>
							</select>
					  <?php  echo '<div class="error">'.form_error('write_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
							<tr>
							<td>3.</td>
							<td>Reading Ability in English</td>
							<td>
							<select name="read_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Has difficulty in recognizing the letters of the alphabet; needs support" <?php  echo ($details->read_language_eng_mid_term=='Has difficulty in recognizing the letters of the alphabet; needs support')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Has difficulty in recognizing the letters of the alphabet; needs support'); ?>>Has difficulty in recognizing the letters of the alphabet; needs support</option>
							<option value="Able to recognize and read all the letters of the alphabet and a few words" <?php  echo ($details->read_language_eng_mid_term=='Able to recognize and read all the letters of the alphabet and a few words')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Able to recognize and read all the letters of the alphabet and a few words'); ?>>Able to recognize and read all the letters of the alphabet and a few words </option>
							<option value="Able to recognize and read a few words and their meanings" <?php  echo ($details->read_language_eng_mid_term=='Able to recognize and read a few words and their meanings')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Able to recognize and read a few words and their meanings'); ?>>Able to recognize and read a few words and their meanings</option>
							<option value="Able to read simple sentences fluently and comprehend them" <?php  echo ($details->read_language_eng_mid_term=='Able to read simple sentences fluently and comprehend them')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Able to read simple sentences fluently and comprehend them'); ?>>Able to read simple sentences fluently and comprehend them </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('read_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
						<tr>
							<td>4.</td>
							<td>Numeracy Skills</td>
							<td>
							<select name="is_numeracy_skills_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Knows and counts numbers upto 10" <?php echo ($details->is_numeracy_skills_mid_term=='Knows and counts numbers upto 10')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Knows and counts numbers upto 10'); ?>>Knows and counts numbers upto 10</option>
							<option value="Able to write numbers upto 10" <?php echo ($details->is_numeracy_skills_mid_term=='Able to write numbers upto 10')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to write numbers upto 10'); ?>>Able to write numbers upto 10 </option>
							<option value="Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral" <?php echo ($details->is_numeracy_skills_mid_term=='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral'); ?>>Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral</option>
							<option value="Able to perform operations and recognize shapes and patterns" <?php echo ($details->is_numeracy_skills_mid_term=='Able to perform operations and recognize shapes and patterns')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to perform operations and recognize shapes and patterns'); ?>>Able to perform operations and recognize shapes and patterns </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('is_numeracy_skills_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
						<tr>
							<td>5.</td>
							<td>मौखिक भाषा क्षमता ( हिंदी) </td>
							<td>
							<select name="oral_language_hindi_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।"  <?php echo ($details->oral_language_hindi_mid_term=='कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।'); ?>>कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।</option>
							<option value="आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । " <?php echo ($details->oral_language_hindi_mid_term=='आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । '); ?>>आयु उपयुक्त  शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है । </option>
							<option value="उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।" <?php echo ($details->oral_language_hindi_mid_term=='उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।'); ?>>उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।</option>
							<option value="उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।" <?php echo ($details->oral_language_hindi_mid_term=='उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।'); ?>>उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है । </option>
							</select>
					 <?php  echo '<div class="error">'.form_error('oral_language_hindi_mid_term').'</div>'; ?> 
							</td> 
						</tr>	
						<tr>
							<td>6.</td>
							<td>लेखन क्षमता (हिंदी) </td>
							<td>
							<select name="write_language_hindi_mid_term" class="form-control">     
							<option value="">Choose</option>
							<option value="लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।" <?php echo ($details->write_language_hindi_mid_term=='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।'); ?>>लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।</option>
							<option value="कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।" <?php echo ($details->write_language_hindi_mid_term=='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।'); ?>>कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है । </option>
							<option value="वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।" <?php echo ($details->write_language_hindi_mid_term=='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।'); ?>>वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।</option>
							<option value="अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।" <?php echo ($details->write_language_hindi_mid_term=='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।'); ?>>अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है । </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('write_language_hindi_mid_term').'</div>'; ?> 
							</td> 
						</tr>	
						<tr>
							<td>7.</td>
							<td>पठन क्षमता (हिंदी)  </td>
							<td>
							<select name="read_language_hindi_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।" <?php echo ($details->read_language_hindi_mid_term=='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।'); ?>>वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।</option>
							<option value="वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।" <?php echo ($details->read_language_hindi_mid_term=='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।'); ?>>वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है । </option>
							<option value="कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।" <?php  echo ($details->read_language_hindi_mid_term=='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।'); ?>>कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।</option>
							<option value="सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । " <?php echo ($details->read_language_hindi_mid_term=='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । '); ?>>सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है । </option>
							</select>
					 <?php    echo '<div class="error">'.form_error('read_language_hindi_mid_term').'</div>'; ?> 
							</td> 
						</tr>	
                    </tbody>
                    </table>
					
                </div>
				   <div class="row"> 
                    <div class="col-md-12 text-right">
                        <?php echo form_submit('', 'Submit', 'class="btn btn-primary"'); ?>
                        <input type="button" onclick="location.href = '<?php echo base_url('assessment'); ?>';" value="Back" class="btn btn-default">
                    </div>
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
            </div>
        </div> 
    </div>
    </div>
<!-- ======================================== JS START ================================== -->
<script>
    var base_url = $('#url').val();
    var get_csrf_token_name = $('#get_csrf_token_name').val();
    var get_csrf_hash = $('#get_csrf_hash').val();
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
	});
            }, 4000);
        $(window).bind("load", function () {
            // Remove splash screen after load
            $('.splash').css('display', 'none');
        });
</script>
<script>
     
    function LockedST(RO_ID){
        if(RO_ID){
            $("#state_id").prop("disabled", true);
        }else{
            $("#state_id").prop("disabled", false);
        }
        $('#KvList').find('option').not(':first').remove();
        FilteredKV();
    }
	function GETSTU(KV_ID){
        $('#KvStu').find('option').not(':first').remove();
        FilteredKVSTU();
    }
	
    function FilteredKV(){
        var RO = $("#region_id").val(); 
        if(!RO && !ST){
            alert("Please Select State or Region First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'assesment_filtered-kv',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO,
                type: 'POST',
                success: function (jsonData) {
                    //console.log(jsonData);
                    if(jsonData){
                        $('#KvList').select2();
                        var options = $('#KvList');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.NME).text(this.NME));
                        });
                      //  $('.kv-list').css("display", "block");
                    }else{
                       // $('.kv-list').css("display", "none");
                    }
                }
            });
        }
    }
    
	function FilteredKVSTU(){
        var KvStu = $("#KvStu").val(); 
		var RO = $("#region_id").val(); 
        if(!RO){
            alert("Please Select Student First");
            return false;
        }else{
            $.ajax({
                url: base_url + 'filtered-kvstu',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&KV_ID=' + KvStu,
                type: 'POST',
                success: function (jsonData) { 
                    if(jsonData){
                        $('#KvStu').select2();
                        var options = $('#KvStu');
                        $.each(JSON.parse(jsonData), function() {
                            options.append($("<option />").val(this.NME).text(this.NME));
                        });
                       // $('.kv-student').css("display", "block");
                    }else{
                        //$('.kv-student').css("display", "none");
                    }
                }
            });
        }
    }
    
    
    function ProfileKV(){
        var RO = $("#region_id").val();
        //var KV = $("#KvList").val(); 
        if(!RO && !ST){
            alert("Please Select Region First");
            return false;
        }else if($('#KvList').val() == ''){
            alert('Select Vidyalaya');
            return false;
        }else{
            //console.log('Coming');
            //console.log(KV);
            $.ajax({
                url: base_url + 'kv-profile-details',
                data: get_csrf_token_name + '=' + get_csrf_hash + '&RO_ID=' + RO + '&ST_ID=' + ST+ '&KV_ID=' + KV,
                type: 'POST',
                success: function (jsonData) {
                    if(jsonData.length>0){
                        JData = JSON.parse(jsonData);
                        K = JData.KV;
                        C = JData.CLS;
                        $('.KV_NAME').html(K.NME);
                        $('.KV_CODE').html(K.KOD);
                        $('.KV_SHIFT').html(K.SFT);
                        $('.KV_REGION').html(K.REG);
                        $('.KV_STATE').html(K.STA);
                       
                        $('#tbody').html("");
                        if(C.length>0){
                        $.each(C, function (index, item) {
                            var eachrow = "<tr>"
                                        + "<td class='cls'>" + item['CLS'] + "</td>"
                                        + "<td class='text-center'>" + item['SEC'] + "</td>"
                                        + "<td class='text-center'>" + item['AVL'] + "</td>"
                                        + "<td class='text-center'>" + item['PRE'] + "</td>"
                                        + "<td class='text-center'>" + item['LEN'] +'  <b>X</b>  '+item['WTH']+"</td>"
                                        + "<td class='text-center'>" + item['UPD'] + "</td>"
                                        + "</tr>";
                            $('#tbody').append(eachrow);
                        });
                        }else{
                            var norow = "<tr><td colspan='6' class='text-center text-danger'>Sorry! No Data Available</td></tr>";
                            $('#tbody').append(norow);
                        }
                   $('.card-body').css("display", "block"); 
                   }else{
                   $('.card-body').css("display", "none"); 
                   }
                }
            });
        }
    }
</script>
</body>
</html>
