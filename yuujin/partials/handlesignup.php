<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($con, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Account with this email-id already exist";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $showAlert = true;
                header('Location: /yuujin/index.php?signupsuccess=true');
                exit();
            }
        } else {
            $showError = "Passwords don't match";
        }
    }
    header('Location: /yuujin/index.php?signupsuccess=false&error=$showError');
}
