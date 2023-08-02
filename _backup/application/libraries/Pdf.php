<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  //    require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';  
  require_once APPPATH."/assets/tcpdf/tcpdf.php";
  //require_once APPPATH."/assets/Classes/PHPExcel/IOFactory.php";
  //require_once APPPATH."/assets/Classes/ExcelReader.php";
 class Pdf extends TCPDF{
       public function __construct() {
       parent::__construct();
   }
 }