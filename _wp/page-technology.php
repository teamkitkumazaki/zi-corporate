<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<header>
		<?php get_template_part("parts/header"); ?>
	</header>
	<?php
		$corporate_info = SCF::get('corporate_info', 150);
		$board_member = SCF::get('board_member', 6);
		$member_link = SCF::get('member_link', 6);
	?>
	<article id="technology" class="page-technology">
		<section class="section-tech-header">
			<div class="section_inner">
				<h1 class="comp-page-title">技術的信念</h1>
				<div class="flex_layout">
					<div class="flex_left">
						<div class="comp-section-title white">
							<h2 class="ttl">Zen Intelligence が実現すること</h2>
						</div>
					</div><!-- flex_left -->
					<div class="flex_right">
						<div class="comp-flex-txt-wrap">
							<h3 class="flex_subttl">物理作業領域に、<br>生成AIによる技術革新をもたらす</h3>
							<div class="flex_description">
								<p>生成AIの普及により、非定型の事務作業領域の業務効率化が急速に進みつつあります。一方で、物理作業を伴う領域においては、生成AIによる効率化・自動化の効果は依然として限定的です。<br>Zen Intelligenceは、物理空間・物理業務のデータ化と、現場のコンテキストを理解した生成AIにより、基幹産業を変革していきます。</p>
							</div>
						</div>
					</div><!-- flex_right -->
				</div><!-- flex_layout -->
				<div class="chart_wrap">
					<div class="chrart_img_wrap">
						<img src="<?php echo get_template_directory_uri();?>/assets/img/technology/tech_chart.jpg">
					</div>
				</div><!-- chart_wrap -->
			</div><!-- section_inner -->
		</section>
		<section class="section-layer-chart">
			<div class="section_inner">
				<div class="layer_ttl_wrap effect animate-fadeup">
					<h2 class="layer_subttl">基幹産業を変革する、<br>Physical AIを構成する技術</h2>
				</div>
				<div class="comp-layer-chart">
					<div class="chart_item effect animate-fadeup">
						<div class="ttl_wrap">
							<div class="layer_num">Layer 01</div>
							<h3 class="layer_ttl">空間</h3>
						</div>
						<div class="layer_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/technology/layer01.svg">
						</div>
						<div class="layer_desc">
							<h4 class="subttl">Spatial Intelligence</h4>
							<div class="description">
								<p>現場の3次元空間とその時間変化の文脈を、AIが理解可能な構造に変換する技術 AI技術</p>
							</div>
						</div>
					</div>
					<div class="chart_item effect animate-fadeup">
						<div class="ttl_wrap">
							<div class="layer_num">Layer 02</div>
							<h3 class="layer_ttl">業務</h3>
						</div>
						<div class="layer_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/technology/layer02.svg">
						</div>
						<div class="layer_desc">
							<h4 class="subttl">Operational Intelligence</h4>
							<div class="description">
								<p>物理空間の中で行われる業務のプロセスや知見を、AIが理解可能な構造に変換する技術</p>
							</div>
						</div>
					</div>
					<div class="chart_item effect animate-fadeup">
						<div class="ttl_wrap">
							<div class="layer_num">Layer 03</div>
							<h3 class="layer_ttl">エージェント</h3>
						</div>
						<div class="layer_img">
							<img src="<?php echo get_template_directory_uri();?>/assets/img/technology/layer03.svg">
						</div>
						<div class="layer_desc">
							<h4 class="subttl">Physical AI Agent</h4>
							<div class="description">
								<p>現場全体のコンテキストを把握し、熟練者のように自律的に行動するAIエージェント。物理的な業務を支援・自動化する。</p>
							</div>
						</div>
					</div>
				</div><!-- comp-layer-chart -->
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/recruit");?>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
