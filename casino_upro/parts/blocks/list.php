<?php if (($field = get_field('list')) && is_array($field) && checkArrayForValues($field)): ?>
<ul class="su-list">

    <?php foreach ($field as $item): ?>
        <li>
            <?php if ($item['title']): ?>
                <strong><?= $item['title'] ?></strong></br>
            <?php endif ?>

            <?= $item['text'] ?>
        </li>
    <?php endforeach ?>
    
</ul>
<?php endif ?>