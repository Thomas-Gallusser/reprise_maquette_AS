<?php
add_action("admin_menu", "add_product_menu");

function add_product_menu() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

}
