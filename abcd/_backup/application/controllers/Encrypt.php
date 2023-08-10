<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encrypt extends CI_Controller {
    
    public function index(){


// Store a string into the variable which 
// need to be Encrypted 
$simple_string = "100060"; 

// Display the original string 
echo "Original String: " . $simple_string; 

// Store the cipher method 
$ciphering = "AES-128-CTR"; 

// Use OpenSSl Encryption method 
//$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 

// Non-NULL Initialization Vector for encryption 
$encryption_iv = 'iAasitKumarSahoo';

// Store the encryption key 
$encryption_key = "KendriyaVidyalayaSangathan"; 

// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($simple_string, $ciphering, 
			$encryption_key, $options, $encryption_iv); 

// Display the encrypted string 
echo "Encrypted String: " . $encryption . "\n"; 

// Non-NULL Initialization Vector for decryption 
$decryption_iv = 'iAasitKumarSahoo';

// Store the decryption key 
$decryption_key = "KendriyaVidyalayaSangathan"; 

// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($encryption, $ciphering, 
		$decryption_key, $options, $decryption_iv); 

// Display the decrypted string 
echo "Decrypted String: " . $decryption; 
echo '<br>';echo '<br>';
echo $PlainStr="Aasit007";
echo '<br>';
echo $EncryptStr=EncryptIt($PlainStr);
echo '<br>';
echo $Decryptstr= DecryptIt($EncryptStr);
    }
    public function index2(){
        //$key previously generated safely, ie: openssl_random_pseudo_bytes
$plaintext = "396174787115";
$key="AasitKumarSahoo";
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
echo $ciphertext."<br>";


//decrypt later....
$c = base64_decode($ciphertext);
$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
$iv = substr($c, 0, $ivlen);
$hmac = substr($c, $ivlen, $sha2len=32);
$ciphertext_raw = substr($c, $ivlen+$sha2len);
$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
{
    echo $original_plaintext."\n";
}
    }

}
