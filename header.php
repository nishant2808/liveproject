<?php 
    session_start();
   
    if (!isset ($_SESSION["id"]) && !$_SESSION["id"]) {
        
        header("location: login.php");
        exit;
    }
    
        include "conn.php";
        $sql = "SELECT * FROM users where id =" . $_SESSION['id'];
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="user.png" comany alt="logo" class="img-fluid" width="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active dashboard" aria-current="page" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link role" href="role.php">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link role" href="manage_user.php">User</a>
                    </li>
                </ul>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $firstname ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>