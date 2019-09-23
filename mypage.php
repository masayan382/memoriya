<?php
//共通変数・関数ファイルを読込み
require('function.php');

debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debug('「　マイページ　');
debug('「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「「');
debugLogStart();

//ログイン認証
require('auth.php');
?>
<?php
$siteTitle = 'マイページ';
require('head.php'); 
?>

  <body class="page-mypage page-2colum page-logined">
    <style>
      #main{
        border: none !important;
      }
    </style>
    
    <!-- メニュー -->
    <?php
      require('header.php'); 
    ?>
    
    <p id="js-show-msg" style="display:none;" class="msg-slide">
      <?php echo getSessionFlash('msg_success'); ?>
    </p>

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      
      <h1 class="page-title">MYPAGE</h1>

      <!-- Main -->
      <section id="main" >
      
      <main class="todo_main">
    <form class="todo_form">
      <div class="todo_inputArea">
        <input type="text" class="inputText js-get-val" value="" placeholder="ここにTODO内容を書く">
        <span class="error js-toggle-error">入力が空です</span>
      </div>
      <button class="btn  todo_b js-add-todo">TODOを追加</button>
    </form>

    <div class="searchBox">
      <i class="fa fa-search searchBox__icon" aria-hidden="true"></i>
      <input type="text" class="searchBox__input js-search"
             value="" placeholder="ここに絞り込みたいキーワードを入力する">
    </div>

    <ul class="list js-todo_list">
      <li class="list__item js-todo_list-item" data-text="サンプルTODOタスク">
        <i class="fa fa-square-o icon-check js-click-done" aria-hidden="true"></i>
        <span class="js-todo_list-text">サンプルTODOタスク</span>
        <input type="text" class="editText js-todo_list-editForm" value="サンプルTODOタスク">
        <i class="fa fa-trash icon-trash js-click-trash" aria-hidden="true"></i>
      </li>
      <li class="list__item list__item--done js-todo_list-item" data-text="サンプルDoneタスク">
        <i class="fa fa-check-square icon-check js-click-todo" aria-hidden="true"></i>
        <span class="js-todo_list-text">サンプルDoneタスク</span>
        <input type="text" class="editText js-todo_list-editForm" value="サンプルDoneタスク">
        <i class="fa fa-trash icon-trash js-click-trash" aria-hidden="true"></i>
      </li>
    </ul>
  </main>

  <script src="js/app.js"></script>
  

      </section>
      
      <!-- サイドバー -->
      <?php
        require('sidebar_mypage.php');
      ?>
    </div>

    <!-- footer -->
    <?php
      require('footer.php'); 
    ?>