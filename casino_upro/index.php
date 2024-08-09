<?php get_header(); ?>

<?php $page_id = get_option('page_for_posts') ?>

<div class="pages-outer">
	<div class="container">
		<div class="col-12 col-fullwidth">
			<div class="page-header ">
				<h1><?= get_the_title($page_id) ?></h1>
			</div>

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
</div>

<?php get_footer(); ?>