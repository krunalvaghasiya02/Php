<?php
include "conn.php";
$message='';
if (isset($_POST['deletefood'])) {
  $delete_id = $_POST['foodid'];
  $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id=$delete_id") or die("query faild");
  if ($delete_query) {
    $message="product delete successfully";
  } else {
    $message="product not deleted successfully";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticrou foods list </title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>

<body class="flex">
<?php readfile("admin.php"); ?>
  <section class="foods-list-section">
    <div class="container">
      <div class="row ">
      <div class="messagebox" style="background-color: white; padding: 15px;" >
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
        <div class="content flex">
     
        <div class="main-cart flex">
          <?php
          $sql = "SELECT * FROM products";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <div class="cart">
                <div class="content">
                  <div class="image">
                    <img src="./images<?php echo $row['image'] ?>" alt="" style="height:200px;">
                  </div>
                  <div class="details flex">
                    <div class="information flex">
                      <p><?php echo $row['name'] ?></p>
                      <h4>₹<?php echo $row['price'] ?></h4>
                    </div>
                    <form action="" method="post">
                      <input type="hidden" name="foodid" value="<?php echo $row['id']; ?>">
                      <input type="submit" value="DELETE" name="deletefood">
                    </form>
                    <div class="btn">
                      <button onclick="editfood('<?php echo $row['id'] ?>')">EDIT</button>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          ?>
        </div>
        </div>
       
      </div>
    </div>
  </section>
  <script src="script.js"></script>
</body>

</html>