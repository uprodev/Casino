<?php get_header(); ?>

<div class="pages-outer">
	<div class="container">
		<div class="pages-con">

			<?php 
			$author_id = get_queried_object_id();
			$count_posts = count_user_posts($author_id, 'post', true);
			$firstname = get_the_author_meta('first_name', $author_id);
			$lastname = get_the_author_meta('last_name', $author_id);
			?>

			<?php if ($author_id): ?>

				<div class="author-page__entry">
					<div class="author-page__avatar-and-socials">

						<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
							<div class="author-page__avatar">
								<?= wp_get_attachment_image($field['ID'], 'full') ?>
							</div>
						<?php endif ?>

						<?php if(have_rows('socials', 'user_' . $author_id)): ?>


							<?php while(have_rows('socials', 'user_' . $author_id)): the_row() ?>

								<?php if ($icon = get_sub_field('icon')): ?>
									<a href="<?= get_sub_field('url') ?>" rel="nofollow" target="_blank">
										<?php if (pathinfo($icon['url'])['extension'] == 'svg'): ?>
											<img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
										<?php else: ?>
											<?= wp_get_attachment_image($icon['ID'], 'full') ?>
										<?php endif ?>
									</a>
								<?php endif ?>

							<?php endwhile ?>

						<?php endif ?>

					</div>

					<div class="author-page__name-and-job">
						<div class="author-page__name">
							<h1><?= $firstname . ' ' . $lastname ?></h1>
						</div>

						<?php if ($field = get_field('label', 'user_' . $author_id)): ?>
							<div class="author-page__job">
								<div class="author_section__label__wrapper">
									<div class="author_section__label_icon">
										<svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_8510_29570)">
												<path d="M8.70169 1.729L3.58867 6.81546L1.13308 4.36164L0 5.49472L3.77634 9.27106L10 3.02732L8.70169 1.729Z" fill="#014C6B"></path>
											</g>
											<defs>
												<clipPath id="clip0_8510_29570">
													<rect width="10" height="10" fill="white"
													transform="translate(0 0.5)"></rect>
												</clipPath>
											</defs>
										</svg>
									</div>
									<div class="author_section__label"><?= $field ?></div>
								</div>
							</div>
						<?php endif ?>

					</div>
					<div class="author-page__extra">
						<div class="author-page__author-degree-and-stats">
							<div class="author-page__author-stats">
								<?= $count_posts . ' ' . __('Articles', 'Casino') ?>
							</div>
						</div>

						<?php if ($field = get_the_author_meta('description', $author_id)): ?>
							<div class="author-page__description">
								<div class="author-page__description-init"><?= $field ?></div>
							</div>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>

			<div class="col-12 col-lg-9 main">
				<h2 class="author-page__articles-header">
					<?= __('Articles by', 'Casino') . ' ' . $firstname . ' ' . $lastname . ' (' . $count_posts . ')' ?>
				</h2>
				<div class="author-page__articles">

					<?php if (have_posts()) :
						while (have_posts()) : the_post(); ?> 

							<?php get_template_part('parts/content', 'post') ?>

						<?php endwhile; ?>
					<?php endif; ?>

					<div class="articles-pagination-desktop">

						<?php 
						$args = array(
							'show_all'     => false, 
							'end_size'     => 1,     
							'mid_size'     => 1,     
							'prev_next'    => true,  
							'prev_text'    => '<div class="arrow"></div>',
							'next_text'    => '<div class="arrow"></div>',
							'add_args'     => false, 
							'add_fragment' => '',     
							'screen_reader_text' => __( 'Posts navigation' ),
							'type' => 'list',
						);
						the_posts_pagination($args); 
						?>

					</div>
					<div class="articles-pagination-mobile">

						<?php 
						$args = array(
							'show_all'     => false, 
							'end_size'     => 1,     
							'mid_size'     => 1,     
							'prev_next'    => false,  
							'prev_text'    => __('Previous'),
							'next_text'    => __('Next'),
							'add_args'     => false, 
							'add_fragment' => '',     
							'screen_reader_text' => __( 'Posts navigation' ),
							'type' => 'list',
						);
						the_posts_pagination($args); 
						?>
						
					</div>
					
				</div>
			</div>
			<div class="col-12 col-lg-3 sidebar">
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>