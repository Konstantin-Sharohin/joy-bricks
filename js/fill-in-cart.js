(function () {
    let carts_array = JSON.parse(window.localStorage.getItem("filled_cart")),
        counter = window.localStorage.getItem("cart_counter"),
        item_title, item_photo, item_price, item_code,
        cart_container = document.querySelector(".cart-page-container"),
        cart_inner_container = document.querySelector(".cart-page-inner-container");

    if (carts_array) {
        let i, k = carts_array.length;
        for (i = 0; i < k; i++) {
            item_title = carts_array[i].title;
            item_photo = carts_array[i].photo;
            item_price = carts_array[i].price;
            item_code = carts_array[i].code;

            cart_container.querySelector('.cart-page-item-container').setAttribute('title', item_title);
            cart_container.querySelector('.cart-page-item-description').innerHTML = item_title;
            cart_container.querySelector('img').setAttribute('src', item_photo);
            cart_container.querySelector('.cart-page-item-price').innerHTML = item_price;
            cart_container.querySelector('.cart-page-item-code').innerHTML = item_code;
            cart_container.querySelector('.cart-page-item-quantity').innerHTML = counter;
        }
    } else {
        cart_inner_container.style.display = "none";
        let note = document.createElement("div");
        note.innerHTML = "<i>Ваша корзина пока еще пуста...</i>";
        let div = document.querySelector(".cart-page-inner-container");
        cart_container.insertBefore(note, div);
    }
})();