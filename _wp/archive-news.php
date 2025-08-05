<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<?php
  $post_per_page = 10;
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
						<a href="/news">
							<span class="name">全て</span>
							<span class="caret">
								<svg viewBox="0 0 21.95 19.13">
									<path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path>
								</svg>
							</span>
						</a>
					</div>
					<?php
					// カスタム分類名
					$taxonomy = 'news-category';
					$args = array(
						'pad_counts' => true,
						'hide_empty' => true,
					);
					$terms = get_terms( $taxonomy , $args );
					if ( count( $terms ) != 0 ) {
						foreach ( $terms as $term ) {
							$term_id = $term->term_id;
							$term_name = $term->name;
							$term_slug = $term->slug;
							$term_idsp = $taxonomy."_".$term_id;
							$term_link = get_term_link( $term, $taxonomy );
							if ( is_wp_error( $term_link ) ) {
								continue;
							}
							echo '<div class="news_item"><a href="'.esc_url( $term_link ).'"><span class="name">'.$term_name.'</span><span class="caret"><svg viewBox="0 0 21.95 19.13"><path class="cls-1" d="M12.88.35l8.12,8.12c.6.6.6,1.58,0,2.18l-8.12,8.12M21.24,9.57H0"></path></svg></span></a></div>';
						}
					}
					?>
				</div><!-- comp-news-category -->
			</div><!-- section_inner -->
		</section>
		<section class="section-news">
			<div class="section_inner">
				<div class="comp-news-list">
					<?php
						$order = 0;
						$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
						$wp_query = new WP_Query();
						$param = array(
							'posts_per_page' => '10',
							'order' => 'DESC',
							'post_type' => 'news',
							'paged' => $paged,
							'post_status'  => 'publish'
						);
						$the_query = new WP_Query( $param );
						$article_num = $the_query->found_posts;
						$wp_query->query($param);
						$post_per_page = 10;
						$page_num = $article_num / $post_per_page;
						$pager_num = ceil($page_num);
						$wp_query->query($param);
						if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
						$post_id = get_the_ID();
						$post_id = get_the_ID();
						$page_ttl = get_the_title($post_id);
						$date = get_the_date('Y.m.d');
						/* カテゴリー */
						$terms = get_the_terms($post->ID, 'news-category');
					?>
					<div class="news_item">
						<a href="<?php the_permalink();?>">
							<span class="news_header">
								<span class="date"><?= $date;?></span>
								<?php if ($terms) :
									foreach ($terms as $term) {
										$category_name = $term->name;
										$category_slug = $term->slug;
										echo '<span class="category">'. $term->name.'</span>';
									}
									endif;
								?>
							</span>
							<span class="news_title"><?= $page_ttl;?></span>
						</a>
					</div>
					<?php endwhile; else : endif; wp_reset_postdata();?>
				</div><!-- comp-news-list -->
				<?php
					if($paged == 0){$paged = 1;}
					$previous_paged = $paged - 1;
					$next_paged = $paged + 1;
					$currentURL = explode('/page',$_SERVER["REQUEST_URI"]);
				?>
				<?php if ($pager_num > 1) :?>
				<div class="comp-pager" articleNum="<?= $article_num;?>" pageNum="<?= $page_num;?>">
					<div class="comp_inner">
						<?php if ($paged != 1){
							echo '<a class="link previous" href="'.$currentURL[0].'/page/'.$previous_paged.'/">前へ</a>';
						}else{
							echo '<a class="link previous disabled" style="pointer-events: none; opacity: 0.5;" href="'. $currentURL[0].'/page/'.$previous_paged.'">前へ</a>';
						};?>
						<div class="pager_select">
							<select class="pjax-select" name="pager" onchange="location.href=value;">
								<?php for ($i = 1; $i <= $pager_num; $i++) {
									if ($i == $paged){
										echo '<option value="'.$currentURL[0].'/page/'.$i.'" selected="selected">'.$i.'/'.intval($pager_num).'</option>';
									}else{
										echo '<option value="'.$currentURL[0].'/page/'.$i.'">'.$i.'/'.intval($pager_num).'</option>';
									}
								};?>
							</select>
							<div class="pager_select_label">
							<?php for ($i = 1; $i <= $pager_num; $i++) {
								if ($i == $paged){
									echo '<span class="label_text">'.$i.'<span class="label_divider">/</span>'.intval($pager_num).'</span>';
								}
							};?>
							<span class="label_arrow"></span>
							</div>
						</div>
						<?php if ($paged != intval($pager_num)){
							echo '<a class="link next" href="'.$currentURL[0].'/page/'.$next_paged.'"><span>次へ</span></a>';
						}else{
							echo '<a class="link next disabled" style="pointer-events: none; opacity: 0.5;" href="'.$currentURL[0].'/page/'.$next_paged.'"><span>次へ</span></a>';
						};?>
					</div>
				</div><!-- comp-pager -->
				<?php endif; ?>
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/recruit");?>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
