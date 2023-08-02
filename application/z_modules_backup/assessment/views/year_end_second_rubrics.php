<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Class 2 | YearEnd Assessment abilities</title>
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
	.heading_abl{
		color: #3f51b5!important;
    font-size: 14px!important;
	}
    .splash {
    display: none !important;
}
.card-header { 
    background-color: #313638;
}
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
            <li class="breadcrumb-item active">Class 2 Year End Abilities</li> 
	</ol>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Class 2 Year End Assessment Abilities</h5>  
            Data loading...<img class="rounded" src="<?php echo base_url(); ?>img/loading-bars.svg" width="40" height="40"> Please Wait.
        </div> 
    </div> 
    <!-- ======================= Main Content Start =======================-->
    <div class="card mb-3">
     
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
            
            
		<div class="card mb-3">
            <div class="card-header"><i class="fas fa-eye"></i> Class 2 Year End Assessment</div>
           	<?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?> 
			 
            <div class="card-body">
                <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Oral Language Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Converse and talks about the print available in the classroom.</span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_i" class="form-check-input oral_i" value="1" autocomplete="off" required  <?php echo ($details->oral_i=='1')? 'checked':'';?>>Able to express with unorganised ideas ,often requires support and lacks confidence<br>
							<input type="radio" name="oral_i" class="form-check-input oral_i" value="2" autocomplete="off" required <?php echo ($details->oral_i=='2')? 'checked':'';?>>Converses with
Inappropriate speed and rarely uses body language to express his Ideas
<br>
							<input type="radio" name="oral_i" class="form-check-input oral_i" value="3" autocomplete="off" required <?php echo ($details->oral_i=='3')? 'checked':'';?>>Speaks with clarity about print in two to three short sentences with appropriate expression and body language.<br>
							<input type="radio" name="oral_i" class="form-check-input oral_i" value="4" autocomplete="off" required <?php echo ($details->oral_i=='4')? 'checked':'';?>> Talks or converses covering the main idea of the print/ almost always with appropriate speed using body language<br>                            </div>
                        </div>
						 <?php   echo '<div class="error">'.form_error('oral_i').'</div>'; ?>     
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) Engages in conversation to ask questions and listens to others</span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_ii" class="form-check-input oral_ii" value="1" autocomplete="off" required  <?php echo ($details->oral_ii=='1')? 'checked':'';?>>Engages in conversation and tries to respond with limited words <br>
							<input type="radio" name="oral_ii" class="form-check-input oral_ii" value="2" autocomplete="off" required  <?php echo ($details->oral_ii=='2')? 'checked':'';?>>Initiates conversation/ rarely asks questions/ responds in sentences when guided<br>
							<input type="radio" name="oral_ii" class="form-check-input oral_ii" value="3" autocomplete="off" required  <?php echo ($details->oral_ii=='3')? 'checked':'';?>>Initiates conversation and responds appropriately in sentences with clarity and accuracy in an unknown context.<br>
							<input type="radio" name="oral_ii" class="form-check-input oral_ii" value="4" autocomplete="off" required  <?php echo ($details->oral_ii=='4')? 'checked':'';?>> Easily Converses , asks questions , speaks spontaneously and responds correctly<br>                            </div>
                        </div>
						 <?php   echo '<div class="error">'.form_error('oral_ii').'</div>'; ?>        
