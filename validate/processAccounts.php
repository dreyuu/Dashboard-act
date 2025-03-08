<?php
include '../dbConnection/dbConnection.php'; // Include your database connection

$response = ["success" => false, "message" => "Something went wrong!"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST['action'];
    $username = trim($_POST['editUsername']);
    $status = trim($_POST['editStatus']);
    $password = trim($_POST['editPassword']);

    if (empty($username) || empty($status)) {
        $response["message"] = "Please fill all required fields.";
        echo json_encode($response);
        exit();
    }

    try {
        if ($action === "create") {
            // Creating a new account
            if (empty($password)) {
                $response["message"] = "Password is required for new accounts.";
                echo json_encode($response);
                exit();
            }

            $sql = "INSERT INTO accounts (username, password, status) VALUES (:username, :password, :status)";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":status", $status);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Account created successfully!";
            } else {
                $response["message"] = "Error creating account.";
            }

        } elseif ($action === "edit" && isset($_POST['account_id'])) {
            // Editing an existing account
            $accountId = $_POST['account_id'];

            if (!empty($password)) { // Hash new password
                $sql = "UPDATE accounts SET username = :username, password = :password, status = :status WHERE account_id = :accountId";
                $stmt = $connect->prepare($sql);
                $stmt->bindParam(":password", $password);
            } else {
                $sql = "UPDATE accounts SET username = :username, status = :status WHERE account_id = :accountId";
                $stmt = $connect->prepare($sql);
            }

            $stmt->bindParam(":accountId", $accountId);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":status", $status);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Account updated successfully!";
            } else {
                $response["message"] = "Error updating account.";
            }
        } else {
            $response["message"] = "Invalid action or missing account ID.";
        }
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

$conn = null; // Close connection
echo json_encode($response);

?>
