<?php
include("config.php");
   $id = $_POST['id'];
   $sql = "SELECT * FROM student WHERE id = {$id}";
   $result = mysqli_query($conn,$sql) or die("Query Failed");
   if(mysqli_num_rows($result) > 0) {
       while($show = mysqli_fetch_assoc($result)) {
       $output = "
       <div id='up-modal-form'>
       <div class='header1'>
        <h4 class='text-primary d-inline'>Update Record <button id='close-modal-up' class='float-right'>
        <span>&times;</span>
        </button></h4><hr>
       </div>
       <form action=''>
       <div class='msg'></div>
       <div class='form-group'>
           <label for=''><i class='fa fa-user mr-2'></i>Name</label>
           <input type='hidden' id='sid' value='{$show['id']}' class='form-control'>
           <input type='text' id='sname' value='{$show['name']}' class='form-control'>
       </div>
       <div class='form-group'>
           <label for=''><i class='fa fa-envelope mr-2'></i>Email</label>
           <input type=''  id='semail' readonly  value='{$show['email']}' class='form-control'>
       </div>
       <input type='submit' value='Update Record' id='up-btn' class='btn btn-info'>
   </form>";
   }
}

echo $output;
?>