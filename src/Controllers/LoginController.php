<?php

/**
 * Login
 */
class LoginController
{
  private $model;
  private $data;
  private $pdo;

  function __construct($model, $data, $pdo)
  {
    $this->model = $model;
    $this->data = $data;
    $this->pdo = $pdo;
  }

  function sign_in()
  {
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
    if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true ) {
      return(false);
    }
    if (!isset($this->data['email']) || $this->data['email'] == '' || !isset($this->data['password']) || $this->data['password'] == '')
    {
      return(false);
    }
    $this->data['password'] = md5($this->data['password']);
    $mdl = new Model($this->model,$this->data,$this->pdo,'login_sign_in');
    $res_query = $mdl->openModel();
    if ($res_query){
      $_SESSION['user_id'] = $res_query['id'];
      $_SESSION['user_logged'] = true;
      $_SESSION['user_name'] = $res_query['name'];
      $_SESSION['user_email'] = $res_query['email'];
    }
    return($res_query);
  }

  function logout()
  {
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
    if ((isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == false) || !isset($_SESSION['user_logged'])) {
      return(false);
    }
    if ($this->data['logout'] != true) {
      return('false');
    }else{
      $_SESSION['user_id'] = null;
      $_SESSION['user_logged'] = false;
      $_SESSION['user_name'] = null;
      $_SESSION['user_email'] = null;
      return(true);
    }
  }
}


?>
