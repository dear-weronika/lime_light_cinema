<!DOCTYPE html>
<html lang="en">
<?php
include './components/head.php';

?>

<body style='background:#556370'>
  <!---nav starts-->
  
<?php
include './components/navbar.php';
?>
<!---nav bar ends-->
 
  <br>
  <div>
  <h3 class="display-5 text-center text-white">FILMS</h3>
</div>

<div class="d-flex p-2 justify-content-center">

<?php
// include './components/connection.php';

 if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']=='ADMIN'){
   
 }else{
    header("Location:index.php");
 }

if(isset($_POST['new'])){
header('Location:admin_add_film.php');
}


$ID = $_POST['ID'];

if($ID){
    $_SESSION['ID'] = $ID;
    header('Location:admin_title.php');
}
// Show all the films from the database
$result = mysqli_query($con,"SELECT * FROM films");
echo "<table border = 1> 
  <tr> </tr>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  echo "<tr>";
  echo "<form method='post' id='" . $row['ID'] . "'>";
      echo "<td><input type='hidden' name ='ID' value ='" . $row['ID'] . "' />";
  echo "</form>";
      echo "<button type='submit' name ='title' value ='" . $row['title'] . "' form='" . $row['ID'] . "' class='btn btn-primary btn-lg btn-block'>" . $row['title'] . "</button> </td>";
  echo "</tr>";
}
// adding new movie 
echo "<form method='post' id='new' />";
  echo "<tr><td><button type='submit' name='new' value='Add New Movie' form'new' class='btn btn-success btn-lg btn-block'>Add New Movie</button></td></tr>";
echo "</table>";
       
mysqli_close($con);
?>
</div>
<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->

</body>
</html>
