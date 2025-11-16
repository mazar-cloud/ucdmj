<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/includes/load.php');
  if(!$session->logout()) {redirect("/");}
?>