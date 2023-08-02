<?php if( ! defined('BASEPATH') ) 
    exit('No direct script access allowed');

class PermissionDenied extends My_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
            
        echo '<div style="width:100%;text-align:center;padding:0px auto; margin-top:5%;">
                <div style="width: 75%;
                    margin: 0px auto;
                    border: 1px solid #E0E0E0;
                    padding: 50px;
                    //box-shadow: 0px 0px 100px #ff0000;">   
            <h2 style="color:red;">Permission Denied</h2>
            <p style="color:#ff1100;letter-spacing: 3px;">YOU  DO  NOT  HAVE  PERMISSION  TO  ACCESS  THIS  SECTION<p>
            <p>Please refer to your system administrator.</p>
            <button><a href="javascript:history.go(-1);">Go Back</a></button>
            <button><a href="'. base_url("dashboard").'">Go To Dashboard</a></button>
                </div>
            </div>';
    }
}