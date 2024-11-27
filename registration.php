<?php
include 'conn.php';
// registration code 
$message = '';
if (isset($_POST['register'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $age = $_POST['age'];
  $checkemail = "select firstname from ragistration where email='$email'";
  $result = $conn->query($checkemail);

  if ($result->num_rows > 0) {
    $message = "email is already exist !";
  } else {

    $insertQuery = "INSERT INTO ragistration(firstname,lastname,email,gender,password,confirmpassword,age,phonenumber) VALUES ('$firstname','$lastname','$email','$gender','$password','$confirmpassword','$age','$phonenumber')";
    if ($conn->query($insertQuery) == TRUE) {
      $message = "data insertad successfully";
      header('Location:registration.php');
    } else {
      $message = "error" . $conn->error;
    }
  }
}


// login code 


if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  // $password=md5($password);
  $sql = "SELECT * FROM ragistration WHERE email='$email' and password='$password'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $row['email'];

    if ($email == 'admin@gmail.com') {
      header('location:foodslist.php');
      $_SESSION['useremail'] = $email;
    } else {
      header('location:index.php');
      $_SESSION['useremail'] = $email;
    }
    exit();
  } else {
    $message = "data not found incorrect email password ";
  }
}

//  $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ticrou registration</title>
  <link rel="stylesheet" href="asset/scss/ticrou.css">
  <!-- google font link  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Familjen+Grotesk:ital,wght@0,400..700;1,400..700&display=swap"
    rel="stylesheet">
  <!-- google font link  -->
</head>

<body>
  <script>
    function editfood(productid) {
      window.location.href = "editfood.php?productid=" + productid;
    }
  </script>
  <section class="ragistration-section">
    <div class="container">
      <div class="row flex">
        <div class="register-form-box" id="registration-form" style="display: none;">
          <div class="content">
            <!-- Display the message here -->
            <?php if ($message != ''): ?>
              <p><?php echo $message; ?></p>
            <?php endif; ?>
            <h1>registration page</h1>
            <form method="post" action='' class="flex">
              <div class="inputbox">

                <input type="text" name="firstname" placeholder="firstname" required>
              </div>
              <div class="inputbox">

                <input type="text" name="lastname" placeholder="last name" required>
              </div>
              <div class="radiobox flex">
                <ul class="flex">
                  <li> <label for="gender">gender</label></li>
                  <li> <label for="gender">m</label>
                    <input type="radio" name="gender" value="m" required>
                  </li>
                  <li> <label for="gender">f</label>
                    <input type="radio" name="gender" value="f" required>
                  </li>
                </ul>
              </div>
              <div class="inputbox">

                <input type="text" name="email" placeholder="Email" required>
              </div>
              <div class="inputbox">

                <input type="number" name="age" placeholder="age" required>
              </div>
              <div class="inputbox">

                <input type="number" name="phonenumber" placeholder="mobile number" required>
              </div>
              <div class="inputbox">

                <input type="password" name="password" placeholder="password" required>
              </div>
              <div class="inputbox">

                <input type="password" name="confirmpassword" placeholder="confirmpassword" required>
              </div>
              <div class="btn">
                <input type="submit" name="register" value="submit" required>
              </div>
            </form>
            <p>login here</p>
            <button id="sign-in-btn">click me</button>
          </div>
        </div>
        <div class="login-form-box" id="login-form">
          <div class="content">
            <!-- Display the message here -->
            <?php if ($message != ''): ?>
              <p><?php echo $message; ?></p>
            <?php endif; ?>
            <h1>login page</h1>
            <form action="" method="post" class="flex">
              <div class="inputbox">

                <input type="text" name="email" placeholder="email" required>
              </div>
              <div class="inputbox">

                <input type="password" name="password" placeholder="password" required>
              </div>
              <div class="btn">
                <input type="submit" name="login" value="login" onclick="loginuser()" required>
              </div>
            </form>
            <p>registration here</p>
            <button id="sign-up-btn">click me</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="script.js"></script>
</body>

</html>