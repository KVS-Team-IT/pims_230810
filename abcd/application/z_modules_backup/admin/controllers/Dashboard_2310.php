<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');
    class Dashboard extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('dashboard_model');
        //$this->load->model('employee_model');

    }
    //=============================== DASHBOARD QUERY MASTER =================================//
    public function index($RoId=null, $AuthId=null, $MasCode=null, $RegZtId=null, $KvCode=null){
        //Check Request Role
        if($RoId==null){
            $AuthRole= $this->role_id;
        } else {
            $AuthRole=$RoId;
        }
        //Check Request Id
        if($AuthId==null){
            $AuthUserId= $this->auth_user_id;
        } else {
            $AuthUserId=$AuthId;
        }
        //Check Master Code
        if($MasCode==null){
            $MasterCode= $this->master_code;
        } else {
            $MasterCode=$MasCode;
        }
        //Check Region/Ziet Id
        if($RegZtId==null){
            $RegionZietId= $this->region_id;
        } else {
            $RegionZietId=$RegZtId;
        }
        //Check School Code
        if($KvCode==null){
            $KvId= $this->school_id;
        } else {
            $KvId=$KvCode;
        }
        //=========================== WEB ADMINISTRATOR DASHBOARD  =============================//
        if($AuthRole=='1'){
            $view = 'dashboard/index'; // 
            $ADM_DATA['VM'] = $this->dashboard_model->VacancyMasterADM();// Vacancy Master
            $ADM_DATA['IP'] = $this->dashboard_model->TotalInPosADM();   // IN Position (PRESENT POST DETAILS)
            $ADM_DATA['TR'] = $this->dashboard_model->TotalTransADM();   // Transfer (IN PROCESS / COMPLETED)
            $ADM_DATA['CIP']= $this->dashboard_model->ChartInPosADM();   // Transfer (IN PROCESS / COMPLETED)
            $SacZT= $this->dashboard_model->ChartSacZT();
            $SacHQ= $this->dashboard_model->ChartSacHQ();
            foreach($SacHQ as $Hq){
                array_push($SacZT,$Hq);
            }
            $SacRO= $this->dashboard_model->ChartSacRO();
            foreach($SacRO as $Ro){
                array_push($SacZT,$Ro);
            }
            
            $ADM_DATA['CVC']=$SacZT;
            //show($ADM_DATA['CVC']);
            $data = array(
            'title' => WEBSITE_TITLE . ' - Dashboard',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($ADM_DATA) ) ? $ADM_DATA : '', TRUE)
        );
        
            $this->load->view($this->template, $data);
        }
        //============================ ADMIN DASHBOARD END ==============================//
        //
        //============================ HEAD QUARTER DASHBOARD START ============================//
        if($AuthRole=='2'){
            //show($this->session->userdata());
            //show($this->auth_user_id);
            $view = 'dashboard/hq-index'; // 
            $HQ_DATA['HQ']  = $this->dashboard_model->getHQDetails($AuthUserId);   // HQ DETAILS
            $HQ_DATA['VM']  = $this->dashboard_model->VacancyMasterHQ($MasterCode);// VACANCY MASTER HQ
            $HQ_DATA['IP']  = $this->dashboard_model->TotalInPosHQ($AuthUserId);   // INPOSITION/CONTRACTUAL HQ
            $HQ_DATA['TR']  = $this->dashboard_model->TotalTransHQ($MasterCode);   // TRANSFER DATA HQ
            $HQ_DATA['CIP'] = $this->dashboard_model->CIInPosHQ($MasterCode);      // CHART- I IN POSITION
            $HQ_DATA['CVC'] = $this->dashboard_model->CIISacHQ($MasterCode);       // CHART- II VACANCY MASTER
                       
            $data = array(
            'title' => WEBSITE_TITLE . ' - Dashboard',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($HQ_DATA) ) ? $HQ_DATA : '', TRUE)
        );
        
            $this->load->view($this->template, $data);
        }
        //==========================  HEAD QUARTER DASHBOARD END ============================//
        //
        //========================== REGIONAL OFFICE DASHBOARD START ============================//
        if($AuthRole=='3'){
            $view = 'dashboard/ro-index'; // 
            $RO_DATA['RO']= $this->dashboard_model->getRoDetails($AuthUserId,$RegionZietId);
            $RoKvVac= $this->dashboard_model->VacancyMasterROKV($RegionZietId);// Vacancy Master Kv Belongs to RO
            $RoVac  = $this->dashboard_model->VacancyMasterRO($RegionZietId);// Vacancy Master RO
            $RO_DATA['VM']=array();
            foreach($RoKvVac as $Key=>$Val){
                $RO_DATA['VM'][$Key]=$Val+$RoVac->$Key;
            }
            $RO_DATA['VM']=(object) $RO_DATA['VM'];
            
            $RoKvPP=$this->dashboard_model->TotalInPosROKV($RegionZietId);   // IN Position Kv Belongs to RO
            $RoPP=$this->dashboard_model->TotalInPosRO($RegionZietId);   // IN Position RO
            $RO_DATA['IP']=array();
            foreach($RoKvPP as $Key=>$Val){
                $RO_DATA['IP'][$Key]=$Val+$RoPP->$Key;
            }
            $RO_DATA['IP']=(object) $RO_DATA['IP'];
            
            $RoKvTR = $this->dashboard_model->TotalTransROKV($RegionZietId);   // Transfer Kv Belongs to RO
            $RoTR   = $this->dashboard_model->TotalTransRO($RegionZietId);   // Transfer RO
            $RO_DATA['TR']=array();
            foreach($RoKvTR as $Key=>$Val){
                $RO_DATA['TR'][$Key]=$Val+$RoTR->$Key;
            }
            $RO_DATA['TR']=(object) $RO_DATA['TR'];
            
            
            $RoKvCI= $this->dashboard_model->ChartInPosROKV($RegionZietId);   // InPos KV/RO
            $RoCI= $this->dashboard_model->ChartInPosRO($RegionZietId);   // InPos RO
            foreach($RoCI as $Ro){
                array_push($RoKvCI,$Ro);
            }
            $RO_DATA['CIP']=$RoKvCI;
           
            $RoKvCII= $this->dashboard_model->CIISacROKV($RegionZietId); 
            $RoCII= $this->dashboard_model->CIISacRO($RegionZietId); 
            foreach($RoCII as $Ro){
                array_push($RoKvCII,$Ro);
            }
            $RO_DATA['CVC']=$RoKvCII;
            
            $data = array(
            'title' => WEBSITE_TITLE . ' - Dashboard',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($RO_DATA) ) ? $RO_DATA : '', TRUE)
        );
        
            $this->load->view($this->template, $data);
        }
        //==========================  REGIONAL OFFICE DASHBOARD END ============================//
        //
        //========================== ZIET DASHBOARD START ============================//
        if($AuthRole=='4'){
            //show($this->session->userdata());
            $view = 'dashboard/zt-index'; // 
            $ZT_DATA['ZT']  = $this->dashboard_model->getZTDetails($MasterCode);   // KV DETAILS
            $ZT_DATA['VM']  = $this->dashboard_model->VacancyMasterZT($MasterCode);// VACANCY MASTER KV
            $ZT_DATA['IP']  = $this->dashboard_model->TotalInPosZT($MasterCode);   // INPOSITION/CONTRACTUAL KV
            $ZT_DATA['TR']  = $this->dashboard_model->TotalTransZT($MasterCode);   // TRANSFER DATA KV
            $ZT_DATA['CIP'] = $this->dashboard_model->CIInPosZT($MasterCode);      // CHART- I IN POSITION
            $ZT_DATA['CVC'] = $this->dashboard_model->CIISacZT($MasterCode);       // CHART- II VACANCY MASTER
                       
            $data = array(
            'title' => WEBSITE_TITLE . ' - Dashboard',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($ZT_DATA) ) ? $ZT_DATA : '', TRUE)
        );
        
            $this->load->view($this->template, $data);
        }
        //==========================  ZIET DASHBOARD END ============================//
        //
        //========================== KENDRIYA VIDYALAYA DASHBOARD START ============================//
        if($AuthRole=='5'){
            $view = 'dashboard/kv-index'; // 
            $KV_DATA['KV']  = $this->dashboard_model->getKvDetails($KvId);   // KV DETAILS
            $KV_DATA['VM']  = $this->dashboard_model->VacancyMasterKV($KvId);// VACANCY MASTER KV
            $KV_DATA['IP']  = $this->dashboard_model->TotalInPosKV($KvId);   // INPOSITION/CONTRACTUAL KV
            $KV_DATA['TR']  = $this->dashboard_model->TotalTransKV($KvId);   // TRANSFER DATA KV
            $KV_DATA['CIP'] = $this->dashboard_model->CIInPosKV($KvId);      // CHART- I IN POSITION
            $KV_DATA['CVC'] = $this->dashboard_model->CIISacKV($KvId);       // CHART- II VACANCY MASTER
                       
            $data = array(
            'title' => WEBSITE_TITLE . ' - Dashboard',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view,(isset($KV_DATA) ) ? $KV_DATA : '', TRUE)
        );
        
            $this->load->view($this->template, $data);
        }
        //==========================  KENDRIYA VIDYALAYA DASHBOARD END ============================//
    }
   
    
    
    
    
    
    
    

}