<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<?php
  $post_per_page = 12;
  $wp_query2 = new WP_Query();
  $param2 = array(
    'post_type' => 'news',
    'post_status' => 'publish',
  );
  $the_query2 = new WP_Query( $param2 );
  $post_num = $the_query2->found_posts;
  $page_num = $post_num / $post_per_page;
  $pager_num = ceil($page_num);
  wp_reset_query();
?>
<body>
	<header class="underpage">
		<?php get_template_part("parts/header"); ?>
	</header>
	<article id="newsList" class="page-underpage">
		<section class="section-main">
			<div class="section_inner">
				<div class="comp-underpage-title">
					<h1 class="ttl">お知らせ</h1>
				</div><!-- comp-underpage-title -->
				<div class="comp-news-category">
					<div class="news_item active">
						<a href="#aaaa">
							<span class="name">全て</span>
							<span class="caret">
								<svg viewBox="0 0 21.95 19.13">
									<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path>
								</svg>
							</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="name">プレスリリース</span>
							<span class="caret">
								<svg viewBox="0 0 21.95 19.13">
									<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path>
								</svg>
							</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="name">コーポレート</span>
							<span class="caret">
								<svg viewBox="0 0 21.95 19.13">
									<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path>
								</svg>
							</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="name">メディア掲載</span>
							<span class="caret">
								<svg viewBox="0 0 21.95 19.13">
									<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path>
								</svg>
							</span>
						</a>
					</div>
				</div><!-- comp-news-category -->
			</div><!-- section_inner -->
		</section>
		<section class="section-news">
			<div class="section_inner">
				<div class="comp-news-list">
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2025.07.15</span>
								<span class="category">コーポレート</span>
							</span>
							<span class="news_title">Zen Intelligence株式会社への社名変更のお知らせ。Zen Intelligence株式会社への社名変更のお知らせ。Zen Intelligence株式会社への社名変更のお知らせ。</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2025.06.23</span>
								<span class="category">コーポレート</span>
							</span>
							<span class="news_title">SoftRoid、新オフィス（住友不動産八重洲通ビル）への移転のお知らせ</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2025.06.23</span>
								<span class="category">コーポレート</span>
							</span>
							<span class="news_title">SoftRoid、新オフィス（住友不動産虎ノ門タワー）への移転のお知らせ</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.10.25</span>
								<span class="category">プレスリリース</span>
							</span>
							<span class="news_title">⼀般社団法人日本能率協会の主催する「みらいのたね賞」にzenshotが選出されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.09.13</span>
								<span class="category">プレスリリース</span>
							</span>
							<span class="news_title">週刊東洋経済 すごいベンチャー100 に弊社が選出されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.05.16</span>
								<span class="category">メディア掲載</span>
							</span>
							<span class="news_title">日刊工業新聞に代表野﨑の記事が掲載されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.03.29</span>
								<span class="category">メディア掲載</span>
							</span>
							<span class="news_title">日刊工業新聞に代表野﨑の記事が掲載されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.03.19</span>
								<span class="category">プレスリリース</span>
							</span>
							<span class="news_title">新建ハウジングに弊社事業が掲載されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.03.19</span>
								<span class="category">メディア掲載</span>
							</span>
							<span class="news_title">デジタル庁の技術カタログにzenshotが掲載されました</span>
						</a>
					</div>
					<div class="news_item">
						<a href="#aaaa">
							<span class="news_header">
								<span class="date">2024.03.13</span>
								<span class="category">メディア掲載</span>
							</span>
							<span class="news_title">日刊工業新聞に弊社事業が掲載されました</span>
						</a>
					</div>
				</div><!-- comp-news-list -->
				<div class="comp-pager">
					<div class="comp_inner">
						<a class="link previous disabled" style="pointer-events: none; opacity: 0.2;"><span>前へ</span></a>
						<div class="pager_select">
							<select class="pager_select_box" name="pager">
								<option selected="" value="/collections/accessory?page=1">1 / 2</option>
								<option value="/collections/accessory?page=2">2</option>
							</select>
							<div class="pager_select_label">
								<span class="label_text">1<span class="label_divider">/</span>2</span>
								<span class="label_arrow"></span>
							</div>
						</div>
						<a class="link next" href="/collections/accessory?page=2"><span>次へ</span></a>
					</div>
				</div><!-- comp-pager -->
			</div><!-- section_inner -->
		</section>
		<section class="section-recruit comp-section-recruit">
			<div class="section_inner">
				<div class="flex_layout">
					<div class="flex_left">
						<div class="comp-section-title">
							<h2 class="ttl">採用情報</h2>
							<div class="ttl_description">
								<p>Zen Intelligenceは、ともに基幹産業を変革する<br>仲間を積極的に募集しています。</p>
							</div>
							<div class="comp-link-button">
								<a href="#aaaa">
									<span class="txt">Details</span>
									<span class="caret">
										<span class="arrow">
											<svg viewBox="0 0 21.95 19.13">
												<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0" />
											</svg>
										</span>
										<span class="circle">
											<svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 62.9 62.9">
												<ellipse transform="matrix(0.7071 -0.7071 0.7071 0.7071 -13.0238 31.4424)" class="st1" cx="31.4" cy="31.4" rx="30.9" ry="30.9"></ellipse>
											</svg>
										</span>
									</span>
								</a>
							</div><!-- comp-link-button -->
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="img_wrap">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/common/recruit_img.jpg">
						</div>
					</div><!-- flex_right -->
				</div><!-- flex_layout -->
			</div><!-- section_inner -->
		</section>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
