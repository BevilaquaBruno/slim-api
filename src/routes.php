<?php

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

$app->get('/api/user', function (Request $request, Response $response, array $args) {
    $mapper = $this->db;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('User', null, $mapper,'getAll');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Get-User: All users");
    }
    $resp = array('response' => $res_controller,'description'=>'All users were request !');
      //echo (json_encode($resp));
      return(json_encode($resp);
});

$app->get('/api/user/{id}', function (Request $request, Response $response, array $args) {
  $mapper = $this->db;
  $data = $args;
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User', $data, $mapper,'getOne');
  $res_controller = $ctr->openController();
  if ($res_controller)
  {
    $this->logger->info("Get-User: id: ".$data['id']);
  }
  $resp = array('response' => $res_controller,'description'=>'A user were request !');
      //echo (json_encode($resp));
      return(json_encode($resp);
});

$app->put('/api/user', function (Request $req,  Response $res, $args = []) {
  $mapper = $this->db;
  $data = $req->getParams();
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User', $data, $mapper,'update');
  $res_controller = $ctr->opencontroller();
  if ($res_controller)
   {
     $this->logger->info("Update-User: id:".$data['id']." Name:".$data['name']." Email:".$data['email']." Admin:".((isset($data['admin']))?$data['admin']:0)."  Active:".((isset($data['admin']))?$data['admin']:0));
  }
  $resp = array('response' => $res_controller,'description'=>'User Update !');
    //echo (json_encode($resp));
    return(json_encode($resp);
});
$app->delete('/api/user/{id}', function (Request $req,  Response $res, $args = []) {
  //mapping db
  $mapper = $this->db;
  $data = $args;
  //logger the post-user
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User', $data, $mapper,'delete');
  $res_controller = $ctr->openController();
  if ($res_controller)
   {
    $this->logger->info("Delete-User: id:".$data['id']);
  }
  $resp = array('response' => $res_controller,'description'=>'User delete !');
    //echo (json_encode($resp));
    return(json_encode($resp);
});

//example post
$app->post('/api/user', function (Request $req,  Response $res, $args = []) {
  //mapping db
  $mapper = $this->db;
  // data
  $data = $req->getParams();
  //logger the post-user
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User', $data, $mapper,'create');
  $res_controller = $ctr->openController();
  if ($res_controller)
  {
     $this->logger->info("Post-User: Name:".$data['name']." Email:".$data['email']." Admin:".((isset($data['admin']))?$data['admin']:0)."  Active:".((isset($data['admin']))?$data['admin']:0));
  }
  $resp = array('response' => $res_controller,'description'=>'User register !');
    //echo (json_encode($resp));
    return(json_encode($resp);
});
