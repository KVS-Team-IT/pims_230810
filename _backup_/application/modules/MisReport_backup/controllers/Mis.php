<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mis extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mis_model');
    }
    public function ConsolidatedUnitData(){
        
        $HQPOS = $this->mis_model->UnitDataHqPos();
        $HQ=array();
        foreach($HQPOS AS $HP){
            $HQVFY = $this->mis_model->UnitDataVfy($HP->ID);
            $HQV=array_merge((array)$HP, (array)$HQVFY); 
            array_push($HQ,$HQV);
        }//show($HQ);
        $OnlyROPOS = $this->mis_model->UnitDataRoPos();
        $ROPOS=array();
        foreach($OnlyROPOS AS $RP){
            $ROKV=$this->mis_model->UnitDataKvPos($RP->ID);
            $RP->SAN = $RP->SAN+$ROKV->SAN;
            $RP->POS = $RP->POS+$ROKV->POS;
            $RP->VAC = $RP->VAC+$ROKV->VAC;
            array_push($ROPOS,$RP);
        }
        $RO=array();
        foreach($ROPOS AS $RV) {
            $KVVFY = $this->mis_model->UnitDataVfy($RV->ID);
            $KV=array_merge( (array) $RV, (array) $KVVFY);
            array_push($RO,$KV);
        }//show($RO);
        $ZTPOS = $this->mis_model->UnitDataZtPos();
        $ZT=array();
        foreach($ZTPOS AS $ZP){
            $ZTVFY = $this->mis_model->UnitDataVfy($ZP->ID);
            $ZTV=array_merge( (array) $ZP, (array) $ZTVFY);
            array_push($ZT,$ZTV);
        }//show($ZT);
        $RZ=array_merge($RO,$ZT);
        //$view_data['MAS']= array_merge($RZ,$HQ);
        //show($view_data['MAS']);
        //==============================================//
	$MAS= array_merge($RZ,$HQ);
	$TOT_SAN=0;
        $TOT_POS=0;
        $TOT_VAC=0;
        $TOT_VFY=0;
        foreach($MAS AS $M){
        
        $TOT_SAN=$TOT_SAN+$M['SAN'];
        $TOT_POS=$TOT_POS+$M['POS'];
        $TOT_VAC=$TOT_VAC+$M['VAC'];
        $TOT_VFY=$TOT_VFY+$M['VFY'];
        }
        $N= count($MAS)+1;
        $TARY[$N]=array('ID'=>0,'NAME'=>'SUM TOTAL','CODE'=>'-','SAN'=>$TOT_SAN,'POS'=>$TOT_POS,'VAC'=>$TOT_VAC,'VFY'=>$TOT_VFY);
        $TMAS= array_merge($MAS,$TARY);
        //show($TMAS);
        $view_data['MAS']=$TMAS;
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
}
