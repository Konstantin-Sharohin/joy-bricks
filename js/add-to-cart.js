(function () {
    let catalog_container = document.querySelector(".catalog-container"),
        header_cart_icon = document.querySelector(".cart-icon span"),
        cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
        counter = header_cart_icon.dataset.counter = window.localStorage.getItem("cart_counter") || 0;

    let action = event => {
        let selectedIconClass = event.target.className;
        let target = event.target,
            current_item_container = target.parentNode.parentNode.parentNode;

        if (selectedIconClass == "fas fa-cart-arrow-down") {
                current_item = {
                "title": current_item_container.querySelector('a').getAttribute('title'),
                "photo": current_item_container.querySelector('img').getAttribute('src'),
                "price": current_item_container.querySelector('.item-price').textContent,
                "code": current_item_container.querySelector('.item-code').textContent,
                "quantity": target.dataset.quantity,
                "action": target.dataset.action
                };

                let i = 0,
                    cart_array_length = cart_array.length,
                    has_title = false;

                for (i; i < cart_array_length; i++) {
                    if (current_item.title == cart_array[i].title) {
                        has_title = true;
                    };
                };

                if (has_title == false && target.dataset.action == 0) {
                    current_item.quantity = target.dataset.quantity = 1;
                    current_item.action = target.dataset.action = 1;
                    counter++;
                    header_cart_icon.dataset.counter = counter;

                    cart_array.push(current_item);
                    window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                    window.localStorage.setItem("cart_counter", counter);

                } else if (has_title == true && target.dataset.action == 1) {
                    counter--;
                    header_cart_icon.dataset.counter = counter;

                let item_index = cart_array.findIndex(i => i.title == current_item.title);
                    cart_array.splice(item_index, 1);

                    current_item.quantity = target.dataset.quantity = 0;
                    current_item.action = target.dataset.action = 0;

                    window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                    window.localStorage.setItem("cart_counter", counter);
                };
            };
        };

    if (document.addEventListener) {
        if (catalog_container) {
            catalog_container.addEventListener("click", action);
        } else {
            return;
        }
    } else if (document.attachEvent) {
        catalog_container.attachEvent("onclick", action);
    };
}());
