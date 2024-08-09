<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<div class="toc_section__wrapper">
		<div class="toc_section container">

			<?php if ($title): ?>
				<div class="toc_section__title title-2 mt-0"><?= $title ?></div>
			<?php endif ?>

			<?php if ($text): ?>
				<div class="toc_section__opening_paragraph"><?= $text ?></div>
			<?php endif ?>

			<?php if (is_array($links) && checkArrayForValues($links)): ?>
			<ul class="toc_section__links">

				<?php foreach ($links as $item): ?>
					<?php if ($item['link']): ?>
						<li>
							<a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= $item['link']['title'] ?></a>
						</li>
					<?php endif ?>
				<?php endforeach ?>

			</ul>
		<?php endif ?>

	</div>
</div>

<?php endif; ?>