<?php
add_action('admin_menu', 'add_tag_img');
add_action('after_setup_theme','add_logo');

function add_tag_img() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}

function add_logo() {
  add_theme_support('custom-logo');
}
