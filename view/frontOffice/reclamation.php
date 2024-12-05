<?php
include '../../config_connexion.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<!-- meta data -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="style.css">

	<!--font-family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- title of site -->
	<title>Directory Landing Page</title>

	<!-- For favicon png -->
	<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

	<!--font-awesome.min.css-->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!--linear icon css-->
	<link rel="stylesheet" href="assets/css/linearicons.css">

	<!--animate.css-->
	<link rel="stylesheet" href="assets/css/animate.css">

	<!--flaticon.css-->
	<link rel="stylesheet" href="assets/css/flaticon.css">

	<!--slick.css-->
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">

	<!--bootstrap.min.css-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<!-- bootsnav -->
	<link rel="stylesheet" href="assets/css/bootsnav.css">

	<!--style.css-->
	<link rel="stylesheet" href="assets/css/style.css">

	<!--responsive.css-->
	<link rel="stylesheet" href="assets/css/responsive.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<style>
	/* Centrer la section */
	.subscription {
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 100vh;
		/* Prend toute la hauteur de la fenêtre */
		background-color: #f3f4f6;
		padding: 0 15px;
	}


	/* Titre */
	.subscribe-title h2 {
		font-size: 2.5rem;
		/* Agrandir le texte */
		font-weight: bold;
		color: #d24a4a;
		margin-bottom: 30px;
	}

	/* Formulaire */
	form {
		background-color: #fff;
		padding: 30px;
		border-radius: 10px;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}

	/* Champs de formulaire */
	form .form-control,
	form .form-select {
		font-size: 1.1rem;
		/* Agrandir la taille du texte dans les champs */
		padding: 12px;
		margin-bottom: 20px;
		border-radius: 8px;
		border: 1px solid #ccc;
	}

	form .form-control:focus,
	form .form-select:focus {
		border-color: #2b67f6;
		box-shadow: 0 0 5px rgba(43, 103, 246, 0.3);
	}

	/* Labels */
	form .col-form-label {
		font-size: 1.1rem;
		/* Agrandir le texte des labels */
		color: #555;
		margin-bottom: 10px;
	}

	/* Bouton */
	form button {
		background-color: #2b67f6;
		color: #fff;
		font-size: 1.2rem;
		/* Agrandir le texte du bouton */
		padding: 12px 20px;
		border: none;
		border-radius: 5px;
		cursor: pointer;
		transition: background-color 0.3s ease;
		width: 100%;
		/* Prendre toute la largeur disponible */
	}

	form button:hover {
		background-color: #204abc;
	}

	/* Responsive */
	@media (max-width: 768px) {
		.subscribe-title h2 {
			font-size: 2rem;
			/* Taille du titre réduite sur petits écrans */
		}

		form .form-control,
		form .form-select,
		form button {
			font-size: 1rem;
			/* Ajuster la taille des champs et du bouton */
		}

		form {
			padding: 20px;
		}
	}
</style>

