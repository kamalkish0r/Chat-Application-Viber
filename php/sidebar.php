<?php
session_start();
include 'connectdb.php';
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE `email_id` = '$email'";
$res = mysqli_query($link, $sql);
$r = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/b297730ddb.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/sidebar.css">
</head>

<body>
    <div class="sidebar">
        <ul>
            <li>
                <a href="settings.php" id="sidebar_profile_pic">
                    <?php echo "<img src=" . "../uploads/" . $r['user_profile'] . " />" ?>
                </a>
            </li>
            <li>
                <a href="chat.php" class="s-btn">
                    <i class="fas fa-2x fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="find_user.php" class="s-btn">
                    <i class="fas fa-users"></i>
                    <span>All Users</span>
                </a>
            </li>
            <li>
                <a href="settings.php" class="settings s-btn">
                    <i class="fas fa-2x fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="logout.php" class="signout s-btn">
                    <i class="fa fa-2x fa-sign-out"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</body>

</html>