<div class="col-sm-12">  
                                <span class="heading_abl">(iii) Recitation of songs/ poems</span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_iii" class="form-check-input oral_iii" value="1" autocomplete="off" required <?php echo ($details->oral_iii=='1')? 'checked':'';?>>Unable to recite unknown age appropriate poems and songs with proper intonation <br>
							<input type="radio" name="oral_iii" class="form-check-input oral_iii" value="2" autocomplete="off" required <?php echo ($details->oral_iii=='2')? 'checked':'';?>>Recites with few errors , lacks gestures and actions .<br>
							<input type="radio" name="oral_iii" class="form-check-input oral_iii" value="3" autocomplete="off" required <?php echo ($details->oral_iii=='3')? 'checked':'';?>>Recites without errors, lacks confidence or feels shy in employing gestures and actions, lacks desired modulation<br>
							<input type="radio" name="oral_iii" class="form-check-input oral_iii" value="4" autocomplete="off" required <?php echo ($details->oral_iii=='4')? 'checked':'';?>>Recites age appropriate unfamiliar poems without error, shows proper gestures and action, with clarity, modulation and intonation.<br>                            </div>
                        </div>
			 <?php   echo '<div class="error">'.form_error('oral_iii').'</div>'; ?>         	
                <div class="col-sm-12">  
                    <span class="heading_abl">(iv) Repeats familiar words occurring in stories/ poems/ print.</span> 
                </div>	
                <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_iv" class="form-check-input oral_iv" value="1" autocomplete="off" required <?php echo ($details->oral_iv=='1')? 'checked':'';?>>Struggles to recognise and repeat the words in print or stories of age appropriate unknown context. <br>
                            <input type="radio" name="oral_iv" class="form-check-input oral_iv" value="2" autocomplete="off" required <?php echo ($details->oral_iii=='2')? 'checked':'';?>>With the support of the teacher recognizes and repeats the words in text (Stories/poems/print)<br>
                            <input type="radio" name="oral_iv" class="form-check-input oral_iv" value="3" autocomplete="off" required <?php echo ($details->oral_iii=='3')? 'checked':'';?>>Reads the unknown words and uses them in short meaningful sentences with few errors<br>
                            <input type="radio" name="oral_iv" class="form-check-input oral_iv" value="4" autocomplete="off" required <?php echo ($details->oral_iii=='4')? 'checked':'';?>>Reads the unknown words and uses them in short meaningful sentences without errors.<br>                            </div>
                        </div>
             <?php   echo '<div class="error">'.form_error('oral_iv').'</div>'; ?>  		
					</div>
					<!-- Reading   -->
					<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>
                                Reading Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Reads and narrates /retells the stories from children's literature/ textbook </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_i" class="form-check-input reading_i" value="1" autocomplete="off" required <?php echo ($details->reading_i=='1')? 'checked':'';?>>Reads the story when guided by the teacher and makes attempts to retell the same in broken sentences <br>
							<input type="radio" name="reading_i" class="form-check-input reading_i" value="2" autocomplete="off" required <?php echo ($details->reading_i=='2')? 'checked':'';?>>Often reads a story independently and retells with limited words and incomplete sentences.<br>
							<input type="radio" name="reading_i" class="form-check-input reading_i" value="3" autocomplete="off" required <?php echo ($details->reading_i=='3')? 'checked':'';?>>Reads the story and retells the same with complete sentences and with few errors. <br>
							<input type="radio" name="reading_i" class="form-check-input reading_i" value="4" autocomplete="off" required <?php echo ($details->reading_i=='4')? 'checked':'';?>> Actively narrates or retells the story/ uses appropriate words from the text for narration/ shows use of proper action or gesture.<br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('reading_i').'</div>'; ?>    
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) Makes new words from the letters of a given word. </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_ii" class="form-check-input reading_ii" value="1" autocomplete="off" required <?php echo ($details->reading_ii=='1')? 'checked':'';?>> Has difficulty in making 4 to 5 letter words from a given word.   <br>
							<input type="radio" name="reading_ii" class="form-check-input reading_ii" value="2" autocomplete="off" required <?php echo ($details->reading_ii=='2')? 'checked':'';?>>Able to write only one or two 4 to 5 letter known words from the given word <br>
							<input type="radio" name="reading_ii" class="form-check-input reading_ii" value="3" autocomplete="off" required <?php echo ($details->reading_ii=='3')? 'checked':'';?>>Able to write independently only one or two 4 to 5 letter known words from the given word with errors <br>
							<input type="radio" name="reading_ii" class="form-check-input reading_ii" value="4" autocomplete="off" required <?php echo ($details->reading_ii=='4')? 'checked':'';?>> Writes maximum possible words independently from the given word / helps others.<br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('reading_ii').'</div>'; ?> 
