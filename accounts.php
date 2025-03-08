<?php include 'inc/sidebar.php';

$query = "SELECT * FROM accounts ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="border-bottom h-auto w-100 p-3 d-flex border-bottom-100 border-2 mb-3 justify-content-between">
    <div>
        <button id="toggle-btn" class="p-0" type="button"><i class="fa-duotone fa-solid fa-bars mt-1" style="color: var(--foreground); display:none;"></i></button>
        <span id="page-title" class="fs-5 fw-medium ms-3">ACCOUNTS</span>
    </div>
    <img src="img/logo.png" alt="logo.png" class="page-logo">
</div>

<div class="container-fluid w-100 p-3">
    <div class="container w-75 d-flex justify-content-end mb-3">
        <button type="button" class="squishy squishy-tech me-2 edit-btn"
            data-bs-toggle="modal"
            data-bs-target="#editAccountModal"
            data-action="create">
            Create Account
        </button>
    </div>
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
                            <button type="button" class="squishy squishy-tech me-2 edit-btn"
                                data-id="<?php echo $row['account_id']; ?>"
                                data-bs-toggle="modal"
                                data-bs-target="#editAccountModal"
                                data-action="edit">
                                Edit
                            </button>
                            <button type="button" class="squishy squishy-tech delete-btn" data-id="<?php echo $row['account_id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAccountForm" class="row g-3 needs-validation" method="post" novalidate>
                    <input type="hidden" id="editAccountId" name="account_id">
                    <input type="hidden" id="formAction" name="form_action">
                    <div class="col-12">
                        <label for="editUsername" class="form-label">Username</label>
                        <input type="text" name="editUsername" class="form-control" id="editUsername" required>
                        <div class="invalid-feedback">
                            Please provide a username.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editPassword" class="form-label">Password</label>
                        <input type="password" name="editPassword" class="form-control" id="editPassword" required>
                        <div class="invalid-feedback">
                            Please provide a password.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editRetypePassword" class="form-label">Re-type Password</label>
                        <input type="password" name="editRetypePassword" class="form-control" id="editRetypePassword" required>
                        <div class="invalid-feedback">
                            Please re-type your password.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editStatus" class="form-label">Account Status</label>
                        <select class="form-select" name="editStatus" id="editStatus" required>
                            <option selected disabled value="">Choose...</option>
                            <option>Admin</option>
                            <option disabled>Employee</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select account status.
                        </div>
                    </div>
                    <div class="col-12 w-100 d-flex">
                        <button class="btn btn-primary m-auto w-75 p-2" type="submit" id="submit" name="update_student">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="d-flex w-100 justify-content-center align-content-center position-relative">
    <div id="success-alert" class="alert alert-success p-3 d-flex justify-content-center align-content-center" role="alert"></div>
    <div id="error-alert" class="alert alert-danger p-3 d-flex justify-content-center align-content-center" role="alert"></div>
    <div id="warning-alert" class="alert alert-warning p-3 d-flex justify-content-center align-content-center" role="alert"></div>
</div>

<div class="loading-screen" id="loadingScreen">
    <div class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
    <p style="color: var(--clr-light); margin-top: 10px;">Loading...</p>
</div>

<?php include 'inc/footer.php' ?>

<script src="js/updateAccount.js"></script>
<script src="js/deleteAccount.js"></script>
<!-- <script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            let accountId = this.getAttribute('data-id');

            fetch(`validate/fetch_account.php?id=${accountId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editAccountId').value = data.account_id;
                    document.getElementById('editUsername').value = data.username;
                    document.getElementById('editPassword').value = data.password;
                    document.getElementById('editStatus').value = data.status;

                    let modalElement = document.getElementById('ediAccountModal'); // Check for typo here
                    if (modalElement) {
                        let modalInstance = new bootstrap.Modal(modalElement);
                        modalInstance.show();
                    } else {
                        console.error("Modal element not found!");
                    }
                })
                .catch(error => console.error('Error:', error));
        })
    });
</script> -->
