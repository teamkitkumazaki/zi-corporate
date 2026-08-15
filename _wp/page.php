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

		$corporate_info = SCF::get('corporate_info', 150);
	?>
	<article id="index" class="page-index">
		<section class="section-main">
			<div class="comp-main-slider">
				<div id="mainSlider" class="slick-slider">
					<div class="item_box slick-slide">
						<div class="slider01 slide_item">
							<div class="slider01_contents">
								<h1 class="index_ttl">データを誰にとっても<br>身近なものにする。</h1>
								<div class="comp-button-wrapper">
									<div class="button_item">
										<a class="border" href="/purpose">詳しく見る</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item_box slick-slide">
						<div class="slider02 slide_item">
							<div class="recruit_contents_flex">
								<div class="recruit_img">
									<img src="<?php echo get_template_directory_uri();?>/assets/img/index/recruit_img.png">
								</div>
								<div class="recruit_txt">
									<div class="logo_img">
										<img src="<?php echo get_template_directory_uri();?>/assets/img/index/join_srush_white.svg">
									</div>
									<div class="comp-rounded-button">
										<a target="_blank" href="https://n.srush.io/srush-recruit">採用情報を見る</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item_box slick-slide">
						<div class="slider03 slide_item">
							<div class="slide_product">
								<div class="slide_img_wrap">
									<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/slide_img.png">
									<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/slide_img_pc.png">
								</div>
								<div class="comp-rounded-button">
									<a target="_blank" href="https://www.srush.co.jp/">プロダクトサイトへ</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- slick-slider -->
			</div><!-- comp-main-slider -->
		</section>
		<section id="headerBlueSection" class="section-news">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">NEWS</span>
					<h2 class="ttl_jp">お知らせ</h2>
				</div><!-- comp-index-ttl -->
				<div class="comp-news-list">
					<?php
						$order = 0;
						$param = array(
							'has_password' => $login_only,
							'post_type' => 'news',
							'posts_per_page' => 3,
							'post_status'  => 'publish',
							'order' => 'DESC',
							'paged' => $paged,
						);
						$the_query = new WP_Query( $param );
						$wp_query->query($param);
						if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
					?>
					<?php
						$order = intval($order) + intval(1);
						$post_id = get_the_ID();
						$page_ttl = get_the_title($post_id);
						$date = get_the_date('Y.m.d');
						/* カテゴリー */
						$terms = get_the_terms($post->ID, 'news-category');
						if ($terms) :
							foreach ($terms as $term) {
								$category_name = $term->name;
								$category_slug = $term->slug;
							}

						endif;
					 ?>
					<div class="news_item">
						<div class="news_header">
							<span class="data"><?= $date;?></span>
								<a class="<?= $category_slug;?>" href="/news-category/<?= $category_slug;?>"><?= $category_name;?></a>
						</div>
						<a class="news_title" href="<?php the_permalink();?>"><?= $page_ttl;?></a>
						<span class="comp-decoration-border"></span>
					</div>
					<?php endwhile; else : endif; wp_reset_postdata();?>
					<div class="view_all_button">
						<a href="/news">
							<span class="txt">VIEW MORE</span>
							<span class="caret">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.12 9.41"><defs><style></style></defs>
									<polyline class="cls-1" points=".71 8.71 4.71 4.71 .71 .71"/>
								</svg>
							</span>
						</a>
					</div>
				</div><!-- comp-news-list -->
			</div><!-- section_inner -->
		</section>
		<section class="section-product">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">Product</span>
					<h2 class="ttl_jp">プロダクト</h2>
				</div><!-- comp-index-ttl -->
				<div class="product_content_flex">
					<div class="improve_img">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/index/improve_img.svg">
					</div>
					<div class="improve_txt">
						<div class="improve_ttl">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/index/improve_txt.svg">
						</div>
						<div class="improve_desc">
							<p>だれでもかんたん・ノーコードで<br>社内のデータマネジメントプラットフォームを<br>構築できるオールインワンデータ分析ツールです。</p>
						</div>
						<div class="comp-rounded-button">
							<a target="_blank" href="https://www.srush.co.jp/">プロダクトサイトへ</a>
						</div>
					</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-partner">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">Partner</span>
					<h2 class="ttl_jp">パートナー</h2>
				</div><!-- comp-index-ttl -->
				<div class="partner_txt">
					<h3 class="partner_ttl">Product Deveropment<br>& Partner Relation</h3>
					<div class="partner_desc">
						<p>データ統一クラウドSrush<br>パートナープログラムで<span>ビジネス拡大しませんか？</span></p>
					</div>
					<div class="comp-rounded-button">
						<a target="_blank" href="https://www.srush.co.jp/partner">詳しくみる</a>
					</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section id="headerWhiteSection" class="section-purpose">
			<div class="section_inner">
				<div class="purpose_contents_flex">
					<div class="comp-section-title white">
						<span class="ttl_en"><?= $purpose_ttl_en;?></span>
						<h2 class="ttl_jp"><?= $purpose_ttl_jp;?></h2>
					</div><!-- comp-index-ttl -->
					<div class="purpose_txt_wrap">
						<h3 class="purpose_ttl"><?= $purpose_sub_ttl;?></h3>
						<div class="purpose_desc">
							<?= $purpose_desc;?>
						</div>
						<div class="comp-button-wrapper">
							<div class="button_item">
								<a class="white" href="/purpose">Srushが実現する世界</a>
							</div>
						</div>
					</div>
				</div><!-- purpose_contents_flex -->
			</div><!-- section_inner -->
		</section>
		<section id="headerBlueSection2" class="section-recruit">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">Recruit</span>
					<h2 class="ttl_jp">採用情報</h2>
				</div><!-- comp-index-ttl -->
				<div class="recruit_contents_flex">
					<div class="recruit_txt">
						<div class="logo_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/index/join_srush.svg">
						</div>
						<div class="comp-rounded-button">
							<a target="_blank" href="https://n.srush.io/srush-recruit">採用情報を見る</a>
						</div>
					</div>
					<div class="recruit_img">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/index/recruit_img.png">
					</div>
				</div>
			</div><!-- section_inner -->
		</section>
		<section class="section-company">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">Company</span>
					<h2 class="ttl_jp">会社情報</h2>
				</div><!-- comp-index-ttl -->
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
		<section class="section-download">
			<div class="section_inner">
				<div class="comp-index-ttl">
					<span class="ttl_en">Download</span>
					<h2 class="ttl_jp">資料請求</h2>
				</div><!-- comp-index-ttl -->
				<div class="comp-file-download">
					<div class="download_item">
						<h3 class="download_ttl">プロダクトに<br>関する資料請求</h3>
						<a target="_blank" class="link_button button01" href="https://www.srush.co.jp/download">資料請求</a>
					</div>
					<span class="comp-decoration-border"></span>
					<div class="download_item">
						<h3 class="download_ttl">パートナープログラム<br>資料請求</h3>
						<a target="_blank" class="link_button" href="https://www.srush.co.jp/partner-request">資料請求</a>
					</div>
				</div><!-- comp-file-download -->
			</div><!-- section_inner -->
		</section>
	</article>
<div id="background" class="comp-page-background">
	<div id="particleWrap" class="partlcle_wrap"></div>
	<div id="overlay01" class="img_overlay overlay01">
		<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/main_bg.png">
		<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/main_bg_pc.png">
	</div>
	<div id="overlay02" class="img_overlay overlay02">
		<img class="sp_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/purpose_bg.png">
		<img class="pc_img" src="<?php echo get_template_directory_uri();?>/assets/img/index/purpose_bg_pc.png">
	</div>
</div>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
