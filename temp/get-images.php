<?php
  header("Content-type: application/json; charset=utf-8");

  $json = file_get_contents('images.json');
  echo $json;
?>
