<?php
include("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>

    <div>
    <div class="login-box">
        <h2>Login</h2>
        <form method="post">
            <div class="user-box">
                <input name="e_mail" type="text" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input name="password" type="password" nan" required="">
                <label>Password</label>
            </div>
            <a type="submit" name="confirm_button" href="text.php">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </a>
        </form>
    </div>
    </div>

    <?php

    if (isset($_POST['confirm_button'])) {

        $email = $_POST['e_mail'];
        $password = $_POST['password'];
        $query = $con->prepare("SELECT * FROM login where (email)='$email' AND (password)='$password'");
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            $check_email = $row['email'];
            $check_password = $row['password'];


            if ($check_email === $email && $check_password === $password) {
                echo "logged in";

                echo '<script type="text/javascript">
                window.open("main.php");
                </script>';
            }
        }
    }

    ?>

</body>

</html>