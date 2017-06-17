<div class="container">
			<div class="head-text">
				<h1><?php echo $blogger; ?>'s</h1>
				<p class="lead-text">Blog. Clothing Designer.</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-offset-2">

					<div class="post-fluid post-medium-vertical">
                        <?Php
                        if(count($posts) > 0) {
                        foreach($posts as $blog) { ?>
						<div class="container-fluid post-default nopacity visible animated fadeInUp">
							<div class="container-medium">
								<div class="row post-items">
									<div class="post-item-banner">
										<?php echo $formatMedia($sitelink, $blog, true); ?>
									</div>
									<div class="col-md-12">
										<div class="post-item">
											<div class="post-item-paragraph">
												<div>
													<a href="#" class="quick-read qr-only-phone"><i class="fa fa-eye"></i></a>
													<a href="#" class="mute-text"><?php echo $allCaps($blog->getCategory()); ?></a>
												</div>
												<h3><a href="#"><?php echo $blog->getName(); ?></a></h3>
												<p class="elipsis-fade-six"><?php echo $blog->getDescription(); ?> <a class="more" href="#">»</a></p>
											</div>
											<div class="post-item-info clearfix">
												<div class="pull-left">
													<span><?php echo date("M d", strtotime($blog->getDate())); ?></span>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;By <a href="#"><?php echo $blogger; ?></a>
												</div>
												<div class="pull-right post-item-social">
													<a href="#" class="quick-read qr-not-phone"><i class="fa fa-eye"></i></a>
													<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php }
                        } else { ?>

                            <div class="container-fluid post-single nopacity">
							<div class="container-medium">
								<div class="row post-items">
									<div class="col-md-12">
										<div class="post-item">
											<div class="post-item-paragraph">
												<h3><a href="#">Sorry but..</a></h3>
												<p class="five-lines"><span class="ellip">
                                                    There aren't any publications posted for you to see yet. Come back to check again soon!
                                                    </span></p>
											</div>
											<div class="post-item-info clearfix">
												<div class="pull-left">
													By the System
												</div>
												<div class="pull-right post-item-social">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>

						<div class="row">
							<div class="col-md-12">
								<a href="medium-image-v1-2.html" class="post-nav post-older">OLDER →</a>
							</div>
						</div>

					</div>
				</div>
		</div>
		</div>
