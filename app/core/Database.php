<?php
class Database {
  private $host = DB_HOST;
  private $db = DB_NAME;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbh;
  private $stmt;

  public function __construct() {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query) {
    return $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($params, $value, $type = null) {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($params, $value, $type);
  }

  public function execute() {
    return $this->stmt->execute();
  }

  public function result() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function results() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function rowCount() {
    return $this->stmt->rowCount();
  }

  public function lastID() {
    return $this->dbh->lastInsertId();
  }
}