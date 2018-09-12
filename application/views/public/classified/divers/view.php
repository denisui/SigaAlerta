<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- view social media -->
	<meta property='og:title' content="Sigalerta | O portal nº 1 em notícias" />
	<meta property='og:description' content='' />
	<meta property='og:url' content="<?php echo base_url(); ?>classified/divers" />
	<meta property='og:image' content="<?php echo base_url(); ?>assets/public/images/screen.jpg" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Sigalerta' />

	<!-- Configurações para celular -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="GOOGLEBOT" content="index follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--title-->
	<title>Sigalerta .: Classificados | Diversos :.</title>

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

<body>
	<div id="main-wrapper" class="homepage">

		<?php $this->load->view('public/include/menu.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="widget" style="margin-bottom: 0;">
						<?php 
						if (empty($adsW1140H87)) :
						?>
						<div class="add">
							<img class="img-responsive" src="https://via.placeholder.com/1140x87" alt="">
						</div>
						<?php
							else:
								$ads = new ArrayIterator($adsW1140H87);
								while ($ads->valid()) :
									$today = date("Y-m-d");
									$dateFinish = $ads->current()->ads_date_finish;
									if (($dateFinish <= $today) || ($dateFinish === '0000-00-00')) :
								?>
								<div class="add">
									<a href="#">
										<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/public/images/advertising/<?php echo $ads->current()->ads_img; ?>" width="1140" height="87" alt="<?php echo $ads->current()->ads_title; ?>" />
									</a>
								</div>
								<?php
									else :
								?>
								<div class="add">
									<img class="img-responsive" src="https://via.placeholder.com/1140x87" alt="">
								</div>
								<?php
									endif;
									$ads->next();
								endwhile;
							endif;
						?>			
					</div>
					<!--/#widget-->
				</div>
			</div>
			<div class="page-breadcrumbs page-breadcrumbs-custom">
				<h1 class="section-title">Classificados</h1>
				<div class="world-nav cat-menu">
					<ul class="list-inline">
						<li class="active">
							<a href="#">Diversos</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="section  section-custom">
				<div class="row">
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="row">
								<?php 
                            if (empty($data)) :
                            ?>
								<h4 class="text-center">Nenhuma registro encontrado</h4>
							<?php
                                else :
                                $d = new ArrayIterator($data);
                                while ($d->valid()):
                            ?>
								<!-- col-sm-4 -->
								<div class="col-sm-4" data-mh="group-name">
									<div class="post medium-post">
										<div class="entry-header">
											<div class="entry-thumbnail">
												<a href="<?php echo base_url(); ?>classified/divers/details/<?php echo $d->current()->id; ?>/<?php echo $this->general->normalizeURL($d->current()->cla_name); ?>">
													<img class="img-responsive h-150" src="<?php echo base_url(); ?>assets/public/images/classified/<?php echo $d->current()->cla_img ?>" alt="" />
												</a>
											</div>
										</div>
										<div class="post-content">
											<div class="entry-meta">
												<ul class="list-inline">
													<li class="publish-date">
														<i class="fa fa-calendar"></i>
														<?php
                                                            $date = explode('-', $d->current()->cla_date_publish);
                                                            echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                        ?>
													</li>
													<li>-</li>
													<li><?php echo $d->current()->cla_subcategory; ?></li>
												</ul>
											</div>
											<h2 class="entry-title">
												<a href="<?php echo base_url(); ?>classified/divers/details/<?php echo $d->current()->id; ?>/<?php echo $this->general->normalizeURL($d->current()->cla_name); ?>"><?php echo $d->current()->cla_name; ?></a>
											</h2>
										</div>
									</div>
									<!--/post-->
								</div>
								<!-- /.col-sm-4 -->
								<?php
                                $d->next();
                                endwhile;
                            endif;
                            ?>
							</div>
							<!--/.section -->
						</div>
						<!--/#site-content-->						

						<div class="pagination-wrapper">
							<?php 
                                if (!empty($data)) {
                                    echo $pagination;
                                }
                            ?>
						</div>
					</div>
					<!--/.col-sm-9 -->

					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget">
								<?php 
								if (empty($adsW263H293)) :
								?>
								<div class="add">
									<img class="img-responsive" src="https://via.placeholder.com/263x293" alt="">
								</div>
								<?php
									else:
										$ads = new ArrayIterator($adsW263H293);
										while ($ads->valid()) :
											$today = date("Y-m-d");
											$dateFinish = $ads->current()->ads_date_finish;
											if (($dateFinish <= $today) || ($dateFinish === '0000-00-00')) :
										?>
										<div class="add">
											<a href="#">
												<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/public/images/advertising/<?php echo $ads->current()->ads_img; ?>" width="263" height="293" alt="<?php echo $ads->current()->ads_title; ?>" />
											</a>
										</div>
										<?php
											else :
										?>
										<div class="add">
											<img class="img-responsive" src="https://via.placeholder.com/263x293" alt="">
										</div>
										<?php
											endif;
											$ads->next();
										endwhile;
									endif;
								?>	
							</div>
							<!--/#widget-->

							<?php $this->load->view('public/include/widget/sidebar-colums-eduardo'); ?>

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
</body>

</html>