<body>
	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

	<!--header-top start -->
	<header id="header-top" class="header-top">
		<ul>
			<li>
				<div class="header-top-left">
					<ul>
						<li class="select-opt">
							<select name="language" id="language">
								<option value="default">EN</option>
								<option value="Bangla">BN</option>
								<option value="Arabic">AB</option>
							</select>
						</li>
						<li class="select-opt">
							<select name="currency" id="currency">
								<option value="usd">USD</option>
								<option value="euro">Euro</option>
								<option value="bdt">BDT</option>
							</select>
						</li>
						<li class="select-opt">
							<a href="#"><span class="lnr lnr-magnifier"></span></a>
						</li>
					</ul>
				</div>
			</li>
			<li class="head-responsive-right pull-right">
				<div class="header-top-right">
					<ul>
						<li class="header-top-contact">
							+1 222 777 6565
						</li>
						<li class="header-top-contact">
							<a href="#">sign in</a>
						</li>
						<li class="header-top-contact">
							<a href="#">register</a>
						</li>
					</ul>
				</div>
			</li>
		</ul>

	</header><!--/.header-top-->
	<!--header-top end -->

	<!-- top-area Start -->
	<section class="top-area">
		<div class="header-area">
			<!-- Start Navigation -->
			<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				<div class="container">

					<!-- Start Header Navigation -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href="index.html">Tunisian<span>Treasures</span></a>

					</div><!--/.navbar-header-->
					<!-- End Header Navigation -->

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
						<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
							<li class=" scroll active"><a href="#home">home</a></li>
							<li class="scroll"><a href="#works">how it works</a></li>
							<li class="scroll"><a href="#explore">Products</a></li>
							<li class="scroll"><a href="#reviews">review</a></li>
							<li class="scroll"><a href="#blog">blog</a></li>
							<li class="scroll"><a href="#contact">Feedback</a></li>
							<li class="scroll"><a href="listereclamation.php">mes reclamation</a></li>
						</ul><!--/.nav -->
					</div><!-- /.navbar-collapse -->
				</div><!--/.container-->
			</nav><!--/nav-->
			<!-- End Navigation -->
		</div><!--/.header-area-->
		<div class="clearfix"></div>

	</section><!-- /.top-area-->
	<!-- top-area End -->

	<!--welcome-hero start -->
	<section id="home" class="welcome-hero">
		<div class="container">
			<div class="welcome-hero-txt">
				<h2>best place to find and explore <br> that all you need </h2>
				<p>
					Find Best Place, Restaurant, Hotel, Real State and many more think in just One click
				</p>
			</div>
			<div class="welcome-hero-serch-box">
				<div class="welcome-hero-form">
					<div class="single-welcome-hero-form">
						<h3>what?</h3>
						<form action="index.html">
							<input type="text" value="Ex: place, restaurant, food, automobile"
								onfocus="if(this.value=='Ex: place, restaurant, food, automobile') { this.value=''; }"
								onblur="if(this.value=='') { this.value='Ex: place, restaurant, food, automobile'; }" />
						</form>

						<div class="welcome-hero-form-icon">
							<i class="flaticon-list-with-dots"></i>
						</div>
					</div>
					<div class="single-welcome-hero-form">
						<h3>location</h3>
						<form action="index.html">
							<input type="text" value="Ex: london, newyork, rome"
								onfocus="if(this.value=='Ex: london, newyork, rome') { this.value=''; }"
								onblur="if(this.value=='') { this.value='Ex: london, newyork, rome'; }" />
						</form>

						<div class="welcome-hero-form-icon">
							<i class="flaticon-gps-fixed-indicator"></i>
						</div>
					</div>
				</div>
				<div class="welcome-hero-serch">
					<button class="welcome-hero-btn" onclick="window.location.href='#'">
						search <i data-feather="search"></i>
					</button>
				</div>
			</div>
		</div>

	</section><!--/.welcome-hero-->
	<!--welcome-hero end -->

	<!--list-topics start -->
	<section id="list-topics" class="list-topics">
		<div class="container">
			<div class="list-topics-content">
				<ul>
					<li>
						<div class="single-list-topics-content">
							<div class="single-list-topics-icon">
								<i class="flaticon-restaurant"></i>
							</div>
							<h2><a href="#">resturent</a></h2>
							<p>150 listings</p>
						</div>
					</li>
					<li>
						<div class="single-list-topics-content">
							<div class="single-list-topics-icon">
								<i class="flaticon-travel"></i>
							</div>
							<h2><a href="#">destination</a></h2>
							<p>214 listings</p>
						</div>
					</li>
					<li>
						<div class="single-list-topics-content">
							<div class="single-list-topics-icon">
								<i class="flaticon-building"></i>
							</div>
							<h2><a href="#">hotels</a></h2>
							<p>185 listings</p>
						</div>
					</li>
					<li>
						<div class="single-list-topics-content">
							<div class="single-list-topics-icon">
								<i class="flaticon-pills"></i>
							</div>
							<h2><a href="#">healthcaree</a></h2>
							<p>200 listings</p>
						</div>
					</li>
					<li>
						<div class="single-list-topics-content">
							<div class="single-list-topics-icon">
								<i class="flaticon-transport"></i>
							</div>
							<h2><a href="#">automotion</a></h2>
							<p>120 listings</p>
						</div>
					</li>
				</ul>
			</div>
		</div><!--/.container-->

	</section><!--/.list-topics-->
	<!--list-topics end-->

	<!--works start -->
	<section id="works" class="works">
		<div class="container">
			<div class="section-header">
				<h2>how it works</h2>
				<p>Learn More about how our website works</p>
			</div><!--/.section-header-->
			<div class="works-content">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="single-how-works">
							<div class="single-how-works-icon">
								<i class="flaticon-lightbulb-idea"></i>
							</div>
							<h2><a href="#">choose <span> what to</span> buy</a></h2>
							<p>
								Browse our wide selection of products, carefully categorized to make your shopping experience easy and enjoyable.
							</p>
							<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
								see more
							</button>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-how-works">
							<div class="single-how-works-icon">
								<i class="flaticon-networking"></i>
							</div>
							<h2><a href="#">find <span> what you want</span></a></h2>
							<p>
								Discover a wide variety of exciting events happening across Tunisia, ranging from cultural festivals to local exhibitions and community gatherings.
							</p>
							<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
								see more
							</button>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-how-works">
							<div class="single-how-works-icon">
								<i class="flaticon-location-on-road"></i>
							</div>
							<h2><a href="#">explore <span> amazing</span> place</a></h2>
							<p>
								Embark on a virtual journey through Tunisia's most iconic landmarks, hidden gems, and breathtaking landscapes.
							</p>
							<button class="welcome-hero-btn how-work-btn" onclick="window.location.href='#'">
								see more
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.works-->
	<!--works end -->

	<!--explore start -->
	<section id="explore" class="explore">
		<div class="container">
			<div class="section-header">
				<h2>explore</h2>
				<p>Explore unique products that showcase the rich culture, craftsmanship, and flavors of Tunisia</p>
			</div><!--/.section-header-->
			<div class="explore-content">
				<div class="row">
					<div class=" col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e1.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">best rated</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-1">
								<h2><a href="#">tommy helfinger bar</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">5.0</span>
									<a href="#"> 10 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">5$-300$</span>
									</span>
									<a href="#">resturent</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn" onclick="window.location.href='#'">close now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e2.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">featured</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-2">
								<h2><a href="#">swim and dine resort</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">4.5</span>
									<a href="#"> 8 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">50$-500$</span>
									</span>
									<a href="#">hotel</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn open-btn" onclick="window.location.href='#'">open now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e3.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">best rated</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-3">
								<h2><a href="#">europe tour</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">5.0</span>
									<a href="#"> 15 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">5k$-10k$</span>
									</span>
									<a href="#">destination</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn" onclick="window.location.href='#'">close now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class=" col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e4.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">most view</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-4">
								<h2><a href="#">banglow with swiming pool</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">5.0</span>
									<a href="#"> 10 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">10k$-15k$</span>
									</span>
									<a href="#">real estate</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn" onclick="window.location.href='#'">close now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e5.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">featured</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-2">
								<h2><a href="#">vintage car expo</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">4.2</span>
									<a href="#"> 8 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">500$-1200$</span>
									</span>
									<a href="#">automotion</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn open-btn" onclick="window.location.href='#'">open now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-explore-item">
							<div class="single-explore-img">
								<img src="assets/images/explore/e6.jpg" alt="explore image">
								<div class="single-explore-img-info">
									<button onclick="window.location.href='#'">best rated</button>
									<div class="single-explore-image-icon-box">
										<ul>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-arrows-alt"></i>
												</div>
											</li>
											<li>
												<div class="single-explore-image-icon">
													<i class="fa fa-bookmark-o"></i>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="single-explore-txt bg-theme-5">
								<h2><a href="#">thailand tour</a></h2>
								<p class="explore-rating-price">
									<span class="explore-rating">5.0</span>
									<a href="#"> 15 ratings</a>
									<span class="explore-price-box">
										form
										<span class="explore-price">5k$-10k$</span>
									</span>
									<a href="#">destination</a>
								</p>
								<div class="explore-person">
									<div class="row">
										<div class="col-sm-2">
											<div class="explore-person-img">
												<a href="#">
													<img src="assets/images/explore/person.png" alt="explore person">
												</a>
											</div>
										</div>
										<div class="col-sm-10">
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incid ut labore et dolore magna aliqua....
											</p>
										</div>
									</div>
								</div>
								<div class="explore-open-close-part">
									<div class="row">
										<div class="col-sm-5">
											<button class="close-btn" onclick="window.location.href='#'">close now</button>
										</div>
										<div class="col-sm-7">
											<div class="explore-map-icon">
												<a href="#"><i data-feather="map-pin"></i></a>
												<a href="#"><i data-feather="upload"></i></a>
												<a href="#"><i data-feather="heart"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.explore-->
	<!--explore end -->

	<!--reviews start -->
	<section id="reviews" class="reviews">
		<div class="section-header">
			<h2>clients reviews</h2>
			<p>What our client say about us</p>
		</div><!--/.section-header-->
		<div class="reviews-content">
			<div class="testimonial-carousel">
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c1.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Tom Leakar</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c2.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>monirul islam</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c3.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Shohrab Hossain</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c4.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Tom Leakar</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c1.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Tom Leakar</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c2.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>monirul islam</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c3.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Shohrab Hossain</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
				<div class="single-testimonial-box">
					<div class="testimonial-description">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="assets/images/clients/c4.png" alt="clients">
							</div><!--/.testimonial-img-->
							<div class="testimonial-person">
								<h2>Tom Leakar</h2>
								<h4>london, UK</h4>
								<div class="testimonial-person-star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div><!--/.testimonial-person-->
						</div><!--/.testimonial-info-->
						<div class="testimonial-comment">
							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis eaque.
							</p>
						</div><!--/.testimonial-comment-->
					</div><!--/.testimonial-description-->
				</div><!--/.single-testimonial-box-->
			</div>
		</div>

	</section><!--/.reviews-->
	<!--reviews end -->

	<!-- statistics strat -->
	<section id="statistics" class="statistics">
		<div class="container">
			<div class="statistics-counter">
				<div class="col-md-3 col-sm-6">
					<div class="single-ststistics-box">
						<div class="statistics-content">
							<div class="counter">90 </div> <span>K+</span>
						</div><!--/.statistics-content-->
						<h3>listings</h3>
					</div><!--/.single-ststistics-box-->
				</div><!--/.col-->
				<div class="col-md-3 col-sm-6">
					<div class="single-ststistics-box">
						<div class="statistics-content">
							<div class="counter">40</div> <span>k+</span>
						</div><!--/.statistics-content-->
						<h3>listing categories</h3>
					</div><!--/.single-ststistics-box-->
				</div><!--/.col-->
				<div class="col-md-3 col-sm-6">
					<div class="single-ststistics-box">
						<div class="statistics-content">
							<div class="counter">65</div> <span>k+</span>
						</div><!--/.statistics-content-->
						<h3>visitors</h3>
					</div><!--/.single-ststistics-box-->
				</div><!--/.col-->
				<div class="col-md-3 col-sm-6">
					<div class="single-ststistics-box">
						<div class="statistics-content">
							<div class="counter">50</div> <span>k+</span>
						</div><!--/.statistics-content-->
						<h3>happy clients</h3>
					</div><!--/.single-ststistics-box-->
				</div><!--/.col-->
			</div><!--/.statistics-counter-->
		</div><!--/.container-->

	</section><!--/.counter-->
	<!-- statistics end -->

	<!--blog start -->
	<section id="blog" class="blog">
		<div class="container">
			<div class="section-header">
				<h2>news and articles</h2>
				<p>Always upto date with our latest News and Articles </p>
			</div><!--/.section-header-->
			<div class="blog-content">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="single-blog-item">
							<div class="single-blog-item-img">
								<img src="assets/images/blog/b1.jpg" alt="blog image">
							</div>
							<div class="single-blog-item-txt">
								<h2><a href="#">How to find your Desired Place more quickly</a></h2>
								<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-blog-item">
							<div class="single-blog-item-img">
								<img src="assets/images/blog/b2.jpg" alt="blog image">
							</div>
							<div class="single-blog-item-txt">
								<h2><a href="#">which are the best known food in tunisa</a></h2>
								<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="single-blog-item">
							<div class="single-blog-item-img">
								<img src="assets/images/blog/b3.jpg" alt="blog image">
							</div>
							<div class="single-blog-item-txt">
								<h2><a href="#">What are the events you must attend</a></h2>
								<h4>posted <span>by</span> <a href="#">admin</a> march 2018</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur de adipisicing elit, sed do eiusmod tempore incididunt ut labore et dolore magna.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.container-->

	</section><!--/.blog-->
	<!--blog end -->

	<!--subscription strat -->
	<section id="contact" class="subscription d-flex align-items-center justify-content-center">
		<div class="container py-5">
			<div class="subscribe-title text-center mb-4">
				<h2 class="fw-bold text-primary">Envoyer une réclamation</h2>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-11" style="    padding-left: 120px;
