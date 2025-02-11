<?php
if (isset($_POST['register_student'])) {
    require '../dbConnection/dbConnection.php'; // Ensure this file properly initializes your PDO connection

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
    $section = $_POST['section'];

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO students (Name, age, gender, contact, address, status, course, section) 
                VALUES (:fullname, :age, :gender, :contact, :address, :status, :course, :section)";
        $stmt = $connect->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':section', $section);

        // Execute the query
        if ($stmt->execute()) {
            ?>
            <script>

                    function showAlert(alertId, message) {
                        let alertBox = document.getElementById(alertId);
                        if (alertBox) {
                            alertBox.innerText = message;
                            alertBox.style.display = "block";

                            setTimeout(() => {
                                alertBox.style.display = "none";
                            }, 3000);
                        }
                    }

                showAlert("success-alert", "Student Registered Successfully!");
            
            </script>';

                <?php
            // Delay redirection so the alert is visible
            
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Registration failed.
                    </div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . $e->getMessage() . '
                </div>';
    }
    header("Location: ../register.php");
    exit();
}
?>
