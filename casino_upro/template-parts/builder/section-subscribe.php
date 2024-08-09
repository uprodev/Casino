<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="newsletter">
		<div class="container">
			<div class="newsletter__inner">
				<div class="newsletter__body">

					<?php if ($title): ?>
						<h2 class="newsletter__title"><?= $title ?></h2>
					<?php endif ?>
					
					<?php if ($text): ?>
						<div class="newsletter__text"><?= $text ?></div>
					<?php endif ?>
					
					<?php if ($form): ?>
						<?= do_shortcode('[contact-form-7 id="' . $form . '"]') ?>
					<?php endif ?>
					
				</div>

				<?php if ($image): ?>
					<div class="newsletter__image">
						<?php if (pathinfo($image['url'])['extension'] == 'svg'): ?>
							<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
						<?php else: ?>
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
						<?php endif ?>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</section>

	<?php endif; ?>