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
    $sql = "SELECT id, name, email FROM  user WHERE email = :email AND password = :password";
    $obj = $this->pdo->prepare($sql);
    $obj->bindParam(':email',$this->data['email']);
    $obj->bindParam(':password',$this->data['password']);
  return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }

  function login_set_token(){
    $sql = "UPDATE user SET token = :token WHERE id = :id";
    $obj = $this->pdo->prepare($sql);
    $obj->bindParam(':token',$this->data['token']);
    $obj->bindParam(':id',$this->data['user_id']);
    return ($obj->execute()) ? true : false;
  }

  function login_get_token(){
    $sql = "SELECT token FROM user WHERE id = :id";
    $obj = $this->pdo->prepare($sql);
    $obj->bindParam(':id',$this->data['user_id']);
    return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }
}


?>
