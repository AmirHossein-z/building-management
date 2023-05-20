<?php

class billModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function billsForMember(int $person_id): array
  {
    $query = "SELECT b.id as bill_id, b.type as bill_type, b.price as bill_price, b.status as bill_status, b.building_unit_id as building_unit_id, b.accounting_id as accounting_id, bu.building_id as building_id, bu.person_id as person_id, bu.number as number FROM bill b JOIN building_unit bu ON b.building_unit_id = bu.id WHERE bu.person_id = ?;";

    $data = [
      ['type' => 'i', 'value' => $person_id],
    ];
    $result = $this->exeQuery($query, $data, true);
    if ($result->num_rows > 0) {
      return ['status' => true, 'value' => $result->fetch_all()];
    } else {
      return ['status' => false, 'value' => ''];
    }
  }

  public function create(int $type, float $price, int $building_unit_id)
  {
    $query = "INSERT INTO bill (type,price,status,building_unit_id,accounting_id)
     VALUES (?,?,?,?,?)";
    $data = [
      ['type' => 'i', 'value' => $type],
      ['type' => 'd', 'value' => $price],
      ['type' => 'i', 'value' => 0],
      ['type' => 'i', 'value' => $building_unit_id],
      ['type' => 'i', 'value' => null],
    ];
    $status = $this->exeQuery($query, $data, false);
    if ($status) {
      return ['status' => true, 'value' => $this->connection->insert_id];
    } else {
      return ['status' => false, 'value' => 'Error'];
    }
  }
}