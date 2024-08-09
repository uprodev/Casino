<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<div class="container text-content content-visible-auto">
		<?php the_content() ?>            
	</div>

	<?php endif; ?>