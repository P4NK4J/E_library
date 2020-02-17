<?php

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $user = $app['database']->forgotPassword($email);
    $user->execute();
    $res = $user->fetch(PDO::FETCH_ASSOC);
    $name = $res['name'];
    $hash = $res['hash'];
    if ($user->rowcount() == 1) {
        $mail = new PasswordMail();
        $current_time = time();
        $mail->sendMail($email,$hash,$name,$current_time);
        header('location:/message');
    } else {
        session_start();
        $email_err = "Account not found";
        $_SESSION["err"] = $email_err;
        header('location:/reseterror');
    }
}