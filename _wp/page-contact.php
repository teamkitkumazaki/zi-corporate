<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<?php get_template_part("parts/header"); ?>
	<?php
		$lead_txt = SCF::get('lead_txt', 87);
	?>
	<article id="contact" class="page-contact">
		<section class="section-main comp-underpage-ttl">
			<div class="main_inner">
				<div class="comp-section-title white">
					<span class="ttl_en">Contact</span>
					<h1 class="ttl_jp">お問い合わせ</h1>
				</div><!-- comp-section-title -->
			</div><!-- main_inner -->
		</section>
		<section id="headerBlueSection" class="section-contact-form">
			<div class="section_inner">
				<div class="lead_txt">
					<p><?= $lead_txt;?></span></p>
				</div>
				<div class="comp-form-wrap2">
					<script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/embed/v2.js"></script>
					<script>
  					hbspt.forms.create({
    					region: "na1",
    					portalId: "20891322",
    					formId: "93755597-f3f0-4bcb-bfc3-29dffed1f3ff"
  					});
					</script>
				</div><!-- comp-form-wrap -->
			</div><!-- section_inner -->
		</section>
	</article>
	<?php get_template_part("parts/background"); ?>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
