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
                session_start();
                $email_err = "Please enter email";
                $_SESSION["err"] = $email_err;
                header('location:/');
            } else {
                $email = trim($_POST["email"]);
            }

            if (empty(trim($_POST["password"]))) {
                session_start();
                $password_err = "Please enter your password";
                $_SESSION["err"] = $password_err;
                header('location:/');
            } else {
                $password = $_POST["password"];
            }
            if (empty($_POST["email"]) && empty($_POST["password"])) {
                session_start();
                $error = "Please fill up the form";
                $_SESSION["err"] = $error;
                header('location:/');
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
                                    session_start();
                                    $err_message = "Account not activated";
                                    $_SESSION["err"] = $err_message;

                                    header('location:/');
                                }
                            } else {

                                session_start();
                                $err_message = "The password you entered was not valid";
                                $_SESSION["err"] = $err_message;

                                header('location:/');
                            }
                        }
                    } else {

                        session_start();
                        $err_message = "No account found with that email";
                        $_SESSION["err"] = $err_message;
                        header('location:/');
                    }
                } else {

                    session_start();
                    $err_message = "Oops! something went wrong";
                    $_SESSION["err"] = $err_message;
                    header('location:/');
                }
            }
        }
    }

    public function gLogin($name, $email)
    {
       

        $sel_values = array('email');

        $stmt = parent::select($this->table, $this->column, $sel_values, $email);
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
                $name = "'" . $name . "'";
                $emailnew = "'" . $email . "'";
                $active = "1";
                $values = array($name, $emailnew, $emailnew, $active);
                $stmt = parent::insert($this->table, $column, $values);
                $stmt->execute();
                $value = array('email');
                array_unshift($column, 'id');
                array_push($column, 'user_type');
                $stmt = parent::select($this->table, $column, $value, $email);
                $stmt->execute();
                $count = $stmt->rowcount();
                if ($count == 1) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_type'] = $row['user_type'];
                    if ($_SESSION['user_type'] == 'reader') {
                        header('location: /reader');
                    } else {
                        header('location: /admin');
                    }
                }
        }
    }
}

    public function gAuth()
    {
        require "gmailconfig.php";
        if (isset($_GET['code'])) {
            $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
            $gClient->setAccessToken($token['access_token']);
            // get profile info

            $google_oauth = new Google_Service_Oauth2($gClient);

            $google_account_info = $google_oauth->userinfo->get();
            return $google_account_info;
            //now you can use this profile info to create account in your website and make user logged in.
        } else {
            return $gClient->createAuthUrl();
        }
    }

    public function forgotPassword($email)
    {
        $this->values = array('email');
        $stmt = parent::select($this->table, $this->column, $this->values, $email);
        return $stmt;
    }
    public function resetPassword($hash, $email, $secured_password)
    {
        $this->values = array('hash');
        $stmt = parent::select($this->table, $this->column, $this->values, $hash);
        if ($stmt->execute()) {
            $count = $stmt->rowcount();
            var_dump($count);
            if ($count == 1) {
                $stmt = parent::update($this->table, ['password' => $secured_password], 'hash', $hash);

                return $stmt->execute();
            }
        }
    }
}
