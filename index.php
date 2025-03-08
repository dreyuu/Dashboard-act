<?php include 'inc/sidebar.php' ?>
<div class="border-bottom h-auto w-100 p-3 d-flex border-bottom-100 border-2 mb-3 align-content-center justify-content-between">
    <div>
        <button id="toggle-btn" class="p-0" type="button"><i class="fa-duotone fa-solid fa-bars mt-1" style="color: var(--foreground); display:none;"></i></button>
        <span id="page-title" class="fs-5 fw-medium ms-3">DASHBOARD</span>
    </div>
    <img src="img/logo.png" alt="logo.png" class="page-logo">
</div>

<div class="container-fluid d-flex flex-column p-3 gap-5">
    <div class="container w-100 d-flex justify-content-evenly m-0 gap-4">
        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center">
            <h4 class="chart-title">Total Students</h4>
            <div class="doughnut-container">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>

        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center">
            <h4 class="chart-title ">Gender Chart</h4>
            <div class="doughnut-container">
                <canvas id="genderChart"></canvas>
            </div>
        </div>

        <!-- <h2 class="chart-title">Number of students per Year</h2> -->
        <div class="chart-container d-flex justify-content-center">
            <canvas id="yearLevelChart"></canvas>
        </div>
    </div>

    <h4 class="chart-title">College Student</h4>
    <div class="container w-100 d-flex justify-content-evenly m-0 gap-4">
        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center w-100">
            <h4 class="chart-title">1st year Student per course</h4>
            <div class="doughnut-container">
                <canvas id="firstYearChart"></canvas>
            </div>
        </div>
        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center">
            <h4 class="chart-title">2nd year Student per course</h4>
            <div class="doughnut-container">
                <canvas id="secondYearChart"></canvas>
            </div>
        </div>
        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center">
            <h4 class="chart-title">3rd year Student per course</h4>
            <div class="doughnut-container">
                <canvas id="thirdYearChart"></canvas>
            </div>
        </div>
        <div class="chart-card flex-column d-flex justify-content-center gap-2 align-content-center">
            <h4 class="chart-title">4th year Student per course</h4>
            <div class="doughnut-container">
                <canvas id="fourthYearChart"></canvas>
            </div>
        </div>
    </div>


    <h4 class="chart-title">SHS Student</h4>
    <div class="container w-100 d-flex justify-content-start m-0 gap-4">
        <div class="chart-card flex-column d-flex justify-content-start gap-2 align-content-center">
            <h4 class="chart-title">11 SHS Student per course</h4>
            <div class="doughnut-container">
                <canvas id="11SHSChart"></canvas>
            </div>
        </div>
        <div class="chart-card flex-column d-flex justify-content-start gap-2 align-content-center">
            <h4 class="chart-title">12 SHS Student per course</h4>
            <div class="doughnut-container">
                <canvas id="12SHSChart"></canvas>
            </div>
        </div>
    </div>
</div>




<?php include './inc/footer.php'; ?>
<script src="js/dashboard.js"></script>
