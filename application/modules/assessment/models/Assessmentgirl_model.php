<?php
if (!defined('BASEPATH')) { exit ('No direct script access allowed'); }

class Assessmentgirl_model extends CI_model {
    public function construct() {
        parent::__construct();
		 $this->load->database('second', TRUE);
    }
    
   public function report_is_exists($id) {
        $this->db->where("region_id", $id);
        $query = $this->db->get("ci_students");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
      public function get_firstStep_data_by_id($id,$kv_id) {
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
            }
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC"; //All India
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN gender='Male' THEN 1 ELSE 0 END) 'MALE',
        SUM(CASE WHEN gender='Female' THEN 1 ELSE 0 END) 'FEMALE',
        SUM(CASE WHEN category='General' THEN 1 ELSE 0 END) 'General',
        SUM(CASE WHEN category='OBC' THEN 1 ELSE 0 END) 'OBC',
        SUM(CASE WHEN category='SC' THEN 1 ELSE 0 END) 'SC',
        SUM(CASE WHEN category='ST' THEN 1 ELSE 0 END) 'ST',
        SUM(CASE WHEN admission_priority='Category -1' THEN 1 ELSE 0 END) 'Category_1',
        SUM(CASE WHEN admission_priority='Category -2' THEN 1 ELSE 0 END) 'Category_2',
        SUM(CASE WHEN admission_priority='Category -3' THEN 1 ELSE 0 END) 'Category_3',
        SUM(CASE WHEN admission_priority='Category -4' THEN 1 ELSE 0 END) 'Category_4',
        SUM(CASE WHEN admission_priority='Category -5' THEN 1 ELSE 0 END) 'Category_5',
        SUM(CASE WHEN admission_priority='Category - 6' THEN 1 ELSE 0 END) 'Category_6',
        SUM(CASE WHEN is_rte_quota='YES' THEN 1 ELSE 0 END) 'RTE',
        SUM(CASE WHEN is_dispensation_quota='YES' THEN 1 ELSE 0 END) 'dispensation',
        SUM(CASE WHEN gadget_availability_time='available all the time' THEN 1 ELSE 0 END) 'All_Time',
        SUM(CASE WHEN gadget_availability_time!='available all the time' THEN 1 ELSE 0 END) 'SomeTime',
        SUM(CASE WHEN number_of_sibling='Nil' THEN 1 ELSE 0 END) 'No_siblings',
        SUM(CASE WHEN number_of_sibling!='Nil' THEN 1 ELSE 0 END) 'Siblings_at_home',
        SUM(CASE WHEN `years_of_pre-schooling`='NIL' THEN 1 ELSE 0 END) 'NIL',
        SUM(CASE WHEN `years_of_pre-schooling`='one' THEN 1 ELSE 0 END) 'One',
        SUM(CASE WHEN `years_of_pre-schooling`='two' THEN 1 ELSE 0 END) 'Two',
        SUM(CASE WHEN `years_of_pre-schooling`='three' THEN 1 ELSE 0 END) 'Three',
        COUNT(id) AS Total FROM `ci_students`".$where;  
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
    }

      public function get_page2A_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female'  ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_eng1A',
SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_eng1B',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_eng1C',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_eng1D',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_eng1A',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_eng1B',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_eng1C',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_eng1D',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_eng1A',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_eng1B',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_eng1C',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_eng1D',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric1A',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric1B',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric1C',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric1D',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }

    public function get_Midpage2A_data_by_id($id) {
        if($id!='001'){
            $where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_language_eng_mid_term='Faces some difficulty in responding and expressing, associates few words with pictures with assistance' THEN 1 ELSE 0 END) 'midoral_eng1A',
SUM(CASE WHEN oral_language_eng_mid_term='Speaks audibly with less fluency, associates few words with pictures with little assistance' THEN 1 ELSE 0 END) 'midoral_eng1B',
SUM(CASE WHEN oral_language_eng_mid_term='Speaks audible, converses with some fluency, associates words with pictures correctly' THEN 1 ELSE 0 END) 'midoral_eng1C',
SUM(CASE WHEN oral_language_eng_mid_term='Speaks audibly, converses fluently,expresses thoughts, feelings independently' THEN 1 ELSE 0 END) 'midoral_eng1D',
SUM(CASE WHEN write_language_eng_mid_term='Writes alphabets, able to write words with assistance' THEN 1 ELSE 0 END) 'midwrite_eng1A',
SUM(CASE WHEN write_language_eng_mid_term='Writes words/ 1-2 small sentences legibly but with some spelling mistakes' THEN 1 ELSE 0 END) 'midwrite_eng1B',
SUM(CASE WHEN write_language_eng_mid_term='Writes 2-3 small sentences with only few spelling mistakes' THEN 1 ELSE 0 END) 'midwrite_eng1C',
SUM(CASE WHEN write_language_eng_mid_term='Writes small sentences correctly independently' THEN 1 ELSE 0 END) 'midwrite_eng1D',
SUM(CASE WHEN read_language_eng_mid_term='Reads and pronounces commonly used words/ 1-2 sentences with assistance' THEN 1 ELSE 0 END) 'midread_eng1A',
SUM(CASE WHEN read_language_eng_mid_term='Reads and pronounces most of the words/ simple sentences with little assistance' THEN 1 ELSE 0 END) 'midread_eng1B',
SUM(CASE WHEN read_language_eng_mid_term='Reads simple sentences with partial comprehension' THEN 1 ELSE 0 END) 'midread_eng1C',
SUM(CASE WHEN read_language_eng_mid_term='Reads small sentences fluently with comprehension' THEN 1 ELSE 0 END) 'midread_eng1D',
SUM(CASE WHEN is_numeracy_skills_mid_term='Can count /write numbers upto 20' THEN 1 ELSE 0 END) 'midnumeric1A',
SUM(CASE WHEN is_numeracy_skills_mid_term='Able to recognize concept of numbers upto 20 and demonstrates through representations- visual & numeral' THEN 1 ELSE 0 END) 'midnumeric1B',
SUM(CASE WHEN is_numeracy_skills_mid_term='Able to perform simple operations ,recognize shapes and patterns correctly most of the times' THEN 1 ELSE 0 END) 'midnumeric1C',
SUM(CASE WHEN is_numeracy_skills_mid_term='Able to perform simple operations, Recognizes shapes and patterns independently' THEN 1 ELSE 0 END) 'midnumeric1D',  
        COUNT(id) AS MidTotal FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }


       public function get_hindi2A_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindiA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindiB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindiC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindiD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindiA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindiB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindiC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindiD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindiA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindiB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindiC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindiD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }

      public function get_Midhindi2A_data_by_id($id) {
        if($id!='001'){
            $where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi_mid_term='अनुकरण वाचन  में अस्पष्टता/वाचन स्पष्टता में सहयोग की आवश्यकता।' THEN 1 ELSE 0 END) 'midoral_hindiA',
SUM(CASE WHEN oral_language_hindi_mid_term='विचारों को क्रम में एवं धाराप्रवाह बोलने में कठिनाई/अभ्यास की आवश्यकता।' THEN 1 ELSE 0 END) 'midoral_hindiB',
SUM(CASE WHEN oral_language_hindi_mid_term='चित्र एवं परिवेश पर आधारित विचारों को अभिव्यक्त करने का प्रयास करता है।' THEN 1 ELSE 0 END) 'midoral_hindiC',
SUM(CASE WHEN oral_language_hindi_mid_term='उच्चारण में स्पष्टता, विचारों और भावनाओं को पूर्णता व्यक्त करने में सक्षम।' THEN 1 ELSE 0 END) 'midoral_hindiD',
SUM(CASE WHEN write_language_hindi_mid_term='वर्णमाला की अच्छी पहचान पर मात्राओं से पूर्णतया परिचित नहीं।' THEN 1 ELSE 0 END) 'midwrite_hindiA',
SUM(CASE WHEN write_language_hindi_mid_term='वाक्य में प्रयुक्त शब्दों में सरल मात्राओं से परिचित।' THEN 1 ELSE 0 END) 'midwrite_hindiB',
SUM(CASE WHEN write_language_hindi_mid_term='पाठ में आने-वाले शब्दों में अधिकांश मात्राओं से परिचित है। अनुस्वारों की पहचान में कुछ समस्या।' THEN 1 ELSE 0 END) 'midwrite_hindiC',
SUM(CASE WHEN write_language_hindi_mid_term='पाठ (कहानी/कविताएं/पर्यावरण/ प्रिंट आदि) आने वाले शब्दों से परिचित व स्वतंत्र रूप से शब्दों और वाक्यों को लिखना। अनुस्वार पहचानने में कुछ समस्या।' THEN 1 ELSE 0 END) 'midwrite_hindiD',
SUM(CASE WHEN read_language_hindi_mid_term='वर्णमाला की पहचान पर तीन अक्षरों वाले शब्दों को पढ़ने की गति बहुत धीमी। उच्चारण में गलती। सहायता की आवश्यकता।' THEN 1 ELSE 0 END) 'midread_hindiA',
SUM(CASE WHEN read_language_hindi_mid_term='कुछ शब्दों का सही उच्चारण कर सकता है, ज्ञात संदर्भ में अक्षरों और कुछ शब्दों को पहचानने में सक्षम।' THEN 1 ELSE 0 END) 'midread_hindiB',
SUM(CASE WHEN read_language_hindi_mid_term='आंशिक समझ के साथ सरल वाक्य पढ़ता है। ज्ञात संदर्भ में 4-5 सरल शब्दों के छोटे-छोटे वाक्यों को पढ़ सकता है। ' THEN 1 ELSE 0 END) 'midread_hindiC',
SUM(CASE WHEN read_language_hindi_mid_term='स्पष्ट उच्चारण के साथ 4-5 सरल शब्दों वाले उपयुक्त अज्ञात पाठ व छोटे वाक्यों को पढ़ता है। ' THEN 1 ELSE 0 END) 'midread_hindiD',
        COUNT(id) AS TotalMid FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  
	  public function get_FinalOral_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oral_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oral_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oral_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oral_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oral_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oral_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oral_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oral_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oral_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oral_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oral_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oral_recitesD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalReading_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'read_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'read_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'read_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'read_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'read_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'read_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'read_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'read_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'read_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'read_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'read_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'read_tenceD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalWriting_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'write_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'write_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'write_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'write_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'write_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'write_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'write_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'write_conveyD', 
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalNumeracy_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'num_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'num_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'num_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'num_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'num_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'num_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'num_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'num_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'num_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'num_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'num_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'num_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'num_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'num_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'num_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'num_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'num_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'num_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'num_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'num_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'num_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'num_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'num_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'num_reciteD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	
	  public function get_FinalHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `gender` ='Female'  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' AND `gender` ='Female' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_frndhA',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_frndhB',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_frndhC',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_frndhD',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveyhA',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveyhB',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveyhC',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveyhs',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storyhA',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storyhB',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storyhC',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storyhD',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storyhA',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storyhB',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storyhC',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storyhD',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundhA',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundhB',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundhC',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundhD',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordhA',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordhB',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordhC',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordhD',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindihA',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindihB',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindihC',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindihD',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawinghA',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawinghB',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawinghC',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawinghD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalNonSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
			$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oralnon_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oralnon_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oralnon_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oralnon_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oralnon_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oralnon_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oralnon_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oralnon_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oralnon_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oralnon_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oralnon_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oralnon_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readnon_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readnon_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readnon_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readnon_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'read_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'read_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'read_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'read_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readnon_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readnon_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readnon_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readnon_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writenon_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writenon_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writenon_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writenon_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writenon_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writenon_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writenon_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writenon_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   public function get_FinalNonNumSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            
			$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'noncountA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'noncountB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'noncountC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'noncountD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'nonreadA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'nonreadB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'nonreadC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'nonreadD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'nonaddA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'nonaddB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'nonaddC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'nonaddD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'nonobsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'nonobsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'nonobsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'nonobsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'nonunitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'nonunitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'nonunitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'nonunitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'nonreciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'nonreciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'nonreciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'nonreciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiNonSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_nonA',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_nonB',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_nonC',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_nonD',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveynonA',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveynonB',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveynonC',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveynons',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storynonA',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storynonB',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storynonC',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storynonD',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storynonA',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storynonB',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storynonC',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storynonD',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundnonA',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundnonB',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundnonC',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundnonD',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordnonA',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordnonB',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordnonC',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordnonD',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindinonA',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindinonB',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindinonC',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindinonD',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingnonA',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingnonB',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingnonC',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingnonD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalPreSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oralpre_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oralpre_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oralpre_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oralpre_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oralpre_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oralpre_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oralpre_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oralpre_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oralpre_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oralpre_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oralpre_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oralpre_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readpre_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readpre_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readpre_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readpre_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'readpre_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'readpre_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'readpre_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'readpre_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readpre_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readpre_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readpre_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readpre_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writepre_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writepre_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writepre_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writepre_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writepre_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writepre_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writepre_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writepre_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		 //echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   public function get_FinalPreNumSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
                $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'pre_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'pre_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'pre_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'pre_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'pre_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'pre_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'pre_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'pre_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'pre_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'pre_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'pre_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'pre_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'pre_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'pre_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'pre_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'pre_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'pre_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'pre_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'pre_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'pre_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'pre_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'pre_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'pre_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'pre_reciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiPreSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
               $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_preA',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_preB',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_preC',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_preD',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveypre_A',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveypre_B',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveypre_C',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveypre_s',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storypre_A',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storypre_B',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storypre_C',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storypre_D',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storypre_A',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storypre_B',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storypre_C',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storypre_D',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundpre_A',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundpre_B',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundpre_C',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundpre_D',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordpre_A',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordpre_B',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordpre_C',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordpre_D',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindipre_A',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindipre_B',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindipre_C',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindipre_D',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingpre_A',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingpre_B',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingpre_C',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingpre_D',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalParent_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` !='Not educated' AND `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` !='Not educated' AND `mother_qualification` !='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` !='Not educated' AND `mother_qualification` !='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oralparent_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oralparent_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oralparent_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oralparent_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oralparent_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oralparent_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oralparent_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oralparent_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oralparent_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oralparent_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oralparent_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oralparent_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readparent_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readparent_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readparent_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readparent_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'readparent_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'readparent_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'readparent_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'readparent_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readparent_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readparent_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readparent_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readparent_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writeparent_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writeparent_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writeparent_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writeparent_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writeparent_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writeparent_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writeparent_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writeparent_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   public function get_FinalParentSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` !='Not educated' AND `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` !='Not educated'  AND `mother_qualification` !='Not educated') AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` !='Not educated' AND `mother_qualification` !='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'parent_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'parent_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'parent_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'parent_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'parent_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'parent_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'parent_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'parent_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'parent_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'parent_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'parent_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'parent_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'parent_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'parent_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'parent_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'parent_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'parent_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'parent_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'parent_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'parent_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'parent_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'parent_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'parent_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'parent_reciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiParent_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` !='Not educated' AND `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` !='Not educated' AND `mother_qualification` !='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` !='Not educated' AND `mother_qualification` !='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
		
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_parent_A',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_parent_B',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_parent_C',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_parent_D',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveyparent_A',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveyparent_B',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveyparent_C',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveyparent_s',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storyparent_A',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storyparent_B',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storyparent_C',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storyparent_D',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storyparent_A',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storyparent_B',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storyparent_C',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storyparent_D',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundparent_A',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundparent_B',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundparent_C',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundparent_D',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordparent_A',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordparent_B',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordparent_C',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordparent_D',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindiparent_A',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindiparent_B',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindiparent_C',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindiparent_D',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingparent_A',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingparent_B',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingparent_C',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingparent_D',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  
	  public function get_FinalNonEdu_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` ='Not educated' AND `mother_qualification` ='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oralnonedu_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oralnonedu_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oralnonedu_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oralnonedu_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oralnonedu_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oralnonedu_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oralnonedu_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oralnonedu_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oralnonedu_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oralnonedu_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oralnonedu_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oralnonedu_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readnonedu_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readnonedu_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readnonedu_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readnonedu_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'readnonedu_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'readnonedu_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'readnonedu_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'readnonedu_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readnonedu_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readnonedu_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readnonedu_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readnonedu_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writenonedu_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writenonedu_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writenonedu_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writenonedu_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writenonedu_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writenonedu_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writenonedu_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writenonedu_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   public function get_FinalNonEduSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` ='Not educated' AND `mother_qualification` ='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'nonedu_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'nonedu_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'nonedu_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'nonedu_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'nonedu_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'nonedu_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'nonedu_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'nonedu_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'nonedu_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'nonedu_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'nonedu_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'nonedu_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'nonedu_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'nonedu_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'nonedu_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'nonedu_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'nonedu_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'nonedu_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'nonedu_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'nonedu_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'nonedu_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'nonedu_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'nonedu_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'nonedu_reciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiNonEdu_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND (`father_qualification` !='Not educated' OR `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` ='Not educated'  AND `mother_qualification` ='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        { 
            $where= "WHERE `father_qualification` ='Not educated' AND `mother_qualification` ='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_nonedu_A',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_nonedu_B',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_nonedu_C',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_nonedu_D',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveynonedu_A',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveynonedu_B',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveynonedu_C',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveynonedu_s',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storynonedu_A',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storynonedu_B',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storynonedu_C',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storynonedu_D',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storynonedu_A',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storynonedu_B',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storynonedu_C',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storynonedu_D',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundnonedu_A',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundnonedu_B',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundnonedu_C',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundnonedu_D',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordnonedu_A',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordnonedu_B',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordnonedu_C',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordnonedu_D',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindinonedu_A',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindinonedu_B',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindinonedu_C',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindinonedu_D',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingnonedu_A',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingnonedu_B',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingnonedu_C',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingnonedu_D',   
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalDis_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oraldisable_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oraldisable_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oraldisable_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oraldisable_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oraldisable_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oraldisable_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oraldisable_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oraldisable_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oraldisable_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oraldisable_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oraldisable_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oraldisable_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readdisable_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readdisable_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readdisable_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readdisable_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'readdisable_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'readdisable_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'readdisable_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'readdisable_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readdisable_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readdisable_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readdisable_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readdisable_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writedisable_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writedisable_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writedisable_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writedisable_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writedisable_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writedisable_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writedisable_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writedisable_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   public function get_FinalDisSchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_differently_abled` ='Yes' AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'disable_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'disable_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'disable_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'disable_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'disable_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'disable_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'disable_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'disable_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'disable_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'disable_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'disable_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'disable_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'disable_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'disable_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'disable_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'disable_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'disable_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'disable_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'disable_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'disable_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'disable_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'disable_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'disable_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'disable_reciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiDis_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_disable_A',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_disable_B',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_disable_C',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_disable_D',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveydisable_A',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveydisable_B',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveydisable_C',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveydisable_s',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storydisable_A',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storydisable_B',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storydisable_C',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storydisable_D',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storydisable_A',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storydisable_B',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storydisable_C',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storydisable_D',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_sounddisable_A',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_sounddisable_B',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_sounddisable_C',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_sounddisable_D',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_worddisable_A',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_worddisable_B',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_worddisable_C',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_worddisable_D',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindidisable_A',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindidisable_B',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindidisable_C',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindidisable_D',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingdisable_A',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingdisable_B',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingdisable_C',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingdisable_D',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	   
	  public function get_EntryPre_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_PreA',
SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_PreB',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_PreC',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_PreD',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_PreA',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_PreB',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_PreC',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_PreD',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_PreA',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_PreB',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_PreC',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_PreD',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_preA',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_preB',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_preC',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_preD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
 public function get_EntryPreHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`!='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindipreA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindipreB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindipreC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindipreD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindipreA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindipreB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindipreC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindipreD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindipreA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindipreB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindipreC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindipreD',
        COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_EntryNoPre_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
    SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_NoPreA',
	SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_NoPreB',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_NoPreC',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_NoPreD',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_NoPreA',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_NoPreB',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_NoPreC',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_NoPreD',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_NoPreA',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_NoPreB',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_NoPreC',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_NoPreD',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_NoPreA',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_NoPreB',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_NoPreC',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_NoPreD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
      
 public function get_EntryNoPreHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
           
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindinopreA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindinopreB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindinopreC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindinopreD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindinopreA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindinopreB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindinopreC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindinopreD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindinopreA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindinopreB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindinopreC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindinopreD',
        COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_EntryEdu_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` !='Not educated' OR `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` !='Not educated' OR `mother_qualification` !='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` !='Not educated' OR `mother_qualification` !='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
    SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_EduA',
	SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_EduB',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_EduC',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_EduD',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_EduA',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_EduB',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_EduC',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_EduD',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_EduA',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_EduB',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_EduC',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_EduD',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_EduA',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_EduB',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_EduC',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_EduD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }

 public function get_EntryEduHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` !='Not educated' OR `mother_qualification` !='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` !='Not educated' OR `mother_qualification` !='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` !='Not educated' OR `mother_qualification` !='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_EduA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindi_EduB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindi_EduC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_EduD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindi_EduA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_EduB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_EduC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindi_EduD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_EduA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_EduB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_EduC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_EduD',
        COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_EntryNoEdu_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` ='Not educated' AND `mother_qualification` ='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
    SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_NoEduA',
	SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_NoEduB',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_NoEduC',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_NoEduD',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_NoEduA',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_NoEduB',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_NoEduC',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_NoEduD',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_NoEduA',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_NoEduB',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_NoEduC',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_NoEduD',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_NoEduA',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_NoEduB',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_NoEduC',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_NoEduD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }

 public function get_EntryNoEduHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id." AND (`father_qualification` ='Not educated' AND `mother_qualification` ='Not educated') AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `father_qualification` ='Not educated' AND `mother_qualification` ='Not educated' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_NoEduA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindi_NoEduB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindi_NoEduC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_NoEduD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindi_NoEduA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_NoEduB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_NoEduC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindi_NoEduD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_NoEduA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_NoEduB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_NoEduC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_NoEduD',
        COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  
	   public function get_EntryDis_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
           
        }else
        {
            $where= "WHERE `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
    SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_DisA',
	SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_DisB',
SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_DisC',
SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_DisD',

SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_DisA',

SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_DisB',
SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_DisC',
SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_DisD',
SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_DisA',
SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_DisB',
SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_DisC',
SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_DisD',
SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_DisA',
SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_DisB',
SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_DisC',
SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_DisD',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }

 public function get_EntryDisHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_differently_abled` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_DisA',
SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindi_DisB',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindi_DisC',
SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_DisD',
SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindi_DisA',
SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_DisB',
SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_DisC',
SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindi_DisD',
SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_DisA',
SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_DisB',
SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_DisC',
SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_DisD',
        COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  //RTE QUERY
	 public function get_FinalRTE_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_converse='1' THEN 1 ELSE 0 END) 'oralrte_converseA',
		SUM(CASE WHEN oral_converse='2' THEN 1 ELSE 0 END) 'oralrte_converseB',
		SUM(CASE WHEN oral_converse='3' THEN 1 ELSE 0 END) 'oralrte_converseC',
		SUM(CASE WHEN oral_converse='4' THEN 1 ELSE 0 END) 'oralrte_converseD',

		SUM(CASE WHEN oral_talks='1' THEN 1 ELSE 0 END) 'oralrte_talksA',
		SUM(CASE WHEN oral_talks='2' THEN 1 ELSE 0 END) 'oralrte_talksB',
		SUM(CASE WHEN oral_talks='3' THEN 1 ELSE 0 END) 'oralrte_talksC',
		SUM(CASE WHEN oral_talks='4' THEN 1 ELSE 0 END) 'oralrte_talksD',

		SUM(CASE WHEN oral_recites='1' THEN 1 ELSE 0 END) 'oralrte_recitesA',
		SUM(CASE WHEN oral_recites='2' THEN 1 ELSE 0 END) 'oralrte_recitesB',
		SUM(CASE WHEN oral_recites='3' THEN 1 ELSE 0 END) 'oralrte_recitesC',
		SUM(CASE WHEN oral_recites='4' THEN 1 ELSE 0 END) 'oralrte_recitesD',
		
		SUM(CASE WHEN reading_participate='1' THEN 1 ELSE 0 END) 'readrte_partA',
		SUM(CASE WHEN reading_participate='2' THEN 1 ELSE 0 END) 'readrte_partB',
		SUM(CASE WHEN reading_participate='3' THEN 1 ELSE 0 END) 'readrte_partC',
		SUM(CASE WHEN reading_participate='4' THEN 1 ELSE 0 END) 'readrte_partD',

		SUM(CASE WHEN reading_uses='1' THEN 1 ELSE 0 END) 'readrte_usesA',
		SUM(CASE WHEN reading_uses='2' THEN 1 ELSE 0 END) 'readrte_usesB',
		SUM(CASE WHEN reading_uses='3' THEN 1 ELSE 0 END) 'readrte_usesC',
		SUM(CASE WHEN reading_uses='4' THEN 1 ELSE 0 END) 'readrte_usesD',

		SUM(CASE WHEN reading_sentences='1' THEN 1 ELSE 0 END) 'readrte_tenceA',
		SUM(CASE WHEN reading_sentences='2' THEN 1 ELSE 0 END) 'readrte_tenceB',
		SUM(CASE WHEN reading_sentences='3' THEN 1 ELSE 0 END) 'readrte_tenceC',
		SUM(CASE WHEN reading_sentences='4' THEN 1 ELSE 0 END) 'readrte_tenceD',
		
		SUM(CASE WHEN writing_words='1' THEN 1 ELSE 0 END) 'writerte_wordA',
		SUM(CASE WHEN writing_words='2' THEN 1 ELSE 0 END) 'writerte_wordB',
		SUM(CASE WHEN writing_words='3' THEN 1 ELSE 0 END) 'writerte_wordC',
		SUM(CASE WHEN writing_words='4' THEN 1 ELSE 0 END) 'writerte_wordD',

		SUM(CASE WHEN writing_convey='1' THEN 1 ELSE 0 END) 'writerte_conveyA',
		SUM(CASE WHEN writing_convey='2' THEN 1 ELSE 0 END) 'writerte_conveyB',
		SUM(CASE WHEN writing_convey='3' THEN 1 ELSE 0 END) 'writerte_conveyC',
		SUM(CASE WHEN writing_convey='4' THEN 1 ELSE 0 END) 'writerte_conveyD',
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalRTESchooling_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_rte_quota` ='Yes' AND `gender` ='Female'  AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_count='1' THEN 1 ELSE 0 END) 'numrte_countA',
		SUM(CASE WHEN numeracy_count='2' THEN 1 ELSE 0 END) 'numrte_countB',
		SUM(CASE WHEN numeracy_count='3' THEN 1 ELSE 0 END) 'numrte_countC',
		SUM(CASE WHEN numeracy_count='4' THEN 1 ELSE 0 END) 'numrte_countD',

		SUM(CASE WHEN numeracy_read='1' THEN 1 ELSE 0 END) 'numrte_readA',
		SUM(CASE WHEN numeracy_read='2' THEN 1 ELSE 0 END) 'numrte_readB',
		SUM(CASE WHEN numeracy_read='3' THEN 1 ELSE 0 END) 'numrte_readC',
		SUM(CASE WHEN numeracy_read='4' THEN 1 ELSE 0 END) 'numrte_readD',
		
		SUM(CASE WHEN numeracy_addition='1' THEN 1 ELSE 0 END) 'numrte_addA',
		SUM(CASE WHEN numeracy_addition='2' THEN 1 ELSE 0 END) 'numrte_addB',
		SUM(CASE WHEN numeracy_addition='3' THEN 1 ELSE 0 END) 'numrte_addC',
		SUM(CASE WHEN numeracy_addition='4' THEN 1 ELSE 0 END) 'numrte_addD',
		
		SUM(CASE WHEN numeracy_observes='1' THEN 1 ELSE 0 END) 'numrte_obsrA',
		SUM(CASE WHEN numeracy_observes='2' THEN 1 ELSE 0 END) 'numrte_obsrB',
		SUM(CASE WHEN numeracy_observes='3' THEN 1 ELSE 0 END) 'numrte_obsrC',
		SUM(CASE WHEN numeracy_observes='4' THEN 1 ELSE 0 END) 'numrte_obsrD',
		
		SUM(CASE WHEN numeracy_units='1' THEN 1 ELSE 0 END) 'numrte_unitA',
		SUM(CASE WHEN numeracy_units='2' THEN 1 ELSE 0 END) 'numrte_unitB',
		SUM(CASE WHEN numeracy_units='3' THEN 1 ELSE 0 END) 'numrte_unitC',
		SUM(CASE WHEN numeracy_units='4' THEN 1 ELSE 0 END) 'numrte_unitD',
		
		SUM(CASE WHEN numeracy_recites='1' THEN 1 ELSE 0 END) 'numrte_reciteA',
		SUM(CASE WHEN numeracy_recites='2' THEN 1 ELSE 0 END) 'numrte_reciteB',
		SUM(CASE WHEN numeracy_recites='3' THEN 1 ELSE 0 END) 'numrte_reciteC',
		SUM(CASE WHEN numeracy_recites='4' THEN 1 ELSE 0 END) 'numrte_reciteD', 		
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  public function get_FinalHindiRTE_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_frnd='1' THEN 1 ELSE 0 END) 'oral_rte_A',
		SUM(CASE WHEN oral_hindi_frnd='2' THEN 1 ELSE 0 END) 'oral_rte_B',
		SUM(CASE WHEN oral_hindi_frnd='3' THEN 1 ELSE 0 END) 'oral_rte_C',
		SUM(CASE WHEN oral_hindi_frnd='4' THEN 1 ELSE 0 END) 'oral_rte_D',

		SUM(CASE WHEN oral_hindi_convey='1' THEN 1 ELSE 0 END) 'oral_conveyrte_A',
		SUM(CASE WHEN oral_hindi_convey='2' THEN 1 ELSE 0 END) 'oral_conveyrte_B',
		SUM(CASE WHEN oral_hindi_convey='3' THEN 1 ELSE 0 END) 'oral_conveyrte_C',
		SUM(CASE WHEN oral_hindi_convey='4' THEN 1 ELSE 0 END) 'oral_conveyrte_s',
		
		SUM(CASE WHEN oral_hindi_story='1' THEN 1 ELSE 0 END) 'oral_storyrte_A',
		SUM(CASE WHEN oral_hindi_story='2' THEN 1 ELSE 0 END) 'oral_storyrte_B',
		SUM(CASE WHEN oral_hindi_story='3' THEN 1 ELSE 0 END) 'oral_storyrte_C',
		SUM(CASE WHEN oral_hindi_story='4' THEN 1 ELSE 0 END) 'oral_storyrte_D',
		
		SUM(CASE WHEN read_hindi_story='1' THEN 1 ELSE 0 END) 'read_storyrte_A',
		SUM(CASE WHEN read_hindi_story='2' THEN 1 ELSE 0 END) 'read_storyrte_B',
		SUM(CASE WHEN read_hindi_story='3' THEN 1 ELSE 0 END) 'read_storyrte_C',
		SUM(CASE WHEN read_hindi_story='4' THEN 1 ELSE 0 END) 'read_storyrte_D',
		
		SUM(CASE WHEN read_hindi_sound='1' THEN 1 ELSE 0 END) 'read_soundrte_A',
		SUM(CASE WHEN read_hindi_sound='2' THEN 1 ELSE 0 END) 'read_soundrte_B',
		SUM(CASE WHEN read_hindi_sound='3' THEN 1 ELSE 0 END) 'read_soundrte_C',
		SUM(CASE WHEN read_hindi_sound='4' THEN 1 ELSE 0 END) 'read_soundrte_D',
		
		SUM(CASE WHEN read_hindi_word='1' THEN 1 ELSE 0 END) 'read_wordrte_A',
		SUM(CASE WHEN read_hindi_word='2' THEN 1 ELSE 0 END) 'read_wordrte_B',
		SUM(CASE WHEN read_hindi_word='3' THEN 1 ELSE 0 END) 'read_wordrte_C',
		SUM(CASE WHEN read_hindi_word='4' THEN 1 ELSE 0 END) 'read_wordrte_D',
		
		SUM(CASE WHEN writing_hindi='1' THEN 1 ELSE 0 END) 'writing_hindirte_A',
		SUM(CASE WHEN writing_hindi='2' THEN 1 ELSE 0 END) 'writing_hindirte_B',
		SUM(CASE WHEN writing_hindi='3' THEN 1 ELSE 0 END) 'writing_hindirte_C',
		SUM(CASE WHEN writing_hindi='4' THEN 1 ELSE 0 END) 'writing_hindirte_D',
		
		SUM(CASE WHEN writing_hindi_drawing='1' THEN 1 ELSE 0 END) 'hindi_drawingrte_A',
		SUM(CASE WHEN writing_hindi_drawing='2' THEN 1 ELSE 0 END) 'hindi_drawingrte_B',
		SUM(CASE WHEN writing_hindi_drawing='3' THEN 1 ELSE 0 END) 'hindi_drawingrte_C',
		SUM(CASE WHEN writing_hindi_drawing='4' THEN 1 ELSE 0 END) 'hindi_drawingrte_D',  
        COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  //entry level
	  public function get_EntryRTE_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
           
        }else
        {
            $where= "WHERE `is_rte_quota` ='Yes' AND  `gender` ='Male' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
		SUM(CASE WHEN oral_language_eng='Shows hesitation / faces difficulty in responding; needs support' THEN 1 ELSE 0 END) 'oral_RTEA',
		SUM(CASE WHEN oral_language_eng='Able to respond to age appropriate words and ideas' THEN 1 ELSE 0 END) 'oral_RTEB',
		SUM(CASE WHEN oral_language_eng='Speaks audibly but struggles to express thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_RTEC',
		SUM(CASE WHEN oral_language_eng='Speaks audibly and expresses thoughts, feelings, and ideas clearly.' THEN 1 ELSE 0 END) 'oral_RTED',

		SUM(CASE WHEN write_language_eng='Yet to learn basic strokes of writing; needs support' THEN 1 ELSE 0 END) 'write_RTEA',

		SUM(CASE WHEN write_language_eng='Able to recognize and write a few letters/symbols and draw sketches of a few objects.' THEN 1 ELSE 0 END) 'write_RTEB',
		SUM(CASE WHEN write_language_eng='Able to write all the letters of the Alphabet/symbols and draw sketches of many objects.' THEN 1 ELSE 0 END) 'write_RTEC',
		SUM(CASE WHEN write_language_eng='Able to write many words and draw good sketches of many objects.' THEN 1 ELSE 0 END) 'write_RTED',
		SUM(CASE WHEN read_language_eng='Has difficulty in recognizing the letters of the alphabet; needs support' THEN 1 ELSE 0 END) 'read_RTEA',
		SUM(CASE WHEN read_language_eng='Able to recognize and read all the letters of the alphabet and a few words' THEN 1 ELSE 0 END) 'read_RTEB',
		SUM(CASE WHEN read_language_eng='Able to recognize and read a few words and their meanings' THEN 1 ELSE 0 END) 'read_RTEC',
		SUM(CASE WHEN read_language_eng='Able to read simple sentences fluently and comprehend them' THEN 1 ELSE 0 END) 'read_RTED',
		SUM(CASE WHEN is_numeracy_skills='Knows and counts numbers upto 10' THEN 1 ELSE 0 END) 'numeric_RTEA',
		SUM(CASE WHEN is_numeracy_skills='Able to write numbers upto 10' THEN 1 ELSE 0 END) 'numeric_RTEB',
		SUM(CASE WHEN is_numeracy_skills='Able to recognize the concept of numbers upto 10 and demonstrate through representations - visual and numeral' THEN 1 ELSE 0 END) 'numeric_RTEC',
		SUM(CASE WHEN is_numeracy_skills='Able to perform operations and recognize shapes and patterns' THEN 1 ELSE 0 END) 'numeric_RTED',  
				COUNT(id) AS Total FROM `ci_students`".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  public function get_EntryRTEHindi_data_by_id($id,$kv_id) {
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
				$where= "WHERE `region_id` = ".$id." AND `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
            }
            
        }else
        {
            $where= "WHERE `is_rte_quota` ='Yes' AND `gender` ='Female' AND `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT        
		SUM(CASE WHEN oral_language_hindi LIKE '%कुछ हिचकिचाहट  है/ अनुक्रिया में कठिनाई का सामना करता है, सहयोग की आवश्यकता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_RTEA',
		SUM(CASE WHEN oral_language_hindi LIKE '%आयु उपयुक्त शब्दों एवं विचारों  पर ठीक -ठीक अनुक्रिया  करने में सक्षम है ।%' THEN 1 ELSE 0 END) 'oral_hindi_RTEB',
		SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है किंतु विचारों एवं भावनाओं  को स्पष्ट रूप से अभिव्यक्त  करने में कठिनाई  होती है ।%' THEN 1 ELSE 0 END) 'oral_hindi_RTEC',
		SUM(CASE WHEN oral_language_hindi LIKE '%उच्चारण स्पष्ट है एवं  विचारों एवं भावनाओं  को स्पष्ट रूप में अभिव्यक्त  करता  है ।%' THEN 1 ELSE 0 END) 'oral_hindi_RTED',
		SUM(CASE WHEN write_language_hindi='लेखन सीखने के  लिये सहयोग की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'write_hindi_RTEA',
		SUM(CASE WHEN write_language_hindi='कुछ अक्षरों /संकेतों  को पहचानने  एवं लिखने की क्षमता है एवं  कुछ वस्तुओं के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_RTEB',
		SUM(CASE WHEN write_language_hindi='वर्णमाला  के सभी अक्षरों /संकेतों को  लिख सकता  है एवं अनेक वस्तुओं  के रेखाचित्र बनाता  है ।' THEN 1 ELSE 0 END) 'write_hindi_RTEC',
		SUM(CASE WHEN write_language_hindi='अनेक शब्द लिख सकता है एवं अनेक वस्तुओं  के अच्छे रेखाचित्र बनाता है ।' THEN 1 ELSE 0 END) 'write_hindi_RTED',
		SUM(CASE WHEN read_language_hindi='कुछ शब्दों एवं उनके अर्थ  को पहचान कर  पढ़ सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_RTEA',
		SUM(CASE WHEN read_language_hindi='वर्णमाला  के सभी  अक्षर एवं कुछ शब्दों  को  पहचान कर पढ़  सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_RTEB',
		SUM(CASE WHEN read_language_hindi='वर्णमाला के  अक्षर पढ़ने में कठिनाई है, सहयोग  की  आवश्यकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_RTEC',
		SUM(CASE WHEN read_language_hindi='सरल वाक्यों को धाराप्रवाह पढ़ सकता  है एवं  उनकी  व्याख्या  कर सकता  है ।' THEN 1 ELSE 0 END) 'read_hindi_RTED',
				COUNT(id) AS Total FROM `ci_students` ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die;
        if($query->num_rows() > 0) {         
            return $query->row();
        } else {
            return array();
        } 
      }
	  
	  
}
