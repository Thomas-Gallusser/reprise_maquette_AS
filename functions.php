<?php
add_action("admin_menu", "add_product_menu");

function add_product_menu() {
   add_menu_page("Take - Configuration","Ajouter un produit","manage_options", "takeadd_product", "add_product");
}

wp_register_style('add-product-css', get_bloginfo('template_directory') . '/product.css');
wp_enqueue_style('add-product-css');

wp_register_script('add-product-js', get_bloginfo('template_directory') . '/product.js');
wp_enqueue_script('add-product-js');

function add_product() {
   global $title;

   ?>
   <div id="wrap" class="wrap">
     <!------------------------------------------------------------------------------------------>
    <form class="" action="" method="post">
      <input type='hidden' name='action' value='submitform'/>
      <input type='submit' name='btn' value='test'/>
    </form>
     <!------------------------------------------------------------------------------------------>
   </div>

   <?php
}
