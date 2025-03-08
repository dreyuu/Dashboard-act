<?php
header('Content-Type: application/json');
include '../dbConnection/dbConnection.php';

// Query for College vs SHS
$sql1 = "SELECT status, COUNT(*) as count FROM students GROUP BY status";
$stmt1 = $connect->prepare($sql1);
$stmt1->execute();
$typeData = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$totalStudents = array_sum(array_column($typeData, 'count')); // Sum up total students

// Query for Gender
$sql2 = "SELECT gender, COUNT(*) as count FROM students GROUP BY gender";
$stmt2 = $connect->prepare($sql2);
$stmt2->execute();
$genderData = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Query for Year
$sql3 = "SELECT year, COUNT(*) as count FROM students GROUP BY year ORDER BY year ASC";
$stmt3 = $connect->prepare($sql3);
$stmt3->execute();
$yearData = $stmt3->fetchAll(PDO::FETCH_ASSOC);


// Query for Number of Students per Course at Each Year Level
$sql4 = "SELECT course, COUNT(*) as count FROM students WHERE year = '1st' GROUP BY course";
$stmt4 = $connect->prepare($sql4);
$stmt4->execute();
$firstYearData = $stmt4->fetchAll(PDO::FETCH_ASSOC);
// Query for Number of Students per Course at Each Year Level
$sql5 = "SELECT course, COUNT(*) as count FROM students WHERE year = '2nd' GROUP BY course";
$stmt5 = $connect->prepare($sql5);
$stmt5->execute();
$secondYearData = $stmt5->fetchAll(PDO::FETCH_ASSOC);
// Query for Number of Students per Course at Each Year Level
$sql6 = "SELECT course, COUNT(*) as count FROM students WHERE year = '3rd' GROUP BY course";
$stmt6 = $connect->prepare($sql6);
$stmt6->execute();
$thirdYearData = $stmt6->fetchAll(PDO::FETCH_ASSOC);
// Query for Number of Students per Course at Each Year Level
$sql7 = "SELECT course, COUNT(*) as count FROM students WHERE year = '4th' GROUP BY course";
$stmt7 = $connect->prepare($sql7);
$stmt7->execute();
$fourthYearData = $stmt7->fetchAll(PDO::FETCH_ASSOC);
// Query for Number of Students per Course at Each Year Level
$sql8 = "SELECT course, COUNT(*) as count FROM students WHERE year = '11' GROUP BY course";
$stmt8 = $connect->prepare($sql8);
$stmt8->execute();
$shsData11 = $stmt8->fetchAll(PDO::FETCH_ASSOC);
// Query for Number of Students per Course at Each Year Level
$sql9 = "SELECT course, COUNT(*) as count FROM students WHERE year = '12' GROUP BY course";
$stmt9 = $connect->prepare($sql9);
$stmt9->execute();
$shsData12 = $stmt9->fetchAll(PDO::FETCH_ASSOC);

// Close the connection
$connect = null;

echo json_encode([
    "typeData" => $typeData ?? [],
    "totalStudents" => $totalStudents ?? 0,
    "genderData" => $genderData ?? [],
    "yearData" => $yearData ?? [],
    "firstYearData" => $firstYearData ?? [],
    "secondYearData" => $secondYearData ?? [],
    "thirdYearData" => $thirdYearData ?? [],
    "fourthYearData" => $fourthYearData ?? [],
    "shsData11" => $shsData11 ?? [],
    "shsData12" => $shsData12 ?? [],
], JSON_NUMERIC_CHECK);
