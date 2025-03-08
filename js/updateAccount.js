document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("editAccountModal");

    if (!modal) {
        console.error("Modal element #editAccountModal not found!");
        return;
    }

    let modalTitle = document.getElementById("editAccountModalLabel");
    let submitBtn = document.getElementById("submit");
    let form = document.getElementById("editAccountForm");

    // Input Fields
    let accountId = document.getElementById("editAccountId");
    let username = document.getElementById("editUsername");
    let password = document.getElementById("editPassword");
    let retypePassword = document.getElementById("editRetypePassword");
    let status = document.getElementById("editStatus");

    let actionType = ""; // Store if it's "create" or "edit"

    // Listen for modal show event
    modal.addEventListener("show.bs.modal", function (event) {
        let button = event.relatedTarget; // Button that triggered the modal
        actionType = button.getAttribute("data-action"); // "create" or "edit"

        if (actionType === "create") {
            // Set modal for creating a new account
            modalTitle.textContent = "Create Account";
            submitBtn.textContent = "CREATE";
            form.reset(); // Clear all input fields
            accountId.value = ""; // Ensure account ID is empty
        } else if (actionType === "edit") {
            // Set modal for editing an existing account
            modalTitle.textContent = "Edit Account";
            submitBtn.textContent = "UPDATE";

            let accId = button.getAttribute("data-id"); // Fetch ID from button

            fetch(`validate/fetch_account.php?id=${accId}`)
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        accountId.value = data.account_id;
                        username.value = data.username;
                        password.value = data.password; // Clear password for security
                        retypePassword.value = "";
                        status.value = data.status;
                    } else {
                        console.error("Error: No data received.");
                    }
                })
                .catch(error => console.error("Error fetching account:", error));
        }
    });

    // Password Match Validation
    function validatePasswordMatch() {
        if (password.value !== retypePassword.value) {
            retypePassword.setCustomValidity("Passwords do not match!");
            retypePassword.classList.add("is-invalid");
        } else {
            retypePassword.setCustomValidity("");
            retypePassword.classList.remove("is-invalid");
        }
    }

    password.addEventListener("input", validatePasswordMatch);
    retypePassword.addEventListener("input", validatePasswordMatch);

    // Handle form submission
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        validatePasswordMatch();
        if (!this.checkValidity()) {
            event.stopPropagation();
            this.classList.add("was-validated");
            showAlert("warning-alert", "Oops! Some fields are missing. Please check and try again.");
            return;
        }

        let formData = new FormData(form);
        formData.append("action", actionType); // Add action type (create/edit)

        fetch("validate/processAccounts.php", {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert("success-alert", "Successful!.");
                    showLoadingScreen();
                    submitBtn.disabled = true;
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        location.reload();
                    }, 3000); // Refresh to show updates
                } else {
                    showAlert("error-alert", "Oops! Something went wrong.");
                }
            })
            .catch(error => {
                console.error("❌ Fetch Error:", error);
                showAlert("error-alert", "An error occurred. Please try again.");
            });
    });


    function showAlert(alertId, message) {
        let alertBox = document.getElementById(alertId);
        if (alertBox) {
            alertBox.innerText = message;
            alertBox.style.display = "block";
            alertBox.style.opacity = 1;

            setTimeout(() => {
                alertBox.style.display = "none";
                alertBox.style.opacity = 0;
                // window.location.href = "../register.php"; // Redirect after 3 seconds
            }, 3000);
        }

    }

    function showLoadingScreen() {
        let loadingScreen = document.getElementById('loadingScreen');
        loadingScreen.style.display = 'flex';
        setTimeout(() => {
            loadingScreen.style.display = 'none';
            
        }, 3000);
    }
    
});

