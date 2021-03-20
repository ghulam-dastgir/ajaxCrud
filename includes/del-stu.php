<?php
include("config.php");
   $sql = "DELETE FROM student WHERE id = {$_POST['id']}";
   if(mysqli_query($conn,$sql)) {
       echo 1;
   } else {
       die("Delete Query Failed");
   }
    mysqli_close($conn);
    
?>