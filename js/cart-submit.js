(function () {
    let cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
        inner_container = document.querySelector(".order-submit-inner-container");

    let cart_summary_container = document.createElement("div");
        cart_summary_container.classList.add("cart-summary-container");

    cart_array.forEach(element => {
        let cart_summary_row = document.createElement("div");
            cart_summary_row.classList.add("cart-summary");

        let cart_summary_title = document.createElement("p");
            cart_summary_title.classList.add("cart-summary-title");
            cart_summary_title.innerHTML = element.title;
            cart_summary_row.appendChild(cart_summary_title);

        let cart_summary_quantity = document.createElement("p");
            cart_summary_quantity.classList.add("cart-summary-quantity");
            cart_summary_quantity.innerHTML = element.quantity;
            cart_summary_row.appendChild(cart_summary_quantity);

        let cart_summary_price = document.createElement("p");
            cart_summary_price.classList.add("cart-summary-price");
            cart_summary_price.innerHTML = element.quantity;
            cart_summary_row.appendChild(cart_summary_price);

            cart_summary_container.appendChild(cart_summary_row);
    });

    let cart_summary_button = document.createElement("button");
        cart_summary_button.classList.add("cart-submit-btn");
        cart_summary_button.innerHTML = "Подтвердить заказ";

        inner_container.appendChild(cart_summary_container);
        inner_container.appendChild(cart_summary_button);



    /* var someObj = {a:1,b:2};
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'scratch.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('param=' + JSON.stringify(someObj));
    xhr.onreadystatechange = function()
    {
      if (this.readyState == 4)
      {
        if (this.status == 200)
        {
          console.log(xhr.responseText);
        }
        else
        {
          console.log('ajax error');
        }
      }
    };
 */
}());
