<?php
include "conn.php";
$productid;
$message='';
if (isset($_GET['productid'])) {
  $productid = $_GET['productid'];
  $sql = "SELECT name, image, price FROM products WHERE id=$productid";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row) {
    $name = $row['name'];
    $image = $row['image'];
    $price = $row['price'];
  } else {
    $message="Product not found";
  }
} else {
  $message="No product ID is provided";
}

if (isset($_POST['updatefood'])) {
  $foodname = $_POST['foodname'];
  $foodimage = $_FILES['foodimage']['name'];
  $foodprice = $_POST['foodprice'];

  if (!empty($foodimage)) {
    $dest_path = './images' . $foodimage;
    if (move_uploaded_file($_FILES['foodimage']['tmp_name'], $dest_path)) {
      $sql = "UPDATE products SET name='$foodname', price='$foodprice', image='$foodimage' WHERE id='$productid'";
    } else {
      $message="Error moving file";
    }
  } else {
    $sql = "UPDATE products SET name='$foodname', price='$foodprice' WHERE id='$productid'";
  }

  if ($conn->query($sql) === TRUE) {
    $message="Product updated successfully";
    header('Location: foodslist.php');
    exit();
  } else {
    $message="Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticrou food edit</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>

<body class="flex">
<?php readfile("admin.php"); ?>
  <section class="edit-section flex">
    <div class="container">
      <div class="row">
      <div class="messagebox" style="background-color: white; padding: 15px;" >
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
        <div class="content flex">
          <div class="main-box">
            <form class="flex" action="" method="post" enctype="multipart/form-data">
              <div class="image">
                <img src="./images<?php $message=$image ?>" alt="">
              </div>
              <div class="information-box flex">
                <div class="image-box flex">
                  <label for="file" class="file_upload"><img
                      src="./asset/image/depositphotos_172233472-stock-photo-upload-document-icon-premium-green.jpg"
                      alt=""></label>
                  <input type="file" name="foodimage" id="file">
                </div>
                <div class="details flex">
                  <div class="box">
                    <label for="">food name</label>
                    <input type="text" name="foodname" placeholder="food name" value="<?php echo $name ?>">
                  </div>
                  <div class="box">
                    <label for="">food price</label><input type="number" placeholder="food price" name="foodprice" value="<?php echo $price ?>">
                  </div>
                  <div class="btn">
                    <input type="submit" value="UPDATE" name="updatefood">
                  </div>
                </div>


              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>