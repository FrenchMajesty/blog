<div class="container">
			<div class="head-text">
				<h1><?php echo $pagename; ?></h1>
				<p class="lead-text">Blog Manager.</p>
			</div>
		</div>
<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-mediums">

						<div class="row post-medium nopacity visible animated fadeInUp">
							<div class="col-md-8 col-md-offset-2">
								<div class="post-item" style="height: 105px;">
									<div class="medium-post-box clearfix">
										<div class="pm-top-info clearfix">
											<div class="pull-left">
												<a href="<?php echo $sitelink; ?>/panel/add/post">CLICK HERE TO ADD A PUBLICATION</a>
											</div>
											<div class="post-item-social">
												<a href="<?php echo $sitelink; ?>/panel/add/post" class="quick-read"><i class="fa fa-plus"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

                        <?php if(count($publications) > 0) {
                                foreach($publications as $post) { ?>
						<div class="row post-medium nopacity" data-item="<?php echo $post->getID(); ?>">
							<div class="col-md-5">

                                <div class="row" style="height: 311px;">
                                <?php echo $formatMedia($sitelink, $post); ?>
                                </div>

							</div>
							<div class="col-md-7">
								<div class="post-item" style="height: 311px;">
									<div class="medium-post-box clearfix">
										<div class="pm-top-info clearfix">
											<div class="pull-left">
												<a href="#"><?php echo $allCaps($post->getCategory()); ?></a>
											</div>
											<div class="post-item-social">
												<a href="<?php echo $post->getID(); ?>"><i class="fa fa-pencil"></i>e</a>
												<a href="#" data-id="<?php echo $post->getID(); ?>"><i class="fa fa-trash-o"></i>d</a>
											</div>
										</div>
										<div class="post-item-paragraph">
											<h2><a href="#"><?php echo $post->getName(); ?></a></h2>
											<p class="ellipsis-readmore" style="word-wrap: break-word;"><?php echo $post->getDescription(); ?> <a class="more" href="#">»</a></p>
										</div>
										<div class="pm-bottom-info clearfix">
											<div class="pull-left">
												<?php echo $formatDate($post->getDate()); ?>&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;
                                                <?php echo $formatTags($post->getTags()); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>
                        <input type="hidden" id="delete-token" value="<?php echo $deleteToken; ?>">
                         <?php } else { ?>
                        <div class="row post-medium nopacity visible animated fadeInUp">
							<div class="col-md-12">
								<div class="post-item" style="height: 275px;">
									<div class="medium-post-box clearfix">
										<div class="pm-top-info clearfix">
											<div class="pull-left">
												<a href="#">WARNING</a>
											</div>
											<div class="post-item-social">
												<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
											</div>
										</div>
										<div class="post-item-paragraph">
											<h2><a href="#">Oops! Sorry, but....</a></h2>
											<p class="ellipsis-readmore" style="word-wrap: break-word;">There aren't any publications here yet for you to manage. However, once you make your first publications you will be able to edit, and delete them here.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>

						<div class="row post-medium nopacity">
							<div class="col-md-5">
								<div class="row" style="height: 365.625px;">
									<div class="embed-responsive embed-responsive-4by3">
										<iframe class="embed-responsive-item" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/186983384&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="post-item" style="height: 365.625px;">
									<div class="medium-post-box clearfix">
										<div class="pm-top-info clearfix">
											<div class="pull-left">
												<a href="#">SOUNCLOUD</a>
											</div>
											<div class="post-item-social">
												<a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
												<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
												<a href="#" class="post-like"><i class="fa fa-heart"></i><span>28</span></a>
											</div>
										</div>
										<div class="post-item-paragraph">
											<h2><a href="#">Sam Feldt - Show Me Love (Out Now)</a></h2>
											<p class="ellipsis-readmore" style="word-wrap: break-word;">Consectetur adipiscing elit. Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Nunc sed dolor enim, vitaeodale diam. Mauris fermentum fringilla lorem, in rutrum massa sodales et... <a class="more" href="#">»</a></p>
										</div>
										<div class="pm-bottom-info clearfix">
											<div class="pull-left">
												21 June&nbsp;&nbsp;&nbsp;•&nbsp;&nbsp;&nbsp;<a href="#">#music</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['feedManager']() } )
</script>
