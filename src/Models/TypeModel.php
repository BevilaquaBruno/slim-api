<?php

/**
 * type
 */
class TypeModel
{
  private $pdo;
  private $data;

  function __construct($pdo,$data)
  {
      $this->pdo = $pdo;
      $this->data = $data;
  }

  public function typeCreate()
  {
      try {
        $this->pdo->beginTransaction();
        $sql = "INSERT INTO type
          (description)
          VALUES (:description)";
            $ins = $this->pdo->prepare($sql);
            $ins->bindParam(':description',$this->data['description']);
          $obj = $ins->execute();
          $this->pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $this->pdo->rollBack();
            return $obj = false;
      }
  }

  public function typeDelete()
  {
    try {
      $this->pdo->beginTransaction();
      $sql = "DELETE FROM type WHERE id = :id";
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

  public function typeUpdate()
  {
      try {
        $this->pdo->beginTransaction();
        $sql = "UPDATE type SET description = ?
              WHERE id = ?";
            $obj = $this->pdo->prepare($sql);
            $obj->execute(array($this->data['description'],$this->data['id']));
          $this->pdo->commit();
          return ($obj = true);
      } catch (\Exception $e) {
        $this->pdo->rollBack();
            return $obj = false;
      }
  }

  public function typeGetOne (){
      $sql = "SELECT * FROM type WHERE id = :id";
      $obj = $this->pdo->prepare($sql);
      $obj->bindParam(':id',$this->data['id']);
    return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
  }

  public function typeGetAll()
  {
    $this->pdo->beginTransaction();
      $sql = "SELECT * FROM type ";
      $obj = $this->pdo->prepare($sql);
    return ($obj->execute()) ? $obj->fetchall(PDO::FETCH_ASSOC) : false;
  }

}


?>
