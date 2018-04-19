<?php
/**
 * userRegister
 */
class User
{
  public function userGetAll($pdo, $data)
  {
    $pdo->beginTransaction();
      $sql = "SELECT * FROM user ";
      $obj = $pdo->prepare($sql);
    return ($obj->execute()) ? $obj->fetchall(PDO::FETCH_ASSOC) : false;
  }

  public function userDelete($pdo, $data){
    try {
      $pdo->beginTransaction();
      $sql = "DELETE FROM user WHERE id = :id";
      $ins = $pdo->prepare($sql);
      $ins->bindParam(':id', $data['id']);
      $obj = $ins->execute();
      $pdo->commit();
      return $obj = true;
    } catch (\Exception $e) {
      $pdo->rollback();
        return $obj = false;
    }

  }

  public function userGetOne ($pdo,$data){
      $sql = "SELECT * FROM user WHERE id = :id";
      $obj = $pdo->prepare($sql);
      $obj->bindParam(':id',$data['id']);
    return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }

  public function userCreate($pdo, $data)
  {
      try {
        $pdo->beginTransaction();
        $sql = "INSERT INTO user
          (name,email, admin, active)
          VALUES (:name,:email,:admin,:active)";
            $ins = $pdo->prepare($sql);
            $ins->bindParam(':name',$data['name']);
            $ins->bindParam(':email',$data['email']);
            $ins->bindParam(':admin',$data['admin']);
            $ins->bindParam(':active',$data['active']);
          $obj = $ins->execute();
          $pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $pdo->rollBack();
            return $obj = false;
      }
  }
  public function userUpdate($pdo, $data)
  {
      try {
        $pdo->beginTransaction();
        $sql = "UPDATE user SET name = ?, email = ?, admin = ?, active = ?
              WHERE id = ?";
            $obj = $pdo->prepare($sql);
            $obj->execute(array($data['name'], $data['email'], $data['admin'], $data['active'],$data['id']));
          $pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $pdo->rollBack();
            return $obj = false;
      }
  }
}


?>
