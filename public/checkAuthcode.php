<?php
session_start();
$code = strtoupper($_GET['authcode']);
if($code == $_SESSION['authcode']){
  echo 0;//Everythin's al rignt
}else{
  echo 1;//Alert
}
?>