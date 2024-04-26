<?php

class DB {
    private $server = '127.0.0.1';
    private $user = 'root';
    private $pass = '';
    private $db = 'project';
    private $sql;

    public function __construct()
    {
        $this->sql = new mysqli($this->server, $this->user, $this->pass, $this->db);
    }

    function selectAll($table)
    {
        $dbobj = $this->sql->query('SELECT * FROM ' . $table);

        $result = [];
        while ($row = $dbobj->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }
}

$DB = new DB();
