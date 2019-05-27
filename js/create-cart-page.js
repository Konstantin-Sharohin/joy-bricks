(function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
        cart_page_container = document.querySelector(".cart-page-container"),
        cart_page_inner_container = document.querySelector(".cart-page-inner-container");

    if (!cart_array || cart_array.length == 0) {

        cart_page_inner_container.style.display = "none";
    let note = document.createElement("p");
        note.style.textAlign = "center";
        note.innerHTML = "<i>Ваша корзина пуста...</i>";
        cart_page_container.appendChild(note);

        } else {
        let carts_length = cart_array.length,
            cart_table = document.querySelector(".table"),
            cart_table_row_total = document.querySelector(".row.total-row"),
            total_header = document.querySelector(".row.header.total-header"),
            cart_total_price = 0;

        for (let i = 0; i < carts_length; i++) {
            let table_row = document.createElement("div");
                table_row.classList.add("row");
                table_row.classList.add("items");

            let cell_title = document.createElement("div");
                cell_title.classList.add("cell");
                cell_title.dataset.title = "Наименование";
                cell_title.setAttribute("title", cart_array[i].title);
                cell_title.innerHTML = `<div class="cart-page-item">
                                            <img class="cart-page-item-img" src="${cart_array[i].photo}" alt="Ваш заказ">
                                        </div>
                                        <div class="cart-page-item-description">
                                            ${cart_array[i].title}
                                        </div>
                                        <div class="cart-page-item-code">
                                            ${cart_array[i].code}
                                        </div>`;

            let cell_quantity = document.createElement("div");
                cell_quantity.classList.add("cell");
                cell_quantity.dataset.title = "Количество (шт.)";
                cell_quantity.dataset.quantity = cart_array[i].quantity;
                cell_quantity.innerHTML = `<div class="cart-page-item-quantity">
                                                <span class="item-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                                <button class="item-substract">–</button>
                                                <span class="item-quantity">
                                                    ${cart_array[i].quantity}
                                                </span>
                                                <button class="item-add">+</button>
                                        </div>`;

            let cell_price = document.createElement("div");
                cell_price.classList.add("cell");
                cell_price.dataset.title = "Цена (за шт.)";
                cell_price.innerHTML = `<div class="cart-page-item-price">
                                            <span class="item-price">
                                                ${cart_array[i].price}
                                            </span>
                                        </div>`;

                table_row.appendChild(cell_title);
                table_row.appendChild(cell_quantity);
                table_row.appendChild(cell_price);
                cart_table.insertBefore(table_row, total_header);
                cart_total_price += parseInt(cart_array[i].price) * cart_array[i].quantity;
            }

        let cell_total = document.createElement("div");
            cell_total.classList.add("cell");
            cell_total.dataset.title = "Итого";
            cell_total.innerHTML = cart_total_price + ' грн';
            cart_table_row_total.appendChild(cell_total);
    };
})();