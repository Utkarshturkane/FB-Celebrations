<?php  
session_start();
include_once('header.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){



if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){       
      
            
            echo ("<script type='text/javascript'>

history.back(alert('Captcha Validation failed from server side!'));
</script>");




    exit;

  }else{


     $to = "career@fbcelebrations.com";

     if(isset($_FILES['attachment'])){
     $path = 'resume/' . $_FILES["attachment"]["name"];
      move_uploaded_file($_FILES["attachment"]["tmp_name"], $path);

      $name=$_POST['fullname'];
      $email=$_POST['emailid'];
      $phone=$_POST['mobilenum'];
      $apply=$_POST['apply'];

      $subject="Career Application from Website";
      $subject1="Application for FB Celebrations";

       $message = "";

        $message .= "Name: ".$name."<br>";
        
        $message .= "Email: ".$email."<br>";
        $message .= "Phone No: ".$phone."<br>";
        $message .= "Applying For: ".$apply."<br>";
        




                        $mail = new PHPMailer;
                        $mail->AddReplyTo($to);
                        $mail->SetFrom($email, $name);
                
                        
                        
                        $mail->AddAddress($to);       
                        $mail->Subject    = $subject;       
                        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // 
                        $mail->MsgHTML($message);
                        $mail->AddAttachment($path);
                        $mail->Send();
                                                     
                       
                        $mail1 = new PHPMailer;           

                        $body1 = "Thank you for your interest! We will get in touch with you shortly.";
                
                        $mail1->AddReplyTo($to);
                        $mail1->SetFrom($to);
                
                        //$address1 = $email;
                        $mail1->AddAddress($email);       
                        $mail1->Subject    = $subject1;     
                        $mail1->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                        $mail1->MsgHTML($body1);

                        
        
        
        if($mail1->Send()){
          echo '<script language="JavaScript"> window.location.href ="thank-you.html" </script>';
          
          }else{
            echo "<script type='text/javascript'>alert('Error.......... Please fill the form again.')</script>";
            echo '<script language="JavaScript"> window.location.href ="careers.php" </script>';
            }
        
   
    }else{


    echo ("<script type='text/javascript'>
 history.back(alert('Invalid file formate!'))
</script>");
}

}

}else{


    echo ("<script type='text/javascript'>
 history.back(alert('Captcha Validation failed from server side!'))
</script>");
}
?>