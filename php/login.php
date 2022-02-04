<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connectdb.php';
    $incorrect_password = 0;
    $no_user_exists_err = 0;

    if ($_POST['login'] == 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $qry = "SELECT * FROM users WHERE email_id='$email'";
        $result = mysqli_query($link, $qry) or die($connError);

        $count = mysqli_num_rows($result);
        if ($count == 1) {

            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['AUTH'] = 1;
                $qry = "UPDATE users SET login='1' WHERE email_id='$email'";
                $result = mysqli_query($link, $qry);

                header('location: chat.php');
            } else {
                $incorrect_password = 1;
                $err = "Invalid password!";
            }
        } else {
            $no_user_exists_err = 1;
            $err = "Invalid email address!";
        }
    } else {
        header("location:login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Viber | Login</title>

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/login.css" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/b297730ddb.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="sub-container">

            <div class="form-container">
                <div class="left">
                    <h1>Welcome back!</h1>
                    <p>We're so excited to see you again!</p>
                    <?php
if ($incorrect_password == 1 || $no_user_exists_err == 1) {
    echo '<div class="alert alert-danger">
            ' . $err . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';
}
?>
                    <form action="login.php" method="POST" class="login-form">
                        <input type="email" name="email" placeholder="Email" required>

                        <input type="password" name="password" placeholder="Password" required>

                        <a href="forgot_password.php" id="fpass">Forgot your password?</a>

                        <input type="submit" name="login" class="login-btn" value="login">

                        <div class="register">
                            <p>Need an account?</p>
                            <a href="signup.php">Sign Up</a>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <img src="../images/logo.png" alt="Viber" />
                </div>
            </div>
        </div>
    </div>

    <!-- javaScript -->
    <script src="../js/main.js"></script>
</body>

</html>