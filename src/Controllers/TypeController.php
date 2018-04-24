<?php

/**
 * type
 */
class TypeController
{
  private $model;
  private $data;
  private $pdo;

  function __construct($model, $data, $pdo)
  {
    $this->model = $model;
    $this->data  = $data;
    $this->pdo   = $pdo;
  }

  function create()
  {
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');

    if (!isset($this->data['description']) || $this->data['description'] == '')
    {
      return(false);
    }

    $mdl = new Model($this->model,$this->data,$this->pdo,'typeCreate');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function delete()
  {
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    if (!isset($this->data['id'])) {
      return(false);
    }
    $mdl = new Model($this->model,$this->data,$this->pdo,'typeDelete');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function update()
  {
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    //validation
    if(!isset($this->data['description']) || !isset($this->data['id']) || $this->data['id'] == 0 || $this->data['description'] == ''){
      return(false);
    }
    //end validation
    $mdl = new Model($this->model,$this->data,$this->pdo,'typeUpdate');
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
    $mdl = new Model($this->model,$this->data,$this->pdo,'typeGetOne');
    $res_query = $mdl->openModel();
    return($res_query);
  }

  function getAll (){
    require_once("../slim-api/src/validation_functions.php");
    require_once('../slim-api/src/Models/Model.php');
    $mdl = new Model($this->model,$this->data,$this->pdo,'typeGetAll');
    $res_query = $mdl->openModel();
    return($res_query);
  }
}


?>
