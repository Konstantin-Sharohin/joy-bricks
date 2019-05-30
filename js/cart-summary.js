(function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
        summary_container = document.querySelector(".cart-summary-container"),
        page_container = document.querySelector(".order-submit-inner-container");

    let cart_summary = document.createElement("div");
        cart_summary.classList.add("cart-summary");

    let cart_summary_title_column = document.createElement("div");
        cart_summary_title_column.classList.add("cart-summary-title");

    let cart_summary_quantity_column = document.createElement("div");
        cart_summary_quantity_column.classList.add("cart-summary-quantity");

    let cart_summary_price_column = document.createElement("div");
        cart_summary_price_column.classList.add("cart-summary-price");

    let total_price = 0;

    cart_array.forEach(element => {
        let cart_summary_title_item = document.createElement("p");
            //cart_summary_title_item.classList.add("");
            cart_summary_title_item.textContent = element.title;
            cart_summary_title_column.appendChild(cart_summary_title_item);

        let cart_summary_quantity_item = document.createElement("p");
            //cart_summary_quantity_item.classList.add("");
            cart_summary_quantity_item.textContent = element.quantity;
            cart_summary_quantity_column.appendChild(cart_summary_quantity_item);

        let cart_summary_price_item = document.createElement("p");
            //cart_summary_price_item.classList.add("");
            cart_summary_price_item.textContent = element.price;
            total_price += parseInt(element.price) * parseInt(element.quantity);
            cart_summary_price_column.appendChild(cart_summary_price_item);

            cart_summary.appendChild(cart_summary_title_column);
            cart_summary.appendChild(cart_summary_quantity_column);
            cart_summary.appendChild(cart_summary_price_column);
    });

    let cart_summary_totalprice_row = document.createElement("div");
        cart_summary_totalprice_row.textContent = "Итого: " + total_price + " грн";
        cart_summary_totalprice_row.classList.add("cart-summary-totalprice");

    let cart_summary_send_button = document.createElement("div");
        cart_summary_send_button.classList.add("cart-submit-btn", "cart-submit-btn-confirm");

        <span class="filter-symbol-asc">
				<i class="fas fa-sort-amount-up"></i>
		</span>
        cart_summary_send_button.textContent = "Подтвердить";

    let cart_summary_return_button = document.createElement("div");
        cart_summary_return_button.classList.add("cart-submit-btn", "cart-submit-btn-return");

        <span class="filter-symbol-asc">
				<i class="fas fa-sort-amount-up"></i>
		</span>
        cart_summary_return_button.textContent = "Вернуться";

    let button_container = document.createElement("div");
        button_container.classList.add("cart-summary-button-container");

        summary_container.appendChild(cart_summary);
        summary_container.appendChild(cart_summary_totalprice_row);
        button_container.append(cart_summary_return_button, cart_summary_send_button);
        page_container.appendChild(button_container);
}());
