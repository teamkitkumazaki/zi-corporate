<!doctype html>
<html>
<head>
	<?php get_template_part("parts/head");?>
</head>

<?php
	if ( is_user_logged_in() ) {
		$login_only = null;
	}else{
		$login_only = false;
	}
	$wp_query = new WP_Query();
	$param = array(
		'posts_per_page' => '-1',
		'post_type' => 'works',
	);
	$the_query = new WP_Query( $param );
	$article_num = $the_query->found_posts;
	$post_per_page = 12;
	$page_num = $article_num / $post_per_page;
  $pager_num = ceil($page_num);
	wp_reset_query();
	$categoryname = single_cat_title('',false);
	$categoryid = get_cat_ID($categoryname);
	$queried_object = get_queried_object('works-keyword');
;?>
<body pager_num="<?= $pager_num; ?>">
	<header>
		<?php get_template_part("parts/header"); ?>
	</header>
	<article id="workList" class="page-work-list">
		<section class="section-main comp-lawer-title margin">
			<div class="main_inner">
				<div class="main_flex">
					<div class="title_wrap">
						<span class="title_en"><span>KEYWORD</span></span>
						<h1 class="title_jp"><span><?= $categoryname; ?></span></h1>
					</div>
				</div><!-- main_flex -->
			</div><!-- main_inner -->
		</section>
		<section class="section-contents">
			<div class="section_inner">
				<div id="worksList" class="comp-works-list">
					<div id="listInner" class="list_inner">
						<?php
							$order = 0;
							$queried_object = get_queried_object();
							$terms = get_terms('works-keyword');
							$param = array(
								'has_password' => $login_only,
								'post_type' => 'works',
								'posts_per_page' => 999,
								'post_status'  => 'publish',
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'paged' => $paged,
								'tax_query' => array(
									array(
										'taxonomy' => 'works-keyword',
										'field'    => 'slug',
										'terms'    => $queried_object->slug
									),
								),
							);
							$the_query = new WP_Query( $param );
							$article_num = $the_query->found_posts;
							$wp_query->query($param);
							if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
						?>
						<?php
							$order = intval($order) + intval(1);
						  $post_id = get_the_ID();
							$image = get_the_post_thumbnail_url($post_id, 'medium_large');
							$image_sp = get_the_post_thumbnail_url($post_id, 'medium');
							$main_ttl = SCF::get('project_main_ttl',$post_id);
						 ?>
						<div class="comp-work-item" order="<?= $order;?>">
							<a href="<?php the_permalink(); ?>">
								<span class="img_wrap">
									<img src="<?= $image; ?>" srcset="<?= $image; ?> 1440w, <?= $image_sp; ?> 768w, <?= $image; ?> 2048w">
								</span>
								<span class="txt_wrap">
									<span class="txt"><?= $main_ttl;?></span>
								</span>
							</a>
						</div>
						<?php endwhile; else : endif; wp_reset_postdata();?>
					</div><!-- list_inner -->
				</div><!-- comp-works-list -->
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/footerBanner"); ?>
	</article>
	<?php get_template_part("parts/wave"); ?>
	<?php get_template_part("parts/common"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
	<?php get_template_part("parts/script"); ?>
</html>
