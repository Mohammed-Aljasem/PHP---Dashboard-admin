<?php
include './includs/connect.php';
if ($_GET['category_id']) {
  $id = $_GET['category_id'];
  $sql = "DELETE FROM categories WHERE category_id=$id";
  if (mysqli_query($conn, $sql)) {
    "Record deleted successfully";
  } else {
    "Error deleting record: " . mysqli_error($conn);
  }
  header("location:categories.php");
}