">
					<form action="../../controller/controllerClient.php?action=insertion" method="post" class="bg-white p-4 rounded shadow" id="rec">
    <div class="row mb-4 align-items-center">
        <label for="titre" class="col-sm-4 col-form-label text-end text-muted">Titre :</label>
        <div class="col-sm-8">
            <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre de la réclamation" >
            <div id="titreER" class="form-text text-danger"></div>
        </div>
    </div>
    <div class="row mb-4 align-items-center">
        <label for="email" class="col-sm-4 col-form-label text-end text-muted">Email :</label>
        <div class="col-sm-8">
            <input type="email" id="email" name="email" class="form-control" placeholder="Votre adresse email" >
            <div id="emailER" class="form-text text-danger"></div>
        </div>
    </div>
    <div class="row mb-4 align-items-center">
        <label for="status" class="col-sm-4 col-form-label text-end text-muted">Statut :</label>
        <div class="col-sm-8">
            <textarea id="status" name="statut" class="form-control" placeholder="Votre statut" ></textarea>
            <div id="statutER" class="form-text text-danger"></div>
        </div>
    </div>
    <div class="row mb-4 align-items-center">
        <label for="type_reclamation" class="col-sm-4 col-form-label text-end text-muted">Type de réclamation :</label>
        <div class="col-sm-8">
            <select id="type_reclamation" name="type_reclamation" class="form-select" required>
                <option value="" disabled selected>Choisir un type</option>
                <option value="Réclamation">Réclamation</option>
                <option value="Suggestion">Suggestion</option>
                <option value="Compliment">Compliment</option>
            </select>
            <div id="typeReclamationER" class="form-text text-danger"></div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger w-50" onclick="validateForm()">Envoyer</button>
    </div>
