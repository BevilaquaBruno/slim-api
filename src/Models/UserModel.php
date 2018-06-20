<?php
/**
 * userRegister
 */
class UserModel
{
  private $pdo;
  private $data;

  function __construct($pdo, $data){
    $this->pdo = $pdo;
    $this->data = $data;
  }

  function userChangePassword(){
    try {
      $this->pdo->beginTransaction();
      $sql = "UPDATE user SET password = ? WHERE email = ? and password = ?";
      $obj = $this->pdo->prepare($sql);
      $obj->execute(array($this->data['new_password'], $this->data['user_email'], $this->data['old_password']));
      $this->pdo->commit();
      return($obj = true);
    } catch (\Exception $e) {
      return($obj = false);
    }
  }

  function userGetAll(){
    $this->pdo->beginTransaction();
      $sql = "SELECT id, name, email, admin, active FROM user ";
      $obj = $this->pdo->prepare($sql);
    return ($obj->execute()) ? $obj->fetchall(PDO::FETCH_ASSOC) : false;
  }

  function userDelete(){
    try {
      $this->pdo->beginTransaction();
      $sql = "DELETE FROM user WHERE id = :id";
      $ins = $this->pdo->prepare($sql);
      $ins->bindParam(':id', $this->data['id']);
      $obj = $ins->execute();
      $this->pdo->commit();
      return $obj = true;
    } catch (\Exception $e) {
      $this->pdo->rollback();
        return $obj = false;
    }

  }

  function userGetOne (){
      $sql = "SELECT id, name, email, admin, active FROM user WHERE id = :id";
      $obj = $this->pdo->prepare($sql);
      $obj->bindParam(':id',$this->data['id']);
    return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }

  function userCreate()
  {
      try {
        $this->pdo->beginTransaction();
        $sql = "INSERT INTO user
          (name,email, admin, active, password)
          VALUES (:name,:email,:admin,:active, :password)";
            $ins = $this->pdo->prepare($sql);
            $ins->bindParam(':name',$this->data['name']);
            $ins->bindParam(':email',$this->data['email']);
            $ins->bindParam(':admin',$this->data['admin']);
            $ins->bindParam(':active',$this->data['active']);
            $ins->bindParam(':password',$this->data['password']);
          $obj = $ins->execute();
          $this->pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $this->pdo->rollBack();
            return $obj = false;
      }
  }
  function userUpdate()
  {
      try {
        $this->pdo->beginTransaction();
        $sql = "UPDATE user SET name = ?, email = ?, admin = ?, active = ?
              WHERE id = ?";
            $obj = $this->pdo->prepare($sql);
            $obj->execute(array($this->data['name'], $this->data['email'], $this->data['admin'], $this->data['active'],$this->data['id']));
          $this->pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $this->pdo->rollBack();
            return $obj = false;
      }
  }
}


?>
