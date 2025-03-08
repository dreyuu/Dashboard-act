<?php
session_start();

include '../dbConnection/dbConnection.php' ;

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, password FROM accounts WHERE username = :username and password = :password";
    $stmt = $connect->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if($stmt->execute()) {
        $_SESSION['username'] = $username;
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Login failed."]);
    }

}

?>
