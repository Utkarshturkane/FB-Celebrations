//sticky header start
window.onscroll = function() {myFunction()};
var header = document.getElementById("stickyHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

//sticky header end

//menu start
function openNav() {
    // document.getElementById("mySidepanel").style.width = "350px";
     if ($(window).width() <= 767){	
            $('#mySidepanel').css('width','100%');
            $('#main').css('width','100%');
          }	

          else{
            $('#mySidepanel').css('width','350px');
            $('#main').css('width','350px');
          }

  }
  
  function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
  }

//menu end

$(document).ready(function() {
  $('.chat-sec').animate({backgroundPosition:'center right 0px'},2000);
});


$(document).ready(function() {
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    navText: [
      "<img src='./images/left-arrow.png'>",
      "<img src='./images/right-arrow.png'>"
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })
});

AOS.init({
  duration: 1200,
  disable: 'mobile',
});