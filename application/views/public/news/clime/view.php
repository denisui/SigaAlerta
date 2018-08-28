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
	<title>Sigalerta .: Notícicas | Clima :.</title>

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
						<div class="add">
							<a href="#">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add2.jpg"
								 alt="" />
							</a>
						</div>
					</div>
					<!--/#widget-->
				</div>
			</div>
			<div class="page-breadcrumbs page-breadcrumbs-custom">
				<h1 class="section-title">Notícias</h1>
				<div class="world-nav cat-menu">
					<ul class="list-inline">
						<li class="active">
							<a href="#">Clima</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="section  section-custom">
				<div class="row">
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="row">
								<div class="col-md-12">
									<!--<a class="weatherwidget-io" href="https://forecast7.com/pt/42d36n71d06/boston/" data-label_1="Boston" data-label_2="WEATHER" data-theme="original" >Boston WEATHER</a>
									<script>
									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
									</script>
									<div class="widget weather-widget">
										<div id="weather-widget"></div>
									</div>
									/#widget-->
									<!--Accuweather-->
									<a href="https://www.accuweather.com/en/us/new-york-ny/10007/weather-forecast/349727" class="aw-widget-legal">
										<!-- By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.-->
									</a>
									<div id="awtd1535474903200" class="aw-widget-36hour"  data-locationkey="" data-unit="c" data-language="pt-pt" data-useip="true" data-uid="awtd1535474903200" data-editlocation="true"></div>
									<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
								</div>

								<div class="col-sm-12 gap-30">
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/google-add.jpg" alt="" style="width: 100%;" />
								</div>

								<?php 
                                if (empty($news)) :
                                ?>
								<h4 class="text-center">Nenhuma notícia encontrada</h4>
								<?php
                                    else :
                                    $n = new ArrayIterator($news);
                                    while ($n->valid()):
                                ?>
								<!-- col-sm-4 -->
								<div class="col-sm-4" data-mh="group-name">
									<div class="post medium-post">
										<div class="entry-header">
											<div class="entry-thumbnail">
												<a href="<?php echo base_url(); ?>news/clime/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
													<img class="img-responsive h-150" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
													 alt="" />
												</a>
											</div>
										</div>
										<div class="post-content">
											<div class="entry-meta">
												<ul class="list-inline">
													<li class="publish-date">
														<i class="fa fa-calendar"></i>
														<?php
                                                            $date = explode('-', $n->current()->new_date_time);
                                                            echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                        ?>
													</li>
												</ul>
											</div>
											<h2 class="entry-title">
												<a href="<?php echo base_url(); ?>news/clime/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
													<?php echo $n->current()->new_title ?>
												</a>
											</h2>
										</div>
									</div>
									<!--/post-->
								</div>
								<!-- /.col-sm-4 -->
								<?php
                                $n->next();
                                endwhile;
                            endif;
                            ?>
							</div>
							<!--/.section -->
						</div>
						<!--/#site-content-->



						<div class="pagination-wrapper">
							<?php 
                                if (!empty($news)) {
                                    echo $pagination;
                                }
                            ?>
						</div>
					</div>
					<!--/.col-sm-9 -->

					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget follow-us">
								<h1 class="section-title title">Mídias Sociais</h1>
								<ul class="list-inline social-icons">
									<li>
										<a href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-google-plus"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-linkedin"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-youtube"></i>
										</a>
									</li>
								</ul>
							</div>
							<!--/#widget-->

							<div class="widget">
								<div class="add">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add3.jpg"
										 alt="" />
									</a>
								</div>
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