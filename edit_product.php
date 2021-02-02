<?php

include './includs/connect.php';

include 'includs/header.php';



// if (isset($_POST['add_product'])) {
//   $product_name    = $_POST['product_name'];
//   $product_price   = $_POST['product_price'];
//   $product_details = $_POST['product_details'];

//   //declaring variables
//   $filename = $_FILES['product_image']['name'];
//   $filetmpname = $_FILES['product_image']['tmp_name'];
//   //folder where images will be uploaded
//   $folder = 'images/';
//   //function for saving the uploaded images in a specific folder
//   move_uploaded_file($filetmpname, $folder . $filename);


//   $sql = "INSERT INTO product (product_name , product_price ,product_detial, Product_image)
//    VALUES ('$product_name', '$product_price', '$product_details','$filename')";

//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
// }



if (isset($_POST['update_product'])) {
  // fetch data from form 
  $product_name    = $_POST['product_name'];
  $product_price   = $_POST['product_price'];
  $product_details = $_POST['product_details'];

  $filename        = $_FILES['product_image']['name'];
  $filetmpname     = $_FILES['product_image']['tmp_name'];
  $folder = 'images/';
  move_uploaded_file($filetmpname, $folder . $filename);
  // $id = $_GET['product_id'];
  $sql = "UPDATE product SET  product_name      = '$product_name',
                             product_price     = '$product_price',
	                           product_details   = '$product_details',
                             product_image     = '$filename'
	                           WHERE product_id  = {$_GET['product_id']}";
  // mysqli_query($conn, $sql);
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

$id     = $_GET['product_id'];
$sql    = "SELECT*FROM product WHERE product_id=$id";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);


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
                  <input name="product_name" type="text" class="form-control" value="<?php echo $row["product_name"] ?>">
                </div>
                <div class="form-group">
                  <label for="product_price" class="control-label mb-1">Price</label>
                  <input name="product_price" type="text" class="form-control" value="<?php echo $row["product_price"] ?>">
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">Product details</label>
                  <textarea name="product_details" type="text" class="form-control cc-name valid" value="<?php echo $row["product_details"] ?>"></textarea>
                  <span class=" help-block field-validation-valid"></span>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">product image</label>
                  <input name="product_image" type="file" class="form-control cc-name valid" value="<?php echo $row["product_image"] ?>">
                  <span class=" help-block field-validation-valid"></span>
                </div>


                <div>
                  <button id="payment-button" type="submit" name="update_product" class="btn btn-lg btn-info btn-block">
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
include 'includs/footer.php';
?>