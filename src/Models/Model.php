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
    $var_func = $this->func;
    $var_instance = $this->model.'Model';
    $model_instance = new $var_instance($this->pdo,$this->data);
    $som_return = $model_instance->$var_func();
    return($som_return);
  }
}


?>
