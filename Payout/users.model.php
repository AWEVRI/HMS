<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($fname, $mname, $lname, $contact, $profile, $username, $password) {
      $sql = 'INSERT INTO users (fname, mname, lname, contact, profile, username, password) VALUES (:fname, :mname, :lname, :contact, :profile, :username, :password)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'mname' => $mname,
        'lname' => $lname,
        'contact' => $contact,
        'profile' => $profile,
        'username' => $username,
        'password' => $password
      ]);
      return true;
    }

    
    // Fetch All Users From Database
    public function read() {
      $sql = 'SELECT * FROM users ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch Single User From Database
    public function readOne($id) {
      $sql = 'SELECT * FROM users WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $fname, $mname, $lname,  $contact, $profile, $username, $password) {
      $sql = 'UPDATE users SET fname = :fname, mname = :mname, lname = :lname, contact = :contact, profile = :profile, username=:username, password=:password WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'mname' => $mname,
        'lname' => $lname,
        'contact' => $contact,
        'profile' => $profile,
        'username' => $username,
        'password' => $password,
        'id' => $id
      ]);

      return true;
    }

    // Delete User From Database
    public function delete($id) {
      $sql = 'DELETE FROM users WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }
  }

?>