<?php
include("config.php");
  
  if($_POST['name'] == NULL || $_POST['email'] == NULL) {
      echo "empty";
  } elseif(strlen(trim($_POST['name'])) < 4 || strlen(trim($_POST['name'])) > 25) {
      echo "name<>";
  } else {
      $name = htmlentities(trim($_POST['name']));
      $sql = "UPDATE student set name = '{$name}' WHERE id = {$_POST['id']}";
      if(mysqli_query($conn,$sql)) {
          echo "success";
      } else {
          die("Update Query Failed");
      }
  }


?>