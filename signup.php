<?php
include("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="Style.css">
</head>

<body>

    <div>
        <div class="login-box">
            <h2>Sign-Up</h2>
            <form method="post">
                <div class="user-box">
                    <input name="e_mail" type="text" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input name="password" type="password" nan" required="">
                    <label>Password</label>
                </div>
                <a type="submit" name="signup_button" href="login.php">
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
    if (isset($_POST['signup_button'])) {
        $email = $_POST['e_mail'];
        $password = $_POST['password'];

        $query = $con->prepare("INSERT INTO login(email, password)values(?,?)");
        $query->bind_param("ss", $email, $password);
        $query->execute();
        $query->close();

        echo '<h2>Signed Up Successfully</h2>';
    }
    ?>
</body>

</html>