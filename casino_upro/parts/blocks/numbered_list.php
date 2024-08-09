<?php if(have_rows('list')): ?>

    <div class="list_how_to" id="how-to-how-to-use-crypto-in-anonymous-casinos">
        <div class="list_how_to__list_wrapper">
            <ol class="list_how_to__list">

                <?php while(have_rows('list')): the_row() ?>

                    <li class="list_how_to__item">

                        <?php if ($field = get_sub_field('title')): ?>
                            <h3 class="list_how_to__item_title"><?= $field ?></h3>
                        <?php endif ?>

                        <?php if ($field = get_sub_field('text')): ?>
                            <div class="list_how_to__item_text">
                                <?= $field ?>
                            </div>
                        <?php endif ?>

                    </li>

                <?php endwhile ?>

            </ol>
        </div>
    </div>

<?php endif ?>