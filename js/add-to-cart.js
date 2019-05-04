window.addEventListener("load", function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart")) || [],
        header_cart_icon = document.querySelector(".cart-icon span"),
        counter = header_cart_icon.dataset.counter = window.localStorage.getItem("cart_counter") || 0,
        catalog_container = document.querySelector(".catalog-container"),
        all_cart_icons = document.querySelectorAll(".add-cart-symbol .fas.fa-cart-arrow-down"),
        all_items = document.querySelectorAll(".catalog-item a");

    let i = 0,
        all_items_length = all_items.length,
        cart_array_length = cart_array.length;
    if (cart_array.length != 0) {
        for (i; i < all_items_length; i++) {
            let j = 0;
            for (j; j < cart_array_length; j++) {
                if (all_items[i].title == cart_array[j].title) {
                    all_cart_icons[i].dataset.quantity = cart_array[j].quantity;
                    all_cart_icons[i].dataset.action = cart_array[j].action;
                };
            };
        };
    };

    function action(event) {
        let selectedIconClass = event.target.className,
            cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
            target = event.target,
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

            let has_title = false,
                i = 0,
                cart_array_length = cart_array.length;

                if (cart_array_length > 0) {
                    for (i; i < cart_array_length; i++) {
                        if (current_item.title == cart_array[i].title) {
                            has_title = true;
                        };
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
        catalog_container.addEventListener("click", action);
    } else if (document.attachEvent) {
        catalog_container.attachEvent("onclick", action);
    };
});
