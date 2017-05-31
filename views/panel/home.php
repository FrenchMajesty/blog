<div class="container">
			<div class="head-text">
				<h1><?php echo $pagename; ?></h1>
			</div>
		</div>
<div class="container">
			<div class="row">

				<aside class="col-md-4 col-sm-12">

					<div class="laread-right">

						<form class="laread-form search-form">
							<div class="input"><input type="text" class="form-control" placeholder="Search..."></div>
							<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
						</form>

						<!--ul class="laread-list category-list">
							<li class="title">CATEGORY</li>
							<li><a href="#">Article <span>(56)</span></a><i class="line"></i></li>
							<li><a href="#">Design <span>(48)</span></a><i class="line"></i></li>
							<li><a href="#">Fun <span>(31)</span></a><i class="line"></i></li>
						</ul-->


						<ul class="laread-list recent-post-list">
							<li class="title">RECENT POSTS</li>
                            <?php
                                if(count($recentPosts) > 0) {
                                    foreach($recentPosts as $post) {
                                        echo '<li><a href="#">'.$post->getName().'</a><i class="date">'.date("M d, Y", strtotime($post->getDate())).'</i></li>';
                                    }
                                }else {
                                    echo '<p>You do not have any publications yet.</p>';
                                }
                            ?>
						</ul>
						<div class="laread-list quotes">
							<span class="quotes-icon"><i class="fa fa-quote-left"></i> QUOTES</span>

							<a href="#" tabindex="0" role="button" data-toggle="popover" data-placement="left" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="quotes-share" data-original-title="" title=""><i class="fa fa-share-alt"></i></a>

							<span class="quotes-number"><span>No</span> <br><i>04</i></span><br>
							<p>“The difference between stupidity and genius is that genius has its limits.”</p>
							<span class="whosay">- Albert Einstein </span>
						</div>

                        <ul class="laread-list dribbble-border-bar">
							<li class="title">DRIBBBLE</li>
							<li>
								<a href="#"><img src="<?php echo $sitelink; ?>/static/images/img-40.png" alt=""></a>
								<p><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i> more by Ronlewhorn</a></p>
							</li>
						</ul>
					</div>

				</aside>

				<aside class="col-md-4 col-sm-12">

					<div class="laread-right">

						<ul class="laread-list">
							<li class="title">WELCOME</li>
							<li class="text-bar">
                                <p>This is the blog administrator panel. This is the place where you can add, remove, and edit publications as well as gallery images as part of your portofolio. You can also change your informations here.</p>
							</li>
						</ul>

						<div class="laread-list calendar-bar">
							<div id="calendar-widget"></div>
						</div>

                        <ul class="laread-list archive-bar">
                            <?php
                            $oldest = strtotime($oldestPostDate);
                            $month1 = strtotime('-1 month');
                            $month2 = strtotime('-2 month');
                            $month3 = strtotime('-3 month');
                            $month4 = strtotime('-4 month');
                            $month5 = strtotime('-5 month');
                            $month6 = strtotime('-6 month');
                            $month7 = strtotime('-7 month');
                            $month8 = strtotime('-8 month');

                            ?>

							<li class="title">ARCHIVE</li>
							<li><a href="feed/archive/<?php echo date("m/Y"); ?>"><?php echo date("F Y"); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month1); ?>"><?php echo date("F Y", $month1); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month2); ?>"><?php echo date("F Y", $month2); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month3); ?>"><?php echo date("F Y", $month3); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month4); ?>"><?php echo date("F Y", $month4); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month5); ?>"><?php echo date("F Y", $month5); ?></a></li>
							<li><a href="feed/archive/<?php echo date("m/Y", $month6); ?>"><?php echo date("F Y", $month6); ?></a></li>
                            <li class="break-list"></li>
							<li class="mute"><a href="feed/archive/<?php echo date("m/Y", $month7); ?>"><?php echo date("M Y", $month7); ?></a></li>
							<li class="mute"><a href="feed/archive/<?php echo date("m/Y", $month8); ?>"><?php echo date("M Y", $month8); ?></a></li>
						</ul>
					</div>

				</aside>

				<aside class="col-md-4 col-sm-12">

					<div class="laread-right">

						<div class="laread-list tweets-bar">
							<i class="fa fa-twitter"></i>
							<a href="#" class="username">@Hercules_group</a>
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item active left">
										<p>New version of JD Blog will be available on ThemeForest at monday.<span class="date">/Apr 14</span></p>
										<p class="tweets-icons">
											<a href="#"><i class="fa fa-reply"></i> replay</a>
											<a href="#"><i class="fa fa-retweet"></i> retweet</a>
											<a href="#"><i class="fa fa-star"></i> favorite</a>
										</p>
									</div>
									<div class="item next left" style="height: 123px;">
										<p>New version of JD Blog will be available on ThemeForest at monday.<span class="date">/Apr 15</span></p>
										<p class="tweets-icons">
											<a href="#"><i class="fa fa-reply"></i> replay</a>
											<a href="#"><i class="fa fa-retweet"></i> retweet</a>
											<a href="#"><i class="fa fa-star"></i> favorite</a>
										</p>
									</div>
									<div class="item">
										<p>New version of JD Blog will be available on ThemeForest at monday.<span class="date">/Apr 16</span></p>
										<p class="tweets-icons">
											<a href="#"><i class="fa fa-reply"></i> replay</a>
											<a href="#"><i class="fa fa-retweet"></i> retweet</a>
											<a href="#"><i class="fa fa-star"></i> favorite</a>
										</p>
									</div>
								</div>
								<a class="left" href="#carousel-example-generic" role="button" data-slide="prev">
									<i class="fa fa-chevron-left"></i>
								</a>
								<a class="right" href="#carousel-example-generic" role="button" data-slide="next">
									<i class="fa fa-chevron-right"></i>
								</a>
							</div>
						</div>

						<ul class="laread-list instagram-border-bar">
							<li class="title">INSTAGRAM PHOTOS</li>
							<li>
								<a href="#"><img src="<?php echo $sitelink; ?>/static/images/img-42.png" alt=""></a>
								<a href="#"><img src="<?php echo $sitelink; ?>/static/images/img-42.png" alt=""></a>
								<a href="#"><img src="<?php echo $sitelink; ?>/static/images/img-42.png" alt=""></a>
								<a href="#"><img src="<?php echo $sitelink; ?>/static/images/img-42.png" alt=""></a>
								<p><a href="https://instagram.com/" target="_blank"><i class="fa fa-instagram"></i> by Hercules_group</a></p>
							</li>
						</ul>

					</div>

				</aside>
			</div>
		</div>
