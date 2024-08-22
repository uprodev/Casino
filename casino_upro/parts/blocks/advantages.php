<div class="su-row">

    <?php if (($field = get_field('left')) && is_array($field) && checkArrayForValues($field)): ?>
    <div class="su-column su-column-size-1-2">
        <div class="su-column-inner su-u-clearfix su-u-trim">

            <?php if ($field['title']): ?>
                <p><strong><?= $field['title'] ?></strong></p>
            <?php endif ?>
            
            <?php if ($field['text']): ?>
                <?= add_class_content($field['text'], '', '', 'su-list') ?>
            <?php endif ?>

        </div>
    </div>
<?php endif ?>

<?php if (($field = get_field('right')) && is_array($field) && checkArrayForValues($field)): ?>
<div class="su-column su-column-size-1-2 pros_icons_">
    <div class="su-column-inner su-u-clearfix su-u-trim">

        <?php if ($field['title']): ?>
            <p><strong><?= $field['title'] ?></strong></p>
        <?php endif ?>

        <?php if ($field['text']): ?>
            <?= add_class_content($field['text'], '', '', 'su-list x-icons') ?>
        <?php endif ?>

    </div>
</div>
<?php endif ?>

</div>