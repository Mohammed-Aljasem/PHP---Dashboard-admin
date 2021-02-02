<?php
include './includs/connect.php';
if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "DELETE FROM customer WHERE id=$id";
  if (mysqli_query($conn, $sql)) {
    "Record deleted successfully";
  } else {
    "Error deleting record: " . mysqli_error($conn);
  }
  header("location:customer.php");
}
