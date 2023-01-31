<?php

  require_once 'config.php';

  class HallsDB extends Config {
    // Insert User Into Database
    public function insert($hallname, $capacity, $location) {
      $sql = 'INSERT INTO halls (hallname, capacity, location) VALUES (:hallname, :capacity, :location)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'hallname' => $hallname,
        'capacity' => $capacity,
        'location' => $location
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM halls ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM halls WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $hallname, $capacity, $location) {
      $sql = 'UPDATE halls SET hallname = :hallname, capacity = :capacity, location = :location WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'hallname' => $hallname,
        'capacity' => $capacity,
        'location' => $location,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM halls WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>