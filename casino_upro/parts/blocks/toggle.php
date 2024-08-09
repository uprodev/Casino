<?php if ($field = get_field('title')): ?>
	<div id="toc_container" class="no_bullets contracted">
		<div class="toc_toggle">
			<div class="toc_arrow">
				<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
					<circle cx="12.06" cy="12.06" r="11.8" fill="#1C2642"></circle>
					<path d="M6,10.45l6,6,6-6" fill="none" stroke="#fff" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="2"></path>
				</svg>
			</div>
			<div class="toc_title"><?= $field ?></div>
		</div>
	</div>
	<?php endif ?>