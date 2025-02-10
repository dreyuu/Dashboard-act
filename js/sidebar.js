
document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector("#toggle-btn");
    const sidebar = document.querySelector(".sidebar");
    const sidebarItems = document.querySelectorAll(".sidebar-item");
    const logoutBtn = document.getElementById('logout-btn');

    // Toggle sidebar expand on button click
    hamburger.addEventListener("click", function () {
        sidebar.classList.toggle("expand");
    });

    // Retrieve active item from localStorage
    const activeIndex = localStorage.getItem("activeSidebarItem");
    if (activeIndex !== null && sidebarItems[parseInt(activeIndex)]) {
        sidebarItems[parseInt(activeIndex)].classList.add("active");
    }

    sidebarItems.forEach((item, index) => {
        item.addEventListener("click", function (event) {
            // Prevent affecting submenu items
            if (this.closest(".sidebar-dropdown")) return;

            // Remove active class from all sidebar items
            sidebarItems.forEach((i) => i.classList.remove("active"));

            // Add active class to the clicked item
            this.classList.add("active");
            // Store the active index in localStorage
            localStorage.setItem("activeSidebarItem", index);
        });
    });

    if(logoutBtn){
        logoutBtn.addEventListener('click', function(){
            localStorage.removeItem("activeSidebarItem");
            console.log("Active sidebar item removed on logout");
        });
    }
});
