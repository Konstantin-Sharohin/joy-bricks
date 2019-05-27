(function (window) {

    const joyBricks = window.joyBricks || {};

    joyBricks.scroller = function () {
        const scroll_btn = document.querySelector('.return-to-top-btn'),
            price_range_div = document.querySelector('.price-range');

        const btnDisplay = () => {
            scroll_btn.style.display = (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) ? "block" : "none";
        };

        const pageUp = () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
            price_range_div.style.width = "0px";
            price_range_div.style.visibility = "hidden";
        };

        if (document.addEventListener) {
            window.addEventListener("scroll", btnDisplay);
            scroll_btn.addEventListener("click", pageUp);
        } else console.log("Method 'addEventListener' cannot be applied");
    };

    joyBricks.scroller();

    window.joyBricks = joyBricks;

})(window);