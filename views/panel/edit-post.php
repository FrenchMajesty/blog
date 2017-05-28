<div class="comment-box">

    <h2 class="title">Edit your publication</h2>
								<div class="comment-block">

									<div class="comment-item">
										<div class="comment-body">
											<p class="comment-text">You can correct all your typos and re-arrange the structure and formatting of your entire publication here.</p>

                                            <form enctype="multipart/form-data">
											<div class="comment-form">

                                                <span><a href="#" class="comment-reply">Name or Title</a></span>
                                                <div class="row"><input value="<?php echo $post->getName(); ?>" name="name" type="text" class="comment-input" placeholder="Name or Title" type="text" autocomplete="off"></div>

                                                    <span><a href="#" class="comment-reply">Description</a></span>
													<div class="row"><textarea name="description" class="comment-textarea" placeholder="Tell us more here about this thing you're about to post..." style="height: 11em;" required><?php echo $post->getDescription(); ?></textarea></div>
                                                <div class="row">

                                                <?php   if($post->getType() == 'picture') {

                                                            echo '<div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <span><a href="#" class="comment-reply">Media</a></span>
                                                                        <input name="image" id="file-0" type="file" data-image="'.$sitelink . $post->getMedia().'" data-image-size="'.filesize($_SERVER['DOCUMENT_ROOT'] . '/blog' . $post->getMedia()).'">
                                                                    </div>
                                                                   </div>';

                                                        } else if($post->getType() == 'text') {
                                                            echo '<span><a href="#" class="comment-reply">Content</a></span>
                                                                    <textarea name="embed" id="html-editor" required maxlength="10000">'.$post->getMedia().'</textarea>';

                                                        }else {
                                                            echo '<span><a href="#" class="comment-reply">Media</a></span>
                                                            <textarea name="embed" class="comment-textarea" placeholder="Your '.$post->getType().'\'s embed tags." style="height: 11em;" required maxlength="10000">'.$post->getMedia().'</textarea>';
                                                        }
                                                ?>
                                                </div>

                                                <span><a href="#" class="comment-reply">Category</a></span>
                                                <div class="row">
                                                    <select class="comment-input" name="category" required>
                                                        <option value="" disabled>-- Please select an option</option>
                                                        <option value="design" <?php if($post->getCategory() == 'design') echo 'selected'; ?>>Design</option>
                                                        <option value="article" <?php if($post->getCategory() == 'article') echo 'selected'; ?>>Article</option>
                                                        <option value="fun" <?php if($post->getCategory() == 'fun') echo 'selected'; ?>>Fun</option>
                                                    </select>
                                                </div>

                                                 <span><a href="#" class="comment-reply">Tags</a></span>
                                                <div class="row"><input value="<?php echo implode(", ", $post->getTags()); ?>" name="tags" type="text" class="comment-input" placeholder="Enter tags comma separated" type="text" maxlength="100" autocomplete="off"></div>

                                                <input type="hidden" name="id" value="<?php echo $post->getID(); ?>">
                                                <input type="hidden" name="token" value="<?php echo $editPostToken; ?>">

												<br><button type="submit" class="btn btn-golden">Update Publication</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
												</form>

										</div>
                                        <div id="edit-message"></div>
									</div>
								</div>
							</div>

<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['editPost']() })
</script>
