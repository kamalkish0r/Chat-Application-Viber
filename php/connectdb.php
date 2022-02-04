<?php
$connError = "Due to some technical error we are unable to connect you from server. Try again after some time.";
$link = mysqli_connect('localhost', 'root', '', 'VIBER') or die($connError);