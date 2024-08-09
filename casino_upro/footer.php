</main>

<footer class="footer-info">
  <div class="background-container">
    <div class="container">
      <div class="footer-info__head">

        <?php if ($field = get_field('logo_f', 'option')): ?>
          <div class="footer-info__logo">
            <a href="<?= get_home_url() ?>">
              <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
              <?php else: ?>
                <?= wp_get_attachment_image($field['ID'], 'full') ?>
              <?php endif ?>
            </a>
          </div>
        <?php endif ?>
        
        <?php if(have_rows('socials_f', 'option')): ?>

          <div class="footer-info__icons">

            <?php while(have_rows('socials_f', 'option')): the_row() ?>

              <?php if ($field = get_sub_field('icon')): ?>
                <a href="<?php the_sub_field('url') ?>" target="_blank">
                  <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                    <img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                  <?php else: ?>
                    <?= wp_get_attachment_image($field['ID'], 'full') ?>
                  <?php endif ?>
                </a>
              <?php endif ?>

            <?php endwhile ?>

          </div>

        <?php endif ?>

      </div>

      <?php $menu = wp_get_nav_menu_items(3) ?>

      <?php if ($menu): ?>
        <div class="row">
          <div class="col-6 col-md-3 footer-one footer2">
            <div class="widget nav_menu-8 widget_nav_menu">
              <p class="widget-title"><?= wp_get_nav_menu_object(get_nav_menu_locations()['footer'])->name ?></p>
              <div class="menu-footer-menu-container">
                <ul class="menu">

                  <?php foreach ($menu as $item): ?>

                    <?php if ($item->menu_item_parent === '0'): ?>
                      <li class="menu-item menu-item-type-custom menu-item-object-custom">
                        <a href="<?= $item->url ?>"<?php if($item->target) echo ' target="_blank"' ?>>
                          <?= $item->title ?>
                        </a>
                      </li>
                    <?php endif ?>

                  <?php endforeach ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if ($field = get_field('copyright_f', 'option')): ?>
        <div class="row">
          <div class="col-12 col-md-12 pr-0 pl-0 text-center copy">
            <section class="widget text-7 widget_text">
              <div class="textwidget">
                <p><?= $field ?></p>
              </div>
            </section>
          </div>
        </div>
      <?php endif ?>
      
    </div>
  </div>
  <div class="col-12 footer-logo-inner text-center">
    <div class="container">
      <div class="col-12 footerlast">

        <?php if(have_rows('logos_f', 'option')): ?>

          <section class="widget text-13 widget_text">
            <div class="textwidget">
              <div class="footer-logo">
                <ul class="footer-info__logo-list">

                  <?php while(have_rows('logos_f', 'option')): the_row() ?>

                    <?php if ($field = get_sub_field('logo')): ?>
                      <li>
                        <a href="<?php the_sub_field('url') ?>" target="_blank">
                          <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                            <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                          <?php else: ?>
                            <?= wp_get_attachment_image($field['ID'], 'full') ?>
                          <?php endif ?>
                        </a>
                      </li>
                    <?php endif ?>

                  <?php endwhile ?>

                </ul>
              </div>
            </div>
          </section>

        <?php endif ?>

        <?php if ($field = get_field('text_f', 'option')): ?>
          <section class="widget text-12 widget_text">
            <div class="textwidget"><?= $field ?></div>
          </section>
        <?php endif ?>
        
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>