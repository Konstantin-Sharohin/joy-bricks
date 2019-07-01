(function (window) {

    const joyBricks = window.joyBricks;

    joyBricks.priceFilter = function() {
        const filters_div = document.querySelector('.price-filters'),
        filter_btn = document.querySelector('.price-filter'),
        price_range_div = document.querySelector('.price-range'),
        slider = document.querySelector(".price-filter-slider"),
        filter_output = document.querySelector(".price-filter-output"),
        section_intro = document.querySelector(".intro");

        filter_output.innerHTML = slider.value;

        //Visibility
        const filter_btn_display = () => filters_div.style.display = (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) ? "block" : "none";

        const price_range_show = event => {
            if (event.target.className == "price-filter" || event.target.className == "filter-symbol" || event.target.className == "fas fa-filter") {
                price_range_div.style.width = price_range_div.style.width == "220px" ? "0px" : "220px";
                price_range_div.style.visibility = price_range_div.style.visibility == "visible" ? "hidden" : "visible";
                price_range_div.style.padding = price_range_div.style.width > "0px" ? "0.5em" : "0px";
                filter_output.style.width = price_range_div.style.visibility == "visible" ? "80px" : "0px";
            }
        };

            //Price filter calculation
        const filter_calculation = function () { filter_output.innerHTML = this.value };

            //AJAX Request
        const send_request = () => {
            const request = new XMLHttpRequest();

            request.open("GET", "price-filter.php?price-range=" + slider.value);
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    section_intro.innerHTML = request.responseText;
                    joyBricks.priceFilter();
                    joyBricks.priceSorting();
                    joyBricks.addToCart();
                    joyBricks.scroller();
                }
            };
            request.send();
        };

        //Registering handlers
        if (document.addEventListener) {
            window.addEventListener("scroll", filter_btn_display);
            filter_btn.addEventListener("click", price_range_show);
            slider.addEventListener("input", filter_calculation);
            slider.addEventListener("change", send_request);
        } else console.log("Method 'addEventListener' cannot be applied");
    };

    joyBricks.priceFilter();

})(window);