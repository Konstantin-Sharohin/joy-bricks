"use strict";

(function () {
  var cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
      summary_container = document.querySelector(".cart-summary-container"),
      page_container = document.querySelector(".order-submit-inner-container");
  var cart_summary = document.createElement("div");
  cart_summary.classList.add("cart-summary");
  var cart_summary_title_column = document.createElement("div");
  cart_summary_title_column.classList.add("cart-summary-title");
  var cart_summary_quantity_column = document.createElement("div");
  cart_summary_quantity_column.classList.add("cart-summary-quantity");
  var cart_summary_price_column = document.createElement("div");
  cart_summary_price_column.classList.add("cart-summary-price");
  var total_price = 0;
  cart_array.forEach(function (element) {
    var cart_summary_title_item = document.createElement("p"); //cart_summary_title_item.classList.add("");

    cart_summary_title_item.textContent = element.title;
    cart_summary_title_column.appendChild(cart_summary_title_item);
    var cart_summary_quantity_item = document.createElement("p"); //cart_summary_quantity_item.classList.add("");

    cart_summary_quantity_item.textContent = element.quantity;
    cart_summary_quantity_column.appendChild(cart_summary_quantity_item);
    var cart_summary_price_item = document.createElement("p"); //cart_summary_price_item.classList.add("");

    cart_summary_price_item.textContent = element.price;
    total_price += parseInt(element.price) * parseInt(element.quantity);
    cart_summary_price_column.appendChild(cart_summary_price_item);
    cart_summary.appendChild(cart_summary_title_column);
    cart_summary.appendChild(cart_summary_quantity_column);
    cart_summary.appendChild(cart_summary_price_column);
  }); //Creating row "Total Price" and buttons "Back" and "Send"

  var cart_summary_totalprice_row = document.createElement("div");
  cart_summary_totalprice_row.textContent = "Итого: " + total_price + " грн";
  cart_summary_totalprice_row.classList.add("cart-summary-totalprice"); //Creating buttons "Send" and "Return"

  var cart_summary_send_button = document.createElement("div");
  cart_summary_send_button.classList.add("cart-submit-btn", "send");
  var cart_summary_send_button_span = document.createElement("span");
  cart_summary_send_button_span.classList.add("cart-submit");
  var cart_summary_send_button_span_i = document.createElement("i");
  cart_summary_send_button_span_i.classList.add("fas", "fa-check");
  cart_summary_send_button_span.appendChild(cart_summary_send_button_span_i);
  cart_summary_send_button.appendChild(cart_summary_send_button_span);
  var cart_summary_return_button = document.createElement("div");
  cart_summary_return_button.classList.add("cart-submit-btn", "return");
  var cart_summary_return_button_span = document.createElement("span");
  cart_summary_return_button_span.classList.add("back-to-cart");
  var cart_summary_return_button_span_i = document.createElement("i");
  cart_summary_return_button_span_i.classList.add("fas", "fa-arrow-left");
  cart_summary_return_button_span.appendChild(cart_summary_return_button_span_i);
  cart_summary_return_button.appendChild(cart_summary_return_button_span);
  var button_container = document.createElement("div");
  button_container.classList.add("cart-summary-button-container");
  summary_container.appendChild(cart_summary);
  summary_container.appendChild(cart_summary_totalprice_row);
  button_container.append(cart_summary_return_button, cart_summary_send_button);
  page_container.appendChild(button_container);
})();
//# sourceMappingURL=cart-summary.js.map
