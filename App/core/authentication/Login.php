<?php

class Login extends QueryBuilder

{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'users';
        $this->column = array('name', 'email', 'password', 'user_type', 'activated');
        $this->values = array('name', 'email', 'password');
    }

    public function userLogin($email)
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty(trim($_POST["email"]))) {
                $email_err = "Please enter email";
            } else {
                $email = trim($_POST["email"]);
            }

            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password";
            } else {
                $password = $_POST["password"];
            }

            if (empty($email_err) && empty($password_err)) {
                $this->values = array('email');
                $stmt = parent::select($this->table, $this->column, $this->values, $email);


                if ($stmt->execute()) {
                    if ($stmt->rowcount() == 1) {

                        if ($row = $stmt->fetch()) {
                            $hashed_password = $row["password"];

                            if (password_verify($password, $hashed_password)) {
                               
                                if ($row['activated']) {
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["name"] = $row['name'];
                                    $_SESSION["email"] = $row['email'];
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['user_type'] = $row['user_type'];

                                    $str = $row['user_type'];
                                    header("location:/$str");
                                } else {

                                    echo "First verify your email via link";
                                }
                            } else {

                                echo "Invalid Password.";
                            }
                        }
                    } else {

                        echo  "Email not Found";
                    }
                } else {

                    echo "Sorry for the inconvenience.... Please try again later";
                }
            }
        }
    }

    public function gLogin($name, $email)
    {
        $sel_column = array('email', 'user_type');

        $sel_values = array('email');

        $stmt = parent::select($this->table, $sel_column, $sel_values, $email);
        if ($stmt->execute()) {

            $count = $stmt->rowcount();
            if ($count == 1) {

                $row = $stmt->fetch();  
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["name"] = $row['name'];
                $_SESSION["email"] = $row['email'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_type'] = $row['user_type'];

                if ($row['user_type'] == 'admin') {     
                    header('location:/admin');
                } else {
                    header('location:/reader');
                }
            } else {
                $column = array('name', 'email', 'provider', 'activated');
                $email = "'" . $email . "'";
                $name = "'" . $name . "'";
                $values = array($name, $email, $email, '1');
                $result = parent::insert($this->table, $column, $values);
                $entry = $result->execute();
                $stmt->execute();
                $row = $stmt->fetch();
                session_start();
                $_SESSION["loggedin"] = true;
                
                $_SESSION['name'] = $row['name'];
                $_SESSION["email"] = $row['email'];
                
                $_SESSION['user_type'] = $row['user_type'];
                
                return $entry;
            }
        }
    }

    public function gAuth()
    {
       require "gmailconfig.php";
       

        if (isset($_GET['code'])) {
            $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
            $gClient->setAccessToken($token['access_token']); 
            $oAuth = new Google_Service_Oauth2($gClient); 
            $userData = $oAuth->userinfo_v2_me->get();   
            return $userData;
        } else {
            return  $gClient->createAuthUrl();
        }
    }
}
