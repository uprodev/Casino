<?php 
$post_id = get_the_ID();
$author_id = get_post_field('post_author', $post_id);
$author_url = get_author_posts_url($author_id);
?>

<?php if ($author_id): ?>
	<div class="col-12 author-info-box ">
		<div class="pr-0 pl-0 author-avatar">

			<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
				<div class="pr-0 pl-0 author-avatar-img">
					<?= wp_get_attachment_image($field['ID'], 'full') ?>
				</div>
			<?php endif ?>

			<?php if(have_rows('socials', 'user_' . $author_id)): ?>

				<div class="author-avatar-social">
					<span class="social-iconssection">

						<?php while(have_rows('socials', 'user_' . $author_id)): the_row() ?>

							<?php if ($icon = get_sub_field('icon')): ?>
								<a href="<?= get_sub_field('url') ?>" class="fi-global__background-image__linkedin" rel="nofollow" target="_blank" style="background-image: url(<?= $icon['url'] ?>);">
									<?php if (pathinfo($icon['url'])['extension'] == 'svg'): ?>
										<img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
									<?php else: ?>
										<?= wp_get_attachment_image($icon['ID'], 'full') ?>
									<?php endif ?>
								</a>
							<?php endif ?>

						<?php endwhile ?>

					</span>
				</div>

			<?php endif ?>

		</div>
		<div class="author-description">
			<div class="author_inf">
				<div class="author_section__name">
					<?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?>

					<?php if ($field = get_field('role', 'user_' . $author_id)): ?>
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
					<?php endif ?>

				</div>

				<?php if(have_rows('socials', 'user_' . $author_id)): ?>

					<div class="author-mobile-social">
						<span class="social-iconssection">

							<?php while(have_rows('socials', 'user_' . $author_id)): the_row() ?>

								<?php if ($icon = get_sub_field('icon')): ?>
									<a href="<?= get_sub_field('url') ?>" class="fi-global__background-image__linkedin" rel="nofollow" target="_blank" style="background-image: url(<?= $icon['url'] ?>);">
										<?php if (pathinfo($icon['url'])['extension'] == 'svg'): ?>
											<img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
										<?php else: ?>
											<?= wp_get_attachment_image($icon['ID'], 'full') ?>
										<?php endif ?>
									</a>
								<?php endif ?>

							<?php endwhile ?>

						</span>
					</div>

				<?php endif ?>

			</div>
			<p></p>
			<div class="author-link">
				<a href="<?= $author_url ?>" rel="author">
					<?= __('View all posts by', 'Casino') . ' ' . get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?>
				</a>
			</div>
		</div>
	</div>
	<?php endif ?>