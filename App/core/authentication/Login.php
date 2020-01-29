<?php


class Login extends QueryBuilder

{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'users';
        $this->column = array('name', 'email', 'password','user_type','activated');
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

                            $name = $row["name"];
                            $email = $row["email"];

                            $hashed_password = $row["password"];

                            if (password_verify($password, $hashed_password)) {
                                if (session_status() == PHP_SESSION_NONE)
                                    session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["name"] = $name;
                                $_SESSION["email"] = $email;

                                if ($row['activated'] == 1) {
                                    $str = $row['user_type'];
                                    header("location:/$str");
                                }
                                else{
                                    echo "First verify your email via link";
                                }
                            } else {
                                echo "The password you entered was not valid.";
                            }
                        }
                    } else {
                        echo  "No account found with that email";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later";
                }
            }
        }
    }

    public function GLogin($name, $email)
    {
        $sel_column = array('email', 'user_type');

        $sel_values = array('email');

        $stmt = parent::select($this->table, $sel_column, $sel_values, $email);
        if ($stmt->execute()) {

            $count = $stmt->rowcount();
            if ($count == 1) {

                $row = $stmt->fetch();  //row corresponding to the user in database

                if ($row['user_type'] == 'admin') {      // user_type column in database
                    header('location:/admin');
                } else {
                    header('location:/reader');
                }
            } else {
                $column = array('name', 'email', 'provider', 'activated');
                $email = "'" . $email . "'";
                $name = "'" . $name . "'";
                $values = array($name, $email, $email, '1');
                $stmt = parent::insert($this->table, $column, $values);
                header("location:/reader");
                return $stmt->execute();
            }
        }
    }



    public function GAuth()
    {
        require_once "gmailconfig.php";

        if (isset($_GET['code'])) {
            $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);


            $oAuth = new Google_Service_Oauth2($gClient); //profile informatiom
            $userData = $oAuth->userinfo_v2_me->get();   // full info of user available in gmail account.
            return $userData;
        } else {
            return $client->createAuthUrl();
        }
    }
}
