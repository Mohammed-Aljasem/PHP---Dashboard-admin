<?php
include './includs/connect.php';
if (isset($_POST['add_customer'])) {
  $fullname    = $_POST['fullname'];
  $email       = $_POST['email'];
  $password    = $_POST['password'];

  $sql = "INSERT INTO customer (name , email ,password)
   VALUES ('$fullname', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  header("location:customer.php");
}
