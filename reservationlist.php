<?php
include "conn.php";
$message = '';
if (isset($_POST['deletereservation'])) {
  $delete_id = $_POST['bookingid'];
  $delete_query = mysqli_query($conn, "DELETE FROM reservation WHERE id=$delete_id") or die("query faild");
  if ($delete_query) {
    $message = "reservation delete successfully";
  } else {
    $message = "reservation not deleted successfully";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticrou reservation list</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>

<body class="flex">
  <?php readfile("admin.php"); ?>
  <section class="booking-list-section">
    <div class="container">
      <div class="row ">
        <div class="messagebox" style="background-color: white; padding: 15px;">
          <p style="color: green; font-size: 20px;"><?php echo $message ?></p>
        </div>
        <div class="content flex">
          <div class="main-cart">
            <table>
              <tr>
                          <th>
                            <p>name</p>
                          </th>
                          <th>
                            <p>emial</p>
                          </th>
                          <th>
                            <p>phone_number</p>
                          </th>
                          <th>
                            <p>tabel_number</p>
                          </th>
                          <th>
                            <p>person</p>
                          </th>
                          <th>
                            <p>date</p>
                          </th>
                          <th>
                            <p>time</p>
                          </th>
                          <th>
                            <p>request</p>
                          </th>  
                          <th>
                            <p>button</p>
                          </th>
                                             
                        </tr>
            </table>
            <?php
            $sql = "SELECT * FROM reservation";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
               
                      <table>
                        
                        <tr>
                          <td>
                            <p><?php echo $row['name'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['email'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['mobilenumber'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['tabelnumber'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['person'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['bookingdate'] ?></p>
                          </td>
                          <td>
                            <p><?php echo $row['bookingtime'] ?></p>
                          </td>
                          <td class="request">
                            <p><?php echo $row['request'] ?></p>
                          </td>
                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="bookingid" value="<?php echo $row['id']; ?>">
                              <input type="submit" value="delete" name="deletereservation">
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