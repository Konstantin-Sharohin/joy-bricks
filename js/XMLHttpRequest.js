(function () {
    let cart_icon = document.querySelector(".cart-icon");
    cart_icon.addEventListener("click", action);

    function action(event) {
        event.preventDefault();
    let request = new XMLHttpRequest();
        function reqReadyStateChange() {
            if (request.readyState == 4 && request.status == 200) {
                    document.documentElement.innerHTML=request.responseText;
                };
            };

        request.open("GET", "http://localhost/joy-bricks/cart.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send();
    };
})();



/* $(function(){
    $('.cart-icon').click(function(){
        $('html').load('cart.php');
    });
}); */



/* var formData = new FormData();
formData.append('name', 'Tom');
formData.append('age', 23);

var request = new XMLHttpRequest();
function reqReadyStateChange() {
    if (request.readyState == 4 && request.status == 200)
        document.getElementById("output").innerHTML=request.responseText;
}

request.open("POST", "http://localhost/joy-bricks/cart-submit.php");
request.onreadystatechange = reqReadyStateChange;
request.send(formData); */



/* var user = {
    name: "Tom",
    age: 23
};

var request = new XMLHttpRequest();
function reqReadyStateChange() {
    if (request.readyState == 4 && request.status == 200)
        document.getElementById("output").innerHTML=request.responseText;
}
var body = "name=" + user.name + "&age="+user.age;
request.open("POST", "http://localhost/joy-bricks/cart-submit.php");
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
request.onreadystatechange = reqReadyStateChange;
request.send(body); */




/* <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
</head>
<body>
<div id="output"></div>
<form name="user" action="http://localhost:8080/postdata.php">
<input type="text" name="username" placeholder="Введите имя" /><br/>
<input type="text" name="age" placeholder="Введите возраст" /><br/>
<input type="submit" name="submit" value="Отправить" />
</form>
<script>
// получаем объект формы
var form = document.forms.user;
// прикрепляем обработчик кнопки
form.submit.addEventListener("click", sendRequest);

// обработчик нажатия
function sendRequest(event){

    event.preventDefault();
    var formData = new FormData(form);

    var request = new XMLHttpRequest();

    request.open("POST", form.action);

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200)
            document.getElementById("output").innerHTML=request.responseText;
    }
    request.send(formData);
}
</script>
</body>
</html> */




//JSON
/* var user = {
    username: "Tom",
    age: 23
};
var json = JSON.stringify(user);
var request = new XMLHttpRequest();
request.open("POST", "http://localhost:8080/postjson.php");
request.setRequestHeader('Content-type', 'application/json; charset=utf-8');
request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200)
            document.getElementById("output").innerHTML=request.responseText;
}
request.send(json); */