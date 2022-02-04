<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connectdb.php';

    $err = "";
    $success = "";
    $showSucc = 0;
    $showError = 0;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['cpassword'];
    $currDob = $_POST['dob'];
    $dob = date("Y-m-d", strtotime($currDob));

    $qry = "SELECT * FROM users WHERE email_id='$email'";
    $result = mysqli_query($link, $qry);
    if (!$result) {
        die("Error: " . mysqli_error($link));
    }

    $row = mysqli_fetch_array($result);
    if ($row == null) {
        $err = "Invalid Email!";
        $showError = 1;
    } else {
        if ($password != $confirmPassword) {
            $err = "Password does not match!";
            $showError = 1;
        } else {
            if ($row['dob'] != $dob) {
                $err = "Invalid Date of Birth!";
                $showError = 1;
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $qry = "UPDATE users SET password='$hash' WHERE email_id='$email'";
                $result = mysqli_query($link, $qry);
                if (!$result) {
                    die("Error: " . mysqli_error($link));
                } else {
                    $success = "Password changed successfully!";
                    $showSucc = 1;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viber</title>

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/forgot_password.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form-container ">
            <form action="forgot_password.php" method="POST" class="input-field-2">
                <?php
if ($showError == 1) {
    echo '<div class="alert alert-danger">
            ' . $err . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';

} else if ($showSucc == 1) {
    echo '<div class="alert alert-success">
            ' . $success . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';

    header("refresh: 3; url = login.php");
}
?>
                <label for="dob">Please enter your Date of Birth to change password</label>
                <input type="date" name="dob" id="dob" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="New Password" minlength="6" required>
                <input type="password" name="cpassword" placeholder="Confirm New Password" minlength="6" required>
                <input type="submit" class="btn rsquare-btn" name="submit" value="submit">
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>