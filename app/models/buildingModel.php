<?php

class buildingModel extends Model {
  public function __construct() {
    parent::__construct();
  }

  public function getAllInfoByPersonId(int $person_id):array
  {
        $query = "SELECT * FROM building WHERE person_id=?";
        $data = [
            ['type' => 'i', 'value' => $person_id],
        ];
        $result = $this->exeQuery($query, $data,true);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }
  }

  public function getAllInfo():array
  {
    $query = "SELECT * FROM building";
    $data = [];
    $result = $this->exeQuery($query, $data,true);
    if ($result->num_rows > 0) {
        return $result->fetch_all();
    } else {
        return [];
    }
  }
  public function create(string $name,int $person_id):array
  {
      $query = "INSERT INTO building (name,person_id) VALUES(?,?)";
      $data = [
          ['type' => 's', 'value' => $name],
          ['type' => 'i', 'value' => $person_id],
      ];
      $result = $this->exeQuery($query, $data,false);
      if($result) {
        return ['status' => true, 'value' => $this->connection->insert_id];
      }else {
        return ['status' => false,'value'=>''];
      }
  }

  public function update_info(string $name,int $id):array
  {
    $query = "UPDATE building SET name=? WHERE id=?";
    $data = [
        ['type' => 's', 'value' => $name],
        ['type' => 'i', 'value' => $id],
    ];

    $status = $this->exeQuery($query, $data, false);

    if($status) {
      return ['status' => true, 'value' => ""];
    }else {
      return ['status' => false, 'value' => ""];
    }
  }
}
