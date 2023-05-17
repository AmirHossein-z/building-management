<?php

class personModel extends Model {
  public function __construct() {
    parent::__construct();
  }

    public function isPersonExists(string $email, string $password,int $type):array
    {
        $query = "SELECT * FROM person WHERE email=? AND type=? LIMIT 0,1";
        $data = [
            ['type' => 's', 'value' => $email],
            ['type' => 'i', 'value' => $type]
        ];
        $result = $this->exeQuery($query, $data, true);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return ['status' => true, 'value' => $user];
            } else {
                return ['status' => false, 'value' => 'ERROR'];
            }
        } else {
                return ['status' => false, 'value' => 'ERROR'];
        }
    }

  public function addPerson(string $username, string $phone, string $email, string $password,$type): array
    {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO person (name,phone,email,password,type)
         VALUES (?,?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $username],
            ['type' => 's', 'value' => $phone],
            ['type' => 's', 'value' => $email],
            ['type' => 's', 'value' => $password_hash],
            ['type' => 'i', 'value' => $type],
        ];
        $status = $this->exeQuery($query, $data, false);
        if ($status) {
            return ['status' => true, 'value' => $this->connection->insert_id];
        } else {
            return ['status' => false, 'value' => 'Error'];
        }
    }

  public function updatePersonById(int $person_id,string $username,string $phone):array {
    $query = "UPDATE person SET name=?,phone=? WHERE id=?";
    $data = [
        ['type' => 's', 'value' => $username],
        ['type' => 's', 'value' => $phone],
        ['type' => 'i', 'value' => $person_id],
    ];

    $status = $this->exeQuery($query, $data, false);

    if($status) {
      return ['status' => true, 'value' => ""];
    }else {
      return ['status' => false, 'value' => ""];
    }
  }

  public function getAllInfo(int $id):array
  {
        $query = "SELECT * FROM person WHERE id=?";
        $data = [
            ['type' => 's', 'value' => $id],
        ];
        $result = $this->exeQuery($query, $data,true);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [];
        }
  }

}
