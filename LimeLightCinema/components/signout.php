<?php
// using URL path to get 'signout' 
if($_GET['signout']=='logout'){
    session_start();
    session_destroy();
    header('Location:../index.php');
}elseif($_GET['signout']=='signin'){
    header('Location:../login.php'); 
}

echo'<div>';
if(!isset($_SESSION['LOGIN'])){
    echo '<a href="components/signout.php?signout=signin"><i class="fas fa-user fa-2x" style="color: #b3df00"></i> My Account </a>';
}else{
    echo '<a href="components/signout.php?signout=logout"><i class="fas fa-sign-out-alt fa-2x" style="color: #b3df00"></i>Sign Out</a>';
}
echo '</div>';
?>
