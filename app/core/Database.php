<?php
class Database {
  private $host = DB_HOST;
  private $db = DB_NAME;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $conn;

  public function __construct() {
    $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

    if ($this->conn->connect_error) {
      die('Connection Failed: ' . $this->conn->connect_error);
    }
  }

  public function query($query) {
    $result = $this->conn->query($query);
    if (!$result) {
      die('Error in query: ' . $this->conn->error);
    }
    return $result;
  }

  public function result($query) {
    $result = $this->query($query);
    $numRows = $result->num_rows;

    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        return $row;
      }
    }
  }

  public function results($query) {
    $result = $this->query($query);
    $numRows = $result->num_rows;
    $rows = [];

    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }

    return $rows;
  }

  public function rowCount() {
    return $this->conn->affected_rows;
  }
}