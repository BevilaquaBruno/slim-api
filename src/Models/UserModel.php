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

  public function userGetAll()
  {
    $this->pdo->beginTransaction();
      $sql = "SELECT * FROM user ";
      $obj = $this->pdo->prepare($sql);
    return ($obj->execute()) ? $obj->fetchall(PDO::FETCH_ASSOC) : false;
  }

  public function userDelete(){
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

  public function userGetOne (){
      $sql = "SELECT * FROM user WHERE id = :id";
      $obj = $this->pdo->prepare($sql);
      $obj->bindParam(':id',$this->data['id']);
    return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }

  public function userCreate()
  {
      try {
        $this->pdo->beginTransaction();
        $sql = "INSERT INTO user
          (name,email, admin, active)
          VALUES (:name,:email,:admin,:active)";
            $ins = $this->pdo->prepare($sql);
            $ins->bindParam(':name',$this->data['name']);
            $ins->bindParam(':email',$this->data['email']);
            $ins->bindParam(':admin',$this->data['admin']);
            $ins->bindParam(':active',$this->data['active']);
          $obj = $ins->execute();
          $this->pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $this->pdo->rollBack();
            return $obj = false;
      }
  }
  public function userUpdate()
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
