<?php if(have_rows('items')): ?>

    <div data-spoiler="one" class="fi-faq-container">

        <?php while(have_rows('items')): the_row() ?>

            <div class="fi-faq-content-shortcode">
                <div class="fi-faq-content-shortcode__question" data-spoiler-trigger>
                    <h3><?php the_sub_field('title') ?></h3>
                </div>
                <div class="fi-faq-content-shortcode__answer" style="display: none;"><?php the_sub_field('text') ?></div>
            </div>

        <?php endwhile ?>

    </div>

    <?php endif ?>