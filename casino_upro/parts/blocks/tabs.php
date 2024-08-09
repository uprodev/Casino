<?php if(have_rows('tabs')): ?>

    <div data-tabs class="su-tabs su-tabs-style-default su-tabs-mobile-stack su-tabs-vertical">
        <div class="su-tabs-nav">

            <?php while(have_rows('tabs')): the_row() ?>

                <span<?php if(get_row_index() == 1) echo ' class="su-tabs-current"' ?> data-tab-trigger="<?= get_row_index() ?>">
                    <strong><?php the_sub_field('title') ?></strong>
                </span>

            <?php endwhile ?>

        </div>

        <div class="su-tabs-panes">

            <?php while(have_rows('tabs')): the_row() ?>

                <div class="su-tabs-pane su-u-clearfix su-u-trim<?php if(get_row_index() == 1) echo ' su-tabs-pane-open' ?>" data-tab-content="<?= get_row_index() ?>"><?php the_sub_field('text') ?></div>

            <?php endwhile ?>

        </div>
    </div>

    <?php endif ?>