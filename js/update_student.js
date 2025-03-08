
document.addEventListener("DOMContentLoaded", function () {

    const studentForm = document.getElementById('editStudentForm');
    const contact = document.getElementById('editContact');
    const age = document.getElementById('editAge');
    const submitBtn = document.getElementById('submit');


    if (contact) {
        contact.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, "");
        });
    }
    if (age) {
        age.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, "");
        });
    }






    if (studentForm) {
        studentForm.addEventListener('submit', function(e) {

            if (!studentForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                studentForm.classList.add('was-validated');
                showAlert("warning-alert", "Oops! Some fields are missing. Please check and try again.");
                return;
            }

            e.preventDefault();

            let formData = new FormData(this);

            fetch("validate/update_student.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())  // Get raw response
                .then(data => {
                    try { // Attempt to parse JSON
                        if (data.success) {
                            showAlert("success-alert", "The student has been updated.");
                            showLoadingScreen();
                            submitBtn.disabled = true;// disable the button
                            setTimeout(() => {
                                submitBtn.disabled = false; //enable the button
                                location.reload();
                            }, 3000);
                        } else {
                            showAlert("error-alert", "Failed to update the student. Please try again.");
                            
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

    function showLoadingScreen() {
        let loadingScreen = document.getElementById('loadingScreen');
        loadingScreen.style.display = 'flex';
        setTimeout(() => {
            loadingScreen.style.display = 'none';
            
        }, 3000);
    }

});
