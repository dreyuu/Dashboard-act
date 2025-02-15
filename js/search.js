// Store selected filters
let selectedFilters = {
    course: "All",
    year: "All",
    section: "All",
    search: "" // New search filter
};

const sortDropdown = document.querySelectorAll("#sortList .dropdown-item");
let tbody = document.querySelector("tbody");
let allRows = Array.from(tbody.querySelectorAll("tr")); // Store original rows
let currentSortType = ""; // Store the last sorting type

// Function to update the table based on filters and search
function updateTable() {
    let tableRows = document.querySelectorAll("tbody tr"); // Select tbody rows

    // Remove the "No students found" message if it exists
    let noStudentsRow = document.querySelector("#noStudentsRow");
    if (noStudentsRow) {
        noStudentsRow.remove();
    }

    let hasVisibleRows = false;
    let searchQuery = selectedFilters.search.toLowerCase(); // Convert search query to lowercase for case-insensitive search

    tableRows.forEach(row => {
        let course = row.getAttribute("data-course");
        let year = row.getAttribute("data-year");
        let section = row.getAttribute("data-section");

        let courseMatch = (selectedFilters.course === "All" || course === selectedFilters.course);
        let yearMatch = (selectedFilters.year === "All" || year === selectedFilters.year);
        let sectionMatch = (selectedFilters.section === "All" || section === selectedFilters.section);

        // Search filter - Check if any cell contains the search query
        let rowText = row.textContent.toLowerCase();
        let searchMatch = searchQuery === "" || rowText.includes(searchQuery);

        if (courseMatch && yearMatch && sectionMatch && searchMatch) {
            row.style.display = ""; // Show row
            hasVisibleRows = true;
        } else {
            row.style.display = "none"; // Hide row
        }
    });

    // If no rows match, show a message
    if (!hasVisibleRows) {
        let noDataRow = document.createElement("tr");
        noDataRow.id = "noStudentsRow"; // Give it an ID for easy removal
        noDataRow.innerHTML = `<td colspan="11" class="text-center">No students found</td>`;
        tbody.appendChild(noDataRow);
    } else {
        // If rows are found, restore the original data if "All" is selected
        if (selectedFilters.course === "All" && selectedFilters.year === "All" && selectedFilters.section === "All") {
            tbody.innerHTML = ""; // Clear table body
            allRows.forEach(row => tbody.appendChild(row)); // Restore original rows
        }
    }

    // Reapply sorting after filtering
    if (currentSortType) {
        sortTable(currentSortType);
    }
}

// Event listener for dropdown filters
document.querySelectorAll(".dropdown-item").forEach(item => {
    item.addEventListener("click", function () {
        let filterType = this.closest(".dropdown-menu").id; // Get the dropdown type
        let value = this.getAttribute("data-course"); // Get the selected value

        if (filterType === "courseList") {
            selectedFilters.course = value;
            document.getElementById("courseDropdown").innerText = this.innerText;
        } else if (filterType === "yearList") {
            selectedFilters.year = value;
            document.getElementById("yearDropdown").innerText = this.innerText;
        } else if (filterType === "sectionList") {
            selectedFilters.section = value;
            document.getElementById("sectionDropdown").innerText = this.innerText;
        } else if (filterType === "sortList") {
            selectedFilters.sort = value;
            document.getElementById('sortDropdown').innerText = this.innerText;
        }

        updateTable(); // Apply the filter
    });
});

// Search input event listener
document.querySelector(".search input").addEventListener("input", function () {
    selectedFilters.search = this.value.trim();
    updateTable(); // Apply search filter
});

// Sort Dropdown
sortDropdown.forEach(item => {
    item.addEventListener("click", function () {
        const sortType = this.getAttribute("data-course");
        currentSortType = sortType; // Save the current sort type
        sortTable(sortType);
    });
});

// Sorting function
function sortTable(sortType) {
    let rows = Array.from(tbody.querySelectorAll("tr")).filter(row => row.style.display !== "none"); // Sort only visible rows

    if (sortType === "All") {
        // Reset to original order
        tbody.innerHTML = "";
        allRows.forEach(row => tbody.appendChild(row));
        return;
    }

    rows.sort((a, b) => {
        let valA, valB;

        switch (sortType) {
            case "A-Z":
                valA = a.cells[1].innerText.toLowerCase();
                valB = b.cells[1].innerText.toLowerCase();
                return valA.localeCompare(valB);

            case "Z-A":
                valA = a.cells[1].innerText.toLowerCase();
                valB = b.cells[1].innerText.toLowerCase();
                return valB.localeCompare(valA);

            case "Male":
                valA = a.cells[3].innerText.toLowerCase();
                valB = b.cells[3].innerText.toLowerCase();
                return valA === "male" ? -1 : 1;

            case "Female":
                valA = a.cells[3].innerText.toLowerCase();
                valB = b.cells[3].innerText.toLowerCase();
                return valA === "female" ? -1 : 1;

            default:
                return 0; // No sorting
        }
    });

    tbody.innerHTML = ""; // Clear existing rows
    rows.forEach(row => tbody.appendChild(row)); // Append sorted rows
}
