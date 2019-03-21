(function () {
    if (document.addEventListener) {
        const icon_container = document.querySelector(".toggle-icon"),
            icon = document.querySelector(".toggle-icon i"),
            navElements = document.querySelectorAll(".nav-element-link, .cart-icon"),
            toggle = (event) => {
                event.preventDefault();
                for (let i = 0; i < navElements.length; i++) {
                    navElements[i].classList.toggle("responsive")
                }
                icon.className = icon.className == "fas fa-angle-down" ? "fas fa-angle-up" : "fas fa-angle-down";
            };
        icon_container.addEventListener("click", toggle);
    } else if (document.attachEvent) {
        var icon_container = document.getElementById("#switcher"),
            navElements = document.getElementsByClassName(".nav-element-link, .cart-icon"),
            toggle = function (event) {
                event.returnValue = false;
                for (let i = 0; i < navElements.length; i++) {
                    navElements[i].classList.toggle("responsive")
                }
                icon.className = icon.className == "fas fa-angle-down" ? "fas fa-angle-up" : "fas fa-angle-down";
            };
        icon_container.attachEvent("onclick", toggle);
    }
})();