<?php
if (!defined('BASEPATH')) { exit ('No direct script access allowed'); }

class AssessmentModelClassWise extends CI_model {
    public function construct() {
        parent::__construct();
		 $this->load->database('second', TRUE);
    }

     public function get_Class2ndYearEndOral_data_by_id($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        } 
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_i='1' THEN 1 ELSE 0 END) 'oral_L1',
        SUM(CASE WHEN oral_i='2' THEN 1 ELSE 0 END) 'oral_L2',
        SUM(CASE WHEN oral_i='3' THEN 1 ELSE 0 END) 'oral_L3',
        SUM(CASE WHEN oral_i='4' THEN 1 ELSE 0 END) 'oral_L4',

        SUM(CASE WHEN oral_ii='1' THEN 1 ELSE 0 END) 'oral_ii_A',
        SUM(CASE WHEN oral_ii='2' THEN 1 ELSE 0 END) 'oral_ii_B',
        SUM(CASE WHEN oral_ii='3' THEN 1 ELSE 0 END) 'oral_ii_C',
        SUM(CASE WHEN oral_ii='4' THEN 1 ELSE 0 END) 'oral_ii_D',

        SUM(CASE WHEN oral_iii='1' THEN 1 ELSE 0 END) 'oral_iii_A',
        SUM(CASE WHEN oral_iii='2' THEN 1 ELSE 0 END) 'oral_iii_B',
        SUM(CASE WHEN oral_iii='3' THEN 1 ELSE 0 END) 'oral_iii_C',
        SUM(CASE WHEN oral_iii='4' THEN 1 ELSE 0 END) 'oral_iii_D', 

        SUM(CASE WHEN oral_iv='1' THEN 1 ELSE 0 END) 'oral_iv_A',
        SUM(CASE WHEN oral_iv='2' THEN 1 ELSE 0 END) 'oral_iv_B',
        SUM(CASE WHEN oral_iv='3' THEN 1 ELSE 0 END) 'oral_iv_C',
        SUM(CASE WHEN oral_iv='4' THEN 1 ELSE 0 END) 'oral_iv_D',  
        COUNT(id) AS Total FROM $table ".$where; 
        //echo $sqlQuery; die();
        $query = $this->db->query($sqlQuery); 
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      }

     public function get_Class2ndYearEndReading_data_by_id($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';

        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',
        SUM(CASE WHEN reading_i='4' THEN 1 ELSE 0 END) 'reading_i_L4',

        SUM(CASE WHEN reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',
        SUM(CASE WHEN reading_ii='4' THEN 1 ELSE 0 END) 'reading_ii_L4',

        SUM(CASE WHEN reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',
        SUM(CASE WHEN reading_iii='4' THEN 1 ELSE 0 END) 'reading_iii_L4',  
        COUNT(id) AS Total FROM $table ".$where; 
        //echo $sqlQuery; die();
        $query = $this->db->query($sqlQuery); 
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      }
	   public function get_Class2ndYearEndWriting_data_by_id($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';

        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN writing_i='1' THEN 1 ELSE 0 END) 'writing_i_L1',
        SUM(CASE WHEN writing_i='2' THEN 1 ELSE 0 END) 'writing_i_L2',
        SUM(CASE WHEN writing_i='3' THEN 1 ELSE 0 END) 'writing_i_L3',
        SUM(CASE WHEN writing_i='4' THEN 1 ELSE 0 END) 'writing_i_L4',


        SUM(CASE WHEN writing_ii='1' THEN 1 ELSE 0 END) 'writing_ii_L1',
        SUM(CASE WHEN writing_ii='2' THEN 1 ELSE 0 END) 'writing_ii_L2',
        SUM(CASE WHEN writing_ii='3' THEN 1 ELSE 0 END) 'writing_ii_L3',
        SUM(CASE WHEN writing_ii='4' THEN 1 ELSE 0 END) 'writing_ii_L4', 
        COUNT(id) AS Total FROM $table ".$where; 
        //echo $sqlQuery; die();
        $query = $this->db->query($sqlQuery); 
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      }


      public function get_Class2ndYearEndNumeracy_data_by_id($id,$kv_id,$Class_ID) {
         $table='ci_students_class_2nd_rubrics';

        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_i='1' THEN 1 ELSE 0 END) 'num_countA',
        SUM(CASE WHEN numeracy_i='2' THEN 1 ELSE 0 END) 'num_countB',
        SUM(CASE WHEN numeracy_i='3' THEN 1 ELSE 0 END) 'num_countC',
        SUM(CASE WHEN numeracy_i='4' THEN 1 ELSE 0 END) 'num_countD',

        SUM(CASE WHEN numeracy_ii='1' THEN 1 ELSE 0 END) 'num_readA',
        SUM(CASE WHEN numeracy_ii='2' THEN 1 ELSE 0 END) 'num_readB',
        SUM(CASE WHEN numeracy_ii='3' THEN 1 ELSE 0 END) 'num_readC',
        SUM(CASE WHEN numeracy_ii='4' THEN 1 ELSE 0 END) 'num_readD',
        
        SUM(CASE WHEN numeracy_iii='1' THEN 1 ELSE 0 END) 'num_addA',
        SUM(CASE WHEN numeracy_iii='2' THEN 1 ELSE 0 END) 'num_addB',
        SUM(CASE WHEN numeracy_iii='3' THEN 1 ELSE 0 END) 'num_addC',
        SUM(CASE WHEN numeracy_iii='4' THEN 1 ELSE 0 END) 'num_addD',
        
        SUM(CASE WHEN numeracy_iv='1' THEN 1 ELSE 0 END) 'num_obsrA',
        SUM(CASE WHEN numeracy_iv='2' THEN 1 ELSE 0 END) 'num_obsrB',
        SUM(CASE WHEN numeracy_iv='3' THEN 1 ELSE 0 END) 'num_obsrC',
        SUM(CASE WHEN numeracy_iv='4' THEN 1 ELSE 0 END) 'num_obsrD',
        
        SUM(CASE WHEN numeracy_v='1' THEN 1 ELSE 0 END) 'num_unitA',
        SUM(CASE WHEN numeracy_v='2' THEN 1 ELSE 0 END) 'num_unitB',
        SUM(CASE WHEN numeracy_v='3' THEN 1 ELSE 0 END) 'num_unitC',
        SUM(CASE WHEN numeracy_v='4' THEN 1 ELSE 0 END) 'num_unitD',
        
        SUM(CASE WHEN numeracy_vi='1' THEN 1 ELSE 0 END) 'num_reciteA',
        SUM(CASE WHEN numeracy_vi='2' THEN 1 ELSE 0 END) 'num_reciteB',
        SUM(CASE WHEN numeracy_vi='3' THEN 1 ELSE 0 END) 'num_reciteC',
        SUM(CASE WHEN numeracy_vi='4' THEN 1 ELSE 0 END) 'num_reciteD',
        COUNT(id) AS Total FROM $table ".$where; 
        $query = $this->db->query($sqlQuery); 
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      }

      public function get_Class2ndYearEndHindi_data_by_id($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN oral_hindi_i='1' THEN 1 ELSE 0 END) 'oral_frndhA',
        SUM(CASE WHEN oral_hindi_i='2' THEN 1 ELSE 0 END) 'oral_frndhB',
        SUM(CASE WHEN oral_hindi_i='3' THEN 1 ELSE 0 END) 'oral_frndhC',
        SUM(CASE WHEN oral_hindi_i='4' THEN 1 ELSE 0 END) 'oral_frndhD',

        SUM(CASE WHEN oral_hindi_ii='1' THEN 1 ELSE 0 END) 'oral_conveyhA',
        SUM(CASE WHEN oral_hindi_ii='2' THEN 1 ELSE 0 END) 'oral_conveyhB',
        SUM(CASE WHEN oral_hindi_ii='3' THEN 1 ELSE 0 END) 'oral_conveyhC',
        SUM(CASE WHEN oral_hindi_ii='4' THEN 1 ELSE 0 END) 'oral_conveyhs',
        
        SUM(CASE WHEN oral_hindi_iii='1' THEN 1 ELSE 0 END) 'oral_storyhA',
        SUM(CASE WHEN oral_hindi_iii='2' THEN 1 ELSE 0 END) 'oral_storyhB',
        SUM(CASE WHEN oral_hindi_iii='3' THEN 1 ELSE 0 END) 'oral_storyhC',
        SUM(CASE WHEN oral_hindi_iii='4' THEN 1 ELSE 0 END) 'oral_storyhD',
        
        SUM(CASE WHEN read_hindi_i='1' THEN 1 ELSE 0 END) 'read_storyhA',
        SUM(CASE WHEN read_hindi_i='2' THEN 1 ELSE 0 END) 'read_storyhB',
        SUM(CASE WHEN read_hindi_i='3' THEN 1 ELSE 0 END) 'read_storyhC',
        SUM(CASE WHEN read_hindi_i='4' THEN 1 ELSE 0 END) 'read_storyhD',
        
        SUM(CASE WHEN read_hindi_ii='1' THEN 1 ELSE 0 END) 'read_soundhA',
        SUM(CASE WHEN read_hindi_ii='2' THEN 1 ELSE 0 END) 'read_soundhB',
        SUM(CASE WHEN read_hindi_ii='3' THEN 1 ELSE 0 END) 'read_soundhC',
        SUM(CASE WHEN read_hindi_ii='4' THEN 1 ELSE 0 END) 'read_soundhD',
        
        SUM(CASE WHEN read_hindi_iii='1' THEN 1 ELSE 0 END) 'read_wordhA',
        SUM(CASE WHEN read_hindi_iii='2' THEN 1 ELSE 0 END) 'read_wordhB',
        SUM(CASE WHEN read_hindi_iii='3' THEN 1 ELSE 0 END) 'read_wordhC',
        SUM(CASE WHEN read_hindi_iii='4' THEN 1 ELSE 0 END) 'read_wordhD',
        
        SUM(CASE WHEN writing_hindi_i='1' THEN 1 ELSE 0 END) 'writing_hindihA',
        SUM(CASE WHEN writing_hindi_i='2' THEN 1 ELSE 0 END) 'writing_hindihB',
        SUM(CASE WHEN writing_hindi_i='3' THEN 1 ELSE 0 END) 'writing_hindihC',
        SUM(CASE WHEN writing_hindi_i='4' THEN 1 ELSE 0 END) 'writing_hindihD',
        
        SUM(CASE WHEN writing_hindi_ii='1' THEN 1 ELSE 0 END) 'hindi_drawinghA',
        SUM(CASE WHEN writing_hindi_ii='2' THEN 1 ELSE 0 END) 'hindi_drawinghB',
        SUM(CASE WHEN writing_hindi_ii='3' THEN 1 ELSE 0 END) 'hindi_drawinghC',
        SUM(CASE WHEN writing_hindi_ii='4' THEN 1 ELSE 0 END) 'hindi_drawinghD',
        COUNT(id) AS Total FROM $table ".$where; 
        $query = $this->db->query($sqlQuery); 
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      }
 
	  
	  public function get_Class2ndYearEndNumeracy_data_by_iddata($id,$kv_id,$Class_ID) {
		  
          $table='ci_students_class_2nd_rubrics';
        if($id!='001'){
			if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            $where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            }
            //$where= "WHERE `region_id` = ".$id." and `is_deleted` = '0' ORDER BY `id` ASC";
        }else
        {
            $where= "WHERE `is_deleted` = '0' ORDER BY `id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN numeracy_i='1' THEN 1 ELSE 0 END) 'num_countA',
		SUM(CASE WHEN numeracy_i='2' THEN 1 ELSE 0 END) 'num_countB',
		SUM(CASE WHEN numeracy_i='3' THEN 1 ELSE 0 END) 'num_countC',
		SUM(CASE WHEN numeracy_i='4' THEN 1 ELSE 0 END) 'num_countD',

		SUM(CASE WHEN numeracy_ii='1' THEN 1 ELSE 0 END) 'num_readA',
		SUM(CASE WHEN numeracy_ii='2' THEN 1 ELSE 0 END) 'num_readB',
		SUM(CASE WHEN numeracy_ii='3' THEN 1 ELSE 0 END) 'num_readC',
		SUM(CASE WHEN numeracy_ii='4' THEN 1 ELSE 0 END) 'num_readD',
		
		SUM(CASE WHEN numeracy_iii='1' THEN 1 ELSE 0 END) 'num_addA',
		SUM(CASE WHEN numeracy_iii='2' THEN 1 ELSE 0 END) 'num_addB',
		SUM(CASE WHEN numeracy_iii='3' THEN 1 ELSE 0 END) 'num_addC',
		SUM(CASE WHEN numeracy_iii='4' THEN 1 ELSE 0 END) 'num_addD',
		
		SUM(CASE WHEN numeracy_iv='1' THEN 1 ELSE 0 END) 'num_obsrA',
		SUM(CASE WHEN numeracy_iv='2' THEN 1 ELSE 0 END) 'num_obsrB',
		SUM(CASE WHEN numeracy_iv='3' THEN 1 ELSE 0 END) 'num_obsrC',
		SUM(CASE WHEN numeracy_iv='4' THEN 1 ELSE 0 END) 'num_obsrD',
		
		SUM(CASE WHEN numeracy_v='1' THEN 1 ELSE 0 END) 'num_unitA',
		SUM(CASE WHEN numeracy_v='2' THEN 1 ELSE 0 END) 'num_unitB',
		SUM(CASE WHEN numeracy_v='3' THEN 1 ELSE 0 END) 'num_unitC',
		SUM(CASE WHEN numeracy_v='4' THEN 1 ELSE 0 END) 'num_unitD',
		
		SUM(CASE WHEN numeracy_vi='1' THEN 1 ELSE 0 END) 'num_reciteA',
		SUM(CASE WHEN numeracy_vi='2' THEN 1 ELSE 0 END) 'num_reciteB',
		SUM(CASE WHEN numeracy_vi='3' THEN 1 ELSE 0 END) 'num_reciteC',
		SUM(CASE WHEN numeracy_vi='4' THEN 1 ELSE 0 END) 'num_reciteD',
        COUNT(id) AS Total FROM $table ".$where; 
        $query = $this->db->query($sqlQuery); 
		//echo $this->db->last_query(); die();
        if(!empty($query)){
			if($query->num_rows() > 0) {         
				return $query->row();
			} else {
				return array();
			}
		}else{
			return array();
		}	
      }

      public function get_Class2ndYearEndPreSchooling_data_by_id($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        }
        $sqlQuery="SELECT 
        SUM(CASE WHEN $table.oral_i='1' THEN 1 ELSE 0 END) 'oral_i_L1',
        SUM(CASE WHEN $table.oral_i='2' THEN 1 ELSE 0 END) 'oral_i_L2',
        SUM(CASE WHEN $table.oral_i='3' THEN 1 ELSE 0 END) 'oral_i_L3',
        SUM(CASE WHEN $table.oral_i='4' THEN 1 ELSE 0 END) 'oral_i_L4',

        SUM(CASE WHEN $table.oral_ii='1' THEN 1 ELSE 0 END) 'oral_ii_L1',
        SUM(CASE WHEN $table.oral_ii='2' THEN 1 ELSE 0 END) 'oral_ii_L2',
        SUM(CASE WHEN $table.oral_ii='3' THEN 1 ELSE 0 END) 'oral_ii_L3',
        SUM(CASE WHEN $table.oral_ii='4' THEN 1 ELSE 0 END) 'oral_ii_L4',

        SUM(CASE WHEN $table.oral_iii='1' THEN 1 ELSE 0 END) 'oral_iii_L1',
        SUM(CASE WHEN $table.oral_iii='2' THEN 1 ELSE 0 END) 'oral_iii_L2',
        SUM(CASE WHEN $table.oral_iii='3' THEN 1 ELSE 0 END) 'oral_iii_L3',
        SUM(CASE WHEN $table.oral_iii='4' THEN 1 ELSE 0 END) 'oral_iii_L4',

        SUM(CASE WHEN $table.reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN $table.reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN $table.reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',
        SUM(CASE WHEN $table.reading_i='4' THEN 1 ELSE 0 END) 'reading_i_L4',

        SUM(CASE WHEN $table.reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN $table.reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN $table.reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',
        SUM(CASE WHEN $table.reading_ii='4' THEN 1 ELSE 0 END) 'reading_ii_L4',

        SUM(CASE WHEN $table.reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN $table.reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN $table.reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',
        SUM(CASE WHEN $table.reading_iii='4' THEN 1 ELSE 0 END) 'reading_iii_L4',

        SUM(CASE WHEN $table.writing_i='1' THEN 1 ELSE 0 END) 'writingh_i_L1',
        SUM(CASE WHEN $table.writing_i='2' THEN 1 ELSE 0 END) 'writingh_i_L2',
        SUM(CASE WHEN $table.writing_i='3' THEN 1 ELSE 0 END) 'writingh_i_L3',
        SUM(CASE WHEN $table.writing_i='4' THEN 1 ELSE 0 END) 'writingh_i_L4',

        SUM(CASE WHEN $table.writing_ii='1' THEN 1 ELSE 0 END) 'writingh_ii_L1',
        SUM(CASE WHEN $table.writing_ii='2' THEN 1 ELSE 0 END) 'writingh_ii_L2',
        SUM(CASE WHEN $table.writing_ii='3' THEN 1 ELSE 0 END) 'writingh_ii_L3',
        SUM(CASE WHEN $table.writing_ii='4' THEN 1 ELSE 0 END) 'writingh_ii_L4',

        SUM(CASE WHEN numeracy_i='1' THEN 1 ELSE 0 END) 'numeracy_i_L1',
        SUM(CASE WHEN numeracy_i='2' THEN 1 ELSE 0 END) 'numeracy_i_L2',
        SUM(CASE WHEN numeracy_i='3' THEN 1 ELSE 0 END) 'numeracy_i_L3',
        SUM(CASE WHEN numeracy_i='4' THEN 1 ELSE 0 END) 'numeracy_i_L4',

        SUM(CASE WHEN numeracy_ii='1' THEN 1 ELSE 0 END) 'numeracy_ii_L1',
        SUM(CASE WHEN numeracy_ii='2' THEN 1 ELSE 0 END) 'numeracy_ii_L2',
        SUM(CASE WHEN numeracy_ii='3' THEN 1 ELSE 0 END) 'numeracy_ii_L3',
        SUM(CASE WHEN numeracy_ii='4' THEN 1 ELSE 0 END) 'numeracy_ii_L4',
        
        SUM(CASE WHEN numeracy_iii='1' THEN 1 ELSE 0 END) 'numeracy_iii_L1',
        SUM(CASE WHEN numeracy_iii='2' THEN 1 ELSE 0 END) 'numeracy_iii_L2',
        SUM(CASE WHEN numeracy_iii='3' THEN 1 ELSE 0 END) 'numeracy_iii_L3',
        SUM(CASE WHEN numeracy_iii='4' THEN 1 ELSE 0 END) 'numeracy_iii_L4',
        
        SUM(CASE WHEN numeracy_iv='1' THEN 1 ELSE 0 END) 'numeracy_iv_L1',
        SUM(CASE WHEN numeracy_iv='2' THEN 1 ELSE 0 END) 'numeracy_iv_L2',
        SUM(CASE WHEN numeracy_iv='3' THEN 1 ELSE 0 END) 'numeracy_iv_L3',
        SUM(CASE WHEN numeracy_iv='4' THEN 1 ELSE 0 END) 'numeracy_iv_L4',
        
        SUM(CASE WHEN numeracy_v='1' THEN 1 ELSE 0 END) 'numeracy_v_L1',
        SUM(CASE WHEN numeracy_v='2' THEN 1 ELSE 0 END) 'numeracy_v_L2',
        SUM(CASE WHEN numeracy_v='3' THEN 1 ELSE 0 END) 'numeracy_v_L3',
        SUM(CASE WHEN numeracy_v='4' THEN 1 ELSE 0 END) 'numeracy_v_L4',
        
        SUM(CASE WHEN numeracy_vi='1' THEN 1 ELSE 0 END) 'numeracy_vi_L1',
        SUM(CASE WHEN numeracy_vi='2' THEN 1 ELSE 0 END) 'numeracy_vi_L2',
        SUM(CASE WHEN numeracy_vi='3' THEN 1 ELSE 0 END) 'numeracy_vi_L3',
        SUM(CASE WHEN numeracy_vi='4' THEN 1 ELSE 0 END) 'numeracy_vi_L4',

        SUM(CASE WHEN oral_hindi_i='1' THEN 1 ELSE 0 END) 'oral_hindi_i_L1',
        SUM(CASE WHEN oral_hindi_i='2' THEN 1 ELSE 0 END) 'oral_hindi_i_L2',
        SUM(CASE WHEN oral_hindi_i='3' THEN 1 ELSE 0 END) 'oral_hindi_i_L3',
        SUM(CASE WHEN oral_hindi_i='4' THEN 1 ELSE 0 END) 'oral_hindi_i_L4',

        SUM(CASE WHEN oral_hindi_ii='1' THEN 1 ELSE 0 END) 'oral_hindi_ii_L1',
        SUM(CASE WHEN oral_hindi_ii='2' THEN 1 ELSE 0 END) 'oral_hindi_ii_L2',
        SUM(CASE WHEN oral_hindi_ii='3' THEN 1 ELSE 0 END) 'oral_hindi_ii_L3',
        SUM(CASE WHEN oral_hindi_ii='4' THEN 1 ELSE 0 END) 'oral_hindi_ii_L4',
        
        SUM(CASE WHEN oral_hindi_iii='1' THEN 1 ELSE 0 END) 'oral_hindi_iii_L1',
        SUM(CASE WHEN oral_hindi_iii='2' THEN 1 ELSE 0 END) 'oral_hindi_iii_L2',
        SUM(CASE WHEN oral_hindi_iii='3' THEN 1 ELSE 0 END) 'oral_hindi_iii_L3',
        SUM(CASE WHEN oral_hindi_iii='4' THEN 1 ELSE 0 END) 'oral_hindi_iii_L4',
        
        SUM(CASE WHEN read_hindi_i='1' THEN 1 ELSE 0 END) 'read_hindi_i_L1',
        SUM(CASE WHEN read_hindi_i='2' THEN 1 ELSE 0 END) 'read_hindi_i_L2',
        SUM(CASE WHEN read_hindi_i='3' THEN 1 ELSE 0 END) 'read_hindi_i_L3',
        SUM(CASE WHEN read_hindi_i='4' THEN 1 ELSE 0 END) 'read_hindi_i_L4',
        
        SUM(CASE WHEN read_hindi_ii='1' THEN 1 ELSE 0 END) 'read_hindi_ii_L1',
        SUM(CASE WHEN read_hindi_ii='2' THEN 1 ELSE 0 END) 'read_hindi_ii_L2',
        SUM(CASE WHEN read_hindi_ii='3' THEN 1 ELSE 0 END) 'read_hindi_ii_L3',
        SUM(CASE WHEN read_hindi_ii='4' THEN 1 ELSE 0 END) 'read_hindi_ii_L4',
        
        SUM(CASE WHEN read_hindi_iii='1' THEN 1 ELSE 0 END) 'read_hindi_iii_L1',
        SUM(CASE WHEN read_hindi_iii='2' THEN 1 ELSE 0 END) 'read_hindi_iii_L2',
        SUM(CASE WHEN read_hindi_iii='3' THEN 1 ELSE 0 END) 'read_hindi_iii_L3',
        SUM(CASE WHEN read_hindi_iii='4' THEN 1 ELSE 0 END) 'read_hindi_iii_L4',
        
        SUM(CASE WHEN writing_hindi_i='1' THEN 1 ELSE 0 END) 'writing_hindi_i_L1',
        SUM(CASE WHEN writing_hindi_i='2' THEN 1 ELSE 0 END) 'writing_hindi_i_L2',
        SUM(CASE WHEN writing_hindi_i='3' THEN 1 ELSE 0 END) 'writing_hindi_i_L3',
        SUM(CASE WHEN writing_hindi_i='4' THEN 1 ELSE 0 END) 'writing_hindi_i_L4',
        
        SUM(CASE WHEN writing_hindi_ii='1' THEN 1 ELSE 0 END) 'writing_hindi_ii_L1',
        SUM(CASE WHEN writing_hindi_ii='2' THEN 1 ELSE 0 END) 'writing_hindi_ii_L2',
        SUM(CASE WHEN writing_hindi_ii='3' THEN 1 ELSE 0 END) 'writing_hindi_ii_L3',
        SUM(CASE WHEN writing_hindi_ii='4' THEN 1 ELSE 0 END) 'writing_hindi_ii_L4',
		
		
        
        COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }   
      } 
	      public function get_Class2ndYearEndPreSchooling_data_by_id_oral($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
		SUM(CASE WHEN oral_hindi_i='1' THEN 1 ELSE 0 END) 'oral_hindi_i_L1',
        SUM(CASE WHEN oral_hindi_i='2' THEN 1 ELSE 0 END) 'oral_hindi_i_L2',
        SUM(CASE WHEN oral_hindi_i='3' THEN 1 ELSE 0 END) 'oral_hindi_i_L3',
        SUM(CASE WHEN oral_hindi_i='4' THEN 1 ELSE 0 END) 'oral_hindi_i_l4',

        SUM(CASE WHEN oral_hindi_ii='1' THEN 1 ELSE 0 END) 'oral_hindi_ii_L1',
        SUM(CASE WHEN oral_hindi_ii='2' THEN 1 ELSE 0 END) 'oral_hindi_ii_L2',
        SUM(CASE WHEN oral_hindi_ii='3' THEN 1 ELSE 0 END) 'oral_hindi_ii_L3',
        SUM(CASE WHEN oral_hindi_ii='4' THEN 1 ELSE 0 END) 'oral_hindi_ii_L4',
        
        SUM(CASE WHEN oral_hindi_iii='1' THEN 1 ELSE 0 END) 'oral_hindi_iii_L1',
        SUM(CASE WHEN oral_hindi_iii='2' THEN 1 ELSE 0 END) 'oral_hindi_iii_L2',
        SUM(CASE WHEN oral_hindi_iii='3' THEN 1 ELSE 0 END) 'oral_hindi_iii_L3',
        SUM(CASE WHEN oral_hindi_iii='4' THEN 1 ELSE 0 END) 'oral_hindi_iii_L4',
		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }
	 public function get_Class2ndYearEndPreSchooling_data_by_id_reading($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
		SUM(CASE WHEN reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',
        SUM(CASE WHEN reading_i='4' THEN 1 ELSE 0 END) 'reading_i_l4',

        SUM(CASE WHEN reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',
        SUM(CASE WHEN reading_ii='4' THEN 1 ELSE 0 END) 'reading_ii_L4',
        
        SUM(CASE WHEN reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',
        SUM(CASE WHEN reading_iii='4' THEN 1 ELSE 0 END) 'reading_iii_L4',
		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	  
	    public function get_Class2ndYearEndPreSchooling_data_by_id_writingdata($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	    SUM(CASE WHEN writing_i='1' THEN 1 ELSE 0 END) 'writing_i_L1',
        SUM(CASE WHEN writing_i='2' THEN 1 ELSE 0 END) 'writing_i_L2',
        SUM(CASE WHEN writing_i='3' THEN 1 ELSE 0 END) 'writing_i_L3',
        SUM(CASE WHEN writing_i='4' THEN 1 ELSE 0 END) 'writing_i_L4',
        
        SUM(CASE WHEN writing_ii='1' THEN 1 ELSE 0 END) 'writing_ii_L1',
        SUM(CASE WHEN writing_ii='2' THEN 1 ELSE 0 END) 'writing_ii_L2',
        SUM(CASE WHEN writing_ii='3' THEN 1 ELSE 0 END) 'writing_ii_L3',
        SUM(CASE WHEN writing_ii='4' THEN 1 ELSE 0 END) 'writing_ii_L4',
		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	  
 public function get_Class2ndYearEndPreSchooling_data_by_id_oraldata($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`!='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	    SUM(CASE WHEN oral_i='1' THEN 1 ELSE 0 END) 'oral_i_L1',
        SUM(CASE WHEN oral_i='2' THEN 1 ELSE 0 END) 'oral_i_L2',
        SUM(CASE WHEN oral_i='3' THEN 1 ELSE 0 END) 'oral_i_L3',
        SUM(CASE WHEN oral_i='4' THEN 1 ELSE 0 END) 'oral_i_L4',

        SUM(CASE WHEN oral_ii='1' THEN 1 ELSE 0 END) 'oral_ii_L1',
        SUM(CASE WHEN oral_ii='2' THEN 1 ELSE 0 END) 'oral_ii_L2',
        SUM(CASE WHEN oral_ii='3' THEN 1 ELSE 0 END) 'oral_ii_L3',
        SUM(CASE WHEN oral_ii='4' THEN 1 ELSE 0 END) 'oral_ii_L4',

        SUM(CASE WHEN oral_iii='1' THEN 1 ELSE 0 END) 'oral_iii_L1',
        SUM(CASE WHEN oral_iii='2' THEN 1 ELSE 0 END) 'oral_iii_L2',
        SUM(CASE WHEN oral_iii='3' THEN 1 ELSE 0 END) 'oral_iii_L3',
        SUM(CASE WHEN oral_iii='4' THEN 1 ELSE 0 END) 'oral_iii_L4', 

        SUM(CASE WHEN oral_iv='1' THEN 1 ELSE 0 END) 'oral_iv_L1',
        SUM(CASE WHEN oral_iv='2' THEN 1 ELSE 0 END) 'oral_iv_L2',
        SUM(CASE WHEN oral_iv='3' THEN 1 ELSE 0 END) 'oral_iv_L3',
        SUM(CASE WHEN oral_iv='4' THEN 1 ELSE 0 END) 'oral_iv_L4',  
		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	  

public function get_Class2ndYearEndNoPreSchooling_data_by_id_reading($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	   SUM(CASE WHEN reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',


        SUM(CASE WHEN reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',

        
        SUM(CASE WHEN reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',

		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	  	
public function get_Class2ndYearEndNoPreSchooling_data_writing($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	  	SUM(CASE WHEN writing_i='1' THEN 1 ELSE 0 END) 'writing_i_L1',
        SUM(CASE WHEN writing_i='2' THEN 1 ELSE 0 END) 'writing_i_L2',
        SUM(CASE WHEN writing_i='3' THEN 1 ELSE 0 END) 'writing_i_L3',
        SUM(CASE WHEN writing_i='4' THEN 1 ELSE 0 END) 'writing_i_L4',
        
        SUM(CASE WHEN writing_ii='1' THEN 1 ELSE 0 END) 'writing_ii_L1',
        SUM(CASE WHEN writing_ii='2' THEN 1 ELSE 0 END) 'writing_ii_L2',
        SUM(CASE WHEN writing_ii='3' THEN 1 ELSE 0 END) 'writing_ii_L3',
        SUM(CASE WHEN writing_ii='4' THEN 1 ELSE 0 END) 'writing_ii_L4',

		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	
public function get_Class2ndYearEndNoPreSchooling_data_Numeracy($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	  	 SUM(CASE WHEN numeracy_i='1' THEN 1 ELSE 0 END) 'numeracy_i_L1',
		SUM(CASE WHEN numeracy_i='2' THEN 1 ELSE 0 END) 'numeracy_i_L2',
		SUM(CASE WHEN numeracy_i='3' THEN 1 ELSE 0 END) 'numeracy_i_L3',
		SUM(CASE WHEN numeracy_i='4' THEN 1 ELSE 0 END) 'numeracy_i_L4',

		SUM(CASE WHEN numeracy_ii='1' THEN 1 ELSE 0 END) 'numeracy_ii_L1',
		SUM(CASE WHEN numeracy_ii='2' THEN 1 ELSE 0 END) 'numeracy_ii_L2',
		SUM(CASE WHEN numeracy_ii='3' THEN 1 ELSE 0 END) 'numeracy_ii_L3',
		SUM(CASE WHEN numeracy_ii='4' THEN 1 ELSE 0 END) 'numeracy_ii_L4',
		
		SUM(CASE WHEN numeracy_iii='1' THEN 1 ELSE 0 END) 'numeracy_iii_L1',
		SUM(CASE WHEN numeracy_iii='2' THEN 1 ELSE 0 END) 'numeracy_iii_L2',
		SUM(CASE WHEN numeracy_iii='3' THEN 1 ELSE 0 END) 'numeracy_iii_L3',
		SUM(CASE WHEN numeracy_iii='4' THEN 1 ELSE 0 END) 'numeracy_iii_L4',
		
		SUM(CASE WHEN numeracy_iv='1' THEN 1 ELSE 0 END) 'numeracy_iv_L1',
		SUM(CASE WHEN numeracy_iv='2' THEN 1 ELSE 0 END) 'numeracy_iv_L2',
		SUM(CASE WHEN numeracy_iv='3' THEN 1 ELSE 0 END) 'numeracy_iv_L3',
		SUM(CASE WHEN numeracy_iv='4' THEN 1 ELSE 0 END) 'numeracy_iv_L4',
		
		SUM(CASE WHEN numeracy_v='1' THEN 1 ELSE 0 END) 'numeracy_v_L1',
		SUM(CASE WHEN numeracy_v='2' THEN 1 ELSE 0 END) 'numeracy_v_L2',
		SUM(CASE WHEN numeracy_v='3' THEN 1 ELSE 0 END) 'numeracy_v_L3',
		SUM(CASE WHEN numeracy_v='4' THEN 1 ELSE 0 END) 'numeracy_v_L4',
		
		SUM(CASE WHEN numeracy_vi='1' THEN 1 ELSE 0 END) 'numeracy_vi_L1',
		SUM(CASE WHEN numeracy_vi='2' THEN 1 ELSE 0 END) 'numeracy_vi_L2',
		SUM(CASE WHEN numeracy_vi='3' THEN 1 ELSE 0 END) 'numeracy_vi_L3',
		SUM(CASE WHEN numeracy_vi='4' THEN 1 ELSE 0 END) 'numeracy_vi_L4',

		
		
		   COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	
public function get_Class2ndYearEndNoPreSchooling_data_oral($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	  	SUM(CASE WHEN oral_i='1' THEN 1 ELSE 0 END) 'oral_i_L1',
        SUM(CASE WHEN oral_i='2' THEN 1 ELSE 0 END) 'oral_i_L2',
        SUM(CASE WHEN oral_i='3' THEN 1 ELSE 0 END) 'oral_i_L3',
        SUM(CASE WHEN oral_i='4' THEN 1 ELSE 0 END) 'oral_i_L4',

        SUM(CASE WHEN oral_ii='1' THEN 1 ELSE 0 END) 'oral_ii_L1',
        SUM(CASE WHEN oral_ii='2' THEN 1 ELSE 0 END) 'oral_ii_L2',
        SUM(CASE WHEN oral_ii='3' THEN 1 ELSE 0 END) 'oral_ii_L3',
        SUM(CASE WHEN oral_ii='4' THEN 1 ELSE 0 END) 'oral_ii_L4',

        SUM(CASE WHEN oral_iii='1' THEN 1 ELSE 0 END) 'oral_iii_L1',
        SUM(CASE WHEN oral_iii='2' THEN 1 ELSE 0 END) 'oral_iii_L2',
        SUM(CASE WHEN oral_iii='3' THEN 1 ELSE 0 END) 'oral_iii_L3',
        SUM(CASE WHEN oral_iii='4' THEN 1 ELSE 0 END) 'oral_iii_L4', 

        SUM(CASE WHEN oral_iv='1' THEN 1 ELSE 0 END) 'oral_iv_L1',
        SUM(CASE WHEN oral_iv='2' THEN 1 ELSE 0 END) 'oral_iv_L2',
        SUM(CASE WHEN oral_iv='3' THEN 1 ELSE 0 END) 'oral_iv_L3',
        SUM(CASE WHEN oral_iv='4' THEN 1 ELSE 0 END) 'oral_iv_L4', 
		
		 COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }		
public function get_Class2ndYearEndNoPreSchooling_data_oralreading($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	SUM(CASE WHEN reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',


        SUM(CASE WHEN reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',

        
        SUM(CASE WHEN reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',

		
		 COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	
public function get_Class2ndYearEndNoPreSchooling_data_writingdata($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	    SUM(CASE WHEN writing_i='1' THEN 1 ELSE 0 END) 'writing_i_L1',
        SUM(CASE WHEN writing_i='2' THEN 1 ELSE 0 END) 'writing_i_L2',
        SUM(CASE WHEN writing_i='3' THEN 1 ELSE 0 END) 'writing_i_L3',
        SUM(CASE WHEN writing_i='4' THEN 1 ELSE 0 END) 'writing_i_L4',
        
        SUM(CASE WHEN writing_ii='1' THEN 1 ELSE 0 END) 'writing_ii_L1',
        SUM(CASE WHEN writing_ii='2' THEN 1 ELSE 0 END) 'writing_ii_L2',
        SUM(CASE WHEN writing_ii='3' THEN 1 ELSE 0 END) 'writing_ii_L3',
        SUM(CASE WHEN writing_ii='4' THEN 1 ELSE 0 END) 'writing_ii_L4',

		
		 COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
         //echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	
 public function get_Class2ndYearEndNoPreSchooling_dataoral($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	SUM(CASE WHEN oral_i='1' THEN 1 ELSE 0 END) 'oral_i_L1',
        SUM(CASE WHEN oral_i='2' THEN 1 ELSE 0 END) 'oral_i_L2',
        SUM(CASE WHEN oral_i='3' THEN 1 ELSE 0 END) 'oral_i_L3',
        SUM(CASE WHEN oral_i='4' THEN 1 ELSE 0 END) 'oral_i_L4',

        SUM(CASE WHEN oral_ii='1' THEN 1 ELSE 0 END) 'oral_ii_L1',
        SUM(CASE WHEN oral_ii='2' THEN 1 ELSE 0 END) 'oral_ii_L2',
        SUM(CASE WHEN oral_ii='3' THEN 1 ELSE 0 END) 'oral_ii_L3',
        SUM(CASE WHEN oral_ii='4' THEN 1 ELSE 0 END) 'oral_ii_L4',

        SUM(CASE WHEN oral_iii='1' THEN 1 ELSE 0 END) 'oral_iii_L1',
        SUM(CASE WHEN oral_iii='2' THEN 1 ELSE 0 END) 'oral_iii_L2',
        SUM(CASE WHEN oral_iii='3' THEN 1 ELSE 0 END) 'oral_iii_L3',
        SUM(CASE WHEN oral_iii='4' THEN 1 ELSE 0 END) 'oral_iii_L4', 

        SUM(CASE WHEN oral_iv='1' THEN 1 ELSE 0 END) 'oral_iv_L1',
        SUM(CASE WHEN oral_iv='2' THEN 1 ELSE 0 END) 'oral_iv_L2',
        SUM(CASE WHEN oral_iv='3' THEN 1 ELSE 0 END) 'oral_iv_L3',
        SUM(CASE WHEN oral_iv='4' THEN 1 ELSE 0 END) 'oral_iv_L4', 

		
		 COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }	
public function get_Class2ndYearEndNoPreSchooling_reading($id,$kv_id,$Class_ID) {
        $table='ci_students_class_2nd_rubrics';
        $tableClass2nd='ci_students_backup_20june2022';
        if($id!='001'){
            if($kv_id!=null || $kv_id!='')
            {
                $where= "WHERE `region_id` = ".$id." and `kv_id` = ".$kv_id." AND `years_of_pre-schooling`='NIL' and `is_deleted` = '0' ORDER BY `id` ASC";
            }else{
            //$where= "WHERE `region_id` = ".$id."  and `is_deleted` = '0' ORDER BY `id` ASC";
            $where= "WHERE `region_id` = ".$id." AND `years_of_pre-schooling`!='NIL' AND `is_deleted` = '0' ";
            }
            
        }else
        {
            $where= "WHERE `years_of_pre-schooling`='NIL' AND $table.`is_deleted` = '0' ORDER BY $table.`id` ASC";
        } 
		$sqlQuery="SELECT 
	     SUM(CASE WHEN reading_i='1' THEN 1 ELSE 0 END) 'reading_i_L1',
        SUM(CASE WHEN reading_i='2' THEN 1 ELSE 0 END) 'reading_i_L2',
        SUM(CASE WHEN reading_i='3' THEN 1 ELSE 0 END) 'reading_i_L3',
         SUM(CASE WHEN reading_i='4' THEN 1 ELSE 0 END) 'reading_i_L4',

        SUM(CASE WHEN reading_ii='1' THEN 1 ELSE 0 END) 'reading_ii_L1',
        SUM(CASE WHEN reading_ii='2' THEN 1 ELSE 0 END) 'reading_ii_L2',
        SUM(CASE WHEN reading_ii='3' THEN 1 ELSE 0 END) 'reading_ii_L3',
        SUM(CASE WHEN reading_ii='4' THEN 1 ELSE 0 END) 'reading_ii_L4',
        
        SUM(CASE WHEN reading_iii='1' THEN 1 ELSE 0 END) 'reading_iii_L1',
        SUM(CASE WHEN reading_iii='2' THEN 1 ELSE 0 END) 'reading_iii_L2',
        SUM(CASE WHEN reading_iii='3' THEN 1 ELSE 0 END) 'reading_iii_L3',
        SUM(CASE WHEN reading_iii='4' THEN 1 ELSE 0 END) 'reading_iii_L4',
		
		 COUNT($table.id) AS Total FROM $table INNER JOIN $tableClass2nd
        ON $tableClass2nd.id = $table.student_id ".$where; 
        $query = $this->db->query($sqlQuery); 
        // echo $this->db->last_query(); die;
        if(!empty($query)){
            if($query->num_rows() > 0) {         
                return $query->row();
            } else {
                return array();
            }
        }else{
            return array();
        }  
		
		  }			  
}

?>