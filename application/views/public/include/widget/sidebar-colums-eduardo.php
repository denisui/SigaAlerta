                            <div class="widget">
								<h1 class="section-title title">Colunista</h1>								
								<ul class="post-list">
									<?php 
										$c = new ArrayIterator($columnists);
										while($c->valid()) :
									?>
									<li>
										<div class="post small-post">
											<div class="entry-header entry-header-columnists">
												<div class="col-md-12">
													<div class="entry-thumbnail">
														<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>" class="">
															<img class="img-responsive img-circle center-block" src="<?php echo base_url(); ?>assets/public/images/columnists/author/eduardo.png" alt="" />
														</a>
													</div>
												</div>
											</div>
											<div class="post-content">					
												<h2 class="entry-title">
													<a href="<?php echo base_url(); ?>columnists/eduardo/details/<?php echo $c->current()->id; ?>/<?php echo $this->general->normalizeURL($c->current()->col_title); ?>" class="text-limitation">
														<?php echo  substr($c->current()->col_description, 0, 350); ?>...
													</a>
												</h2>
											</div>
										</div>
										<!--/post -->
									</li>
									<?php
										$c->next();
									endwhile;
									?>
								</ul>
							</div>
							<!--/#widget-->