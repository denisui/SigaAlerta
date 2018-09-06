        <!-- MAIN MENU -->
        <header id="navigation">
			<div class="navbar" role="banner">
				<div class="container">
					<a class="secondary-logo" href="<?php echo base_url(); ?>">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/presets/preset1/logo.png" alt="logo">
					</a>
				</div>
				<div class="topbar">
					<div class="container">
						<div id="topbar" class="navbar-header">
							<a class="navbar-brand" href="<?php echo base_url(); ?>">
								<img class="main-logo img-responsive" src="<?php echo base_url(); ?>assets/public/images/presets/preset1/logo.png" alt="logo">
							</a>
							<div id="topbar-right">
								<div id="date-time"></div>
								<div id="weather"></div>
							</div>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
				<div id="menubar" class="container">
					<nav id="mainmenu" class="navbar-left collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="home">
								<a href="<?php echo base_url(); ?>">Home</a>								
							</li>
							<li class="business dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Notícias</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url(); ?>news/local">Local</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>news/eua">Estados Unidos</a>
									</li>									
									<li>
										<a href="<?php echo base_url(); ?>news/sport">Esporte</a>
									</li>									
									<li>
										<a href="<?php echo base_url(); ?>news/health">Saúde</a>
									</li>									
									<li>
										<a href="<?php echo base_url(); ?>news/fashion">Moda</a>
									</li>									
									<li>
										<a href="<?php echo base_url(); ?>news/policy">Política</a>
									</li>								
									<li>
										<a href="<?php echo base_url(); ?>news/world">Mundo</a>
									</li>								
									<li>
										<a href="<?php echo base_url(); ?>news/technology">Tecnologia</a>
									</li>								
								</ul>
							</li>
							<!--<li class="politics dropdown">
								<a href="javascript:void(0);">Tráfego</a>								
							</li>
							<li class="world dropdown mega-cat-dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Mundo</a>
								<div class="dropdown-menu mega-cat-menu">
									<div class="container">
										<div class="sub-catagory">
											<h2 class="section-title">Mundo</h2>
											<ul class="list-inline">
												<li>
													<a href="<?php echo base_url(); ?>news/world">Ver Todos</a>
												</li>
											</ul>
										</div>
										<div class="row">
											<?php 
                                                if (empty($worldNewsMenu)) :
                                                ?>
												<h4 class="text-center">Nenhum notícia encontrada</h4>
												<?php 
                                                else :
                                                    $w = new ArrayIterator($worldNewsMenu);
                                                    while ($w->valid()) :
                                                ?>
											<div class="col-sm-3" data-mh="group-name">
												<div class="post medium-post">
													<div class="entry-header">
														<div class="entry-thumbnail">
															<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $w->current()->new_img; ?>" alt="" />
														</div>
													</div>
													<div class="post-content">
														<div class="entry-meta">
															<ul class="list-inline">
																<li class="publish-date">
																	<a href="#">
																		<i class="fa fa-clock-o"></i> <?php echo $w->current()->new_date_time; ?></a>
																</li>																
															</ul>
														</div>
														<h2 class="entry-title">
														<a href="<?php echo base_url(); ?>news/world/details/<?php echo $w->current()->id; ?>/<?php echo $this->general->normalizeURL($w->current()->new_title); ?>"><?php echo $w->current()->new_title ?></a>
														</h2>
													</div>
												</div>
												<!--/post--
											</div>
											<?php 
                                                $w->next();
                                                    endwhile;
                                                endif;
                                            ?>
										</div>
									</div>
								</div>
							</li>-->
							<!--<li class="technology dropdown mega-cat-dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Tecnologia</a>
								<div class="dropdown-menu mega-cat-menu">
									<div class="container">
										<div class="sub-catagory">
											<h2 class="section-title">Tecnologia</h2>
											<ul class="list-inline">
												<li>
													<a href="<?php echo base_url(); ?>news/technology">Ver Todos</a>
												</li>
											</ul>
										</div>
										<div class="row">
											<?php 
                                                if (empty($techNewsMenu)) :
                                                ?>
												<h4 class="text-center">Nenhum notícia encontrada</h4>
												<?php 
                                                else :
                                                    $t = new ArrayIterator($techNewsMenu);
                                                    while ($t->valid()) :
                                                ?>
											<div class="col-sm-3" data-mh="group-name">
												<div class="post medium-post">
													<div class="entry-header">
														<div class="entry-thumbnail">
															<img class="img-responsive" src="<?php echo base_url(); ?>assets/public/images/news/<?php echo $t->current()->new_img; ?>" alt="" />
														</div>
													</div>
													<div class="post-content">
														<div class="entry-meta">
															<ul class="list-inline">
																<li class="publish-date">
																	<a href="#">
																		<i class="fa fa-clock-o"></i> <?php echo $t->current()->new_date_time; ?></a>
																</li>																
															</ul>
														</div>
														<h2 class="entry-title">
														<a href="<?php echo base_url(); ?>news/world/details/<?php echo $t->current()->id; ?>/<?php echo $this->general->normalizeURL($t->current()->new_title); ?>"><?php echo $t->current()->new_title ?></a>
														</h2>
													</div>
												</div>
												<!--/post--
											</div>
											<?php 
                                                $t->next();
                                                    endwhile;
                                                endif;
                                            ?>											
										</div>
									</div>
								</div>
							</li>-->
							<li class="business">
								<a href="<?php echo base_url(); ?>news/clime">Clima</a>
							</li>
							<li class="entertainment">
								<a href="<?php echo base_url(); ?>news/entertainment">Entretenimento</a>
							</li>
							<li class="business dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Serviços</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url(); ?>services/advocate">Advogado</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/winch">Guincho</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/brasilianrestaurants">Restaurantes Brasileiros</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/agency">Agência de Seguros</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/dentists">Dentistas</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/carshop">Loja de Carros</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/exchange">Envio de Dinheiro para o Brasil</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>services/academy">Academias</a>
									</li>
								</ul>
							</li>							
							<li class="politics dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Para sua casa</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url(); ?>forhome/construction">Construção</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>forhome/garden">Jardinagem e Paisagismo</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>forhome/furniture">Móveis</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>forhome/electrician">Eletrecista</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>forhome/plumbers">Encadores</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>forhome/painting">Pintura</a>
									</li>
								</ul>
							</li>							
							<li class="politics dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Classificados</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url(); ?>classified/car">Automóveis</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>classified/immobile">Imóveis</a>
									</li>
									<li>
										<a href="<?php echo base_url(); ?>classified/divers">Diversos</a>
									</li>									
									<li>
										<a href="<?php echo base_url(); ?>classified/employment">Empregos</a>
									</li>									
								</ul>
							</li>							
						</ul>
					</nav>
					<div class="searchNlogin">
						<ul>
							<li class="search-icon">
								<i class="fa fa-search"></i>
							</li>
							<!--<li class="dropdown user-panel">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-user"></i>
								</a>
								<div class="dropdown-menu top-user-section">
									<div class="top-user-form">
										<form id="top-login" role="form">
											<div class="input-group" id="top-login-username">
												<span class="input-group-addon">
													<img src="<?php echo base_url(); ?>assets/public/images/others/user-icon.png" alt="" />
												</span>
												<input type="text" class="form-control" placeholder="Usuário" required="">
											</div>
											<div class="input-group" id="top-login-password">
												<span class="input-group-addon">
													<img src="<?php echo base_url(); ?>assets/public/images/others/password-icon.png" alt="" />
												</span>
												<input type="password" class="form-control" placeholder="Senha" required="">
											</div>
											<div>
												<p class="reset-user">Recuperar
													<a href="#">Senha?</a>
												</p>
												<button class="btn btn-danger" type="submit">Entrar</button>
											</div>
										</form>
									</div>
									<div class="create-account">
										<a href="#">Criar uma conta</a>
									</div>
								</div>
							</li>-->
						</ul>
						<div class="search">
							<form role="form">
								<input type="text" class="search-form" autocomplete="off" placeholder="pesquisar...">
							</form>
						</div>
						<!--/.search-->
					</div>
					<!-- searchNlogin -->
				</div>
			</div>
		</header>
		<!--/#navigation-->