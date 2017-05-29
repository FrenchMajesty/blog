<div class="container">
			<div class="head-text text-highlight">
				<h1><?php echo $pagename; ?></h1>
			</div>
		</div>
<div class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
						<div class="col-md-2">
							<div class="post-item-short">
                                <span class="small-text">Today is:</span>
								<span class="big-text"><?php echo date('d'); ?></span>
								<span class="small-text"><?php echo date('M, Y'); ?></span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="comment-box">
								<div class="comment-block">
									<div class="comment-item">
										<div class="comment-body">
                                            <form  enctype="multipart/form-data">
                                            <h6 class="comment-heading">Picture</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input name="image" id="file-0" type="file" data-image="<?php echo $sitelink . $thisUser->getPicture(); ?>" data-image-size="<?php echo filesize($_SERVER['DOCUMENT_ROOT'] . '/blog' . $thisUser->getPicture()); ?>">
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Email</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input value="<?php echo $thisUser->getEmail(); ?>" class="comment-input" placeholder="Email" type="email" name="email" required>
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Password</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input class="comment-input" placeholder="Enter new password" type="password" name="password">
                                                <input class="comment-input" placeholder="Repeat new password" type="password" name="password2">
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Name</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input value="<?php echo $thisUser->getName("first"); ?>" class="comment-input" placeholder="First name" type="text" name="firstname" required>
                                                <input value="<?php echo $thisUser->getName("last"); ?>" class="comment-input" placeholder="Last name" type="text" name="lastname" required>
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Location</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input value="<?php echo $thisUser->getAddress(); ?>" class="comment-input" placeholder="eg: Barcelona, Spain" type="text" name="location" maxlength="80" required>
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Occupations</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <input value="<?php echo $thisUser->getOccupation(); ?>" style="width: 100%;" class="comment-input" placeholder="Things your life revolves around (eg: computers, sleep, soccer)" type="text" name="occupation" required>
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Who are you?</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <textarea name="short-bio" class="comment-input" rows="3" placeholder="Describe yourself in a sentence or two." maxlength="200" style="width: 100%;" required><?php echo $thisUser->getShortBio(); ?></textarea>
                                                </div>
                                            </div>

                                            <h6 class="comment-heading">Biography</h6><br>
                                            <div class="comment-form">
                                                <div class="row">
                                                <textarea name="long-bio" class="comment-input" rows="6" placeholder="Tell us your story." style="width: 100%;" required><?php echo $thisUser->getBiography(); ?></textarea>
                                                </div>
                                            </div>
                                                <input type="hidden" name="id" value="<?php echo $thisUser->getID(); ?>">
                                                <input type="hidden" name="token" value="<?php echo $updateDetailsToken; ?>">
                                            <button class="btn btn-silver">Update</button><br>
                                            </form>
										</div>
									</div>
                                    <div id="details-message"></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['myDetails']() })
</script>
