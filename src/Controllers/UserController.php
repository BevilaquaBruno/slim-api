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

  function getAll (){
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
    $mdl = new Model($this->model,$this->data,$this->pdo,'userGetAll');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function getOne(){
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
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
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
    if (!isset($this->data['id'])) {
      return(false);
    }
    $mdl = new Model($this->model,$this->data,$this->pdo,'userDelete');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function create(){
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
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
    //end validation
    $mdl = new Model($this->model,$this->data,$this->pdo,'userCreate');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function update(){
    require("../slim-api/src/validation_functions.php");
    require('../slim-api/src/Models/Model.php');
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
