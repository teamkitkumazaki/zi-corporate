<?php $url = $_SERVER['REQUEST_URI']; ?>

<div id="background" class="comp-page-background">
	<div id="particleWrap" class="partlcle_wrap"></div>
	<div id="imgWrapper" class="img_wrapper">
		<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/common/background.jpg">
		<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/common/background_pc.jpg">
	</div>
	<?php if( is_home() || is_front_page() ) : ?>
	<div id="overlay01" class="img_overlay overlay01">
		<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/main_bg.png">
		<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/main_bg_pc.png">
	</div>
	<div id="overlay02" class="img_overlay overlay02">
		<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/purpose_bg.png">
		<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/purpose_bg_pc.png">
	</div>
	<?php endif;?>

	<?php if(strstr($url,'purpose')) : ?>
		<div id="overlay01" class="img_overlay overlay01">
			<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg01.jpg">
			<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg01_pc.jpg">
		</div>
		<div id="overlay02" class="img_overlay overlay02">
			<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg02.jpg">
			<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg02_pc.jpg">
		</div>
		<div id="overlay03" class="img_overlay overlay03">
			<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg01.jpg">
			<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg03_pc.jpg">
		</div>
		<div id="overlay04" class="img_overlay overlay04">
			<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/purpose/purpose_bg04.png">
		</div>
	<?php endif;?>
</div>