</form>



				</div>
			</div>
		</div>
	</section>








	<footer id="footer" class="footer">
		<div class="container">
			<div class="footer-menu">
				<div class="row">
					<div class="col-sm-3">
						<div class="navbar-header">
							<a class="navbar-brand" href="index.html">Tunisian<span>Treasures</span></a>
						</div>
					</div>
					<div class="col-sm-9">
						<ul class="footer-menu-item">
							<li class="scroll"><a href="#works">how it works</a></li>
							<li class="scroll"><a href="#explore">Product</a></li>
							<li class="scroll"><a href="#reviews">review</a></li>
							<li class="scroll"><a href="#blog">blog</a></li>
							<li class="scroll"><a href="#contact">Feedback</a></li>
							<li class=" scroll"><a href="#home">home</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="hm-footer-copyright">
				<div class="row">
					<div class="col-sm-5">
						<p>
							&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
						</p>
					</div>
					<div class="col-sm-7">
						<div class="footer-social">
							<span><i class="fa fa-phone"> +1 (222) 777 8888</i></span>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="scroll-Top">
			<div class="return-to-top">
				<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
			</div>

		</div>

	</footer>
	<script src="./verif.js"></script>

	<script src="assets/js/jquery.js"></script>

	<!--modernizr.min.js-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

	<!--bootstrap.min.js-->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- bootsnav js -->
	<script src="assets/js/bootsnav.js"></script>

	<!--feather.min.js-->
	<script src="assets/js/feather.min.js"></script>

	<!-- counter js -->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>

	<!--slick.min.js-->
	<script src="assets/js/slick.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

	<!--Custom JS-->
	<script src="assets/js/custom.js"></script>

</body>

</html>