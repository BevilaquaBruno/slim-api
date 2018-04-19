<?php
  /**
   * controller
   */
  class Controller
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

    function openController(){
      $var_instance = $this->model.'Controller';
      require_once($var_instance.'.php');
      $controller = new $var_instance($this->model, $this->data, $this->pdo);
      $controller_func = $this->func;
      $resp = $controller->$controller_func();
      return($resp);
    }
  }


?>
