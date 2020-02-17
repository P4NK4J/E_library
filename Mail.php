<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'ssl://smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'kandpalpankaj08@gmail.com';
        $this->mail->Password = '8449973829';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
    }

    public function sendMail($lastID, $hash)
    {
        $this->mail->setFrom('kandpalpankaj08@gmail.com', 'F.R.I.E.N.D.S.');
        $this->mail->addAddress($_POST['email']);
        $this->mail->Subject = "Verification link";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 0;
        $this->base_url = "http://3.6.32.116/activation?hash=${hash}&id={$lastID}";
        $this->mailContent = 'Hi, <br/> <br/> verification is required for your email address before we migrate to the application.
            <br/> <br/> <a href ="'.$this->base_url.'">Click here to verify.</a>
        ' ;
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } 
        
    }
}