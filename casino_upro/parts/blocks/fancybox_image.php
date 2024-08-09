<?php if ($field = get_field('image')): ?>
	<div class="aligncenter">
		<a href="<?= $field['url'] ?>" data-fancybox>
			<?= wp_get_attachment_image($field['ID'], 'full') ?>
		</a>
	</div>
	<?php endif ?>