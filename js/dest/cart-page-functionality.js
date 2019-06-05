"use strict";

(function () {
  var cart_array = JSON.parse(window.localStorage.getItem("filled_cart")); //if the Cart Array exists and is not empty - get counter and reference to html-elements

  if (cart_array && cart_array.length != 0) {
    //declaring functions for "empty cart", "row calculation", "order item object" and "update_save" (in order to avoid repetitions below)
    var show_empty_cart = function show_empty_cart() {
      cart_page_inner_container.classList.add("deletion-animation");
      setTimeout(function () {
        return cart_page_inner_container.remove();
      }, 1000);
      var note = document.createElement("p");
      note.style.textAlign = "center";
      note.innerHTML = "<i>Ваша корзина пуста...</i>";
      cart_page_container.appendChild(note);
    };

    var calculate_rows = function calculate_rows(params) {
      var row_nodeList = items_container.querySelectorAll(".row.items");

      if (row_nodeList.length == 0) {
        params.total_price = 0;
        return params.total_price;
      }

      ;
      var row_nodeList_length = row_nodeList.length,
          i = 0,
          total_price = 0;

      for (i; i < row_nodeList_length; i++) {
        row_item_price = parseInt(row_nodeList[i].querySelector(".item-price").textContent);
        row_quantity = parseInt(row_nodeList[i].querySelector(".item-quantity").textContent);
        row_total_price = row_item_price * row_quantity;
        total_price += row_total_price;
      }

      ;
      params.total_price = total_price;
    };

    var create_item_object = function create_item_object(params) {
      var current_item = {
        "title": params.current_button_container.querySelector('.cell:first-child').getAttribute('title'),
        "photo": params.current_button_container.querySelector('.cart-page-item-img').getAttribute('src'),
        "price": params.current_button_container.querySelector('.cart-page-item-price').textContent,
        "code": params.current_button_container.querySelector('.cart-page-item-code').textContent,
        "quantity": params.current_item_quantity
      };
      params.current_item = current_item;
    };

    var update_save = function update_save(params) {
      create_item_object(params);
      calculate_rows(params);
      items_container.querySelector(".row.total-row div:last-child").textContent = params.total_price + ' грн';
      counter = params.total_quantity;
      var item_index = cart_array.findIndex(function (i) {
        return i.title == params.current_item.title;
      });
      cart_array.splice(item_index, 1, params.current_item);
      window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
      window.localStorage.setItem("cart_counter", counter);
      window.localStorage.setItem("cart_total_price", params.total_price);
    };

    //One of the two main event handlers on "click" event
    var action = function action(event) {
      var counter = parseInt(window.localStorage.getItem("cart_counter")),
          selectedButtonClass = event.target.className,
          target = event.target;
      var current_button_container;

      if (selectedButtonClass == "fas fa-trash-alt") {
        current_button_container = target.parentNode.parentNode.parentNode.parentNode;
      } else if (selectedButtonClass == "item-delete" || selectedButtonClass == "item-add" || selectedButtonClass == "item-substract") {
        current_button_container = target.parentNode.parentNode.parentNode;
      } else if (selectedButtonClass == "cart-submit-btn") {
        return;
      } //getting initial price and quantity of the selected item


      var current_item_quantity = parseInt(current_button_container.querySelector(".item-quantity").textContent),
          current_item_initial_price = parseInt(current_button_container.querySelector(".item-price").textContent),
          //saving the references above to the object
      params = {
        "current_button_container": current_button_container,
        "current_item_quantity": current_item_quantity,
        "current_item_initial_price": current_item_initial_price,
        "total_quantity": counter,
        "total_price": 0
      }; //defining actions for 'add' button

      if (selectedButtonClass == "item-add") {
        params.current_item_quantity++;
        params.current_button_container.querySelector(".item-quantity").textContent = params.current_item_quantity;
        params.total_quantity++;
        update_save(params); //defining actions for 'substract' button
      } else if (selectedButtonClass == "item-substract" && current_item_quantity > 1) {
        params.current_item_quantity--;
        params.current_button_container.querySelector(".item-quantity").textContent = params.current_item_quantity;
        params.total_quantity--;
        update_save(params); //defining actions for 'delete' button
      } else if (selectedButtonClass == "fas fa-trash-alt" || selectedButtonClass == "item-delete") {
        params.total_quantity -= params.current_item_quantity;
        create_item_object(params);
        params.current_button_container.classList.add("deletion-animation"); //setTimeout(() => current_button_container.remove(), 1000);

        current_button_container.remove();
        calculate_rows(params);
        var item_index = cart_array.findIndex(function (i) {
          return i.title == params.current_item.title;
        });
        cart_array.splice(item_index, 1);
        items_container.querySelector(".row.total-row div:last-child").textContent = params.total_price + ' грн';

        if (cart_array.length == 0) {
          show_empty_cart();
        }

        ;
        counter = params.total_quantity;
        window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
        window.localStorage.setItem("cart_counter", counter);
        window.localStorage.setItem("cart_total_price", params.total_price);
      }

      ;
    };

    var cart_page_container = document.querySelector(".cart-page-container"),
        cart_page_inner_container = document.querySelector(".cart-page-inner-container"),
        items_container = document.querySelector(".table");

    if (document.addEventListener) {
      items_container.addEventListener("click", action);
    } else console.log("Method 'addEventListener' cannot be applied");

    ;
    ;
    ;
    ;
    ;
  }

  ;
})();
//# sourceMappingURL=cart-page-functionality.js.map
