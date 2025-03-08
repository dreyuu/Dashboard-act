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
                        showAlert("success-alert", "Student deleted successfully!");
                            showLoadingScreen();
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                    } else {
                        alert("Failed to delete student.");
                    }
                })
                .catch(error => console.error("Error:", error));
            }
        });
    });
});

function showLoadingScreen() {
    let loadingScreen = document.getElementById('loadingScreen');
    loadingScreen.style.display = 'flex';
    setTimeout(() => {
        loadingScreen.style.display = 'none';
        console.log('show loading screen');
    }, 3000);
}
