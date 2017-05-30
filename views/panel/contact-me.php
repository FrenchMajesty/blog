<div class="container">

			<div class="head-author">
				<h1 class="author-h1"><?php echo $pagename; ?></h1>
			</div>

		</div>
<div class="post-fluid">
			<div class="container-fluid">

				<article class="row laread-authors">
					<div class="author-item">
						<div class="author-picture">
							<img src="<?php echo $sitelink . $thisUser->getPicture(); ?>" alt="">
						</div>
						<div class="author-subdetail">
							<h2><a href="#"><?php echo $thisUser->getName(); ?></a></h2>
							<p class="info-small"><span><i class="fa fa-map-marker"></i> <?php echo $thisUser->getAddress(); ?></span></p>
							<div class="author-connection">
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-google-plus"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
							<p class="author-bio">Manage all of your other social media outlets here, you canlet your fans know where they can find you or follow you to stay updated with what's going on with their favorite blogger.</p>
                            <p id="socials-message" class="author-bio"></p>
                            <form>
                            <?php $i = 0; foreach($socialMedia as $social => $handle) { ?>
                            <div class="row"><p class="author-bio">
                                <div class="comment-form">

                                    <div class="col-md-5">
                                        <select class="comment-input" name="social" required style="width: 100%">
                                            <option value="" disabled>-- Please select --</option>
                                            <option value="twitter" <?php if($social == 'twitter') echo 'selected'; ?>>Twitter</option>
                                            <option value="instagram" <?php if($social == 'instagram') echo 'selected'; ?>>Instagram</option>
                                            <option value="pinterest" <?php if($social == 'pinterest') echo 'selected'; ?>>Pinterest</option>
                                            <option value="linkedin" <?php if($social == 'linkedin') echo 'selected'; ?>>LinkedIn</option>
                                            <option value="google+" <?php if($social == 'google+') echo 'selected'; ?>>Google+</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <input value="<?php echo $handle; ?>" type="text" class="form-control" placeholder="Twitter">
                                    </div>
                                    <?php if($i != 0){ ?>
                                    <div class="col-md-1">
                                        <a href="#" class="btn btn-danger btn-rounded">Remove <i class="fa fa-times-circle"></i></a>
                                    </div>
                                    <?php } ?>
                            </div>
                            </p></div>
                            <?php $i++; } ?>
                        <input type="hidden" name="token" value="<?php echo $updateInfosToken; ?>">
							<br>
                        <button type="submit" class="btn btn-grey btn-outline btn-rounded">Save</button>
                        <button type="button" class="btn btn-golden btn-outline btn-rounded">Add <i class="fa fa-plus"></i></button>
                        </form>
						</div>
					</div>
				</article>

			</div>
		</div>

<script type="text/template" id="socialTemplate">
<div class="row"><p class="author-bio">
                             <div class="comment-form">

                                    <div class="col-md-5">
                                        <select class="comment-input" name="social" required style="width: 100%">
                                            <option value="" selected disabled>-- Please select --</option>
                                            <option value="twitter">Twitter</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="pinterest">Pinterest</option>
                                            <option value="linkedin">LinkedIn</option>
                                            <option value="google+">Google+</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Social Media handle" required>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="#" class="btn btn-danger btn-rounded">Remove <i class="fa fa-times-circle"></i></a>
                                    </div>
                            </div>
</p></div>
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['myContacts']() } )
</script>
