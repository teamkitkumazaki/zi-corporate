<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<header class="underpage">
		<?php get_template_part("parts/header"); ?>
	</header>
	<?php
		$corporate_info = SCF::get('corporate_info', 150);
		$board_member = SCF::get('board_member', 6);
		$member_link = SCF::get('member_link', 6);
	?>
	<article id="corporate" class="page-corporate">
		<section class="section-corp-header">
			<div class="section_inner">
				<h1 class="comp-page-title">会社概要</h1>
				<div class="flex_layout">
					<div class="flex_left">
						<div class="comp-section-title">
							<h2 class="ttl">パーパス</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-flex-txt-wrap">
							<h3 class="flex_subttl">Physical AIで、<br>基幹産業を変革する。</h3>
							<div class="flex_description">
								<p>物理的な空間と物理的な業務により社会を支える産業において、担い手・ベテランが急速に減少している。Physical AIで基幹産業が高品質な供給をし続けることと、付加価値を上げ続けることを可能にする。</p>
							</div>
						</div>
					</div><!-- flex_right -->
				</div><!-- flex_layout -->
				<div id="palarax" class="corp_img_wrap">
					<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/purpose_img.jpg">
					<img class="overlay" src="http://zen-intelligence.ai/wp-content/uploads/2025/08/purpose_layer2.png">
				</div><!-- corp_img_wrap -->
			</div><!-- section_inner -->
		</section>
		<section class="section-industrialization">
			<div class="section_inner">
				<div class="industrial_wrapper">
					<div class="industrial_image effect animate-fadeup">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/industrial_img.png">
					</div>
					<div class="effect animate-fadeup">
						<div class="industrial_desc">
							<p>Physical AIを通じて、技術革新の恩恵が行き届かなかった領域に非連続的な変革をもたらし、産業の在り方そのものをAIネイティブな形へと再構築する「Re-Industrialization」を目指します。</p>
						</div>
						<div class="industrial_lower_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/industrial_lower.svg">
						</div>
					</div>
				</div><!-- industrial_wrapper -->
			</div><!-- section_inner -->
		</section>
		<section class="section-values">
			<div class="section_inner">
				<div class="value_ttl_wrap effect animate-fadeup">
					<div class="comp-section-title">
						<h2 class="ttl">バリュー</h2>
					</div>
					<h3 class="value_subttl">異常な時間軸でアウトプットを出し続けることを是とする文化。<br>そのベースとなる3つのバリュー。</h3>
				</div>
				<div class="comp-value-list effect animate-fadeup">
					<div class="value_item">
						<div class="value_txt">
							<h4 class="value_en">SPEED&IMPACT</h4>
							<p class="value_jp">スピードを出し、結果を出す</p>
						</div>
						<div class="value_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/value01.jpg">
						</div>
						<span class="spacer"></span>
					</div>
					<div class="dot_line"></div>
					<div class="value_item">
						<div class="value_txt">
							<h4 class="value_en">GRIT</h4>
							<p class="value_jp">チャレンジングな目標を決める・やりきる</p>
						</div>
						<div class="value_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/value02.jpg">
						</div>
						<span class="spacer"></span>
					</div>
					<div class="dot_line"></div>
					<div class="value_item">
						<div class="value_txt">
							<h4 class="value_en">TETTEI</h4>
							<p class="value_jp">徹底的に、やりぬく</p>
						</div>
						<div class="value_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/value03.jpg">
						</div>
						<span class="spacer"></span>
					</div>
				</div><!-- comp-value-list -->
			</div><!-- section_inner -->
		</section>
		<section class="section-corporate">
			<div class="section_inner">
				<div class="flex_layout effect animate-fadeup">
					<div class="flex_left">
						<div class="comp-section-title white">
							<h2 class="ttl">会社概要</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-corporate-profile">
							<div class="profile_item">
								<div class="profile_ttl">社名</div>
								<div class="profile_contents">
									<p>Zen Intelligence株式会社 (旧社名: 株式会社SoftRoid)</p>
								</div>
							</div>
							<div class="profile_item">
								<div class="profile_ttl">代表者</div>
								<div class="profile_contents">
									<p>野﨑 大幹</p>
								</div>
							</div>
							<div class="profile_item">
								<div class="profile_ttl">設立</div>
								<div class="profile_contents">
									<p>2020年7月21日</p>
								</div>
							</div>
							<div class="profile_item">
								<div class="profile_ttl">所在地</div>
								<div class="profile_contents">
									<p>〒104-0032<br>東京都中央区八丁堀2丁目14番1号 住友不動産八重洲通ビル6F</p>
								</div>
							</div>
							<div class="iframe_wrap">
								<iframe
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.0011664054705!2d139.77403437588265!3d35.67697327258863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601889738037ba55%3A0x6c40d69139be01b5!2z5L2P5Y-L5LiN5YuV55Sj5YWr6YeN5rSy6YCa44OT44Or!5e0!3m2!1sja!2sjp!4v1754308255827!5m2!1sja!2sjp"
									width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div><!-- comp-corporate-profile -->
					</div><!-- flex_right -->
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-office">
			<div class="section_inner">
				<div class="flex_layout effect animate-fadeup">
					<div class="flex_left">
						<div class="comp-section-title white">
							<h2 class="ttl">オフィス</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-office-slider">
							<div id="officeSlider" class="slick-slider">
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office01.jpg">
								</div>
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office02.jpg">
								</div>
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office03.jpg">
								</div>
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office04.jpg">
								</div>
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office05.jpg">
								</div>
								<div class="item_box slick-slide">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/office06.jpg">
								</div>
							</div><!-- slick-slider -->
						</div><!-- comp-news-slider -->
					</div><!-- flex_right -->
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-investor">
			<div class="section_inner">
				<div class="flex_layout effect animate-fadeup">
					<div class="flex_left">
						<div class="comp-section-title">
							<h2 class="ttl">投資家</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-partner-list">
							<div class="partner_item">
								<div class="partner_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/investor01.jpg">
								</div>
								<p class="partner_name">INCUBATE FUND</p>
							</div>
							<div class="partner_item">
								<div class="partner_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/investor02.jpg">
								</div>
								<p class="partner_name">FIRST LIGHT CAPITAL</p>
							</div>
							<div class="partner_item">
								<div class="partner_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/investor03.jpg">
								</div>
								<p class="partner_name">Z Venture Capital</p>
							</div>
							<div class="partner_item">
								<div class="partner_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/investor04.jpg">
								</div>
								<p class="partner_name">RICE CAPITAL</p>
							</div>
							<div class="partner_item">
								<div class="partner_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/investor05.jpg">
								</div>
								<p class="partner_name">Angel Bridge</p>
							</div>
						</div><!-- comp-partner-list -->
					</div><!-- flex_right -->
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-supporter">
			<div class="section_inner">
				<div class="flex_layout effect animate-fadeup">
					<div class="flex_left">
						<div class="comp-section-title">
							<h2 class="ttl">採択実績</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-usecase-list">
							<div class="usecase_item">
								<div class="img_wrap">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/supporter01.jpg">
								</div>
								<div class="txt_wrap">
									<h3 class="usecase_ttl">GENIAC第3期</h3>
									<div class="usecase_desc">
										<p>建築現場の施工管理を自動化するAI基盤モデルの開発</p>
									</div>
								</div>
							</div>
							<div class="usecase_item">
								<div class="img_wrap">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/supporter02.jpg">
								</div>
								<div class="txt_wrap">
									<h3 class="usecase_ttl">国土交通省 関東地方整備局</h3>
									<div class="usecase_desc">
										<p>建設現場における無人化・省人化技術の開発・導入・活用に関するプロジェクト</p>
									</div>
								</div>
							</div>
							<div class="usecase_item">
								<div class="img_wrap">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/supporter03.jpg">
								</div>
								<div class="txt_wrap">
									<h3 class="usecase_ttl">IPA 未踏アドバンスト事業</h3>
									<div class="usecase_desc">
										<p>建築現場を巡回しデータ収集・分析するロボットサービスの実現</p>
									</div>
								</div>
							</div>
							<div class="usecase_item">
								<div class="img_wrap">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/corporate/supporter04.jpg">
								</div>
								<div class="txt_wrap">
									<h3 class="usecase_ttl">東京大学 FoundX</h3>
									<div class="usecase_desc">
										<p>Founders Program</p>
									</div>
								</div>
							</div>
						</div><!-- comp-usecase-list -->
					</div><!-- flex_right -->
				</div>
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/recruit");?>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
