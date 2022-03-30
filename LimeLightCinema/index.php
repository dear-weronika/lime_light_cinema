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
  echo "<body style='background: black'>";
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

<!--carousel starts-->
<?php
if($session !== 'JUNIOR'){
  include './components/carousel.php';
} else{
  include './components/junior_carousel.php';
}
?>
<!--carousel ends-->

<br>

<!-- search_bar starts -->
<?php
include './components/search_bar.php';
// post search criteria from form and store in a variable
$search_term = $_POST['search_term'];
if ($search_term) {
  $search_info = "<h5 class='text-center text-white'>Results for '".$search_term."':</h5>";
}
?>
<!-- search bar ends -->

<br>

<!-- header starts -->
<div>
  <h3 class="text-center text-white">What's on at LimeLight Cinema Midlothian </h3>
  <?php echo $search_info ?>
</div>
<!-- header ends -->

<br>

<!--main starts-->
<main>
  <div class='container'>
    <div class='row justify-content-center'>	

    <?php 

    if (isset($_POST['search_term'])){ 
      // search in films database table for the search term and show appropriate resaults dependin on the user type
      $query = $session === 'JUNIOR'
      ? "SELECT * FROM films WHERE title LIKE'%$search_term%' AND age <= 12"
      : "SELECT * FROM films WHERE title LIKE'%$search_term%'"; 
    } else {
      // search all in films database table and show appropriate results dependin on the user type
      $query = $session === 'JUNIOR'
      ? "SELECT * FROM films WHERE age <= 12"
      : "SELECT * FROM films";
    }

    //display the results
    $result = mysqli_query($con, $query)
    or die ("couldn't run query");

    $cardColor = $session === 'JUNIOR'
    ?   "background:#D4F266; border-radius:1.25rem"
    :   "background:black";

    $border = $session === 'JUNIOR'
    ?   "rounded-circle"
    :   "rounded-0";

    $textColor = $session === 'JUNIOR'
    ?   "text-black"
    :   "text-white";

    // posters
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      echo      "<div class='col col-10 col-sm-8 col-md-5 col-lg-3 m-2' >";
      echo        "<div class='card d-flex flex-column flex-md-row' style='".$cardColor."'> ";
      echo          "<div class='col pt-3'>";
      echo            "<form method='post' id='" . $row['ID'] . "'>";
      echo                "<input type='hidden' name ='ID' value ='" . $row['ID'] . "' />";
      echo                "<input class='img-fluid' type='image' src='images/" . $row["image"] . "' name ='ID' alt='".$row['title']."'  formtarget='".$border."' />";
      echo            "</form>";
      echo            "<h6 class='card-title $textColor text-center'>" . strtoupper($row['title'])  . "</h6>";
      echo          "</div>";    
      echo        "</div>";
      echo      "</div>";
    }
    ?>
    </div>
  </div>
<br>
<!-- Film Quiz for Juniors -->
  <?php
   if($session === 'JUNIOR'){
    include './components/quiz.php'; 
   }

  ?>


</main>  
<!--main ends-->

<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->


</body>
</html> 