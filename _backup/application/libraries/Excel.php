<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  require_once APPPATH."/assets/Classes/PHPExcel.php";
  require_once APPPATH."/assets/Classes/PHPExcel/IOFactory.php";
  require_once APPPATH."/assets/Classes/ExcelReader.php";
 class Excel extends PHPExcel {
       public function __construct() {
       parent::__construct();
   }
 }