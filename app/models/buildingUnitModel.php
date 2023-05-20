<?php

class buildingUnitModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create(int $building_id, string $number)
  {
    $query = "INSERT INTO building_unit (building_id, number) VALUES (?,?)";
    $data = [
      ['type' => 'i', 'value' => $building_id],
      ['type' => 's', 'value' => $number],
    ];
    $result = $this->exeQuery($query, $data, false);
    if ($result) {
      return ['status' => true, 'value' => ''];
    } else {
      return ['status' => false, 'value' => ''];
    }
  }

  public function getInfo(int $building_unit_id): array
  {
    $query = "SELECT * FROM building_unit WHERE id=? LIMIT 0,1";
    $data = [
      ['type' => 'i', 'value' => $building_unit_id],
    ];
    $result = $this->exeQuery($query, $data, true);
    if ($result) {
      return ['status' => true, 'value' => $result->fetch_assoc()];
    } else {
      return ['status' => false, 'value' => ''];
    }
  }

  public function getAllInfoByPersonId(int $person_id): array
  {
    $query = "SELECT * FROM building_unit WHERE person_id=? LIMIT 0,1";
    $data = [
      ['type' => 'i', 'value' => $person_id],
    ];
    $result = $this->exeQuery($query, $data, true);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    } else {
      return [];
    }
  }

  public function getAllListByBuildingId(int $building_id): array
  {
    $query = "SELECT * FROM building_unit WHERE building_id=?";
    $data = [
      ['type' => 'i', 'value' => $building_id],
    ];
    $result = $this->exeQuery($query, $data, true);
    if ($result->num_rows > 0) {
      return $result->fetch_all();
    } else {
      return [];
    }
  }

  public function selectOne(int $building_unit_id, int $person_id)
  {
    $query = "UPDATE building_unit SET person_id=? WHERE id=?";
    $data = [
      ['type' => 'i', 'value' => $person_id],
      ['type' => 'i', 'value' => $building_unit_id],
    ];

    $status = $this->exeQuery($query, $data, false);

    if ($status) {
      return ['status' => true, 'value' => ""];
    } else {
      return ['status' => false, 'value' => ""];
    }
  }

  public function getBuildingInfo(int $person_id): array
  {
    $query = "SELECT building.person_id FROM building INNER JOIN building_unit ON building.id = building_unit.building_id WHERE building_unit.person_id = ?;";

    $data = [
      ['type' => 'i', 'value' => $person_id],
    ];

    $result = $this->exeQuery($query, $data, true);

    if ($result->num_rows > 0) {
      return ['status' => true, 'value' => $result->fetch_assoc()];
    } else {
      return ['status' => false, 'value' => "Error"];
    }
  }
}