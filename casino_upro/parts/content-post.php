<article >
	<div class="col-12 category-heading">
		<div class="row">
			<header>
				<h2>
					<a href="<?php the_permalink() ?>">
						<?php the_title() ?>
					</a>
				</h2>
				<p class="post-meta">

					<?php 
					$post_id = get_the_ID();
					$author_id = get_post_field('post_author', $post_id);
					?>

					<span class="post-info-author vcard author">
						<img class="post-info-icon" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/edit.svg" alt="">
						<span class="fn"><?= get_the_author_meta('first_name', $author_id) . ' ' . get_the_author_meta('last_name', $author_id) ?></span>
					</span>

					<span class="post-info-date post_date date updated">
						<img class="post-info-icon" src="<?= get_stylesheet_directory_uri() ?>/assets/icons/date.svg" alt="">
						<time class="post_date entry-date updated"><?= __('Updated:', 'Casino') . ' ' . get_the_modified_date() ?></time>
					</span>
				</p>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-5 col-md-5 category-img">
			<?php the_post_thumbnail('full') ?>
		</div>
		<div class="col-12 col-lg-7 col-md-7 category-right-text">
			<div class="entry-summary">
				<?php the_excerpt() ?>
				<a class="read-more-button" href="<?php the_permalink() ?>"><?php _e('Read More', 'Casino') ?></a>
			</div>
		</div>
	</div>
</article>