<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailerLib
{
    public function __construct(){
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load(){
        // Include PHPMailer library files
        require_once APPPATH.'assets/PHPMailer/Exception.php';
        require_once APPPATH.'assets/PHPMailer/PHPMailer.php';
        require_once APPPATH.'assets/PHPMailer/SMTP.php';
        
        $mail = new PHPMailer;
        return $mail;
    }
    public function pushMail($Sub,$Msg,$To){
        
        // PHPMailer object
       		$mail = $this->load();
		//$mail->SMTPDebug = 2; 
        	$mail->isSMTP();        
		$mail->Host = "relay.nic.in";
		$mail->SMTPAuth = false;                      
		$mail->Port = 25;                    
		$mail->From = "noreply-kvspis@gov.in";
		$mail->FromName = "KVS-PIMS";
		$mail->addAddress($To);
		$mail->isHTML(true);
		$mail->Subject = $Sub;
		$mail->Body = $Msg;
		$mail->send();
/*
		if(!$mail->send())
		{
		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		echo "Message has been sent successfully";
		}
*/
    }
    public function pushMailAttach($Sub,$Msg,$To,$filename){
        
        // PHPMailer object
       		$mail = $this->load();
		//$mail->SMTPDebug = 2; 
        	$mail->isSMTP();        
		$mail->Host = "relay.nic.in";
		$mail->SMTPAuth = false;                      
		$mail->Port = 25;                    
		$mail->From = "noreply-kvspis@gov.in";
		$mail->FromName = "KVS-PIMS";
		$mail->addAddress($To);
		// $mail->AddCC('jctraining.kvs@gmail.com');
                $mail->addBCC('kvspims@gmail.com');
		$mail->isHTML(true);
		$mail->Subject = $Sub;
		$mail->Body = $Msg;
                $mail->AddAttachment('./Excel/'.$filename);
		$mail->send();
/*
		if(!$mail->send())
		{
		echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
		echo "Message has been sent successfully";
		}
*/
    }
}
