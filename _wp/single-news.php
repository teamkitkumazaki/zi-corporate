<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<?php get_template_part("parts/header"); ?>
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
			<div class="comp-page-bread white">
      	<a href="/news">お知らせ一覧</a>
      	<!-- <a href="/news-category/<?= $category_slug;?>"><?= $category_name;?></a> -->
				<span class="current"><?= $page_ttl;?></span>
    	</div>
			<div class="header_inner">
				<h1 class="article_ttl"><?= $page_ttl;?></h1>
				<div class="header_lower">
					<div class="article_info">
						<span class="date"><?= $date;?></span>
						<?php if ($terms) :
							foreach ($terms as $term) {
								$category_name = $term->name;
								$category_slug = $term->slug;
								echo '<a class="'.$term->slug.'" href="/news-category/'.$term->slug.'">'. $term->name.'</a>';
							}
							endif;
						?>
					</div>
					<div class="comp-sns-share">
            <div class="sns_item">
              <a href="https://twitter.com/share?url=<?php echo get_permalink($post_id); ?>" target="_blank">
                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_x.svg">
              </a>
            </div>
            <div class="sns_item">
              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink($post_id); ?>&amp;title=<?= $page_ttl;?>&amp;summary=&amp;source=" target="_blank">
                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_in.svg">
              </a>
            </div>
            <div class="sns_item">
              <a href="http://www.facebook.com/share.php?u=<?php echo get_permalink($id)?>" target="_blank" class="social-media__service social-media__service--facebook" aria-label="Share on Facebook">
                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_fb.svg">
              </a>
            </div>
          </div>
				</div>
			</div><!-- header_inner -->
		</section>
		<section id="headerBlueSection" class="section-article-contents">
			<div class="section_inner">
				<div id="articleContents" class="comp-article-contents">
					<div class="article_item">
						<?php if ($image):?>
						<div class="img_wrap">
							<img src="<?= $image;?>" srcset="<?= $image;?> 1440w, <?= $image_sp;?> 768w, <?= $image;?> 2048w">
						</div>
						<?php endif; ?>
						<?php if ($article_description):?>
							<?php if ($desc_flag):?>
							<div class="desc_wrap">
								<p style="white-space:pre-line;"><?= $article_description;?></p>
							</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php foreach ($article_content as $d):?>
						<div class="article_item">
							<?php if ($d['title_h2']):?>
								<h2 class="section_ttl"><?= $d['title_h2'];?></h2>
							<?php endif; ?>
							<?php if ($d['article_img']):?>
							<div class="img_wrap">
								<?php if ($d['media_size'] != 'gif'):?>
								<img
									class="<?= $d['media_size'];?>"
									src="<?= wp_get_attachment_image_src($d['article_img'], 'medium_large')[0] ?>"
									srcset="<?= wp_get_attachment_image_src($d['article_img'], 'medium_large')[0] ?> 1440w, <?= wp_get_attachment_image_src($d['article_img'], 'thumbnail')[0] ?> 768w, <?= wp_get_attachment_image_src($d['article_img'], 'medium_large')[0] ?> 2048w"
								>
								<?php else:?>
									<img
										class="<?= $d['media_size'];?>"
										src="<?= wp_get_attachment_image_src($d['article_img'], 'full')[0] ?>"
									>
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php if ($d['title_h3']):?>
								<h3 class="section_sub_ttl"><?= $d['title_h3'];?></h3>
							<?php endif; ?>
							<?php if ($d['article_desc']):?>
							<div class="desc_wrap">
								<p style="white-space:pre-line;"><?= $d['article_desc'];?></p>
							</div>
							<?php endif; ?>
							<?php if ($d['outer_link']):?>
								<?php echo do_shortcode('[sc_Linkcard url="'.$d['outer_link'].'"]'); ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
					<div class="sns_share_wrap">
						<span class="share_ttl">SHARE</span>
						<div class="comp-sns-share">
	            <div class="sns_item">
	              <a href="https://twitter.com/share?url=<?php echo get_permalink($post_id); ?>" target="_blank">
	                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_x.svg">
	              </a>
	            </div>
	            <div class="sns_item">
	              <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink($post_id); ?>&amp;title=<?= $page_ttl;?>&amp;summary=&amp;source=" target="_blank">
	                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_in.svg">
	              </a>
	            </div>
	            <div class="sns_item">
	              <a href="http://www.facebook.com/share.php?u=<?php echo get_permalink($id)?>" target="_blank" class="social-media__service social-media__service--facebook" aria-label="Share on Facebook">
	                <img src="https://www.srush.co.jp/hubfs/img_blog/icon_fb.svg">
	              </a>
	            </div>
	          </div>
					</div>
				</div><!-- comp-article-contents -->
			</div><!-- section_inner -->
		</section>
		<section class="section-related-news">
			<div class="section_inner">
				<div class="comp-news-list related">
					<?php
  					$prev_post = get_previous_post( false, '', 'category');
  					$next_post = get_next_post( false, '', 'category');
						$terms = get_the_terms($prev_post->ID, 'news-category');
						if ($terms) :
							foreach ($terms as $term) {
								$prev_category_name = $term->name;
								$prev_category_slug = $term->slug;
							}
						endif;

						$terms2 = get_the_terms($next_post->ID, 'news-category');
						if ($terms2) :
							foreach ($terms2 as $term) {
								$next_category_name = $term->name;
								$next_category_slug = $term->slug;
							}
						endif;

					;?>
					<div class="news_item prev">
						<?php if( $prev_post ): ?>
						<a href="<?= get_permalink($prev_post->ID); ?>" class="item_inner">
							<span class="news_header">
								<span class="data"><?= get_the_time( 'Y.m.d', $prev_post->ID );?></span>
								<span class="category <?= $prev_category_slug;?>"><?= $prev_category_name;?></span>
							</span>
							<span class="news_title"><?= get_the_title($prev_post->ID); ?></span>
						</a>
						<span class="comp-decoration-border"></span>
						<?php endif; ?>
					</div>
					<div class="news_item next">
						<?php if( $next_post ): ?>
						<a class="item_inner" href="<?= get_permalink($next_post->ID); ?>">
							<span class="news_header">
								<span class="data"><?= get_the_time( 'Y.m.d', $next_post->ID );?></span>
								<span class="category <?= $next_category_slug;?>"><?= $next_category_name;?></span>
							</span>
							<span class="news_title"><?= get_the_title($next_post->ID); ?></span>
						</a>
						<?php endif; ?>
					</div>
				</div><!-- comp-related-news -->
			</div><!-- section_inner -->
			<div class="comp-page-bread">
				<a href="/news">お知らせ一覧</a>
				<a href="/news-category/<?= $category_slug;?>"><?= $category_name;?></a>
				<span class="current"><?= $page_ttl;?></span>
			</div>
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
