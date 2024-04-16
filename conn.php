<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "manage_user";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die ("connection failed" . $conn->connect_error);
}
// $sql = "CREATE TABLE users(
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(255) NOT NULL,
//     lastname VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     confirmpassword VARCHAR(255) NOT NULL,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// $result = $conn->query($sql);
// if ($result == 1) {
//     echo "successfully";
// } else {
//     echo "error";
// }
// $sql = "CREATE TABLE role(
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     role VARCHAR(255) NOT NULL UNIQUE,
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// $result = $conn->query($sql);
// if ($result == 1) {
//     echo "successfully";
// } else {
//     echo "error";
// }

?>