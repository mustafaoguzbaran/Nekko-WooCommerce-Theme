<?php
/*
Template Name: blog
*/
?>
<?php get_header(); ?>,
<div class="container">
      <div class="row">
      <?php query_posts('showposts=5&orderby=date&cat=39'); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-lg-3">
          <center>
          <div class="main-content">
            <div class="card rounded shadow-sm border-0">
              <div class="card-body p-4"><center><?php the_post_thumbnail(); ?></center>
                <span class="badge"><a><?php
foreach((get_the_category()) as $category) {
echo $category->cat_name . ' ';
}
?></a></span><br>
                <h5> <a href="<?php the_permalink() ?>" class="text-dark main-title"><?php the_title(); ?></a></h5>
                <p class="small text-muted font-italic"></p>
              </div>
            </div>
          <!-- HTML !-->
          
<button onclick=" window.open('<?php the_permalink(''); ?>','_blank')" class="button-52" role="button">Blog Yazısını Görüntüle</button>
</center>
        </div>
        <?php endwhile; else : endif; wp_reset_query(); ?>

        </div>
      </div>
<?php get_footer(); ?>
