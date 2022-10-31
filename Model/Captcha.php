<?php
namespace Phppot;

class Captcha
{

    function getCaptchaCode()
    {
        //$random_alpha =rand(ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789);

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $captcha_code = substr(str_shuffle($permitted_chars), 0, 6);

    
        //$captcha_code = substr($random_alpha, 0, 8);
        return $captcha_code;
    }



 
// $permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  
// function getCaptchaCode($input, $strength = 8) {
//     $input_length = strlen($input);
//     $captcha_code = '';
//     for($i = 0; $i < $strength; $i++) {
//         $random_character = $input[mt_rand(0, $input_length - 1)];
//         $captcha_code .= $random_character;
//     }
  
//     return $captcha_code;
// }
 
// $string_length = 8;
// $captcha_string = generate_string($permitted_chars, $string_length);
 
 



    
    function setSession($key, $value) {
        $_SESSION["$key"] = $value;
    }
    
    function getSession($key) {
        @session_start();
        $value = "";
        if(!empty($key) && !empty($_SESSION["$key"]))
        {            
            $value = $_SESSION["$key"];
        }
        return $value;
    }

    function createCaptchaImage($captcha_code)
    {
        $target_layer = imagecreatetruecolor(72,28);
        $captcha_background = imagecolorallocate($target_layer, 204, 204, 204);
        imagefill($target_layer,0,0,$captcha_background);
        $captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
        imagestring($target_layer, 5, 10, 5, $captcha_code, $captcha_text_color);
        
        return $target_layer;
    }

    function renderCaptchaImage($imageData)
    {
        header("Content-type: image/jpeg");
        imagejpeg($imageData);
    }
    
    function validateCaptcha($formData) {
        $isValid = false;
        $capchaSessionData = $this-> getSession("captcha_code");
        
        if($capchaSessionData == $formData) 
        {
            $isValid = true;
        }
        return $isValid;
    }
}