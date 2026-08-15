<!doctype html>
<html>
<head>
<?php get_template_part("parts/head");?>
</head>
<body>
<header class="underpage">
<?php get_template_part("parts/header");?>
</header>
<article id="page404" class="page-404">
	<section class="section-404">
		<div class="section_inner">
			<h1 class="title404">404 NOT FOUND</h1>
			<div class="description_404">
				<h2 class="sub_ttl_404">ページが見つかりませんでした</h2>
				<p class="desc_404">お探しのページは存在しないようです。<br>メニューより目的のページをお探しください</p>
			</div>
			<div class="back_button">
				<a href="/">トップページに戻る</a>
			</div>
		</div><!-- section_inner -->
	</section>
	<?php get_template_part("parts/recruit");?>
</article>
<?php get_template_part("parts/hummenu");?>
<?php get_template_part("parts/footer");?>
</body>
<?php get_template_part("parts/script");?>
</html>
