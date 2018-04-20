<?php

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

//user
$app->get('/api/user', function (Request $request, Response $response, array $args) {
    if ($this->validate_login == false) {
      $resp = array('response' => false,'description'=>'u have not permission to do this !');
      return(json_encode($resp));
    }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
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
    if ($this->validate_login == true) {
      return($res->withJson(array('response' => false,'description'=>'U are already logged'),401));
    }
    $mapper = $this->db;
    $data = $req->getParams();
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Login', $data, $mapper, 'sign_in');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Sign-in: sign-in:true Email:".$data['email']);
      return $res->withRedirect('/api/login/settoken/true', 301);
    }else{
      $this->logger->info("Sign-in: sign-in:false Email:".$data['email']);
      return($res->withJson(array('response' => $res_controller,'description'=>'Incorrect user or password' ),401));
      return($resp);
    }
});

$app->get('/api/login/settoken/{opt}', function (Request $req,  Response $res, $args = []) {
    $mapper = $this->db;
    $data = $args;
    if ($data['opt'] == true) {
      $token = md5(uniqid(rand(), true));
    }else{
      $token = null;
    }
    $data['token'] = $token;
    $data['user_id'] = $_SESSION['user_id'];
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Login',$data, $mapper, 'set_token');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Set-Token: true");
      return($res->withJson(array('response' => true,'description'=>'Sign-in with success !' ),200));
    }else{
      $this->logger->info("Set-Token: false");
      return($res->withJson(array('response' => false,'description'=>'Error on define token !' ),500));
    }
});

$app->get('/api/login/{logout}', function (Request $request, Response $response, array $args) {
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
    $mapper = $this->db;
    $data = $args;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Login', $data, $mapper,'logout');
    $res_controller = $ctr->openController();
    if ($res_controller)
    {
      $this->logger->info("Logout: sign-in: false");
      return $res->withRedirect('/api/login/settoken/false', 301);
    }
      return($res->withJson(array('description' => , );,200));
});
