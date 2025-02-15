document.addEventListener("DOMContentLoaded", function () {
    const themeButtons = document.querySelectorAll("[data-bs-theme-value]");
    const htmlElement = document.documentElement;
    const storedTheme = localStorage.getItem("theme") || "light";
    const tableElement = document.querySelector('.table'); // Renamed variable for clarity

    function applyTheme(theme) {
        if (theme === "dark") {
            htmlElement.classList.add("darkmode");
            if (tableElement) tableElement.classList.add('table-dark'); // Ensure table exists
        } else {
            htmlElement.classList.remove("darkmode");
            if (tableElement) tableElement.classList.remove('table-dark');
        }
        
        localStorage.setItem("theme", theme);
    }

    // Apply stored theme on page load
    applyTheme(storedTheme);

    // Add event listeners to theme buttons
    themeButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            const selectedTheme = this.getAttribute("data-bs-theme-value");
            applyTheme(selectedTheme);
        });
    });
});
