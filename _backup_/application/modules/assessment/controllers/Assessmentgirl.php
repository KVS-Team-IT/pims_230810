<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Assessmentgirl extends MY_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('assessmentgirl_model');
        }
		
		public function final_report($id=null,$kv_id=null){  
			 
		  if (!empty($id) && !is_numeric($id)) {
				redirect('assessment/all');
			}
			if($id!='001'){
				if (!is_null($id) && !$this->assessmentgirl_model->report_is_exists($id)) {
					$this->session->set_flashdata('error', 'Report does not exists.');
					redirect('assessment/all');
				}
			}

        if (isset($id) && !empty($id)) {  
			$view_data['firstSec'] = $this->assessmentgirl_model->get_firstStep_data_by_id($id,$kv_id);			
            $view_data['EntryData'] = $this->assessmentgirl_model->get_page2A_data_by_id($id,$kv_id); // Entry Level
            $view_data['FinalOral'] = $this->assessmentgirl_model->get_FinalOral_data_by_id($id,$kv_id);
			$view_data['FinalReading'] = $this->assessmentgirl_model->get_FinalReading_data_by_id($id,$kv_id);
			$view_data['FinalWriting'] = $this->assessmentgirl_model->get_FinalWriting_data_by_id($id,$kv_id);
			$view_data['FinalNumeracy'] = $this->assessmentgirl_model->get_FinalNumeracy_data_by_id($id,$kv_id);
			$view_data['FinalHindi'] = $this->assessmentgirl_model->get_FinalHindi_data_by_id($id,$kv_id);
			 $view_data['FinalNonSchl'] = $this->assessmentgirl_model->get_FinalNonSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonNumSchl'] = $this->assessmentgirl_model->get_FinalNonNumSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiNonSchooling_data_by_id($id,$kv_id);
			$view_data['FinalPreSchl'] = $this->assessmentgirl_model->get_FinalPreSchooling_data_by_id($id,$kv_id);
			$view_data['FinalPreNumSchl'] = $this->assessmentgirl_model->get_FinalPreNumSchooling_data_by_id($id,$kv_id);
			 $view_data['FinalPreHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiPreSchooling_data_by_id($id,$kv_id);
			$view_data['FinalParentSchl'] = $this->assessmentgirl_model->get_FinalParent_data_by_id($id,$kv_id);
			$view_data['FinalParentNumSchl'] = $this->assessmentgirl_model->get_FinalParentSchooling_data_by_id($id,$kv_id);
			$view_data['FinalParentHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiParent_data_by_id($id,$kv_id);
			$view_data['FinalNonEduSchl'] = $this->assessmentgirl_model->get_FinalNonEdu_data_by_id($id,$kv_id);
			$view_data['FinalNonEduNumSchl'] = $this->assessmentgirl_model->get_FinalNonEduSchooling_data_by_id($id,$kv_id);
			$view_data['FinalNonEduHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiNonEdu_data_by_id($id,$kv_id);
			$view_data['FinalDisSchl'] = $this->assessmentgirl_model->get_FinalDis_data_by_id($id,$kv_id);
			$view_data['FinalDisNumSchl'] = $this->assessmentgirl_model->get_FinalDisSchooling_data_by_id($id,$kv_id);
			$view_data['FinalDisHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiDis_data_by_id($id);
            
            $view_data['FinalRTESchl'] = $this->assessmentgirl_model->get_FinalRTE_data_by_id($id,$kv_id);
			$view_data['FinalRTENumSchl'] = $this->assessmentgirl_model->get_FinalRTESchooling_data_by_id($id,$kv_id);
			$view_data['FinalRTEHindiSchl'] = $this->assessmentgirl_model->get_FinalHindiRTE_data_by_id($id);
			
            $view_data['EntryHindi'] = $this->assessmentgirl_model->get_hindi2A_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryDataPre'] = $this->assessmentgirl_model->get_EntryPre_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryPreHindi'] = $this->assessmentgirl_model->get_EntryPreHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataNoPre'] = $this->assessmentgirl_model->get_EntryNoPre_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryNoPreHindi'] = $this->assessmentgirl_model->get_EntryNoPreHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataEdu'] = $this->assessmentgirl_model->get_EntryEdu_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryEduHindi'] = $this->assessmentgirl_model->get_EntryEduHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDataNoEdu'] = $this->assessmentgirl_model->get_EntryNoEdu_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryNoEduHindi'] = $this->assessmentgirl_model->get_EntryNoEduHindi_data_by_id($id,$kv_id); // Entry Level
			$view_data['EntryDisData'] = $this->assessmentgirl_model->get_EntryDis_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryDisHindi'] = $this->assessmentgirl_model->get_EntryDisHindi_data_by_id($id,$kv_id); // Entry Level
			
            $view_data['EntryRTEData'] = $this->assessmentgirl_model->get_EntryRTE_data_by_id($id,$kv_id); // Entry Level
            $view_data['EntryRTEHindi'] = $this->assessmentgirl_model->get_EntryRTEHindi_data_by_id($id,$kv_id); // Entry Level 			
        }    
		 $view = 'final_report_girl';  
        $data = array(
            'title' => WEBSITE_TITLE . ' - Year End Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);  
    }
    
        
}
