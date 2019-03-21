

    let catalog_container = document.querySelector(".catalog-container"),
        header_cart_icon = document.querySelector(".cart-icon span"),
        carts_array = [],
        current_cart = {},
        counter = 0,
        current_item_container;
    catalog_container.addEventListener("click", function (event) {
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
        };
    });
    /*} else if (document.attachEvent) {
        var icon_container = document.getElementById("#switcher"),
            navElements = document.getElementsByClassName(".nav-element-link, .cart-icon"),
            toggle = function (event) {
                event.returnValue = false;
                for (let i = 0; i < navElements.length; i++) {
                    navElements[i].classList.toggle("responsive")
                }
                icon.className = icon.className == "fas fa-angle-down" ? "fas fa-angle-up" : "fas fa-angle-down";
            };
        icon_container.attachEvent("onclick", toggle);*/
