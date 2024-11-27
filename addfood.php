<?php
include "conn.php";
$message='';
if(isset($_POST['addfood'])){
  $foodname=$_POST['foodname'];
  $foodprice=$_POST['foodprice'];
  if(isset($_FILES['foodimg'])){
    $filename=$_FILES['foodimg']['name'];
    $dest_path='./images'.$filename;
    if(move_uploaded_file($_FILES['foodimg']['tmp_name'],$dest_path)){
      $stmt=$conn->prepare("INSERT INTO products(name,image,price) VALUES (?,?,?)");
      $stmt->bind_param("ssi",$foodname,$filename,$foodprice);
      if($stmt->execute()){
        $message="product added successfully";
        header('location:foodslist.php');
      }
      else{
        $message="error".$stmt->error;
      }
    }
    else{
      $message="error moving files";
    }
  }
  else{
$message="no file uploded and is the upload error";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>add food page</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>
<body class="flex">
<?php readfile("admin.php"); ?>
<section class="addfood-section">
<div class="container">
  <div class="row">
  <div class="messagebox" style="background-color: white; padding: 15px;" >
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
    <div class="content">
      <div class="main-box">
        <form action="addfood.php" method="post" class="flex" enctype="multipart/form-data">
          <div class="image-box">
            <label for="file" class="file_upload"><img src="./asset/image/depositphotos_172233472-stock-photo-upload-document-icon-premium-green.jpg" alt=""></label>
            <input type="file" name="foodimg" id="file" require>
          </div>
          <div class="details">
            <div class="name">
              <h3>enter food name</h3>
              <input type="text" name="foodname" require placeholder="food name">                            
              <h3>enter food price</h3>
              <input type="number" name="foodprice" require placeholder="food price">
            </div>
            <div class="btn">
              <input type="submit" name="addfood">
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