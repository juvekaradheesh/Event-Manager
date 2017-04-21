<?php 
	session_start(); 
	if(isset($_SESSION['email'])){
		$login = true;
		$email = $_SESSION['email'];
	}
	else{
		$login = false;
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Events4All</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Join this portal to manage all your events" />
	<meta name="keywords" content="events, free, event portal, event manager, manage events, manager" />
	<meta name="author" content="Adheesh Juvekar, Asutosh Padhi" />

  	<!-- 
		Created By ::
			Adheesh Juvekar
			Asutosh Padhi
	-->

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Monsterrat:400,700|Merriweather:400,300italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Magnific Popup-->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	
	<!-- Cards -->
	<link rel="stylesheet" href="css/cards.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="functions/ajax.js"></script>

	</head>
	<body>
	
	<div id="fh5co-page">
		<nav class="fh5co-nav-style-1" role="navigation" data-offcanvass-position="fh5co-offcanvass-left">
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 fh5co-logo">
					<a href="#" class="js-fh5co-mobile-toggle fh5co-nav-toggle"><i style="color: #262626"></i></a>
					<a href="#"><font color="#1784fb">Events4All<font></a>
				</div>
				<div class="col-lg-6 col-md-5 col-sm-5 text-center fh5co-link-wrap">
					<ul data-offcanvass="yes">
						<li class="active"><a href="#" style="color: #262626">Participated</a></li>
						<li class="active"><a href="#" style="color: #262626">Upcoming</a></li>
						<li class="active"><a href="#" style="color: #262626">Trending</a></li>
					</ul>
				</div> 
				<div class="col-lg-3 col-md-4 col-sm-4 text-right fh5co-link-wrap">
					<ul class="fh5co-special" data-offcanvass="yes">
						<?php
							if($login){
						?>
						<li><a href="logout.php" class="call-to-action">Logout</a></li>
						<?php
							}
							else{
						?>
						<li><a href="login-form/index.html" style="color: #262626">Login</a></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
		</nav>

		<br><br>
		<div class="fh5co-blog-style-1">
			<div class="container">
				<!--<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<p class="wow fadeInUp" data-wow-duration=".1s" data-wow-delay=".1s">Events List</p>
					</div>
				</div>-->
				<div class="row p-b">
					<div class="col-md-12 col-sm-12 col-xs-12 col-xxs-12">
					<?php
					include "functions/dataBaseConn.php";

					$get_event_sql = "SELECT *FROM events";
					$get_event_result = $conn->query($get_event_sql);
					while($row = $get_event_result->fetch_assoc())
					{
						?>
						<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay=".5s">
							<div class="fh5co-post-image">
								<div class="fh5co-overlay"></div>	
								<img class="center-block" src="images/event<?php echo $row['event_id']; ?>.png" alt="Image" class="img-responsive">
							</div>
							<div class="fh5co-post-text">
								<h3><a href="#"><?php echo $row['event_name'] ?></a></h3>
								<p><?php echo $row['description'] ?></p><br>
								<p><h5 id="btn-disp<?php echo $row['event_id'] ?>"><?php include "participation-check.php" ?></h5></p>
							</div>
							<div class="fh5co-post-meta">
								<a href="#"><i class="icon-chat"></i> <?php echo $row['filled'] ?></a>
								<a href="#"><i class="icon-clock2"></i> <?php echo $row['date'] ?></a>
							</div>
						</div>
						<?php
					}
					?>
						
					</div>
					
					<div class="clearfix visible-sm-block"></div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
						<a href="#" class="btn btn-primary btn-lg">View All Post</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!-- END page-->

	<script type="text/javascript">
		function insert()
		{
			loadDoc("participate-insert.php","btn-disp");
		}
	</script>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
   <script src="js/jquery.waypoints.min.js"></script>
	<!-- Owl Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- WOW -->
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
