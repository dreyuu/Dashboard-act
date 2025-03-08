<?php include 'inc/sidebar.php';

$query = "SELECT * FROM students WHERE status = 'SHS'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="border-bottom h-auto w-100 p-3 d-flex border-bottom-100 border-2 mb-5 justify-content-between">
    <div>
        <button id="toggle-btn" class="p-0" type="button"><i class="fa-duotone fa-solid fa-bars mt-1" style="color: var(--foreground); display:none;"></i></button>
        <span id="page-title" class="fs-5 fw-medium ms-3">SENIOR HIGH SCHOOL</span>
    </div>
    <img src="img/logo.png" alt="logo.png" class="page-logo">
</div>
<div class="container-fluid w-100 p-3 d-flex justify-content-between">
    <div class="d-flex" style="align-items: center;">
        <h1 class="mb-0 me-2">College student</h1>
        <div class="search">
            <input type="text" placeholder="Search">
        </div>
    </div>
    <div class="d-flex">
        <!-- <button class="squishy squishy-classic me-2">Course</button>
        <button class="squishy squishy-classic me-2">Year</button>
        <button class="squishy squishy-classic me-2">Section</button> -->
        <div class="dropdown mb-3">
            <button class="squishy squishy-classic dropdown-toggle me-2" type="button" id="courseDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Course
            </button>

            <ul class="dropdown-menu custom-dropdown" id="courseList">
                <li><a class="dropdown-item" href="#" data-course="All">Course</a></li>
                <li><a class="dropdown-item" href="#" data-course="ICT">ICT</a></li>
                <li><a class="dropdown-item" href="#" data-course="HUMMS">HUMMS</a></li>
                <li><a class="dropdown-item" href="#" data-course="ABM">ABM</a></li>
                <li><a class="dropdown-item" href="#" data-course="GAS">GAS</a></li>
            </ul>
        </div>
        <div class="dropdown mb-3">
            <button class="squishy squishy-classic dropdown-toggle me-2" type="button" id="yearDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Year
            </button>

            <ul class="dropdown-menu custom-dropdown" id="yearList">
                <li><a class="dropdown-item" href="#" data-course="All">Year</a></li>
                <li><a class="dropdown-item" href="#" data-course="11">Grade 11</a></li>
                <li><a class="dropdown-item" href="#" data-course="12">Grade 12</a></li>
            </ul>
        </div>
        <div class="dropdown mb-3">
            <button class="squishy squishy-classic dropdown-toggle me-2" type="button" id="sectionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Section
            </button>

            <ul class="dropdown-menu custom-dropdown" id="sectionList">
                <li><a class="dropdown-item" href="#" data-course="All">Section</a></li>
                <li><a class="dropdown-item" href="#" data-course="A">Section A</a></li>
                <li><a class="dropdown-item" href="#" data-course="B">Section B</a></li>
                <li><a class="dropdown-item" href="#" data-course="C">Section C</a></li>
            </ul>
        </div>
        <div class="dropdown mb-3">
            <button class="squishy squishy-classic dropdown-toggle me-2" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sort
            </button>

            <ul class="dropdown-menu custom-dropdown" id="sortList">
                <li><a class="dropdown-item" href="#" data-course="All">Sort</a></li>
                <li><a class="dropdown-item" href="#" data-course="A-Z">A-Z</a></li>
                <li><a class="dropdown-item" href="#" data-course="Z-A">Z-A</a></li>
                <li><a class="dropdown-item" href="#" data-course="Male">Male</a></li>
                <li><a class="dropdown-item" href="#" data-course="Female">Female</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid w-100">
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <!-- <th scope="col"></th> -->
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Course</th>
                <th scope="col">Year</th>
                <th scope="col">Section</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($result as $row) { ?>
                <tr data-course="<?php echo $row['course']; ?>"
                    data-year="<?php echo $row['year']; ?>"
                    data-section="<?php echo $row['section']; ?>">

                    <!-- <th scope="row" class=""><button type="button" class="squishy squishy-tech">View</button></th> -->
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td class="d-flex">
                        <button type="button" class="squishy squishy-tech me-2 edit-btn" data-id="<?php echo $row['student_id']; ?>">Edit</button>
                        <button type="button" class="squishy squishy-tech delete-btn" data-id="<?php echo $row['student_id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" class="row g-3 needs-validation" method="post" novalidate>
                    <input type="hidden" id="editStudentId" name="student_id">
                    <div class="col-12">
                        <label for="editName" class="form-label">First name</label>
                        <input type="text" name="editName" class="form-control" id="editName" required>
                        <div class="invalid-feedback">
                            Please provide your first name.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editAge" class="form-label">Age</label>
                        <input type="number" name="editAge" class="form-control" id="editAge" min="1" max="99" required>
                        <div class="invalid-feedback">
                            Please provide your age.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editGender" class="form-label">Gender</label>
                        <select class="form-select" name="editGender" id="editGender" required>
                            <option selected disabled value="">Choose a gender</option>
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a gender.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editContact" class="form-label">Contact Number</label>
                        <input type="tel" name="editContact" pattern="[0-9]{11,}" maxlength="11" class="form-control" id="editContact" required>
                        <div class="invalid-feedback">
                            Please provide your contact number (must be 11 digits).
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editAddress" class="form-label">Address</label>
                        <input type="text" name="editAddress" class="form-control" id="editAddress" required>
                        <div class="invalid-feedback">
                            Please provide an address.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editStatus" class="form-label">SHS/Collage</label>
                        <select class="form-select" name="editStatus" id="editStatus" required>
                            <option selected disabled value="">Choose...</option>
                            <option>SHS</option>
                            <option>College</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select if shs/college.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editCourse" class="form-label">Course</label>
                        <select class="form-select" name="editCourse" id="editCourse" required>
                            <option selected disabled value="">Choose a course</option>
                            <option>ICT</option>
                            <option>HUMMS</option>
                            <option>ABM</option>
                            <option>GAS</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a course.
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="editYear" class="form-label">Year</label>
                        <select class="form-select" name="editYear" id="editYear" required>
                            <option selected disabled value="">Choose a year</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a year.
                        </div>
                    </div>
                    <div class="col-12 mb-5">
                        <label for="editSection" class="form-label">Section</label>
                        <select class="form-select" name="editSection" id="editSection" required>
                            <option selected disabled value="">Choose a section</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                        <div class="invalid-feedback">
                            Please choose a section.
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

<script src="js/search.js"></script>
<script src="js/update_student.js"></script>
<script src="js/delete-student.js"></script>
<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            let studentId = this.getAttribute('data-id');

            fetch(`validate/fetch_student.php?id=${studentId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editStudentId').value = data.student_id;
                    document.getElementById('editName').value = data.Name; // Ensure case matches your database field
                    document.getElementById('editAge').value = data.age;
                    document.getElementById('editGender').value = data.gender;
                    document.getElementById('editContact').value = data.contact;
                    document.getElementById('editAddress').value = data.address;
                    document.getElementById('editStatus').value = data.status;
                    document.getElementById('editCourse').value = data.course;
                    document.getElementById('editYear').value = data.year;
                    document.getElementById('editSection').value = data.section;

                    new bootstrap.Modal(document.getElementById('editStudentModal')).show();
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
