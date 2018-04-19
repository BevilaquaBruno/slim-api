<?php

/**
 * login Model
 */
class LoginModel
{
  private $pdo;
  private $data;

  function __construct($pdo,$data)
  {
    $this->pdo = $pdo;
    $this->data = $data;
  }

  function login_sign_in()
  {
    $sql = "SELECT id, name, email FROM user WHERE email = :email AND password = :password";
    $obj = $this->pdo->prepare($sql);
    $obj->bindParam(':email',$this->data['email']);
    $obj->bindParam(':password',$this->data['password']);
  return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }
}


?>
