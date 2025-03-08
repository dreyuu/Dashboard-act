document.addEventListener("DOMContentLoaded", function () {
    'use strict';

    const contact = document.getElementById('contact');
    const age = document.getElementById('age');
    const registerForm = document.getElementById('registerForm');
    const statusSelect = document.getElementById('status');
    const courseSelect = document.getElementById('course');
    const courseLabel = document.querySelector('label[for="course"]');
    const yearSelect = document.getElementById('year');
    const yearLabel = document.querySelector('label[for="year"]');
    const submitBtn = document.getElementById('submit');

    const collegeCourses = ["BSIT", "BSHM", "BSOA", "BSBA"];
    const shsCourses = ["ICT", "HUMSS", "ABM", "GAS"];
    const collegeYears = ["1st", "2nd", "3rd", "4th"];
    const shsYears = ["11", "12"];

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

    // Function to update course and year selections based on status
    function updateSelections() {
        let selectedStatus = statusSelect.value;

        // Update Courses
        courseSelect.innerHTML = ""; // Clear existing options
        if (selectedStatus === "College") {
            courseLabel.innerText = "College Courses";
            collegeCourses.forEach(course => {
                let option = new Option(course, course);
                courseSelect.add(option);
            });
        } else if (selectedStatus === "SHS") {
            courseLabel.innerText = "SHS Courses";
            shsCourses.forEach(course => {
                let option = new Option(course, course);
                courseSelect.add(option);
            });
        }

        // Update Year Selection
        yearSelect.innerHTML = ""; // Clear existing options
        if (selectedStatus === "College") {
            yearLabel.innerText = "Year Level";
            collegeYears.forEach(year => {
                let option = new Option(year, year);
                yearSelect.add(option);
            });
        } else if (selectedStatus === "SHS") {
            yearLabel.innerText = "Grade Level";
            shsYears.forEach(year => {
                let option = new Option(year, year);
                yearSelect.add(option);
            });
        }
    }

    // Attach event listener to status dropdown
    if (statusSelect) {
        statusSelect.addEventListener('change', updateSelections);
    }

    // Run once on page load to set default selections
    updateSelections();






    if (registerForm) {
        registerForm.addEventListener("submit", function (e) {

            if (!registerForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                registerForm.classList.add('was-validated');
                showLoadingScreen();
                showAlert("warning-alert", "Oops! Some fields are missing. Please check and try again.");
                return;
            }

            e.preventDefault(); // Prevent full page reload

            let formData = new FormData(this);

            fetch("validate/student.register.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.json())  // Get raw response
                .then(data => {
                    try { // Attempt to parse JSON
                        if (data.success) {
                            showAlert("success-alert", "Registration successful! The student has been added.");
                            showLoadingScreen();
                            submitBtn.disabled = true;
                            setTimeout(() => {
                                submitBtn.disabled = false;
                                location.reload();
                            }, 3000);
                        } else {
                            showAlert("error-alert", "Oops! Something went wrong. Unable to register the student.");
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
});

function showLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    loadingScreen.style.display = 'flex';
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        console.log('show loading screen');
    }, 3000);
}
