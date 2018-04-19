<?php

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

//user
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
      return(json_encode($resp));
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
      return(json_encode($resp));
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
    return(json_encode($resp));
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
    return(json_encode($resp));
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
  $resp = array('response' => $res_controller,'description'=>'User create !');
    //echo (json_encode($resp));
    return(json_encode($resp));
});
//end user

//type
$app->post('/api/type', function (Request $req,  Response $res, $args = []) {
    $mapper = $this->db;
    $data = $req->getParams();
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Type', $data, $mapper, 'create');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Post-Type: Description: ".$data['description']);
    }
    $resp = array('response' => $res_controller,'description'=>'Type create !' );
    return(json_encode($resp));
});

$app->delete('/api/type/{id}', function (Request $req,  Response $res, $args = []) {
  //mapping db
  $mapper = $this->db;
  $data = $args;
  //logger the post-user
  require_once('Controllers/Controller.php');
  $ctr = new Controller('Type', $data, $mapper,'delete');
  $res_controller = $ctr->openController();
  if ($res_controller)
   {
    $this->logger->info("Delete-Type: id:".$data['id']);
  }
  $resp = array('response' => $res_controller,'description'=>'Type delete !');
    //echo (json_encode($resp));
    return(json_encode($resp));
});

$app->put('/api/type', function (Request $req,  Response $res, $args = []) {
  $mapper = $this->db;
  $data = $req->getParams();
  require_once('Controllers/Controller.php');
  $ctr = new Controller('Type', $data, $mapper,'update');
  $res_controller = $ctr->opencontroller();
  if ($res_controller)
   {
     $this->logger->info("Update-Type: id:".$data['id']." Description:".$data['description']);
  }
  $resp = array('response' => $res_controller,'description'=>'Type Update !');
    //echo (json_encode($resp));
    return(json_encode($resp));
});

$app->get('/api/type/{id}', function (Request $request, Response $response, array $args) {
  $mapper = $this->db;
  $data = $args;
  require_once('Controllers/Controller.php');
  $ctr = new Controller('Type', $data, $mapper,'getOne');
  $res_controller = $ctr->openController();
  if ($res_controller)
  {
    $this->logger->info("Get-Type: id: ".$data['id']);
  }
  $resp = array('response' => $res_controller,'description'=>'A type were request !');
      //echo (json_encode($resp));
      return(json_encode($resp));
});

$app->get('/api/type', function (Request $request, Response $response, array $args) {
    $mapper = $this->db;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Type', null, $mapper,'getAll');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Get-Type: All types");
    }
    $resp = array('response' => $res_controller,'description'=>'All types were request !');
      //echo (json_encode($resp));
      return(json_encode($resp));
});

//login
$app->post('/api/login', function (Request $req,  Response $res, $args = []) {
    $mapper = $this->db;
    $data = $req->getParams();
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Login', $data, $mapper, 'sign_in');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Sign-in: sign-in:true Email:".$data['email']);
    }else{
      $this->logger->info("Sign-in: sign-in:false Email:".$data['email']);
    }

    exit;
    $resp = array('response' => $res_controller,'description'=>'Sign-in with success !' );
    return(json_encode($resp));
});

$app->get('/api/login/{logout}', function (Request $request, Response $response, array $args) {
    $mapper = $this->db;
    $data = $args;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Login', $data, $mapper,'logout');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Logout: sign-in: false");
    }
    $resp = array('response' => $res_controller,'description'=>'Logout success !');
      //echo (json_encode($resp));
      return(json_encode($resp));
});
