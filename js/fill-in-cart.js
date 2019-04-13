(function () {
    let carts_array = JSON.parse(window.localStorage.getItem("filled_cart")),
        cart_container = document.querySelector(".cart-page-container"),
        cart_inner_container = document.querySelector(".cart-page-inner-container");

    if (carts_array) {
        let carts_length = carts_array.length,
            cart_column_photo = document.querySelector(".cart-page-column.photo"),
            cart_column_quantity = document.querySelector(".cart-page-column.quantity"),
            cart_column_price = document.querySelector(".cart-page-column.price"),
            cart_column_total = document.querySelector(".cart-page-column.total"),
            cart_total_price = 0;
        for (let i = 0; i < carts_length; i++) {
            let photo_column_template = document.createElement("div");
                photo_column_template.classList.add("cart-page-item-container");
                photo_column_template.setAttribute("title", carts_array[i].title);
                photo_column_template.innerHTML = '<div class="cart-page-item"><img class="cart-page-item-img" src="' +
                    carts_array[i].photo + '" alt="Ваш заказ"></div><div class="cart-page-item-description">' +
                    carts_array[i].title + '</div><div class="cart-page-item-code">' +
                    carts_array[i].code + '</div>';

            let quantity_column_template = document.createElement("div");
                quantity_column_template.classList.add("cart-page-item-container");
                quantity_column_template.innerHTML = '<div class="cart-page-item-quantity">' + carts_array[i].quantity + '</div>';

            let price_column_template = document.createElement("div");
                price_column_template.classList.add("cart-page-item-container");
                price_column_template.innerHTML = '<div class="cart-page-item-price">' + carts_array[i].price + '</div>';

            cart_column_photo.appendChild(photo_column_template);
            cart_column_quantity.appendChild(quantity_column_template);
            cart_column_price.appendChild(price_column_template);
            cart_total_price += parseInt(carts_array[i].price);
        }
        let total_column_template = document.createElement("div");
            total_column_template.classList.add("cart-page-item-container");
            total_column_template.innerHTML = '<div class="cart-page-item-price-total">' + cart_total_price + ' грн' + '</div>';
            cart_column_total.appendChild(total_column_template);
    } else {
        cart_inner_container.style.display = "none";
        let note = document.createElement("div");
        note.innerHTML = "<i>Ваша корзина пока еще пуста...</i>";
        cart_container.appendChild(note);
    }
})();