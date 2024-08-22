<?php
$featured_posts = get_field('casinos');
if($featured_posts): ?>

    <div class="campaign-compact-table__wrapper bm-tiny">
        <table class="campaign-compact-table do-not-wrap">
            <tbody class="campaign-compact-table__offers-wrapper ">

                <?php foreach($featured_posts as $index => $post_): 

                    global $post;
                    $post = $post_;
                    setup_postdata($post_); ?>
                    <?php get_template_part('parts/content', 'casino', ['index' => $index, 'post_id' => $post->ID]) ?>
                <?php endforeach; ?>

                <?php wp_reset_postdata(); ?>

            </tbody>
        </table>
    </div>

    <?php endif; ?>