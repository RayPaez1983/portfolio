<?php 
    global $post; 
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
  <head>
    <?php $site_name = get_bloginfo( 'name' ); ?>
    <title><?php echo $site_name; ?></title>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="description" content="DESCRIPTION_SITE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="wow" href="css/animate.css">
     
    <?php wp_head(); ?>
  </head>

  <body>
    <div id="wptime-plugin-preloade"></div>
    <header class="o-header">
      <div class="container">
        <div class="grid-spaceBetween-middle">
          <div class="o-header__brand col-shrink">
            <a href="#fredy">
              <h1 class="name">Freddy Paez</h1>
            </a>
          </div>   
          <div class="o-header__button-toggle col-expand"> 
            <button class="hamburger hamburger--emphatic" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>        
          <nav class="o-header__navigation col-expand">
            
            <ul>
               <li class="about"><a href="#about">About</a></li>
               <li class="services"><a href="#services">Services</a></li>
               <li class="portfolio"><a href="#portfolio">Porfolio</a></li> 
               <li class="contact"><a href="#contact">Contact</a></li>
             </ul>
          </nav>
        </div>
    </header>