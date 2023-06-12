<?php

class accountingModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAccountingByPersonId($person_id)
    {
        $query = "SELECT b.id, b.type, b.price, b.status, b.building_unit_id, b.accounting_id, a.balance, a.person_id, a.date_created, a.date_updated FROM bill AS b INNER JOIN accounting AS a ON b.accounting_id = a.id WHERE a.person_id = ?";
        $data = [
            ['type' => 'i', 'value' => $person_id]
        ];

        $result = $this->exeQuery($query, $data, true);
        if ($result->num_rows > 0) {
            return ['status' => true, 'value' => $result->fetch_all()];
        } else {
            return ['status' => false, 'value' => 'ERROR'];
        }
    }

    public function create($balance, $person_id)
    {
        $query = "INSERT INTO accounting (balance,person_id) VALUES (?,?)";
        $data = [
            ['type' => 'd', 'value' => $balance],
            ['type' => 'i', 'value' => $person_id]
        ];

        $status = $this->exeQuery($query, $data, false);
        if ($status) {
            return ['status' => true, 'value' => $this->connection->insert_id];
        } else {
            return ['status' => false, 'value' => 'ERROR'];
        }
    }

    public function delete($accounting_id)
    {
        $query = "DELETE FROM accounting WHERE id=?";
        $data = [
            ['type' => 'i', 'value' => $accounting_id],
        ];

        $status = $this->exeQuery($query, $data, false);

        if ($status) {
            return ['status' => true, 'value' => ""];
        } else {
            return ['status' => false, 'value' => ""];
        }
    }
}