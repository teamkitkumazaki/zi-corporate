<?php
  $global_menu = SCF::get('global_menu', 150);
  $global_menu2 = SCF::get('global_menu2', 150);
  $corp_address = SCF::get('corp_address', 150);

?>
<footer>
  <div class="footer_inner">
    <div class="footer_upper">
      <div class="footer_logo">
        <a href="/">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/common/h_logo.svg">
        </a>
        <div class="corp_info_pc">
          <p style="white-space: pre-line;"><?= $corp_address;?></p>
        </div>
      </div>
      <div class="footer_navigation">
        <nav class="comp-main-navigation">
          <ul>
            <?php foreach ($global_menu as $d):?>
            <li>
              <a <?php if ($d['blank']):?>target="_blank"<?php endif;?> href="<?= $d['menu_link'];?>">
                <span class="title_en"><?= $d['menu_ttl_en'];?></span>
                <span class="title_jp"><?= $d['menu_ttl_jp'];?></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <ul>
            <?php foreach ($global_menu2 as $d):?>
            <li>
              <a <?php if ($d['blank2']):?>target="_blank"<?php endif;?> href="<?= $d['menu_link2'];?>">
                <span class="title_en"><?= $d['menu_ttl_en2'];?></span>
                <span class="title_jp"><?= $d['menu_ttl_jp2'];?></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </div>
    <div class="footer_lower">
      <div class="comp-button-wrapper">
        <div class="wrapper_inner">
          <div class="button_item half">
            <a target="_blank" class="blue" href="https://www.srush.co.jp/download">資料請求</a>
          </div>
          <div class="button_item half">
            <a target="_blank" class="orange" href="https://www.srush.co.jp/request">無料相談</a>
          </div>
          <div class="button_item">
            <a target="_blank" class="grad3" href="https://www.srush.co.jp/partner-request">パートナープログラム資料請求</a>
          </div>
        </div>
      </div>
      <div class="comp-sub-navigation">
        <ul>
          <li><a target="_blank" href="https://www.srush.co.jp/security">セキュリティーポリシー</a></li>
          <li><a target="_blank" href="https://www.srush.co.jp/privacy">プライバシーポリシー</a></li>
          <li class="blank"></li>
          <li><a target="_blank" href="https://x.com/Srush_Inc"><img src="<?php echo get_template_directory_uri();?>/assets/img/common/icon_x.svg"></a></li>
          <li><a target="_blank" href="https://www.facebook.com/srush.inc"><img src="https://www.srush.co.jp/hubfs/img_corporate/icon_fb.svg" style="height:19px !important;"></a></li>
          <li><a target="_blank" href="https://note.com/srush/"><img src="<?php echo get_template_directory_uri();?>/assets/img/common/icon_note.svg"></a></li>
        </ul>
      </div>
    </div>
    <div class="corp_info">
      <p><?= $corp_address;?></p>
    </div>
    <p class="copyright">Copyright(C) Srush, Inc All Rights Reserved.</p>
  </div>
</footer>
