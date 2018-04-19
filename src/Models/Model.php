<?php

/**
 * mainmodel
 */
class Model
{
  private $model;
  private $func;
  private $data;
  private $pdo;

  function __construct($model, $data, $pdo,$func)
  {
    $this->model = $model;
    $this->data = $data;
    $this->pdo = $pdo;
    $this->func = $func;
  }

  public function openModel(){
    require_once($this->model.'Model.php');
    $var = $this->func;
    $var_instance = $this->model.'Model';
    $model_instance = new $var_instance;
    $som_return = $model_instance->$var($this->pdo,$this->data);
    return($som_return);
  }
}


?>
