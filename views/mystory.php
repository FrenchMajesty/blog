<div class="container">

			<div class="head-about">
				<h1 class="about-h1">Hi, I'm <?php echo $blogger->getName(); ?></h1>
				<p class="lead about-lead">Welcome to my blog, take your time give it a read and browse around.</p>
			</div>

		</div>
<div class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row laread-about">

						<div class="about-picture">
							<img src="<?php echo $sitelink . $blogger->getPicture(); ?>" alt="">
						</div>

						<p class="basic-info">Traveler / Art Director <span><i class="fa fa-map-marker"></i> <?php echo $blogger->getAddress(); ?></span></p>

						<p><?php echo $blogger->getBiography(); ?></p>

						<div class="about-info">
							<span class="info-title">life for me:</span>
							<div class="about-item">
								<span>
                                    <?php
                                    if(count($blogger->getInterests()) > 1) {

                                        foreach($blogger->getInterests() as $interest) {
                                            echo '<i class="fa fa-bicycle"></i><span class="label-golden">'.$interest.'</span>';
                                        }
                                    } else {

                                        echo '<p>Is pretty boring, I don\'t have any interests.</p>';
                                    }
                                    ?>
								</span>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
