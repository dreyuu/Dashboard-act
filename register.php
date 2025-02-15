<?php include 'inc/sidebar.php' ?>


<div class="border-bottom h-auto w-100 p-3 d-flex border-bottom-100 border-2 mb-3">
    <span id="page-title" class="fs-5 fw-medium ms-3">REGISTRATION</span>
</div>

<div class="container-fluid w-75 pt-5">
    <div class="w-100  text-center mb-5">
        <h1 class="fs-1 text-uppercase">Student Registration</h1>
    </div>
    <form id="registerForm" class="row g-3 needs-validation" method="post" novalidate>
        <div class="col-md-4">
            <label for="fname" class="form-label">First name</label>
            <input type="text" name="fname" class="form-control" id="fname" required>
            <div class="invalid-feedback">
                Please provide your first name.
            </div>
        </div>
        <div class="col-md-4">
            <label for="lname" class="form-label">Last name</label>
            <input type="text" name="lname" class="form-control" id="lname" required>
            <div class="invalid-feedback">
                Please provide your last name.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">M.I (Optional)</label>
            <input type="text" name="mi" class="form-control" maxlength="1" id="m-i">
        </div>
        <div class="col-md-4">
            <label for="age" class="form-label">Age</label>
            <input type="number" name="age" class="form-control" id="age" min="1" max="99" required>
            <div class="invalid-feedback">
                Please provide your age.
            </div>
        </div>
        <div class="col-md-4">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" id="gender" required>
                <option selected disabled value="">Choose a gender</option>
                <option>Female</option>
                <option>Male</option>
            </select>
            <div class="invalid-feedback">
                Please choose a gender.
            </div>
        </div>
        <div class="col-md-4">
            <label for="contact" class="form-label">Contact Number</label>
            <input type="tel" name="contact" pattern="[0-9]{11,}" maxlength="11" class="form-control" id="contact" required>
            <div class="invalid-feedback">
                Please provide your contact number (must be 11 digits).
            </div>
        </div>
        <div class="col-md-8">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="address" required>
            <div class="invalid-feedback">
                Please provide an address.
            </div>
        </div>
        <div class="col-md-4">
            <label for="status" class="form-label">SHS/Collage</label>
            <select class="form-select" name="status" id="status" required>
                <option selected disabled value="">Choose...</option>
                <option>SHS</option>
                <option>College</option>
            </select>
            <div class="invalid-feedback">
                Please select if shs/college.
            </div>
        </div>
        <div class="col-md-4">
            <label for="course" class="form-label">Course</label>
            <select class="form-select" name="course" id="course" required>
                <option selected disabled value="">Choose a course</option>
                <option>BSIT</option>
                <option>BSHM</option>
                <option>BSOA</option>
                <option>BSBA</option>
            </select>
            <div class="invalid-feedback">
                Please choose a course.
            </div>
        </div>
        <div class="col-md-4">
            <label for="year" class="form-label">Year</label>
            <select class="form-select" name="year" id="year" required>
                <option selected disabled value="">Choose a year</option>
                <option>1st</option>
                <option>2nd</option>
                <option>3rd</option>
                <option>4th</option>
            </select>
            <div class="invalid-feedback">
                Please choose a year.
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <label for="section" class="form-label">Section</label>
            <select class="form-select" name="section" id="section" required>
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
            <button class="btn btn-primary m-auto w-75 p-2" type="submit" id="submit" name="register_student">REGISTER</button>
        </div>
    </form>
</div>
<div class="d-flex w-100 justify-content-center align-content-center position-relative">
    <div id="success-alert" class="alert alert-success p-3 d-flex justify-content-center align-content-center" role="alert" ></div>
    <div id="error-alert" class="alert alert-danger p-3 d-flex justify-content-center align-content-center" role="alert"></div>
    <div id="warning-alert" class="alert alert-warning p-3 d-flex justify-content-center align-content-center" role="alert" ></div>
</div>




<?php include './inc/footer.php'; ?>

<script src="js/validateForm.js"></script>
