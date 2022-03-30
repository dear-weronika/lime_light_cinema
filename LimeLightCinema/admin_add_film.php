<!DOCTYPE html>
<html lang="en">
  <?php
include './components/head.php';

?>

<body class= "bg-secondary">
  <!---nav starts-->
  
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->
 
<br>

<!-- header starts -->
<div>
  <h3 class="display-2 text-center text-white">FILMS</h3>
</div>
<!-- header ends -->

<?php

if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']=='ADMIN'){
  
}else{
  header("Location:index.php");
}   
        
$title = $_POST['NewTitle'];
$director = $_POST['NewDirector'];
$age = $_POST['NewAge'];
$trailer = $_POST['NewTrailer'];
$run_time = $_POST['NewRuntime'];
$tickets = $_POST['NewTickets'];
$time1 = $_POST['NewTime1'];
$image = $_FILES['NewImage']['name'];
$synopsis = $_POST['NewSynopsis'];

$dir = 'images/';
$target_file = $dir.basename($image);
        
        // add a movie
if(isset($_POST['add'])){
    if(move_uploaded_file($_FILES['NewImage']['tmp_name'], $target_file)){
      echo "<p>Uploaded</p><br>";
      echo "<img src='".$target_file."'>";
    } else {
      echo "File was not uploaded";
    }
  
    $AddQuery = "INSERT INTO films (title,director,age,trailer,run_time,tickets,time1,image,synopsis)
        VALUES ('$title','$director','$age','$trailer','$run_time','$tickets','$time1','$image','$synopsis')";

    $films = mysqli_query($con, $AddQuery); 
    header('Location:admin_films.php');
};

       
mysqli_close($con);
?>

<!-- main starts -->
<main>
  <table border =1> <tr> <th>Key</th> <th>Value</th> </tr>
    <form method='POST' enctype='multipart/form-data'>
      <!-- <input type='hidden' name='MAX_FILE_SIZE' value='512000'/> -->
      <tr><td>Title</td><td><input type='text' name='NewTitle' value='' required/></td></tr>
      <tr><td>Director</td><td><input type='text' name='NewDirector' value='' /></td></tr>
      <tr><td>Age</td><td><input type='text' name='NewAge' value='' /></td></tr>
      <tr><td>Trailer</td><td><input type='text' name='NewTrailer' value='' /></td></tr>
      <tr><td>Run Time</td><td><input type='number' name='NewRuntime' value='' /></td></tr>
      <tr><td>Tickets</td><td><input type='number' name='NewTickets' min="0" value=''/></td></tr>
      <tr><td>Time</td><td><input type='time' name='NewTime1' value=''/></td></tr>
      <tr><td>Image</td><td><input type='file' name='NewImage' id='NewImage'/></td></tr>
      <tr><td>Synopsis(avoid single quotes)</td><td><input type='text' name='NewSynopsis' value=''/></td></tr>
      <tr><td></td><td><input type='submit' name='add' value='add'/></td></tr>
    </form>
  </table>
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
