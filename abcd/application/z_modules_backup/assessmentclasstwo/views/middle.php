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
        <div class="container-fluid">
		<ol class="breadcrumb">
            <li class="breadcrumb-item">
		<a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add MiddleTerm Abilities</li>
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
				Middle Level Assessment abilities in respect of the students</label>
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
							<th>Entry Level Abilities</th> 
							<th>Mid Term Abilities</th> 
                        </tr>
                    </thead>
                    <tbody id="tbody">
						<tr>
							<td>1.</td>
							<th>Oral Language Ability in English</th>
							<td><?php echo $details->oral_language_eng; ?></td>
							<td>
							<select name="oral_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Faces some difficulty in responding and expressing, associates few words with pictures with assistance" <?php echo ($details->oral_language_eng_mid_term=='Faces some difficulty in responding and expressing, associates few words with pictures with assistance')? 'selected':''; echo   set_select('oral_language_eng_mid_term', 'Faces some difficulty in responding and expressing, associates few words with pictures with assistance'); ?>>Faces some difficulty in responding and expressing, associates few words with pictures with assistance </option>
							<option value="Speaks audibly with less fluency, associates few words with pictures with little assistance" <?php echo ($details->oral_language_eng_mid_term=='Speaks audibly with less fluency, associates few words with pictures with little assistance')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Speaks audibly with less fluency, associates few words with pictures with little assistance'); ?>>Speaks audibly with less fluency, associates few words with pictures with little assistance </option>
							<option value="Speaks audible, converses with some fluency, associates words with pictures correctly" <?php echo ($details->oral_language_eng_mid_term=='Speaks audible, converses with some fluency, associates words with pictures correctly')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Speaks audible, converses with some fluency, associates words with pictures correctly'); ?>>Speaks audible, converses with some fluency, associates words with pictures correctly. </option>
							<option value="Speaks audibly, converses fluently,expresses thoughts, feelings independently" <?php echo ($details->oral_language_eng_mid_term=='Speaks audibly, converses fluently,expresses thoughts, feelings independently')? 'selected':''; echo  set_select('oral_language_eng_mid_term', 'Speaks audibly, converses fluently,expresses thoughts, feelings independently'); ?>>Speaks audibly, converses fluently,expresses thoughts, feelings independently. </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('oral_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>
						<tr>
							<td>2.</td>
							<th>Writing Ability in English</th>
							<td><?php echo $details->write_language_eng; ?></td>
							<td>
							<select name="write_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Writes alphabets, able to write words with assistance" <?php echo ($details->write_language_eng_mid_term=='Writes alphabets, able to write words with assistance')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Writes alphabets, able to write words with assistance'); ?>>Writes alphabets, able to write words with assistance </option>
							<option value="Writes words/ 1-2 small sentences legibly but with some spelling mistakes" <?php echo ($details->write_language_eng_mid_term=='Writes words/ 1-2 small sentences legibly but with some spelling mistakes')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Writes words/ 1-2 small sentences legibly but with some spelling mistakes'); ?>>Writes words/ 1-2 small sentences legibly but with some spelling mistakes </option>
							<option value="Writes 2-3 small sentences with only few spelling mistakes" <?php echo ($details->write_language_eng_mid_term=='Writes 2-3 small sentences with only few spelling mistakes')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Writes 2-3 small sentences with only few spelling mistakes'); ?>>Writes 2-3 small sentences with only few spelling mistakes</option>
							<option value="Writes small sentences correctly independently" <?php echo ($details->write_language_eng_mid_term=='Writes small sentences correctly independently')? 'selected':''; echo  set_select('write_language_eng_mid_term', 'Writes small sentences correctly independently'); ?>>Writes small sentences correctly independently </option>
							</select>
					  <?php  echo '<div class="error">'.form_error('write_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
							<tr>
							<td>3.</td>
							<th>Reading Ability in English</th>
							<td><?php echo $details->read_language_eng; ?></td>
							<td>
							<select name="read_language_eng_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Reads and pronounces commonly used words/ 1-2 sentences with assistance" <?php  echo ($details->read_language_eng_mid_term=='Reads and pronounces commonly used words/ 1-2 sentences with assistance')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Reads and pronounces commonly used words/ 1-2 sentences with assistance'); ?>>Reads and pronounces commonly used words/ 1-2 sentences with assistance</option>
							<option value="Reads and pronounces most of the words/ simple sentences with little assistance" <?php  echo ($details->read_language_eng_mid_term=='Reads and pronounces most of the words/ simple sentences with little assistance')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Reads and pronounces most of the words/ simple sentences with little assistance'); ?>>Reads and pronounces most of the words/ simple sentences with little assistance </option>
							<option value="Reads simple sentences with partial comprehension" <?php  echo ($details->read_language_eng_mid_term=='Reads simple sentences with partial comprehension')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Reads simple sentences with partial comprehension'); ?>>Reads simple sentences with partial comprehension</option>
							<option value="Reads small sentences fluently with comprehension" <?php  echo ($details->read_language_eng_mid_term=='Reads small sentences fluently with comprehension')? 'selected':''; echo  set_select('read_language_eng_mid_term', 'Reads small sentences fluently with comprehension'); ?>>Reads small sentences fluently with comprehension </option>
							</select>
					 <?php   echo '<div class="error">'.form_error('read_language_eng_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
						<tr>
							<td>4.</td>
							<th>Numeracy Skills</th>
							<td><?php echo $details->is_numeracy_skills; ?></td>
							<td>
							<select name="is_numeracy_skills_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="Can count /write numbers upto 20" <?php echo ($details->is_numeracy_skills_mid_term=='Can count /write numbers upto 20')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Can count /write numbers upto 20'); ?>>Can count /write numbers upto 20</option>
							<option value="Able to recognize concept of numbers upto 20 and demonstrates through representations- visual & numeral" <?php echo ($details->is_numeracy_skills_mid_term=='Able to recognize concept of numbers upto 20 and demonstrates through representations- visual & numeral')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to recognize concept of numbers upto 20 and demonstrates through representations- visual & numeral'); ?>>Able to recognize concept of numbers upto 20 and demonstrates through representations- visual & numeral </option>
							<option value="Able to perform simple operations ,recognize shapes and patterns correctly most of the times" <?php echo ($details->is_numeracy_skills_mid_term=='Able to perform simple operations ,recognize shapes and patterns correctly most of the times')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to perform simple operations ,recognize shapes and patterns correctly most of the times'); ?>>Able to perform simple operations ,recognize shapes and patterns correctly most of the times</option>
							<option value="Able to perform simple operations, Recognizes shapes and patterns independently" <?php echo ($details->is_numeracy_skills_mid_term=='Able to perform simple operations, Recognizes shapes and patterns independently')? 'selected':''; echo  set_select('is_numeracy_skills_mid_term', 'Able to perform simple operations, Recognizes shapes and patterns independently'); ?>>Able to perform simple operations, Recognizes shapes and patterns independently </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('is_numeracy_skills_mid_term').'</div>';
                        ?> 
							</td> 
						</tr>	
						<tr>
							<td>5.</td>
							<th>मौखिक भाषा क्षमता ( हिंदी) </th>
							<td><?php echo $details->oral_language_hindi; ?></td>
							<td>
							<select name="oral_language_hindi_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="अनुकरण वाचन  में अस्पष्टता/वाचन स्पष्टता में सहयोग की आवश्यकता।"  <?php echo ($details->oral_language_hindi_mid_term=='अनुकरण वाचन  में अस्पष्टता/वाचन स्पष्टता में सहयोग की आवश्यकता।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'अनुकरण वाचन  में अस्पष्टता/वाचन स्पष्टता में सहयोग की आवश्यकता।'); ?>>अनुकरण वाचन  में अस्पष्टता/वाचन स्पष्टता में सहयोग की आवश्यकता।</option>
							<option value="विचारों को क्रम में एवं धाराप्रवाह बोलने में कठिनाई/अभ्यास की आवश्यकता।" <?php echo ($details->oral_language_hindi_mid_term=='विचारों को क्रम में एवं धाराप्रवाह बोलने में कठिनाई/अभ्यास की आवश्यकता।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'विचारों को क्रम में एवं धाराप्रवाह बोलने में कठिनाई/अभ्यास की आवश्यकता।'); ?>>विचारों को क्रम में एवं धाराप्रवाह बोलने में कठिनाई/अभ्यास की आवश्यकता।</option>
							<option value="चित्र एवं परिवेश पर आधारित विचारों को अभिव्यक्त करने का प्रयास करता है।" <?php echo ($details->oral_language_hindi_mid_term=='चित्र एवं परिवेश पर आधारित विचारों को अभिव्यक्त करने का प्रयास करता है।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'चित्र एवं परिवेश पर आधारित विचारों को अभिव्यक्त करने का प्रयास करता है।'); ?>>चित्र एवं परिवेश पर आधारित विचारों को अभिव्यक्त करने का प्रयास करता है।</option>
							<option value="उच्चारण में स्पष्टता, विचारों और भावनाओं को पूर्णता व्यक्त करने में सक्षम।" <?php echo ($details->oral_language_hindi_mid_term=='उच्चारण में स्पष्टता, विचारों और भावनाओं को पूर्णता व्यक्त करने में सक्षम।')? 'selected':''; echo  set_select('oral_language_hindi_mid_term', 'उच्चारण में स्पष्टता, विचारों और भावनाओं को पूर्णता व्यक्त करने में सक्षम।'); ?>>उच्चारण में स्पष्टता, विचारों और भावनाओं को पूर्णता व्यक्त करने में सक्षम। </option>
							</select>
					 <?php  echo '<div class="error">'.form_error('oral_language_hindi_mid_term').'</div>'; ?> 
							</td> 
						</tr>	
						<tr>
							<td>6.</td>
							<th>लेखन क्षमता (हिंदी) </th>
							<td><?php echo $details->write_language_hindi; ?></td>
							<td>
							<select name="write_language_hindi_mid_term" class="form-control">     
							<option value="">Choose</option>
							<option value="वर्णमाला की अच्छी पहचान पर मात्राओं से पूर्णतया परिचित नहीं।" <?php echo ($details->write_language_hindi_mid_term=='वर्णमाला की अच्छी पहचान पर मात्राओं से पूर्णतया परिचित नहीं।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'वर्णमाला की अच्छी पहचान पर मात्राओं से पूर्णतया परिचित नहीं।'); ?>>वर्णमाला की अच्छी पहचान पर मात्राओं से पूर्णतया परिचित नहीं।</option>
							<option value="वाक्य में प्रयुक्त शब्दों में सरल मात्राओं से परिचित।" <?php echo ($details->write_language_hindi_mid_term=='वाक्य में प्रयुक्त शब्दों में सरल मात्राओं से परिचित।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'वाक्य में प्रयुक्त शब्दों में सरल मात्राओं से परिचित।'); ?>>वाक्य में प्रयुक्त शब्दों में सरल मात्राओं से परिचित। </option>
							<option value="पाठ में आने-वाले शब्दों में अधिकांश मात्राओं से परिचित है। अनुस्वारों की पहचान में कुछ समस्या।" <?php echo ($details->write_language_hindi_mid_term=='पाठ में आने-वाले शब्दों में अधिकांश मात्राओं से परिचित है। अनुस्वारों की पहचान में कुछ समस्या।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'पाठ में आने-वाले शब्दों में अधिकांश मात्राओं से परिचित है। अनुस्वारों की पहचान में कुछ समस्या।'); ?>>पाठ में आने-वाले शब्दों में अधिकांश मात्राओं से परिचित है। अनुस्वारों की पहचान में कुछ समस्या।</option>
							<option value="पाठ (कहानी/कविताएं/पर्यावरण/ प्रिंट आदि) आने वाले शब्दों से परिचित व स्वतंत्र रूप से शब्दों और वाक्यों को लिखना। अनुस्वार पहचानने में कुछ समस्या।" <?php echo ($details->write_language_hindi_mid_term=='पाठ (कहानी/कविताएं/पर्यावरण/ प्रिंट आदि) आने वाले शब्दों से परिचित व स्वतंत्र रूप से शब्दों और वाक्यों को लिखना। अनुस्वार पहचानने में कुछ समस्या।')? 'selected':''; echo  set_select('write_language_hindi_mid_term', 'पाठ (कहानी/कविताएं/पर्यावरण/ प्रिंट आदि) आने वाले शब्दों से परिचित व स्वतंत्र रूप से शब्दों और वाक्यों को लिखना। अनुस्वार पहचानने में कुछ समस्या।'); ?>>पाठ (कहानी/कविताएं/पर्यावरण/ प्रिंट आदि) आने वाले शब्दों से परिचित व स्वतंत्र रूप से शब्दों और वाक्यों को लिखना। अनुस्वार पहचानने में कुछ समस्या। </option>
							</select>
					  <?php   echo '<div class="error">'.form_error('write_language_hindi_mid_term').'</div>'; ?> 
							</td> 
						</tr>	
						<tr>
							<td>7.</td>
							<th>पठन क्षमता (हिंदी)  </th>
							<td><?php echo $details->read_language_hindi; ?></td>
							<td>
							<select name="read_language_hindi_mid_term" class="form-control"> 
							<option value="">Choose</option>
							<option value="वर्णमाला की पहचान पर तीन अक्षरों वाले शब्दों को पढ़ने की गति बहुत धीमी। उच्चारण में गलती। सहायता की आवश्यकता।" <?php echo ($details->read_language_hindi_mid_term=='वर्णमाला की पहचान पर तीन अक्षरों वाले शब्दों को पढ़ने की गति बहुत धीमी। उच्चारण में गलती। सहायता की आवश्यकता।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'वर्णमाला की पहचान पर तीन अक्षरों वाले शब्दों को पढ़ने की गति बहुत धीमी। उच्चारण में गलती। सहायता की आवश्यकता।'); ?>>वर्णमाला की पहचान पर तीन अक्षरों वाले शब्दों को पढ़ने की गति बहुत धीमी। उच्चारण में गलती। सहायता की आवश्यकता।</option>
							<option value="कुछ शब्दों का सही उच्चारण कर सकता है, ज्ञात संदर्भ में अक्षरों और कुछ शब्दों को पहचानने में सक्षम।" <?php echo ($details->read_language_hindi_mid_term=='कुछ शब्दों का सही उच्चारण कर सकता है, ज्ञात संदर्भ में अक्षरों और कुछ शब्दों को पहचानने में सक्षम।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'कुछ शब्दों का सही उच्चारण कर सकता है, ज्ञात संदर्भ में अक्षरों और कुछ शब्दों को पहचानने में सक्षम।'); ?>>कुछ शब्दों का सही उच्चारण कर सकता है, ज्ञात संदर्भ में अक्षरों और कुछ शब्दों को पहचानने में सक्षम। </option>
							<option value="आंशिक समझ के साथ सरल वाक्य पढ़ता है। ज्ञात संदर्भ में 4-5 सरल शब्दों के छोटे-छोटे वाक्यों को पढ़ सकता है। " <?php  echo ($details->read_language_hindi_mid_term=='आंशिक समझ के साथ सरल वाक्य पढ़ता है। ज्ञात संदर्भ में 4-5 सरल शब्दों के छोटे-छोटे वाक्यों को पढ़ सकता है।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'आंशिक समझ के साथ सरल वाक्य पढ़ता है। ज्ञात संदर्भ में 4-5 सरल शब्दों के छोटे-छोटे वाक्यों को पढ़ सकता है। '); ?>>आंशिक समझ के साथ सरल वाक्य पढ़ता है। ज्ञात संदर्भ में 4-5 सरल शब्दों के छोटे-छोटे वाक्यों को पढ़ सकता है। </option>
							<option value="स्पष्ट उच्चारण के साथ 4-5 सरल शब्दों वाले उपयुक्त अज्ञात पाठ व छोटे वाक्यों को पढ़ता है। " <?php echo ($details->read_language_hindi_mid_term=='स्पष्ट उच्चारण के साथ 4-5 सरल शब्दों वाले उपयुक्त अज्ञात पाठ व छोटे वाक्यों को पढ़ता है।')? 'selected':''; echo  set_select('read_language_hindi_mid_term', 'स्पष्ट उच्चारण के साथ 4-5 सरल शब्दों वाले उपयुक्त अज्ञात पाठ व छोटे वाक्यों को पढ़ता है।  '); ?>>स्पष्ट उच्चारण के साथ 4-5 सरल शब्दों वाले उपयुक्त अज्ञात पाठ व छोटे वाक्यों को पढ़ता है।  </option>
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
                        <!--input type="button" onclick="location.href = '<?php //echo base_url('assessment/teacher_listing'); ?>';" value="Back" class="btn btn-default"-->
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
