<?php if(have_rows('authors')): ?>

	<div class="authors-list__wrapper">
		<div class="authors-list">

			<?php while(have_rows('authors')): the_row() ?>

				<?php 
				$author_id = get_sub_field('author');
				$author_url = get_author_posts_url($author_id);
				?>

				<div class="authors-list__author">

					<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
						<a class="authors-list__author-avatar" href="<?= $author_url ?>">
							<?= wp_get_attachment_image($field['ID'], 'full') ?>
						</a>
					<?php endif ?>

					<a class="authors-list__author-name" href="<?= $author_url ?>">
						<?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?>
					</a>

					<?php if ($field = get_field('label', 'user_' . $author_id)): ?>
						<div class="authors-list__author-job">
							<div class="author_section__label__wrapper" style="background: #D2FFE6;">
								<div class="author_section__label_icon" style="background: #AFF2CD;">
									<svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_8510_29570)">
											<path d="M8.70169 1.729L3.58867 6.81546L1.13308 4.36164L0 5.49472L3.77634 9.27106L10 3.02732L8.70169 1.729Z"
											fill="#014C6B"></path>
										</g>
										<defs>
											<clipPath id="clip0_8510_29570">
												<rect width="10" height="10" fill="white" transform="translate(0 0.5)"></rect>
											</clipPath>
										</defs>
									</svg>
								</div>
								<div class="author_section__label " style="color: #2E364E;"><?= $field ?></div>
							</div>
						</div>
					<?php endif ?>

					<div class="authors-list__author-stats">
						<?= count_user_posts($author_id, 'post', true) . ' ' . __('Articles', 'Casino') ?>
					</div>

					<?php if(have_rows('socials', 'user_' . $author_id)): ?>

						<div class="authors-list__author-socials">

							<?php while(have_rows('socials', 'user_' . $author_id)): the_row() ?>

								<?php if ($icon = get_sub_field('icon')): ?>
									<a class="authors-list__author-social" href="<?= get_sub_field('url') ?>" target="_blank">
										<?php if (pathinfo($icon['url'])['extension'] == 'svg'): ?>
											<img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
										<?php else: ?>
											<?= wp_get_attachment_image($icon['ID'], 'full') ?>
										<?php endif ?>
									</a>
								<?php endif ?>

							<?php endwhile ?>

						</div>

					<?php endif ?>

				</div>

			<?php endwhile ?>

		</div>
	</div>

<?php endif ?>
