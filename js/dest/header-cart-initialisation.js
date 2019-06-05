"use strict";

var cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
    header_cart_icon = document.querySelector(".cart-icon span"),
    counter = header_cart_icon.dataset.counter = parseInt(window.localStorage.getItem("cart_counter")) || 0;
//# sourceMappingURL=header-cart-initialisation.js.map
