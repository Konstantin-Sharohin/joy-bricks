"use strict";!function(){var n=JSON.parse(window.localStorage.getItem("filled_cart")),r=window.localStorage.getItem("cart_total_price"),o=document.querySelector(".order-form"),a=document.querySelector(".order-submit-container");document.addEventListener?document.querySelector(".cart-submit-btn.send").addEventListener("click",function(){var e=new FormData(o);e.append("order",JSON.stringify(n)),e.append("cart_total_price",JSON.stringify(r));var t=new XMLHttpRequest;t.open("POST","order-handler.php"),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&(window.localStorage.clear(),a.innerHTML=t.responseText,setTimeout(function(){return document.location.replace("http://localhost/joy-bricks/index.php")},5e3))},t.send(e)}):console.log("Method 'addEventListener' cannot be applied")}();
//# sourceMappingURL=order-sender.js.map