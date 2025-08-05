<!doctype html>
<html>
<head>
<?php get_template_part("parts/head");?>
</head>
<body>
<header>
<?php get_template_part("parts/header");?>
</header>
<article id="page404" class="page-404">
	<section class="section-error">
		<div class="section_error_inner">
			<h1 class="page_ttl">404 NOT FOUND</h1>
			<div class="error_description">
				<p>お探しのページは見つかりません。</p>
				<p>お探しのページは一時的にアクセスできない状況にあるか、移動もしくは削除された可能性があります。</p>
				<p>また、URL、ファイル名にタイプミスがないか再度ご確認ください。</p>
			</div>
			<div class="comp-button-wrapper">
				<div class="button_item">
					<a href="/">ホームへ戻る</a>
				</div>
			</div>
		</div>
	</section>
</article>
<?php get_template_part("parts/hummenu");?>
<?php get_template_part("parts/footer");?>
</body>
<?php get_template_part("parts/script");?>
</html>
