"use strict";

(function () {
  var cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
      cart_page_container = document.querySelector(".cart-page-container"),
      cart_page_inner_container = document.querySelector(".cart-page-inner-container");

  if (!cart_array || cart_array.length == 0) {
    cart_page_inner_container.style.display = "none";
    var note = document.createElement("p");
    note.style.textAlign = "center";
    note.innerHTML = "<i>Ваша корзина пуста...</i>";
    cart_page_container.appendChild(note);
  } else {
    var carts_length = cart_array.length,
        cart_table = document.querySelector(".table"),
        cart_table_row_total = document.querySelector(".row.total-row"),
        total_header = document.querySelector(".row.header.total-header"),
        cart_total_price = 0;

    for (var i = 0; i < carts_length; i++) {
      var table_row = document.createElement("div");
      table_row.classList.add("row");
      table_row.classList.add("items");
      var cell_title = document.createElement("div");
      cell_title.classList.add("cell");
      cell_title.dataset.title = "Наименование";
      cell_title.setAttribute("title", cart_array[i].title);
      cell_title.innerHTML = "<div class=\"cart-page-item\">\n                                            <img class=\"cart-page-item-img\" src=\"".concat(cart_array[i].photo, "\" alt=\"\u0412\u0430\u0448 \u0437\u0430\u043A\u0430\u0437\">\n                                        </div>\n                                        <div class=\"cart-page-item-description\">\n                                            ").concat(cart_array[i].title, "\n                                        </div>\n                                        <div class=\"cart-page-item-code\">\n                                            ").concat(cart_array[i].code, "\n                                        </div>");
      var cell_quantity = document.createElement("div");
      cell_quantity.classList.add("cell");
      cell_quantity.dataset.title = "Количество (шт.)";
      cell_quantity.dataset.quantity = cart_array[i].quantity;
      cell_quantity.innerHTML = "<div class=\"cart-page-item-quantity\">\n                                                <span class=\"item-delete\">\n                                                    <i class=\"fas fa-trash-alt\"></i>\n                                                </span>\n                                                <button class=\"item-substract\">\u2013</button>\n                                                <span class=\"item-quantity\">\n                                                    ".concat(cart_array[i].quantity, "\n                                                </span>\n                                                <button class=\"item-add\">+</button>\n                                        </div>");
      var cell_price = document.createElement("div");
      cell_price.classList.add("cell");
      cell_price.dataset.title = "Цена (за шт.)";
      cell_price.innerHTML = "<div class=\"cart-page-item-price\">\n                                            <span class=\"item-price\">\n                                                ".concat(cart_array[i].price, "\n                                            </span>\n                                        </div>");
      table_row.appendChild(cell_title);
      table_row.appendChild(cell_quantity);
      table_row.appendChild(cell_price);
      cart_table.insertBefore(table_row, total_header);
      cart_total_price += parseInt(cart_array[i].price) * cart_array[i].quantity;
    }

    window.localStorage.setItem("cart_total_price", cart_total_price);
    var cell_total = document.createElement("div");
    cell_total.classList.add("cell");
    cell_total.dataset.title = "Итого";
    cell_total.innerHTML = cart_total_price + ' грн';
    cart_table_row_total.appendChild(cell_total);
  }
})();
//# sourceMappingURL=create-cart-page.js.map
