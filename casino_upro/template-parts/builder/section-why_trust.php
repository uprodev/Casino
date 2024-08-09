<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="col-12 pr-0 pl-0 why-trust-section">
		<div class="container ">

			<?php if ($title): ?>
				<h2><span id="toc_section_heading_1"><?= $title ?></span></h2>
			<?php endif ?>

			<div class="col-12 pr-0 pl-0 launched-section-inner">
				<div class="row">

					<?php if (is_array($left) && checkArrayForValues($left)): ?>
					<div class="col-12 col-md-6 launched-one mob_border">

						<?php if ($left['text']): ?>
							<div class="summary_text"><?= $left['text'] ?></div>
						<?php endif ?>

						<?php if ($left['list']): ?>
							<ul>

								<?php foreach ($left['list'] as $item): ?>
									<?php if ($item['text']): ?>
										<li class="todo-guide-shortcode_item"><?= $item['text'] ?></li>
									<?php endif ?>
								<?php endforeach ?>

							</ul>
						<?php endif ?>

						<?php if ($left['link']): ?>
							<div class="about_button_mob">
								<a href="<?= $left['link']['url'] ?>" class="about-button"<?php if($left['link']['target']) echo ' target="_blank"' ?>><?= $left['link']['title'] ?></a>
							</div>
						<?php endif ?>
						
					</div>
				<?php endif ?>

				<?php if (is_array($right) && checkArrayForValues($right)): ?>
				<div class="col-12 col-md-6 launched-one launched-two">

					<?php if($right['logos']): ?>

						<div class="col-12 launched-logo">

							<?php foreach($right['logos'] as $index => $image): ?>

								<?php 
								$img_class = 'why_trust_image_logo';
								if($index > 0) $img_class .= strval($index + 1);
								echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => $img_class));
								if($index < count($right['logos']) - 1) echo '<br>';
								?>

							<?php endforeach; ?>

						</div>

					<?php endif; ?>

					<div class="col-12 comparison-section">
						<div class="row">

							<?php if ($right['authors']): ?>
								<div class="authors_group_block__wrapper">

									<?php 
									$z_index = count($right['authors']) + 2;
									foreach ($right['authors'] as $item): 
										?>
										<?php if ($item['author']): ?>

											<?php 
											$author_id = $item['author']['ID'];
											$author_url = get_author_posts_url($author_id);
											?>

											<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
												<a class="authors_group_block__author" href="<?= $author_url ?>" style="z-index: <?= $z_index ?>;">
													<?= wp_get_attachment_image($field['ID'], 'full') ?>
												</a>
											<?php endif ?>
											
										<?php endif ?>
										<?php 
									$z_index--;
									endforeach;
									?>

									<?php if ($right['is_green_tick']): ?>
										<div class="authors_group_block__green_tick">
											<svg width="25" height="25" viewBox="0 0 25 25" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<rect x="0.5" y="0.487427" width="24" height="24" rx="12"
											fill="#AFF2CD"></rect>
											<g clip-path="url(#clip0_7200_250294)">
												<path
												d="M16.2017 8.71643L11.0887 13.8029L8.63308 11.3491L7.5 12.4821L11.2763 16.2585L17.5 10.0147L16.2017 8.71643Z"
												fill="#014C6B"></path>
											</g>
											<defs>
												<clipPath id="clip0_7200_250294">
													<rect width="10" height="10" fill="white"
													transform="translate(7.5 7.48743)"></rect>
												</clipPath>
											</defs>
										</svg>
									</div>
								<?php endif ?>

							<?php endif ?>
							
						</div>

						<?php if ($right['text']): ?>
							<div class="motto-text"><?= $right['text'] ?></div>
						<?php endif ?>

					</div>
				</div>
			<?php endif ?>

		</div>
	</div>
</div>
</div>
</section>

<?php endif; ?>