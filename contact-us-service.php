<?php 
session_start();
  if(isset($_POST['submit'])){
 


if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){



if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){       
      
            
            echo ("<script type='text/javascript'>

history.back(alert('Captcha Validation failed from server side!'));
</script>");




    exit;

  }else{



    // $to = "gaurav@sda-zone.com"; // this is your Email address
    $to = "info@fbcelebrations.com"; // this is client email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $mobileNo= $_POST['mobile'];

     $msg= $_POST['msg'];
   
    $subject = 'Enquiry from FB Celebrations Website';
    $subject2 = 'Thanks for Enquiry at FB Celebrations ';
    
    $message = "Name : ".$name . "\nMobile No : " . $mobileNo. "\nEmail : " . $from. "\nMessage : " ."".$msg. "\n\n" ;
    
    $message2 = "Hello " . $name . "\n\n Thank you for contacting us. We have got your query, We will get back to you on this soon..\n\n  ";

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $ok = mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); 
    
    if($ok){
    
     header('location: thank-you.html');                       
  } else{

    echo "not sent..";


  }

  


}
}else{


    echo ("<script type='text/javascript'>
 history.back(alert('Captcha Validation failed from server side!'))
</script>");
}
}
?>
