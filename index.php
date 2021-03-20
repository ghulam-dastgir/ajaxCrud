<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <header class="bg-info text-white text-center p-3">
        <h3>AJAX CRUD OPERATION</h3>
    </header>
    <div class="container my-5">
        <header class="p-3 bg-warning text-white">
            <h5 class="d-inline">Students List</h5>
           <button type="button" id="add-btn" class="btn btn-info float-right">Add Student</button>
        </header>
        <header class="search-header p-4 bg-primary">
            <form action="" id="search-bar">
                <input type="text" id="search" class='form-control' placeholder="Search here...">
            </form>
        </header>
        <div class="shadow-lg p-3 table-responsive" id="table">
            <!-- Table Data -->
        </div>
    </div>

    <!-- Insert Record Modal -->

    <div id="modal">
        <div id="modal-form">
           <div class="header">
            <h4 class="text-primary d-inline">Update Record <button id="close-modal" class="float-right">
            <span>&times;</span>
            </button></h4><hr>
           </div>
            <form action="">
                <div class="msg"></div>
                <div class="form-group">
                    <label for="name"><i class="fa fa-user mr-2"></i>Name</label>
                    <input type="text" id="name" placeholder="Full Name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email"><i class="fa fa-envelope mr-2"></i>Email</label>
                    <input type="email"  id="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password"><i class="fa fa-user mr-2"></i>Name</label>
                    <input type="password" id="password" placeholder="Password" class="form-control">
                </div>
                <input type="submit" value="Add Record" id="save-btn" class="btn btn-info">
            </form>
        </div>
    </div>

    <!-- Update Modal -->

    <div id="upade-modal">       
     </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/ajaxjq.js"></script>
</body>
</html>