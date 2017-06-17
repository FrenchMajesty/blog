
<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-author-detail">
					<div class="author-picture">
						<img src="<?php echo $sitelink . $blogger->getPicture(); ?>" alt="" />
					</div>
					<div class="author-subdetail">
						<h2><?php echo $blogger->getName(); ?></h2>
						<p class="info-small">Art Director</p>
						<p class="author-bio"><?php echo $blogger->getShortBio(); ?> <a href="<?php echo $sitelink; ?>/story">full bio</a></p>
						<p class="info-small">
							<span><i class="fa fa-map-marker"></i> <?php echo $blogger->getAddress(); ?></span>
							<span><i class="fa fa-paper-plane"></i> <?php echo $postCount; ?> Posts</span>
                         <?php  foreach($blogger->getSocialMedias() as $network => $username) {
                            echo '<a href="http://'.$network.'.com/'.$username.' "><i class="fa fa-'.$network.'"></i> @'.$username.'</a>';
                            break;
                        }?>
						</p>
						<button type="button" class="btn btn-golden btn-golden-hover btn-rounded">Following</button>
					</div>
				</div>
			</div>
		</section>
