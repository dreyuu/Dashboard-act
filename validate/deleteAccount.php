<?php
include '../dbConnection/dbConnection.php'; // Ensure this includes your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    $account_id = $_POST['student_id'];

    $query = "DELETE FROM accounts WHERE account_id = :account_id";
    $statement = $connect->prepare($query);
    $statement->bindParam(':account_id', $account_id, PDO::PARAM_INT);

    if ($statement->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
?>
