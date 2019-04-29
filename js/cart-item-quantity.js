(function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart"));

    if (cart_array && cart_array.length != 0) {
        let items_container = document.querySelector(".table");

        if (document.addEventListener) {
            if (items_container) {
                items_container.addEventListener("click", action);
            } else {
                return;
            }
        } else if (document.attachEvent) {
            items_container.attachEvent("onclick", action);
        };


        function action(event) {
            let selectedButtonClass = event.target.className;
            let target = event.target,
                current_button_container = selectedButtonClass == "fas fa-trash-alt" || selectedButtonClass == "symbol-delete-item" ? target.parentNode.parentNode.parentNode.parentNode : target.parentNode.parentNode.parentNode,
                current_quantity = parseInt(current_button_container.querySelector(".item-quantity").innerHTML),
                current_initial_price = parseInt(current_button_container.querySelector(".item-price").innerHTML),
                cart_container = document.querySelector(".cart-page-container"),
                cart_inner_container = document.querySelector(".cart-page-inner-container"),
                current_price,
                params = {
                    "items_container": items_container,
                    "current_button_container": current_button_container,
                    "current_quantity": current_quantity,
                    "current_initial_price": current_initial_price,
                    "current_price": current_price,
                    "cart_array": cart_array,
                    "cart_container": cart_container,
                    "cart_inner_container": cart_inner_container
                };


            function count(params) {
                    params.current_button_container.querySelector(".item-quantity").innerHTML = params.current_quantity;

                    let row_nodeList = params.items_container.querySelectorAll(".row.items"),
                    row_nodeList_length = row_nodeList.length,
                    i = 0,
                    total_price = 0;
                for (i; i < row_nodeList_length; i++) {
                    row_item_price = parseInt(row_nodeList[i].querySelector(".item-price").innerHTML);
                    row_quantity = parseInt(row_nodeList[i].querySelector(".item-quantity").innerHTML);
                    row_total_price = row_item_price * row_quantity;
                    total_price += row_total_price;
                };
                params.items_container.querySelector(".row.total-row div:last-child").innerHTML = total_price + ' грн';
            };


            function delete_row(params) {
                let current_cart = {};
                current_cart.title = params.current_button_container.querySelector('.cell:first-child').getAttribute('title');
                current_cart.photo = params.current_button_container.querySelector('.cart-page-item-img').getAttribute('src');
                current_cart.price = params.current_button_container.querySelector('.item-price').textContent;
                current_cart.code = params.current_button_container.querySelector('.cart-page-item-code').textContent;
                current_cart.quantity = 0;

            let action_array = JSON.parse(window.localStorage.getItem("action_array")),
                counter = window.localStorage.getItem("cart_counter");
                current_action = {};
                current_action.action = "0";
                counter--;

                cart_array.pop(current_cart);
                action_array.pop(current_action);

                window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                window.localStorage.setItem("action_array", JSON.stringify(action_array));
                window.localStorage.setItem("cart_counter", counter);

                params.current_button_container.classList.add("deletion-animation");

                function hide_row() {
                    params.current_button_container.remove();
                };

                setTimeout(hide_row, 1000);

                if (cart_array.length == 0) {
                    showEmptyCart(params);
                };
            };

            if (selectedButtonClass == "item-add") {
                current_quantity++;
                params.current_quantity = current_quantity;
                count(params);

            } else if (selectedButtonClass == "item-substract" && current_quantity > 1) {
                current_quantity--;
                params.current_quantity = current_quantity;
                count(params);

            } else if (selectedButtonClass == "fas fa-trash-alt" || selectedButtonClass == "symbol-delete-item") {
                delete_row(params);
                count(params);

            } else {
                return;
            };
        };

    };

    function showEmptyCart(params) {
        params.cart_inner_container.remove();
        let note = document.createElement("div");
        note.innerHTML = "<i>Ваша корзина пуста...</i>";
        params.cart_container.appendChild(note);
    };

}());
