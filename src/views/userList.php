<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="users"></div>




<script>
    let at = localStorage.getItem('at');

    if(at != null) {
        fetch('http://vvv/api/getUsers', {
                method: 'GET'
                
            })
                .then(response => response.json())

                .then(data => {
                    let div = document.getElementById("users");
                    data.forEach(element => {
                        div.innerHTML += element.login + "<br>";
                    });
                    console.log(data);
                    
                })
                .catch(error => {
                    console.log(error);
                })



    }else{
        window.location.replace("http://vvv/auth");
    }
</script>
</body>
</html>