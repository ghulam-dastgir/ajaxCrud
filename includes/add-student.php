<?php
include("config.php");
if(trim($_POST['stu_name']) == NULL || trim($_POST['stu_email']) == NULL || trim($_POST['stu_pass']) == NULL) {
    echo "empty";
} elseif (strlen($_POST['stu_name']) < 5 || strlen($_POST['stu_name']) > 25) {
    echo "name<>";
} elseif (strlen($_POST['stu_email']) < 15 || strlen($_POST['stu_email']) > 40) {
    echo "email<>";
} elseif (strlen($_POST['stu_pass']) < 6 || strlen($_POST['stu_pass']) > 12) {
    echo "pass<>";
}
 else {
     $stu_name = htmlentities(trim($_POST['stu_name']));
     $stu_email = htmlentities(trim($_POST['stu_email']));
     $stu_pass = trim(sha1($_POST['stu_pass']));
     $sql = "INSERT INTO student(name, email, password) VALUES('{$stu_name}','{$stu_email}','{$stu_pass}')";
     $result = mysqli_query($conn,$sql) or die("Delete Records Query Failed");
     if($result) {
     echo "success";
    } else {
        echo "fail";
    }
    mysqli_close($conn);
    }
?>