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
        <?php echo $_SESSION['username'] ?>
    </title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&family=Bree+Serif&family=Dancing+Script&family=Yrsa&display=swap" rel="stylesheet">
    <script src="./node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #reader {
            width: 600px;
        }

        #result {
            text-align: center;
            font-size: 1.5rem;
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
                    <a href="./login.php">
                        LOGOUT
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="reader"></div>
        <div id="result"></div>
    </main>
    <script src="./app.js">
    </script>
</body>

</html>