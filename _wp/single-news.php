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
		$post_id = $post->ID; //ポストID
		$authorID = $post->post_author; // 著者のID
		$meta = get_post_meta($post_id); //ポストID
		$image = get_the_post_thumbnail_url($id, 'full');
		$image_sp = get_the_post_thumbnail_url($id, 'medium_large');
		$date = get_the_date('Y.m.d');
		$sp_main_url = wp_get_attachment_image_src($sp_main, 'medium_large');
		$page_ttl = get_the_title($post_id);
		$article_description = SCF::get('article_description',$post_id);
		$desc_flag = SCF::get('desc_flag',$post_id);
		$article_content = SCF::get('article_contents',$post_id);
		$contents_length = 0;

		/* カテゴリー */
		$terms = get_the_terms($post->ID, 'news-category');

	?>
	<article id="newsDetail" class="page-news-detail">
		<section class="section-news-header">
			<div class="section_inner">
				<div class="article_inner">
					<div class="comp-page-bread">
						<div class="link_wrap">
							<a href="/">ホーム</a>
							<a href="/news">お知らせ一覧</a>
						</div>
					</div><!-- comp-page-bread -->
					<div class="blog_header">
						<div class="date_wrapper">
							<div class="category">プレスリリース</div>
							<div class="date">2025.06.11</div>
						</div>
						<h1 class="blog_ttl">⼀般社団法人日本能率協会の主催する「みらいのたね賞」にzenshotが選出されました。</h1>
						<div class="blog_thumbs">
							<img loading="lazy" src="<?php echo get_template_directory_uri();?>/assets/img/news/news_thumb.jpg">
						</div>
					</div>
				</div><!-- article_inner -->
			</div><!-- section_inner -->
		</section>
		<section class="section-news-contents">
			<div class="section_inner">
				<div class="article_inner">
					<div class="comp-news-article">
						<div class="article_item">
							<div class="description">
								<p>この度、zenshotが⼀般社団法人日本能率協会様が主催する第一線で活躍する建築家が選ぶ、優れた建築を生み出すことに貢献しうる建材・設備・IT製品「みらいのたね賞」を受賞しました。</p>
							</div>
						</div>
						<div class="article_item">
							<h2 class="article_ttl">▼詳細は下記をご覧ください</h2>
							<div class="link_box">
								<a target="_blank" href="https://jma-news.com/archives/6430">
									<span class="link_img">
										<img src="<?php echo get_template_directory_uri();?>/assets/img/news/news_thumb.jpg">
									</span>
									<span class="link_txt">
										<span class="link_ttl">第一線で活躍する建築家が選ぶ、優れた建築を生み出すことに貢献しうる建材・設備・IT製品「みらいのたね賞」14製品と「ゲスト選考賞」1製品を決定！ ｜ 一般社団法人日本能率協会　JMA</span>
										<span class="link_url">https://jma-news.com/archives/6430</span>
									</span>
								</a>
							</div>
						</div><!-- article_item -->
					</div><!-- comp-article-contents -->
				</div><!-- article_inner -->
			</div><!-- section_inner -->
		</section>
		<section class="section-news-list comp-section-news-list">
			<div class="section_inner">
				<div class="newslist_flex">
					<div class="newslist_ttl">
						<div class="comp-section-title">
							<h2 class="ttl">お知らせ</h2>
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
					</div>
					<div class="newslist_contents">
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
						</div><!-- comp-news-list -->
					</div><!-- newslist_contents -->
				</div><!-- newslist_flex -->
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/recruit");?>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
