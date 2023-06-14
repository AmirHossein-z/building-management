<?php

class Model
{
    public $connection = "";
    public function __construct()
    {
        $this->connection = new mysqli('localhost', 'root', '', 'building-mgmt');
    }

    public function exeQuery(string $query, array $data = [], bool $returnData)
    {
        /*
            data should be like
            $data = [
                ['type' => 's', 'value' => 'string'],
                ['type' => 'i', 'value' => 'int'],
                ['type' => 'd', 'value' => 'float'],
            ];
        */
        $prepare = $this->connection->prepare($query);
        $type = '';
        $values = [];
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                $type .= $item['type'];
                $values[$key] = $item['value'];
            }
            $prepare->bind_param($type, ...$values);
        }
        if ($returnData) {
            $prepare->execute();
            return $prepare->get_result();
        }
        return $prepare->execute();
    }
}