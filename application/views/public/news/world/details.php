<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Unlimited Image">

	<!-- view social media -->
	<?php
	$n = new ArrayIterator($new);
	while ($n->valid()):
	?>
	<meta property='og:title' content="<?php echo $n->current()->new_title; ?>" />
	<meta property='og:description' content='' />
	<meta property='og:url' content="<?php echo base_url(); ?>news/world/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>" />
	<meta property='og:image' content="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>" />
	<meta property="og:image:width" content="800">
	<meta property="og:image:height" content="600">
	<meta property='og:type' content='website' />
	<meta property='og:site_name' content='Sigalerta | O portal de notícias nº 1' />
	
	<!-- Configurações para celular -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="GOOGLEBOT" content="index follow" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--title-->
	<title>Sigalerta .: Notícias | Mundo | <?php echo $n->current()->new_title; ?> :.</title>

	<?php
	$n->next();
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

		<?php $this->load->view('public/include/menu.php');
                
        $n = new ArrayIterator($new);
            while ($n->valid()):
        ?>	
		<div class="full-height parallax vertical-align" data-parallax-bg-image="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
		 data-parallax-speed="0.8" data-parallax-direction="up" data-parallax-parallaxBgRepeat="no-repeat" data-parallax-parallaxBgSize="cover">
			<div class="container">
				<div class="row">					
					<div class="col-sm-12">
						<div class="details-news">
							<div class="entry-title entry-title-custom">								
								<h2 class="title">
									<?php echo $n->current()->new_title; ?>
								</h2>
								<div class="entry-meta">
									<ul class="list-inline">
										<li class="f-size-16 f-c-white">Mundo</li>
										<li>|</li>										
										<li class="publish-date f-size-16 f-c-white">
											<i class="fa fa-calendar"></i>
											<?php 
                                                $date = explode('-', $n->current()->new_date_time);
                                                echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                            ?>
										</li>										
									</ul>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		<?php
                $n->next();
            endwhile;
        ?>
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
			<div class="section section-custom">
				<div class="row">				
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="row">							
								<div class="col-sm-12">
									<div class="left-content">
										<div class="details-news">
											<div class="post">
												<?php
                                                $n = new ArrayIterator($new);
                                                while ($n->valid()):
                                                ?>
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive center-block" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>" alt="" />
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
                                                                    $date = explode('-', $n->current()->new_date_time);
                                                                    echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                                ?>
															</li>
														</ul>
													</div>
													<div class="entry-content">
														<?php echo $n->current()->new_description; ?>

														<div class="sharethis-inline-share-buttons"></div>
													</div>													
												</div>
												<?php 
                                                    $n->next();
                                                endwhile;
                                                ?>		
											</div>
											<!--/post-->
										</div>
										<!--/.section-->
									</div>
									<!--/.left-content-->

									<!--Commnets-->
									<div class="comments-box gap-50">
										<h1 class="section-title title">Deixe o seu comentário</h1>
										<div id="disqus_thread"></div>
										<script>
											/**
											 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
											 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
											/*
											var disqus_config = function () {
											this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
											this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
											};
											*/
											(function() { // DON'T EDIT BELOW THIS LINE
												var d = document,
													s = d.createElement('script');
												s.src = 'https://sigalerta.disqus.com/embed.js';
												s.setAttribute('data-timestamp', +new Date());
												(d.head || d.body).appendChild(s);
											})();
										</script>
										<noscript>Please enable JavaScript to view the
											<a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
										</noscript>
									</div>
									<!--/.Commnets-->

									<!--Old News-->
									<div class="section gap-50">
										<h1 class="section-title">Veja Também</h1>
										<div class="row">
											<?php	
                                                if (empty($older_news)) :
                                            ?>
											<h4 class="text-center">Nenhuma notícia encontrada</h4>
											<?php
                                                else:
                                                $n = new ArrayIterator($older_news);
                                                while ($n->valid()):
                                            ?>
											<div class="col-sm-4" data-mh="group-name">
												<div class="post medium-post">
													<div class="entry-header">
														<div class="entry-thumbnail">
														<a href="<?php echo base_url(); ?>news/local/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>"><img class="img-responsive h-150" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>" alt="" /></a>
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
														<a href="<?php echo base_url(); ?>news/local/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>"><?php echo $n->current()->new_title ?></a>
														</h2>
													</div>
												</div>
												<!--/post-->
											</div>
											<?php 
                                                $n->next();
                                                 endwhile;
                                                endif;
                                            ?>											
										</div>
									</div>
									<!--/.old News -->
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
	<script src="<?php echo base_url(); ?>assets/public/js/parallax-background.min.js"></script>
	<script>
	(function ($) {
		$('.parallax').parallaxBackground();
	})(jQuery);
</script>

</body>

</html>