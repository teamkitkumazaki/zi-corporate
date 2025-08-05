<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
<?php get_template_part("parts/head");?>
</head>
<body>
<?php get_template_part("parts/header");?>
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
					<span class="ttl_en">Purpose</span>
					<h2 class="ttl_jp">Srushの存在意義</h2>
				</div><!-- comp-index-ttl -->
				<div class="purpose_txt_wrap">
					<h3 class="purpose_ttl">データを誰にとっても<br>身近なものにする。</h3>
					<div class="purpose_desc">
						<p><span>データの海は常に予測不能な変化を見せる。</span><span>顧客を乗せ、その海を正確に航海し、</span><span>目的地へと導くことは容易ではない。</span><span>Srushは、同じ船に乗り、それを実現するチームだ。</span></p>
						<p><span>そのために、データ統一によるデータの可視化と、</span><span>データ維新によるデータの活用が当たり前になる世界を実現し、</span><span>誰にとってもデータが身近なものにします。</span></p>
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
				<div class="profile_item">
					<h3 class="profile_ttl">会社名</h3>
					<div class="profile_content">
						<p>株式会社Srush</p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">代表者</h3>
					<div class="profile_content">
						<p>代表取締役CEO 樋口 海</p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">事業内容</h3>
					<div class="profile_content">
						<p>データ統一クラウド「Srush」の企画・開発・運営・販売</p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">設立</h3>
					<div class="profile_content">
						<p>2019年11月</p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">本社</h3>
					<div class="profile_content">
						<p>〒103-0027<span>東京都中央区日本橋一丁目4番1号</span><span>日本橋一丁目三井ビルディング5階</span></p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">資本金</h3>
					<div class="profile_content">
						<p>5億円（資本準備金含む）</p>
					</div>
					<span class="comp-decoration-border"></span>
				</div>
				<div class="profile_item">
					<h3 class="profile_ttl">アクセス</h3>
					<div class="map_wrap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6481.544020155753!2d139.76980054837156!3d35.68261540211972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601889564d300f6f%3A0x46fb3e8247cb3891!2z44CSMTAzLTAwMjcg5p2x5Lqs6YO95Lit5aSu5Yy65pel5pys5qmL77yR5LiB55uu77yU4oiS77yRIOaXpeacrOapi-S4gOS4geebruS4ieS6leODk-ODq-ODh-OCo-ODs-OCsA!5e0!3m2!1sja!2sjp!4v1716963120396!5m2!1sja!2sjp" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
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
<?php get_template_part("parts/background"); ?>
<?php get_template_part("parts/hummenu");?>
<?php get_template_part("parts/footer");?>
</body>
<?php get_template_part("parts/script");?>
</html>
