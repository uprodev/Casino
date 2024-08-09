<?php 
if($args['row']):
	if(is_array($args['row'])) foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$post_id = get_the_ID();
	$author_id = get_post_field('post_author', $post_id);
	$author_url = get_author_posts_url($author_id);
	?>

	<?php if ($author_id): ?>
		<div class="container">
			<div class="author_section__wrapper">
				<div class="author_section__avatar_and_meta">

					<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
						<a class="author_section__avatar" href="<?= $author_url ?>">
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						</a>
					<?php endif ?>
					
					<div class="author_section__meta">
						<a class="author_section__name" href="<?= $author_url ?>"><?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?></a>

						<?php if ($field = get_field('role', 'user_' . $author_id)): ?>
							<div class="author_section__job_and_fact_checked">
								<div class="author_section__label__wrapper">
									<div class="author_section__label_icon">
										<svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_8510_29570)">
												<path d="M8.70169 1.729L3.58867 6.81546L1.13308 4.36164L0 5.49472L3.77634 9.27106L10 3.02732L8.70169 1.729Z" fill=""></path>
											</g>
											<defs>
												<clipPath id="clip0_8510_29570">
													<rect width="10" height="10" fill="white" transform="translate(0 0.5)">
													</rect>
												</clipPath>
											</defs>
										</svg>
									</div>
									<div class="author_section__label"><?= $field ?></div>
								</div>
							</div>
						<?php endif ?>

						<div class="author_section__date">
							<?php _e('Updated', 'Casino') ?>: <span><?= get_the_modified_date() ?></span>
						</div>
					</div>
				</div>
				<div class="author_section__extra">
					<div class="btn_with_tooltip disclaimer">

						<?php if ($field = get_field('title_1', 'option')): ?>
							<div class="btn_with_tooltip__btn"><?= $field ?></div>
						<?php endif ?>
						
						<?php if ($field = get_field('text_1', 'option')): ?>
							<div class="btn_with_tooltip__tip"><?= $field ?></div>
						<?php endif ?>
						
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

	<?php endif; ?>