<?php
/**
 * user Controller
 */
class UserController
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

  function changePassword(){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    if (!isset($this->data['old_password']) || !isset($this->data['new_password']) || !isset($this->data['user_email'])) {
      return(false);
    }
    $this->data['old_password'] = md5($this->data['old_password']);
    $this->data['new_password'] = md5($this->data['new_password']);
    $mdl = new Model($this->model,$this->data,$this->pdo,'userChangePassword');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function getAll (){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    $mdl = new Model($this->model,$this->data,$this->pdo,'userGetAll');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function getOne(){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    //validation
    if (!isset($this->data['id'])) {
      return(false);
    }
    //end validation
    $mdl = new Model($this->model,$this->data,$this->pdo,'userGetOne');
    $res_query = $mdl->openModel();
    return($res_query);
  }
  function delete(){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    if (!isset($this->data['id'])) {
      return(false);
    }
    $mdl = new Model($this->model,$this->data,$this->pdo,'userDelete');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function create(){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    // validation
    if(!isset($this->data['name'])){
      return(false);
    }
    $this->data['name'] = ValidationFunctions::remove_special_caracters($this->data['name']);
    $validate_email = ValidationFunctions::validate_email($this->data['email']);
    if(!$validate_email)
    {
      $this->data['email'] = null;
    }

    if(!isset($this->data['admin']))
    {
      $this->data['admin'] = false;
    }else{
      $this->data['admin'] = true;
    }

    if(!isset($this->data['active']))
    {
      $this->data['active'] = false;
    }else{
      $this->data['active'] = true;
    }
    $this->data['password'] = md5($this->data['password']);
    //end validation
    $mdl = new Model($this->model,$this->data,$this->pdo,'userCreate');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function update(){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    //validation
    if(!isset($this->data['name'])){
      return(false);
    }
    $this->data['name'] = ValidationFunctions::remove_special_caracters($this->data['name']);
    $validate_email = ValidationFunctions::validate_email($this->data['email']);
    if(!$validate_email)
    {
      $this->data['email'] = null;
    }

    if(!isset($this->data['admin']))
    {
      $this->data['admin'] = false;
    }else{
      $this->data['admin'] = true;
    }

    if(!isset($this->data['active']))
    {
      $this->data['active'] = false;
    }else{
      $this->data['active'] = true;
    }
    //end validation
    $mdl = new Model($this->model,$this->data,$this->pdo,'userUpdate');
    $res_query = $mdl->openModel();
    return($res_query);
  }

}


?>
