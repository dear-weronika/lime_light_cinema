<!DOCTYPE html>
<html lang="en">
<?php
include './components/head.php';


// change background colour according to user
if($session === 'ADMIN'){
  echo  "<body style='background:#556370'>";
} elseif($session === 'JUNIOR') {
  echo  "<body style='background: #F26B6B'>";
} else {
  echo "<body style='background:#547575'>";
}

$ID = $_SESSION['ID'];
?>

<!---nav starts-->
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->
<br>

<?php
$result = mysqli_query($con,"SELECT * FROM films WHERE ID = '$ID'");
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $tickets = $row['tickets'];
    $age = $row['age'];

    // don't allow JUNIOR users to access details of a film ranked for adults - send to index.php instead
    if($session==='JUNIOR' && $age > 12) {
      header('Location:index.php');
    }


    // don't display Book Now Button if already clicked, user is Junior or no tickets left
    if($_GET['booking']==='true' || $session==='JUNIOR' || $tickets==0){
      $hide_book_button = 'none';
      // if not logged in but tickets are available, send to login.php after click on Book Now Button
      if(!$session && $tickets!=0){
        $_SESSION['previous']='Location:film_details.php';
        header('Location:login.php');
      }
    }

    // don't display Booking Form if Book Now Button wasn't clicked, user is Junior or no tickets left
    if($_GET['booking']!=='true' || $session==='JUNIOR' || $tickets==0){
      $hide_booking_form = 'none';
    }
    // don't display 'No Tickets Available' message for Junior user or if tickets are available
    if($session==='JUNIOR' || $tickets!=0){
      $hide_no_tickets_msg = 'none';
    }

?>
<!-- film details  -->
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-7">
            <div class="embed-responsive embed-responsive-16by9">
               <iframe class="embed-responsive-item" src="<?php echo $row['trailer'] ?>" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-12 col-md-5">
            <div class="row">
              <div class="image col-5">
                  <img  class='img-fluid' src="images/<?php echo $row['image'] ?>">
              </div>
              <div class="col-7">
                <div class="title">
                    <h3><?php echo $row['title'] ?></h3>
                </div>
                <div class="director">
                    <h6>Director: <?php echo $row['director'] ?></h6>
                </div>
                <div class="age">
                    <h6>Age: <?php echo $row['age'] ?></h6>
                </div>
                <div class="run_time">
                    <h6>Run Time: <?php echo $row["run_time"] ?></h6>
                </div>
                <div class="price">
                    <h6>Price: £10</h6>
                </div>
                <div class="time">
                    <h6>Time: <?php echo $row["time1"] ?></h6>
                </div>
              </div>
            </div>
            <div class="synopsis">
                <h6>Synopsis</h6>
                <p><?php echo $row['synopsis'] ?></p>
            </div>
            <a href='film_details.php?booking=true' style='display:<?php echo $hide_book_button; ?>' class='btn btn-primary align-self-md-end'>BOOK NOW</a>

            <form method="POST" action="booking.php" style="display:<?php echo $hide_booking_form; ?>">
                  <div class="form-group">
                      <label>Number of Tickets</label>
                      <input type="number" class="form-control" name="tickets" min="0" max="<?php echo $tickets; ?>">
                  </div>
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                      <button type="submit" class="btn btn-primary">BOOK</button>
            </form>
            <p style="display:<?php echo $hide_no_tickets_msg;?>"> No tickets available </p>
        </div>
    </div> 
    <!-- <div class="row">
            <form method="POST" action="booking.php" style="display:<?php echo $hide_booking_form; ?>">
                  <div class="form-group">
                      <label>Number of Tickets</label>
                      <input type="number" class="form-control" name="tickets" min="0" max="<?php echo $tickets; ?>">
                  </div>
                  <div class="form-group">
                      <input type="hidden" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                      <button type="submit" class="btn btn-primary">BOOK</button>
            </form>
            <p style="display:<?php echo $hide_no_tickets_msg;?>"> No tickets available </p>
    </div>  -->
  </div>
  


<br>

<!-- Footer -->
<?php
 }
include './components/footer.php';
?>
<!-- Footer ends -->


</body>
</html> 