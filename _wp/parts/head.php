	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php $url = $_SERVER['REQUEST_URI']; ?>
	<?php
	if ( is_home() || is_front_page() ) {
  	$site_title = 'Zen Intelligence株式会社 - Physical AIで、基幹産業を変革する。';
  	$site_permalink = home_url( '/' );
		$thumnail = 'https://zi.noske.design/wp-content/themes/zi-corporate/assets/img/ogp/ogp.jpg';
		$description = strip_tags(SCF::get('article_description',116));
	}else if( is_404()){
		$site_title = 'ページがみつかりません | Zen Intelligence株式会社';
		$site_permalink = get_the_permalink();
		$thumnail = '/wp-content/themes/zi-corporate/assets/img/ogp/ogp.jpg';
		$description = strip_tags(SCF::get('article_description',116));
	}	else if( is_tax()) {
		$page_title = single_term_title("", false).' | Zen Intelligence株式会社';
		$site_title = single_term_title("", false).' | Zen Intelligence株式会社';
		$site_permalink = get_the_permalink();
		$description = strip_tags(term_description());
	}	else if( is_search()) {
		$page_title = '「'.get_search_query( $escaped ).'」の検索結果 | Zen Intelligence株式会社';
		$site_title = '「'.get_search_query( $escaped ).'」の検索結果 | Zen Intelligence株式会社';
		$site_permalink = get_the_permalink();
		$description = 'Zen Intelligence株式会社のキーワード検索結果ページです。';
	} else if( is_category() || is_tag() ){
		$page_title = '「'.single_cat_title('',false).'」に関する記事一覧 | Zen Intelligence株式会社';
		$site_title = '「'.single_cat_title('',false).'」に関する記事一覧 | Zen Intelligence株式会社';
		$site_permalink = get_the_permalink();
		$cat_desc = category_description();
		if($cat_desc){
			$description = strip_tags($cat_desc);
		}else{
			$description = 'Zen Intelligence株式会社の'.single_cat_title('',false).'に関する記事一覧ページです。';
		}
	} else if( is_archive() ){
		if(strstr($url,'/news')){
			$page_title = 'お知らせ一覧 | Zen Intelligence株式会社';
			$site_title = 'お知らせ一覧 | Zen Intelligence株式会社';
			$site_permalink = get_the_permalink();
			$description = 'Zen Intelligence株式会社のお知らせ一覧ページです。';
		}
	} else if( is_single()) {
		$site_title = strip_tags(get_the_title($post->ID)).' | Zen Intelligence株式会社';
  	$site_permalink = get_the_permalink($post->ID);
		$first_image = catch_that_image();
		$description = strip_tags(SCF::get('article_description',$post_id));
		if (!empty(get_the_post_thumbnail_url($post->ID, 'large'))) {
			$image = get_the_post_thumbnail_url($post->ID, 'large');
			$thumnail = $image;  // サムネイル画像を出力
		} else if ($first_image != 'no_image') {
			$thumnail = $first_image; // function.php定義した投稿1枚目の画像を出力
		} else {
			$thumnail = 'https://zi.noske.design/wp-content/themes/zi-corporate/assets/img/ogp/ogp.jpg'; // デフォルトのサムネイル画像を出力
		}
	}else if(is_page()){
		$site_title = get_the_title($post->ID).' | Zen Intelligence株式会社';
  	$site_permalink = get_the_permalink($post->ID);
		$first_image = catch_that_image();
		if (!empty(get_the_post_thumbnail_url($post->ID, 'large'))) {
			$image = get_the_post_thumbnail_url($post->ID, 'large');
			$thumnail = $image;  // サムネイル画像を出力
		} else if ($first_image != 'no_image') {
			$thumnail = $first_image; // function.php定義した投稿1枚目の画像を出力
		} else {
			$thumnail = 'https://zi.noske.design/wp-content/themes/zi-corporate/assets/img/ogp/ogp.jpg'; // デフォルトのサムネイル画像を出力
		}
	} else{
		$page_title = 'Zen Intelligence株式会社';
		$site_title = 'Zen Intelligence株式会社';
  	$site_permalink = get_the_permalink();
		$description = strip_tags(SCF::get('article_description',$post_id));
		$thumbnail_id = get_post_thumbnail_id($post->ID);
		$site_image_attach = wp_get_attachment_image_src( $thumbnail_id, 'large' );
		if (!empty($site_image_attach)) {
			$site_image = $site_image_attach[0];
		}
	}

  	if (empty($description)) {
			$description = strip_tags(SCF::get('article_description',$post_id));
  	}

		$site_image = "";

	?>
	<title><?php echo $site_title; ?></title>
	<meta property="og:title" content="<?php echo $site_title; ?>">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?php echo $site_permalink; ?>">
	<meta property="og:image" content="<?php echo $thumnail; ?>">
	<meta name="description" content="<?php echo $description; ?>">
	<meta property="og:locale" content="ja_JP">
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?php echo $site_title; ?>">
	<meta property="og:description" content="<?php echo $description; ?>">
	<meta property="og:site_name" content="Zen Intelligence株式会社">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:description" content="<?php echo $description; ?>">
	<meta name="twitter:title" content="<?php echo $site_title; ?>">
	<meta name="twitter:image" content="<?php echo $thumnail; ?>">
	<link href="<?php echo get_template_directory_uri();?>/assets/img/icon/icon.png" rel="apple-touch-icon" sizes="180x180">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/img/icon/icon.png">
	<!-- font setting -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/yakuhanjp@4.0.1/dist/css/yakuhanjp.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400,500&display=swap">
	<script>console.log('<?php echo $url;?>');</script>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css?<?php echo date('Ymd-Hi');?>">
	<?php get_template_part("parts/analytics");?>
	<?php wp_head(); ?>
