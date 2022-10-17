<!DOCTYPE html>
<html lang="en">
<?php require_once 'head.php'?>
<body onload="document.body.style.opacity='1'">
    <header></header>
    <main>
        <article onkeypress="">
            <header id="home">
              <h1><div>Russel</div>&nbsp;<div> Street</div>&nbsp;<div>Dentist</div><img src="/images/Group 1.png" alt=""></h1>
          <?php require_once 'navbar.php'?>
        <h1 id="scroll">Scroll Down To Find Out More</h1>
            </header>
            
          </article>
          <article id="AboutUs" onkeypress="">
            <div class="title">
              <h1>About us</h1>
            </div>
            <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="/images/images/1.JPEG" style="width:100%">

  </div>

  <div class="mySlides fade">
    <img src="/images/images/2.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="images/images/3.webp" style="width:100%">
  </div>
  <div class="mySlides fade">
    <img src="/images/images/4.jpg" style="width:100%">
  </div>
  <div class="mySlides fade">
    <img src="/images/images/5.jpg" style="width:100%">
  </div>


  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
            <div id="info">
                
                <div id="discounted">
                <p>Russel Street Medical opened in 2020 and is located in Melbourne’s CBD at 340 Russel Street 
                Melbourne, just opposite The Old Melbourne Jail and within walking distance of Melbourne  Central 
                Train Station. 
                We strive to help all  of our patients with a focus on preventative health care, a view to managing 
                chronic health conditions with a holistic approach, and with access to a wide range of specialist care 
                providers when needed.</p>
                <br>
                <p>Under partnerships, we are able to offer RMIT students & staff discounted rates. </p>
                <table>
                    <tr>
                        <th>Consulation</th>
                        <th>Normal Fee</th>
                        <th>Rmit Member Fee</th>
                        <th>Medicare Rebate</th>
                    </tr>
                    <tr>
                        <td>Standard</td>
                        <td>$85.00</td>
                        <td>$60.50</td>
                        <td>$39.75</td>
                    </tr>
                    <tr>
                        <td>Long or Complex</td>
                        <td>$130.00</td>
                        <td>$91.00</td>
                        <td>$76.95</td>
                    </tr>
                </table>
            </div>
                <div id="opening">
                    <h2>Opening Hours</h2>
                    <p>Monday 9am-6pm</p>
                    <p>Tuesday 9am-6pm</p>
                    <p>Wednesday 9am-6pm</p>
                    <p>Thursday 9am-6pm</p>
                    <p>Friday 9am-6pm</p>
                    <p>Saturday 9am-6pm</p>
                    <p>Sunday 9am-6pm</p>

                </div>
            </div>
          </article>
          <article id="whoweare">
            <div class="title">
                <h1>Who we are</h1>
            </div>
            <div class="whoweare">
                <div class="container" id="Abigale">
                    <img src="./images/images/abigale.webp" alt="">
                        <h2>Dr. Abigale Laurentis </h2>
                        <p>Abigale Laurentis completed her medical degree at the University of Queensland in 2013,  where she 
                            also obtained a Bachelor of Science in Biomedicine.</p>
                        <p>Over her training and practice, Abigale has worked in a variety of clinical  settings including 
                            specialities at Latrobe Health. </p>
                </div>
                <div class="container">
                        <img src="./images/images/steph.jpg" alt="an image of Dr Stephen Hill">
                        <h2>Dr. Stephen  Hill </h2>     
                        <p>Stephen Hill graduated from Auckland University in New Zealand in 2014,  and obtained his 
                            Fellowship from the Royal Australian College of General Practitioners in 2017.</p>
                        <p>Over his training and practice, Stephen worked in internal medicine at the Royal Children's Hospital 
                            Melbourne before transitioning to General Practice.</p>
                </div>
                <div class="container">
                    <img src="./images/images/kio.jpg" alt="an image of Ms Kiyoko Tsu">
                        <h2>Ms Kiyoko Tsu</h2>
                        <p>Kiyoko Tsu completed her Bachelor of Nursing at the Yong Loo Lin School of Medicine in Singapor e in 
                            2019. </p>
                        <p>She is an accredited Nurse Immuniser and has worked in various hospitals within metropolitan 
                            Melbourne.</p>
                </div>
            </div>
          </article>
          <article id="contacs">
            <div class="title"><h1>Contacts</h1></div>
            <div class="booking">
                <p>
                We hope to provide the highest level of care and continuity of care to our patients. Please let the reception staff know if you have any problems or suggestions in which we can which we can better our services.</p>
                <p>Make a booking online now</p>
                <li><a href="booking.php">BOOK NOW</a></li>
            </div>
          </article>
          
    </main>
    <?php
    require_once "footer.php"
    ?>
    </footer>
    <script>
     window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
    </script>
</body>
</html>