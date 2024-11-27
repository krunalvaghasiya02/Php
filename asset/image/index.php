<?php
include "conn.php";
session_start();
if (isset($_POST['orderfood'])) {
	$product_id = $_POST['foodid'];
	$product_name = $_POST['foodname'];
	$product_price = $_POST['foodprice'];
	$stmt = $conn->prepare("INSERT INTO orders(user_id,product_id,user_name,product_name,product_price)VALUES(?,?,?,?,?)");
	$stmt->bind_param("iissi", $_SESSION['userid'], $product_id, $_SESSION['username'], $product_name, $product_price);
	if ($stmt->execute()) {
		echo "order successfully";
	} else {
		echo "error" . $stmt->error;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- google fonts link start -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rouge+Script&display=swap" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Rouge+Script&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Rouge+Script&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<!-- google fonts link end -->

	<title>ticrou-restaurant</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="./asset/scss/index.css">

</head>

<body>
	<!-- nav start -->
	<nav>
		<div class="container">
			<div class="main">
				<div class="left">
					<div class="link">
						<ul>
							<li>
								<i class="fa-solid fa-envelope"></i>
								<span>
									<a href="#">info@example.com</a>
								</span>
							</li>
							<li>
								<i class="fa-solid fa-clock"></i>
								<span class="l-ul-bgc">Open Hours: Mon - Fri 8.00
									am - 6.00 pm</span>
							</li>
						</ul>
					</div>
					<div class="social-icon">
						<ul>
							<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
						</ul>
					</div>
					<div class="user-name">
						<?php
						$sql = "SELECT * FROM ragistration";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
						?>
								<p style="color: white; letter-spacing: 1px;"><?php
																															if ($row['email'] == $_SESSION['useremail']) {
																																echo $row['firstname'];
																																echo $row['lastname'];
																																$_SESSION['userid'] = $row['id'];
																																$_SESSION['username'] = $row['firstname'];
																															}
																															?></p>
						<?php
							}
						}
						?>
					</div>
				</div>
				<div class="right">
					<?php
					if ($_SESSION['useremail'] == "") {
					?>
						<a href="registration.php">login</a>
					<?php
					} else {
					?>
						<a href="logout.php">logout</a>
					<?php
					}
					?>

				</div>
			</div>
		</div>
	</nav>
	<!-- nav end -->
	<!-- header start -->
	<header>
		<div class="container">
			<div class="row flex">
				<div class="logo">
					<img src="./asset/image/logo.png" alt="logo">
				</div>
				<div class="manu">
					<ul>
						<li><a href="#">home</a>
							<div class="dropdown">
								<ul>
									<li>
										<a href="#">home page 01</a>
									</li>
									<li>
										<a href="#">home page 02</a>
									</li>
									<li>
										<a href="#">home page 03</a>
									</li>
									<li>
										<a href="#">one page home</a>
									</li>
									<li>
										<a href="#">RTL home</a>
									</li>
									<li>
										<a href="#">header style &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ></a>
										<div class="sub-dropdown">
											<ul>
												<li>
													<a href="#">header style 01</a>
												</li>
												<li>
													<a href="#">header style 02</a>
												</li>
												<li>
													<a href="#">header style 03</a>
												</li>
											</ul>
										</div>
									</li>

								</ul>
							</div>
						</li>
						<li><a href="#">About US</a></li>
						<li><a href="#">Services</a>
							<div class="dropdown">
								<ul>
									<li><a href="#">service</a></li>
									<li><a href="#">service details</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">pages</a>
							<div class="dropdown">
								<ul>
									<li><a href="#">gallery &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
											&nbsp;> </a>
										<div class="sub-dropdown">
											<ul>
												<li><a href="#">gallery 01</a></li>
												<li><a href="#">gallery 02</a></li>
												<li><a href="#">gallery details</a></li>
											</ul>
										</div>
									</li>
									<li><a href="#">team &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
											&nbsp; &nbsp; ></a>
										<div class="sub-dropdown">
											<ul>
												<li><a href="#">our team</a></li>
												<li><a href="#">team detail</a></li>
											</ul>
										</div>
									</li>
									<li><a href="#">menu page</a></li>
									<li><a href="#">testimonials</a></li>
									<li><a href="#">faq's</a></li>
									<li><a href="#">reservation</a></li>
									<li><a href="#">404</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">Shop</a>
							<div class="dropdown">
								<ul>
									<li><a href="#">shop</a></li>
									<li><a href="#">shop detail</a></li>
									<li><a href="#">cart</a></li>
									<li><a href="#">check out</a></li>
									<li><a href="#">my account</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">Blog</a>
							<div class="dropdown">
								<ul>
									<li><a href="#">blog grid</a></li>
									<li><a href="#">blog standard</a></li>
									<li><a href="#">blog details</a></li>
								</ul>
							</div>
						</li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="searchbar">
					<ul class="searchbar-ul">
						<li class="searchbar-li"><i class="fa-solid fa-magnifying-glass"></i></li>
						<li class="searchbar-li"><i class="fa-solid fa-bag-shopping"></i>
							<div>
								<i class="fa-thin fa-0"></i>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<!-- header end  -->
	<!-- main contant start -->
	<section class="home-sec">
		<div class="slider-container">
			<div class="slide" style="background-image: url('./asset/image/banner-3.jpg')">

			</div>

			<div class="slide active" style="background-image: url('./asset/image/banner-1.jpg')">

			</div>
		</div>
		<div class="container">
			<div class="row">

				<div class="content">
					<!-- <div class="left-arrow">
							<i class="fa-solid fa-arrow-left-long"></i>
						</div> -->
					<h4 id="main-heading">ultimate food</h4>
					<h3>best ever food service</h3>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor, cum.Lorem ipsum dolor sit
						<br> amet consectetur adipisicing elit. Alias, veniam.
					</p>
					<div class="btn-div"><a href="#">mack reservation</a></div>
					<!-- <div class="right-arrow">
							<i class="fa-solid fa-arrow-right-long"></i>
						</div> -->
				</div>

			</div>
		</div>
		<div class="bottom-img">
			<img src="./asset/image/shape-1.png" alt="">
		</div>
	</section>
	<!-- main contant end  -->

	<!-- about section start  -->
	<section class="about">
		<div class="container ">
			<div class="row flex">
				<div class="about-left">
					<span>our story</span>
					<h2>Traditional & Modern Service <span>Since 1970</span></h2>
					<p>Ut neque turpis dolor sit amet consectetur adipiscing elit purus egestas diam sit vitae egestas suspendisse
						amet ultricies eu. Eget at porttitor morbi blandit ac vitae, dolor. Gravida eu vel ac luctus. Hac a vel est
						malesuada tellus sed nunc, etiam maecenas.
					</p>
					<div class="about-img"><img src="./asset/image/signature-1.png" alt=""></div>
					<div class="about-btn"><a href="#">our story</a></div>
				</div>
				<div class="about-right flex">
					<div class="about-img-1"><img src="./asset/image/vector-1.png" alt=""></div>
					<div class="about-img-2"><img src="./asset/image/about-1.png" alt="shefphoto"></div>
					<div class="about-img-3"><img src="./asset/image/shape-2.png" alt=""></img></div>
					<div class="about-img-4"><img src="./asset/image/tomato.png" alt=""></div>
					<div class="shap-bg-shaf"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- about section end  -->
	<!-- manu section start  -->
	<section class="manu-sec">
		<div class="container">
			<div class="row">
				<div class="manu-heading">
					<div class="manu-img-1"><img src="./asset/image/manu-sec-left.png" alt=""></div>
					<div class="manu-img-3"> <img src="./asset/image/manu-sec-left-top.png" alt=""></div>
					<div class="center"> <span>weekly special</span>
						<h4>manu of the day</h4>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- manu section end  -->
	<!-- product section start  -->
	<section class="product">
		<div class="container">
			<div class="row">
				<div class="main-box">
					<div class="box">
						<div class="content">
							<div class="top-box">
								<img src="./asset/image/shape-3.png" alt="">
							</div>
							<div class="bottom-box">
								<img src="./asset/image/shape-4.png" alt="">
							</div>
							<div class="detail">
								<div class="dish-name">
									<h4><a href="#">American Combo Menu</a></h4><span>$12</span>
								</div>
								<p>Maecenas posuere dolor sit amet consectur adipiscing purus egestas diam sit vitae egestas suspendisse
									amet…
								</p>
								<div class="dish-name">
									<h4><a href="#">Optic Breakfast Combo</a></h4><span>$20</span>
								</div>
								<p>Nunc non tortor sed mi condimentum bibendum. Nunc sagittis elit nec ante facilisis varius. Aliquam…
								</p>
								<div class="dish-name">
									<h4><a href="#">Buffalo Meat Recipie Combo</a></h4><span>$30</span>
								</div>
								<p>Nullam sit amet lectus at mauris scelerisque egestas at quis orci. Sed id eros sed…</p>
							</div>
						</div>
					</div>
					<div class="box">
						<div class="content">
							<div class="manu-img-2">
								<img src="./asset/image/manu-sec-right.png" alt="">
							</div>
							<div class="top-box">
								<img src="./asset/image/shape-3.png" alt="">
							</div>
							<div class="bottom-box">
								<img src="./asset/image/shape-4.png" alt="">
							</div>
							<div class="detail">
								<div class="dish-name">
									<h4><a href="#">Strawberry Jam French Toast</a></h4><span>$15</span>
								</div>
								<p>Ut neque turpis, laoreet quis porttitor eu, scelerisque pellentesque dui. Suspendisse nec justo
									lacus.
									Quisque…
								</p>
								<div class="dish-name">
									<h4><a href="#">Truly Amazing Blueberry Recipes</a></h4><span>$25</span>
								</div>
								<p>Fusce sagittis eros nec sapien sagittis auctor. Tortor sed ipsum dolor sit amet, consectetur
									adipiscing…
								</p>
								<div class="dish-name">
									<h4><a href="#">Toast Breakfast Menu Item</a></h4><span>$45</span>
								</div>
								<p>Praesent tellus leo, finibus in ex nec, malesuada blandit arcu. In id quam eget sem…</p>
							</div>
						</div>
					</div>
				</div>
				<div class="manu-btn">
					<a href="#">download pdf</a>
				</div>
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
											<input type="hidden" name="foodname" value="<?php echo $row['name']; ?>">
											<input type="hidden" name="foodprice" value="<?php echo $row['price']; ?>">
											<input type="submit" value="order" name="orderfood">
										</form>

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
	</section>
	<!-- product section end  -->

	<!-- promotion section start  -->
	<section class="promotion">
		<div class="bg-img-promotion">
			<img src="./asset/image/shape-2.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="promotion-heading">
					<h2>promotion</h2>
					<h3>Check Our All Flavours
						<span>Summer Promo</span>
					</h3>
					<div class="bg-img-promotion">
						<img src="./asset/image/shape-2.png" alt="">
					</div>
				</div>
				<div class="promotion-containt">
					<div class="promotion-img">
						<div>
							<img src="./asset/image/promotion-1.jpg" alt="">
						</div>
					</div>
					<div class="promotion-detail">
						<div class="bg-img-promotion-detail">
							<img src="./asset/image/promotion-bg.png" alt="">
						</div>
						<h3>
							Over
							<span>250</span>
							Delicious & Tasty Recipes
						</h3>
						<h4>
							<span>
								Get 25% Off
							</span>
						</h4>
						<p>
							Cras aliquet dolor sit amet consectetur adipiscing elit purus egestas diam sit vitae egestas
							suspendisse
							amet ultricies eu. Eget at porttitor.
						</p>
						<div class="promotion-btn">
							<a href="#">let's order now</a>
						</div>
					</div>
				</div>
				<div class="promotion-containt">
					<div class="promotion-detail">
						<div class="bg-img-promotion-detail">
							<img src="./asset/image/promotion-bg.png" alt="">
						</div>
						<h3>
							Over
							<span>250</span>
							Delicious & Tasty Recipes
						</h3>
						<h4>
							<span>Get 25% Off</span>
						</h4>
						<p>Proin vitae arcu id mi pretium ornare. Aenean vitae aliquet nibh rhoncus elit venenatis iaculis at.
							Integer
							hendrerit tincidunt justo, vitae porttitor dolor.</p>
						<div class="promotion-btn">
							<a href="#">let's order now</a>
						</div>
					</div>
					<div class="promotion-img">
						<div>
							<img src="./asset/image/promotion-2.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- promotion section end  -->

	<!-- testimonial section start -->
	<section class="testimonial">
		<div class="bg-img-testimonial">
			<img src="./asset/image/men-1.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="t-conatant">
					<div class="t-img">
						<div class="tomato-img">
							<img src="./asset/image/tomato.png" alt="">
						</div>
					</div>
					<div class="t-detail">
						<div class="yellow-img">
							<img src="./asset/image/image-2.png" alt="">
						</div>
						<div class="t-detail-img-bg">
							<img src="./asset/image/shape-2.png" alt="">
						</div>
						<div class="t-heading">
							<h2>Testimonials</h2>
							<h4>What Clients Say About
								<span>Ticrou</span>
							</h4>
						</div>

						<div class="profile">
							<h3>
								<span>
									96
								</span>
							</h3>
							<p>“Sed eleifend felis a ligula dictum, nec tempus augue semper. Aenean ut sapien lacinia, laoreet sapien quis, vulputate nisi. Fusce orci tortor, tristique non mi ...</p>

							<div class="profile-id">
								<div class="profile-id-img">
									<img src="./asset/image/logo.jpg" alt="">
								</div>
								<div class="profile-id-detail">
									<span>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
										<i class="fa-solid fa-star"></i>
									</span>
									<h3>orlando bloom</h3>
									<h4>master chef</h4>
								</div>
							</div>
						</div>



						<div class="t-arrow">
							<div class="t-l-arrow">
								<i class="fa-solid fa-arrow-left-long"></i>
							</div>
							<div class="t-r-arrow">
								<i class="fa-solid fa-arrow-right-long"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- testimonial section end  -->
	<!-- discount section start -->
	<section class="discount">
		<div class="bg-img-top-discount">
			<img src="./asset/image/manu-sec-left-top.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="discount-contant">
					<div class="title">
						<span>Get 25% Discount</span>
						<h4>Explore Special Taste & The
							Best Quality</h4>
						<div class="btn">
							<a href="#">make a reservation</a>
						</div>
					</div>
					<div class="d-img-bottom-left">
						<img src="./asset/image/discount-bg.png" alt="">
					</div>
					<div class="d-img-bottom-right">
						<img src="./asset/image/discount-right img.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- discount section end  -->
	<!-- news section start  -->
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="heading">
					<span>Ticrou News</span>
					<div class="title">
						<h3>Know More About The
							Ticrou Article</h3>
					</div>
				</div>
				<div class="news-main-cart">
					<div class="news-sub-cart">
						<div class="cart-top">
							<div>
								<a href="#"><img src="./asset/image/news-13-410x281.jpg" alt=""></a>
								<h2>SEPTEMBER 22, 2022</h2>
							</div>
						</div>
						<div class="cart-bottom">
							<h3>
								<a href="#">Right Way to Make Cold Coffee</a>
							</h3>
							<ul>
								<li>
									<i class="fa-regular fa-user"></i>
									<a href="#">admin</a>
								</li>
								<li>
									<i class="fa-regular fa-comment"></i>
									<a href="#">3 Comments</a>
								</li>
							</ul>
							<p>Etiam malesuada dolor sit amet, consectetur adipiscing elit. Consectetur ...</p>
							<div class="news-btn">
								<a href="#">read more</a>
							</div>
						</div>
					</div>
					<div class="news-sub-cart">
						<div class="cart-top">
							<div>
								<a href="#"><img src="./asset/image/news-14-410x281.jpg" alt=""></a>
								<h2>SEPTEMBER 22, 2022</h2>
							</div>
						</div>
						<div class="cart-bottom">
							<h3><a href="#">Truly Amazing Blueberry Recipes</a></h3>
							<ul>
								<li>
									<i class="fa-regular fa-user"></i>
									<a href="#">admin</a>
								</li>
								<li>
									<i class="fa-regular fa-comment"></i>
									<a href="#">0 Comments</a>
								</li>
							</ul>
							<p>Phasellus vel risus consequat, volutpat ligula elementum, sagittis purus. ...</p>
							<div class="news-btn">
								<a href="#">read more</a>
							</div>
						</div>
					</div>
					<div class="news-sub-cart">
						<div class="cart-top">
							<div>
								<a href="#"><img src="./asset/image/news-15-410x281.jpg" alt=""></a>
								<h2>SEPTEMBER 22, 2022</h2>
							</div>
						</div>
						<div class="cart-bottom">
							<h3><a href="#">The benefits of Buffalo Meat</a></h3>
							<ul>
								<li>
									<i class="fa-regular fa-user"></i>
									<a href="#">admin</a>
								</li>
								<li>
									<i class="fa-regular fa-comment"></i>
									<a href="#">3 Comments</a>
								</li>
							</ul>
							<p>Duis fringilla lectus et lacus mollis, eget feugiat tortor ...
							</p>
							<div class="news-btn">
								<a href="#">read more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- news section end   -->
	<!-- booking section start  -->
	<section class="booking">
		<div class="img">
			<img src="./asset/image/bokking-bg-left.png" alt="">
		</div>
		<div class="top">
			<img src="./asset/image/booking-bg-right-top.png" alt="">
		</div>
		<div class="bottom">
			<img src="./asset/image/booking-bg-right-bottom.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="heading">
					<div class="contant">
						<h2>Table Booking</h2>
						<h3>Pre-Order to Make a
							Reservation</h3>
					</div>
				</div>
				<div class="booking-contant">
					<div class="inner-contant">
						<div class="form-contant">
							<form action="reservation.php" class="booking-form" method="post">
								<div class="input-box">
									<input type="text" name="name" placeholder="full name" required>
								</div>
								<div class="input-box">
									<input type="email" placeholder="enter email" name="email" required>
								</div>
								<div class="input-box">
									<input type="number" name="mobilenumber" placeholder="phone number" required>
								</div>

								<div class="input-box">
									<select required name="tabelnumber">
										<option value="0">tabel number</option>
										<option value="1">tabel number 1</option>
										<option value="2">tabel number 2</option>
										<option value="3">tabel number 3</option>
										<option value="4">tabel number 4</option>
									</select>
								</div>
								<div class="input-box">
									<select required name="person">
										<option value="0">number of person</option>
										<option value="1">number of person 1</option>
										<option value="2">number of person 2</option>
										<option value="3">number of person 3</option>
										<option value="4">number of person 4</option>
									</select>
								</div>
								<div class="input-box">
									<input type="date" name="date" placeholder="booking date" required>
								</div>
								<div class="input-box">
									<input type="time" name="time" value="00:00:00" placeholder="booking time" required>
								</div>
								<div class="text-area">
									<textarea name="request" id="request" rows="5" placeholder="special request" required></textarea>
								</div>
								<div class="btn">
									<input type="submit" value="mack a reservation" name="booking">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- booking section end  -->
	<!-- footer section start  -->
	<footer>
		<div class="top-img">
			<img src="./asset/image/shape-14.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="main-box">
					<div class="sub-box1">

						<h3>Opening Times</h3>
						<ul>
							<li>Monday – Thursday: 08AM – 10PM</li>
							<li>Friday – Saturday: 10AM–11:30PM</li>
							<li>Sunday:<span>closed</span></li>
							<li>Booking TIme: 24/7 Hours</li>
						</ul>
					</div>
					<div class="sub-box2">
						<div class="left-img">
							<img src="./asset/image/shape-19.png" alt="">
						</div>
						<div class="right-img">
							<img src="./asset/image/shape-20.png" alt="">
						</div>
						<div class="logo">
							<a href="#">
								<img src="./asset/image/footer-logo.png" alt=""></a>
						</div>
						<p>Tincidunt neque pretium lectus donec risus. Mauris mi tempor nunc orc leo consequat vitae erat gravida
							lobortis nec et sagittis.</p>
						<div class="icon">
							<ul>
								<li>
									<a href="#">
										<i class="fa-brands fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa-brands fa-instagram"></i>
									</a>
								</li>
								<li><a href="#">
										<i class="fa-brands fa-twitter"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="sub-box3">
						<h3>Contact Info</h3>
						<ul>
							<li><span>Address :</span>New Hyde Park, NY 11040</li>
							<li><span>Email :</span><a href="#">example@info.com</a></li>
							<li><span>Call :</span><a href="#">(+91)-213-666-0027</a></li>
						</ul>
					</div>
				</div>
				<div class="end">
					<p>Copyright &copy; by KRUNAL VAGHASIYA As a fresher </p>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer section end  -->
	<script src="/script.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>