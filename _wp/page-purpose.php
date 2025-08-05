<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<?php get_template_part("parts/header"); ?>
	<?php
		$purpose_ttl_en = SCF::get('purpose_ttl_en', 150);
		$purpose_ttl_jp = SCF::get('purpose_ttl_jp', 150);
		$purpose_sub_ttl = SCF::get('purpose_sub_ttl', 150);
		$purpose_desc = SCF::get('purpose_desc', 150);

		$vision_ttl_en = SCF::get('vision_ttl_en', 150);
		$vision_ttl_jp = SCF::get('vision_ttl_jp', 150);
		$vision_sub_ttl = SCF::get('vision_sub_ttl', 150);
		$vision_desc = SCF::get('vision_desc', 150);
		$vision_sub_ttl01 = SCF::get('vision_sub_ttl01', 150);
		$vision_sub_dec01 = SCF::get('vision_sub_dec01', 150);
		$vision_sub_ttl02 = SCF::get('vision_sub_ttl02', 150);
		$vision_sub_dec02 = SCF::get('vision_sub_dec02', 150);
		$footer_contents = SCF::get('footer_contents', 13);

	?>
	<article id="purpose" class="page-purpose">
		<section class="section-purpose">
			<div class="section_inner">
				<div class="purpose_contents_flex">
					<div class="comp-section-title white">
						<span class="ttl_en"><?= $purpose_ttl_en;?></span>
						<h1 class="ttl_jp"><?= $purpose_ttl_jp;?></h1>
					</div><!-- comp-index-ttl -->
					<div class="purpose_txt_wrap">
						<h3 class="purpose_ttl"><?= $purpose_sub_ttl;?></h3>
						<div class="purpose_desc">
							<?= $purpose_desc;?>
						</div>
					</div>
				</div><!-- purpose_contents_flex -->
			</div><!-- section_inner -->
		</section>
		<section class="section-vision">
			<div class="sticky_wrapper">
				<div class="section_inner">
					<div id="slide02" class="vision_ttl_flex">
						<div class="ttl_wrap">
							<div class="comp-section-title white">
								<span class="ttl_en"><?= $vision_ttl_en;?></span>
								<h2 class="ttl_jp"><?= $vision_ttl_jp;?></h2>
							</div>
						</div>
						<div class="contents_wrap">
							<h3 class="comp-sub-title white"><?= $vision_sub_ttl;?></h3>
							<div class="vision_desc">
								<?= $vision_desc;?>
							</div>
						</div>
					</div>
					<div id="slide03" class="comp-vision-contents">
						<div class="vision_item">
							<h4 class="vision_ttl"><?= $vision_sub_ttl01;?></h4>
							<div class="vision_desc">
								<p><?= $vision_sub_dec01;?></p>
							</div>
						</div>
						<div class="vision_item">
							<h4 class="vision_ttl"><?= $vision_sub_ttl02;?></h4>
							<div class="vision_desc">
								<p><?= $vision_sub_dec02;?></p>
							</div>
						</div>
					</div>
				</div><!-- section_inner -->
			</div><!-- sticky_wrapper -->
		</section>
		<section id="slide04" class="section-value">
			<div class="sticky_wrapper">
				<div class="section_inner">
					<div class="value_icon">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/common/icon_ship.svg">
					</div>
					<div class="desc_wrapper">
						<div class="value_desc">
							<p><?= $footer_contents;?></p>
						</div>
						<div class="comp-button-wrapper">
							<div class="button_item">
								<a class="white" href="/recruit#valueSection">SrushのValueを見る</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
