<?php
include "conn.php";
if (isset ($_POST['submit'])) {
    $firstname = isset ($_POST['fname']) ? $_POST['fname'] : '';
    $lastname = isset ($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset ($_POST["email"]) ? $_POST['email'] : '';
    $password = isset ($_POST["password"]) ? $_POST['password'] : '';
    $confirmpassword = isset ($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $photo = $_FILES['image']['name'];
    if(!empty($photo)){
        $filename = time() . '_' . $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $folder = "image/" . $filename;
        move_uploaded_file($temp_name, $folder);
    }else{
        $filename= '';
    }
    $emailExistQuery = "SELECT email FROM users WHERE email='".$email."';";
    $result = $conn->query($emailExistQuery);
    if($result->num_rows){ ?>
            <div class="alert alert-danger text-center mt-2" role="alert">
            This email is alreay exists!
            </div>

<?php }else{
    
        if ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $confirmpassword != '') {
            $password = md5($_POST['password']);
            $confirmpassword = md5($_POST['confirm_password']);
            $sql = "INSERT INTO users (firstname,lastname, email, password, confirmpassword, image)
            VALUES ('$firstname','$lastname', '$email','$password', '$confirmpassword','$filename')";
            if ($conn->query($sql) === TRUE) {?>
                        <div class="alert alert-success text-center mt-2" role="alert">
                        Your are successfully Register!
                        </div>

<?php 
        } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf- text-center">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .alert {
        width: 20%;
        height: 8%; 
      margin-left: 565px;         

    }
    </style>
</head>

<body>
    <div class="container">
        <header class="text-center">
            <h2 class="mt-4">Register User </h2>
        </header>
    </div>
    <section class="container w-50 bg-light mt-4">
        <form method="POST" enctype="multipart/form-data">
            <div class="col-text-center">
                <label for="inputfname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputfname" placeholder="First Name" name="fname">
            </div>
            <div class="col-text-center">
                <label for="inputlname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputlname" placeholder="Last Name" name="lname">
            </div>
            <div class="col-text-center">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            </div>
            <div class="col-text-center">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
            </div>
            <div class="col-text-center">
                <label for="inputPassword14" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword14" placeholder="Confirm Password"
                    name="confirm_password">
            </div>
            <div class="col-text-center">
                <label for="inputimage" class="form-label">Upload your Profile</label>
                <input type="file" class="form-control" id="inputimage" name="image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit">Register</button>
            </div>
            <div class="link mt-2 text-center">
                <a href="login.php">Have an account? Go to login</a>
                <p class="mt-2"><a href="index.php" class="login">Back to Home</a></p>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>