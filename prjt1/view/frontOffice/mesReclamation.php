<?php
include '../../config_connexion.php';
include '../../controller/controllerClient.php';
$reclamations = afficherMesReclamation(id_Client: 0);
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
	<style>
		.styled-table {
			width: 90%;
			margin: 0 auto;
			border-collapse: collapse;


		}

		h2 {
			text-align: center;
			padding-top: 2%;
			padding-bottom: 2%;
			font-size: 1.3em;
		}

		.styled-table th,
		.styled-table td {
			padding: 12px 15px;
			text-align: left;
		}

		.styled-table th {
			background-color: #ff545a;
			color: white;
		}

		.styled-table tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.styled-table tr:hover {
			background-color: #ddd;
		}

		.styled-table td {
			border: 1px solid #ddd;
		}
	</style>
</section>
<h2> Liste des réclamations </h2>
<table class="styled-table" border="1" cellspacing="0" cellpadding="10" align="center">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Email</th>
			<th>Status</th>
			<th>Type de réclamation</th>
			<th>Date de création</th>
			<th style="text-align:center">Actions</th>



		</tr>
	</thead>

	<tbody>
		<?php foreach ($reclamations as $reclamation): ?>
			<tr>
				<td><?= $reclamation['titre'] ?></td>
				<td><?= $reclamation['email'] ?></td>
				<td><?= $reclamation['statut'] ?></td>
				<td><?= $reclamation['type_reclamation'] ?></td>
				<td><?= $reclamation['date_creation'] ?></td>

				<td>
					<a class="btn btn-danger" data-toggle="modal" data-target="#deleteReclamation"> <i class="fa fa-trash"></i> Supprimer</a>

					<a type="button" class="btn btn-success" data-toggle="modal" data-target="#editReclamation">
						<i class="fa fa-edit"></i> Modifier
					</a>
				</td>

			</tr>

	</tbody>





















	<div class="modal fade" id="deleteReclamation" tabindex="-1" role="dialog" aria-labelledby="deleteReclamation" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteReclamation">Confirmation de suppression</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../../controller/controllerClient.php?action=delete" method="POST" id="editProfileForm">

						<div class="modal-body">
							Êtes-vous sûr de vouloir supprimer cette réclamation ?
						</div>
						<div class="modal-footer">
							<input type="hidden" name="ID_REC" value="<?= $reclamation['ID_REC'] ?>" id="ID_REC">

							<button type="button" class="btn btn-secondary" style="background-color: rgb(71, 71, 74); border: none;" data-dismiss="modal">Annuler</button>
							<button type="submit" class="btn btn-primary" style="background-color: #DDAC3E; border: none;">Supprimer</button>
						</div>
					</form>





				</div>
			</div>
		</div>
	</div>





























	<!-- Formulaire de modification -->
	<div class="modal fade" id="editReclamation" tabindex="-1" role="dialog" aria-labelledby="editReclamation" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editReclamation">Modifier les informations de reclamations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../../controller/controllerClient.php?action=update" method="POST" id="editProfileForm">
						<div class="form-group">
							<label for="titre">titre :</label>
							<input type="text" class="form-control" id="titre" name="titre" value="<?php echo $reclamation['titre']; ?>">
						</div>
						<div class="form-group">
							<label for="email">email :</label>
							<input type="email" class="form-control" id="email" name="email" value="<?php echo $reclamation['email']; ?>">
						</div>
						<div class="form-group" d>
							<label for="status">Status :</label>
							<input type="text" class="form-control" id="statut" name="statut" value="<?php echo $reclamation['statut']; ?>">
						</div>
						<label for="type_reclamation">Type of Reclamation</label>
						<select id="type_reclamation" name="type_reclamation" required class="form-control">
							<option value="complaint" <?php echo ($reclamation['type_reclamation'] === 'complaint') ? 'selected' : ''; ?>>Complaint</option>
							<option value="suggestion" <?php echo ($reclamation['type_reclamation'] === 'suggestion') ? 'selected' : ''; ?>>Suggestion</option>
							<option value="compliment" <?php echo ($reclamation['type_reclamation'] === 'compliment') ? 'selected' : ''; ?>>Compliment</option>
						</select>
						<input type="hidden" name="ID_REC" value="<?= $reclamation['ID_REC'] ?>" id="ID_REC">


						<button type="button" class="btn btn-secondary" style="background-color: rgb(71, 71, 74); border: none;" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-primary" style="background-color: #DDAC3E; border: none;">Modifier</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	</section>


<?php endforeach; ?>
</table>

<!--footer start-->
<footer id="footer" class="footer">
	<div class="container">
		<div class="hm-footer-copyright">
			<div class="row">
				<div class="col-sm-5">
					<p>
						&copy;copyright. designed and developed by <a href="https://www.themesine.com/">themesine</a>
					</p><!--/p-->
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

		</div><!--/.hm-footer-copyright-->
	</div><!--/.container-->

	<div id="scroll-Top">
		<div class="return-to-top">
			<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
		</div>

	</div><!--/.scroll-Top-->

</footer><!--/.footer-->
<!--footer end-->


<!-- Include all js compiled plugins (below), or include individual files as needed -->

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