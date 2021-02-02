<?php
include './includs/connect.php';
if ($_GET['product_id']) {
  $id = $_GET['product_id'];
  $sql = "DELETE FROM product WHERE product_id=$id";
  if (mysqli_query($conn, $sql)) {
    "Record deleted successfully";
  } else {
    "Error deleting record: " . mysqli_error($conn);
  }
  header("location:products.php");
}
