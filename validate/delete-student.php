<?php
include '../dbConnection/dbConnection.php'; // Ensure this includes your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];

    $query = "DELETE FROM students WHERE student_id = :student_id";
    $statement = $connect->prepare($query);
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);

    if ($statement->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    echo json_encode(["success" => false]);
}
?>
