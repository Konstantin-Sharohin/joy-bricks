(function () {
    let carts_array = JSON.parse(window.localStorage.getItem("filled_cart"));

    if (carts_array && carts_array.length != 0) {
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
            let selectedButtonClass = event.target.className,
                target = event.target,
                current_button_container = target.parentNode.parentNode.parentNode,
                current_quantity = parseInt(current_button_container.querySelector(".item-quantity").innerHTML),
                current_initial_price = parseInt(current_button_container.querySelector(".item-price").innerHTML),
                current_price,
                params = {
                    "items_container": items_container,
                    "current_button_container": current_button_container,
                    "current_quantity": current_quantity,
                    "current_initial_price": current_initial_price,
                    "current_price": current_price
                };

            function count(params) {
                params.current_price = params.current_initial_price * params.current_quantity;
                params.current_button_container.querySelector(".item-quantity").innerHTML = params.current_quantity;
            let row_nodeList = params.items_container.querySelectorAll(".row.items");

                if (row_nodeList.length > 1) {
                    let row_nodeList_length = row_nodeList.length,
                        i = 0,
                        total_price = 0;
                    for (i; i < row_nodeList_length; i++, total_price) {
                        row_item_price = parseInt(row_nodeList[i].querySelector(".item-price").innerHTML);
                        row_quantity = parseInt(row_nodeList[i].querySelector(".item-quantity").innerHTML);
                        row_total_price = row_item_price * row_quantity;
                        total_price += row_total_price;
                    };
                        params.items_container.querySelector(".total-row div:last-child").innerHTML = total_price + ' грн';
                } else {
                    params.items_container.querySelector(".total-row div:last-child").innerHTML = params.current_price + ' грн';
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
            };
        };

    };
}());
