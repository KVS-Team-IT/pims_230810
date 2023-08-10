<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessmentboy extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('assessmentboy_model');
	}
	public function final_report($id = null, $kv_id = null)
	{

		if (!empty($id) && !is_numeric($id)) {
			redirect('assessment/all');
		}
		if ($id != '001') {
			if (!is_null($id) && !$this->assessmentboy_model->report_is_exists($id)) {
				$this->session->set_flashdata('error', 'Report does not exists.');
				redirect('assessment/all');
			}
		}

		if (isset($id) && !empty($id)) {
			$view_data['firstSec'] = $this->assessmentboy_model->get_firstStep_data_by_id($id, $kv_id);
			$view_data['EntryData'] = $this->assessmentboy_model->get_page2A_data_by_id($id, $kv_id); // Entry Level
			$view_data['FinalOral'] = $this->assessmentboy_model->get_FinalOral_data_by_id($id, $kv_id);
			$view_data['FinalReading'] = $this->assessmentboy_model->get_FinalReading_data_by_id($id, $kv_id);
			$view_data['FinalWriting'] = $this->assessmentboy_model->get_FinalWriting_data_by_id($id, $kv_id);
			$view_data['FinalNumeracy'] = $this->assessmentboy_model->get_FinalNumeracy_data_by_id($id, $kv_id);
			$view_data['FinalHindi'] = $this->assessmentboy_model->get_FinalHindi_data_by_id($id, $kv_id);
			$view_data['FinalNonSchl'] = $this->assessmentboy_model->get_FinalNonSchooling_data_by_id($id, $kv_id);
			$view_data['FinalNonNumSchl'] = $this->assessmentboy_model->get_FinalNonNumSchooling_data_by_id($id, $kv_id);
			$view_data['FinalNonHindiSchl'] = $this->assessmentboy_model->get_FinalHindiNonSchooling_data_by_id($id, $kv_id);
			$view_data['FinalPreSchl'] = $this->assessmentboy_model->get_FinalPreSchooling_data_by_id($id, $kv_id);
			$view_data['FinalPreNumSchl'] = $this->assessmentboy_model->get_FinalPreNumSchooling_data_by_id($id, $kv_id);
			$view_data['FinalPreHindiSchl'] = $this->assessmentboy_model->get_FinalHindiPreSchooling_data_by_id($id, $kv_id);
			$view_data['FinalParentSchl'] = $this->assessmentboy_model->get_FinalParent_data_by_id($id, $kv_id);
			$view_data['FinalParentNumSchl'] = $this->assessmentboy_model->get_FinalParentSchooling_data_by_id($id, $kv_id);
			$view_data['FinalParentHindiSchl'] = $this->assessmentboy_model->get_FinalHindiParent_data_by_id($id, $kv_id);
			$view_data['FinalNonEduSchl'] = $this->assessmentboy_model->get_FinalNonEdu_data_by_id($id, $kv_id);
			$view_data['FinalNonEduNumSchl'] = $this->assessmentboy_model->get_FinalNonEduSchooling_data_by_id($id, $kv_id);
			$view_data['FinalNonEduHindiSchl'] = $this->assessmentboy_model->get_FinalHindiNonEdu_data_by_id($id, $kv_id);
			$view_data['FinalDisSchl'] = $this->assessmentboy_model->get_FinalDis_data_by_id($id, $kv_id);
			$view_data['FinalDisNumSchl'] = $this->assessmentboy_model->get_FinalDisSchooling_data_by_id($id, $kv_id);
			$view_data['FinalDisHindiSchl'] = $this->assessmentboy_model->get_FinalHindiDis_data_by_id($id);

			$view_data['FinalRTESchl'] = $this->assessmentboy_model->get_FinalRTE_data_by_id($id, $kv_id);
			$view_data['FinalRTENumSchl'] = $this->assessmentboy_model->get_FinalRTESchooling_data_by_id($id, $kv_id);
			$view_data['FinalRTEHindiSchl'] = $this->assessmentboy_model->get_FinalHindiRTE_data_by_id($id);

			$view_data['EntryHindi'] = $this->assessmentboy_model->get_hindi2A_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDataPre'] = $this->assessmentboy_model->get_EntryPre_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryPreHindi'] = $this->assessmentboy_model->get_EntryPreHindi_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDataNoPre'] = $this->assessmentboy_model->get_EntryNoPre_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryNoPreHindi'] = $this->assessmentboy_model->get_EntryNoPreHindi_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDataEdu'] = $this->assessmentboy_model->get_EntryEdu_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryEduHindi'] = $this->assessmentboy_model->get_EntryEduHindi_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDataNoEdu'] = $this->assessmentboy_model->get_EntryNoEdu_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryNoEduHindi'] = $this->assessmentboy_model->get_EntryNoEduHindi_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDisData'] = $this->assessmentboy_model->get_EntryDis_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryDisHindi'] = $this->assessmentboy_model->get_EntryDisHindi_data_by_id($id, $kv_id); // Entry Level

			$view_data['EntryRTEData'] = $this->assessmentboy_model->get_EntryRTE_data_by_id($id, $kv_id); // Entry Level
			$view_data['EntryRTEHindi'] = $this->assessmentboy_model->get_EntryRTEHindi_data_by_id($id, $kv_id); // Entry Level 			
		}
		$view = 'final_report_boy';
		$data = array(
			'title' => WEBSITE_TITLE . ' - Year End Report',
			'javascripts' => array(),
			'style_sheets' => array(),
			'content' => $this->load->view($view, (isset($view_data)) ? $view_data : '', TRUE)
		);
		$this->load->view($this->template, $data);
	}
}
