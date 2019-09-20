<?php
  $mysqli = new mysqli("localhost", "root", "","maquette_take") or die("Connect failed: %s\n". $conn -> error);
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="author" lang="fr" content="Solange Harmonie PICARD, Antoni SALOMON">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo get_bloginfo('name'); ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo get_bloginfo('template_directory');?>/style.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png">
  <!--googlefont-->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
  <header class="header min-vh-100">
    <div class="container logo">
      <a href="#">
        <?php if(has_custom_logo()) the_custom_logo(); ?>
      </a>
    </div>
    <div class="container title text-white" id="titlepic">
      <h1 id="picperf"><?php echo get_bloginfo('name'); ?></h1>
      <p id="pictext"><?php echo get_bloginfo('description'); ?></p>
    </div>
  </header>

<?php
  $titleL = "";
  $titleR = "";
  $titre = "";
  if (have_posts()) : while (have_posts()) : the_post();
	if (has_term('first_left', 'category')) :
    $titleL .= get_the_content();
    $titre = '<h2 class="pt-5 mb-4">' . get_the_title() . '</h2>';
  endif;

	if (has_term('first_right', 'category')) :
    if (has_post_thumbnail())  $titleR .= '<img src="' . get_bloginfo('template_directory') . '/img/ipone.png" alt="ipone" id="ipone">';
    $titleR .= get_the_content();
  endif; endwhile; endif;

  if (strlen($titleL) > 0) {
    echo'<section class="projects">
      <article class="container">
        <div class="container px-lg-5">' . $titre . '<div style="font-size:14px;" class="row mx-lg-n5">
        <div class="col py-3 px-lg-5">'. $titleL .'</div>
        <div class="col py-3 px-lg-5">'. $titleR .'</div>
        </div>
      </div>
    </article>
  </section>';
  }


  $works = "";
  if (have_posts()) : while (have_posts()) : the_post();
	if (has_term('Works', 'category')) : $works .= '<div class="cadrebg col-md-12 col-lg-6 p-3"';

  if (has_post_thumbnail()) $works .=  ' style="background:url(' . get_the_post_thumbnail_url() . ')">'; else  $works .= ' style="background-color:' . sprintf('#%06X', mt_rand(0, 0xFFFFFF)) . ';">';


  $works .= '<h3>' . get_the_title() . '</h3>
    <p>' . get_the_content() . '</p>';

    if (get_post_meta(get_the_ID(), 'url', true) != null){
      $works .= '<button type="button" class="btn btn-primary custom-btn btn-sm" onclick="window.location.href=\'' . get_post_meta(get_the_ID(), "url", true) . '\'">Find Out More &rarr;</button>';
    }
  $works .= '</div>';
  endif; endwhile; endif;

  if (strlen($works) > 0) {
    echo'<!--harmo : side-by-side gallery-->
    <section class="cadres">
      <article class="patchwork text-light pt-5 pl-5 pr-5">
        <div id="cards-right" class="row">'. $works .'</div>

    </div>
  </article>';
  }


  $skills = "";
  if (have_posts()) : while (have_posts()) : the_post();
	if (has_term('Skills', 'category')) : $skills .= '<aside class="web col-12 col-md-6 col-lg-3">
    <h4>' . get_the_title() . '</h4>
    <p class="text-secondary">' . get_the_content() . '</p>
  </aside>';
  endif; endwhile; endif;

  if (strlen($skills) > 0) {
    echo'<article class="details container p-5">
      <h2>A look at details</h2>
      <div class="small_articles row">'. $skills .'</div>
    </article>
  </section>';
  }




  $floatText = "";
  if (have_posts()) : while (have_posts()) : the_post();
	if (has_term('txt_flottant', 'category')) : $floatText .= '<h2 class="text-white display-4">' . get_the_title() . '</h2>
    <p class="text-white">' . wp_strip_all_tags(get_the_content()) . '</p>';

  if (get_post_meta(get_the_ID(), 'url', true) != null){
    $floatText .= ' <button type="button" class="btn btn-primary custom-btn btn-sm" onclick="window.location.href=\'' . get_post_meta(get_the_ID(), "url", true) . '\'">Find Out More &rarr;</button>';
  }
  endif; endwhile; endif;

  if (strlen($floatText) > 0) {
    echo'<section class="second-box min-vh-100">
        <article class="container d-flex flex-column align-content-center">
          <div class="row flex-grow-1 d-flex align-items-end flt">
            <div class="col-10" id="bottom-position">' . $floatText . '</div>
          </div>
        </article>
      </section>';
  }


  $reasons = "";
  if (have_posts()) : while (have_posts()) : the_post();
	if (has_term('Reasons', 'category')) : $reasons .= '<aside class="web_based col-md-4 text-white pt-4 pb-4"><h4>' . get_the_title() . '</h4><p>' . get_the_content() . '</p></aside>';
  endif; endwhile; endif;

  if (strlen($reasons) > 0) {
    echo'<section class="information">
      <article class="reasons container">
        <h3 class="text-white pt-5 pb-4">Reasons to get onbaord</h3>
        <div class="row d-flex align-items-end">
          '. $reasons .'
        </div>
      </article>
    </section>';
  }

  $products = "";
  if (have_posts()) : while (have_posts()) : the_post();
    if (has_term('vente', 'category')) : $products .= '<div class="col-12 col-md-12 col-lg-6 cadres">
      <div class="col-12 px-0 imgFond"';
      if (has_post_thumbnail()) $products .=  'style="background:url(' . get_the_post_thumbnail_url() . ') no-repeat;">'; else  $products .= '>';
      $products .= '<div class="nocolor">
        <span class="purple-bg">' . get_the_tags(get_the_ID())[0]->name . '</span>
        <h2 class="solo1">' . get_the_title() . '</h2>
        <p class="solo2">' . get_the_content() . '</p>';

        if (get_post_meta(get_the_ID(), 'url', true) != null){
          if (get_post_meta(get_the_ID(), 'Prix', true) != null){
            $products .= '<button type="button" id="gbut" class="btn btn-success" onclick="window.location.href=\'' . get_post_meta(get_the_ID(), "url", true) . '\'">Buy now $' . get_post_meta(get_the_ID(), "Prix", true) . '</button>';
          } else {
            $products .= '<button type="button" id="gbut" class="btn btn-success" onclick="window.location.href=\'' . get_post_meta(get_the_ID(), "url", true) . '\'">GET IT FREE</button>';
          }
        }
        $products .= '</div>
      </div>
    </div>';
  endif; endwhile; endif;

    if (strlen($products) > 0) {
      echo'<!-- Anto Products col-->
    <section class="products">
      <div class="container">
        <div class="row p-5">
          '. $products .'
        </div>
      </div>
    </section>';
    } ?>

  <!--FOOTER -->
  <footer class="end">
    <div class="blabla container">
      <div class="row d-flex pt-5">
        <div class="left col-sm-12 col-md-12 col-lg-6 pb-5 pl-2">
          <div class="get_in_touch text-white align-items-center pt-5">
            <?php if (have_posts()) : while (have_posts()) : the_post();
            	if (has_term('Footer', 'category')) : ?>
            		<!-- Mon article ici -->
            		<h4 class="pb-4"><?php the_title(); ?></h4>
            		<p class="font-weight-light"><?php the_content(); ?></p>
            	<?php endif; endwhile; else : ?>
            	<!-- Pas d'articles: -->
            	<h4 class="pb-4"></h4>
            	<p class="font-weight-light"></p>
            <?php endif; ?>
          </div>
          <div class="us row pt-4">
            <aside class="resources text-white col-sm-12 col-md-12 col-lg-4">
              <h5>Resources</h5>
              <div class="contents pt-3 d-flex flex-column">
                <a href="#" class="text-white">Tour</a>
                <a href="#" class="text-white">Customers</a>
                <a href="#" class="text-white">Pricing and Plans</a>
                <a href="#" class="text-white">New Features</a>
                <a href="#" class="text-white">Education</a>
              </div>

            </aside>
            <aside class="features text-white col-sm-12 col-md-12 col-lg-4">
              <h5>Features</h5>
              <div class="contents pt-3 d-flex flex-column">
                <a href="#" class="text-white">Tour</a>
                <a href="#" class="text-white">Customers</a>
                <a href="#" class="text-white">Pricing and Plans</a>
                <a href="#" class="text-white">New Features</a>
                <a href="#" class="text-white">Education</a>
              </div>
            </aside>
            <aside class="how_to text-white col-12 col-md-12 col-lg-4">
              <h5>How To's</h5>
              <div class="contents pt-3 d-flex flex-column">
                <a href="#" class="text-white">Tour</a>
                <a href="#" class="text-white">Customers</a>
                <a href="#" class="text-white">Pricing and Plans</a>
                <a href="#" class="text-white">New Features</a>
                <a href="#" class="text-white">Education</a>
              </div>
            </aside>
          </div>
        </div>

        <div class="right col-sm-12 col-md-12 col-lg-6">
          <div class="form pt-5">
            <h4 class="text-white pb-4">Stay in touch</h4>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="username" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btnHov" type="button" id="button-addon2"><i class="fas fa-check text-white"></i></button>
              </div>
            </div>
            <p class="spam_info text-secondary">We don't send spam. Actually, who are we kiding, we'll spam the shit out of your inbox</p>
          </div>

          <div class="made_by text-white pt-5">
            <p>Free Template by FreeTemplates.pro</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://kit.fontawesome.com/6fee70888d.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/script.js"></script>

</body>

</html>
