<?php
include '../dbConnection/dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['editName'];
    $age = $_POST['editAge'];
    $gender = $_POST['editGender'];
    $contact = $_POST['editContact'];
    $address = $_POST['editAddress'];
    $status = $_POST['editStatus'];
    $course = $_POST['editCourse'];
    $year = $_POST['editYear'];
    $section = $_POST['editSection'];

    $query = "UPDATE students SET Name = :name, age = :age, gender = :gender, contact = :contact, address = :address, status = :status, course = :course, year = :year, section = :section WHERE student_id = :student_id";
    $statement = $connect->prepare($query);
    
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':age', $age, PDO::PARAM_INT);
    $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
    $statement->bindParam(':contact', $contact, PDO::PARAM_STR);
    $statement->bindParam(':address', $address, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
    $statement->bindParam(':course', $course, PDO::PARAM_STR);
    $statement->bindParam(':year', $year, PDO::PARAM_STR);
    $statement->bindParam(':section', $section, PDO::PARAM_STR);

    if ($statement->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Database update failed."]);
    }
}
?>
