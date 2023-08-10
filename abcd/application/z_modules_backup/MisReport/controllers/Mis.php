<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mis extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mis_model');
    }
    
    public function ConsolidatedUnitData(){
        //Head Quarter Positioning Data
        $UnitList = $this->mis_model->AllUnitList();
        $UnitData = $this->mis_model->ConsoleUnitData();
        //show($UnitData);
        $UnitMaster=array();
        
        foreach($UnitList as $K=>$V){
            //show($V->code);
            $POST=0; $IN_POST=0; $TOTAL=0; $VERIFY=0; $NON_VERIFY=0;
            foreach($UnitData as $X=>$Y){
                if($Y->RO_CODE==$V->UNIT_CODE){
                    $POST   =$POST+$Y->POST;
                    $IN_POST=$IN_POST+$Y->IN_POST;
                    $TOTAL  =$TOTAL+$Y->TOTAL;
                    $VERIFY =$VERIFY+$Y->VERIFY;
                    $NON_VERIFY=$NON_VERIFY+$Y->NON_VERIFY;
                }
                $UN=$V->UNIT;
                $UC=$V->UNIT_CODE;
            }
            $CalUnit=array("UNIT"=>$UN,"CODE"=>$UC,"SAN_POST"=>$POST,"IN_POST"=>$IN_POST,"TOTAL"=>$TOTAL,"VERIFY"=>$VERIFY,"NON_VERIFY"=>$NON_VERIFY);
            array_push($UnitMaster,$CalUnit);
            
        }
        //show($UnitMaster);
        $FirstElement = array_shift($UnitMaster);
        $UnitMaster[count($UnitMaster) + 1] = $FirstElement;
        //show($UnitMaster);
        $view_data['RUD']=$UnitMaster; // Registered Unit Wise Data
        //==============================================//
        $view = 'ConsolidatedUnitData';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
    public function DetailedUnitData(){
        
        echo 'DetailedUnitData';
        
    }
    public function ConsolidatedUnitPost(){
        //Head Quarter Positioning Data
        $UnitPost = $this->mis_model->ConsoleUnitPost();
        $view_data['DES']=$UnitPost; // Registered Unit Wise Data
        //show($view_data['DES']);
        //==============================================//
        $view = 'ConsolidatedAllPost';
        $data = array(
            'title' => WEBSITE_TITLE . ' - Consolidated Post Report',
            'javascripts' => array(),
            'style_sheets' => array(),
            'content' => $this->load->view($view, ( isset($view_data) ) ? $view_data : '', TRUE)
        );
        $this->load->view($this->template, $data);
        
    }
}
