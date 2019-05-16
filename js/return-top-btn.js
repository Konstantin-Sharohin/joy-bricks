(function () {
    if (document.addEventListener) {
        let scrollBtnDisplay = (event) => {
            scroll_btn.style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
        };

        let pageUp = (event) => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        };

        let scroll_btn = document.querySelector('.return-to-top-btn');

        window.addEventListener("scroll", scrollBtnDisplay);
        scroll_btn.addEventListener("click", pageUp);
    };


    if (document.attachEvent) {
        let scrollBtnDisplay = function (event) {
            event.returnValue = false;
            scroll_btn[0].style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
        };

        let pageUp = (event) => {
            event.returnValue = false;
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        };

        let scroll_btn = document.getElementsByClassName(".return-to-top-btn");

        window.attachEvent("scroll", scrollBtnDisplay);
        scroll_btn.attachEvent("click", pageUp);
    };

})();