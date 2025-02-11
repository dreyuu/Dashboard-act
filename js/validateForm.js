document.addEventListener("DOMContentLoaded", function () {
    'use strict';

    const forms = document.querySelectorAll('.needs-validation');
    const contact = document.getElementById('contact');
    const age = document.getElementById('age');
    const registerForm = document.getElementById('registerForm');

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

    // Loop over forms and prevent submission if invalid
    forms.forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // if (registerForm) {
    //     registerForm.addEventListener("submit", function (e) {
    //         e.preventDefault(); // Prevent full page reload

    //         let formData = new FormData(this);

    //         fetch("./validate/student.register.php", {
    //             method: "POST",
    //             body: new FormData(registerForm)
    //         })
    //         .then(response => response.text())  // Get raw response
    //         .then(data => {
    //             console.log("📨 Raw Server Response:", data); // Debug log
            
    //             try {
    //                 let jsonData = JSON.parse(data); // Attempt to parse JSON
    //                 if (jsonData.status === "success") {
    //                     showAlert("success-alert", jsonData.message);
    //                 } else {
    //                     showAlert("error-alert", jsonData.message);
    //                 }
    //             } catch (error) {
    //                 console.error("❌ JSON Parse Error:", error, "Response:", data);
    //                 showAlert("error-alert", "Invalid server response. Check console for details.");
    //             }
    //         })
    //         .catch(error => {
    //             console.error("❌ Fetch Error:", error);
    //             showAlert("error-alert", "An error occurred. Please try again.");
    //         });
            
            
            
    //     });
    // }

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
});
