(function () {
    let catalog_container = document.querySelector(".catalog-container"),
    header_cart_icon = document.querySelector(".cart-icon span"),
    counter = window.localStorage.getItem("cart_counter") || 0;
    header_cart_icon.dataset.counter = counter;
        const action = (event) => {
            let carts_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
                current_cart = {},
                selectedIconClass = event.target.className;
            if (selectedIconClass == "fas fa-cart-arrow-down") {
                const target = event.target;
                if (target.dataset.action == "0") {
                    current_item_container = event.target.parentNode.parentNode.parentNode;
                    current_cart.title = current_item_container.querySelector('a').getAttribute('title');
                    current_cart.photo = current_item_container.querySelector('img').getAttribute('src');
                    current_cart.price = current_item_container.querySelector('.item-price').textContent;
                    current_cart.code = current_item_container.querySelector('.item-code').textContent;
                    counter++;
                    carts_array.push(current_cart);
                    window.localStorage.setItem("filled_cart", JSON.stringify(carts_array));
                    window.localStorage.setItem("cart_counter", counter);
                    header_cart_icon.dataset.counter = counter;
                    target.dataset.action = "1";
                } else {
                    counter--;
                    carts_array.pop(current_cart);
                    window.localStorage.setItem("filled_cart", JSON.stringify(carts_array));
                    window.localStorage.setItem("cart_counter", counter);
                    header_cart_icon.dataset.counter = counter;
                    target.dataset.action = "0";
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
