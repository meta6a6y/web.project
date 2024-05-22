<?php

class DB
{
    private string $server = '127.0.0.1';
    private string $user = 'root';
    private string $pass = '';
    private string $db = 'project';
    private mysqli $sql;

    public function __construct()
    {
        $this->sql = new mysqli($this->server, $this->user, $this->pass, $this->db);
    }

    function selectAll($table): array
    {
        $dbobj = $this->sql->query('SELECT * FROM ' . $table);

        $result = [];
        while ($row = $dbobj->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function deletePet($id)
    {
        $this->sql->query("DELETE FROM pets WHERE id = $id");
    }

    public function insertAll($name, $email, $phone, $city, $experience, $cause)
    {
        $stmt = $this->sql->prepare("INSERT INTO `form` (`name`, `email`, `phone`, `city`, `experience`, `cause`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone, $city, $experience, $cause);
        $stmt->execute();
        $stmt->close();
    }
    public function getPetsWithSex($sex_name = false): array
    {
//        $query = "SELECT pets.id, pets.name, pets.age, sex.name AS sex_name, pets.coat_color, pets.img, pets.link
//                  FROM pets
//                  JOIN sex ON pets.sex = sex.id";
        if ($sex_name) {
            $query = "SELECT sex.name AS sex_name
                      FROM pets
                      JOIN sex ON pets.sex = sex.id";
        }

        $result = $this->sql->query($query);

        $pets = [];
        while ($row = $result->fetch_assoc()) {
            $pets[] = $row;
        }
        return $pets;
    }
}
$DB = new DB();