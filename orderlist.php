<?php
include "conn.php";
session_start();
$message = '';
if (isset($_POST['deleteorder'])) {
  $delete_id = $_POST['orderid'];
  $delete_query = mysqli_query($conn, "DELETE FROM orders WHERE id=$delete_id") or die("query faild");
  if ($delete_query) {
    $message = "order delete successfully";
  } else {
    $message = "order not deleted successfully";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>order list</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>

<body class="flex">
  <?php readfile("admin.php"); ?>
  <section class="order-list">
    <div class="container">
      <div class="row">
        <div class="messagebox" style="background-color: white; padding: 15px;">
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
        <div class="content flex">
          <div class="main-box">
            <table>
              <tr>
                <th>
                  <p>user</p>
                </th>
                <th>
                  <p>food</p>
                </th>
                <th>
                  <p>price</p>
                </th>
                <th>
                  <p>button</p>
                </th>
              </tr>
            </table>
            <?php
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                
                      <table>
                        <tr>
                          <td>
                            <p><?php echo $row['user_name'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['product_name'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['product_price'] ?></p>
                          </td>
                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="orderid" value="<?php echo $row['id']; ?>">
                              <input type="submit" value="delete" name="deleteorder">
                            </form>
                          </td>
                        </tr>
                      </table>
                   
                
            <?php
              }
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </section>
</body>

</html>