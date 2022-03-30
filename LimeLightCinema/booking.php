<!DOCTYPE html>
<html lang="en">
<?php
include './components/head.php';


// change background colour according to user
if($session === 'ADMIN'){
  echo  "<body style='background:#556370'>";
} elseif($session === 'ADULT') {
  echo  "<body style='background: #547575'>";
} else {
  header('Location:login.php'); 
}


$ID = $_SESSION['ID'];
$booked_tickets = $_POST['tickets'];
$date = $_POST['date'];
?>

  <!---nav starts-->
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->
<br>

<?php
 $result_films = mysqli_query($con,"SELECT * FROM films WHERE ID = '$ID'");
 while($row = mysqli_fetch_array($result_films, MYSQLI_ASSOC)){
      $stock = $row['tickets'];
      $updated_stock = $stock-$booked_tickets;
      $title = $row['title'];
      $time = $row['time1'];
      //  echo $updated_stock;
      if(isset($_POST['tickets'])){
          $updated_query = "UPDATE films SET tickets ='$updated_stock' WHERE ID = '$ID'";
          mysqli_query($con, $updated_query);
          $_POST = array();
          // $_POST['tickets'] = 0;
      // header('Refresh:0');
      }
      
$result_users = mysqli_query($con,"SELECT * FROM user WHERE id = '$_SESSION[user_id]'");
while($row = mysqli_fetch_array($result_users, MYSQLI_ASSOC)){
$user= $row['username'];
$email = $row['email'];
}
?>
<!-- E-ticket -->
  <div class="container">
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="row">
                <div class="image col-5">
                    <img  class='img-fluid' src="images/logoLimeLight3.png">
                </div>
                <div class="col-8 ">
                   <p><h4>E-ticket</h4> <h6> to <?php echo $email; ?></h6> </p>
                   <p><h6>This is your order summary:</h6></p>
                   <p><h6>Customer Name: <?php echo $user; ?></h6></p>
                   <p><h6>Venue: LimeLight Cinema Midlothian</h6></p>
                   <p><h6>Title <?php echo $title; ?></h6></p>
                   <p><h6>Date: <?php echo $date; ?></h6> </p>
                   <p><h6>Time: <?php echo $time; ?></h6></p>
                   <p><h6>Number of tickets: <?php echo $booked_tickets; ?></h6></p>
                   <p><h6>Total Paid: £ <?php echo $booked_tickets * 10; ?></h6></p>
                   <a href="javascript:window.print()"><button>Print E-ticket <i class="fas fa-print"></i></button></a>
                   
                  
               </div>
                
            </div>
        </div>  
    </div>
  </div>


<br>

<!-- Footer -->
<?php
 }
 mysqli_close($con);
include './components/footer.php';
?>
<!-- Footer ends -->


</body>
</html> 