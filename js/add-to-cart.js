window.addEventListener("load", function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
        header_cart_icon = document.querySelector(".cart-icon span"),
        counter = header_cart_icon.dataset.counter = parseInt(window.localStorage.getItem("cart_counter")) || 0,
        catalog_container = document.querySelector(".catalog-container"),
        all_cart_icons = document.querySelectorAll(".add-cart-symbol .fas.fa-cart-arrow-down"),
        all_items = document.querySelectorAll(".catalog-item a");

        if (document.addEventListener) {
            catalog_container.addEventListener("click", action);
        } else if (document.attachEvent) {
            catalog_container.attachEvent("onclick", action);
        };


    let i = 0,
        all_items_length = all_items.length,
        cart_array_length = cart_array.length;
    if (cart_array && cart_array.length != 0) {
        for (i; i < all_items_length; i++) {
            let j = 0;
            for (j; j < cart_array_length; j++) {
                if (all_items[i].title == cart_array[j].title) {
                    all_cart_icons[i].dataset.quantity = cart_array[j].quantity;
                };
            };
        };
    };

    function action(event) {
        let selectedIconClass = event.target.className,
            cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
            target = event.target,
            current_item_container = target.parentNode.parentNode.parentNode;

        if (selectedIconClass == "fas fa-cart-arrow-down") {
            current_item = {
                "title": current_item_container.querySelector('a').getAttribute('title'),
                "photo": current_item_container.querySelector('img').getAttribute('src'),
                "price": current_item_container.querySelector('.item-price').textContent,
                "code": current_item_container.querySelector('.item-code').textContent,
                "quantity": 0
            };

            let has_title = false,
                i = 0,
                cart_array_length = cart_array.length;

            if (cart_array && cart_array_length > 0) {
                for (i; i < cart_array_length; i++) {
                    if (current_item.title == cart_array[i].title) {
                        has_title = true;
                        current_item.quantity = cart_array[i].quantity;
                    };
                };
            };

            if (has_title == false) {
                current_item.quantity++;
                target.dataset.quantity = current_item.quantity;
                counter++;
                header_cart_icon.dataset.counter = counter;

                cart_array.push(current_item);
                window.localStorage.setItem("filled_cart", JSON.stringify(cart_array));
                window.localStorage.setItem("cart_counter", counter);
            };
        };
    };
});
