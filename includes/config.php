<?php
$conn = mysqli_connect("localhost","root","","ajax-crud");
if($conn) {
    return true;
} else {
    die("Connection Failed");
}
?>