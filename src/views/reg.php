<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/views/css/style.css">
</head>

<body>

    <div class="reg--form">
        <h1>Registration</h1>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" id="login" placeholder="Login" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">A</span>
            <input type="text" class="form-control" id="name" placeholder="Username" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">#</span>
            <input type="text" class="form-control" id="pass" placeholder="Password" aria-label="Username"
                aria-describedby="basic-addon1">
        </div>

        <button id="regbtn">Register</button>

    </div>



    <script>


        let btn = document.getElementById("regbtn");

        btn.addEventListener('click', () => {
            let login = document.getElementById("login").value;
            let name = document.getElementById("name").value;
            let pass = document.getElementById("pass").value;


            let json = JSON.stringify({
                "login": login,
                "name": name,
                "pass": pass,
            });

            console.log(json);

            fetch("http://vvv/api/reg", {
                method: "POST",
                body: json,
            })

                .then(response => response.text())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.log(error);
                })

        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>