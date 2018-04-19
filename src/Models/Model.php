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
    $model_instance = new $this->model;
    $som_return = $model_instance->$var($this->pdo,$this->data);
    return($som_return);
  }
}


?>
