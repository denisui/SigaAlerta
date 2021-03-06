<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Unlimited Image">

	<!-- view social media -->
	<?php
		$c = new ArrayIterator($new);
		while ($c->valid()):
	?>
	<meta property='og:title' content="<?php echo $c->current()->col_title; ?>" />
	<meta property='og:description' content='' />
	<meta property='og:url' content="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>" />
	<meta property='og:image' content="<?php echo base_url(); ?>assets/public/images/columnists/<?php echo $c->current()->col_img; ?>" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Sigalerta | O portal de notícias nº 1' />
	
	<!-- Configurações para celular -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="GOOGLEBOT" content="index follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--title-->
	<title>Sigalerta .: Coluna | Eduardo | <?php echo $c->current()->col_title; ?> :.</title>

	<?php
	$c->next();
	endwhile;
	?>

	<?php $this->load->view('public/include/styles.php'); ?>
	<link href="<?php echo base_url(); ?>assets/public/css/parallax-background.css"
	 rel="stylesheet">

	<!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="<?php echo base_url();  ?>assets/public/images/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/public/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();  ?>assets/public/images/ico/apple-touch-icon-57-precomposed.png">
	<!-- SHARE THIS -->
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5b733a7d339acb0011591237&product=inline-share-buttons' async='async'></script>
</head>
<!--/head-->

<body>

	<div id="main-wrapper" class="homepage">

		<?php $this->load->view('public/include/menu.php'); ?>
                
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="widget" style="margin-bottom: 0;">
						<div class="add">
							<a href="#">
								<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/public/images/post/add/add2.jpg" alt="" />
							</a>
						</div>
					</div>
					<!--/#widget-->
				</div>
			</div>
			<div class="section section-custom">
				<div class="row">				
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="row">							
								<div class="col-sm-12">
									<div class="left-content">
										<div class="details-cols">
											<div class="post">
												<?php
                                                $c = new ArrayIterator($new);
                                                while ($c->valid()):
                                                ?>
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/public/images/columnists/<?php echo $c->current()->col_img; ?>" alt="" />
													</div>
												</div>
												<div class="post-content">												
													<div class="entry-meta">
														<ul class="list-inline">
															<li class="posted-by">
																<i class="fa fa-user"></i> Publicado por
																<a href="#">Eduardo</a>
															</li>
															<li class="publish-date">																
																<i class="fa fa-calendar"></i>
																<?php 
                                                                    $date = explode('-', $c->current()->col_date_time);
                                                                    echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                                ?>
															</li>
														</ul>
													</div>
													<h2 class="entry-title">
														<?php echo $c->current()->col_title; ?>
													</h2>	
													<div class="entry-content">
														
														<?php echo $c->current()->col_description; ?>

														<div class="sharethis-inline-share-buttons"></div>
													</div>													
												</div>
												<?php 
                                                    $c->next();
                                                endwhile;
                                                ?>		
											</div>
											<!--/post-->
										</div>
										<!--/.section-->
									</div>
									<!--/.left-content-->
									
									<!--Old cols-->
									<div class="section gap-50">
										<h1 class="section-title">Veja Também</h1>
										<div class="row">
											<?php	
                                                if (empty($older_news)) :
                                            ?>
											<h4 class="text-center">Nenhuma notícia encontrada</h4>
											<?php
                                                else:
                                                $c = new ArrayIterator($older_news);
                                                while ($c->valid()):
                                            ?>
											<div class="col-sm-4" data-mh="group-name">
												<div class="post medium-post">
													<div class="entry-header">
														<div class="entry-thumbnail">
															<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>">
																<img class="img-responsive h-150" src="<?php echo base_url(); ?>assets/public/images/columnists/<?php echo $c->current()->col_img; ?>" alt="" />
															</a>
														</div>
													</div>
													<div class="post-content">
														<div class="entry-meta">
															<ul class="list-inline">
																<li class="publish-date">
																	<i class="fa fa-calendar"></i>
																	<?php 
                                                                        $date = explode('-', $c->current()->col_date_time);
                                                                        echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                                    ?>
																</li>																
															</ul>
														</div>
														<h2 class="entry-title">
															<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>"><?php echo $c->current()->col_title ?></a>
														</h2>
													</div>
												</div>
												<!--/post-->
											</div>
											<?php 
                                                $c->next();
                                                 endwhile;
                                                endif;
                                            ?>											
										</div>
									</div>
									<!--/.old cols -->
								</div>
							</div>
							<!--/.row -->
						</div>
						<!--/.site-content -->
					</div>
					<!--/.col-sm-9 -->

					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget">
								<div class="add">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add6.jpg"
										 alt="" />
									</a>
								</div>
							</div>
							<!--/#widget-->

							<div class="widget weather-widget">
								<div id="weather-widget"></div>
							</div>
							<!--/#widget-->

						</div>
						<!--/#sitebar-->
					</div>

				</div>
			</div>
			<!--/.section-->
		</div>
		<!--/.container-->
		
		<?php $this->load->view("public/include/pre-footer"); ?>
	</div>
	<!--/#main-wrapper-->

	<?php $this->load->view("public/include/footer"); ?>

	<!--/#scripts-->
	<?php $this->load->view('public/include/scripts'); ?>
	<script src="<?php echo base_url(); ?>assets/public/js/parallax-background.min.js"></script>
	<script>
	(function ($) {
		$('.parallax').parallaxBackground();
	})(jQuery);
</script>

</body>

</html>