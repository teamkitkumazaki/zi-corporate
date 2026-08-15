<!doctype html>
<html style="--wHeight:100vh; --wHeightPx:100vh; --scroll:0; --wHeightFixedPx:100vh;">
<head>
	<?php get_template_part("parts/head"); ?>
</head>
<body>
	<header class="underpage">
		<?php get_template_part("parts/header"); ?>
	</header>
	<article id="contact" class="page-underpage">
		<section class="section-main">
			<div class="section_inner">
				<div class="section_inner_inner">
					<div class="comp-underpage-title">
						<h1 class="ttl">お問い合わせ</h1>
						<div class="title_description">
							<p>zen intelligenceにご興味をお持ちいただきありがとうございます。<br>お問い合わせはこちらのフォームよりお申し込みください。<br>お問い合わせ後、数日以内に担当者よりご連絡させていただきます。</p>
						</div>
					</div><!-- comp-underpage-title -->
				</div><!-- section_inner_inner -->
			</div><!-- section_inner -->
		</section>
		<section class="section-form">
			<div class="section_inner">
				<div class="section_inner_inner">
					<div class="company_contents">
						<div id="contactWrap" class="comp-form-wrap">
							<div class="form_item">
								<div class="label_wrap">
									<label class="">お名前</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<div class="name_wrap">
										<input type="text" name="yourname" placeholder="山田太郎" class="bg">
									</div>
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">メールアドレス</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="input-number bg" type="text" name="useremail" placeholder="info@zen-intelligence.ai">
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">メールアドレス(確認用)</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="input-number bg" type="text" name="useremail2" placeholder="info@zen-intelligence.ai">
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">会社名</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="bg" type="text" name="corpname" placeholder="Zen Intelligence株式会社">
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">部署名</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="bg" type="text" name="corpname2">
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">役職名</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="bg" type="text" name="corpname3">
								</div>
							</div>
							<div class="form_item">
								<div class="label_wrap">
									<label class="">電話番号</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<input class="input-number bg" type="text" name="userphone" placeholder="012-3456-7890">
								</div>
							</div>
							<div class="form_item b_none">
								<div class="label_wrap">
									<label class="">お問い合わせ内容</label>
									<span class="required">必須</span>
								</div>
								<div class="form_box">
									<textarea name="content" class="bg"></textarea>
								</div>
							</div>
							<div class="privacy_wrap">
								<div class="agreement">
									<div class="agree_wrap">
										<label>
											<input id="agreeBox" name="agreement" type="checkbox" value="1">
											<span class="radio_checker"></span>
											<span class="name"><a target="_blank" href="/privacy-policy">プライバシーポリシー</a>に同意する</span>
										</label>
									</div>
								</div><!-- agreement -->
							</div><!-- privacy_wrap -->
							<div id="ajaxLoader" class="ajax_loader">
								<span class="loading"></span>
							</div>
							<div id="statusMessage" class="status_message hidden"></div>
							<div id="submitButton" class="submit_wrap disabled">
								<span class="text_wrap">
									<span class="ja"><span class="">内容を送信する</span></span>
									<input type="button" value="内容を送信する" class="ga_contact">
								</span>
							</div>
						</div><!-- comp-form-wrap -->
					</div><!-- company_contents -->
				</div><!-- section_inner_inner -->
			</div><!-- section_inner -->
		</section>
		<?php get_template_part("parts/recruit");?>
	</article>
	<?php get_template_part("parts/hummenu"); ?>
	<?php get_template_part("parts/footer"); ?>
</body>
<?php get_template_part("parts/script"); ?>
</html>
