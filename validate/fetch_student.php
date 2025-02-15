<?php
include '../dbConnection/dbConnection.php'; // Ensure this file contains your database connection

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $query = "SELECT * FROM students WHERE student_id = :student_id";
    $statement = $connect->prepare($query);
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $statement->execute();
    $student = $statement->fetch(PDO::FETCH_ASSOC);

    echo json_encode($student);
}
?>
