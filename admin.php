<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin ticrou</title>
  <link rel="stylesheet" href="./asset/scss/ticrou.css">
</head>
<body class="flex">
  <header class="admin-header">
    <div class="container">
      <div class="row">
        <div class="heading">
          <div class="logo">
            <img src="./asset/image/logo.png" alt="">
          </div>
          <h2>ticrou admin</h2>
        </div>
        <div class="menu">
          <ul>
            <li><a href="admin.php">home</a></li>
            <li><a href="foodslist.php">food list</a></li>
            <li><a href="addfood.php">add food </a></li>
            <li><a href="userslist.php">user list</a></li>
            <li><a href="reservationlist.php">reservation list</a></li>
            <li><a href="orderlist.php">order list</a></li>
          </ul>
        </div>
        <div class="btn" style="padding:15px;">
          <a style="  
          display:inline-block;
           font-size: 18px;
          background-color: red;
          border-radius: 5px;
          color: white;
          padding: 5px 10px;" href="logout.php">logout</a>
        </div>
      </div>
    </div>
  </header>
</body>
</html>