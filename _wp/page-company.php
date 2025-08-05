<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<?php get_template_part("parts/header"); ?>
	<?php
		$corporate_info = SCF::get('corporate_info', 150);
		$board_member = SCF::get('board_member', 6);
		$member_link = SCF::get('member_link', 6);

	?>
	<article id="company" class="page-company">
		<section class="section-main comp-underpage-ttl">
			<div class="main_inner">
				<div class="comp-section-title white">
					<span class="ttl_en">Company</span>
					<h1 class="ttl_jp">会社概要</h1>
				</div><!-- comp-section-title -->
			</div><!-- main_inner -->
		</section>
		<section id="headerBlueSection" class="section-company-profile">
			<div class="section_inner">
				<div class="comp-company-profile">
					<?php foreach ($corporate_info as $d):?>
						<?php if ($d['profile_ttl']):?>
						<div class="profile_item">
							<h3 class="profile_ttl"><?= $d['profile_ttl'];?></h3>
							<div class="profile_content">
								<p><?= $d['profile_desc'];?></p>
							</div>
							<span class="comp-decoration-border"></span>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
				</div><!-- comp-company-profile -->
			</div><!-- section_inner -->
		</section>
		<section class="section-board-member">
			<div class="section_inner">
				<div class="comp-section-title">
					<span class="ttl_en">Member</span>
					<h2 class="ttl_jp">役員プロフィール</h2>
				</div><!-- comp-section-title -->
				<div class="comp-board-member">
					<?php foreach ($board_member as $d):?>
					<div class="member_item">
						<div class="member_img">
							<img
								class="<?= $d['media_size'];?>"
								src="<?= wp_get_attachment_image_src($d['member_img'], 'large')[0] ?>"
								srcset="<?= wp_get_attachment_image_src($d['member_img'], 'large')[0] ?> 1440w, <?= wp_get_attachment_image_src($d['member_img'], 'medium_large')[0] ?> 768w, <?= wp_get_attachment_image_src($d['member_img'], 'large')[0] ?> 2048w"
							>
						</div>
						<div class="member_txt">
							<div class="member_name">
								<div class="name_flex">
									<h3 class="name_jp"><?= $d['member_name_jp'];?></h3>
									<span class="name_en"><?= $d['member_name_en'];?></span>
								</div>
								<div class="position"><?= $d['member_position'];?></div>
							</div>
							<div class="member_profile">
								<p><?= $d['member_desc'];?></p>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div><!-- comp-board-member -->
				<div class="comp-button-wrapper">
					<div class="button_item">
						<a target="_blank" class="grad2" href="<?= $member_link;?>">メンバーをさらに見る</a>
					</div>
				</div><!-- comp-button-wrapper -->
			</div><!-- section_inner -->
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
