<?php
global $wp_rewrite;
$wp_rewrite->flush_rules();

/*【管理画面】投稿メニューを非表示 */
function remove_menus () {
  global $menu;
  remove_menu_page( 'edit.php' ); // 投稿を非表示
}

add_action('admin_menu', 'remove_menus');

add_filter('redirect_canonical','disable_redirect_canonical');

add_theme_support('post-thumbnails');

function disable_redirect_canonical( $redirect_url ) {
  if (is_single()){
    $redirect_url = false;
    return $redirect_url;
  }
}

/* リンクをカード形式で表示するための関数 */
function show_Linkcard($atts) {
  extract(shortcode_atts(array(
    'url'=>"",
    'title'=>"",
    'excerpt'=>""
  ),$atts));

  //OGP情報を取得
  require_once 'OpenGraph.php';
  $graph = OpenGraph::fetch($url);

  $detects = array('ASCII','EUC-JP','SJIS', 'JIS','CP51932','UTF-16', 'ISO-8859-1');

  //OGPタグからタイトルを取得
  $Link_title = $graph->title;
  $src        = $graph->image;


  $title_check = utf8_decode($Link_title);
  if(mb_detect_encoding($title_check) == 'UTF-8'){
    $Link_title = $title_check; // 文字化け解消
  }

  if(mb_detect_encoding($Link_title) != 'UTF-8'){
    $Link_title = mb_convert_encoding($Link_title, 'UTF-8', mb_detect_encoding($Link_title, $detects, true));
  }

  //OGPタグからdescriptionを取得
  $Link_description = $graph->description;

  $description_check = utf8_decode($Link_description);
  if(mb_detect_encoding($Link_description) == 'UTF-8'){
    $Link_description = $description_check; // 文字化け解消
  }

  if(mb_detect_encoding($Link_description) != 'UTF-8'){
    $Link_description = mb_convert_encoding($Link_description, 'UTF-8', mb_detect_encoding($Link_description, $detects, true));
  }

  $Link_description = wp_trim_words($Link_description, 60, '…' );

  if(!empty($excerpt)){
    $Link_description = $excerpt;//値を取得できない時場合は直にexcerpt=""を入力
  }

  if(!empty($src)){
    $xLink_img = '<img src="'. $src .'" />';
    $sc_Linkcard .='
    <div class="link_box">
      <a target="_blank" href="'. $url .'">
        <span class="link_img">'. $xLink_img .'</span>
        <span class="link_txt">
          <span class="link_ttl">'. $Link_title .'</span>
          <span class="link_url">'. $url .'</span>
        </span>
      </a>
    </div>';
  }else{
    $sc_Linkcard .='
    <div class="link_box">
      <a target="_blank" href="'. $url .'">
        <span class="link_txt" style="width: 100%;">
          <span class="link_ttl">'. $Link_title .'</span>
          <span class="link_url">'. $url .'</span>
        </span>
      </a>
    </div>';
  }

  return $sc_Linkcard;
}
//関数利用時のフォーマット
add_shortcode("sc_Linkcard", "show_Linkcard");

/*
update_option( 'siteurl', 'https://liberohome.jp/' );
update_option( 'home', 'https://liberohome.jp/' );
*/
/*
function call_back($buffer) {
    $buffer = str_replace("https://res.cloudinary.com/dbwqcy0op/image/upload/","https://res.cloudinary.com/dbwqcy0op/image/upload/c_fit,f_auto,q_auto/",$buffer); //HTML出力で置き換える処理 cloudinary
    return $buffer;
}


function buf_start() { ob_start("call_back"); }
function buf_end() { ob_end_flush(); }
*/

//カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
  $customPostSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル,
    'editor',  // 記事本文
    'custom-fields' ,//カスタムフィールド
    'thumbnail',  // アイキャッチ画像*/
  ];
  //カスタム投稿タイプ１（ここから）
  register_post_type(
    'news',  // カスタム投稿名
    array(
      'labels' => array(
        'name' => __( 'お知らせ' ), // 管理画面の左メニューに表示されるテキスト
        'singular_name' => __( 'news' ),
        'rewrite' => array('slug' => 'news-post'),
        'rewrite' => array( 'with_front' => false ),
      ),
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'menu_position' => 5,  // 管理画面上でどこに配置するか ※「5」で「投稿」の下に配置
      'has_archive' => true,  // アーカイブを有効にするか否か
      'show_in_rest' => true,
      'supports' => array(
        'title',
        'thumbnail'
      )
    )
  );
  register_taxonomy(
    'news-category', //タグ名（任意）
    'news', //カスタム投稿名
    array(
      'hierarchical' => true, //タグタイプの指定（階層をもつかどうか？）
      //ダッシュボードに表示させる名前
      'label' => 'カテゴリ',
      'show_in_rest' => true,
      'public' => true,
      'show_ui' => true,
      'rewrite' => true,
    )
  );
}

function post_output_css() {
    $pt = get_post_type();
    if ($pt == 'page') {
        $hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
        echo $hide_postdiv_css;
    }
}

add_action('admin_head', 'post_output_css');

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  if ($output) {
    $first_img = $matches [1][0];
  }
  if (empty($first_img)) {
    $first_img = "no_image";
  }
  return $first_img;
}
