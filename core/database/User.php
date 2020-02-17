<?php

class User extends Login
{
  public function __construct($pdo)
  {
    parent::__construct($pdo);
    $this->table = 'users';
    $this->column = array('id', 'provider', 'provider_id', 'name', 'email', 'password', 'user_type', 'hash', 'activated');
    $this->values = array('name', 'email', 'password');
  }



  //function to select the list of all items in a table.

  public function selectAll()
  {
    return  parent::record($this->table, $this->column);
  }



  //function to add a user to the database.

  public function addUser($name, $email, $password)
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
        session_start();
        $pass_err = "Password do not match";
        $_SESSION["err"] = $pass_err;
        header('location:/signup-form');;
      } else {
        $hash = md5(rand(0, 1000));
        $cred[4] = "'" . $hash . "'";
        $column = array('name', 'email', 'password', 'user_type', 'hash');
        $insert = parent::insert($this->table, $column, $cred);
        $insert->execute();
        $lastID = $this->pdo->lastinsertID();
        $mail = new Mail();
        $mail->sendMail($lastID, $hash);
        header("location:/verifymsg");
      }
    } else {
      session_start();
      $error = "Email Id already exists";
      $_SESSION["err"] = $error; 
      header('location:/signup-form');}
  }


  public function activateUser($hash)

  {

    $values = array('hash');
    $stmt = parent::select($this->table, $this->column, $values, $hash);

    if ($stmt->execute()) {
      $count = $stmt->rowcount();
      if ($count == 1) {
        $stmt = parent::update($this->table, ['activated' => '1'], 'hash', $hash);
        return $stmt->execute();
      }
    }
  }

  public function userList($type)
  {

    $table = 'users';
    $column = array('id', 'name', 'email', 'registration_date',);
    $values = array('user_type');
    $stmt = parent::select($table, $column, $values, $type);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
  }

  public function deleteUser($id)
  {
    return parent::deleteAll($this->table, 'id', $id);
  }
  public function selectUser($id)
  {
    $this->values = array('id');
    return parent::select($this->table, $this->column, $this->values, $id);
  }
}
