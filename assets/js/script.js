
document.addEventListener("click", e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]");
    if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

    let currentDropdown;
    if (isDropdownButton) {
        currentDropdown = e.target.closest("[data-dropdown]");
        currentDropdown.classList.toggle("active");
    }

    
});

function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('responsive-header-nav')) {
        menuMobile.classList.remove('responsive-header-nav');
    } else {
        menuMobile.classList.add('responsive-header-nav');
    }
}