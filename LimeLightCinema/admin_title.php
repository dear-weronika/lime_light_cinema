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
  <div>
  <h3 class="display-5 text-center text-white">FILMS</h3>
</div>
<?php
// include './components/connection.php';

 if(isset($_SESSION['LOGIN'])&& $_SESSION['LOGIN']=='ADMIN'){
    
 }else{
    header("Location:index.php");
 }
 
 $image = $_FILES['image']['name'];
 
 $dir = 'images/';
 $pic = $dir . basename($_FILES['image']['name']);
 
 // Updated selected movie 
 if(isset($_POST['update'])){
     $UpdateQuery = "UPDATE films SET title='$_POST[title]',director='$_POST[director]',
         age ='$_POST[age]',trailer='$_POST[trailer]',run_time ='$_POST[run_time]',
         tickets='$_POST[tickets]',time1 ='$_POST[time1]',synopsis='$_POST[synopsis]'
         WHERE ID='$_POST[ID]'";
     mysqli_query($con, $UpdateQuery);
     header('Refresh:0');
 }
 
     if (move_uploaded_file($_FILES['image']['tmp_name'], $pic)){
         echo "<p>Image updated</p><br>";
     }else {
         // echo "<p>Could not update the image</p><br>".$image;
     }
 
 
 if(isset($_POST['delete']))
 {
     $DeleteQuery = "DELETE FROM films  WHERE ID = '$_POST[ID]'";
     mysqli_query($con, $DeleteQuery);
     header('Location:admin_films.php');
 }
// Show selected film by session$ID
 $result = mysqli_query($con,"SELECT * FROM films WHERE ID = '$_SESSION[ID]'");
 
echo "<div class='d-flex flex-wrap-reverse justify-content-center'>";
echo    "<table border=1>";
echo        "<tr> </tr>"; 
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo    "<form method='post' enctype='multipart/form-data'>";
echo        "<tr><td>Title</td><td><input type='text' name='title' value='". $row['title'] . "' required/> </td></tr>";
echo        "<tr><td>Director</td><td><input type='text' name='director' value='". $row['director'] . "'/> </td></tr>";
echo        "<tr><td>Age</td><td><input type='text' name='age' value='". $row['age'] . "' /> </td></tr>";
echo        "<tr><td>Trailer</td><td><input type='text' name='trailer' value='". $row['trailer'] . "'/> </td></tr>";
echo        "<tr><td>Run Time</td><td><input type='number' name='run_time' value='". $row['run_time'] . "'/> </td></tr>";
echo        "<tr><td>Tickets</td><td><input type='number' name='tickets' min='0' value='". $row['tickets'] . "'/> </td></tr>";
echo        "<tr><td>Time</td><td><input type='time' name='time1' value='". $row['time1'] . "'/> </td></tr>";
echo        "<tr><td>Image</td><td><input type='file' name='image' value='". $row['image'] . "'/> </td></tr>";
echo        "<tr><td>Synopsis(avoid single quotes)</td><td><textarea cols='30' rows='8' name='synopsis'>". $row['synopsis'] . " </textarea> </td></tr>";
echo        "<input type= 'hidden' name='ID' value='". $row['ID'] . "'/>";
echo        "<td><button class='bg-info' type='submit' name='update' value='update'>UPDATE</button>";
echo        "<button class='bg-danger' type='submit' name='delete' value='delete'>DELETE</button> </td>";
echo    "</form>";
echo    "</table>";
echo    "<table border=1>";
echo        "<td><img style='max-width: 250px'; src='images/" . $row['image'] . "'/> </td>";
echo    "</table>";
         }
 echo "</div>";
 

       
mysqli_close($con);
?>

<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->
</body>
</html>
