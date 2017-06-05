<?php
function exit_user(){
SetCookie("username","");
header ('Location: index.php');
}
?>
