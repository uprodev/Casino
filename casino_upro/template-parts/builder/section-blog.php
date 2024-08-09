<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<div class="news_guides_section__wrapper">
		<div class="container">
			<div class="news_guides_section">

				<?php 
				$args = array(
					'post_type' => 'post', 
					'cat' => 1,
					'posts_per_page' => 3,
					'orderby' => 'date', 
					'order' => 'DESC', 
					'paged' => get_query_var('paged')
				);
				$wp_query = new WP_Query($args);
				if($wp_query->have_posts()): 
					?>

					<div class="news_guides_section__news">

						<?php if ($left['title']): ?>
							<div class="news_guides_section__header title-2 mt-0"><?= $left['title'] ?></div>
						<?php endif ?>

						<div class="news_guides_section__news_cards">

							<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
								<a class="news_guides_section__news_card" href="<?php the_permalink() ?>">

									<?php if (has_post_thumbnail()): ?>
										<div class="news_guides_section__news_thumbnail">
											<?php the_post_thumbnail('full') ?>
										</div>
									<?php endif ?>
									
									<div class="news_guides_section__news_card__author_and_date">

										<?php 
										$post_id = get_the_ID();
										$author_id = get_post_field('post_author', $post_id);
										?>

										<?php if ($author_id): ?>
											<div class="news_guides_section__news_card__author">

												<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
													<div class="news_guides_section__news_card__author_avatar">
														<?= wp_get_attachment_image($field['ID'], 'full') ?>
													</div>
												<?php endif ?>

												<div class="news_guides_section__news_card__author_name"><?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?></div>
											</div>
										<?php endif ?>

										<?php 
										$startDate = new DateTime(get_the_date());
										$endDate = new DateTime();

										$interval = $startDate->diff($endDate);

										if ($interval->days < 7) {
											$interval = $interval->days . ' days ago';
										} else {
											$interval = round($interval->days / 7, 0) . ' weeks ago';
										}
										?>

										<div class="news_guides_section__news_card__date">
											<svg width="14" height="14" viewBox="0 0 14 14" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path
											d="M7 7H6.56667C6.56657 7.05694 6.57769 7.11335 6.5994 7.16599C6.62111 7.21864 6.65299 7.26648 6.6932 7.3068L7 7ZM7 12.6333C5.50595 12.6333 4.07309 12.0398 3.01663 10.9834C1.96018 9.92691 1.36667 8.49405 1.36667 7H0.5C0.5 8.72391 1.18482 10.3772 2.40381 11.5962C3.62279 12.8152 5.27609 13.5 7 13.5V12.6333ZM12.6333 7C12.6333 7.73978 12.4876 8.47232 12.2045 9.15578C11.9214 9.83925 11.5065 10.4603 10.9834 10.9834C10.4603 11.5065 9.83925 11.9214 9.15578 12.2045C8.47232 12.4876 7.73978 12.6333 7 12.6333V13.5C8.72391 13.5 10.3772 12.8152 11.5962 11.5962C12.8152 10.3772 13.5 8.72391 13.5 7H12.6333ZM7 1.36667C7.73978 1.36667 8.47232 1.51238 9.15578 1.79548C9.83925 2.07858 10.4603 2.49353 10.9834 3.01663C11.5065 3.53974 11.9214 4.16075 12.2045 4.84422C12.4876 5.52768 12.6333 6.26022 12.6333 7H13.5C13.5 5.27609 12.8152 3.62279 11.5962 2.40381C10.3772 1.18482 8.72391 0.5 7 0.5V1.36667ZM7 0.5C5.27609 0.5 3.62279 1.18482 2.40381 2.40381C1.18482 3.62279 0.5 5.27609 0.5 7H1.36667C1.36667 5.50595 1.96018 4.07309 3.01663 3.01663C4.07309 1.96018 5.50595 1.36667 7 1.36667V0.5ZM6.56667 3.1V7H7.43333V3.1H6.56667ZM6.6932 7.3068L9.2932 9.9068L9.9068 9.2932L7.3068 6.6932L6.6932 7.3068V7.3068Z"
											fill="#888888"></path>
										</svg>
										<span><?= $interval ?></span>
									</div>
								</div>
								<div class="news_guides_section__news_card__title"><?php the_title() ?></div>
							</a>
						<?php endwhile; ?>

					</div>

					<?php if ($left['link']): ?>
						<a href="<?= $left['link']['url'] ?>" class="news_guides_section__more_btn"<?php if($left['link']['target']) echo ' target="_blank"' ?> aria-label="<?= $left['link']['title'] ?>">
							<span><?= $left['link']['title'] ?></span>
							<svg width="17" height="18" viewBox="0 0 17 18" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
							d="M0.906594 9.66407H14.3308L12.107 11.9824C11.8589 12.2412 11.8579 12.6616 12.1049 12.9216C12.3519 13.1815 12.7532 13.1825 13.0014 12.9238L16.3135 9.47069C16.3137 9.47049 16.3139 9.47026 16.3141 9.47006C16.5616 9.21134 16.5624 8.78953 16.3141 8.52995C16.3139 8.52975 16.3138 8.52951 16.3136 8.52932L13.0014 5.07619C12.7533 4.81754 12.352 4.81843 12.105 5.07845C11.858 5.3384 11.859 5.75885 12.1071 6.01757L14.3308 8.33594H0.906594C0.556503 8.33594 0.272717 8.63324 0.272717 9C0.272717 9.36676 0.556503 9.66407 0.906594 9.66407Z"
							fill="#1C2642"></path>
						</svg>
					</a>
				<?php endif ?>

			</div>

			<?php 
		endif;
		wp_reset_query(); 
		?>

		<?php if($right['posts']): ?>

			<div class="news_guides_section__guides">

				<?php if ($right['title']): ?>
					<div class="news_guides_section__header title-2 mt-0"><?= $right['title'] ?></div>
				<?php endif ?>

				<div class="news_guides_section__guides_cards">

					<?php foreach($right['posts'] as $post): 

						global $post;
						setup_postdata($post); ?>
						<a class="news_guides_section__guides_card" href="<?php the_permalink() ?>">
							<div class="news_guides_section__guides_card__title"><?php the_title() ?></div>

							<?php 
							$post_id = get_the_ID();
							$author_id = get_post_field('post_author', $post_id);
							?>

							<?php if ($author_id): ?>
								<div class="news_guides_section__guides_card__author">
									<div class="news_guides_section__news_card__author">

										<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
											<div class="news_guides_section__news_card__author_avatar">
												<?= wp_get_attachment_image($field['ID'], 'full') ?>
											</div>
										<?php endif ?>

										<div class="news_guides_section__news_card__author_name"><?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?></div>
									</div>
								</div>
							<?php endif ?>

						</a>
					<?php endforeach; ?>

					<?php wp_reset_postdata(); ?>

				</div>
			</div>

		<?php endif; ?>

	</div>
</div>
</div>

<?php endif; ?>