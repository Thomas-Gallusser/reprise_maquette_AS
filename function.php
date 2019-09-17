add_action('admin_menu', 'custom_menu');

function custom_menu() {
  add_menu_page(
      'Page Title',
      'Menu Title',
      'edit_posts',
      'menu_slug',
      'page_callback_function',
      'dashicons-media-spreadsheet'

     );
}
