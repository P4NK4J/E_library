<?php

class User extends Login
{
  public function __construct($pdo)
  {
    parent::__construct($pdo);
    $this->table = 'users';
    $this->column = array('id','provider','provider_id','name', 'email', 'password','user_type','hash' );
    $this->values = array('name', 'email', 'password');
  }

  public function selectUsers()
  {
    return parent::record($this->table, $this->column);
  }

  public function addUser($name,$email,$password)
  {
    $secured_pass = password_hash($password, PASSWORD_BCRYPT);
        $cred = [];
        $cred[0] = "'" . trim($_POST['name']) . "'";
        $cred[1] = "'" . trim($_POST['email']) . "'";
        $cred[2] = "'" . $secured_pass . "'";
        $cred[3] = "'" . "reader" . "'";
        $verify_password =  $_POST['re_password'];
        $this->values = array('email');
        $select = parent::select($this->table, $this->column, $this->values, $email);
        $select->execute();
        if ($select->rowcount() == 0) {
            if ($password != $verify_password) {
                echo 'Password do not match';
            } else {
                $hash = md5(rand(0, 1000));
                $cred[4] = "'" . $hash . "'";
                array_shift($this->column);
                array_shift($this->column);
                array_shift($this->column);
                $insert = parent::insert($this->table, $this->column, $cred);
                $insert->execute();
                header("location:/dashboard");
            }
        } else {
            echo "Email Id already exists. Please use different Email Id";
        }

  }
}
  


