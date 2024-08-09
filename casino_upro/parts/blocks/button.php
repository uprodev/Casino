<?php if ($field = get_field('button')): ?>
    <div class="su-button-center">
        <a href="<?= $field['url'] ?>" class="su-button su-button-style-3d"<?php if($field['target']) echo ' target="_blank"' ?>>
            <span><?= $field['title'] ?></span>
        </a>
    </div>
    <?php endif ?>