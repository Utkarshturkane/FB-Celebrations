<?php
session_start();
use Phppot\Captcha;
use Phppot\Contact;

require_once "Model/Captcha.php";
$captcha = new Captcha();
if (count($_POST) > 0) {
    $userCaptcha = filter_var($_POST["captcha_code"], FILTER_SANITIZE_STRING);
    $isValidCaptcha = $captcha->validateCaptcha($userCaptcha);
    if ($isValidCaptcha) {

       $userName = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
        $userEmail = filter_var($_POST["userEmail"], FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST["content"], FILTER_SANITIZE_STRING);


        
        require_once "contact-us-service.php";
        $contact = new Contact();
        $insertId = $contact->addToContacts($userName, $userEmail, $subject, $content);
        if (! empty($insertId)) {
            $success_message = "Your message received successfully";
        }
    } else {
        $error_message = "Incorrect Captcha Code";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
    integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/responsive.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



<!-- new code -->

    <!--Capacha CSS-->
    <link href="assets/css/style.css" type="text/css" rel="stylesheet" />

    <!-- Owl Stylesheets -->

    <style>
      ul.tabber {
    display: flex;
    list-style: none;
    padding: 0;
    font-size: 60px;
    gap: 60px;
    font-family: 'Natalie';
    cursor: pointer;
    width: 100%;
    justify-content: center;
    margin-top: 40px;
    margin-bottom: 40px;
}
.tabber li.active {
    color: #603135;
    border-bottom: 4px solid #603135;
    border-radius: 15px;
    position: relative;
}
.tabber li {
    color: #cba3a6;
}
.tabber li.active::after {
    content: "";
    display: block;
    position: absolute;
    left: 50%;
    bottom: 0;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    border-bottom: 10px solid #603135;
    transform: translateX(-50%);
}
    </style>

</head>

<body>
    <!--header start-->
    <header class="" id="stickyHeader">         
      <div class="container">
          <div class="row">
            <div class="col-md-4 socail-wrapp">
              <div class="socail_icon">
              <a class="btn btn-primary btn-sm btn-floating"  href="tel:+918779797334">
                <i class="fa fa-phone"></i>
              </a>
              <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://wa.me/918779797334">
                <i class="fa fa-whatsapp"></i>
              </a>
              <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://www.facebook.com/FBCelebrations/">
                <i class="fa fa-facebook-f"></i>
              </a>
              <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://www.instagram.com/fb.celebrations/">
                <i class="fa fa-instagram"></i>
              </a>
              </div>
            </div>

              <div class="col-md-4 logo-wrapp">
                <div class="logo">
                  <a href="index.html"><img src="./images/FBC.png"></a>
                </div>
              </div>
              <div class="col-md-4 toggler-wrapp">
                <div class="">                  
                  <div id="mySidepanel" class="sidepanel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                    <a href="about-us.html">About</a>
                    <a href="verticals.html">Verticals</a>
                    <a href="building-moment.html">Building Moments</a>
                    <a href="awards.html">Awards</a>
                    <a href="media.html">Media</a>
                    <a href="testimonials.html">Testimonials</a>
                    <a href="communicate.php">Communicate</a>
                    <a href="careers.php">Careers</a>          
                  </div>
                    <button class="openbtn" onclick="openNav()">Menu 
                      <span class="togg_icon brn-btn"><img src="./images/toggler_icon.png"></span>
                      <span class="togg_icon wht-btn"><img src="./images/togghover_icon.png"/></span>
                    </button>  
                </div>
              </div>
          </div>
      </div>      
    </header>
    <!--header End-->
    <section class="careerTop" style="padding-top: 60px; padding-bottom: 50px;">      
      <div class="container">
        <div class="careerWrapp">
        <ul class="tabber">
          <li data-tab="ConnectUs" class="active">Connect With Us</li>
          <li data-tab="JoinUs">Join Our Team</li>
        </ul>
        </div>
      </div>
  </section>

  <section class="contchat-sec">
    <div class="main_cont">
      <div class="contchat_box" id="ConnectUs" style="padding-top: 0px">
          <div class="chat_box" data-aos="fade-right">
              <div class="chat_cont">
                <h3 data-aos="zoom-in">let’s</h3>
                <h2 data-aos="zoom-in" style="margin-bottom: -50px">Chat</h2>
                <p>We would love to get to know more<br> and talk about your celebration.</p>               
              </div>
          </div>
          <div class="cont-form">
            <form action="contact-us-service.php" method="post">
              <div class="mb-3 mt-3">
                <div class="form-group">
                  <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control AlphaOnly" name="name"
                        id="fullname" autocomplete="off"
                        placeholder="" required>                    
                </div>
            </div>

            <div class="mb-3 mt-3">
              <div class="form-group">
                <label for="mobilenum" class="form-label">Mobile No.</label>
                  <input type="tel" class="form-control" maxlength="10"
                  minlength="10" name="mobile" id="mobilenum" placeholder="" onkeyup="numberOnly(this)" required>                    
              </div>
          </div>

          <div class="mb-3 mt-3">
            <div class="form-group">
              <label for="emailid" class="form-label">Email Id</label>
                <input type="email" class="form-control" name="email"
                    id="emailid" autocomplete="off"
                    placeholder="" required>                    
            </div>
        </div>

        <div class="mb-3 mt-3">
          <div class="form-group">
          <label for="" class="form-label">Message</label>
          <textarea class="form-control" id="" name="msg"></textarea>           
        </div>
      </div>

      <div class="mb-3 mt-3">
        <div class="form-group">
        <label for="capcode" class="form-label">Captcha Code:</label>
             <div class="captchablock">
               <div id="randomdiv">
                 <input id="sescapcode" type="hidden" value="00288934">
                 <a href='javascript: refreshCaptcha();' style="color: #603135; font-size: 13px;text-decoration: underline;">Refresh</a>
                   <img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>

                    <input id="capcode" class="form-control" type="text" name="captcha" required="">
                </div>
              </div>
              </div>
         </div>
          <div class="mb-3 mt-3 submbtn">
              <div class="form-group">
                <button type="submit" name="submit" class="btn">Submit</button>
              </div>
          </div>

          <!--Capacha Script-->
          <?php if(isset($success_message)) { ?>
          <div class="demo-success"><?php echo $success_message; ?></div>
          <?php } ?>

            </form>
          </div>
        </div>

        <div class="contchat_box" id="JoinUs" style="display: none;padding-top: 0px;">
          <div class="chat_box" data-aos="fade-right">
              <div class="chat_cont">                
                <h3 data-aos="zoom-in">Join</h3>
                <h2 data-aos="zoom-in">Us</h2>
                <div class="chatnxt-cont">
                <p>We are young professionals with a deep sense <br> of passion towards the field of event management</p>   
              </div>            
              </div>
          </div>
          <div class="cont-form">
            <form method="post" action="careers-form.php" enctype="multipart/form-data">
              <div class="mb-3 mt-3">
                <div class="form-group">
                  <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control AlphaOnly" name="fullname"
                        id="fullname" autocomplete="off"
                        placeholder="" required>                    
                </div>
            </div>

            <div class="mb-3 mt-3">
              <div class="form-group">
                <label for="mobilenum" class="form-label">Mobile No.</label>
                  <input type="tel" class="form-control" maxlength="10"
                  minlength="10" name="mobilenum" id="mobilenum" placeholder="" onkeyup="numberOnly(this)" required>                    
              </div>
          </div>

          <div class="mb-3 mt-3">
            <div class="form-group">
              <label for="emailid" class="form-label">Email Id</label>
                <input type="email" class="form-control" name="emailid"
                    id="emailid" autocomplete="off"
                    placeholder="" required>                    
            </div>
        </div>

        <div class="mb-3 mt-3">
          <div class="form-group aply">
            <label for="" class="form-label">Applying For</label>
            <select class="form-control" name="apply">
               <option value=""></option>
               <option value="Senior Manager - Operations &amp; Production">Senior manager - Operations &amp; Production</option>
               <option value="Senior Creative Conceptualizer - Design &amp; Project">Senior Creative Conceptualizer - Design &amp; Project</option>
               <option value="Manager - Human Resources &amp; Admin">Manager - Human Resources &amp; Admin</option>
            </select>
          </div>
      </div>

      <div class="mb-3 mt-3">
        <div class="form-group fileupl">
          <label for="fileupload">Upload Resume
          </label>   
          <input class="form-control" type="file" id="fileupload" name="attachment" required="">  
          <span id="filename"></span>         
        </div>
    </div>


    <div class="mb-3 mt-3">
        <div class="form-group">
        <label for="capcode" class="form-label">Captcha Code:</label>



       <div class="captchablock">

               <div id="randomdiv">
                 <input id="sescapcode" type="hidden" value="00288934">
                 <a href='javascript: refreshCaptcha();' style="color: #603135; font-size: 13px;

text-decoration: underline;">Refresh</a>
                   <img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>

                    <input id="capcode" class="form-control" type="text" name="captcha" required="">

                    

                </div>



              </div>




        </div>
    </div>

        <div class="submbtn">
        <div class="form-group">
        <button type="submit" name="careers" class="btn">Submit</button>
        </div>
        </div>
            </form>
          </div>
        </div>
    </div>
  </section>

  <section class="follow-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="address_wrapp">
              <div class="follow_wrapp">
                <h2 data-aos="zoom-in">follow</h2>                             
              </div>

              <div class="addr_item" data-aos="fade-left">
                <p><span><a class="" href="tel:+918779797334">
                  <i class="fa fa-phone"></i>
                </a></span>+91 8779 797 334</p>
                 <p><span><a class="" href="mailto:info@fbcelebrations.com">
                  <i class="fa fa-envelope"></i>
                </a></span>info@fbcelebrations.com</p>
                <div class="socail_icon">
                  <a class="btn btn-primary btn-sm btn-floating"  href="tel:+918779797334">
                    <i class="fa fa-phone"></i>
                  </a>
                  <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://wa.me/918779797334">
                    <i class="fa fa-whatsapp"></i>
                  </a>
                  <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://www.facebook.com/FBCelebrations/">
                    <i class="fa fa-facebook-f"></i>
                  </a>
                  <a class="btn btn-primary btn-sm btn-floating" target="_blank" href="https://www.instagram.com/fb.celebrations/">
                    <i class="fa fa-instagram"></i>
                  </a>
                  </div>
              </div>
          </div>   
        </div>
        <div class="col-md-12">
          <div class="addrrs" data-aos="fade-down">
            <p>B-102, Jolly Maker Apartments,<br> Cuffe Parade, Mumbai -400005</p>
          </div>
        </div>

        <div class="col-md-12">
          <div class="follow_para aos-init aos-animate" data-aos="zoom-in">
            <p>The Website and its content, features and functionality, including, without limitation, information, software, text, graphics, logos, button icons, images, audio clips, video clips, data compilations and the design, selection and arrangement thereof, are the exclusive property of Farid & Bhavnesh. Farid & Bhavnesh own and control all the copyright and other intellectual property rights on our website and the material on our website and all the copyright and other intellectual property rights on our website and the material on our website are reserved and are protected by Indian and international copyright, trademark, patent, trade secret and other intellectual property or proprietary rights laws, and may not be used or exploited in any way without our prior written consent. In addition to the intellectual property rights mentioned above, for purposes “content” is defined as all information such as the “look and feel” of the website, data files, graphics, text, photographs, drawings, logos, images, sounds, music and video and audio files on the website.</p>
          </div>
        </div>

      </div>
    </div>
  </section>



<footer>
  <div class="foot_sec">
    <p>© 2022 FB CELEBRATIONS | ALL RIGHTS RESERVED.</p>
  </div>
</footer>

  <!-- <script src="./js/jquery1.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/custom.js"></script>
  <script src="./js/validate.js"></script>
  <script>
    AOS.init({
      duration: 1200,
    });

    function numberOnly(input){
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "");
  }

  </script>
<script>
  $('.AlphaOnly').bind('keyup blur',function(){ 
      var node = $(this);
      node.val(node.val().replace(/[^A-Za-z_\s]/,'') ); }   // (/[^a-z]/g,''
    );
</script>
  <script>
$(document).ready(function () {
    $("#contact").validate({
        rules: {
            fullname: "required",
            mobilenum: "required",    
            emailid: {
              required: true,
              email:true,
            },
            msg: "required",
            captch: "required",

        },
        messages: {
            fullname: "Please Enter Full Name",
            mobilenum: "Please Enter Mobile No.",
            emailid:"Please Enter Valid Email Id",
            msg: "Please Entar Message",
            captch: "Please Entar Captcha",
        }
    });
}); 
  </script>


 <script LANGUAGE=JavaScript>



    function validate() {

      if (isFullName() && isValidemail() && validate_captcha1()) {

        //document.forms[0].B1.value = 'Please Wait...';

        //document.forms[0].B1.disabled = true;

        //alert('submitted.........');

        document.forms[0].submit();

      }

      return true;

    }



    function validate_captcha1() {

      var pin = removeSpaces(document.getElementById('txtCaptcha').value);

      var cpin = removeSpaces(document.getElementById('captchatot').value);



      intpin = pin;

      cintpin = cpin;

      //alert(intpin + "--" + cintpin );



      if (intpin !== cintpin) {

        alert('Entered text does not match with Image Text');

        document.getElementById('captchatot').value = '';

        document.getElementById('txtCaptcha').focus();

        return false;

      } else {





        return $.ajax({

          type: 'post',

          url: 'captcha.php',

          data: { captcha: intpin },

          success: function (response) {



            // alert(response);



          }

        });

      }





    }



    function DrawCaptcha() {

      var a = Math.ceil(Math.random() * 9) + '';

      var text = "";

      var possible = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz123456789";



      for (var i = 0; i < 1; i++)

        text += possible.charAt(Math.floor(Math.random() * possible.length));



      var str = "";

      for (var i = 0; i < 1; i++)

        str += possible.charAt(Math.floor(Math.random() * possible.length));

      var c = Math.ceil(Math.random() * 9) + '';



      var e = Math.ceil(Math.random() * 9) + '';

      var f = Math.ceil(Math.random() * 9) + '';

      //  var g = Math.ceil(Math.random() * 10)+ '';

      var code = a + ' ' + text + ' ' + ' ' + c + ' ' + str + ' ' + e + ' ' + f;

      document.getElementById("txtCaptcha").value = code;

      document.getElementById("captchaval").value = code;

    }



    function removeSpaces(string) {

      return string.split(' ').join('');

    }

  </script>



  <script>

    $(function () {

      $("#refresh").click(function (evt) {



        $("#randomdiv").load(location.href + " #randomdiv > *");

        $(".newcode").load(location.href + " .newcode > *");



        $("html, body").animate({ scrollTop: $(document).height() }, "slow");

        $('#capcode').val('');

      })

    })




    function myFunction() {



      var val1 = document.forms["myForm"]["capcode"].value;

      var val2 = document.forms["myForm"]["capcode"].value;

      if (val1 == val2) {



        return true;





      } else {



        alert("Invalid Caotcha");

        return false;



      }









    }



  </script>

   <script>
    //Refresh Captcha
    function refreshCaptcha() {
      var img = document.images['captcha_image'];
      img.src = img.src.substring(
        0, img.src.lastIndexOf("?")
      ) + "?rand=" + Math.random() * 1000;
    }
  </script>

  <script>
    $(".tabber li").click(function(){
      var getid = $(this).attr("data-tab");
      $(".contchat_box#"+getid).show().siblings('.contchat_box').hide();
      $(this).addClass("active").siblings().removeClass("active");
    });
  </script>
</body>
</html>