<div class="col-sm-12">  
                                <span class="heading_abl">(iii) Reads unknown text of 8 to 10 sentences with simple words with appropriate speed approximately 30 to 45 words per minute correctly and clarity</span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="reading_iii" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->reading_iii=='1')? 'checked':'';?>>Attempts to read the text very slowly/ needs support.  <br>
							<input type="radio" name="reading_iii" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->reading_iii=='2')? 'checked':'';?>>Reads slowly but errors in pronunciation/ lacks confidence.<br>
							<input type="radio" name="reading_iii" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->reading_iii=='3')? 'checked':'';?>>Most of the times reads 8-10 sentences with appropriate speed and makes mistakes and sometimes lacks correct pronunciation<br>
							<input type="radio" name="reading_iii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->reading_iii=='4')? 'checked':'';?>>Reads fluently and independently 8 to 10 short sentences with appropriate
speed (at least 30 to 45 words per minutes) and helps peers to read.
<br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('reading_iii').'</div>'; ?>     						
					</div>
					<!-- Writing -->
					
					<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Writing Ability in English</span></div><hr>
                                <span class="heading_abl">(i) Writes short/ simple sentences correctly to express herself. </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_i" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->writing_i=='1')? 'checked':'';?>> Writes short sentences but with frequent spelling mistakes/ writes with non- uniform spacing and strokes. <br>
							<input type="radio" name="writing_i" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->writing_i=='2')? 'checked':'';?>> Writes short meaningful sentences about few known things/objects around them in the class when clues are given.<br>
							<input type="radio" name="writing_i" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->writing_i=='3')? 'checked':'';?>> L3   Writes independently short meaningful sentences about few known things/objects around them in the class with few mistakes
 <br>
							<input type="radio" name="writing_i" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_i=='4')? 'checked':'';?>> Writes independently and correctly few short meaningful sentences about few known things/objects around them in the class .<br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('writing_i').'</div>'; ?>    
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii)Recognises naming words , action words and punctuation marks. </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_ii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->writing_ii=='1')? 'checked':'';?>> Recognises the pictures/ action but is unable to write the suitable word correctly. <br>
							<input type="radio" name="writing_ii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->writing_ii=='2')? 'checked':'';?>>Shows familiarity with naming words, some action words and punctuation marks but commits mistakes frequently/ needs support for recognition.  <br>
							<input type="radio" name="writing_ii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->writing_ii=='3')? 'checked':'';?>>Able to recognise naming words , action words and punctuation marks and uses the same to write meaningful sentences with errors.<br>
							<input type="radio" name="writing_ii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_ii=='4')? 'checked':'';?>> Recognises, writes naming words , action words and punctuation marks with understanding and uses the same to write few meaningful sentences.<br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('writing_ii').'</div>'; ?>    
					</div> 
					<!-- Numeracy -->
					
					<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Numeracy Skills</span></div><hr>
                                <span class="heading_abl">(i) Reads and writes numbers up to 999</span> 
                            </div>
							 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_i" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_i=='1')? 'checked':'';?>> Reads up to 999 correctly   <br>
							<input type="radio" name="numeracy_i" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_i=='2')? 'checked':'';?>> Reads and writes up to 999 with support <br>
							<input type="radio" name="numeracy_i" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_i=='3')? 'checked':'';?>> Reads and writes up to 999 with out error  <br>
							<input type="radio" name="numeracy_i" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_i=='4')? 'checked':'';?>> Reads and writes up to 999 without error and able to help others .<br>                            </div>
                        </div>
						
						<?php   echo '<div class="error">'.form_error('numeracy_i').'</div>'; ?>    
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) Uses addition and subtraction of numbers up to 99, sum not exceeding situations 99 in daily life </span> 
                            </div>
							 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_ii" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_ii=='1')? 'checked':'';?>> Able to use addition and subtraction in daily life (sum not exceeding 99) with the instructions of the teacher only . <br>
							<input type="radio" name="numeracy_ii" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_ii=='2')? 'checked':'';?>> Attempts to use additions and subtraction without the support of teacher but commits mistakes in arriving at the solution<br>
							<input type="radio" name="numeracy_ii" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_ii=='3')? 'checked':'';?>> Uses addition and subtraction subtraction in daily life situations independently with accuracy<br>
							<input type="radio" name="numeracy_ii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_ii=='4')? 'checked':'';?>> Uses addition and subtraction in daily life situations independently with accuracy and helps other too. <br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('numeracy_ii').'</div>'; ?>       
						<div class="col-sm-12">  
                                <span class="heading_abl">(iii) Performs multiplication as repeated addition and division as equal distribution/ sharing and constructs multiplication facts (tables) of 2, 3 and 4 </span> 
                            </div>
							
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_iii" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_iii=='1')? 'checked':'';?>> Unable to Perform Multiplication as repeated addition and division as equal distribution <br>
							<input type="radio" name="numeracy_iii" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_iii=='2')? 'checked':'';?>>Performs multiplication(repeated addition) and division(as equal sharing) with the support of teachers. <br>
							<input type="radio" name="numeracy_iii" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_iii=='3')? 'checked':'';?>>Performs multiplication(repeated addition) and division(as equal sharing) independently but commits mistakes.<br>
							<input type="radio" name="numeracy_iii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_iii=='4')? 'checked':'';?>> Performs multiplication(repeated addition) and division(as equal sharing) independently  correctly and helps others too. <br>                            
                        </div>
                        </div> 
						<?php   echo '<div class="error">'.form_error('numeracy_iii').'</div>'; ?>  
						
						<div class="col-sm-12">  
                                <span class="heading_abl">(iv) Estimates and measure: length distance / capacity using nonstandard uniform units like rod, pencil, thread, cup, spoon, mug etc and compares weight using simple balance</span> 
                            </div>													
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_iv" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_iv=='1')? 'checked':'';?>>Unable to estimate the measure: length distance/capacity using non- standard units and also unable to compare weights using simple balance <br>
							<input type="radio" name="numeracy_iv" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_iv=='2')? 'checked':'';?>>Estimates and measure: length distance/capacity using non-standard units and compares weight with the help of teacher<br>
							<input type="radio" name="numeracy_iv" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_iv=='3')? 'checked':'';?>>Estimates and measures length distance/capacity using non-standard units and compares weight on his own but lacks accuracy<br>
							<input type="radio" name="numeracy_iv" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_iv=='4')? 'checked':'';?>>Estimates and measure: length distance/capacity using non-standard units and compares weight correctly on his own and also helps others<br>  
							</div>
                        </div>
					<?php   echo '<div class="error">'.form_error('numeracy_iv').'</div>'; ?>  
 						
						<div class="col-sm-12">  
                                <span class="heading_abl">(v) Identifies and describes 2D & 3 D shapes  like rectangle, triangle, circle, oval ,cone, cube, cuboid, sphere etc.</span> 
                            </div>													
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_v" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_v=='1')? 'checked':'';?>>Unable to identify and describe about the 2D shapes(rectangle, triangle, circle, oval) & 3D shapes ( cube, cuboid, cone, sphere.  <br>
							<input type="radio" name="numeracy_v" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_v=='2')? 'checked':'';?>>Identifies and describes about few 2 D shapes (rectangle, triangle, circle, oval) & 3D shapes ( cube, cuboid, cone, sphere with the support of the teacher <br>
							<input type="radio" name="numeracy_v" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_v=='3')? 'checked':'';?>>Identifies and describes about 2D shapes (rectangle, triangle, circle, oval) & 3D shapes ( cube, cuboid, cone, sphere  on his own but with few mistakes.<br>
							<input type="radio" name="numeracy_v" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_v=='4')? 'checked':'';?>>Identifies and describes 2D shapes (rectangle, triangle, circle, oval) V& 3D shapes ( cube, cuboid, cone, sphere independently and able to help others.<br>  
							</div>
                        </div>
						<?php   echo '<div class="error">'.form_error('numeracy_v').'</div>'; ?>   
						
						<div class="col-sm-12">  
                                <span class="heading_abl">(vi) Uses spatial vocabulary like far
/near, in/out, above /below, front/ behind, left/right, top / bottom etc.
 </span> 
                            </div>													
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="numeracy_vi" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->numeracy_vi=='1')? 'checked':'';?>>Able to use spatial vocabulary only with the support of the teacher. <br>
							<input type="radio" name="numeracy_vi" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->numeracy_vi=='2')? 'checked':'';?>>Able to use spatial vocabulary independently but commits mistakes. <br>
							<input type="radio" name="numeracy_vi" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->numeracy_vi=='3')? 'checked':'';?>>Uses the spatial vocabulary correctly and independently.<br>
							<input type="radio" name="numeracy_vi" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->numeracy_vi=='4')? 'checked':'';?>>Uses the spatial vocabulary correctly and independently and also helps others. <br>  
							</div> 
                        </div>
						<?php   echo '<div class="error">'.form_error('numeracy_vi').'</div>'; ?>
					</div>
					
					
					<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>मौखिक  भाषा </span></div><hr>
                                <span class="heading_abl">(i) कक्षा में उपलब्ध प्रकाशित सामग्री/ पुस्तक के बारे में चर्चा एवं वार्तालाप करें। </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check"> 	
                            <input type="radio" name="oral_hindi_i" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->oral_hindi_i=='1')? 'checked':'';?>> असंगठित विचारों को अभिव्यक्त करने में सक्षम, अक्सर सहयोग की आवश्यकता है और आत्मविश्वास की कमी है। <br>
							<input type="radio" name="oral_hindi_i" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->oral_hindi_i=='2')? 'checked':'';?>> उचित गति के बिना बात करता है और शायद ही कभी विचारों को अभिव्यक्त करते हुए शरीर की भाषा का उपयोग करता है।<br>
							<input type="radio" name="oral_hindi_i" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->oral_hindi_i=='3')? 'checked':'';?>> मुद्रित सामग्री  के बारे में दो से तीन छोटे-छोटे वाक्यों में उप्युक्त हाव-भाव और शरीर की भाषा के साथ स्पष्टता के साथ बात करता है।<br>
							<input type="radio" name="oral_hindi_i" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_i=='4')? 'checked':'';?>> मुद्रित सामग्री के मुख्य विचार पर आधारित/ लगभग हमेशा उचित गति और शरीर की भाषा के साथ बात करता है।  <br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('oral_hindi_i').'</div>'; ?> 
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) प्रश्न करने और दूसरों को सुनने के लिए वार्तालाप में व्यस्त रहता है। </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_hindi_ii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->oral_hindi_ii=='1')? 'checked':'';?>>बातचीत में व्यस्त रहता है और सीमित शब्दों में प्रतिक्रिया देने का प्रयास करता है।  <br>
							<input type="radio" name="oral_hindi_ii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->oral_hindi_ii=='2')? 'checked':'';?>>बातचीत की शुरुआत करता है/ शायद ही कभी प्रश्न पूछता है/मार्गदर्शन के साथ वाक्यों में प्रतिक्रिया देता है।   <br>
							<input type="radio" name="oral_hindi_ii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->oral_hindi_ii=='3')? 'checked':'';?>>वार्तलाप का प्रारंभ करता है और अज्ञात संदर्भ में स्पष्टता और सटीकता के साथ वाक्यों में उचित प्रतिक्रिया देता है।    <br>
							<input type="radio" name="oral_hindi_ii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_ii=='4')? 'checked':'';?>> सरलता से वार्तालाप करता है, प्रश्न पूछता है, अनायास बोलता और उचित प्रतिक्रिया देता है।<br> 
							</div>
                        </div>
						<?php   echo '<div class="error">'.form_error('oral_hindi_ii').'</div>'; ?> 
							
							<div class="col-sm-12">  
                                <span class="heading_abl">(iii) गीतों/कविताओं का  पाठ   </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="oral_hindi_iii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->oral_hindi_iii=='1')? 'checked':'';?>>आयु के अनुरूप अज्ञात गीतों/ कविताओं को उपयुक्त लय/अनुतान के साथ वाचन में असमर्थ। <br>
							<input type="radio" name="oral_hindi_iii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->oral_hindi_iii=='2')? 'checked':'';?>>कुछ त्रुटियों के साथ वाचन करता है/ हाव-भाव और गतिविधि में कमी। <br>
							<input type="radio" name="oral_hindi_iii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->oral_hindi_iii=='3')? 'checked':'';?>>त्रुटियों के बिना वाचन करता हैआत्मविश्वास की कमी अथवा हाव-भाव एवं प्रस्तुति में संकोच, स्वर में वांछित उतार-चढ़ाव की कमी। <br>
							<input type="radio" name="oral_hindi_iii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->oral_hindi_iii=='4')? 'checked':'';?>>आयु के अनुरूप अपरिचित कविताओं का त्रुटिहीन वाचन करता है, उचित हाव-भाव और मुद्रा का  स्पषटता के साथ प्रदर्शन करता है, स्वर उतार-चढ़ाव और अनुतान ।  <br> 
							</div>
                        </div>
						<?php   echo '<div class="error">'.form_error('oral_hindi_iii').'</div>'; ?> 
					</div> 
						
						<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>पढ़न  भाषा</span></div><hr>
                                <span class="heading_abl">(i) बाल साहित्य/ पाठ्यपुस्तक से कहानियों को पढ़ता है और सुनाता/पुन: सुनाता है।   </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_i" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->read_hindi_i=='1')? 'checked':'';?>>अध्यापक द्वारा मार्गदर्शन के साथ कहानी पढ़ता है और उसी    कहानी  को आधे-अधूरे वाक्यों को फिर  से  सुनाने का प्रयास करता है।   <br>
							<input type="radio" name="read_hindi_i" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->read_hindi_i=='2')? 'checked':'';?>>अधिकांशत: कहानी को स्वतंत्र रूप से पढ़ता है और सीमित शब्दों तथा अधूरे वाक्यों के  साथ फिर से बताता है। <br>
							<input type="radio" name="read_hindi_i" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->read_hindi_i=='3')? 'checked':'';?>>कहानी पढ़ता है और  उसे पूरे वाक्यों के साथ एवं कुछ त्रुटियों के साथ फिर से बताता है।  <br>
							<input type="radio" name="read_hindi_i" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_i=='4')? 'checked':'';?>>सक्रिय रूप से कहानी को सुनाता है अथवा फिर से बताता है/ पाठ्य सामग्री को सुनाने के लिए उप्युक्त शब्दों का प्रयोग करता है/ उचित क्रिया अथवा हाव-भाव का उपयोग करता है। <br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('read_hindi_i').'</div>'; ?>    
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) दिए गए शब्द के वर्णों  से नए शब्द बनाता है। </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_ii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->read_hindi_ii=='1')? 'checked':'';?>>दिए गए शब्द से 4-5 वर्णों के शब्दों को बनाने में कठिनाई होती है।   <br>
							<input type="radio" name="read_hindi_ii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->read_hindi_ii=='2')? 'checked':'';?>>दिए गए शब्द से 4से 5 वर्णों के मात्र एक या दो ज्ञात शब्दों को लिखने में सक्षम है।  <br>
							<input type="radio" name="read_hindi_ii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->read_hindi_ii=='3')? 'checked':'';?>>दिए गए शब्द से 4 से 5 वर्णों के मात्र एक या दो  शब्दों को  गलतियों के साथ स्वतंत्रतापूर्वक लिखने में सक्षम। <br>
							<input type="radio" name="read_hindi_ii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_ii=='4')? 'checked':'';?>>दिए गए शब्द स स्वतंत्र  रूप से अधिकतम संभव शब्द लिखता है/ दूसरों की मदद करता है।   <br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('read_hindi_ii').'</div>'; ?>    
						<div class="col-sm-12">  
                                <span class="heading_abl">(iii) 8 से 10 वाक्यों की सरल शब्दों की अज्ञात पाठ्य सामग्री को लगभग 30 से 45 शब्द प्रति मिनट की उपयुक्त गति से सही ढंग से  और स्पष्टता  के साथ पढ़ता है।</span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="read_hindi_iii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->read_hindi_iii=='1')? 'checked':'';?>>पाठ्य सामग्री को बहुत धीरे-धीरे पढ़ने का प्रयास करता है/ सहायता की आवश्यकता है। <br>
							<input type="radio" name="read_hindi_iii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->read_hindi_iii=='2')? 'checked':'';?>>धीरे-धीरे पढ़ता है किंतु उच्चारण में त्रुटियाँ करता है/ आत्मविश्वास की कमी है। <br>
							<input type="radio" name="read_hindi_iii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->read_hindi_iii=='3')? 'checked':'';?>>अधिकतर 8 से 10 वाक्यों को उपयुक्त गति से पढ़ता है और गलती करता है। कभी-कभी सही उच्चारण की कमी होती है। <br>
							<input type="radio" name="read_hindi_iii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->read_hindi_iii=='4')? 'checked':'';?>>8 से 10 छोटे वाक्यों को उपयुक्त गति(कम से कम 30 से 45 शब्द प्रति मिनट ) से धाराप्रवाह और स्वतंत्र रूप से पढ़ता है और सहपाठियों को पढ़ने में सहायता करता है।   <br>                            </div>
                        </div>
							<?php   echo '<div class="error">'.form_error('read_hindi_iii').'</div>'; ?>     
					</div> 
					
					<div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#3f51b5;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>लेखन भाषा</span></div><hr>
                                <span class="heading_abl">(i) स्वयं को अभिव्यक्त करने के लिए छोटे/ सरल वाक्यों को सही ढंग से लिखता है।   </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_hindi_i" class="form-check-input" value="1" autocomplete="off" required <?php echo ($details->writing_hindi_i=='1')? 'checked':'';?>>बारंबार वर्तनी की गलतियों के साथ  छोटे वाक्य लिखता है/ असमान आकार और अंतर के साथ लिखता है। <br>
							<input type="radio" name="writing_hindi_i" class="form-check-input" value="2" autocomplete="off" required <?php echo ($details->writing_hindi_i=='2')? 'checked':'';?>>कक्षा में आस-पास की कुछ ज्ञात चीज़ों/वस्तुओं के बारे में संकेत मिलने पर छोटे अर्थपूर्ण वाक्य लिखता है। <br>
							<input type="radio" name="writing_hindi_i" class="form-check-input" value="3" autocomplete="off" required <?php echo ($details->writing_hindi_i=='3')? 'checked':'';?>>कक्षा में आस-पास की कुछ ज्ञात चीज़ों/वस्तुओं के बारे में  छोटे अर्थपूर्ण वाक्य कुछ त्रुटियों के साथ स्वतंत्र रूप से  लिखता है। <br>
							<input type="radio" name="writing_hindi_i" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_hindi_i=='4')? 'checked':'';?>>कक्षा में आस-पास की कुछ ज्ञात चीज़ों/वस्तुओं के बारे में छोटे अर्थपूर्ण वाक्य  स्वतंत्र रूप से और सही ढंग से   लिखता है। <br>                            </div>
                        </div>
							<?php   echo '<div class="error">'.form_error('writing_hindi_i').'</div>'; ?>   
					<div class="col-sm-12">  
                                <span class="heading_abl">(ii) संज्ञा शब्दों, क्रिया शब्दों और विराम चिह्नों को पहचानता है। </span> 
                            </div>
						 <div class="col-sm-12">
                            <div class="form-check">
                            <input type="radio" name="writing_hindi_ii" class="form-check-input " value="1" autocomplete="off" required <?php echo ($details->writing_hindi_ii=='1')? 'checked':'';?>>चित्रों/क्रिया को पहचानता है लेकिन उपयुक्त शब्द को सही ढंग से लिखने में असमर्थ है।  <br>
							<input type="radio" name="writing_hindi_ii" class="form-check-input " value="2" autocomplete="off" required <?php echo ($details->writing_hindi_ii=='2')? 'checked':'';?>>संज्ञा शब्दों, कुछ क्रिया शब्दों और विराम चिह्नों से परिचित होना दिखाता है किंतु बार-बार गलतियाँ करता है/ पहचानने के लिए सहायता की आवश्यकता है।  <br>
							<input type="radio" name="writing_hindi_ii" class="form-check-input " value="3" autocomplete="off" required <?php echo ($details->writing_hindi_ii=='3')? 'checked':'';?>>संज्ञा शब्दों ,क्रिया शब्दों और विराम चिह्नों को पहचानने में समर्थ है और त्रुटियों के साथ सार्थक वाक्य लिखने के लिए इनका उपयोग करता है।   <br>
							<input type="radio" name="writing_hindi_ii" class="form-check-input" value="4" autocomplete="off" required <?php echo ($details->writing_hindi_ii=='4')? 'checked':'';?>>संज्ञा शब्दों. क्रिया शब्दों तथा विराम चिह्नों को समझते हुए पहचानता है और कुछ सार्थक वाक्यों को लिखने में उनका प्रयोग करता है।  <br>                            </div>
                        </div>
						<?php   echo '<div class="error">'.form_error('writing_hindi_ii').'</div>'; ?>   
					</div> 
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
                <input type="reset" value="Cancel" class="btn btn-default">
               </div>
			  </form>
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
</body>
</html>
