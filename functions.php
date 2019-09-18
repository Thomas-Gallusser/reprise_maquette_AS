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
    <form class="postProduct">
      <input type='text' id='tag' placeholder='TAG'/><br/>
      <input type='text' id='title' placeholder='Titre'/><br/>
      <input type='text' id='comment' placeholder='Commentaire'/><br/>
      <input type='text' id='price' placeholder='Prix'/><br/>
      <input type='hidden' id='img64' value=''/>
      <input type='file' id='img' class='envoieImg'/><br/>
      <input type='button' id='btn' name='btn' value='Ajouter le produit' onClick='envoieProduct()'>
    </form>
     <!------------------------------------------------------------------------------------------>
   </div>

   <?php
}
