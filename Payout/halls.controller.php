<?php

  require_once 'halls.model.php';
  require_once 'util.php';

  $db = new HallsDB;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $hallname = $util->testInput($_POST['hallname']);
    $capacity = $util->testInput($_POST['capacity']);
    $location = $util->testInput($_POST['location']);
    

    if ($db->insert($hallname, $capacity, $location)) {
      echo $util->showMessage('success', 'Hall inserted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
    if (isset($_GET['read'])) {
      $halls = $db->read();
      $output = '';
      if ($halls) {
        foreach ($halls as $row) {
          $output .= '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['hallname'] . '</td>
                        <td>' . $row['capacity'] . '</td>
                        <td>' . $row['location'] . '</td>
                        <td>
                          <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editHallModal">Edit</a>
  
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

    $hall = $db->readOne($id);
    echo json_encode($hall);
  }

  // Handle Update User Ajax Request
  if (isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $hallname = $util->testInput($_POST['hallname']);
    $capacity = $util->testInput($_POST['capacity']);
    $location = $util->testInput($_POST['location']);
   
    if ($db->update($id, $hallname, $capacity, $location)) {
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