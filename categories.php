<?php
include './includs/connect.php';


include 'includs/header.php';



if (isset($_POST['add_category'])) {
  $category_name    = $_POST['category_name'];

  $category_details = $_POST['category_details'];

  //declaring variables
  $filename = $_FILES['category_image']['name'];
  $filetmpname = $_FILES['category_image']['tmp_name'];
  //folder where images will be uploaded
  $folder = 'images/';
  //function for saving the uploaded images in a specific folder
  move_uploaded_file($filetmpname, $folder . $filename);


  $sql = "INSERT INTO categories (category_name ,category_details,category_image)
   VALUES ('$category_name', '$category_details','$filename')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // header('Location:categories');
    // exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Edit category</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Input information</h3>
              </div>
              <hr>
              <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="category_name" class="control-label mb-1">category name</label>
                  <input name="category_name" type="text" class="form-control">
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">category details</label>
                  <textarea name="category_details" type="text" class="form-control cc-name valid"></textarea>
                  <span class=" help-block field-validation-valid"></span>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">category image</label>
                  <input name="category_image" type="file" class="form-control cc-name valid">
                  <span class=" help-block field-validation-valid"></span>
                </div>

                <div>
                  <button id="payment-button" type="submit" name="add_category" class="btn btn-lg btn-info btn-block">
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
                  <th>category id</th>
                  <th>category name</th>
                  <th>category details</th>

                  <th>category image</th>
                  <th>Edit</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT*  FROM categories";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                      <td><?php echo $row["category_id"] ?></td>
                      <td><?php echo $row["category_name"] ?> </td>
                      <td><?php echo $row["category_details"] ?></td>

                      <td><img src="./images/<?php echo $row["category_image"] ?>" alt=""> </td>

                      <td> <a href="http://localhost/php/dashboard/admin/edit_category.php?category_id=<?php echo $row['category_id'] ?>" class="btn btn-warning"> Edit</a> </td>
                      <td> <a href="http://localhost/php/dashboard/admin/delete_category.php?category_id=<?php echo $row['category_id'] ?>" class="btn btn-danger"> Delete</a> </td>
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