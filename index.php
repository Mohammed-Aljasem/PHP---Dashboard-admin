<?php

include './includs/connect.php';


include 'includs/header.php';
?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Add Admin</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Input information</h3>
              </div>
              <hr>
              <form action="add_admin.php" method="post" novalidate="novalidate">
                <div class="form-group">
                  <label for="fullname_admin" class="control-label mb-1">Full name</label>
                  <input name="fullname_admin" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email_admin" class="control-label mb-1">Email</label>
                  <input name="email_admin" type="text" class="form-control">
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Password</label>
                  <input name="password_admin" type="password" class="form-control cc-name valid" ">
                  <span class=" help-block field-validation-valid"></span>
                </div>


                <div>
                  <button id="payment-button" type="submit" name="add_admin" class="btn btn-lg btn-info btn-block">
                    add
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row m-t-30">
        <div class="col-md-12">
          <!-- DATA TABLE-->
          <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <a href=""></a>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT id, full_name,email  FROM admins";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                      <td> <?php echo $row["id"] ?></td>
                      <td><?php echo $row["full_name"] ?> </td>
                      <td><?php echo $row["email"] ?></td>
                      <td> <a href="http://localhost/php/dashboard/admin/edit_admin.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"> Edit</a> </td>
                      <td> <a href="http://localhost/php/dashboard/admin/delete_admin.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"> Delete</a> </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "0 results";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<?php
include 'includs/footer.php';
?>