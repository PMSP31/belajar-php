<?php

class Siswa_model
{
    private $dbh; //database handler
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';
        try {
            $this->dbh = new PDO($dsn, 'paul', 'paul123');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllSiswa()
    {
        // query
        $this->stmt = $this->dbh->prepare('SELECT * FROM siswa');
        // execution
        $this->stmt->execute();
        // data to array_assoc
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
