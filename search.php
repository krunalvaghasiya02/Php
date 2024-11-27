<?php
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search for users</title>
</head>
<body>
<section class="users-list-section">
    <div class="container">
      <div class="row">
        <form action="search.php" method="post">
          <div>
            <label
              for="search">Search here: -</label>
            <input type="text" name="search" placeholder="enter the value">
          </div>
          <div>
            <input type="submit" name="submit">
          </div>
        </form>
      </div>
    </div>
  </section>
  <section class="users-list-section"> 
    <div class="container">
      <div class="row">
        <div class="data">
          <?php
          if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $cmd = "SELECT * FROM `ragistration` WHERE firstname like '%$search%'";
            $result = $conn->query($cmd);
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              echo '
wellcome 
<p>' . $row['firstname'] . '
<p>' . $row['lastname'] . '
';
            } else {
              echo "data not found";
            }
          } else {
            echo "serch value not get";
          }
          ?>
        </div>
      </div>
  </section>
</body>
</html>