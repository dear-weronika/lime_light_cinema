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
  <h1 class="display-5 text-center text-white">ADMIN PANEL</h1>
</div>
<?php
// include './components/connection.php';

 if(isset($_SESSION['LOGIN'])&& $_SESSION['LOGIN']=='ADMIN'){
    
 }else{
    header("Location:index.php");
 }


?>
<!-- admin panel -->
<div class="container">
      <div class="row justify-content-center">
        <div class="col-8 col-lg-4 my-1">
           <a href="admin_user.php" class="btn btn-primary btn-lg btn-block">MEMBERS</a>
        </div>
        <div class="col-8 col-lg-4 my-1">
           <a href="admin_films.php" class="btn btn-primary btn-lg btn-block">FILMS</a>
        </div>
       
      </div>
</div>
       


<br>

<!-- Footer -->
<?php
include './components/footer.php';
?>
<!-- Footer ends -->
</body>
</html> 