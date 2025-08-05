<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<?php
	$queried_object = get_queried_object();
	$current = $queried_object->slug;
	$title_en = $queried_object->slug;
  $post_per_page = 12;
  $wp_query2 = new WP_Query();
  $param2 = array(
    'post_type' => 'news',
    'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'news-category',
				'field'    => 'slug',
				'terms'    => $queried_object->slug
			),
		),
  );
  $the_query2 = new WP_Query( $param2 );
  $post_num = $the_query2->found_posts;
  $page_num = $post_num / $post_per_page;
  $pager_num = ceil($page_num);
  wp_reset_query();
?>
<body>
	<?php get_template_part("parts/header"); ?>
	<article id="news" class="page-news" postNum="<?= $post_num;?>" pagerNum="<?= $pager_num;?>">
		<section class="section-main comp-underpage-ttl">
			<div class="main_inner">
				<div class="comp-section-title white">
					<span class="ttl_en"><?= ucfirst($title_en);?></span>
					<h1 class="ttl_jp">お知らせ:<?= $queried_object->name;?></h1>
				</div><!-- comp-section-title -->
			</div><!-- main_inner -->
		</section>
		<section id="headerBlueSection" class="section-news-list">
			<div class="section_inner">
				<div class="comp-news-category">
					<div class="category_item">
						<a href="/news" class="all">一覧</a>
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
							if($term_slug == $current){
								echo '<div class="category_item active"><a href="'.esc_url( $term_link ).'" class="'.$term_slug.'">'.$term_name.'</a></div>';
							}else{
								echo '<div class="category_item"><a href="'.esc_url( $term_link ).'" class="'.$term_slug.'">'.$term_name.'</a></div>';
							}
						}
					}
					?>
				</div>
				<div class="comp-news-list">
					<?php
						$order = 0;
						$paged = get_query_var('paged') ? get_query_var('paged') : 1 ;
						$wp_query = new WP_Query();
						$param = array(
							'posts_per_page' => '12',
							'order' => 'DESC',
							'post_type' => 'news',
							'paged' => $paged,
							'post_status'  => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'news-category',
									'field'    => 'slug',
									'terms'    => $queried_object->slug
								),
							),
						);
						$the_query = new WP_Query( $param );
						$article_num = $the_query->found_posts;
						$wp_query->query($param);
						$post_per_page = 12;
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
				</div>
				<?php if ($pager_num > 1) :?>
					<div class="comp-pager">
						<?php for ($i=1; $i < $pager_num + intval(1); $i++) {
							if($paged == $i){
								echo '<div class="pager_item"><a class="active" href="/news-category/'.$title_en.'/page/'.$i.'/"><span>'.$i.'</span></a></div>';
							}else{
								echo '<div class="pager_item"><a href="/news-category/'.$title_en.'/page/'.$i.'/"><span>'.$i.'</span></a></div>';
							}

						};?>
					</div>
				<?php endif; ?>
			</div><!-- section_inner -->
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
