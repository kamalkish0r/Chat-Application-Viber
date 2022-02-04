<!-- Chat navbar -->
<div class="chat-column">
    <div class="top">
        <div id="toprow">
            <h1 class="heading">Chat</h1>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search" onkeyup="searchUser()" id="search-input"
                style=" margin: -1rem 0;" />
            <button type="submit" id="search-btn" style="top: 0px;">
                <i class="fa fa-lg fa-search"></i>
            </button>
            <script src="../js/chat.js"></script>
        </div>
    </div>

    <div class="chat-navbar-rows">
        <?php
include_once 'connectdb.php';
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email_id='$email'";
$result = mysqli_query($link, $query);
if (!$result) {
    die('Query failed: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($result);
$user = $row['user_id'];
$users = "SELECT DISTINCT receiver_id,u.user_id,u.name,u.user_profile,u.login FROM users_chat uc JOIN users u ON u.user_id=uc.receiver_id WHERE sender_id='$user'";
$run_user = mysqli_query($link, $users);

if (!$run_user) {
    die('Query failed: ' . mysqli_error($link));
}

while ($row = mysqli_fetch_array($run_user)) {
    $user_id = $row['user_id'];
    $user_profile = $row['user_profile'];
    $name = $row['name'];
    $login = $row['login'];

    $qry = "SELECT * FROM users_chat WHERE (sender_id='$user' AND receiver_id='$user_id') OR (sender_id='$user_id' AND receiver_id='$user') ORDER BY msg_id DESC LIMIT 1";
    $run_query = mysqli_query($link, $qry);
    $row = mysqli_fetch_assoc($run_query);
    $message = $row['msg_content'];
    $time = $row['msg_date'];
    $date = explode(' ', $time);

    $msg_id = $row['msg_id'];
    $qry2 = "SELECT COUNT(*) AS count FROM users_chat where sender_id='$user_id' AND receiver_id='$user' AND msg_status='UNREAD'";
    $res = mysqli_query($link, $qry2);
    $row1 = mysqli_fetch_assoc($res);
    $count = $row1['count'];

    echo "<div class='row'>
    <img src=" . "../uploads/" . $user_profile . " />
    <div class='mid'>
    <h1 id='username'>
    <a style='color:white; text-decoration:none;' href='chat.php?user_id=$user_id'>$name</a>
    </h1>
    <p style='color:rgb(15, 238, 34);font-size:13px;' class='last-message'>$message</p>
    </div>
    <div class='right'>
    <p style='margin-right: -20px;position: relative;right: 15px;' class='last-message-time'>$date[1]</p>
    <p id='unread-message-count'>$count</p>
    </div>
    </div>";
}

$qry = "SELECT user_id FROM users WHERE email_id='$email'";
$res = mysqli_query($link, $qry);
if (!$res) {
    die('Query failed: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($res);
$user = $row['user_id'];
$users = "SELECT DISTINCT receiver_id,u.user_id,u.name,u.user_profile,u.login FROM users_chat uc JOIN users u ON u.user_id=uc.sender_id WHERE receiver_id='$user' AND u.user_id NOT IN (SELECT DISTINCT receiver_id FROM users_chat uc JOIN users u ON u.user_id=uc.receiver_id WHERE sender_id='$user')";
$run_user = mysqli_query($link, $users);
if (!$run_user) {
    die('Query failed: ' . mysqli_error($link));
}
while ($row = mysqli_fetch_array($run_user)) {

    $user_id = $row['user_id'];
    $user_profile = $row['user_profile'];
    $name = $row['name'];
    $login = $row['login'];

    $qry = "SELECT * FROM users_chat WHERE (sender_id='$user' AND receiver_id='$user_id') OR (sender_id='$user_id' AND receiver_id='$user') ORDER BY msg_id DESC LIMIT 1";
    $run_query = mysqli_query($link, $qry);
    if (!$run_query) {
        die('Query failed: ' . mysqli_error($link));
    }
    $row = mysqli_fetch_assoc($run_query);
    $message = $row['msg_content'];
    $time = $row['msg_date'];
    $date = explode(' ', $time);
    $msg_id = $row['msg_id'];

    $qry2 = "SELECT COUNT(*) AS count FROM users_chat where sender_id='$user_id' AND receiver_id='$user' AND msg_status='UNREAD'";
    $res = mysqli_query($link, $qry2);
    if (!$res) {
        die('Query failed: ' . mysqli_error($link));
    }
    $row1 = mysqli_fetch_assoc($res);
    $count = $row1['count'];

    echo "<div class='row'>
    <img src=" . "../uploads/" . $user_profile . " />
    <div class='mid'>
    <h1 id='username'><a style='color:white; text-decoration:none;' href='chat.php?user_id=$user_id'>$name</a> </h1>
    <p style='color:rgb(15, 238, 34);font-size:13px;' class='last-message'>$message</p>
    </div>
    <div class='right'>
    <p style='margin-right: -20px;position: relative;right: 15px;' class='last-message-time'>$date[1]</p>
    <p id='unread-message-count'>$count</p>
    </div>
    </div>";
}
?>
    </div>
</div>