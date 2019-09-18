<?php
add_action("admin_menu", "add_product_menu");

function add_product_menu() {
   add_menu_page("Take - Configuration","Ajouter un produit","manage_options", "takeadd_product", "add_product");
}

// Chargement du CSS de la page product
wp_register_style('add-product-css', get_bloginfo('template_directory') . '/product.css');
wp_enqueue_style('add-product-css');

// Chargement du script de la page product
wp_register_script('add-product-js', get_bloginfo('template_directory') . '/product.js');
wp_enqueue_script('add-product-js');

// Chargement de JQUERY
wp_register_script('add-jquery-js', 'https://code.jquery.com/jquery-3.4.1.js');
wp_enqueue_script('add-jquery-js');

function add_product() {
   global $title;

   ?>
   <div id="wrap" class="wrap customCss">
     <!------------------------------------------------------------------------------------------>
    <form class="" action="test()" method="post">
      <input type='hidden' name='action' value='submitform'/>
      <input type='button' id='btn' name='btn' value='test' onClick='test()'/>
    </form>
     <!------------------------------------------------------------------------------------------>
   </div>

   <?php
}
