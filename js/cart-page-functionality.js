(function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart"));

    if (cart_array && cart_array.length != 0) {
        let items_container = document.querySelector(".table"),
            counter = window.localStorage.getItem("cart_counter"),
            action_array = JSON.parse(window.localStorage.getItem("action_array")),
            header_cart_icon = document.querySelector(".cart-icon span"),
            cart_container = document.querySelector(".cart-page-container"),
            cart_inner_container = document.querySelector(".cart-page-inner-container");

        if (document.addEventListener) {
            items_container.addEventListener("click", action);
        } else if (document.attachEvent) {
            items_container.attachEvent("onclick", action);
        };


        function action(event) {
            let selectedButtonClass = event.target.className;
            let target = event.target;
                if (selectedButtonClass == "fas fa-trash-alt") {
                    current_button_container = target.parentNode.parentNode.parentNode.parentNode;
                } else if (selectedButtonClass == "symbol-delete-item" || selectedButtonClass == "item-add" || selectedButtonClass == "item-substract") {
                    current_button_container = target.parentNode.parentNode.parentNode;
                };
            let current_quantity = parseInt(current_button_container.querySelector(".item-quantity").textContent),
                current_initial_price = parseInt(current_button_container.querySelector(".item-price").textContent),

                params = {
                    "current_button_container": current_button_container,
                    "current_quantity": current_quantity,
                    "current_initial_price": current_initial_price,
                    "total_quantity": 0,
                    "counter": counter
                };


        function count(params) {
            if (params.current_button_container.className !== "row items deletion-animation") {
                params.current_button_container.querySelector(".item-quantity").textContent = params.current_quantity;
            };

            calculate_rows();

            create_cart_object();

                if (params.action == "add") {
                    counter++;
                    total_quantity++;

                    cart_array.push(current_item);

                    window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                    window.localStorage.setItem("cart_counter", counter);

                    params.items_container.querySelector(".row.total-row div:last-child").textContent = total_price + ' грн';

                    counter = total_quantity;
                    header_cart_icon.dataset.counter = counter;

                } else if (params.action == "substract") {
                    if (current_item.quantity > 1) {
                        total_quantity--;

                        counter = window.localStorage.getItem("cart_counter");
                        counter--;

                    let item_index = cart_array.findIndex(i => i.title == current_item.title);
                        cart_array.splice(item_index, 1);

                        window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                        window.localStorage.setItem("cart_counter", counter);

                        params.items_container.querySelector(".row.total-row div:last-child").textContent = total_price + ' грн';

                        counter = total_quantity;
                        header_cart_icon.dataset.counter = counter;
                    };
                };
            };


            function delete_row(params) {
            let current_item = {};
                current_item.title = params.current_button_container.querySelector('.cell:first-child').getAttribute('title');
                current_item.photo = params.current_button_container.querySelector('.cart-page-item-img').getAttribute('src');
                current_item.price = params.current_button_container.querySelector('.item-price').textContent;
                current_item.code = params.current_button_container.querySelector('.cart-page-item-code').textContent;
                current_item.quantity = 1;

            let action_array = JSON.parse(window.localStorage.getItem("action_array")),
                counter = window.localStorage.getItem("cart_counter");
                counter--;

                cart_array.pop(current_item);

                window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                window.localStorage.setItem("cart_counter", counter);

                params.current_button_container.classList.add("deletion-animation");

                params.current_button_container.remove();

                if (cart_array.length == 0) {
                    showEmptyCart(params);
                };
            };


            function showEmptyCart() {
                cart_inner_container.classList.add("deletion-animation");
                cart_inner_container.remove();
                let note = document.createElement("div");
                note.innerHTML = "<i>Ваша корзина пуста...</i>";
                cart_container.appendChild(note);
            };


            function calculate_rows() {
            let row_nodeList = params.items_container.querySelectorAll(".row.items");
                if (row_nodeList.length == 0) return;

            let row_nodeList_length = row_nodeList.length,
                i = 0,
                total_price = 0,
                total_quantity = 0;
                for (i; i < row_nodeList_length; i++) {
                    row_item_price = parseInt(row_nodeList[i].querySelector(".item-price").textContent);
                    row_quantity = parseInt(row_nodeList[i].querySelector(".item-quantity").textContent);
                    row_total_price = row_item_price * row_quantity;
                    total_price += row_total_price;
                    total_quantity += row_quantity;
                };
                return total_price, total_quantity;
            };


            function create_cart_object() {
            let current_item = {};
                current_item.title = params.current_button_container.querySelector('.cell:first-child').getAttribute('title');
                current_item.photo = params.current_button_container.querySelector('.cart-page-item-img').getAttribute('src');
                current_item.price = params.current_button_container.querySelector('.item-price').textContent;
                current_item.code = params.current_button_container.querySelector('.cart-page-item-code').textContent;
            return current_item;
            };


            if (selectedButtonClass == "item-add") {
                params.action = "add";
                params.current_quantity++;
                count(params);

            } else if (selectedButtonClass == "item-substract" && current_quantity > 1) {
                params.action = "substract";
                params.current_quantity--;
                count(params);

            } else if (selectedButtonClass == "fas fa-trash-alt" || selectedButtonClass == "symbol-delete-item") {
                delete_row(params);
                count(params);

            } else {
                return;
            };
        };

    };

}());
