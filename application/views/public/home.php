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

<body>
	<div id="main-wrapper" class="homepage">

		<?php $this->load->view('public/include/menu.php'); ?>

		<div class="container">
			<div class="row">
				<!-- Slideshow -->
				<div id="home-slider">
					<?php
                    if (empty($sliNews)):
                        //
                    else :
                        $n = new ArrayIterator($sliNews);
                        while ($n->valid()):
                    ?>
					<div class="col-sm-12">
						<div class="col-sm-6 box-title-news">
							<h2 class="entry-title">
								<a href="<?php echo base_url(); ?>news/local/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>"
								 style="font-size: 40px;">
									<p class="title-news">
										<?php echo $n->current()->new_title; ?>
									</p>
									<p class="subtitle-news">
										<?php echo $n->current()->new_subtitle; ?>
									</p>
								</a>
							</h2>
						</div>
						<div class="col-sm-6">
							<div class="post feature-post">
								<div class="entry-header">
									<div class="entry-thumbnail">
										<a href="<?php echo base_url(); ?>news/local/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
											<img src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
											 class="h-350" alt="<?php echo $n->current()->new_title; ?>" />
										</a>
									</div>
									<!--<div class="catagory politics">
									<a href="#">Local</a>
								</div>-->
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

								</div>
							</div>
							<!--/post-->
						</div>
					</div>
					<?php
                    $n->next();
                        endwhile;
                    endif
                    ?>
				</div>
				<!-- Slideshow -->
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title"></div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="section">
				<div class="row">
					<!--<div class="site-content col-sm-8">
						<div class="post feature-post">
							<div class="entry-header">
								<div class="entry-thumbnail">
									<div id="map"></div>
								</div>
								<div class="catagory world">
									<a href="#">Trânsito agora</a>
								</div>
							</div>
						</div>
					</div>-->
					<div class="site-content col-md-9">
						<div class="row">
							<?php 
                                if (empty($newsEua)) :
                                    //
                                else :
                                $n = new ArrayIterator($newsEua);
                                while ($n->valid()):
                            ?>
							<div class="col-sm-8">
								<div class="post feature-post">
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>news/eua/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<img class="h-347" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
												 alt="<?php echo $n->current()->new_title; ?>" />
											</a>
										</div>
										<div class="catagory technology">
											<span>
												<a href="<?php echo base_url(); ?>news/eua/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">Estados
													Unidos</a>
											</span>
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
											<a href="<?php echo base_url(); ?>news/eua/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<?php echo $n->current()->new_title; ?>
											</a>
										</h2>
									</div>
								</div>
								<!--/post-->
							</div>
							<?php
                                $n->next();
                                endwhile;
                            endif
                            ?>
							<div class="col-sm-4">
								<div class="post feature-post">
									<?php
                                     if (empty($newHealth)):
                                        //
                                    else :
                                        $n = new ArrayIterator($newHealth);
                                        while ($n->valid()):
                                    ?>
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<img class="h-347" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
												 alt="<?php echo $n->current()->new_title; ?>" />
											</a>
										</div>
										<div class="catagory health">
											<span>
												<a href="#">Saúde</a>
											</span>
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
											<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<?php echo $n->current()->new_title; ?>
											</a>
										</h2>
									</div>
									<?php
                                        $n->next();
                                        endwhile;
                                    endif
                                       ?>
								</div>
								<!--/post-->
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="post feature-post">
									<?php
                                     if (empty($newsClime)):
                                        //
                                    else :
                                        $n = new ArrayIterator($newsClime);
                                        while ($n->valid()):
                                    ?>
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>news/clime/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<img class="h-219" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
												 alt="<?php echo $n->current()->new_title; ?>" />
											</a>
										</div>
										<div class="catagory home">
											<span>
												<a href="#">Clima</a>
											</span>
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
												<?php echo $n->current()->new_title; ?>
											</a>
										</h2>
									</div>
									<?php
                                        $n->next();
                                        endwhile;
                                    endif
                                       ?>
								</div>
								<!--/post-->
							</div>
							<div class="col-sm-4">
								<div class="post feature-post">
									<?php
                                     if (empty($newsEnter)):
                                        //
                                    else :
                                        $n = new ArrayIterator($newsEnter);
                                        while ($n->valid()):
                                    ?>
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>news/entertainment/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<img class="h-219" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
												 alt="<?php echo $n->current()->new_title; ?>" />
											</a>
										</div>
										<div class="catagory entertainment">
											<a href="#">Entretenimento</a>
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
											<a href="<?php echo base_url(); ?>news/entertainment/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<?php echo $n->current()->new_title; ?>
											</a>
										</h2>
									</div>
									<?php
                                        $n->next();
                                        endwhile;
                                    endif
                                       ?>
								</div>
								<!--/post-->
							</div>
							<div class="col-sm-4">
								<div class="post feature-post">
									<?php
                                     if (empty($newsPolitics)):
                                        //
                                    else :
                                        $n = new ArrayIterator($newsPolitics);
                                        while ($n->valid()):
                                    ?>
									<div class="entry-header">
										<div class="entry-thumbnail">
											<a href="<?php echo base_url(); ?>news/policy/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<img class="h-219" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img ?>"
												 alt="<?php echo $n->current()->new_title; ?>" />
											</a>
										</div>
										<div class="catagory politics">
											<span>
												<a href="#">Política</a>
											</span>
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
											<a href="<?php echo base_url(); ?>news/policy/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
												<?php echo $n->current()->new_title; ?>
											</a>
										</h2>
									</div>
									<?php
                                        $n->next();
                                        endwhile;
                                    endif
                                       ?>
								</div>
								<!--/post-->
							</div>
						</div>
					</div>
					<!--/#content-->

					<div class="col-md-3 visible-md visible-lg">
						<div class="add featured-add">
							<a href="#">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add1.jpg"
								 alt="" />
							</a>
						</div>
					</div>
					<!--/#add-->
				</div>
			</div>
			<!--/.section-->

			<div class="section add inner-add">
				<a href="#">
					<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add2.jpg"
					 alt="" />
				</a>
			</div>
			<!--/.section-->

			<div class="section">
				<div class="latest-news-wrapper">
					<h1 class="section-title">Classificados</h1>
					<div id="latest-news">
						<?php
                            if (empty($classifiedRandon)):
                        ?>
						<h4 class="text-center">Em Breve...</h4>
						<?php
                            else :
                            $c = new ArrayIterator($classifiedRandon);
                            while ($c->valid()):
                        ?>
						<!-- col-sm-4 -->
						<div class="col-sm-12">
							<div class="post medium-post" data-mh="group-name">
								<div class="entry-header">
									<div class="entry-thumbnail">
										<a href="<?php echo base_url(); ?>classified/<?php echo $c->current()->cla_category; ?>/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->cla_name); ?>">
											<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/classified/<?php echo $c->current()->cla_img ?>"
											 alt="" style="width: 100%; height: 150px" />
										</a>
									</div>
								</div>
								<div class="post-content">
									<div class="entry-meta">
										<ul class="list-inline">
											<li class="publish-date">
												<i class="fa fa-calendar"></i>
												<?php
                                                            $date = explode('-', $c->current()->cla_date_publish);
                                                            echo $date[1]. ' / '. $date[2] .' / '.$date[0];
                                                        ?>
											</li>
											<li>-</li>
											<li>
												<?php echo $c->current()->cla_subcategory; ?>
											</li>
										</ul>
									</div>
									<h2 class="entry-title">
										<a href="<?php echo base_url(); ?>classified/<?php echo $c->current()->cla_category; ?>/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->cla_name); ?>">
											<?php echo $c->current()->cla_name; ?>
										</a>
									</h2>
								</div>
							</div>
							<!--/post-->
						</div>
						<!-- /.col-sm-4 -->
						<!--/post-->
						<?php
                            $c->next();
                            endwhile;
                        endif
                        ?>
					</div>
				</div>
				<!--/.latest-news-wrapper-->
			</div>
			<!--/.section-->

			<div class="section">
				<div class="row">
					<div class="col-md-9 col-sm-8">
						<div id="site-content">
							<div class="row">
								<div class="col-md-8 col-sm-6">
									<div class="left-content">
										<div class="section world-news">
											<h1 class="section-title title">Mundo</h1>
											<div class="world-nav cat-menu">
												<ul class="list-inline">
													<li class="active">
														<a href="<?php echo base_url(); ?>news/world">Ver Todos</a>
													</li>
												</ul>
											</div>
											<div class="post">
												<?php
                                                if (empty($newsWorld)):
                                                    //
                                                else :
                                                    $n = new ArrayIterator($newsWorld);
                                                    while ($n->valid()):
                                                ?>
												<div class="entry-header">
													<div class="entry-thumbnail">
														<a href="<?php echo base_url(); ?>news/world/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
															<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
															 alt="<?php echo $n->current()->new_title; ?>" style="width: 555px; height: 317px;" />
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
														<a href="<?php echo base_url(); ?>news/world/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
															<?php echo $n->current()->new_title; ?>
														</a>
													</h2>
													<div class="entry-content">
														<p>
															<?php echo mb_strimwidth($n->current()->new_description, 0, 150, "..."); ?>
														</p>
													</div>
												</div>
												<?php
                                                    $n->next();
                                                    endwhile;
                                                endif
                                                ?>
												<div class="list-post">
													<ul>
														<?php
                                                    if (empty($newsWorld2)):
                                                        //
                                                    else :
                                                        $n = new ArrayIterator($newsWorld2);
                                                        while ($n->valid()):
                                                    ?>
														<li>
															<a href="<?php echo base_url(); ?>news/world/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
																<?php echo $n->current()->new_title; ?>
																<i class="fa fa-angle-right"></i>
															</a>
														</li>
														<?php
                                                        $n->next();
                                                        endwhile;
                                                    endif
                                                    ?>
													</ul>
												</div>
												<!--/list-post-->
											</div>
											<!--/post-->
										</div>
										<!--/.section-->

										<div class="section technology-news">
											<h1 class="section-title">Tecnologia</h1>
											<div class="cat-menu">
												<a href="<?php echo base_url(); ?>news/technology">Ver Todos</a>
											</div>
											<div class="row">
												<?php
                                                    if (empty($lastNewsTec)):
                                                        //
                                                    else :
                                                        $n = new ArrayIterator($lastNewsTec);
                                                        while ($n->valid()):
                                                ?>
												<div class="col-md-8 col-sm-12" data-mh="group-name">
													<div class="post">
														<div class="entry-header">
															<div class="entry-thumbnail">
																<a href="<?php echo base_url(); ?>news/technology/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
																	<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
																	 alt="<?php echo $n->current()->new_title; ?>" style="width: 360px; height: 202px;" />
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
																<a href="<?php echo base_url(); ?>news/technology/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
																	<?php echo $n->current()->new_title; ?>
																</a>
															</h2>
															<div class="entry-content">
																<p>
																	<?php echo mb_strimwidth($n->current()->new_description, 0, 150, "..."); ?>
																</p>
															</div>
														</div>
													</div>
													<!--/post-->
												</div>
												<?php
                                                    $n->next();
                                                    endwhile;
                                                endif
                                                ?>
												<?php
                                                    if (empty($lastNewsTec2)):
                                                        //
                                                    else :
                                                        $n = new ArrayIterator($lastNewsTec2);
                                                        while ($n->valid()):
                                                ?>
												<div class="col-md-4 col-sm-12">
													<div class="post small-post">
														<div class="entry-header">
															<div class="entry-thumbnail">
																<a href="<?php echo base_url(); ?>news/technology/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
																	<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
																	 alt="<?php echo $n->current()->new_title; ?>" style="width: 165px; height: 95px;" />
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
																<a href="<?php echo base_url(); ?>news/technology/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
																	<?php echo $n->current()->new_title; ?>
																</a>
															</h2>
														</div>
													</div>
													<!--/post-->
												</div>
												<?php
                                                    $n->next();
                                                    endwhile;
                                                endif
                                                ?>
											</div>
										</div>
										<!--/technology-news-->

										<div class="section add inner-add">
											<a href="#">
												<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add4.jpg"
												 alt="" />
											</a>
										</div>
										<!--/.section add-->


									</div>
									<!--/.left-content-->
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="middle-content">
										<div class="section sports-section">
											<h1 class="section-title title">Esporte</h1>
											<div class="cat-menu">
												<a href="<?php echo base_url(); ?>news/sport">Ver Todos</a>
											</div>
											<!--<iframe frameborder="0" scrolling="no" width="270" height="548" src="https://www.fctables.com/england/premier-league/iframe/?type=table&lang_id=12&country=5&template=10&team=&timezone=America/Sao_Paulo&time=24&po=1&ma=0&wi=0&dr=0&los=0&gf=0&ga=0&gd=0&pts=1&ng=0&form=0&width=320&height=700&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=1&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=3bafda&hfc=FFFFFF"></iframe>
											<div style="text-align:center;"></div>
											<a href="https://www.fctables.com/england/premier-league/" rel="nofollow">FcTables.com</a>-->
											<?php 
                                              if (empty($lastSport)) :
                                                //
                                              else :
                                                $n = new ArrayIterator($lastSport);
                                                while ($n->valid()) :
                                            ?>
											<div class="post medium-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<a href="<?php echo base_url(); ?>news/sport/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
															<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
															 alt="<?php echo $n->current()->new_title; ?>" style="width: 262px; height: 152px;" />
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
														<a href="<?php echo base_url(); ?>news/sport/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
															<?php echo $n->current()->new_title; ?>
														</a>
													</h2>
												</div>
											</div>
											<!--/post-->
											<?php 
                                                $n->next();
                                                endwhile;
                                            endif;
                                            ?>
										</div>
										<!--/.sports-section -->

										<div class="section">
											<div class="add inner-add">
												<a href="#">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add5.jpg"
													 alt="" />
												</a>
											</div>
										</div>

										<div class="section business-section">
											<h1 class="section-title">Para sua Casa</h1>
											<?php 
                                                if (empty($lastForHome)) :
                                                    //
                                                else :
                                                    $fh = new ArrayIterator($lastForHome);
                                                    while ($fh->valid()) :
                                            ?>
											<div class="post medium-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<a href="<?php echo base_url(); ?>forhome/garden/details/<?php echo $fh->current()->id; ?>/<?php echo $this->general->normalizeURL($fh->current()->fh_name); ?>">
															<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/forhome/<?php echo $fh->current()->fh_img; ?>"
															 alt="<?php echo $fh->current()->fh_name; ?>" style="width: 262px; height: 152px;" />
														</a>
													</div>
												</div>
												<div class="post-content">
													<h2 class="entry-title">
														<a href="<?php echo base_url(); ?>forhome/garden/details/<?php echo $fh->current()->id; ?>/<?php echo $this->general->normalizeURL($fh->current()->fh_name); ?>">
															<?php echo $fh->current()->fh_name; ?>
														</a>
													</h2>
												</div>
											</div>
											<!--/post-->
											<?php
                                                $fh->next();
                                                endwhile;
                                            endif;
                                            ?>

											<!--<div class="stock-exchange text-center">
												<div class="stock-exchange-zone">
													<a href="#">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/gallery/stock.png"
											alt="" />
											</a>
										</div>
										<div class="stock-header">
											<div class="row">
												<div class="col-xs-4">Name</div>
												<div class="col-xs-4">Price</div>
												<div class="col-xs-4">%+/-</div>
											</div>
										</div>
										<div class="stock-reports">
											<div class="com-details">
												<div class="row">
													<div class="col-xs-4 com-name">BP</div>
													<div class="col-xs-4 current-price">388.65</div>
													<div class="col-xs-4 current-result">+0.58
														<i class="fa fa-caret-up"></i>
													</div>
												</div>
											</div>
											<div class="com-details">
												<div class="row">
													<div class="col-xs-4 com-name">Royal Ba...</div>
													<div class="col-xs-4 current-price">318.25</div>
													<div class="col-xs-4 current-result">+0.32
														<i class="fa fa-caret-up"></i>
													</div>
												</div>
											</div>
											<div class="com-details">
												<div class="row">
													<div class="col-xs-4 com-name">Inmarsat</div>
													<div class="col-xs-4 current-price">214.19</div>
													<div class="col-xs-4 current-result">-0.43
														<i class="fa fa-caret-down"></i>
													</div>
												</div>
											</div>
										</div>
									</div>-->

								</div>
								<!-- /.business-section -->

							</div>
							<!--/.middle-content-->
						</div>
					</div>
				</div>
				<!--/#site-content-->
			</div>
			<div class="col-md-3 col-sm-4">
				<div id="sitebar">
					<?php $this->load->view("public/include/widget/social-media"); ?>
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

					<?php //$this->load->view('public/include/widget/sidebar-colums-eduardo');?>

					<div class="widget weather-widget">
						<div id="weather-widget"></div>
					</div>
					<!--/#widget-->
					<div class="widget">
						<div class="add">
							<a href="#">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/post/add/add6.jpg"
								 alt="" />
							</a>
						</div>
					</div>
					<!--/#widget-->
				</div>
				<!--/#sitebar-->
			</div>

			<div class="col-sm-6">
				<div class="section lifestyle-section">
					<h1 class="section-title">Serviços</h1>
					<div class="cat-menu">
						<a href="#">Ver Todos</a>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="post medium-post">
								<div class="entry-header">
									<div class="entry-thumbnail">
										<img class="img-responsive" src="https://via.placeholder.com/555x350" alt="" />
									</div>
								</div>
							</div>
						</div>
						<?php 
                            if (empty($service)) :
                                //
                            else :
                                $s = new ArrayIterator($service);
                            while ($s->valid()) :
                        ?>
						<div class="col-md-6">
							<div class="post medium-post">
								<div class="entry-header">
									<div class="entry-thumbnail">
										<a href="<?php echo base_url(); ?>services/<?php echo $s->current()->sc_url; ?>/details/<?php echo $s->current()->id_service; ?>/<?php echo $this->general->normalizeURL($s->current()->serv_name); ?>">
											<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/services/<?php echo $s->current()->serv_img; ?>"
											 alt="" />
										</a>
									</div>
								</div>
								<div class="post-content">
									<h2 class="entry-title">
										<a href="<?php echo base_url(); ?>services/<?php echo $s->current()->sc_url; ?>/details/<?php echo $s->current()->id_service; ?>/<?php echo $this->general->normalizeURL($s->current()->serv_name); ?>">
											<?php echo $s->current()->serv_name; ?>
										</a>
									</h2>
								</div>
							</div>
							<!--/post-->
						</div>
						<?php
                            $s->next();
                            endwhile;
                        endif;
                        ?>
					</div>
					<!--/.services -->
				</div>
			</div>

			<div class="col-sm-6">
				<!--/photo-gallery-->
				<div class="section health-section">
					<h1 class="section-title">Saúde</h1>
					<div class="cat-menu">
						<a href="<?php echo base_url(); ?>news/health">Ver Todas</a>
					</div>
					<div class="health-feature">
						<?php 
                            if (empty($lastHealt)) :
                                //
                            else :
                                $n = new ArrayIterator($lastHealt);
                                while ($n->valid()) :
                        ?>
						<div class="post">
							<div class="entry-header">
								<div class="entry-thumbnail">
									<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
										<img class="img-responsive h-159" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
										 alt="<?php echo $n->current()->new_title; ?>" />
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
									<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
										<?php echo $n->current()->new_title; ?>
									</a>
								</h2>
							</div>
						</div>
						<!--/post-->
						<?php 
                            $n->next();
                            endwhile;
                        endif;
                        ?>
					</div>
					<div class="row">
						<?php 
                            if (empty($lastHealt2)) :
                                //
                            else :
                                $n = new ArrayIterator($lastHealt2);
                            while ($n->valid()) :
                        ?>
						<div class="col-sm-12 col-md-6">
							<div class="post small-post">
								<div class="entry-header">
									<div class="entry-thumbnail">
										<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
											<img class="img-responsive h-95" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $n->current()->new_img; ?>"
											 alt="<?php echo $n->current()->new_title; ?>" />
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
										<a href="<?php echo base_url(); ?>news/health/details/<?php echo $n->current()->id; ?>/<?php echo $this->general->normalizeURL($n->current()->new_title); ?>">
											<?php echo $n->current()->new_title; ?>
										</a>
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
				<!--/.health-section -->
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

	<!--<div class="subscribe-me text-center">
		<h1>Não perca nossas notícias</h1>
		<h2>Se increva em nossa Newsletter</h2>
		<a href="#close" class="sb-close-btn">
			<img class="<img-responsive></img-responsive>" src="<?php echo base_url(); ?>assets/public/images/others/close-button.png"
	alt="" />
	</a>
	<form action="#" method="post" id="popup-subscribe-form" name="subscribe-form">
		<div class="input-group">
			<span class="input-group-addon">
				<img src="<?php echo base_url(); ?>assets/public/images/others/icon-message.png"
				 alt="" />
			</span>
			<input type="text" placeholder="Digite seu e-mail" name="email">
			<button type="submit" name="subscribe">Ok</button>
		</div>
	</form>
	</div>
	<!--/.subscribe-me-->

	<!--/#scripts-->
	<?php $this->load->view('public/include/scripts'); ?>

	<!--<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyCERAeMD9Tbn2bIoEka47cYSN4k_-mLrXY"></script>
	<script src="<?php echo base_url(); ?>assets/public/js/util.js"></script>--
	<script>
		$(document).ready(function() {
					/*setTimeout(function() {
					    $(location).attr('href', '');
					}, 300000);*/
					/* Google Maps -------------------------*
			var locations = [
				<?php
                    foreach ($result as $key => $v) {
                        ?>
				["<?php echo $v->location->cityName; ?>", <?php echo $v->location->latitude; ?> , <?php echo $v->location->longitude; ?> ,
					"<?php echo $v->content->fullJpeg; ?>",
					"<?php echo $v->name; ?>"
				],
				<?php
                    }
                ?>
			];
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 9,
				center: new google.maps.LatLng( <?php echo $v->location->latitude; ?> , <?php echo $v->location->longitude; ?> ),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			var infowindow = new google.maps.InfoWindow();
			var marker, i;
			var image = "assets/public/images/others/webcam.png";
			for (i = 0; i < locations.length; i++) {
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map,
					icon: image
				});
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent("<div style='float:left'><img src='" + locations[i][3] +
							"'></div><div style='float:right; padding: 10px;'><b>" + locations[i][0] + "</b><br/>" + locations[i][4] +
							"</div>");
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map);
		});
	</script>-->
</body>

</html>