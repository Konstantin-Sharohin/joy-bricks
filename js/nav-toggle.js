
(function () {
    if (document.addEventListener) {
        const icon = document.querySelector(".toggle-icon"),
            navElements = document.querySelectorAll(".navElement"),
            toggle = () => {
                for (let i = 0; i < navElements.length; i++) {
                    navElements[i].classList.toggle("responsive")
                }
            };
        icon.addEventListener("click", toggle);
    } else if (document.attachEvent) {
        var icon = document.getElementsByClassName(".toggle-icon"),
            navElements = document.getElementsByClassName(".navElement"),
        toggle = function() {
            for (let i = 0; i < navElements.length; i++) {
                navElements[i].classList.toggle("responsive")
            }
        };
        icon.attachEvent("onclick", toggle);
    }
})();