(function () {

    var someObj = {a:1,b:2};
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

}());
