<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Medic | Medical HTML Template</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">

    <?php wp_head(); ?>
</head>


<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->

<?php


?>

<!--header top-->
<div class="header-top">
      <div class="container clearfix">
            <?php if( ! empty(cs_get_option('header_text')) ) : ?>
            <div class="top-left">
                  <h6><?php echo esc_attr(cs_get_option('header_text')); ?></h6>
            </div>
            <?php endif; ?>

      <?php
            $icons = cs_get_option( 'header_social_icons' );
            if( $icons !== NULL ) :
            ?>
            <div class="top-right">
                  <ul class="social-links">
                        <?php foreach($icons as $icon) : ?>
                        <li>
                              <a href="<?php echo esc_url($icon['social_link']); ?>">
                                    <i class="<?php echo esc_attr($icon['social_icon']); ?>" aria-hidden="true"></i>
                              </a>
                        </li>
                        <?php endforeach; ?>
                  </ul>
            </div>
            <?php endif; ?>

      </div>
</div>
<!--header top-->

<!--Header Upper-->
<section class="header-uper">
      <div class="container clearfix">
                  
            <?php get_medic_logo(); ?>


            <div class="right-side">
                  <ul class="contact-info">
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-envelope-o"></i>
                              </div>
                              <strong>Email</strong>
                              <br>
                              <a href="#">
                                    <span>info@medic.com</span>
                              </a>
                        </li>
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                              </div>
                              <strong>Call Now</strong>
                              <br>
                              <span>+ (88017) - 123 - 4567</span>
                        </li>
                  </ul>
                  <div class="link-btn">
                        <a href="#" class="btn-style-one">Appoinment</a>
                  </div>
            </div>
      </div>
</section>
<!--Header Upper-->


<!--Main Header-->
<nav class="navbar navbar-default">
      <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                  </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <?php
                        wp_nav_menu([
                              'theme_location'  => 'header-menu',
                              'menu_class'      => 'nav navbar-nav'
                        ]);
                  ?>

            </div>
            <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
<!--End Main Header -->