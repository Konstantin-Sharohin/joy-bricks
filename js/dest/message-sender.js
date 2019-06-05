"use strict";

(function () {
  var form = document.querySelector(".contacts-reply"),
      result = document.querySelector(".message-output");

  if (document.addEventListener) {
    document.querySelector(".send-reply").addEventListener("click", sendRequest);
  } else console.log("Method 'addEventListener' cannot be applied");

  function sendRequest(event) {
    event.preventDefault();
    var formData = new FormData(form),
        request = new XMLHttpRequest();
    request.open("POST", "message-handler.php");

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        result.style.visibility = "visible";
        result.innerHTML = request.responseText;
        setTimeout(function () {
          return result.style.visibility = "hidden";
        }, 3000);
      }
    };

    request.send(formData);
  }
})();
//# sourceMappingURL=message-sender.js.map
