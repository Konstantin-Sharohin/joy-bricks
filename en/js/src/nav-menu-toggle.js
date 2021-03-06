(function () {
    if (document.addEventListener) {
        let icon_container = document.querySelector(".toggle-icon"),
            icon = document.querySelector(".toggle-icon i"),
            navElements = document.querySelectorAll(".nav-element-link, .cart-icon"),
            toggle = (event) => {
                event.preventDefault();
                for (let i = 0; i < navElements.length; i++) {
                    navElements[i].classList.toggle("responsive");
                }
                icon.className = icon.className == "fas fa-angle-down" ? "fas fa-angle-up" : "fas fa-angle-down";
            };
        icon_container.addEventListener("click", toggle);
    } else console.log("Method 'addEventListener' cannot be applied");
})();