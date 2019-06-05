"use strict";

(function (window) {
  var joyBricks = window.joyBricks;

  joyBricks.priceSorting = function () {
    var sort_div = document.querySelector('.price-sort'),
        sort_asc_btn = document.querySelector('.price-asc'),
        sort_dsc_btn = document.querySelector('.price-dsc'),
        slider = document.querySelector(".price-filter-slider"),
        section_intro = document.querySelector(".intro"),
        slider_value = slider.value; //Visibility

    var sort_div_display = function sort_div_display() {
      return sort_div.style.display = document.body.scrollTop > 450 || document.documentElement.scrollTop > 450 ? "block" : "none";
    },
        //AJAX Request
    send_request = function send_request(event) {
      //Defining sorting action
      var selectedButtonClass = event.target.className;
      var current_action;

      if (selectedButtonClass == "fas fa-sort-amount-up" || selectedButtonClass == "filter-symbol-asc" || selectedButtonClass == "price-asc") {
        current_action = 1;
      } else if (selectedButtonClass == "fas fa-sort-amount-down" || selectedButtonClass == "filter-symbol-dsc" || selectedButtonClass == "price-dsc") {
        current_action = 0;
      }

      ; //Sending request

      var request = new XMLHttpRequest();
      request.open("GET", "price-filter.php?price-sort=".concat(current_action, "&price-range=").concat(slider_value));

      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          section_intro.innerHTML = request.responseText;
          joyBricks.priceSorting();
          joyBricks.priceFilter();
          joyBricks.addToCart();
          joyBricks.scroller();
        }

        ;
      };

      request.send();
    }; //Registering handlers


    if (document.addEventListener) {
      window.addEventListener("scroll", sort_div_display);
      sort_asc_btn.addEventListener("click", send_request);
      sort_dsc_btn.addEventListener("click", send_request);
    } else console.log("Method 'addEventListener' cannot be applied");
  };

  joyBricks.priceSorting();
  window.joyBricks = joyBricks;
})(window);
//# sourceMappingURL=price-sorting.js.map
