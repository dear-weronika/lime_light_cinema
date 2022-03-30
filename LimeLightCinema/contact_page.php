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
    echo "<body style='background:#547575'>";
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
<!-- main -->
<main>
<div class="banner">
        <!-- banner img -->
        <img src="images/contact_banner.png" class="img-fluid" alt="banner">
    </div>
    <!-- Main -->
    <main>
        <h1 class="heading">Contact Us </h1>
        <p class="para-contact">Got a query or need to contact us?</p>
        <!-- Contact Form -->
        <form id='contact'>
        <input type='text' name='name' />
        <input type='email' name='email' />
        <input type='text' name='messagebody'/>
        <button type='submit' form='contact'  >Send</button>
        </form>
        <?php
        //Variable that store name
        $name = $_POST['name'];
        //Variable that store email
        $email = $_POST['email'];
        //Variable that store the message - removed "
        $message = $_POST['messagebody'];
        //Variable that stores a link to the contact page
        // $page_link = '../index.html';

        /* show variables
        echo("name: " .$name ."<br/>");
        echo("email: " .$email ."<br/>");
        echo("message: " .$message ."<br/><br/><br/>");
        */

        // echo('Thank you for contacting us, we will get back to you as soon as possible.<br>');
        // echo "<a href='$page_link'>&larr;Back to the website</a>";

        // use wordwrap() if lines are longer than 70 characters
        //$message = wordwrap($message,70);
        $msg = $name ." : " .$email ."\n\n" .$message;
        $formattedmsg = wordwrap ($msg,70);
        // echo ("wrapped message: " . $formattedmsg);
        // send email
        mail('weronika.harlos@gmail.com','website query', $formattedmsg);
        ?>

        
        <div class="container">
            <div class="row">
         
            <br>
            <div class="row justify-content-md-center">
                <div id="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17904.97654557064!2d-3.167898978304508!3d55.87789714303234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887c08598345e75%3A0xbe82ba15dcc6c7a6!2sRoslin%20EH25%209AA!5e0!3m2!1sen!2suk!4v1642206153382!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>       
                </div>
            </div>
        </div>

</main>
<!-- main ends -->
<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->


</body>
</html> 