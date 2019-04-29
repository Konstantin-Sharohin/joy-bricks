(function () {
    let catalog_container = document.querySelector(".catalog-container"),
        header_cart_icon = document.querySelector(".cart-icon span"),
        cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
        action_array = JSON.parse(window.localStorage.getItem("action_array")) || [],
        counter = header_cart_icon.dataset.counter = window.localStorage.getItem("cart_counter") || 0;

    let action = (event) => {
        let current_cart = {},
            current_action = {},
            selectedIconClass = event.target.className;
        if (selectedIconClass == "fas fa-cart-arrow-down") {
            let target = event.target,
                current_item_container = target.parentNode.parentNode.parentNode;
                current_cart.title = current_item_container.querySelector('a').getAttribute('title');
                current_cart.photo = current_item_container.querySelector('img').getAttribute('src');
                current_cart.price = current_item_container.querySelector('.item-price').textContent;
                current_cart.code = current_item_container.querySelector('.item-code').textContent;
                current_cart.quantity = 0;

            if (target.dataset.action == "0") {
                current_action.action = target.dataset.action = "1";
                current_cart.quantity = 1;
                counter++;
                header_cart_icon.dataset.counter = counter;
                cart_array.push(current_cart);
                action_array.push(current_action);
                window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                window.localStorage.setItem("action_array", JSON.stringify(action_array));
                window.localStorage.setItem("cart_counter", counter);
            } else if (target.dataset.action == "1") {
                current_action.action = target.dataset.action = "0";
                counter--;
                header_cart_icon.dataset.counter = counter;
                cart_array.pop(current_cart);
                action_array.pop(current_action);
                window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                window.localStorage.setItem("action_array", JSON.stringify(action_array));
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
