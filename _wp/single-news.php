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
		$sp_main_url = wp_get_attachment_image_src($image_sp, 'medium_large');
		$page_ttl = get_the_title($post_id);
		$article_subttl = SCF::get('article_subttl',$post_id);
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
							<?php if ($terms) :
								foreach ($terms as $term) {
									$category_name = $term->name;
									$category_slug = $term->slug;
									echo '<div class="category">'.$term->name.'</div>';
								}
								endif;
							?>
							<div class="date"><?= $date;?></div>
						</div>
						<h1 class="blog_ttl"><?= $page_ttl;?></h1>
						<?php if ($article_subttl):?>
						<h2 class="blog_subttl"><?= $article_subttl;?></h2>
						<?php endif; ?>
						<?php if ($image):?>
							<div class="blog_thumbs">
								<img src="<?= $image;?>" srcset="<?= $image;?> 1440w, <?= $image_sp;?> 768w, <?= $image;?> 2048w">
							</div>
						<?php endif; ?>
					</div>
				</div><!-- article_inner -->
			</div><!-- section_inner -->
		</section>
		<section class="section-news-contents">
			<div class="section_inner">
				<div class="article_inner">
					<div class="comp-news-article">
						<?php foreach ($article_content as $d):?>
							<div class="article_item">
								<?php if ($d['article_img']):?>
								<div class="img_wrap">
									<img
										class="<?= $d['media_size'];?>"
										src="<?= wp_get_attachment_image_src($d['article_img'], 'full')[0] ?>"
										srcset="<?= wp_get_attachment_image_src($d['article_img'], 'full')[0] ?> 1440w, <?= wp_get_attachment_image_src($d['article_img'], 'medium_large')[0] ?> 768w, <?= wp_get_attachment_image_src($d['article_img'], 'full')[0] ?> 2048w"
									>
								</div>
								<?php endif; ?>
								<?php if ($d['title_h2']):?>
									<h2 class="article_ttl"><?= $d['title_h2'];?></h2>
								<?php endif; ?>
								<?php if ($d['article_desc']):?>
									<div class="description">
										<p style="white-space:pre-line;"><?= $d['article_desc'];?></p>
									</div>
								<?php endif; ?>
								<?php if ($d['outer_link']):?>
									<?php echo do_shortcode('[sc_Linkcard url="'.$d['outer_link'].'"]'); ?>
								<?php endif; ?>
								<?php if ($d['voice_description']):?>
								<div class="article_voice">
									<?php if ($d['voice_img']):?>
									<div class="voice_img">
										<img
											src="<?= wp_get_attachment_image_src($d['voice_img'], 'medium_large')[0] ?>"
											srcset="<?= wp_get_attachment_image_src($d['voice_img'], 'medium_large')[0] ?> 1440w, <?= wp_get_attachment_image_src($d['voice_img'], 'medium_large')[0] ?> 768w, <?= wp_get_attachment_image_src($d['voice_img'], 'medium_large')[0] ?> 2048w"
										>
									</div>
									<?php endif; ?>
									<div class="voice_contents">
										<?php if ($d['voice_name']):?>
										<h3 class="voice_name"><?= $d['voice_name'];?></h3>
										<?php endif; ?>
										<div class="voice_description">
											<p><?= $d['voice_description'];?></p>
										</div>
									</div>
								</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
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
								<a href="/news">
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
							<?php
								$order = 0;
								$param = array(
									'has_password' => $login_only,
									'post_type' => 'news',
									'posts_per_page' => 5,
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
								<a href="<?php the_permalink();?>">
									<span class="news_header">
										<span class="date"><?= $date;?></span>
										<span class="category"><?= $category_name;?></span>
									</span>
									<span class="news_title"><?= $page_ttl;?></span>
								</a>
							</div>
							<?php endwhile; else : endif; wp_reset_postdata();?>
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
