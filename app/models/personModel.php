<?php

class personModel extends Model {
  public function __construct() {
    parent::__construct();
  }

      /**
     * check if person exists in db or not
     * @param string $person
     * @param string $email
     * @param string $password
     * @return array
     */
    public function isPersonExists(string $person,string $email, string $password):array
    {
        $query = "SELECT * FROM $person WHERE email=? LIMIT 0,1";
        $data = [
            ['type' => 's', 'value' => $email]
            // ['type' => 's', 'value' => $password]
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

  public function addPerson(string $person, string $username, string $phone, string $email, string $password): array
    {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO $person (name,phone,email,password)
         VALUES (?,?,?,?)";
        $data = [
            ['type' => 's', 'value' => $username],
            ['type' => 's', 'value' => $phone],
            ['type' => 's', 'value' => $email],
            ['type' => 's', 'value' => $password_hash],
        ];
        $status = $this->exeQuery($query, $data, false);
        if ($status) {
            return ['status' => 1, 'value' => $this->connection->insert_id];
        } else {
            return ['status' => 0, 'value' => 'Error'];
        }

    }
}
