<?php get_header(); ?>

<div class="pages-outer">
	<div class="container text-content">
		<div class="col-12 col-fullwidth">
			<div class="page-header ">
				<h1><?php the_title() ?></h1>
			</div>

			<?php get_template_part('template-parts/builder/section', 'author', ['row' => true]) ?>

			<?php the_content() ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>