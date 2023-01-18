<?php
class Database {
  private $host = DB_HOST;
  private $db = DB_NAME;
  private $user = DB_USER;
  private $pass = DB_PASS;

  public function connection() {
    return mysqli_connect($this->host, $this->user, $this->pass, $this->db);
  }

  public function query($query) {
    $conn = $this->connection();
    return mysqli_query($conn, $query);
  }

  public function result($query) {
    $result = $this->query($query);

    while($row = mysqli_fetch_assoc($result)) {
      return $row;
    }
  }

  public function results($query) {
    $result = $this->query($query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;
  }
}