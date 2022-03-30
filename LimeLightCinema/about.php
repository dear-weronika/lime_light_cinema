<!DOCTYPE html>
<html lang="en">
<?php
include './components/head.php';

// cange background colour according to user
if($session === 'ADMIN'){
  echo  "<body style='background:black'>";
} elseif($session === 'JUNIOR') {
  echo  "<body style='background: #F26B6B'>";
} else {
  echo "<body style='background: black'>";
}
?>

<!---nav starts-->
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->

<!-- banner starts -->
<img class="d-block w-100  " src="images/bannerslide.png" alt="banner" >
<!-- banner ends -->

<!-- header starts -->
<div>
    <h1 class="display-5 text-center text-white">ABOUT US</h1>
</div>
<!-- header ends -->

<br>


<!-- main starts -->
<main>
  <div class="container">
    <div class="row justify-content-center">
      <p  class="h4 col-12 col-md-10 col-lg-8 font-family:roboto text-white">
          LimeLight Cinema is a leading UK film company incorporating cinema, distribution and home entertainment.
          At LimeLight, we love cinemas. Nestled in the heart of their neighbourhood Midlothian,
          each of our cinemas are distinct, full of personality and run by welcoming and attentive staff.
          We don't just screen fantastic films.
          We provide places to eat, meet and relax, and host a busy calendar of events for everyone to explore.
          If you're all about superhero films, come to one of our state-of-the-art screens and get yourself a large popcorn. 
          We screen 35mm and 70mm special presentations at select LimeLight Cinemas, 
          welcome independent film collectives and are proud hosts of some of the most visionary film festivals around.
          Our team of passionate programmers carefully curate a broad range of films, 
          from quality mainstream and family movies to indies, documentaries and foreign language releases.
      </p>
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