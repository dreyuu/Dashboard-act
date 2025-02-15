
document.addEventListener("DOMContentLoaded", function () {

    const studentForm = document.getElementById('editStudentForm');
    const contact = document.getElementById('editContact');
    const age = document.getElementById('editAge');
    const statusSelect = document.getElementById('editStatus');
    const courseSelect = document.getElementById('editCourse');
    const courseLabel = document.querySelector('label[for="editCourse"]');
    const yearSelect = document.getElementById('editYear');
    const yearLabel = document.querySelector('label[for="editYear"]');
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



});
