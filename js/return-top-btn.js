(function () {
    if (document.addEventListener) {
        const scroll_btn = document.querySelector('.return-to-top-btn'),
            scrollBtnDisplay = (event) => {
                event.preventDefault();
                scroll_btn.style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
            },
            pageUp = (event) => {
                event.preventDefault();
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            };
        window.addEventListener("scroll", scrollBtnDisplay);
        scroll_btn.addEventListener("click", pageUp);
    } else if (document.attachEvent) {
        const scroll_btn = document.getElementsByClassName(".return-to-top-btn");
        scrollBtnDisplay = function (event) {
            event.returnValue = false;
            scroll_btn[0].style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
        };
        const pageUp = (event) => {
            event.returnValue = false;
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        };
        window.attachEvent("scroll", scrollBtnDisplay);
        scroll_btn.attachEvent("click", pageUp);
    };
})();