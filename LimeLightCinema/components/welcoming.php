<?php
// Welcome message
echo '<div class="text-right mr-4">';
if(!isset($_SESSION["LOGIN"])){
        echo    '<h4 class="text-white">You are not logged in</h4>';
}else{
    if($_SESSION["LOGIN"]=="ADMIN"){
        echo    '<h4 class="text-white">Welcome Admin</h4>'; 
    }elseif ($_SESSION["LOGIN"]=="ADULT"){
        echo    '<h4 class="text-white">Welcome Adult Member</h4>';
    }else {
        echo    '<h4 class="text-white">Welcome Junior Member</h4>';
    }
}
echo'</div>';

?>