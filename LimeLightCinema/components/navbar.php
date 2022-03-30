<?php
// show relevant navbar
if(isset($_SESSION['LOGIN'])&& $_SESSION['LOGIN']=='ADMIN'){
  include 'admin_nav.php';
} else {
  include 'member_nav.php';
}

// show welcoming text
include 'welcoming.php';
?>