<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Registrasi Berhasil');
                document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
                alert('Registrasi Gagal');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: sans-serif;
            background-image: url(../assets/img/bg.png);
        }

        .regisbox {
            width: 320px;
            height: 420px;
            background: transparent;
            color: #fff;
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            padding: 70px 30px;
        }

        h1 {
            margin: 0;
            padding: 0;
            text-align: center;
            font-size: 22px;
        }

        .regisbox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .regisbox input {
            width: 100%;
            margin-bottom: 20px;
        }

        .regisbox input[type="text"],
        input[type="password"] {
            border: none;
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            font-size: 16px;
        }

        .regisbox button[type="submit"] {
            border: none;
            outline: none;
            height: 15px;
            background: transparent;
            color: white;
            font-size: 15px;
            border-radius: 20px;
        }

        .regisbox button[type="submit"]:hover {
            cursor: pointer;
            background: #ca9a0a;
            color: #000;
        }
    </style>
</head>

<body>
        <div class="regisbox">
            <h1>Register here</h1>
            <form action="" method="post">
                <table>
                    <tr>
                        <td><label for="username">username</label></td>
                        <td>:</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td><label for="password">password</label></td>
                        <td>:</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                </table>
                <button type="submit" name="register"> Register</button>
            </form>
        </div>
</body>

</html>