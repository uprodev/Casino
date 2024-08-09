<?php get_header(); ?>

<div class="pages-outer">
	<div class="container text-content">
		<div class="pages-con">
			<div class="col-12 col-lg-9 main">
				<div class="page-header ">
					<h1><?php the_title() ?></h1>
				</div>

				<?php get_template_part('template-parts/builder/section', 'author', ['row' => true]) ?>

				<?php the_content() ?>

			</div>
			<div class="col-12 col-lg-3 sidebar stick-last-child"></div>
		</div>
	</div>
</div>

<?php if ( have_rows('content') ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_footer(); ?>