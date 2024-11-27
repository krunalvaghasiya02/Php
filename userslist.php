<?php
include "conn.php";
$message = '';
if (isset($_POST['deleteuser'])) {
  $delete_id = $_POST['userid'];
  $delete_query = mysqli_query($conn, "DELETE FROM ragistration WHERE id=$delete_id") or die("query faild");
  if ($delete_query) {
    $message = "user delete successfully";
  } else {
    $message = "user not deleted successfully";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticrou users</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>

<body class="flex">
  <?php readfile("admin.php"); ?>
 
  <section class="users-list-section">
    <div class="container">
      <div class="row ">
        <div class="messagebox" style="background-color: white; padding: 15px;">
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
        <div class="content flex">
          <div class="main-cart">
            <table>
              <tr>
                <th>name</th>
                <th>email</th>
                <th>contac</th>
                <th>password</th>
                <th>button</th>
              </tr>
            </table>
            <?php
            $sql = "SELECT * FROM ragistration";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>

                <table>
                  <tr>
                    <td>
                      <p><?php echo $row['firstname'] ?></p>
                      <p><?php echo $row['lastname'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['email'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['phonenumber'] ?></p>
                    </td>
                    <td>
                      <p><?php echo $row['password'] ?></p>
                    </td>
                    <td>
                      <form action="" method="post">
                        <input type="hidden" name="userid" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="delete" name="deleteuser">
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