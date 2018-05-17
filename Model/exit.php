<?php
function exit_user(){
setcookie('username', '', time()-1); 
// setcookie('password', '', time()-1); 
// header ('Location:../view/index.php');
return 'ok';
}
?>
