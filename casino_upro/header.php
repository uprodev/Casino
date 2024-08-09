<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <?php wp_head(); ?>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .page-loaded .page-loader {
      display: none;
    }

    .page-loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: white;
      z-index: 100;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      color: #6c3c87;
    }

    .lds-roller,
    .lds-roller div,
    .lds-roller div:after {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
    }

    .lds-roller {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }

    .lds-roller div {
      -webkit-animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
      -webkit-transform-origin: 40px 40px;
      -ms-transform-origin: 40px 40px;
      transform-origin: 40px 40px;
    }

    .lds-roller div:after {
      content: " ";
      display: block;
      position: absolute;
      width: 7.2px;
      height: 7.2px;
      border-radius: 50%;
      background: currentColor;
      margin: -3.6px 0 0 -3.6px;
    }

    .lds-roller div:nth-child(1) {
      -webkit-animation-delay: -0.036s;
      animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
      top: 62.62742px;
      left: 62.62742px;
    }

    .lds-roller div:nth-child(2) {
      -webkit-animation-delay: -0.072s;
      animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
      top: 67.71281px;
      left: 56px;
    }

    .lds-roller div:nth-child(3) {
      -webkit-animation-delay: -0.108s;
      animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
      top: 70.90963px;
      left: 48.28221px;
    }

    .lds-roller div:nth-child(4) {
      -webkit-animation-delay: -0.144s;
      animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
      top: 72px;
      left: 40px;
    }

    .lds-roller div:nth-child(5) {
      -webkit-animation-delay: -0.18s;
      animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
      top: 70.90963px;
      left: 31.71779px;
    }

    .lds-roller div:nth-child(6) {
      -webkit-animation-delay: -0.216s;
      animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
      top: 67.71281px;
      left: 24px;
    }

    .lds-roller div:nth-child(7) {
      -webkit-animation-delay: -0.252s;
      animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
      top: 62.62742px;
      left: 17.37258px;
    }

    .lds-roller div:nth-child(8) {
      -webkit-animation-delay: -0.288s;
      animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
      top: 56px;
      left: 12.28719px;
    }

    @-webkit-keyframes lds-roller {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes lds-roller {
      0% {
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @media print {

      header,
      footer {
        display: none;
      }
    }
  </style>
</head>

<body <?php body_class('page'); ?>>
  <?php wp_body_open(); ?>
  <div class="page-loader">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
  </div>

  <header class="header__wrapper not_to_divide">
    <div class="header__container">

      <?php if ($field = get_field('logo_h', 'option')): ?>
        <div class="header__logo">
          <a href="<?= get_home_url() ?>">
            <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
              <img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            <?php endif ?>
          </a>
        </div>
      <?php endif ?>

      <?php $menu = wp_get_nav_menu_items(2) ?>

      <?php if ($menu): ?>
        <div class="header__mega_menu">
          <div class="mega_menu__mobile_toggle" data-action="toggle-show-hide-mega-menu"></div>
          <ul class="mega_menu__list" data-mega-menu >

            <?php foreach ($menu as $item): ?>

              <?php $child_menu = []; ?>
              <?php foreach ($menu as $item_2): ?>
                <?php if ($item_2->menu_item_parent == $item->ID) $child_menu[] = $item_2; ?>
              <?php endforeach ?>

              <?php if ($item->menu_item_parent === '0'): ?>
                <li class="mega_menu__item<?php if($child_menu) echo ' has_submenu' ?>">
                  <a href="<?= $item->url ?>" class="mega_menu__item_link<?php if($child_menu) echo ' has_submenu' ?>"<?php if($item->target) echo ' target="_blank"' ?>>
                    <?= $item->title ?>
                  </a>

                  <?php if ($child_menu): ?>
                    <button class="mega_menu__item_submenu-trigger"></button>
                    <ul class="mega_menu__item_submenu">

                      <?php foreach ($child_menu as $item_2): ?>
                        <li>
                          <a href="<?= $item_2->url ?>"<?php if($item_2->target) echo ' target="_blank"' ?>><?= $item_2->title ?></a>
                        </li>
                      <?php endforeach ?>

                    </ul>
                  <?php endif ?>

                </li>
              <?php endif ?>

            <?php endforeach ?>

          </ul>
        </div>
      <?php endif ?>

      <div class="header__side">
        <div class="site_search__btn" data-action="show-main-search">
          <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
            d="M8.5 16C10.275 15.9996 11.9988 15.4054 13.397 14.312L17.793 18.708L19.207 17.294L14.811 12.898C15.905 11.4997 16.4996 9.77544 16.5 8C16.5 3.589 12.911 0 8.5 0C4.089 0 0.5 3.589 0.5 8C0.5 12.411 4.089 16 8.5 16ZM8.5 2C11.809 2 14.5 4.691 14.5 8C14.5 11.309 11.809 14 8.5 14C5.191 14 2.5 11.309 2.5 8C2.5 4.691 5.191 2 8.5 2Z"
            fill="white"></path>
          </svg>
        </div>
      </div>
    </div>

    <?php get_search_form() ?>
    
  </header>

  <main id="app">

    <?php if (function_exists('bcn_display') && !is_front_page()): ?>
    <div class="bread-wrapper-top">
      <div class="container">
        <div class="bread-wrapper">
          <div class="bread-inner">
            <?php bcn_display() ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>