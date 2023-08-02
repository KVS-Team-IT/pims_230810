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
		color: #f36d1b!important;
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
            <li class="breadcrumb-item active">Entry Level Abilities</li> 
	</ol>
    <!-- ======================= Loader / Splash Div =======================-->
    <div class="splash">
        <div class="splash-title">
            <h5>Year End Assessment Abilities</h5>  
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
            
            
		<div class="card mb-3">
            <div class="card-header"><i class="fas fa-eye"></i> Entry Level Assessment</div>
           	<?php echo form_open_multipart("", array("method" => "post", "id" => "formID", "autocomplete" => "off")); ?> 
			 <div class="card-body">
                <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Oral Language Ability in English</span></div><hr>
                                <span class="heading_abl"><b>(i) Converse with friends and class teacher about her needs, surroundings</b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span style="display:<?php echo ($details->oral_converse=='1')? 'block':'none';?>">Hesitates to initiate speech/ struggles to ask questions/ speech is halting/ and seldom respondsappropriately</span> 
                            <span style="display:<?php echo ($details->oral_converse=='2')? 'block':'none';?>">Sometimes initiates speech/ rarely asks questions/ speaks hesitantly/ and sometimes respondsappropriately</span> 
                            <span  style="display:<?php echo ($details->oral_converse=='3')? 'block':'none';?>">Initiates speech/ asks questions/ speaks evenly/ and frequently responds appropriately</span> 
                            <span  style="display:<?php echo ($details->oral_converse=='4')? 'block':'none';?>"> Eagerly initiates speech/ easily asks questions/ speaks spontaneously/ and always responds appropriately</span> 
                              </div>
                        </div>
                         <?php   echo '<div class="error">'.form_error('oral_converse').'</div>'; ?>     
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) Talks about the print available in the classroom</b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->oral_talks=='1')? 'block':'none';?>">Ideas unorganised/ speech is halting/ and doesn't use body language at all; often requires prompt / support  </span>
                            <span  style="display:<?php echo ($details->oral_talks=='2')? 'block':'none';?>">Mixed main ideas with sub-ideas/ inappropriate speed/ and rarely uses body language to emphasize ideas</span>
                            <span  style="display:<?php echo ($details->oral_talks=='3')? 'block':'none';?>">Organizes speaking by using main ideas but left I or 2/ mostly with appropriate speed/ frequently uses body language to emphasize ideas</span>
                            <span  style="display:<?php echo ($details->oral_talks=='4')? 'block':'none';?>"> Organizes speaking by using main ideas from the print/ always with appropriate speed/ and always uses body language to emphasize ideas</span>                            </div>
                        </div>
                         <?php   echo '<div class="error">'.form_error('oral_talks').'</div>'; ?>        
                         <div class="col-sm-12">  
                          <span class="heading_abl"><b>(iii) Recites rhymes/songs/poems with action</b></span> 
                          </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display:<?php echo ($details->oral_recites=='1')? 'block':'none';?>">Tries to recite the poem or rhyme but requires support / shows nervousness/ inaudible   </span>
                            <span  style="display:<?php echo ($details->oral_recites=='2')? 'block':'none';?>">Recites with few errors & doesn't recover/ gestures & action lacking/ speaks clearly but indistinct at times  </span>
                             <span  style="display:<?php echo ($details->oral_recites=='3')? 'block':'none';?>">Recites without errors/ frequently employs geltures and action/ speaks clearly with some lapses  </span>
                             <span  style="display:<?php echo ($details->oral_recites=='4')? 'block':'none';?>">Recites without error/ always employs gestures and action/ speaks clearly with appropriate modulation  </span>                            </div>
                        </div>
                     <?php   echo '<div class="error">'.form_error('oral_recites').'</div>'; ?>                                 
                    </div>
                    <!-- Reading   -->
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Reading Ability in English</span></div><hr>
                                <span class="heading_abl"><b>(i) Participate in read aloud/story telling session and demonstrate comprehension through activities </b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->reading_participate=='1')? 'block':'none';?>">Hesitant to read without prompt or support / difficulty in answering comprehension questions/ and not confident to act out the story </span>
                             <span  style="display:<?php echo ($details->reading_participate=='2')? 'block':'none';?>">Often participates / answers questions / and at times hesitant to act out the story</span>
                             <span  style="display: <?php echo ($details->reading_participate=='3')? 'block':'none';?>">Mostly participates/ answers questions/ and acts out the story </span>
                             <span  style="display:<?php echo ($details->reading_participate=='4')? 'block':'none';?>"> Actively participates/ answers all questions/ and act out the story effectively; also supports others                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('reading_participate').'</div>'; ?>    
                    <div class="col-sm-12">  
                    <span class="heading_abl"><b>(ii) Uses sound symbol correspondence to read words</b> </span> 
                     </div>
                    <div class="col-sm-12">
                     <div class="form-check">
                      <span  style="display:<?php echo ($details->reading_uses=='1')? 'block':'none';?>"> Tries to name letters and its sounds correctly/ struggling to sound the words by phoneme blending/addition and substitution methods; often requires support of the teacher </span>
                     <span  style="display:<?php echo ($details->reading_uses=='2')? 'block':'none';?>">Names some letters and its sounds correctly/ sounding the words by phoneme blending/ addition andsubstitution methods with some mistakes </span>
                     <span  style="display:<?php echo ($details->reading_uses=='3')? 'block':'none';?>">Names many letters and its sounds correctly/ sounding the words by phoneme blending/ addition and substitution methods without mistakes </span>
                     <span  style="display:<?php echo ($details->reading_uses=='4')? 'block':'none';?>"> Names all the letters and its sounds correctly/ sounding the words by phoneme blending, addition and substitution methods without any mistak</span>                            </div>
                        </div>
                    <?php   echo '<div class="error">'.form_error('reading_uses').'</div>'; ?> 
                     <div class="col-sm-12">  
                      <span class="heading_abl"><b>(iii) Reads small sentences consisting of at least 4-5 simple words in an ageappropriate unknown text.</b></span> 
                        </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                          <span  style="display: <?php echo ($details->reading_sentences=='1')? 'block':'none';?>">Tries to articulate words clearly/ reads word by word and must be assisted with many words/ provides an unrelated response </span>
                             <span  style="display:<?php echo ($details->reading_sentences=='2')? 'block':'none';?>">Articulates some words clearly/ reads word by word with no logical grouping/ provides a somewhatmeaningful inference</span>
                             <span  style="display:<?php echo ($details->reading_sentences=='3')? 'block':'none';?>">Articulates many words clearly/ usually groups words in a logical manner/ makes a meaningful inference</span>
                             <span  style="display:<?php echo ($details->reading_sentences=='4')? 'block':'none';?>">Articulates all the words clearly/ groups words logically when reading aloud/ makes a meaningful inference; helps others to read</span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('reading_sentences').'</div>'; ?>                             
                    </div>
                    <!-- Writing -->
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                     <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Writing Ability in English</span></div><hr>
                      <span class="heading_abl"><b>(i) Basic writing abilities </b></span> 
                        </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display:<?php echo ($details->writing_words=='1')? 'block':'none';?>"> Writes words but with frequent spellings' mistakes/ obscure handwriting with non-uniform strokes and spacing </span>
                            <span  style="display:<?php echo ($details->writing_words=='2')? 'block':'none';?>"> Writes words with some spellings' mistakes/ decipherable handwriting/uses few punctuations</span>
                            <span  style="display:<?php echo ($details->writing_words=='3')? 'block':'none';?>"> Writes words correctly/ legible handwriting/uses some punctuations </span>
                            <span  style="display:<?php echo ($details->writing_words=='4')? 'block':'none';?>"> Writes words with correct spelling/ distinct handwriting/ proper punctuation</span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_words').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) Convey meanings and represent names through drawing, writing, and making things   </b>            </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                             <span  style="display:<?php echo ($details->writing_convey=='1')? 'block':'none';?>"> Has difficulty in conveying any meaning through drawings in greeting card/ draws objects or people/ and makes shapes of letters using dough/clay with some resemblance; often requires assistance </span>
                             <span  style="display:<?php echo ($details->writing_convey=='2')? 'block':'none';?>">Conveys meaning to some extent through drawings in greeting card/ draws few recognizable objects opeople/ and makes shapes of few letters using dough or clay; occasionally requires assistance  </span>
                             <span  style="display:<?php echo ($details->writing_convey=='3')? 'block':'none';?>">Conveys meaning reasonably through drawings in greeting card/ draws some recognizable objects or people/ and makes shapes of many letters using dough or clay </span>
                             <span  style="display:<?php echo ($details->writing_convey=='4')? 'block':'none';?>"> Conveys meaning clearly through drawings in greeting card, draws many recognizable objects or people/ and makes shapes of all the letters using dough or clay; helps others too</span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_convey').'</div>'; ?>    
                    </div> 
                    <!-- Numeracy -->
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                              <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>Numeracy Skills</span></div><hr>
                                <span class="heading_abl"><b>(i) Counts objects up to 20 </b></span> 
                            </div>
                             <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display: <?php echo ($details->numeracy_count=='1')? 'block':'none';?>"> Counts up to 20  </span>
                             <span  style="display: <?php echo ($details->numeracy_count=='2')? 'block':'none';?>"> Demonstrates the concept of numbers upto 20 through repref entations —visual and numera</span>
                             <span  style="display:<?php echo ($details->numeracy_count=='3')? 'block':'none';?>"> Places random set of numbers up to 20 in correct order </span>
                             <span  style="display:<?php echo ($details->numeracy_count=='4')? 'block':'none';?>"> Compares two numbers and identifies the relation as less than, more than and equal to</span>                            </div>
                        </div>
                        
                        <?php   echo '<div class="error">'.form_error('numeracy_count').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) Reads and writes numbers upto 99 </b></span> 
                            </div>
                             <div class="col-sm-12">
                            <div class="form-check">
                          <span  style="display: <?php echo ($details->numeracy_read=='1')? 'block':'none';?>"> Reads upto 99 correctly  </span>
                            <span  style="display: <?php echo ($details->numeracy_read=='2')? 'block':'none';?>"> Writes upto 99 with support </span>
                            <span  style="display:<?php echo ($details->numeracy_read=='3')? 'block':'none';?>"> Reads and writes upto 99 without error </span>
                            <span  style="display:<?php echo ($details->numeracy_read=='4')? 'block':'none';?>"> Reads and writes upto 99 correctly; able to help other  </span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_read').'</div>'; ?>       
                        <div class="col-sm-12">  
                                <span class="heading_abl"><b>(iii) Using addition and subtraction of numbers up to 9 in daily life situations </b></span> 
                            </div>
                            
                         <div class="col-sm-12">
                            <div class="form-check">
                          <span  style="display: <?php echo ($details->numeracy_addition=='1')? 'block':'none';?>"> Tries to do addition and subtraction with the support of teacher </span>
                            <span  style="display:<?php echo ($details->numeracy_addition=='2')? 'block':'none';?>">Attempts to do addition and subtraction without support but errs in arriving at the solution</span>
                            <span  style="display:<?php echo ($details->numeracy_addition=='3')? 'block':'none';?>">Uses addition and subtraction without support and correctly always </span>
                            <span  style="display:<?php echo ($details->numeracy_addition=='4')? 'block':'none';?>"> Uses addition and subtraction without support correctly; able to help other</span>                            </div>
                        </div> 
                        <?php   echo '<div class="error">'.form_error('numeracy_addition').'</div>'; ?>  
                        
                        <div class="col-sm-12">  
                         <span class="heading_abl"><b>(iv) Observes and describes physical properties of 3D shapes (solid shapes)around him/her like round/flat surfaces, number of corners and edges etc</b></span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display: <?php echo ($details->numeracy_observes=='1')? 'block':'none';?>">Tries to describe physical properties of 3D shapes with support </span>
                             <span  style="display:<?php echo ($details->numeracy_observes=='2')? 'block':'none';?>">Describes physical properties of 3D shapes, more or less correctly without support</span>
                             <span  style="display: <?php echo ($details->numeracy_observes=='3')? 'block':'none';?>">Describes physical properties of 3D shapes always correctly</span>
                             <span  style="display:<?php echo ($details->numeracy_observes=='4')? 'block':'none';?>">Describes physical properties of 3D shapes correctly; and also able to explain it to others</span>  
                            </div>
                        </div>
                    <?php   echo '<div class="error">'.form_error('numeracy_observes').'</div>'; ?>     
                        <div class="col-sm-12">  
                          <span class="heading_abl"><b>(v) Estimates and verifies length using non-standard non-uniform units like hand span, footstep, fingers, etc and capacity using nonstandard uniform units like cup, spoon, mug etc.</b></span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->numeracy_units=='1')? 'block':'none';?>">Explores and estimates length with the support of teacher </span>
                             <span  style="display:<?php echo ($details->numeracy_units=='2')? 'block':'none';?>">Explores and estimates length without the support of teacher </span>
                            <span  style="display:<?php echo ($details->numeracy_units=='3')? 'block':'none';?>">Explores and estimates capacity with the support of teacher</span>
                            <span  style="display:<?php echo ($details->numeracy_units=='4')? 'block':'none';?>">Explores and estimates length & capacity without the support of teacher</span>  
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_units').'</div>'; ?>   
                        
                        <div class="col-sm-12">  
                                <span class="heading_abl"><b>(vi) Creates and recites short poems and stories using shapes and numbers </b></span> 
                            </div>                                                  
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->numeracy_recites=='1')? 'block':'none';?>">Recites poems/narrates stories using shapes and numbers with assistance </span>
                             <span  style="display:<?php echo ($details->numeracy_recites=='2')? 'block':'none';?>">Recites poems/narrates stories using shapes and numbers without assistanc. </span>
                              <span  style="display:<?php echo ($details->numeracy_recites=='3')? 'block':'none';?>">Creates poems/narrates stories using shapes and numbers with assistance</span>
                             <span  style="display:<?php echo ($details->numeracy_recites=='4')? 'block':'none';?>">Creates poems/narrates stories using shapes and numbers without assistanc</span>  
                            </div> 
                        </div>
                        <?php   echo '<div class="error">'.form_error('numeracy_recites').'</div>'; ?>
                    </div>
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>मौखिक  भाषा </span></div><hr>
                                <span class="heading_abl"><b>(i) मित्रों और शिक्षको के साथ स्वयं की आवश्यकताओं और परिवेश पर वार्तालाप </b> </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">    
                            <span  style="display:<?php echo ($details->oral_hindi_frnd=='1')? 'block':'none';?>"> बातचीत  शुरू करने में संकोच/ प्रश्न पूछने में दिक्कत / रुक-रुक कर बोलना /   उचित उत्तर बहुत कम </span>
                              <span  style="display:<?php echo ($details->oral_hindi_frnd=='2')? 'block':'none';?>"> कभी कभी बातचीत शुरू करना/ कदाचित प्रश्न  पूछना/ संकोच के साथ बोलना/ और कभी-कभी उचित उत्तर देना</span>
                             <span  style="display:<?php echo ($details->oral_hindi_frnd=='3')? 'block':'none';?>"> बातचीत की पहल करना/ प्रश्न पूछना / नियमित बोलना/ नियमित उचित उत्तर देना</span>
                             <span  style="display:<?php echo ($details->oral_hindi_frnd=='4')? 'block':'none';?>"> उत्सुकता से बातचीत की पहल करना/ आसानी से प्रश्न पूछना/ धाराप्रवाह बोलना/ और हमेशा उचित उत्तर  देना </span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_frnd').'</div>'; ?> 
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) कक्षा में उपलब्ध मुद्रित सामग्री पर चर्चा करना </b> </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display:<?php echo ($details->oral_hindi_convey=='1')? 'block':'none';?>">अनियोजित विचार/ बातचीत में दिक्कत / और किसी भी रूप में शारीरिक भाषा का उपयोग न करना; अक्सर सहयोग की आवश्यकता </span>
                            <span  style="display:<?php echo ($details->oral_hindi_convey=='2')? 'block':'none';?>">मुख्य विचारों को उपविचारों में मिला लेना / अनुपयुक्त गति / और विचारों को प्रकट करने के लिए बहुत  कम शारीरिक भाषा का उपयोग करना    </span>
                            <span  style="display: <?php echo ($details->oral_hindi_convey=='3')? 'block':'none';?>">मुख्य विचारों का उपयोग करते हुए बोलना किन्तु एक या दो विचारों को छोड़ देना / अधिकतर उचित भाषा प्रवाह / प्रायः विचारों की अभिव्यक्ति में शारीरिक भाषा का उपयोग </span>
                            <span  style="display: <?php echo ($details->oral_hindi_convey=='4')? 'block':'none';?>"> मुद्रित सामाग्री में प्रदत्त मुख्य विचारों का उपयोग बोलने में करना/ हमेशा उचित भाषा प्रवाह / और हमेशा विचारों की अभिव्यक्ति में शारीरिक भाषा का उपयोग</span> 
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_convey').'</div>'; ?> 
                            
                            <div class="col-sm-12">  
                                <span class="heading_abl"><b>(iii)तुकबंदियों/ कविताओं/ गीतों का पाठ क्रियाओं या भावों के साथ करना  </b> </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->oral_hindi_story=='1')? 'block':'none';?>">तुकबंदियों अथवा कविता के पाठ का प्रयास किन्तु सहयोग की आवश्यकता/ घबराहट दिखना / बहुत धीमा स्वर / अश्रव्य  </span>
                            <span  style="display:<?php echo ($details->oral_hindi_story=='2')? 'block':'none';?>">तीन से अधिक त्रुटियों के साथ पाठ और सुधार में असमर्थ / भाव-भंगिमा और क्रियाओं का अभाव / शुद्धता से पाठ लेकिन कभी-कभी अस्पष्टता   </span>
                            <span  style="display:<?php echo ($details->oral_hindi_story=='3')? 'block':'none';?>">एक या दो त्रुटियों के साथ  पाठ / प्रायः भाव-भंगिमा और क्रियाओं को सम्मिलित करना / कुछ  भूलों के साथ शुद्ध पाठ   </span>
                            <span  style="display:<?php echo ($details->oral_hindi_story=='4')? 'block':'none';?>">त्रुटिहीन पाठ / हमेशा भाव-भंगिमा और क्रियाओं को सम्मिलित करना / उचित उतार-चढ़ाव के साथ शुद्ध पाठ </span> 
                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('oral_hindi_story').'</div>'; ?> 
                    </div> 
                        
                        <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>पढ़न  भाषा</span></div><hr>
                                <span class="heading_abl"><b>(i) सस्वर पाठ/ कहानी कथन सत्र में प्रतिभागिता और क्रियाकलापों के माध्यम से समझ का प्रदर्शन  </b> </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display:<?php echo ($details->read_hindi_story=='1')? 'block':'none';?>">बिना सहयोग के पढ़ने में हिचकिचाहट / समझ आधारित प्रश्नों के उत्तर देने में कठिनता / और कहानी के क्रिया रूपांतरण में कठिनता   </span>
                            <span  style="display:<?php echo ($details->read_hindi_story=='2')? 'block':'none';?>">प्रायः प्रतिभागिता / प्रश्नों के उत्तर देना / और कभी-कभी कहानी के क्रिया रूपांतरण में हिचकिचाहट </span>
                             <span  style="display:<?php echo ($details->read_hindi_story=='3')? 'block':'none';?>">अधिकतम प्रतिभागिता/ प्रश्नों के उत्तर देना / और कहानी का क्रिया रूपांतरण करना </span>
                            <span  style="display:<?php echo ($details->read_hindi_story=='4')? 'block':'none';?>">सक्रिय प्रतिभागिता / सभी प्रश्नो के उत्तर देना / और प्रभावशाली रूप से कहानी का क्रिया रूपांतरण; दूसरों को भी सहयोग करना </span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('read_hindi_story').'</div>'; ?>    
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) पढे हुए शब्दों के सापेक्ष ध्वनि-चिन्हों का उपयोग  </b> </span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->read_hindi_sound=='1')? 'block':'none';?>">अक्षरों के नाम और उनकी ध्वनि सही बोलने का प्रयास करना / मिश्रित उच्चारण वाले शब्दों के उच्चारण में कठिनाई / अक्षरों के संयोजन एवं वियोजन में प्रायः शिक्षक के सहयोग की आवश्यकता है  </span>
                             <span  style="display:<?php echo ($details->read_hindi_sound=='2')? 'block':'none';?>">कुछ अक्षरों और उनकी ध्वनि का स्पष्ट उच्चारण करना / मिश्रित उच्चारण वाले शब्दों को बोलना / अक्षरों के संयोजन एवं वियोजन पद्धति का कुछ त्रुटियों के साथ उपयोग   </span>
                             <span  style="display:<?php echo ($details->read_hindi_sound=='3')? 'block':'none';?>">अनेक अक्षरों और उनकी ध्वनि का शुद्ध उच्चारण / मिश्रित उच्चारण वाले शब्दों को बोलना / अक्षरों के संयोजन एवं वियोजन पद्धति का कुछ त्रुटियों के साथ उपयोग </span>
                             <span  style="display:<?php echo ($details->read_hindi_sound=='4')? 'block':'none';?>">सभी अक्षरों और उनकी ध्वनि का शुद्ध उच्चारण/ मिश्रित उच्चारण वाले शब्दों को बोलना/ बिना त्रुटियों के अक्षरों के संयोजन एवं वियोजन पद्धति का उपयोग</span>                            </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('read_hindi_sound').'</div>'; ?>    
                        <div class="col-sm-12">  
                                <span class="heading_abl"><b>(iii) उम्र के अनुरूप चार पाँच सरल  शब्दों वाले लघु वाक्यों के अपठित गदयांश पढ़ना</b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->read_hindi_word=='1')? 'block':'none';?>">शब्दों को जोड़कर स्पष्ट उच्चारण के लिए प्रयास करना / एक एक कर शब्दों को पढ़ना और अनेक शब्दों से सहायता प्राप्त करना / असंबद्ध प्रतिक्रिया प्रदान कराना </span>
                            <span  style="display:<?php echo ($details->read_hindi_word=='2')? 'block':'none';?>">कुछ शब्दों को जोड़कर शुद्ध उच्चारण करना/ अतार्किक समूहीकरण के साथ एक-एक करके शब्दों को पढ़ना / कुछ-कुछ अर्थपूर्ण निष्कर्षों को उपलब्ध कराना   </span>
                            <span  style="display:<?php echo ($details->read_hindi_word=='3')? 'block':'none';?>">अनेक शब्दों का शुद्ध उच्चारण/ प्रायः तार्किक रूप से शब्दों को समूह में जोड़ना / अर्थपूर्ण निष्कर्ष निकलना </span>
                            <span  style="display:<?php echo ($details->read_hindi_word=='4')? 'block':'none';?>">सभी शब्दों को जोड़कर शुद्ध उच्चारण/ सस्वर पाठ के समय तर्कपूर्ण शब्दों का समूहीकारण / अर्थपूर्ण निष्कर्ष निकलना; दूसरों को पढ़ने में सहायता करना </span>                            </div>
                        </div>
                            <?php   echo '<div class="error">'.form_error('read_hindi_word').'</div>'; ?>     
                    </div> 
                    
                    <div class="row background_div">
                    <div class="col-sm-12" style="margin-top: 12px;"> 
                                <div style="background-color:#f36d1b;width:100%;color:#ffffff!important;text-align: left;padding: 5px;font-size: 16px;border-top-right-radius: 5px;border-top-left-radius: 5px;"><span>लेखन भाषा</span></div><hr>
                                <span class="heading_abl"><b>(i) मूलभूत लेखन योग्यताएँ </b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                            <span  style="display:<?php echo ($details->writing_hindi=='1')? 'block':'none';?>">शब्द लिखना किन्तु बार-बार वर्तनी की त्रुटियाँ होना / शब्दों के मध्य असंगत रिक्त स्थानों के साथ अस्पष्ट लेखन   </span>
                             <span  style="display:<?php echo ($details->writing_hindi=='2')? 'block':'none';?>">वर्तनी की कुछ अशुद्धियों के साथ शब्दों को लिखना / समझने योग्य हस्त लेखन/ कुछ एक विरामादि चिन्हों का उपयोग </span>
                            <span  style="display:<?php echo ($details->writing_hindi=='3')? 'block':'none';?>">शब्दों को शुद्धता से लिखना / पढ़ने योग्य हस्त लेखन / कुछ विरामादि चिन्हों का उपयोग </span>
                           <span  style="display:<?php echo ($details->writing_hindi=='4')? 'block':'none';?>">शुद्ध वर्तनी के साथ शब्दों को लिखना / सुस्पष्ट हस्त लेखन / उचित विरामादि चिन्हों का उपयोग</span>                            </div>
                        </div>
                            <?php   echo '<div class="error">'.form_error('writing_hindi').'</div>'; ?>   
                    <div class="col-sm-12">  
                                <span class="heading_abl"><b>(ii) कला, लेखन और वस्तुओं के निर्माण के माध्यम से अर्थ एवं नामों का सम्प्रेषण  </b></span> 
                            </div>
                         <div class="col-sm-12">
                            <div class="form-check">
                           <span  style="display:<?php echo ($details->writing_hindi_drawing=='1')? 'block':'none';?>">ग्रीटिंग कार्ड में कला के माध्यम से किसी भी अर्थ के सम्प्रेषण में कठिनाई / किसी भी वस्तु या व्यक्ति का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अक्षरों की आकृति का निर्माण; प्रायः सहायता की आवश्यकता </span>
                             <span  style="display:<?php echo ($details->writing_hindi_drawing=='2')? 'block':'none';?>">कुछ हद तक ग्रीटिंग कार्ड में कला के माध्यम से किसी अर्थ का सम्प्रेषण/ कुछ पहचानने योग्य वस्तुओं  या व्यक्तियों का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अक्षरों की आकृति का निर्माण; कभी-कभी   सहायता की आवश्यकता </span>
                            <span  style="display:<?php echo ($details->writing_hindi_drawing=='3')? 'block':'none';?>">ग्रीटिंग कार्ड में कला के माध्यम से तर्कपूर्ण अर्थ का सम्प्रेषण/ कुछ पहचानने योग्य व्यक्तियों या वस्तुओं का रेखांकन / मिट्टी, क्ले आदि के उपयोग से अनेक अक्षरों की आकृतियों का निर्माण  </span>
                            <span  style="display:<?php echo ($details->writing_hindi_drawing=='4')? 'block':'none';?>">ग्रीटिंग कार्ड में कला के माध्यम से अर्थ का स्पष्ट सम्प्रेषण / अनेक पहचानने योग्य व्यक्तियों या वस्तुओं का रेखांकन / मिट्टी, क्ले आदि के उपयोग से सभी अक्षरों की आकृतियों का निर्माण; दूसरों की भी सहायता करना </span>                           
                             </div>
                        </div>
                        <?php   echo '<div class="error">'.form_error('writing_hindi_drawing').'</div>'; ?>   
                    </div> 
                </div> 
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
