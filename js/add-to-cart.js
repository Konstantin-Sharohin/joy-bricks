(function () {
    if (document.addEventListener) {
        let catalog_container = document.querySelector(".catalog-container"),
            header_cart_icon = document.querySelector(".cart-icon span"),
            carts_array = [],
            current_cart = {},
            counter = 0,
            current_item_container;
        catalog_container.addEventListener("click", (event) => {
            counter++;
            let selectedIconClass = event.target.className;
            if (selectedIconClass == "fas fa-cart-arrow-down") {
                current_item_container = event.target.parentElement.parentElement.parentElement;
                current_cart.title = current_item_container.querySelector('a').getAttribute('title');
                current_cart.photo = current_item_container.querySelector('img').getAttribute('src');
                current_cart.price = current_item_container.querySelector('.item-price').textContent;
                current_cart.code = current_item_container.querySelector('.item-code').textContent;
                carts_array.push(current_cart);
                header_cart_icon.dataset.counter = counter;
            };
        });
    } else if (document.attachEvent) {
        let catalog_container = document.querySelector(".catalog-container"),
            header_cart_icon = document.querySelector(".cart-icon span"),
            carts_array = [],
            current_cart = {},
            counter = 0,
            current_item_container;
        catalog_container.attachEvent("onclick", function (event) {
            counter++;
            let selectedIcon = event.target.className;
            if (selectedIcon == "fas fa-cart-arrow-down") {
                current_item_container = event.target.parentElement.parentElement.parentElement;
                current_cart.title = current_item_container.querySelector('a').getAttribute('title');
                current_cart.photo = current_item_container.querySelector('img').getAttribute('src');
                current_cart.price = current_item_container.querySelector('.item-price').textContent;
                current_cart.code = current_item_container.querySelector('.item-code').textContent;
                carts_array.push(current_cart);
                header_cart_icon.dataset.counter = counter;
            }
        });
    };
})();
