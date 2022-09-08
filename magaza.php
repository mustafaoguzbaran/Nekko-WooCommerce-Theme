<?php
/*
Template Name: Shop
*/
?>
<?php get_header(); ?>
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
          <div class="main-content">
            <div class="card rounded shadow-sm border-0">
              <div class="card-body p-4"><center><a href="<?php the_permalink(); ?>"><div class="image"><?php if(has_post_thumbnail( $dongu1->post->ID)): 
                echo get_the_post_thumbnail($dongu1->post->ID,'shop_catalog'); ?>
                <?php else:?> Ürün Görseli Yok! <?php endif; ?></div></a></center>
                  <?php $regularprice = (float)$product->get_regular_price(); 
$discountedprice = (float)$product->get_price();

$discountrate = round(100-$discountedprice / $regularprice * 100, 1) . '%'

?>
                <span style="padding: 10px" class="badge"><?php echo $discountrate . " İndirim"; ?></span><br>

                <span style="color: white" class="badge main-page-price"><?php echo $product->get_price_html();  ?></span>
                <h5> <a href="<?php the_permalink() ?>" class="text-dark main-title"><?php the_title(); ?></a></h5>
                <p class="small text-muted font-italic"></p>
              </div>
            </div>
          <!-- HTML !-->
         <form class="cart" action="" method="post" enctype="multipart/form-data">
          <?php do_action('woocommerce_before_add_to_cart_button'); ?>
          <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="button-52"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
         </form> 
</center>
        </div>
        <?php endwhile ?>
    
        </div>
      </div>
<?php get_footer(); ?>