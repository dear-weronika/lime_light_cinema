<!DOCTYPE html>
<html lang="en">

<!-- head starts -->
<?php
include './components/head.php';
?>
<!-- head ends -->

<!-- body starts -->
<body style='background: white'>

  <!---nav starts-->
<?php
include './components/navbar.php';


$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$dob = $_POST['dob'];
$email = $_POST['email'];

if(isset($confirmPassword) || $_GET['sign']==='up'){
  $signUpTab = true;
}

  // wrong login
  if($confirmPassword && $confirmPassword === $password){
    $sqlRegister = "INSERT INTO user (username, passkey, dob, email, type)
    VALUES ('$username', '$password','$dob', '$email', '$type');";
    mysqli_query($con, $sqlRegister)
    or die("registration unsuccessful");
  } elseif($confirmPassword && $confirmPassword !== $password) {
    $errorSignUp = 'Passwords do not match';
  }
  
  if(!$confirmPassword || $confirmPassword === $password){

    $sql = "SELECT * FROM user
    WHERE username = '$username' 
    AND passkey = '$password'";
  
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);


    if($count ==1) {
      $user_id = $row['id'];
      $_SESSION['user_id'] = $user_id;
      // Admin login
      if($row['type'] == 'Admin') {
          $_SESSION['LOGIN'] = 'ADMIN';
          header("Location:admin.php");
        
      // Member login 
      } else {
        $dob = $row['dob'];
        list($year, $month, $day) = explode("-", $dob);
        $birthday = mktime(0, 0, 0, $month, $day, $year);
        $difference = time() - $birthday;
        $age = floor($difference / 31556926);
      
        $age >= 18
            ?   $_SESSION['LOGIN'] = 'ADULT'
            :   $_SESSION['LOGIN'] = 'JUNIOR';
        
        if (isset($_SESSION['previous']))   {
          header($_SESSION['previous']);
        }else {
        header("Location:index.php");
        }
      }
    } elseif($username || $password && !$confirmPassword) {
      $errorLogin = 'Wrong username or password';
    }
  } 

?>

<!-- main starts -->
<main>
  <h4 class="card-title text-center"><?php if($session){echo "You are already logged in as $session user";}else{echo "To book tickets register to our website!";} ?> </h4>
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item">
          <a class="nav-link <?php if($signUpTab) echo 'active'; ?>"  id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Sign up</a>
      </li>
      <li class="nav-item">
          <a class="nav-link <?php if(!$signUpTab) echo 'active'; ?>" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
      </li>
  </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade <?php if(!$signUpTab) echo 'show active'; ?>" id="login" role="tabpanel" aria-labelledby="login-tab">
        <form method="POST">
          <div class="container">
            <div class="row justify-content-center">
              <div class=".col-sm-5 .col-md-6" >
                <br>
                <div class="d-flex align-items-center justify-content-center">
                 <i class="fas fa-user-lock fa-4x"></i>
                </div>
                <br>
                <label>username:</label><br>
                <input type="text" name="username" value="<?php if(!$signUpTab) echo $username; ?>" required><br>
                <label>password:</label><br>
                <input type="password" name="password" value="<?php if(!$signUpTab) echo $password; ?>" required><br><br>
                <input type="submit" value="Sign in">
              </div>
            </div>
            <div class="row justify-content-center">
              <p class="text-danger">
                <?php
                  echo $errorLogin;
                ?>
              </p>
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade <?php if($signUpTab) echo 'show active'; ?>" id="register" role="tabpanel" aria-labelledby="register-tab">
        <form method="POST">
          <div class="container">
            <div class="row justify-content-center">
              <div class=".col-sm-5 .col-md-6">
              <br>
                <div class="d-flex align-items-center justify-content-center">
                 <i class="fas fa-user-plus fa-4x"></i>
                </div>
                <br>
                <label>username:</label><br>
                <input type="text" name="username" value="<?php echo $username; ?>" required><br>
                <label>email</label><br>
                <input type="email" name="email" value="<?php echo $email; ?>" required><br>
                <label>date of birth:</label><br>
                <input type="date" name="dob" value="<?php echo $dob; ?>" required><br>
                <label>password:</label><br>
                <input type="password" name="password" value="<?php echo $password; ?>" required><br>
                <label>confirm password:</label><br>
                <input type="password" name="confirmPassword" value="<?php echo $confirmPassword; ?>" required><br><br>
                <input type="submit" value="Join">
              </div>
            </div>
            <div class="row justify-content-center">
              <p class="text-danger">
                <?php
                  echo $errorSignUp;
                ?>
              </p>
            </div>
          </div>
        </form>
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