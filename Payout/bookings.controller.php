<?php

  require_once 'bookings.model.php';
  require_once 'util.php';

  $db = new BookingsDB;
  $util = new Util;

  // Handle Add New User Ajax Request
  if (isset($_POST['add'])) {
    $username = $util->testInput($_POST['username']);
    $name = $util->testInput($_POST['name']);
    $contact = $util->testInput($_POST['contact']);
    $date = $util->testInput($_POST['date']);
    $hallname = $util->testInput($_POST['hallname']);
    $capacity = $util->testInput($_POST['capacity']);
    $starttime = $util->testInput($_POST['starttime']);
    $endtime = $util->testInput($_POST['endtime']);
    

    if ($db->insert($hallname, $capacity, $location)) {
      echo $util->showMessage('success', 'Book inserted successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Fetch All Users Ajax Request
    if (isset($_GET['read'])) {
      $book = $db->read();
      $output = '';
      if ($halls) {
        foreach ($book as $row) {
          $output .= '<tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['date'] . '</td>
                        <td>' . $row['hallname'] . '</td>
                        <td>' . $row['capacity'] . '</td>
                        <td>' . $row['starttime'] . '</td>
                        <td>' . $row['endtime'] . '</td>
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
    $username = $util->testInput($_POST['username']);
    $name = $util->testInput($_POST['name']);
    $contact = $util->testInput($_POST['contact']);
    $date = $util->testInput($_POST['date']);
    $hallname = $util->testInput($_POST['hallname']);
    $capacity = $util->testInput($_POST['capacity']);
    $starttime = $util->testInput($_POST['starttime']);
    $endtime = $util->testInput($_POST['endtime']);
   
    if ($db->update($id, $username, $name, $contact, $date, $hallname, $capacity, $starttime, $endtime)) {
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