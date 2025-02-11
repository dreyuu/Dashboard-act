<?php  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dashboard-act";

try {
    // Create a PDO instance (database connection)
    $connect = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Stop execution and show an error message
    die("Connection failed: " . $e->getMessage());
}
?>
