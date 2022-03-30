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

  <!--cards starts-->
  <br>
  <div>
  <h3 class="display-5 text-center text-white">MEMBERS</h3>
</div>
<?php
// include './components/connection.php';

 if(isset($_SESSION['LOGIN'])&& $_SESSION['LOGIN']=='ADMIN'){
    
 }else{
    header("Location:index.php");
 }

$username = $_POST ['NewUsername'];
$passkey = $_POST['NewPasskey'];
$email = $_POST['NewEmail'];
$dob = $_POST['NewDob'];
$type = $_POST['NewType'];

if(isset($_POST['update']))
{
    $UpdateQuery = "UPDATE user SET username = '$_POST[username]', passkey ='$_POST[passkey]',dob ='$_POST[dob]', email ='$_POST[email]',type ='$_POST[type]' WHERE id = '$_POST[id]' ";
    mysqli_query($con, $UpdateQuery); 
};

if(isset($_POST['delete']))
{
    $DeleteQuery = "DELETE FROM user  WHERE id = '$_POST[id]'";
    mysqli_query($con, $DeleteQuery); 
};

if(isset($_POST['add']))
{
    $AddQuery = "INSERT INTO user (username,passkey,email,dob,type)
    VALUES ('$username','$passkey','$email','$dob','$type') ";
    mysqli_query($con, $AddQuery); 
};


$result = mysqli_query($con,"SELECT * FROM user");
// updating & delete a member
echo "<table border = 1>";
echo    "<tr> <th>Username</th> <th>Password </th>  <th>email</th> <th>dob</th> <th>type</th> </tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo "<form action='admin_user.php' method='post' id='". $row['id'] . "' >";
echo    "<tr >";
echo        "<td><input type='text' name='username' value='". $row['username'] . "'/> </td>";
echo        "<td><input type='text' name='passkey' value='". $row['passkey'] . "'/> </td>";
echo        "<td><input type='email' name='email' value='". $row['email'] . "'/> </td>";
echo        "<td><input type='date' name='dob' value='". $row['dob'] . "'/> </td>";
echo        "<td><input type='text' name='type' value='". $row['type'] . "'/> </td>";
echo        "<input type='hidden' name='id' value='". $row['id'] . "' />";
echo        "<td><button class='bg-info' form='". $row['id'] . "'type='submit' name='update' value='update'>UPDATE</button>";
echo        "<button class='bg-danger' form='". $row['id'] . "' type='submit'  name='delete' value='delete'>DELETE</button> </td>";
echo    "</tr>";
echo "</form>";
}
// adding new member
echo "<br>";
echo "<form action='admin_user.php' method='post' id='add". $row['id'] . "'>";
echo    "<tr>";
echo        "<td><input type='text' name='NewUsername' value='' required/> </td>";
echo        "<td><input type='text' name='NewPasskey' value=''  required/> </td>";
echo        "<td><input type='email' name='NewEmail' value=''  required/> </td>";
echo        "<td><input type='date' name='NewDob' value=''  required/> </td>";
echo        "<td><input type='text' name='NewType' value='' /> </td>";
echo        "<td><button class='bg-success' form='add". $row['id'] . "'type='submit' name='add' value='add'>ADD</button> </td>";
echo    "</tr>";
echo "</form>";
echo "</table>";

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
