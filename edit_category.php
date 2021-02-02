<?php
include './includs/connect.php';


include 'includs/header.php';



if (isset($_POST['update_category'])) {
  // fetch data from form 
  $category_name    = $_POST['category_name'];
  $category_details = $_POST['category_details'];

  $filename         = $_FILES['category_image']['name'];
  $filetmpname      = $_FILES['category_image']['tmp_name'];

  $folder = 'images/';
  move_uploaded_file($filetmpname, $folder . $filename);

  $sql = "UPDATE categories SET category_name     = '$category_name',
	                              category_details  = '$category_details',
                                category_image    = '$filename'
                                WHERE category_id = {$_GET['category_id']}";

  // mysqli_query($conn, $sql);
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

$id     = $_GET['category_id'];
$sql    = "SELECT*FROM categories WHERE category_id=$id";
$result = mysqli_query($conn, $sql);
$row    = mysqli_fetch_assoc($result);



?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">Add category</div>
            <div class="card-body">
              <div class="card-title">
                <h3 class="text-center title-2">Input information</h3>
              </div>
              <hr>
              <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="category_name" class="control-label mb-1">category name</label>
                  <input name="category_name" type="text" class="form-control" value="<?php echo $row['category_name'] ?>">
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">category details</label>
                  <textarea name="category_details" type="text" class="form-control cc-name valid" value="<?php echo $row['category_details'] ?>"></textarea>
                  <span class=" help-block field-validation-valid"></span>
                </div>
                <div class="form-group has-success">
                  <label for="cc-name" class="control-label mb-1">category image</label>
                  <input name="category_image" type="file" class="form-control cc-name valid">
                  <span class=" help-block field-validation-valid"></span>
                </div>

                <div>
                  <button id="payment-button" type="submit" name="update_category" class="btn btn-lg btn-info btn-block">
                    add
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