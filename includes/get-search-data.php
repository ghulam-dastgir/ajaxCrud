<?php
include("config.php");
$serch_term = $_POST['search'];

$sql = "SELECT * FROM student WHERE name LIKE '%{$serch_term}%' OR email LIKE '%{$serch_term}%'";
$result = mysqli_query($conn,$sql) or die("Select Records Query Failed");
if(mysqli_num_rows($result) > 0) {
   $output='<table class="table table-bordered table-stripped text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
       $output .= "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td><button type='submit' id='update-btn' data-eid='{$row['id']}' class='btn btn-primary'><i class='fa fa-pen'></i></button>
            <button type='submit' id='del-btn' data-did='{$row['id']}' class='btn btn-danger'><i class='fa fa-trash'></i></button>
            </td>
        </tr>";
    }
    $output .= '</tbody>
</table>'; 
mysqli_close($conn);
echo $output;
} else {
    echo "<h5>No Record</h5>";
}
?>