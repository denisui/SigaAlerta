<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- view social media -->
	<meta property='og:title' content="Sigalerta" />
	<meta property='og:description' content='' />
	<meta property='og:url' content="" />
	<meta property='og:image' content="" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Sigalerta' />

	<!-- Configurações para celular -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="GOOGLEBOT" content="index follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--title-->
	<title>Sigalerta</title>

	<?php $this->load->view('public/include/styles.php'); ?>

	<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url();  ?>assets/public/images/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/public/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body style="background: #fff;">
	<div class="error-page text-center" style="padding-top: 200px;">
		<div class="container">
			<div class="error-content">
			<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/logo.png" alt="" />
				<h1>Site em manutenção</h1>
				<p>Estamos em manutenção, retornaremos em instantes</p>				
			</div>
			<div class="copyright">
				<p>Sigalerta @ <?php echo date('Y'); ?></p>
			</div>
		</div>
	</div>

	<!--/#scripts-->
	<?php $this->load->view('public/include/scripts'); ?>

</body>
</html>