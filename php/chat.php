<!DOCTYPE html>
<?php
session_start();
$email = $_SESSION['email'];
include 'connectdb.php';
$get_user = "SELECT * FROM users WHERE email_id='$email'";

$qry = mysqli_query($link, $get_user);
if (!$qry) {
    die('Query failed: ' . mysqli_error($link));
}
$row = mysqli_fetch_array($qry);

$user_id = $row['user_id'];
$_SESSION['logged_in_user_id'] = $user_id;
$user_name = $row['name'];
?>

<?php
if (isset($_GET['user_id'])) {
    $receiver_id = $_GET['user_id'];

    $qry = "SELECT * FROM users WHERE user_id='$receiver_id'";
    $result = mysqli_query($link, $qry);
    if (!$result) {
        die('Query failed: ' . mysqli_error($link));
    }
    $row = mysqli_fetch_array($result);

    $receiver_name = $row['name'];
    $receiver_profile_pic = $row['user_profile'];
    $receiver_login = $row['login'];
    if ($receiver_login == 1) {
        $state = 'Online';
    } else {
        $state = 'Offline';
    }

    $total_messages = "SELECT * FROM users_chat WHERE (sender_id='$user_id' AND receiver_id='$receiver_id') OR (sender_id='$receiver_id' AND receiver_id='$user_id')";
    $run_query = mysqli_query($link, $total_messages) or die("Unable to count messages");

    $total = mysqli_num_rows($run_query);

    $qry = "UPDATE users_chat SET msg_status='READ' WHERE sender_id='$receiver_id' AND receiver_id='$user_id'";
    $result = mysqli_query($link, $qry);
    if (!$result) {
        die('Query failed: ' . mysqli_error($link));
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Viber</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/chat.css" />
    <link rel="stylesheet" href="../css/global.css" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/b297730ddb.js" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container chat-page-container">

        <?php include 'sidebar.php';?>
        <?php include 'userlist.php';?>

        <!-- chat -->
        <div class="chat">
            <div class="chat-header">
                <div class="left">
                    <?php
$user_id = $_SESSION['logged_in_user_id'];

$_SESSION['new-count'] = 0;
echo "<img src=" . "../uploads/" . $receiver_profile_pic . " class='pp'>
    <div class='name-status'>
       <h1> $receiver_name  </h1>
        <span class='user-status'>$state</span>
    </div>";
?>
                </div>
                <div class="right">
                    <?php
echo $total;
if ($total == 1) {
    echo " Message";
} else {
    echo " Messages";
}

?>
                </div>
            </div>

            <div class="chat-box">
                <?php
$qry = "SELECT * FROM users_chat WHERE (sender_id='$user_id' AND receiver_id='$receiver_id') OR (sender_id='$receiver_id' AND receiver_id='$user_id') ORDER BY msg_id";

$result = mysqli_query($link, $qry) or die('Failed to load messages');

while ($row = mysqli_fetch_array($result)) {
    $sender_userid = $row['sender_id'];
    $receiver_userid = $row['receiver_id'];
    $msg_content = $row['msg_content'];
    $msg_status = $row['msg_status'];
    $msg_date = $row['msg_date'];

    if ($sender_userid == $user_id && $receiver_userid == $receiver_id) {
        if ($msg_status == 'READ') {
            echo "<div class='chat-r'>
					<div class='sp'></div>
					<div class='mess mess-r'>
						<p>
                           $msg_content
						</p>
						<div class='check'>
							<span>$msg_date</span>
							<img src='../images/img/markread.png'>
						</div>
					</div>
				</div>";
        } else {
            echo "<div class='chat-r'>
                    <div class='sp'></div>
                    <div class='mess mess-r'>
                        <p>
                            $msg_content
                        </p>
                        <div class='check'>
                            <span>$msg_date</span>
                            <img src='../images/img/delivered.png'>
                        </div>
                    </div>
                </div>";
        }

    } else if ($sender_userid == $receiver_id && $receiver_userid == $user_id) {
        echo "<div class='chat-l'>
                <div class='mess'>
                    <p>
                        $msg_content
                    </p>
                    <div class='check'>
                        <span>$msg_date</span>
                    </div>
                </div>
                <div class='sp'></div>
            </div>";
    }
}
?>
            </div>

            <!-- chat footer -->
            <form method="POST">
                <div class="chat-footer">
                    <textarea name="message" class="autoExpand" rows='1' data-min-rows='1'
                        placeholder="Type a message"></textarea>
                    <button name="submit">
                        <i class="fas fa-2x fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php
if (isset($_POST['submit'])) {
    $message = $_POST['message'];

    if ($message == "") {
        echo "<script>alert('Please enter a message to Chat!')</script>";

    } else if (strlen($message) > 250) {
        echo "<script>alert('Message is too long. Limit till 1023 characters!!!')</script>";
    } else {

        $qry = "SELECT * FROM users_chat WHERE sender_id='$user_id' AND receiver_id='$receiver_id' AND '$message' = (SELECT msg_content FROM users_chat WHERE sender_id='$user_id' AND receiver_id='$receiver_id' ORDER BY msg_id DESC LIMIT 1) ORDER BY msg_id DESC LIMIT 1";
        $result = mysqli_query($link, $qry);
        if (mysqli_num_rows($result) == 0) {
            $insert = "INSERT INTO users_chat (sender_id,receiver_id,msg_content,msg_status,msg_date) VALUES ('$user_id','$receiver_id','$message','UNREAD',NOW())";
            $run_insert = mysqli_query($link, $insert);
        }
    }
}
?>

    <!-- javaScript -->
    <script src="../js/chat.js"></script>
    <script src="../js/main.js"></script>
</body>


</html>