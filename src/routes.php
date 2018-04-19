<?php
// validation archive
require_once('validation_functions.php');

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

//example slim
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/api/user', function (Request $request, Response $response, array $args) {
    $mapper = $this->db;

    require_once('Models/Model.php');
    $mdl = new Model('User', null, $mapper,'userGetAll');
    $res_query = $mdl->openModel();
    if ($res_query) {
      $this->logger->info("Get-User: All users");
    }
    $resp = array('response' => $res_query,'description'=>'All users were request !');
      echo (json_encode($resp));
});

$app->get('/api/user/{id}', function (Request $request, Response $response, array $args) {
    $mapper = $this->db;
    $data = $args;
    $this->logger->info("Get-User: id:".$data['id']);
    require_once('Models/Model.php');
    $mdl = new Model('User', $data, $mapper,'userGetOne');
    $res_query = $mdl->openModel();
    $resp = array('response' => $res_query,'description'=>'User request !');
      echo (json_encode($resp));
});

$app->put('/api/user', function (Request $req,  Response $res, $args = []) {
  $mapper = $this->db;
  $data = $req->getParams();
  if(!isset($data['name'])){
    echo json_encode($response = array('description'=>'Name is null !','response' => false));
    exit;
  }
  $data['name'] = ValidationFunctions::remove_special_caracters($data['name']);
  $validate_email = ValidationFunctions::validate_email($data['email']);
  if(!$validate_email)
  {
    $data['email'] = null;
  }

  if(!isset($data['admin']))
  {
    $data['admin'] = false;
  }else{
    $data['admin'] = true;
  }

  if(!isset($data['active']))
  {
    $data['active'] = false;
  }else{
    $data['active'] = true;
  }
  $this->logger->info("Update-User: id:".$data['id']." Name:".$data['name']." Email:".$data['email']." Admin:".$data['admin']."  Active:".$data['active']);
  require_once('Models/Model.php');
  $mdl = new Model('User', $data, $mapper,'userUpdate');
  $res_query = $mdl->openModel();
  $resp = array('response' => $res_query,'description'=>'User Update !');
    echo (json_encode($resp));
});
$app->delete('/api/user/{id}', function (Request $req,  Response $res, $args = []) {
  //mapping db
  $mapper = $this->db;
  $data = $args;
  //logger the post-user
  $this->logger->info("Delete-User: id:".$data['id']);
  require_once('Models/Model.php');
  $mdl = new Model('User', $data, $mapper,'deleteUser');
  $res_query = $mdl->openModel();
  $resp = array('response' => $res_query,'description'=>'User delete !');
    echo (json_encode($resp));
    //return($response);
});

//example post
$app->post('/api/user', function (Request $req,  Response $res, $args = []) {
  //mapping db
  $mapper = $this->db;
  // data
  $data = $req->getParams();

  //start validation
  if(!isset($data['name'])){
    echo json_encode($response = array('success' => 'false','description'=>'Name is null !','response' => null));
    exit;
  }
  $data['name'] = ValidationFunctions::remove_special_caracters($data['name']);
  $validate_email = ValidationFunctions::validate_email($data['email']);
  if(!$validate_email)
  {
    $data['email'] = null;
  }

  if(!isset($data['admin']))
  {
    $data['admin'] = false;
  }else{
    $data['admin'] = true;
  }

  if(!isset($data['active']))
  {
    $data['active'] = false;
  }else{
    $data['active'] = true;
  }

  //logger the post-user
  $this->logger->info("Post-User: Name:".$data['name']." Email:".$data['email']." Admin:".$data['admin']."  Active:".$data['active']);
  require_once('Models/Model.php');
  $mdl = new Model('User', $data, $mapper,'userRegister');
  $res_query = $mdl->openModel();
  $resp = array('response' => $res_query,'description'=>'User register !');
    echo (json_encode($resp));
    //return($response);
});
