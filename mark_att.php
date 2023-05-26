<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome -
        <?php echo $_SESSION['username']
        ?>
    </title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&family=Bree+Serif&family=Dancing+Script&family=Yrsa&display=swap" rel="stylesheet">
    <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <style>
        .bbtn {
            margin-top: 10px;
        }

        .bbtn:hover {
            background-color: rgb(144, 250, 6);
        }

        #container {
            text-align: center;
        }
    </style>
</head>


<body>
    <header class="title">
        <div class="div center">
            <h1>
                Attendance System IT
            </h1>
            <h3 class="center">Medi-Caps University</h3>
            <p class="center">Rau, Indore - 453331</p>
        </div>
    </header>
    <header class="navbar">
        <nav>
            <ul>
                <li class="list-item" id="item2">
                    <a href="http://localhost/QR_att_master/public/login.php">
                        LOGOUT
                    </a>
                </li>
                </li>
            </ul>
        </nav>
    </header>
    <div id="container">
        <p>Latitude: <span id="latitude"></span>&deg</p>
        <p>Longitude: <span id="longitude"></span>&deg</p>
        <input id="eno" value="EN20IT301052" />
        <br>
        <button class="bbtn" id="submit">Mark Attendance</button>
    </div>
    <script>
        let lat, lon;
        const button = document.getElementById("submit");
        button.addEventListener("click", async (event) => {
            const eno = document.getElementById("eno").value;
            // var eno = document.getElementById("username").value;
            const data = {
                lat,
                lon,
                eno
            };
            const options = {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            };
            const response = await fetch("/api", options);
            const json = await response.json();
            console.log(json);
        });

        if ('geolocation' in navigator) {
            console.log('Geolocation available')
            navigator.geolocation.getCurrentPosition(async (position) => {
                //get lon and lat from client
                lat = position.coords.latitude;
                lon = position.coords.longitude;
                document.getElementById('latitude').textContent = lat;
                document.getElementById('longitude').textContent = lon;

            });
        } else {
            console.log('Geolocation NOT available')
        }
    </script>
</body>

</html>