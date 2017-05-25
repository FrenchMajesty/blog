<div class="comment-box">

    <h2 class="title">What Will You Post Today?</h2>
								<div class="comment-block">

									<div class="comment-item">
										<div class="comment-body">
											<p class="comment-text">Sharing with world, and post some of the amazing work you do or just share a piece of your mind with us or something you found interesting.</p>

                                            <div id="createPost-message"></div>
                                            <form>
											<div class="comment-form">

                                                <span><a href="#" class="comment-reply">Name or Title</a></span>
                                                <div class="row"><input name="name" type="text" class="comment-input" placeholder="Name or Title" type="text"></div>

                                                    <span><a href="#" class="comment-reply">Description</a></span>
													<div class="row"><textarea name="description" class="comment-textarea" placeholder="Write here about this awesome thing you're about to post..." style="height: 11em;"></textarea></div>

                                                    <span><a href="#" class="comment-reply">Type:</a></span>
                                                <div class="row">

                                                    <label class="radio-inline"><input type="radio" name="type" value="picture" required />Picture</label>
                                                    <label class="radio-inline"><input type="radio" name="type" value="video" />Video</label>
                                                    <label class="radio-inline"><input type="radio" name="type" value="text" />Text</label>
                                                    <label class="radio-inline"><input type="radio" name="type" value="media" />Other media</label>
                                                </div> <br>
                                                <div id="new-row" class="row"></div>

                                                <span><a href="#" class="comment-reply">Category</a></span>
                                                <div class="row">
                                                    <select class="comment-input" name="category" required>
                                                        <option value="" selected disabled>-- Please select an option</option>
                                                        <option value="design">Design</option>
                                                        <option value="article">Article</option>
                                                        <option value="fun">Fun</option>
                                                    </select>
                                                </div>

                                                 <span><a href="#" class="comment-reply">Tags</a></span>
                                                <div class="row"><input name="tags" type="text" class="comment-input" placeholder="Enter tags comma separated" type="text"></div>


												<br><button type="submit" class="btn btn-golden">Add Publication</button>
                                                </div>
												</form>

										</div>
									</div>
								</div>
							</div>

<script>
    document.addEventListener('DOMContentLoaded', () => { pageLoaded['createPost']() } )
</script>
