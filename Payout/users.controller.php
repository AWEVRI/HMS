<?php

  require_once 'users.model.php';
  require_once 'util.php';
  require_once 'index.php';

  $db = new Database;
  $util = new Util;

  // Handle User Login with php
  if (isset($_POST['login'])){
    $loginu=$db->read(["username"]);
    $loginp=$db->read(["password"]);
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==$loginu && $password==$loginp){
       if($login['profile']=="admin"){
          header("location:home.php");
       }else{
          header("location:usershome.php");
       }
    }else {
      echo "Wrong Username or Password";
    }
  }
  
  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $fname = $util->testInput($_POST['fname']);
    $mname = $util->testInput($_POST['mname']);
    $lname = $util->testInput($_POST['lname']);
    $contact = $util->testInput($_POST['contact']);
    $profile = $util->testInput($_POST['profile']);
    $username = $util->testInput($_POST['username']);
    $password = $util->testInput($_POST['password']);

    if ($db->insert($fname, $mname, $lname, $contact, $profile, $username, $password)) {
      echo $util->showMessage('success', 'User inserted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
    if (isset($_GET['read'])) {
      $users = $db->read();
      $output = '';
      if ($users) {
        foreach ($users as $row) {
          $output .= '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['fname'] . '</td>
                        <td>' . $row['mname'] . '</td>
                        <td>' . $row['lname'] . '</td>
                        <td>' . $row['contact'] . '</td>
                        <td>' . $row['profile'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['password'] . '</td>
                        <td>
                          <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>
  
                          <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                        </td>
                      </tr>';
        }
        echo $output;
      } else {
        echo '<tr>
                <td colspan="12">No Users Found in the Database!</td>
              </tr>';
      }
    }
  

  // Handle Edit User Ajax Request
  if (isset($_GET['edit'])) {
    $id = $_GET['id'];

    $user = $db->readOne($id);
    echo json_encode($user);
  }

  // Handle Update User Ajax Request
  if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $fname = $util->testInput($_POST['fname']);
    $mname = $util->testInput($_POST['mname']);
    $lname = $util->testInput($_POST['lname']);
    $contact = $util->testInput($_POST['contact']);
    $profile = $util->testInput($_POST['profile']);
    $username = $util->testInput($_POST['username']);
    $password = $util->testInput($_POST['password']);

    if ($db->update($id, $fname, $mname, $lname, $contact, $profile, $username, $password,)) {
      echo $util->showMessage('success', 'User updated successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Delete User Ajax Request
  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if ($db->delete($id)) {
      echo $util->showMessage('info', 'User deleted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

?>