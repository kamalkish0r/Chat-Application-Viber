<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'connectdb.php';
    $err = "";
    $succ = "";
    $accSucc = 0;
    $passErr = 0;
    $userExistsErr = 0;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $new_dob = $_POST['dob'];
    $dob = date("Y-m-d", strtotime($new_dob));
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $qry = "SELECT * FROM users WHERE email_id = '$email'";
    $result = mysqli_query($link, $qry) or die($connError);

    $row = mysqli_fetch_array($result);
    if ($row == null) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $qry = "INSERT INTO
                users (name, email_id, password, dob) VALUES
                ('$name', '$email', '$hash','$dob')";

            $result = mysqli_query($link, $qry);
            if (!$result) {
                $err = "Account not created!";
                echo "Error: " . $qry . "<br>" . $link->error;

            } else {
                $accSucc = 1;
                $succ = "Account successfully created!";
                $qry = "UPDATE users SET login='1' WHERE email_id='$email'";
                $result = mysqli_query($link, $qry);

                session_start();
                $_SESSION['AUTH'] = 1;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                header('location: chat.php');
            }
        } else {
            $passErr = 1;
            $err = "Passwords do not match!";
        }

    } else {
        $userExistsErr = 1;
        $err = "User with same email address already exits.";
    }
} else {
    // header('location: signup.php');
    // exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Viber | Sign Up</title>

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/b297730ddb.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
    <div class="container">
        <div class="sub-container">
            <div class="form-container">
                <div class="left">
                    <h1>Welcome</h1>
                    <p>Please enter the following details to get started with Viber</p>
                    <?php
if ($passErr == 1 || $userExistsErr == 1) {
    echo '<div class="alert alert-danger">
            ' . $err . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';
}
if ($accSucc == 1) {
    echo '<div class="alert alert-success">
            ' . $succ . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';
}
?>
                    <form action="signup.php" method="post" class="login-form">
                        <input type="text" name="name" placeholder="Name" required class="ttc" />

                        <input type="email" name="email" placeholder="Email Address" required />

                        <input type="date" name="dob" id="dob" required>

                        <input type="password" name="password" placeholder="Password" minlength="6" required />

                        <input type="password" name="cpassword" placeholder="Confirm Password" minlength="6" required />

                        <button type="submit" class="login-btn" name="signup" value="signup">Sign Up</button>

                        <div class="login">
                            <p>Already signed up?</p>
                            <a href="login.php">login</a>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <div class="right">
                        <img src="../images/logo.png" alt="Viber" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- javaScript -->
    <script src="../js/main.js"></script>
</body>

</html>