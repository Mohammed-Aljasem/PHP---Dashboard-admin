<?php

include './includs/connect.php';


include 'includs/header.php';



if (isset($_POST['add_product'])) {
  $product_name    = $_POST['product_name'];
  $product_price   = $_POST['product_price'];
  $product_details = $_POST['product_details'];

  //declaring variables
  $filename = $_FILES['product_image']['name'];
  $filetmpname = $_FILES['product_image']['tmp_name'];
  //folder where images will be uploaded
  $folder = 'images/';
  //function for saving the uploaded images in a specific folder
  move_uploaded_file($filetmpname, $folder . $filename);


  $sql = "INSERT INTO product (product_name , product_price ,product_details, Product_image)
   VALUES ('$product_name', '$product_price', '$product_details','$filename')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
            <div class="card-header">Add Admin</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Input information</h3>
              </div>
              <hr>
              <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="product_name" class="control-label mb-1">Product name</label>
                  <input name="product_name" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="product_price" class="control-label mb-1">Price</label>
                  <input name="product_price" type="text" class="form-control">
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Product details</label>
                  <textarea name="product_details" type="text" class="form-control cc-name valid"></textarea>
                  <span class=" help-block field-validation-valid"></span>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">product image</label>
                  <input name="product_image" type="file" class="form-control cc-name valid">
                  <span class=" help-block field-validation-valid"></span>
                </div>


                <div>
                  <button id="payment-button" type="submit" name="add_product" class="btn btn-lg btn-info btn-block">
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
                  <th>Category id</th>
                  <th>category name</th>
                  <th>category image</th>
                  <th>product id</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql2 = "SELECT * FROM product";
                $result2 = mysqli_query($conn, $sql2);


                while ($row2 = mysqli_fetch_array($result2)) {
                ?>
                  <tr>
                    <td> <?php echo $row2["product_id"] ?></td>
                    <td> <?php echo $row2["product_name"] ?></td>
                    <td><img src="./images/<?php echo $row2["product_image"] ?>" alt=""> </td>
                    <td> <?php echo $row2["product_details"] ?></td>

                    <td> <a href="http://localhost/php/dashboard/admin/edit_product.php?product_id=<?php echo $row2['product_id'] ?>" class="btn btn-warning"> Edit</a> </td>
                    <td> <a href="http://localhost/php/dashboard/admin/delete_product.php?product_id=<?php echo $row2['product_id'] ?>" class="btn btn-danger"> Delete</a> </td>
                  </tr>
                <?php
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