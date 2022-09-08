<?php get_header(); ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php bloginfo("template_url"); ?>/img/wedding_2022021110.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 style="background: #1e2a3d; padding: 20px; border-radius: 10px; transform: rotate(-2deg); opacity: 0.8" >Erkek Gömlek Modellerimiz İçin;</h5>
          <center><a style="text-decoration: none" href="https://byshirtscollection.com/urun-kategori/erkek/"><button class="button-53" role="button">TIKLAYIN!</button></a></center>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php bloginfo("template_url"); ?>/img/desktop_split_womens_2022041111.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5 style="background: #1e2a3d; padding: 20px; border-radius: 10px; transform: rotate(-2deg); opacity: 0.8" >Kadın Gömlek Modellerimiz İçin;</h5>
          <center><a style="text-decoration: none" href="https://byshirtscollection.com/urun-kategori/kadin/"><button class="button-53" role="button">TIKLAYIN!</button></a></center>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    
    <div class="look" style=" font-size: 20px; text-align: center; color:white; background: #1e2a3d; padding: 30px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="ads">
            <i class="fa-solid fa-helmet-safety"></i><br><a style="font-size: 15px">&nbsp;Kaliteli İşçilik</a>
          </div>
          </div>
          <div class="col-lg-3">
            <div class="ads">
            <i class="fa-solid fa-circle-check"></i><br><a style="font-size: 15px">&nbsp;Maksimum Güvenirlik</a>
          </div>
          </div>
          <div class="col-lg-3">
            <div class="ads">
            <i class="fa-solid fa-shirt"></i><br><a style="font-size: 15px">&nbsp;Özel Tasarımlar</a>
          </div>
          </div>
          <div class="col-lg-3">
            <div class="ads">
            <i class="fa-solid fa-hand-holding-dollar"></i><br><a style="font-size: 15px">&nbsp;Uygun Fiyat Garantisi</a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <?php
        $args = array(
          'post_type' => 'product',
          'orderby' => 'date',
          'post_per_page' => -1 
        ); 
        $dongu1 = new WP_Query($args);
        while($dongu1->have_posts(  )): $dongu1-> the_post(  ); ?>
        <div class="col-lg-4">
          <center>
          <div class="main-content" itemscope itemtype="https://schema.org/Product">
            <div class="card rounded shadow-sm border-0">
              <div class="card-body p-4"><center><a href="<?php the_permalink(); ?>"><div itemprop="image" class="image"><?php if(has_post_thumbnail( $dongu1->post->ID)): 
                echo get_the_post_thumbnail($dongu1->post->ID,'shop_catalog'); ?>
                <?php else:?> Ürün Görseli Yok! <?php endif; ?></div></a></center>
                  <?php /* $regularprice = (float)$product->get_regular_price(); 
$discountedprice = (float)$product->get_price();

$discountrate = round(100-$discountedprice / $regularprice * 100, 1) . '%'
*/
?>
                <!-- <span style="padding: 10px" class="badge"<?php echo $discountrate . " İndirim"; ?></span><br> -->

                <span itemprop="price" style="color: white" class="badge main-page-price"><?php echo $product->get_price_html();  ?></span>
                <h5> <a itemprop="name" href="<?php the_permalink() ?>" class="text-dark main-title"><?php the_title(); ?></a></h5>
                <p class="small text-muted font-italic"></p>
              </div>
            </div>
          <!-- HTML !--><a href ="<?php the_permalink(); ?>">
          <button class="button-52" role="button">Ürüne Göz Gezdir!</button></a>
</center>
        </div>
        <?php endwhile ?>
    
        </div>
      </div>
    <section class="deneb_cta">
      <div class="container">
        <div class="cta_wrapper">
          <div class="row align-items-center">
            <div class="col-lg-7">
              <div class="cta_content">
                <h3>Biz Kimiz?</h3>
                <p>2020 yılında kendi tasarımımız ve üretimimiz olan gömleklerimizi satışa sunmaya başladık. İleri ki yıllarımızda da en iyi tasarımlarımızla ve üretimlerimizle sizlerin karşısına çıkmaktan onur duyuyoruz.</p>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="button_box">
                <a href="https://byshirtscollection.com/iletisim/" class="btn btn-warning">Bizimle iletişim kur</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>