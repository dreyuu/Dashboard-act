<?php include 'inc/sidebar.php';

$query = "SELECT * FROM accounts ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


    <div class="border-bottom h-auto w-100 p-3 d-flex border-bottom-100 border-2 mb-3">
        <span id="page-title" class="fs-5 fw-medium ms-3">ACCOUNTS</span>
    </div>

    <div class="container-fluid w-100 p-3 d-flex">
    <div class="container-fluid w-75">
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <!-- <th scope="col"></th> -->
                <th scope="col">Account ID</th>
                <th scope="col">Userame</th>
                <th scope="col">Password</th>
                <th scope="col">Status</th>
                
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($result as $row) { ?>
                <tr>

                    <!-- <th scope="row" class=""><button type="button" class="squishy squishy-tech">View</button></th> -->
                    <td><?php echo $row['account_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td class="d-flex justify-content-center">
                        <button type="button" class="squishy squishy-tech me-2 edit-btn" data-id="<?php echo $row['account_id']; ?>">Edit</button>
                        <button type="button" class="squishy squishy-tech delete-btn" data-id="<?php echo $row['account_id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    </div>

<?php include 'inc/footer.php' ?>
