<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-color: #eff1f8">
    <div class="card headbar" style=" font-size: 15px; padding: 7px;border: none; background-color: #1e2a3d; border-radius: 0;  color: white;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-9">
          <div class="notice">
    <a style="margin-left: 5px;"><i class="fa-solid fa-bullhorn"></i> <?php the_field('duyuru_alani', 'option'); ?></a></div>
    </div>
    <div class="col-lg-3">
      <?php if(is_user_logged_in()) {

        $user = wp_get_current_user();
        ?>
        <div class="current-user-menu">
        <a style="text-decoration: none; color: white;" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><?php echo 'Hoş geldin, '. $user->display_name; ?></a>
        <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Çıkış Yap" class="logout">Çıkış Yap</a>
        </div>
        <?php
      }else{
         ?>
         <div class="register">
        <a style="text-align: center; background-color: #ffbd27; padding: 5px;border-radius: 5px; color: black;text-decoration: none;" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">Üye Ol / Giriş Yap</a>
         </div>
        <?php
      }
      ?>

     
    </div>
      </div>
    </div>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <center>
          <div class="location">
       <i class="fa-solid fa-language" style="font-size: 13px;"></i><a><?php echo do_shortcode('[gtranslate]'); ?></a>
          <i style="font-size: 13px;" class="fa-solid fa-location-dot"></i><a style="font-size: 10px;"> Made in Istanbul / Turkey&nbsp;&nbsp;&nbsp;</a>
          <i style="font-size: 13px" class="fa-solid fa-phone"></i><a style="font-size: 10px;"> +90 530 231 47 21</a>
        </div>
          </center>
      </div>
          <div class="col-lg-4">
            <center><a href="<?php bloginfo('url'); ?>"><img style="width: 250px; padding-top: 35px;" src="<?php bloginfo("template_url"); ?>/img/logo4.png" class="d-block" alt="..."></a></center>
          </div>
         <div class="col-lg-4">
           <div class="byshirts-cart">
  <i class="fa-solid fa-cart-shopping"></i>    <span class="current-cart">
    <a style="color:#1e2a3d" href="<?php echo wc_get_cart_url(); ?>"> Sepetinizde şuan <b><?php echo WC()->cart->cart_contents_count; ?></b> ürün var <b><?php echo WC()->cart->get_cart_total(); ?></b></a></span>
        </div>
          </a>
         </div>
       
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        
        <button class="navbar-toggler" style="border:none;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <div class="menu-button" style="background-color:#1e2a3d; padding: 20px"><i class="fa-solid fa-ellipsis-vertical"></i> MENU</a></div>
        </button>
        <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php bloginfo('url'); ?>">Anasayfa</a>
            </li>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Gömlek Modellerimiz
        </a>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="https://byshirtscollection.com/urun-kategori/erkek/">Erkek Gömlek Modellerimiz</a></li>
            <li><a class="dropdown-item" href="https://byshirtscollection.com/urun-kategori/kadin/">Kadın Gömlek Modellerimiz</a></li>
          </ul>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="https://byshirtscollection.com/blog/">Blog</a>
            </li>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         Kurumsal
        </a>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="https://byshirtscollection.com/gizlilik-ve-guvenlik/">Gizlilik ve Güvenlik</a></li>
            <li><a class="dropdown-item" href="https://byshirtscollection.com/satis-sozlesmesi/">Satış Sözleşmesi</a></li>
            <li><a class="dropdown-item" href="https://byshirtscollection.com/uyelik-sozlesmesi/">Üyelik Sözleşmesi</a></li>
            <li><a class="dropdown-item" href="https://byshirtscollection.com/teslimat-ve-iade-sartlari/">Teslimat ve İade Şartları</a></li>
          </ul>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="https://byshirtscollection.com/hakkimizda/">Hakkımızda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://byshirtscollection.com/iletisim/">İletişim</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>