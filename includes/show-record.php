<?php
include("config.php");
  if(isset($_POST['page_no'])) {
      $limit_page = $_POST['page_no'];
  } else {
      $limit_page = 1;
  }
  $limit = 3;
  $offset = ($limit_page - 1) * $limit;
$sql = "SELECT * FROM student LIMIT {$offset}, $limit";
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
 $sql1 = "SELECT * FROM student";
 $result1 = mysqli_query($conn,$sql1) or die("Pagination Query Failed");
 if(mysqli_num_rows($result1) > 0) {
     $total_records = mysqli_num_rows($result1);
     $total_pages = ceil($total_records / $limit);
 }
$output .= "<ul class='pagination justify-content-center'>";
for($i=1; $i <= $total_pages; $i++) {
    if($i == $limit_page) {
        $active = "active";
    } else {
        $active = "";
    }
 $output .= "<li class='page-item {$active} '><a href='' id='{$i}' class='page-link'>{$i}</a></li>";
}
$output .= "</ul>";
echo $output;
mysqli_close($conn);
} else {
    echo "<h5>No Record</h5>";
}

?>
