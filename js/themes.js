document.addEventListener("DOMContentLoaded", function () {
    const themeButtons = document.querySelectorAll("[data-bs-theme-value]");
    const htmlElement = document.documentElement;
    const storedTheme = localStorage.getItem("theme") || "light";

    function applyTheme(theme) {
        if (theme === "dark") {
            htmlElement.classList.add("darkmode");
        } else {
            htmlElement.classList.remove("darkmode");
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
