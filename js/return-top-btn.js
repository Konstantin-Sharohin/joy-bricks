(function () {
    if (document.addEventListener) {
        let scroll_btn = document.querySelector('.return-to-top-btn'),
            scrollBtnDisplay = (event) => {
                scroll_btn.style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
            },
            pageUp = (event) => {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            };
        window.addEventListener("scroll", scrollBtnDisplay);
        scroll_btn.addEventListener("click", pageUp);
    } else if (document.attachEvent) {
        let scroll_btn = document.getElementsByClassName(".return-to-top-btn");
        scrollBtnDisplay = function (event) {
            event.returnValue = false;
            scroll_btn[0].style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
        };
        let pageUp = (event) => {
            event.returnValue = false;
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        };
        window.attachEvent("scroll", scrollBtnDisplay);
        scroll_btn.attachEvent("click", pageUp);
    };
})();