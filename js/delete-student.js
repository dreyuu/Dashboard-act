document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            let studentId = this.getAttribute("data-id");

            if (confirm("Are you sure you want to delete this student?")) {
                fetch("validate/delete-student.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "student_id=" + studentId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Student deleted successfully!");
                        location.reload(); // Reload the page
                    } else {
                        alert("Failed to delete student.");
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        });
    });
});
