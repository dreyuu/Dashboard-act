
<?php
include '../dbConnection/dbConnection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 // Ensure this file properly initializes your PDO connection

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mi = $_POST['mi'];

    // Corrected string concatenation
    $fullname = $fname . " " . $mi . " " . $lname;

    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];


    // Prepare the SQL statement
    $sql = "INSERT INTO students (Name, age, gender, contact, address, status, course, year, section) 
                VALUES (:fullname, :age, :gender, :contact, :address, :status, :course, :year, :section)";
    $stmt = $connect->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':contact', $contact);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':section', $section);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Student register failed."]);
    }
}
?>
