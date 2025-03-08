<?php 
include '../dbConnection/dbConnection.php';

if (isset($_GET['id'])) {
    $accountId = $_GET['id'];

    $query = "SELECT * FROM accounts WHERE account_id = :accountId";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':accountId', $accountId, PDO::PARAM_INT);
    $stmt->execute();
    $account = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($account);
}


?>
