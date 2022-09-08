<?php $site_logo = get_field('site_logosu', 'option'); ?>
<style type="text/css">
.wp-menu-separator, .update-nag {
    display: none;
}
body.wp-admin {
    background-attachment: fixed;
 background-image: url(<?php echo $site_logo['url'];?>) !important;
    background-position: right 20px bottom 20px;
    background-repeat: no-repeat;
    background-size: calc(116px) auto;
}
</style>