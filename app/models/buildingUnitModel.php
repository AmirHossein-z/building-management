<?php

class buildingUnitModel extends Model {
  public function __construct() {
    parent::__construct();
  }

  public function create(int $building_id,string $number) {
    $query = "INSERT INTO building_unit (building_id, number) VALUES (?,?)";
    $data = [
        ['type' => 'i', 'value' => $building_id],
        ['type' => 's', 'value' => $number],
    ];
    $result = $this->exeQuery($query, $data,false);
    if($result) {
      return ['status' => true, 'value' => ''];
    }else {
      return ['status' => false,'value'=>''];
    }
  }

  public function getAllInfoByPersonId(int $person_id):array
  {
        $query = "SELECT * FROM building_unit WHERE person_id=? LIMIT 0,1";
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

  public function getAllListByBuildingId(int $building_id):array {
        $query = "SELECT * FROM building_unit WHERE building_id=?";
        $data = [
            ['type' => 'i', 'value' => $building_id],
        ];
        $result = $this->exeQuery($query, $data,true);
        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return [];
        }
  }
}
