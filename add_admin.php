<?php
include './includs/connect.php';
if (isset($_POST['add_admin'])) {
  $fullname       = $_POST['fullname_admin'];
  $email_admin    = $_POST['email_admin'];
  $password_admin = $_POST['password_admin'];

  $sql = "INSERT INTO admins (full_name , email ,password)
   VALUES ('$fullname', '$email_admin', '$password_admin')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  header("location:index.php");
}
