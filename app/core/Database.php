<?php
class Database {
  private $host = DB_HOST;
  private $db = DB_NAME;
  private $user = DB_USER;
  private $pass = DB_PASS;

  protected function connect() {
    $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    return $conn;

    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: $conn->connect_error";
      exit();
    }
  }

  protected function query($query) {
    return $this->connect()->query($query);
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

    if ($numRows > 0) {
      while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
      }
    }

    return $rows;
  }
}