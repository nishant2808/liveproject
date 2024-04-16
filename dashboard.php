<?php
include "header.php";
include "footer.php";
include "conn.php";
$sql_total = "SELECT * FROM `users`";
$result_total = mysqli_query($conn, $sql_total);
$count_total = mysqli_num_rows($result_total);
$active_total = mysqli_num_rows($result_total);

$sql = "SELECT * FROM `role`";
$result_role = mysqli_query($conn, $sql);
$count_role = mysqli_num_rows($result_role);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <hr class="">
                        <p class="card-text"><?php echo $count_total; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Roles</h5>
                        <hr class="">
                        <p class="card-text"><?php echo $count_role; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Active User</h5>
                        <hr class="">
                        <p class="card-text"><?php echo $active_total; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>