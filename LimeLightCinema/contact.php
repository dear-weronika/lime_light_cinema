<!DOCTYPE html>
<html lang="en">
<!-- head starts -->
<?php
include './components/head.php';

// change background colour according to user
if($session === 'ADMIN'){
    echo  "<body style='background:black'>";
  } elseif($session === 'JUNIOR') {
    echo  "<body style='background: #F26B6B'>";
  } else {
    echo "<body style='background:black'>";
  }

  // if film selected send to page with film's details 
if(isset($_POST['ID'])){
    $_SESSION['ID'] = $_POST['ID'];
    header('Location:film_details.php'); 
}
?>
<!-- head ends -->
  <!---nav starts-->
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->

<br>

<div class="banner">
        <!-- banner img -->
        <img src="images/contact_banner.png" class="img-fluid" alt="banner">
    </div>
    <!-- Main -->
    <main>
     
    <br>
        <!-- Contact Form -->
        
        <div class="container">
            <div class="row">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <form id="fs-frm" name="simple-contact-form" accept-charset="utf-8" action="https://formspree.io/f/mwkwjkoy" method="post">
                        <fieldset id="fs-frm-inputs">
                          <label class="text-white" for="full-name">Full Name</label>
                          <input type="text" name="name" id="full-name" placeholder="First and Last" required="">
                          <label class="text-white" for="email-address">Email Address</label>
                          <input type="email" name="_replyto" id="email-address" placeholder="email@domain.tld" required="">
                          <label class="text-white" for="message">Message</label><br>
                          <textarea rows="5" name="message" id="message" placeholder="" required=""></textarea>
                          <input type="hidden" name="_subject" id="email-subject" value="Contact Form Submission">
                        </fieldset>
                        <input type="submit" value="Send">
                    </form>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <div class="contact-container">
                        <i class="fas fa-phone text-white"></i>
                        <p class="text-white">Call us:</p>
                        <p class="text-white"> + 01 234 567 88</p>
                    </div>
                    <div class="contact-container">
                        <i class="fas fa-envelope text-white"></i>
                        <p class="text-white">Email us:</p>
                        <p class="text-white">limelightcinemamidlothian@gmail.com</p>
                    </div>
                    <div class="contact-container">
                        <i class="fas fa-map-marker-alt text-white"></i>
                        <p class="text-white">Address:</p>
                       <p class="text-white">Cinema 4</p>
                       <p class="text-white"> Roslin</p>
                       <p class="text-white">Midlothian</p>
                       <p class="text-white">EH25 9AA</p> 
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                  <div class="contact-container">
                      <p class= "font-weight-bold text-white">Public transport</p>
                      <p class="text-white">By bus :</p> 
                      <p class="text-white">Lothian bus number 31</p>
                      <p class="text-white">By car </p>
                      <p class="text-white">LimeLight Cinema complex is accessible from West Approach Road as well as Movie Street.</p>
                      <p class="text-white">Parking</p>
                      <p class="text-white">Secure parking is available beneath the complex. This is operated by Land Securities. 4 hours free parking is available to cinema ticket holders.
                      </p>
                     
                 </div>
                </div>
            </div>
            
            <div class="row justify-content-md-center">
                <div id="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17904.97654557064!2d-3.167898978304508!3d55.87789714303234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c08598345e75%3A0xbe82ba15dcc6c7a6!2sRoslin%20EH25%209AA!5e0!3m2!1sen!2suk!4v1642206153382!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>       
                </div>
            </div>
            
        </div>
    </main>
    <!-- End Main -->
<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->


</body>
</html> 