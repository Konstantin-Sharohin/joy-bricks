"use strict";!function(){var u=JSON.parse(window.localStorage.getItem("filled_cart"));if(u&&0!=u.length){var _=function(t){var e=y.querySelectorAll(".row.items");if(0==e.length)return t.total_price=0,t.total_price;for(var r=e.length,n=0,i=0;n<r;n++){i+=parseInt(e[n].querySelector(".item-price").textContent)*parseInt(e[n].querySelector(".item-quantity").textContent)}t.total_price=i},d=function(t){var e={title:t.current_button_container.querySelector(".cell:first-child").getAttribute("title"),photo:t.current_button_container.querySelector(".cart-page-item-img").getAttribute("src"),price:t.current_button_container.querySelector(".cart-page-item-price").textContent,code:t.current_button_container.querySelector(".cart-page-item-code").textContent,quantity:t.current_item_quantity};t.current_item=e},m=function(e){d(e),_(e),y.querySelector(".row.total-row div:last-child").textContent=e.total_price+" грн";var t=e.total_quantity,r=u.findIndex(function(t){return t.title==e.current_item.title});u.splice(r,1,e.current_item),window.localStorage.setItem("filled_cart",JSON.stringify(u)),window.localStorage.setItem("cart_counter",t),window.localStorage.setItem("cart_total_price",e.total_price)},s=document.querySelector(".cart-page-container"),p=document.querySelector(".cart-page-inner-container"),y=document.querySelector(".table");document.addEventListener?y.addEventListener("click",function(t){var e,r=parseInt(window.localStorage.getItem("cart_counter")),n=t.target.className,i=t.target;if("fas fa-trash-alt"==n)e=i.parentNode.parentNode.parentNode.parentNode;else if("item-delete"==n||"item-add"==n||"item-substract"==n)e=i.parentNode.parentNode.parentNode;else if("cart-submit-btn"==n)return;var a=parseInt(e.querySelector(".item-quantity").textContent),o=parseInt(e.querySelector(".item-price").textContent),c={current_button_container:e,current_item_quantity:a,current_item_initial_price:o,total_quantity:r,total_price:0};if("item-add"==n)c.current_item_quantity++,c.current_button_container.querySelector(".item-quantity").textContent=c.current_item_quantity,c.total_quantity++,m(c);else if("item-substract"==n&&1<a)c.current_item_quantity--,c.current_button_container.querySelector(".item-quantity").textContent=c.current_item_quantity,c.total_quantity--,m(c);else if("fas fa-trash-alt"==n||"item-delete"==n){c.total_quantity-=c.current_item_quantity,d(c),c.current_button_container.classList.add("deletion-animation"),e.remove(),_(c);var l=u.findIndex(function(t){return t.title==c.current_item.title});u.splice(l,1),y.querySelector(".row.total-row div:last-child").textContent=c.total_price+" грн",0==u.length&&function(){p.classList.add("deletion-animation"),setTimeout(function(){return p.remove()},1e3);var t=document.createElement("p");t.style.textAlign="center",t.innerHTML="<i>Ваша корзина пуста...</i>",s.appendChild(t)}(),r=c.total_quantity,window.localStorage.setItem("filled_cart",JSON.stringify(u)),window.localStorage.setItem("cart_counter",r),window.localStorage.setItem("cart_total_price",c.total_price)}}):console.log("Method 'addEventListener' cannot be applied")}}();
//# sourceMappingURL=cart-page-functionality.js.map