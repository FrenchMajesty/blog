<div class="container">
			<div class="head-text">
				<h1 class="head-text-highlight"><?php echo $pagename; ?></h1>
				<!--p id="filters" class="tags">
					<a data-filter=".fashion" href="#">fashion</a>
					<a data-filter=".work" href="#">work</a>
					<a data-filter=".art" href="#">art</a>
					<a data-filter=".people" href="#">people</a>
					<a data-filter="*" href="#" class="unfilter hide">all</a>
				</p-->
			</div>
		</div>
<div class="container">
			<div class="row">
                <?php if(count($galleryPosts) > 0) { ?>
				<div class="masonry isotopeContainer" style="position: relative; height: 2194px;">

                    <?php foreach($galleryPosts as $post) { ?>
					<div class="col-md-4 masonry-row col-sm-6 lifestyle" style="position: absolute; left: 0px; top: 0px;">
						<img src="<?php echo $sitelink . $post->getMedia(); ?>" alt="">
						<div class="masonry-content">
							<a href="#"><?php echo $post->getName(); ?></a>
							<p class="spot ellipsis-readmore" style="word-wrap: break-word;"><?php echo $post->getDescription(); ?><a href="#" class="more">»</a></p>
							<div class="links">
								<div class="icons">
									<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
								</div>
								<span><?php echo $formatDate($post->getDate()); ?></span>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;
                                <?php echo $formatTags($post->getTags()); ?>
							</div>
						</div>
					</div>
                    <?php } ?>

				</div>
                   <?php } else { ?>
                        <div class="row post-medium nopacity visible animated fadeInUp">
							<div class="col-md-12">
								<div class="post-item" style="height: 275px;">
									<div class="medium-post-box clearfix">
										<div class="pm-top-info clearfix">
											<div class="pull-left">
												<a href="#">-</a>
											</div>
											<div class="post-item-social">
												<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
											</div>
										</div>
										<div class="post-item-paragraph">
											<h2><a href="#">Oops! Sorry, but....</a></h2>
											<p class="ellipsis-readmore" style="word-wrap: break-word;">There aren't any publications in this blog's portofio yet. Come check again soon!</p>
										</div>
									</div>
								</div>
							</div>
						</div>
                <?php } ?>
			</div>
		</div>
