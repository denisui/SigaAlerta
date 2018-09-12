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
	<meta property='og:url' content="<?php echo base_url(); ?>columnists/eduardo" />
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
	<title>Sigalerta .: Coluna | Eduardo :.</title>

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
			<div class="page-breadcrumbs">
				<h1 class="section-title">Siga com Eduardo</h1>		
				<div class="world-nav cat-menu">         
					<ul class="list-inline">                       
						<li class="active"><a href="#">Colunista</a></li>
					</ul> 					
				</div>			
			</div>

			<div class="section">
				<div class="row">
					<div class="col-sm-9">						
						<div id="site-content" class="site-content">							
							<div class="section listing-news">
								<?php 
								if (empty($news)) :								
								?>
									<h4 class="text-center">Nenhuma notícia encontrada</h4>
								<?php
								else :
									$c = new ArrayIterator($news);
									while ($c->valid()):
								?>
								<div class="post">
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id_columnists; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>">
												<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/columnists/<?php echo $c->current()->col_img; ?>" alt="<?php echo $c->current()->col_title; ?>" />
											</a>
										</div>
									</div>
									<div class="post-content">								
										<div class="entry-meta">
											<ul class="list-inline">
												<li class="publish-date"><i class="fa fa-clock-o"></i> 
												<?php 
													$date = explode('-', $c->current()->col_date_time);
													echo $date[1]. ' / '. $date[2] .' / '.$date[0];
												?>
												</li>
											</ul>
										</div>
										<h2 class="entry-title">
											<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id_columnists; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>">
												<?php echo $c->current()->col_title; ?>
											</a>
										</h2>
										<div class="entry-content">
											<?php echo $c->current()->col_description; ?>
										</div>
									</div>
								</div><!--/post--> 		
								<?php
									$c->next();
									endwhile;
								endif;
								?>						
							</div>
						</div><!--/#site-content-->						
						
						<div class="pagination-wrapper">						
							<?php 
                                if (!empty($news)) {
                                    echo $pagination;
                                }
							?>
						</div>
					</div><!--/.col-sm-9 -->	
					
					<div id="sticky" class="col-sm-3">
						<div id="sitebar">
							<div class="widget">
								<div class="add featured-add">
									<a href="#"><img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add1.jpg" alt="" /></a>
								</div>
							</div><!--/#widget-->
							
							<?php $this->load->view('public/include/widget/social-media'); ?>	
						</div><!--/#sitebar-->
					</div>
				</div>				
			</div><!--/.section-->
		</div><!--/.container-->
		<?php $this->load->view("public/include/pre-footer"); ?>
	</div><!--/#main-wrapper--> 

	<?php $this->load->view("public/include/footer"); ?>

	<!--/#scripts-->
	<?php $this->load->view('public/include/scripts'); ?>		
</body>

</html>