<?php
class Database {
  private $host = DB_HOST;
  private $db = DB_NAME;
  private $user = DB_USER;
  private $pass = DB_PASS;

  public function connection() {
    return mysqli_connect($this->host, $this->db, $this->user, $this->pass);
  }

  public function result($query) {
    $conn = $this->connection();
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
      return $row;
    }
  }

  public function results($query) {
    $conn = $this->connection();
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;
  }
}