<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viber | All Users</title>

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/find_user.css">
</head>

<body>
    <div class="container">
        <div class="find_user_container">
            <?php include 'sidebar.php';?>
            <div class="sub-container">
                <div class="search-container border-bottom">
                    <div class="search-bar">
                        <input type="text" placeholder="Search" onkeyup="searchUserFromAll()" id="search-input"
                            style=" margin: -1rem 0;" />
                        <button type="submit" id="search-btn" style="top: 0px;">
                            <i class="fa fa-lg fa-search"></i>
                        </button>
                        <script src="../js/chat.js"></script>
                    </div>
                </div>
                <div class="rows">
                    <?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
    exit();
}
include_once 'connectdb.php';
$fetch_user = "SELECT * FROM users ORDER BY name";
$run_user = mysqli_query($link, $fetch_user);
while ($row = mysqli_fetch_array($run_user)) {
    $user_id = $row['user_id'];
    $name = $row['name'];
    $user_email = $row['email_id'];
    $profile = $row['user_profile'];

    if ($_SESSION['email'] != $user_email) {
        echo "<div class='card'>
                <img src=" . "../uploads/" . $profile . ">
                <div class='card-body'>
                    <h1 class='card-title'>$name</h1>
                    <p class='card-title-text'></p>
                </div>
                <a href='chat.php?user_id=$user_id' class='btn rsquare-btn'>continue to chat</a>
            </div>";
    }
}
?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>