<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<?php get_template_part("parts/header"); ?>
	<?php
		$vision_ttl_en = SCF::get('vision_ttl_en', 150);
		$vision_ttl_jp = SCF::get('vision_ttl_jp', 150);
		$vision_sub_ttl = SCF::get('vision_sub_ttl', 150);
		$vision_desc = SCF::get('vision_desc', 150);
		$vision_sub_ttl01 = SCF::get('vision_sub_ttl01', 150);
		$vision_sub_dec01 = SCF::get('vision_sub_dec01', 150);
		$vision_sub_ttl02 = SCF::get('vision_sub_ttl02', 150);
		$vision_sub_dec02 = SCF::get('vision_sub_dec02', 150);

		$value_ttl_en = SCF::get('value_ttl_en', 89);
		$value_ttl_jp = SCF::get('value_ttl_jp', 89);
		$value_sub_ttl = SCF::get('value_sub_ttl', 89);
		$value_description = SCF::get('value_description', 89);

		$message_contents = SCF::get('message_contents', 89);

		$recruit_info_links = SCF::get('recruit_info_links', 89);


	?>
	<article id="recruit" class="page-recruit">
		<section class="section-main">
			<div class="section_inner">
				<div class="comp-section-title white">
					<span class="ttl_en">Recruit</span>
					<h1 class="ttl_jp">採用情報</h1>
					<div class="ttl_desc">
						<p>Srushではカルチャーに共感し、<span>一緒に働く仲間を募集しています。</span></p>
					</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-vision">
			<div class="section_inner">
				<div class="vision_ttl_flex">
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
				</div><!-- vision_ttl_flex -->
				<div class="comp-vision-contents">
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
				</div><!-- comp-vision-contents -->
				<div class="comp-button-wrapper">
					<div class="button_item">
						<a target="_blank" class="white" href="https://n.srush.io/srush-recruit">採用情報を見る</a>
					</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section id="valueSection" class="section-value">
			<div class="section_inner">
				<div class="value_ttl_flex">
					<div class="comp-section-title white">
						<span class="ttl_en"><?= $value_ttl_en;?></span>
						<h2 class="ttl_jp"><?= $value_ttl_jp;?></h2>
					</div>
					<h3 class="comp-sub-title white"><?= $value_sub_ttl;?></h3>
					<div class="visiton_ttl_icon">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/common/icon_ship.svg">
					</div>
				</div><!-- value_ttl_flex -->
				<div class="value_contents_flex">
					<div class="img_wrap">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/recruit/vision.gif">
					</div>
					<div class="value_desc">
						<?= $value_description;?>
					</div>
				</div><!-- value_contents_flex -->
				<div class="value_footer">
					<h4 class="recruit_ttl">SrushのCultureに共感できる<br>仲間を求めています。</h4>
					<div class="comp-button-wrapper">
					<div class="button_item">
						<a target="_blank" class="white" href="https://n.srush.io/srush-recruit">採用情報を見る</a>
					</div>
				</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section id="headerBlueSection" class="section-message">
			<div class="section_inner">
				<div class="comp-message-wrap">
					<?php foreach ($message_contents as $d):?>
					<?php if ($d['message_ttl_en']):?>
					<div class="message_item">
						<div class="comp-section-title">
							<span class="ttl_en"><?= $d['message_ttl_en'];?></span>
							<h2 class="ttl_jp"><?= $d['message_ttl_jp'];?></h2>
						</div>
						<h3 class="comp-sub-title"><?= $d['message_sub_ttl'];?></h3>
						<div class="message_desc">
							<?= $d['message_desc'];?>
						</div>
						<div class="member_img">
							<img
								class="<?= $d['media_size'];?>"
								src="<?= wp_get_attachment_image_src($d['message_profile_img'], 'large')[0] ?>"
								srcset="<?= wp_get_attachment_image_src($d['message_profile_img'], 'large')[0] ?> 1440w, <?= wp_get_attachment_image_src($d['message_profile_img'], 'thumbnail')[0] ?> 768w, <?= wp_get_attachment_image_src($d['message_profile_img'], 'large')[0] ?> 2048w"
							>
						</div>
						<div class="member_name">
							<div class="name_flex">
								<h4 class="name_jp"><?= $d['message_name_jp'];?></h4>
								<span class="name_en"><?= $d['message_name_en'];?></span>
							</div>
							<div class="position"><?= $d['message_position'];?></div>
						</div>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
				</div><!-- comp-message-wrap -->
			</div><!-- section_inner -->
		</section>
		<section class="section-recruit">
			<div class="section_inner">
				<div class="comp-section-title">
					<span class="ttl_en">Recruit<span>Information</span></span>
					<h2 class="ttl_jp">採用情報</h2>
				</div>
				<div class="comp-recruit-info">
					<?php foreach ($recruit_info_links as $d):?>
						<?php if ($d['recruit_ttl_en']):?>
						<div class="recruit_item">
							<div class="comp-section-title white">
								<span class="ttl_en"><?= $d['recruit_ttl_en'];?></span>
								<h2 class="ttl_jp"><?= $d['recruit_ttl_jp'];?></h2>
							</div>
							<div class="recruit_desc">
								<p><?= $d['recruit_desc'];?></p>
							</div>
							<div class="comp-rounded-button">
								<a target="_blank" href="<?= $d['recruit_link'];?>"><?= $d['recruit_b_txt'];?></a>
							</div>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div><!-- comp-recruit-info -->
			</div><!-- section_inner -->
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
