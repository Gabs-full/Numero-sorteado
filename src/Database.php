<?php

class Database
{
private  $host;
private $base;
private $user;
private $pass;

public function __construct()
{
    $this->host = 'localhos';
    $this->base= 'serenatto';
    $this->user='root';
    $this->pass='';

    $this->connect();
}

    private function connect()
{
    try{
        $str= sprintf('mysql:host=%s;dbname=%s', $this->host, $this->base);

        $this->pdo = new pdo($str, $this->user, $this->pass);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $ex){
        print_r($ex->getMessage());
    }
}
    public function query( $str, array $params)
    {
        $stmt = $this->pdo->prepare($str);

        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}