<?php

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

//user
$app->get('/api/user', function (Request $req, Response $res, array $args) {
    if ($this->validate_login == false) {
      $resp = array('response' => false,'description'=>'u have not permission to do this !');
      return(json_encode($resp));
    }
    $mapper = $this->db;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('User', null, $mapper,'getAll');
    $res_controller = $ctr->openController();
    $resp = array('response' => $res_controller,'description'=>'All users were request !');
      if ($res_controller) {
        $this->logger->info("Get-User: All users");
        return(json_encode($resp));
      }else{
        return(json_encode($resp));
      }
});
$app->post('/api/user/change/password', function (Request $req, Response $res, array $args){
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
  $mapper = $this->db;
  $data = $req->getParams();
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User',$data,$mapper,'changePassword');
  $res_controller = $ctr->openController();
  $resp = array('response' => $res_controller, 'description'=>'password changed');
  if ($res_controller) {
    $this->logger->info('Change password: id: '.$data['user_id']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
});


$app->get('/api/user/{id}', function (Request $req, Response $res, array $args) {
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
  $mapper = $this->db;
  $data = $args;
  require_once('Controllers/Controller.php');
  $ctr = new Controller('User', $data, $mapper,'getOne');
  $res_controller = $ctr->openController();
  $resp = array('response' => $res_controller,'description'=>'A user were request !');
  if ($res_controller) {
    $this->logger->info("Get-User: id: ".$data['id']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
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
  $resp = array('response' => $res_controller,'description'=>'User Update !');
  if ($res_controller) {
    $this->logger->info("Update-User: id:".$data['id']." Name:".$data['name']." Email:".$data['email']." Admin:".((isset($data['admin']))?$data['admin']:0)."  Active:".((isset($data['admin']))?$data['admin']:0));
    return($resp);  }else{
    return(json_encode($resp));
  }
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
  $resp = array('response' => $res_controller,'description'=>'User delete !');
  if ($res_controller) {
    $this->logger->info("Delete-User: id:".$data['id']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
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
  $resp = array('response' => $res_controller,'description'=>'User create !');
  if ($res_controller) {
    $this->logger->info("Post-User: Name:".$data['name']." Email:".$data['email']." Admin:".((isset($data['admin']))?$data['admin']:0)."  Active:".((isset($data['admin']))?$data['admin']:0));
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
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
    $resp = array('response' => $res_controller,'description'=>'Type create !' );
    if ($res_controller) {
      $this->logger->info("Post-Type: Description: ".$data['description']);
      return(json_encode($resp));
    }else{
      return(json_encode($resp));
    }
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
  $resp = array('response' => $res_controller,'description'=>'Type delete !');
  if ($res_controller) {
    $this->logger->info("Delete-Type: id:".$data['id']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
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
  $resp = array('response' => $res_controller,'description'=>'Type Update !');
  if ($res_controller) {
    $this->logger->info("Update-Type: id:".$data['id']." Description:".$data['description']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
});

$app->get('/api/type/{id}', function (Request $req, Response $res, array $args) {
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'you have not permission to do this !');
    return(json_encode($resp));
  }
  $mapper = $this->db;
  $data = $args;
  require_once('Controllers/Controller.php');
  $ctr = new Controller('Type', $data, $mapper,'getOne');
  $res_controller = $ctr->openController();
  $resp = array('response' => $res_controller,'description'=>'A type were request !');
  if ($res_controller) {
    $this->logger->info("Get-Type: id: ".$data['id']);
    return(json_encode($resp));
  }else{
    return(json_encode($resp));
  }
});

$app->get('/api/type', function (Request $req, Response $res, array $args) {
  if ($this->validate_login == false) {
    $resp = array('response' => false,'description'=>'u have not permission to do this !');
    return(json_encode($resp));
  }
    $mapper = $this->db;
    require_once('Controllers/Controller.php');
    $ctr = new Controller('Type', null, $mapper,'getAll');
    $res_controller = $ctr->openController();
    $resp = array('response' => $res_controller,'description'=>'All types were request !' );
    if ($res_controller) {
      $this->logger->info("Get-Type: All types");
      return(json_encode($resp));
    }else{
      return(json_encode($resp));
    }
});

//login
$app->post('/api/login', function (Request $req,  Response $res, $args = []) {
    if ($this->validate_login == true) {
      $resp = array('response' => false,'description'=>'u have not permission to do this !');
      return(json_encode($resp));
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
    }else if ($_SESSION['user_logged'] == true) {
      $this->logger->info("Sign-in: sign-in:false Email:".$data['email']);
      $resp = array('response' => $res_controller,'description'=>'U are already logged');
      return(json_encode($resp));
    }else{
      $this->logger->info("Sign-in: sign-in:false Email:".$data['email']);
      $resp = array('response' => $res_controller,'description'=>'Incorrect user or password' );
      return(json_encode($resp));
    }
});

$app->get('/api/login/settoken/{opt}', function (Request $req,  Response $res, $args = []) {
    $mapper = $this->db;
    $data = $args;
    $data['opt'] = (string)$data['opt'];
    if ($data['opt'] == 'true') {
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
      $resp = array('response' => true,'description'=>'Token Defined !' );
      return(json_encode($resp));
    }else{
      $this->logger->info("Set-Token: false");
      $resp = array('response' => false,'description'=>'Error on define token !' );
      return($resp);
    }
});

$app->get('/api/login/{logout}', function (Request $req, Response $res, array $args) {
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
});
