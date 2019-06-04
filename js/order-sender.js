(function () {
    const cart_array = JSON.parse(window.localStorage.getItem("filled_cart")),
    cart_total_price = window.localStorage.getItem("cart_total_price"),

    form = document.querySelector(".order-form"),
    result = document.querySelector(".order-submit-container");

    if (document.addEventListener) {
        document.querySelector(".cart-submit-btn.send").addEventListener("click", sendRequest);
    } else console.log("Method 'addEventListener' cannot be applied");

    function sendRequest() {
        const formData = new FormData(form);
        formData.append("order", JSON.stringify(cart_array));
        formData.append("cart_total_price", JSON.stringify(cart_total_price));

        const request = new XMLHttpRequest();

        request.open("POST", "order-handler.php");

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                window.localStorage.clear();
                result.innerHTML = request.responseText;
                setTimeout(() => document.location.replace("http://localhost/joy-bricks/index.php"), 5000);
            }
        };

        request.send(formData);
    };

}())