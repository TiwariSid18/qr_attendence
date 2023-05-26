<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from login where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location:index.php");
    } else {
        $showError = "Invalid Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Attendace Sys IT</title>
    <!-- /* Bootstrap */ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&family=Bree+Serif&family=Dancing+Script&family=Yrsa&display=swap" rel="stylesheet">
    <style>
        body {
            background: url("./bglogin.jpg") no-repeat center center/cover;
            font-family: 'Bree Serif', serif;
        }

        .container {
            height: 80%;
            width: 50%;
            border: 2px solid blue;
            border-radius: 30px;
            background-color: rgba(194, 235, 252, 0.685);
        }

        #login {
            margin: 30px;
        }

        #login .form-group {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

        }

        #login label,
        #login input {
            margin: 2px 10px;
            padding: 10px;
            font-size: 1.4rem;
        }

        #login input {
            border: 1px solid black;
            border-radius: 20px;
        }

        #login div .btn {
            border: 2px solid red;
            border-radius: 30px;
            background-color: rgb(252, 180, 155);
            padding: auto 3px;
            width: 105px;
            height: 46px;
            font-size: 1.4rem;

        }

        .center {
            text-align: center;
        }

        /* header */
        header div h1 {
            font-size: 3.8rem;
        }

        header div h3 {
            font-size: 2.4rem;
        }

        header div p {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        <div class="div center">
            <h1>
                Attendance System IT
            </h1>
            <h3 class="center">Medi-Caps University</h3>
            <p class="center">Rau, Indore - 453331</p>
            <!-- <br> -->
            <!-- <p class="center">Phone : 434217, 541307</p> -->
        </div>
    </header>
    <div class="container">
        <?php
        if ($login) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div> ';
        }
        if ($showError) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
        }
        ?>
        <form name="loginForm" method="POST" action="login.php" id="login">
            <div class="form-group">
                <label for="username">Username:</label>
                <input id="username" type="text" name='username' placeholder="Enter Your Username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name='password' placeholder="Enter Your Password">
            </div>
            <div class="form-group">
                <!-- <input type="submit" value="Login" name="submit" class="btn"> -->
                <button class="btn">Login</button>
            </div>
        </form>
    </div>
</body>


</html>