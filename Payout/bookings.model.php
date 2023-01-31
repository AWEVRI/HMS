<?php

  require_once 'config.php';

  class BookingsDB extends Config {
    // Insert User Into Database
    public function insert($username, $name, $profile, $contact, $date, $hallname, $capacity, $starttime, $endtime) {
      $sql = 'INSERT INTO booking (username, name, profile, contact, date, hallname, capacity, starttime, endtime) VALUES (:username, :name, :profile, :contact, :date, :hallname, :capacity, :starttime, :endtime)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'username' => $username,
        'name' => $name,
        'contact' => $contact,
        'date' => $date,
        'hallname' => $hallname,
        'capacity' => $capacity,
        'starttime' => $starttime,
        'endtime' => $endtime
      ]);
      return true;
    }

    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM booking ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM booking WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $username, $name, $profile, $contact, $date, $hallname, $capacity, $starttime, $endtime) {
      $sql = 'UPDATE booking SET username=:username, name=:name, profile=:profile, contact=:contact, date=:date, hallname = :hallname, capacity = :capacity, starttime=:starttime, endtime=:endtime WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'username' => $username,
        'name' => $name,
        'contact' => $contact,
        'date' => $date,
        'hallname' => $hallname,
        'capacity' => $capacity,
        'starttime' => $starttime,
        'endtime' => $endtime,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM booking WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>