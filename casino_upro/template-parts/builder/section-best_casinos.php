<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if($casinos): ?>

		<div class="container">

			<?php if ($title): ?>
				<h2>
					<span id="toc_section_heading_0"><?= $title ?></span>
				</h2>
			<?php endif ?>

			<div class="campaign-compact-table__wrapper">
				<table class="campaign-compact-table do-not-wrap">
					<tbody class="campaign-compact-table__offers-wrapper ">

						<?php foreach($casinos as $index => $post): 

							global $post;
							setup_postdata($post); ?>
							<tr class="campaign-compact-table__offer<?php if($index == 0) echo ' brand_table_custom_cl' ?>">
								<td class="campaign-compact-table__offer-logo">
									<a href="<?php the_field('url') ?>" target="_blank" rel="nofollow sponsored">
										<?php the_post_thumbnail('full') ?>
										<p class="campaign-compact-table__offer-brand-name"><?php the_title() ?></p>
									</a>

								</td>
								<td class="campaign-compact-table__offer-description">
									<?php the_content() ?>
								</td>
								<td class="campaign-compact-table__offer-key-features">
									<div class="campaign-compact-table__offer-description">
										<?php the_content() ?>
									</div>

									<?php if(have_rows('list')): ?>

										<ul>

											<?php while(have_rows('list')): the_row() ?>

												<?php if ($field = get_sub_field('text')): ?>
													<li class="principales-list-item"><?= $field ?></li>
												<?php endif ?>

											<?php endwhile ?>

										</ul>

									<?php endif ?>

								</td>

								<?php if ($field = get_field('rating')): ?>
									<td class="campaign-compact-table__offer-rating">
										<div class="campaign-compact-table__offer-rating-text"><?= $field ?></div>
										<div class="stars-rating">
											<div data-stars="" data-stars-value="<?= $field ?>" class="stars">
												<input type="text" value="<?= $field ?>" >

												<?php 
												for ($i = 0; $i < 5; $i++) { ?>
													<div class="stars__item">
														<div class="stars__item-outline-icon">
															<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
																<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
															</svg>
														</div>
														<div class="stars__item-solid-icon">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
																<path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
															</svg>
														</div>
													</div>
												<?php }
												?>
												
											</div>
										</div>
										<a class="campaign-compact-table__offer-brand-name"><?php the_title() ?></a>
									</td>
								<?php endif ?>

								<?php if ($field = get_field('url')): ?>
									<td class="campaign-compact-table__offer-cta-button">
										<a href="<?= $field ?>" target="_blank" rel="nofollow sponsored"><?php _e('Play Now', 'Casino') ?></a>
									</td>
								<?php endif ?>

							</tr>
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>

					</tbody>
				</table>
			</div>
		</div>

	<?php endif; ?>	

	<?php endif; ?>