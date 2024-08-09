<?php if ($field = get_field('form')): ?>
    <div class="contact-us">
        <?= do_shortcode('[contact-form-7 id="' . $field . '"]') ?>
    </div>
    <?php endif ?>