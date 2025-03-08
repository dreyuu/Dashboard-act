async function fetchChartData() {
    try {
        const response = await fetch("validate/dashboard_data.php");
        const data = await response.json();

        // Extract data for College vs. SHS
        const typeLabels = data.typeData.map((item) => `${item.status}: ${item.count}`);
        const typeValues = data.typeData.map((item) => item.count);
        const totalStudents = data.totalStudents;
        const typeColors = ["#800000", "#ffdddd"]; // Adjusted to fit theme

        // Extract data for Gender (Male vs. Female)
        const genderLabels = data.genderData.map((item) => `${item.gender}: ${item.count}`);
        const genderValues = data.genderData.map((item) => item.count);
        const genderColors = ["#b30000", "#ff6384"]; // Adjusted for contrast

        const yearLabels = data.yearData.map((item) => `${item.year}: ${item.count}`);
        const yearValues = data.yearData.map((item) => item.count);

        const yearColors = [
            "rgba(128, 0, 0, 0.8)", // Dark Maroon
            "rgba(150, 50, 50, 0.8)",
            "rgba(179, 0, 0, 0.8)", // Muted Red
            "rgba(76, 0, 0, 0.8)", // Deep Maroon
        ];

        /// ✅ First-Year Students Per Course
        // const firstYearData = data.firstYearData.filter((item) => item.year === '1st');
        const firstYearLabels = data.firstYearData.map((item) => `${item.course}: ${item.count}`);
        const firstYearValues = data.firstYearData.map((item) => item.count);
        const firstYearColors = data.firstYearData.map(() => getRandomColor());

        const secondYearLabels = data.secondYearData.map((item) => `${item.course}: ${item.count}`);
        const secondYearValues = data.secondYearData.map((item) => item.count);
        const secondYearColors = data.secondYearData.map(() => getRandomColor());

        const thirdYearLabels = data.thirdYearData.map((item) => `${item.course}: ${item.count}`);
        const thirdYearValues = data.thirdYearData.map((item) => item.count);
        const thirdYearColors = data.thirdYearData.map(() => getRandomColor());

        const fourthYearLabels = data.fourthYearData.map((item) => `${item.course}: ${item.count}`);
        const fourthYearValues = data.fourthYearData.map((item) => item.count);
        const fourthYearColors = data.fourthYearData.map(() => getRandomColor());

        const eleventhLabels = data.shsData11.map((item) => `${item.course}: ${item.count}`);
        const eleventhValues = data.shsData11.map((item) => item.count);
        const eleventhColors = data.shsData11.map(() => getRandomColor());

        const twelveLabels = data.shsData12.map((item) => `${item.course}: ${item.count}`);
        const twelveValues = data.shsData12.map((item) => item.count);
        const twelveColors = data.shsData12.map(() => getRandomColor());


        createBarChart(
            "yearLevelChart",
            yearLabels,
            yearValues,
            yearColors);
        // Create charts
        createDoughnutChart(
            "doughnutChart",
            typeLabels,
            typeValues,
            typeColors,
            totalStudents
        );
        createDoughnutChart(
            "genderChart",
            genderLabels,
            genderValues,
            genderColors
        );
        createDoughnutChart(
            "firstYearChart",
            firstYearLabels,
            firstYearValues,
            firstYearColors
        );
        createDoughnutChart(
            "secondYearChart",
            secondYearLabels,
            secondYearValues,
            secondYearColors
        );
        createDoughnutChart(
            "thirdYearChart",
            thirdYearLabels,
            thirdYearValues,
            thirdYearColors
        );
        createDoughnutChart(
            "fourthYearChart",
            fourthYearLabels,
            fourthYearValues,
            fourthYearColors
        );
        createDoughnutChart(
            "11SHSChart",
            eleventhLabels,
            eleventhValues,
            eleventhColors
        );
        createDoughnutChart(
            "12SHSChart",
            twelveLabels,
            twelveValues,
            twelveColors
        );

    } catch (error) {
        console.error("Error fetching chart data:", error);
    }
}

function createDoughnutChart(
    canvasId,
    chartLabels,
    chartData,
    chartColors,
    total = null
) {
    const ctx = document.getElementById(canvasId).getContext("2d");
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: chartLabels,
            datasets: [
                {
                    data: chartData,
                    backgroundColor: chartColors,
                    hoverBackgroundColor: chartColors.map((color) => color + "CC"),
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "right",
                    labels: {
                        font: {
                            size: 16, // ✅ Increased legend font size for better visibility
                        },
                        color: "var(--clr-font)", // ✅ Uses theme colors
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `${chartLabels[tooltipItem.dataIndex]}`;
                        },
                    },
                },
                // ✅ Custom plugin to add total in the center
                centerText: {
                    text: total ? total.toString() : "",
                    fontSize: 24,
                    color: "var(--clr-font)", // Uses theme colors
                },
            },
            animation: {
                animateScale: true,
            },
        },
        plugins: [
            {
                id: "centerText",
                beforeDraw: function (chart) {
                    const { width, height } = chart;
                    const ctx = chart.ctx;
                    const text = chart.config.options.plugins.centerText.text;
                    if (!text) return;

                    ctx.restore();
                    const fontSize = chart.config.options.plugins.centerText.fontSize || 20;
                    ctx.font = `${fontSize}px Arial`;
                    ctx.fillStyle = chart.config.options.plugins.centerText.color || "#000";
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    ctx.fillText(text, width / 4, height / 2);
                    ctx.save();
                },
            },
        ],
    });
}


function createBarChart(canvasId, chartLabels, chartData, chartColors) {
    const ctx = document.getElementById(canvasId).getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: chartLabels,
            datasets: [
                {
                    label: "Number of Students",
                    data: chartData,
                    backgroundColor: chartColors,
                    borderColor: chartColors.map((color) => color.replace("0.8", "1")),
                    borderWidth: 1,
                    borderRadius: 10,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: { size: 14 },
                        color: "var(--foreground)",
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            return `Year ${chartLabels[tooltipItem.dataIndex]}: ${chartData[tooltipItem.dataIndex]} students`;
                        },
                    },
                },
            },
            scales: {
                x: {
                    ticks: {
                        color: "var(--clr-font)",
                        font: { size: 14 },
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: "var(--clr-font)",
                        font: { size: 14 },
                    },
                    grid: {
                        color: "rgba(255, 255, 255, 0.2)",
                    },
                },
            },
            animation: {
                duration: 1500,
                easing: "easeOutBounce",
            },
        },
    });
}



fetchChartData(); // Fetch data on page load

// ✅ Function to generate random colors
function getRandomColor() {
    return `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
}
