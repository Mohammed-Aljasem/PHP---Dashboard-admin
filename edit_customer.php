<?php


include './includs/connect.php';
include './includs/header.php';

if (isset($_POST['update_customer'])) {
  // fetch data from form 
  echo $email    = $_POST['email'];
  echo $password = $_POST['password'];
  echo $fullname = $_POST['fullname'];


  $sql = "UPDATE customer SET name = '$fullname',
                             email = '$email',
	                           password = '$password'
	                           WHERE id = {$_GET['id']}";
  // mysqli_query($conn, $sql);
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

$id = $_GET['id'];
$sql = "SELECT*FROM customer WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Add customer</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Input information</h3>
              </div>
              <hr>
              <form action="" method="post" novalidate="novalidate">

                <div class="form-group">
                  <label for="fullname_admin" class="control-label mb-1">Full name</label>
                  <input name="fullname" type="text" class="form-control" value="<?php echo $row["name"] ?>">
                </div>
                <div class="form-group">
                  <label for="email_admin" class="control-label mb-1">Email</label>
                  <input name="email" type="text" class="form-control" value=<?php echo $row["email"] ?>>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Password</label>
                  <input name="password" type="password" class="form-control cc-name valid" value="<?php echo $row["password"] ?>">
                  <span class=" help-block field-validation-valid"></span>
                </div>


                <div>
                  <button id="payment-button" type="submit" name="update_customer" class="btn btn-lg btn-info btn-block">
                    Update
                  </button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>


<?php
include './includs/footer.php';
?>