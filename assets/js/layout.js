$(function() {
  console.log('layout.js');
  // タブレットレイアウトをPCと統一
  var metaDiscre = document.head.children;
  var metaLength = metaDiscre.length;
  if(window.outerWidth > 700 && window.outerWidth < 1200){
    for(var i = 0;i < metaLength;i++){
       var proper = metaDiscre[i].getAttribute('name');
        if(proper === 'viewport'){
          var dis = metaDiscre[i];
          dis.setAttribute('content','width=1200');
        }
    }
  }

  $(window).on('load', function() {
	   const url = $(location).attr('href'),
	   headerHeight = 100;

     if(url.indexOf("#") != -1){
       const anchor = url.split("#"),
       target = $('#' + anchor[anchor.length - 1]),
		   position = Math.floor(target.offset().top) - headerHeight;
		   $("html, body").animate({scrollTop:position}, 500);
	   }
  });


  //トップに戻るボタン + スクロール + ウィンドウサイズ系の対策処理
  function scrollAnimationSet(target) {
    const scButtonWrap = $('#scrollTopWrap');
    const indexProducts = document.getElementById("indexProducts");
    const position = document.documentElement;
    let wHeight = window.innerHeight;
    let preSetWidth = window.innerWidth;
    let scrollCount = 0;

    function setHeightProperty() {
      wHeight = window.innerHeight;
      position.style.setProperty('--wHeight', window.innerHeight);
      position.style.setProperty('--wHeightPx', window.innerHeight + 'px');
      position.style.setProperty('--scroll', window.scrollY);
      requestAnimationFrame(setHeightProperty);

      $(".effect").each(function() {
        var imgPos = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > imgPos - windowHeight + windowHeight / 7) {
          $(this).removeClass('effect');
        };
      });

    }

    function setProperties() {
      setHeightProperty();
    }

    function init() {
      /*const scrollButton = document.querySelector('#returnTop');
      scrollButton.addEventListener( 'click' , scrollTop );*/
      function scrollTop(){
        window.scroll({top: 0, behavior: 'smooth'});
      };
      var timer = false;
      setProperties();
      position.style.setProperty('--wHeightFixedPx', window.innerHeight + 'px');
      setProperties();
    }

    init();

  }

  scrollAnimationSet($('article'));


  // ハンバーガーメニューの開閉
  function humMenuControll(target){
    var header = $('header')
    var humButton = $('#humButton button');
    var closeButton = $('#humClose');
    var humState = 0;

    function hummenuMove(){
      if(humState == 0){
        target.addClass('open');
        header.addClass('hum_open');
        humState = 1;
      }else{
        target.removeClass('open');
        header.removeClass('hum_open');
        humState = 0;
      }
    }

    function init(){
      humButton.on({
        'click': function() {
          hummenuMove();
        }
      });
      closeButton.on({
        'click': function() {
          hummenuMove();
        }
      });
    }

    init();
  }

  humMenuControll($('#hummenu'));

  function mainKvShifter() {
    var slider = $('#indexMainKv');
    var sliderLength = $('#indexMainKv').find('.slide_item').length;
    var objSelect;
    var timeId;
    var duration = 3000;
    var interval = 3000;
    var current = 0;
    var objBox = [];
    var btnList = [];

    function changeState() {
      if (current < sliderLength - 1) {
        current++;
      } else {
        current = 0;
      }
      slideChange(current)
    }

    function startAuto() {
      timeId = setTimeout(changeState, interval);
    }

    function stopAuto() {
      clearTimeout(timeId)
    }

    function complete() {
      startAuto();
    }

    function slideChange(e) {
      $('.display_slide').removeClass('display_slide');
      $('.slide' + e).addClass('display_slide');
      complete();
      current = e;
    };

    function init() {
      slider.find('li').each(function(index) {
        if (index == 0) {
          $(this).addClass('display_slide');
        }
        $(this).addClass('slide' + index);
      });
      startAuto();
    };

    init();
  }

  if (document.getElementById('index')) {
    mainKvShifter();
  }

  //商品詳細ページ サムネイルの切り替え
  function thumbSwitcher(target){
    let thumbButton = [];
    let thumbSrc = [];
    let thumbSrcSet = [];
    let thumbBox = target.find('.thumb_img');
    let thumbImage = thumbBox.find('img');
    let slideNum = target.find('.thumbnails').find('img').length;
    const time = 200;
    let currentSlide = 0;
    console.log('slideNum:' + slideNum);

    function switchImage(num){
      console.log('num:' + num);
      thumbBox.stop().animate({ opacity: 0 }, time, function() {
          thumbImage.attr('src', thumbSrc[num]);
          thumbImage.attr('srcset', thumbSrcSet[num]);
          $('.active_thumb').removeClass('active_thumb');
          thumbButton[num].addClass('active_thumb');
          thumbBox.stop().animate({ opacity: 1 }, time);
      });
    }

    function thumbHeightControll(){
      var thumbHeight = thumbImage.outerHeight();
      $('#thumnails').css({'max-height': thumbHeight + 'px'});
      requestAnimationFrame(thumbHeightControll);
    }

    function slideNext(){
      if (currentSlide < slideNum - 1) {
        currentSlide = currentSlide + 1;
      } else {
        currentSlide = 0;
      }
      thumbButton[currentSlide].click();
      /*switchImage(currentSlide);*/
    };

    function slidePrev(){
      if (currentSlide == 0) {
        currentSlide = slideNum - 1;
      } else {
        currentSlide = currentSlide - 1;
      }
      thumbButton[currentSlide].click();
      /*switchImage(currentSlide);*/
    };

    function tabTouch(){
      if(startTouchX - endTouchX > 50){
        slideNext();
      }else if(startTouchX - endTouchX < - 50){
        slidePrev();
      }
    };

    function windowDrag() {
      if (startDragX - endDragX > 100) {
        slideNext();
      } else if (startDragX - endDragX < -100) {
        slidePrev();
      }
    };

    function init(){
      thumbHeightControll();
      $.each(target.find('.thumbnails').find('button'), function(index) {
        thumbButton[index] = $(this);
        thumbSrc[index] = $(this).find('img').attr("src");
        thumbSrcSet[index] = $(this).find('img').attr("srcset");
        thumbButton[index].on({
          'click': function() {
            switchImage(index);
          }
        });
      });

      thumbBox.find('img').on({
        'dragstart': function(e) {
          event.preventDefault();
          startDragX = event.pageX;
        },
        'dragend': function(e) {
          endDragX = event.pageX;
          windowDrag();
        }
      });

      thumbBox.find('img').on({
        'touchstart' : function(e){
          event.preventDefault();
          startTouchX = event.changedTouches[0].pageX;
        },
        'touchmove' : function(e){
        },
        'touchend' : function(e){
          endTouchX = event.changedTouches[0].pageX;
          tabTouch();
        }
      });

      $(window).on({
        'resize': function(){
          thumbHeightControll();
        }
      });
    }

    init();

  }

  if (document.getElementById('product')) {
    thumbSwitcher($('#prodImages'));
  }


  //商品詳細ページ 購入数の増減 & バリエーションの切り替え
  function cartWrapControll(){
    var minusButton = $('#minusButton');
    var plusButton = $('#plusButton');
    var quantityInput = $('#quantityInput');
    var quantityNum = 1;
    var optionSelector = $('#optionSelector');
    var optionLabel = [];
    var labelState = [];

    var purchaseButton = $('#purchaseButton');
    var buttonProdID = purchaseButton.attr('prodID');
    var cartURL = 'https://shop.sanaburi.co.jp/cart/'

    function controllQuantity(vector){
      quantityNum = quantityInput.val();
      if(vector == 1){
        quantityInput.attr('value', Number(quantityNum) + 1);
        quantityNum = quantityInput.val();
      }else{
        if(quantityNum != 1){
          quantityInput.attr('value', Number(quantityNum) - 1);
          quantityNum = quantityInput.val();
        }
      }
      purchaseButton.attr('href', cartURL + buttonProdID + ':' + quantityNum);
    }

    function changeProductOption(e){
      if(labelState[e] == 0){
        optionLabel[e].addClass('active_label');
        labelState[e] = 1;
      }else{
        optionLabel[e].removeClass('active_label');
        labelState[e] = 0;
      }
    }

    function init(){

      minusButton.on({
        'click': function() {
          event.preventDefault();
          controllQuantity(-1);
        }
      });

      plusButton.on({
        'click': function() {
          event.preventDefault();
          controllQuantity(1);
        }
      });

      // 通常購入のサイズ切り替え
      $.each(optionSelector.find('label'), function(index) {
        optionLabel[index] = $(this);
        labelState[index] = 0;
        optionLabel[index].on({
          'click': function() {
            event.preventDefault();
            changeProductOption(index);
          }
        });
      });



    };

    init();

  }

  if (document.getElementById('product')) {
    cartWrapControll();
  }

  // 商品詳細ページ 蛇腹式レイアウト
  function toggleControl(target){
    let toggleItem = [];
    let toggleButton = [];
    let toggleContents = [];
    let toggleInner = [];
    let toggleType = [];
    let toggleState = [];
    let toggleState2 = [];
    let toggleInToggle = [];
    let windowWidth;
    let spWidth = 721;


    function toggleMove(e) {
      var buttonHeight = toggleButton[e].outerHeight();
      var tagetHeight = toggleInner[e].outerHeight();
      if (toggleState[e] == -1 || toggleState[e] == 0) {
        toggleButton[e].addClass('open');
        toggleContents[e].css({
          'height': tagetHeight + 'px'
        });
        toggleState[e] = 1;
      } else {
        toggleButton[e].removeClass('open');
        var toggleHeight = toggleButton[e].outerHeight();
          toggleContents[e].css({
            'height': 0 + 'px'
          });
        toggleState[e] = 0;
      }
    }

    function init(){
      windowWidth = $(window).width();
      $.each(target.find('.toggle_item'), function(index) {
        toggleItem[index] = $(this);
        toggleButton[index] = $(this).find('.toggle_button');
        toggleContents[index] = $(this).find('.toggle_contents');
        toggleInner[index] = $(this).find('.toggle_inner');
        toggleType[index] = toggleItem[index].attr('type');
        var tagetHeight = toggleInner[index].outerHeight();
        if(toggleType[index] == 'open'){
          toggleContents[index].css({'height': tagetHeight + 'px'});
          toggleState[index] = 1;
          toggleState2[index] = -1;
        }else if(toggleType[index] == 'close'){
          toggleContents[index].css({'height': 0 + 'px'});
          toggleState[index] = 0;
          toggleState2[index] = -1;
        }else{
          toggleContents[index].css({'height': tagetHeight + 'px'});
          toggleState[index] = 1;
          toggleState2[index] = -1;
        }
        toggleButton[index].on({
          'click': function() {
            toggleMove(index);
          }
        });

      });
    }

    init();

  }

  if (document.getElementById('product')) {
    toggleControl($('#toggles'))
  }

  // メンバー紹介ポップアップ
  function peopleProfilePop(target){

    var profilePop = $('#profilePop');
    var profileBg = $('#profileBg');
    var profileClose = $('#profileClose');
    var profileInner = $('#profileInner');

    var profileImg = $('#profileImg');
    var basicProfile = $('#basicProfile');
    var profileWrapper = $('#profileWrapper');
    var profileState = 0;


    var peopleItem = [];
    var peopleItemImg = [];
    var peopleItemName = [];
    var peopleItemProfile = [];
    var peopleButton = [];

    function getScrollHeight(){
      var scrollHeight = document.getElementById('profileInner').scrollTop;
      var wrapperHeight = $('#profileInner').outerHeight();
      var contentsHeight = $('#profileContent').outerHeight();
      var scroll = contentsHeight - wrapperHeight;
      var indicator = scrollHeight / scroll * 100;
      $('#indicatorGauge').css({'height': indicator + '%'});
    }

    function closePop(){
      profilePop.removeClass('open');
    }


    function displayPop(e){
      profileImg.attr('src',peopleItemImg[e]);
      basicProfile.html(peopleItemName[e]);
      profileWrapper.html(peopleItemProfile[e]);
      setTimeout(function() {
        profilePop.addClass('open');
      }, 100);
    }

    function init(){

      profileInner.on({
        'scroll': function() {
          getScrollHeight();
        }
      });

      $.each(target.find('.people_item'), function(index) {
        peopleItem[index] = $(this);
        peopleItemImg[index] = $(this).find('.portrait').attr('src');
        peopleItemName[index] = $(this).find('.txt_wrap').html();
        peopleItemProfile[index] = $(this).find('.profile_wrapper').html();
        peopleButton[index] = $(this).find('button');
        peopleButton[index].on({
          'click': function(){
            displayPop(index);
          }
        });

      });

      profileBg.on({
        'click': function(){
          closePop();
        }
      });

      profileClose.on({
        'click': function(){
          closePop();
        }
      });

    }

    init();

  }


  if (document.getElementById('peopleList')) {
    peopleProfilePop($('#peopleList'));
  }

  // 記事コンテンツのHTML整形
  function arrangeArticleHTML(target){

    console.log('arrangeArticleHTML');

    function addTextLink(){
      $('.content_desc').each(function (idx, elem) {
        console.log('content_desc');
        let str = $(elem).html();
        let regexp_url = /((h?)(ttps?:\/\/[a-zA-Z0-9.\-_@:/~?%&;=+#',()*!]+))/g;
        let regexp_makeLink = function(all, url, h, href) {
          return '<a href="h' + href + '" target="_blank">' + url + '</a>';
        }
        let textWithLink = str.replace(regexp_url, regexp_makeLink);
        $(elem).html(textWithLink);
      });
    }

    function init(){
      target.find('a').each(function(index) {
        var hrefLink = $(this).attr('href');
        var replaceTxt = hrefLink.replace("https:", '');
        $(this).attr('href', replaceTxt);
      });
      addTextLink();
    }

    init();

  }

  if (document.getElementById('articleContent')) {
    arrangeArticleHTML($('#articleContent'));
  }

  // 記事詳細ページ リンクをコピーボタン

  function linkCopyButtons(){
    console.log('linkCopyButtons');
    var copyButton = $('#urlCopyButton');

    function copyUrl() {
      console.log('copy!');
      const element = document.createElement('input');
      element.value = location.href;
      document.body.appendChild(element);
      element.select();
      document.execCommand('copy');
      document.body.removeChild(element);
      copyButton.addClass('copied');
      copyButton.find('.txt').html('コピーしました')
      setTimeout(function() {
        copyButton.removeClass('copied');
        copyButton.find('.txt').html('URLをコピー')
      }, 2000);
    }

    function init(){

      copyButton.on({
        'click': function() {
          copyUrl();
        }
      });
    }

    init();

  }

  if (document.getElementById('newsDetail')) {
    linkCopyButtons();
  }

  /* お問い合わせフォームのGAS連動とバリデーション */
  function setMyForm(target){
    console.log('setMyForm');
    var ERROR_MESSAGE_CLASSNAME = 'errorMsg'; //エラー時のメッセージ要素のclass名
    var ERROR_INPUT_CLASSNAME = 'errorInput'; //エラー時のinput要素のclass名
    var errorCount = 0;
    var submitWrap = $('#submit');
    var submitButton = $('#submitButton input');
    var items = []; //チェック対象となるテキスト入力要素を格納した配列

    //項目チェックする
    var checkAll = function(){
      errorCount = 0;

      //input,textareaのチェック
      for( var i=0; i<items.length; i++ ){
        if( items[i].prop('isSuccess') == false ){
          errorCount++;
          console.log('error:' + i);
        };
      };

      if( errorCount == 0 ){
      }else{
      };
    };

    function hankaku2Zenkaku(target) {
      var str = target.val();
      str = str.replace( /[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function(s) {
        return String.fromCharCode(s.charCodeAt(0) - 65248);
      }).replace(/[ー]/g, '').replace(/[−]/g, '');

      target.val(str.trim().replace(/\s+/g, ''));
    }

    //エラーメッセージの追加
    var addErrorMessage = function(selector, msg){
      removeErrorMessage(selector);
      selector.parent('div').append('<span class="attention '+ERROR_MESSAGE_CLASSNAME+'">'+msg+'</span>');
      selector.addClass(ERROR_INPUT_CLASSNAME);
    };

    //エラーメッセージの削除
    var removeErrorMessage = function(selector){
      var msgSelector = selector.parent().parent('div').find('.'+ERROR_MESSAGE_CLASSNAME);
      if( msgSelector.length != 0 ){
        msgSelector.remove();
        selector.removeClass(ERROR_INPUT_CLASSNAME);
      };
    };

    //input,textareaの未入力チェック
    var checkEmptyText = function(selector, msg){
      if( selector.val() == '' ||  selector.val() == null){
        addErrorMessage(selector, msg);
        selector.prop('isSuccess', false);
      }else{
        removeErrorMessage(selector);
        selector.prop('isSuccess', true);
      };
    };

    var emptyThrough = function(selector){
      if( selector.val() == '' ||  selector.val() == null){
        removeErrorMessage(selector);
        selector.prop('isSuccess', true);
      }
    };

    //radioの未入力チェック
    var checkRadioBox = function(selector, msg){
      if( selector.prop("checked")){
        removeErrorMessage(selector);
        selector.prop('isSuccess', true);
      }else{
        addErrorMessage(selector, msg);
        selector.prop('isSuccess', false);
      };
    };

    //文字列のフォーマットチェック
    function checkFormatText(selector, _mode, msg){
      var value = selector.val();
      switch(_mode){
        //全角のみ
        case 0:
          if(value.match(/^[^ -~｡-ﾟ]*$/)){
            selector.prop('isSuccess', true);
            removeErrorMessage(selector);
          }else{
            selector.prop('isSuccess', false);
          };
          break;
        //ふりがなのみ
        case 1:
          if(value.match(/^[\u3040-\u309F]+$/)){
            selector.prop('isSuccess', true);
          }else{
            selector.prop('isSuccess', false);
          };
          break;
        //半角数字のみ
        case 2:
          if(value.match(/^[0-9\-]+$/) || value.length < 1 ){
            selector.prop('isSuccess', true);
          }else{
            selector.prop('isSuccess', false);
          };
          break;
        //メールアドレスかどうか
        case 3:
          if(value.match(/^[a-zA-Z0-9!$&*.=^`|~#%'+\/?_{}-]+@([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,6}$/)){
            selector.prop('isSuccess', true);
          }else{
            selector.prop('isSuccess', false);
          };
          break;
        //カタカナのみ
        case 4:
          if(value.match(/^[\u30A0-\u30FF]+$/) || value.match(/^[\uFF61-\uFF9F]+$/)){
            selector.prop('isSuccess', true);
          }else{
            selector.prop('isSuccess', false);
          };
          break;
        //全てエラーにする
        case 5:
          selector.prop('isSuccess', false);
          break;
      };
      if( selector.prop('isSuccess') == false ){
        addErrorMessage(selector, msg);
      }else{
        removeErrorMessage(selector);
      };
    };

    //初期設定
    var init = function(){
      //submitイベントの設定
      target.on({
        'submit': function(){
          checkAll();
        }
      });
      //input要素を配列に格納
      items = [
        target.find('input[name="yourname"]'), //0 お名前
        target.find('input[name="corpname"]'), //1 会社名
        target.find('input[name="useremail"]'), //2 メールアドレス
        target.find('input[name="useremail2"]'), //3 メールアドレス確認用
        target.find('input[name="userphone"]'), //4 電話番号
        target.find('textarea[name="content"]'), //5 ご相談内容
        target.find('input[name=agreement]'), //6 プラポリへの合意
      ];
      //input要素のプロパティを設定
      $.each(items, function(index){
        items[index].prop('isSuccess', false);
      });

      //enterキーでsubmitしてしまうのを防止する
      target.find('input[type=text]').on({
        'keypress': function(e){
          if( (e.keyCode == 13) ) return false;
        }
      });
      //0 お名前
      items[0].on({
        'blur': function(){
          checkEmptyText( items[0], '※お名前を入力してください。' );
          checkAll();
        }
      });

      //1 会社名
      items[1].prop('isSuccess', true);

      //2 メールアドレス
      items[2].on({
        'blur': function(){
          checkEmptyText( items[2], '※メールアドレスをご入力ください。' );
          if( items[2].prop('isSuccess') ) checkFormatText( items[2], 3, 'アドレスの形式をご確認ください' );
          checkAll();
        }
      });

      //3 メールアドレス(確認用)
      items[3].on({
        'blur': function(){
          checkEmptyText( items[3], '※確認用メールアドレスは必須です。');
          if( items[3].prop('isSuccess') ){
            checkFormatText( items[3], 3, '※確認用メールアドレスの形式をご確認ください' );
            if(items[2].val() != items[3].val()){
              checkFormatText( items[3], 5, '※メールアドレスが一致しません。' );
            }
          }

          checkAll();

        }
      });

      //4 電話番号
      items[4].prop('isSuccess', true);

      items[4].on({
        'blur': function(){
          hankaku2Zenkaku($(this));
          /*if( items[4].prop('isSuccess') ) checkFormatText( items[4], 2, '※電話番号は数字で入力してください。');*/
          checkAll();
        }
      });

      //5 ご相談内容
      items[5].on({
        'blur': function(){
          checkEmptyText( items[5], '※ご相談内容を入力してください。' );
          checkAll();
        }
      });

      console.log('items[6]:' + items[6].attr('id'));

      //6 プラポリへの合意
      items[6].on({
        'change': function(){
          console.log('check!');
          var agreeState = $('input[name=agreement]:checked').val();
          if(agreeState == 1){
            items[6].prop('isSuccess', true);
            $('#submitButton').removeClass('disabled');
          }else{
            items[6].prop('isSuccess', false);
            $('#submitButton').addClass('disabled');
          }
        }
      });

      submitButton.on({
        'click': function(){
          checkEmptyText( items[0], '※お名前を入力してください。' );
          checkEmptyText( items[2], '※メールアドレスをご入力ください。' );
          if( items[2].prop('isSuccess') ) checkFormatText( items[2], 3, 'アドレスの形式をご確認ください' );
          checkEmptyText( items[3], '※確認用メールアドレスは必須です。');
          if( items[3].prop('isSuccess') ){
            checkFormatText( items[3], 3, '※確認用メールアドレスの形式をご確認ください' );
            if(items[2].val() != items[3].val()){
              checkFormatText( items[3], 5, '※メールアドレスが一致しません。' );
            }
          }
          if( items[4].prop('isSuccess') ) checkFormatText( items[4], 2, '※電話番号は数字で入力してください。');
          checkEmptyText( items[5], '※ご相談内容を入力してください。' );
          items[1].prop('isSuccess', true);
          checkAll();
          if( errorCount == 0 ){
            processOrderContent();
          }else{
            alert('入力内容に不備があります。入力内容を確認いただき、再度送信ボタンを押してください。');
            var scrollHeight = $('#contact').offset().top;
            $("html, body").animate({
              scrollTop: scrollHeight
            }, 300);
          };
        }
      })
    };

    function processOrderContent(){
      $('#submitButton').addClass('disabled');
      $('#ajaxLoader').addClass('loading_state');
      var yourname = target.find('input[name="yourname"]').val();
      var corpname = target.find('input[name="corpname"]').val();
      var useremail = target.find('input[name="useremail"]').val();
      var userphone = target.find('input[name="userphone"]').val();
      var content = target.find('textarea[name="content"]').val();
      $.ajax({
        url: "https://docs.google.com/forms/u/0/d/e/1FAIpQLSeIMsX3yNWyc9ls-dB19AcBR6ekcwsWnp7l8MgLJwnnzAAoTA/formResponse",
        data: {
          "entry.8121153": yourname,
          "entry.1760942905": corpname,
          "entry.855525706": useremail,
          "entry.130938451": userphone,
          "entry.917198729": content,
        },
        type: "POST",
        dataType: "xml",
        statusCode: {
          0: function () {
            setTimeout(function() {
              $('#ajaxLoader').removeClass('loading_state');
              $('#statusMessage').addClass('complete').html('<span class="text">メッセージは送信されました。<br>自動返信メールをご確認ください。</span>');
            }, 1000);
          },
          200: function () {
            $('#ajaxLoader').removeClass('loading_state');
            alart('送信に失敗しました。お手数ではございますが、時間を置いてもう一度お試しください。');
            setTimeout(function() {
              location.href = 'https://' + location.hostname + '/'
            }, 3000);
          }
        }
      });
  }

    init();

  };

  if (document.getElementById('contactWrap')) {
    setMyForm($('#contactWrap'));
  }
  
  
  var prevButtonHTML = '<button class="comp-slider-caret prev-arrow"><span class="circle"><svg viewBox="0 0 22.6 19.69"><path class="cls-1" d="M9.33.35L.96,8.72c-.62.62-.62,1.63,0,2.25l8.37,8.37M.73,9.85h21.88"/></svg></span></button>';
  var nextButtonHTML = '<button class="comp-slider-caret next-arrow"><span class="circle"><svg viewBox="0 0 22.6 19.69"><path class="cls-1" d="M13.27.35l8.37,8.37c.62.62.62,1.63,0,2.25l-8.37,8.37M21.88,9.85H0"/></svg></span></button>';
  
  // バナースライダー
  if (document.getElementById('officeSlider')) {
    $('#officeSlider').slick({
    accessibility: false,
    infinite: true,
    dots: false,
    slidesToShow: 1,
    centerMode: false,
    autoplay: true,
    speed: 600,
    prevArrow: prevButtonHTML,
    nextArrow: nextButtonHTML,
    responsive: [
      {
        breakpoint: 750,
        settings: {
          slidesToShow: 1,
          centerPadding: '0',
          centerMode: false,
          autoplay: true,
        }
      }
    ]
    });
  }
  



});
