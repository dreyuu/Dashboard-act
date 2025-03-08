document.addEventListener("DOMContentLoaded", function () {
    'use strict';

    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submit');


    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {

            if (!loginForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                loginForm.classList.add('was-validated');
                showAlert("warning-alert", "Oops! Some fields are missing. Please check and try again.");
                return;
            }

            e.preventDefault();

            let formData = new FormData(this);

            fetch("validate/validateLogin.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                try {
                    if(data.success) {
                        showAlert("success-alert", "Login Successful");
                        showLoadingScreen();
                        setTimeout(() => {
                            window.location.href = './index.php';
                        }, 3000);
                        // show loading screen and then redirect to dashboard
                        console.log("login successful");
                    } else {
                        showAlert("error-alert", "Invalid username or password. Please try again.")
                    }
                } catch (error) {
                    console.error("❌ JSON Parse Error:", error, "Response:", data);
                    showAlert("error-alert", "Invalid server response. Check console for details.");
                }
            })
            .catch(error => {
                console.error("❌ Fetch Error:", error);
                showAlert("error-alert", "An error occurred. Please try again.");
            });
        });
    }

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
})

function showLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    loadingScreen.style.display = 'flex';
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        
    }, 3000);
}

