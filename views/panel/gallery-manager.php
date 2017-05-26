<div class="container">

			<div class="head-gallery">
				<h1 class="gallery-h1"><?php echo $pagename; ?></h1>
			</div>
		</div>
<div class="post-fluid">
			<div class="container">
                <?php if(count($gallery) > 0) { ?>
				<div class="row gallery-twice" style="position: relative; height: 1080px;">
                    <input type="hidden" id="delete-token" value="<?php echo $deleteToken; ?>">
                    <?php foreach($gallery as $image) {  ?>
					<div class="col-md-6 lifestyle" data-item="<?php echo $image->getID(); ?>">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-1" href="#" class="banner-link"><img src="<?php echo $sitelink . $image->getMedia(); ?>" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#"><?php echo $capitalize($image->getCategory()); ?></a>
								</div>
								<div class="gi-content">
									<h4><a href="#"><?php echo $allCaps($image->getName()); ?></a></h4>
								</div>
								<div class="gi-bottom">
                                    <a href="<?php echo $image->getID(); ?>"><i class="fa fa-pencil"></i></a>
								    <a href="#" data-id="<?php echo $image->getID(); ?>"><i class="fa fa-trash-o"></i></a>
								</div>
							</div>
						</div>
					</div>
                    <?php } ?>

					<!--div class="col-md-6 fashion" style="position: absolute; left: 585px; top: 0px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-2" href="#" class="banner-link"><div class="number">24</div></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Fashion</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">A BROOKLYN WEEKEND</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 27</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 work" style="position: absolute; left: 585px; top: 211px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-1" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Work</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">BOURKE ACNE STUDIOS</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 35</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 art" style="position: absolute; left: 0px; top: 216px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-2" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Art</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">LONG LIVE THE KINGS</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 12</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 people" style="position: absolute; left: 585px; top: 427px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-1" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">People</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">WESTGARTH HALL</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 26</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 lifestyle" style="position: absolute; left: 0px; top: 432px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-2" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Fashion</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">TURKISH COFFEE CULTURE</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 14</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 fashion" style="position: absolute; left: 585px; top: 643px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-1" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Fashion</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">BREAKFAST IN A PARALLEL UNIVERSE</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 48</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 work" style="position: absolute; left: 0px; top: 648px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-2" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Work</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">MOGA-E-MAGO</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 23</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 art" style="position: absolute; left: 585px; top: 859px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-1" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">Art</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">KIRRA JAMISON</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 14</a>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 people" style="position: absolute; left: 0px; top: 864px;">
						<div class="gallery-line clearfix">
							<div class="col-md-6">
								<a data-gallery-item="list-2" href="#" class="banner-link"><img src="<?php echo $sitelink; ?>/static/images/img-51.png" alt=""></a>
							</div>
							<div class="col-md-6 gi-item">
								<div class="gi-top clearfix">
									<a href="#">People</a>
								</div>
								<div class="gi-content">
									<h4><a href="#">DESIGN CULTURE</a></h4>
								</div>
								<div class="gi-bottom">
									<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>
									<a href="#"><i class="fa fa-heart"></i> 22</a>
								</div>
							</div>
						</div>
					</div-->

				</div>
                <?php } else { ?>
                <div class="post-mediums">
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
											<p class="ellipsis-readmore" style="word-wrap: break-word;">There aren't any picture in your gallery yet for you to manage. However, once you start posting pictures of your work you will be able to edit, and delete them here.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
                </div>
                <?php } ?>
 			</div>
		</div>
<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['galleryManager']() } )
</script>
