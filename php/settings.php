<?php

session_start();
include 'connectdb.php';
$email = $_SESSION['email'];
$qry = "SELECT * FROM users WHERE email_id = '$email'";
$result = mysqli_query($link, $qry);

$row = mysqli_fetch_assoc($result);
$old_hash = $row['password'];

if (isset($_POST['save'])) {

    if ($_POST['save'] == 'saved') {

        $err = "";
        $succ = "";

        $curr_password = $_POST['curr_password'];

        if (password_verify($curr_password, $old_hash)) {
            $name = $_POST['user-name'];
            $new_email = $_POST['email'];
            $gender = $_POST['gender'];
            $new_dob = $_POST['dob'];
            $dob = date("Y-m-d", strtotime($new_dob));
            $country = $_POST['country'];
            $bio = $_POST['bio'];
            $password = $_POST['password'];
            $user_id = $row['user_id'];

            if (isset($_FILES['image'])) {

                $imageName = $_FILES['image']['name'];
                $imageTempName = $_FILES['image']['tmp_name'];
                $imageSize = $_FILES['image']['size'];
                $imageError = $_FILES['image']['error'];
                $imageType = $_FILES['image']['type'];

                $imageExt = explode('.', $imageName);
                $imageActualExt = strtolower(end($imageExt));

                if ($imageError === 0) {
                    $imageNameNew = "profile" . $row['user_id'] . "." . $imageActualExt;
                    $imageDestination = '../uploads/' . $imageNameNew;
                    move_uploaded_file($imageTempName, $imageDestination);
                    $qry = "UPDATE `users` SET `user_profile` = '$imageNameNew' WHERE `users`.`email_id` = '$email'";
                    $result = mysqli_query($link, $qry);

                    if ($result) {
                        $succ .= " Profile picture updated successfully!";
                    }
                }
            }

            if (strlen($name) > 0) {
                echo '<script Type="text/javascript">
                    handleExtraSpaces(`$name`);
                </script>';

                if ($name != $row['name']) {
                    $qry = "UPDATE `users` SET `name` = '$name' WHERE `users`.`email_id` = '$email'";

                    $result = mysqli_query($link, $qry);
                }
            }

            if (strlen($password) >= 6) {
                $cpassword = $_POST['cpassword'];
                if ($cpassword == $password) {
                    if (!password_verify($password, $old_hash)) {
                        $new_hash = password_hash($password, PASSWORD_DEFAULT);
                        $qry = "UPDATE `users` SET `password` = '$new_hash' WHERE `email_id` = '$email'";
                        $result = mysqli_query($link, $qry);

                        if ($result) {
                            $succ .= ' Password Updated!';
                        } else {
                            $err .= "password not updated!";
                        }
                    }
                } else {
                    $err = "Passwords do not match!";
                }
            }

            if (strlen($bio) >= 0) {
                echo '<script Type="text/javascript">
                    handleExtraSpaces(`$bio`);
                </script>';

                if ($bio != $row['bio']) {
                    $qry = "UPDATE `users` SET `bio` = '$bio' WHERE `users`.`email_id` = '$email'";
                    $result = mysqli_query($link, $qry);
                    if (!$result) {
                        $err = " bio not updated!" . mysqli_error($link);
                    } else {
                        $succ = "bio updated!";
                    }
                }
            }

            if ($country != $row['country']) {
                $qry = "UPDATE `users` SET `country` = '$country' WHERE `users`.`email_id` = '$email'";
                $result = mysqli_query($link, $qry);
            }

            if ($dob != $row['dob']) {
                $qry = "UPDATE `users` SET `dob` = '$dob' WHERE `email_id` = '$email'";
                $result = mysqli_query($link, $qry);
            }

            if ($gender != $row['gender']) {
                $qry = "UPDATE `users` SET `gender` = '$gender' WHERE `email_id` = '$email'";
                $result = mysqli_query($link, $qry);

                if (!$result) {
                    $err .= " Gender not updated! " . $gender;
                } else {
                    $succ .= " Gender updated!";
                }
            }

            if ($new_email != $email) {
                $qry = "UPDATE `users` SET `email_id` = '$new_email' WHERE `users`.`email_id` = '$email'";
                $result = mysqli_query($link, $qry);
                if (!$result) {
                    $err .= " Email not updated!";
                } else {
                    $_SESSION['email'] = $new_email;
                }
            }

            header("Refresh:2; url=settings.php");

        } else {
            $err = "Incorrect password!";
        }
    } else {
        header('location: settings.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viber | Settings</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/newsettings.css">
    <link rel="stylesheet" href="../css/custom_select.css">
</head>

<body>
    <div class="container">
        <?php include 'sidebar.php';?>

        <div class="settings-container">
            <div class="header">
                <h1>settings</h1>
            </div>
            <form action="settings.php" method="POST" enctype="multipart/form-data">
                <div class="setting-rows">
                    <div class="row">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg, .gif" name="image" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    <?php echo 'style="background-image:url(../uploads/' . $row['user_profile'] . ');"' ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row about">
                        <h1>Short Bio </h1>
                        <h1><span id="count"></span></h1>
                        <textarea name="bio" id="bio" class="autoExpand" rows="1" data-min-rows="1"
                            placeholder="Add a Short Bio.." maxlength="250"><?php echo $row['bio']; ?></textarea>
                    </div>
                    <div class=" row">
                        <?php
if ($err) {
    echo '<div class="alert alert-danger">
            ' . $err . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';

}
?>
                    </div>
                    <div class="row">
                        <?php
if ($succ) {
    echo '<div class="alert alert-success">
            ' . $succ . '
            <button class="alert-hide">
                <i class="fas fa-times"></i>
            </button>
        </div>';
}
?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field ttc" type="text" name="user-name" autocomplete="off"
                                    maxlength="100" placeholder=" " value="<?php echo $row['name']; ?>" />
                                <label for="name" class="input-label"> Name </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field" type="email" name="email" autocomplete="off" placeholder=" "
                                    maxlength="100" value="<?php echo $row['email_id'] ?>" ; " />
                                <label for=" name" class="input-label"> Email </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="custom-input ttc">
                                <input type="text" class="input-field" name="gender" placeholder=" " autocomplete="off"
                                    maxlength="10" value="<?php echo $row['gender']; ?>">
                                <label for="gender" class="input-label">Gender</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-date input-field" type="date" name="dob"
                                    value="<?php echo $row['dob']; ?>" autocomplete="off" placeholder=" " />
                                <label for="name" class="input-label"> Birth Date </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field" type="password" name="password" autocomplete="off"
                                    placeholder=" " minlength="6" />
                                <label for="password" class="input-label"> New password </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field" type="password" name="cpassword" autocomplete="off"
                                    placeholder=" " minlength="6" />
                                <label for="cpassword" class="input-label">Confirm new password </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field ttc" type="text" name="country" autocomplete="off"
                                    placeholder=" " value="<?php echo $row['country']; ?>" />
                                <label for="country" class="input-label"> Country </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="custom-input">
                                <input class="input-field" type="password" name="curr_password" autocomplete="off"
                                    placeholder=" " required minlength="6" />
                                <label for="curr_password" class="input-label">Enter current password </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="reset" class="btn rsquare-btn">Clear</button>
                        </div>
                        <div class="col">
                            <button class="btn rsquare-btn" type="submit" name="save" value="saved">
                                save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- javaScript -->
    <script src="../js/main.js"></script>
</body>

</html>