<?php $url = $_SERVER['REQUEST_URI']; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/layout.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/slick.js"></script>
<?php if(strstr($url,'contact')) : ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/assets/js/contact.js?<?php echo date('Ymd-Hi');?>"></script>
<?php endif;?>
<?php wp_footer();?>
