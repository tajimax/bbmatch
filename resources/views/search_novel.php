<?php
    session_start();

    require_once('../mypage/userLogic.php');

    $result = UserLogic::checkLogin();

    $err = $_SESSION;

    if(isset($_GET['sess_reset'])) {
        UserLogic::logout();
    };

    // $err = $_SESSION;
    // $_SESSION = array(); //セッションを空の配列にする
    // session_destroy(); //セッションを終了

    $dbh = dbConnect();
    $allGenre = $dbh -> query('SELECT * FROM novels_table');
    $romance = $dbh -> query('SELECT * FROM novels_table WHERE genre = "恋愛"');
    $fantasy = $dbh -> query('SELECT * FROM novels_table WHERE genre = "ファンタジー"');
    $battle = $dbh -> query('SELECT * FROM novels_table WHERE genre = "バトル"');

    $genres = array($allGenre, $romance, $fantasy, $battle);

    // タブリストを定義
    $tabs = array('総合', '恋愛', 'ファンタジー', 'バトル');

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script>
        const autoLogin = ($result) => {
            if($result){
                window.location.href="../common_page/mypage.php";
            }else{
                document.getElementById('login-modal').classList.add('active');
            }
        }
    </script>
</head>
<body>
    <!----- ヘッダー部分 ----->
    <header class="header flex">
        <div class="commonInner flex">
            <a class="header__logo" href="../common_page/top.php">
                <img class="header__logo" src="../images/header_logo.png" alt="logo">
            </a>
            <div class="btn-wrapper">
                <input type="button" class="btn" value="マイページ" onclick="autoLogin(<?php echo $result ?>)">
                <input type="button" class="btn" value="投稿する" onclick="autoLogin(<?php echo $result ?>)">
            </div>
        </div>
    </header>

    <!-- ログインモーダル部分 -->
    <div class="login-modal-wrapper <?php echo $_GET['modal-show'] ?>" id="login-modal">
        <div class="modal">
            <div class="close-modal" id="close-login-modal">
                <i class="fa fa-2x fa-times"></i>
            </div>
            
            
            <div id="login-form">
                <h2>ログイン</h2>
                    <?php if(isset($err['msg'])): ?>
                            <p><?php echo $err['msg'] ?></p>
                    <?php endif ?>
                <form action="../common_page/mypage.php" method="post">
                    <div>
                        <input type="email" placeholder="メールアドレス" name="email">
                        <?php if(isset($err['email'])): ?>
                            <p><?php echo $err['email'] ?></p>
                        <?php endif ?>
                    </div>
                    <div>
                        <input type="password" placeholder="パスワード" name="password">
                        <?php if(isset($err['password'])): ?>
                            <p><?php echo $err['password'] ?></p>
                        <?php endif ?>
                    </div>
                    <div>
                        <input class="btn" type="submit" value="ログイン">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!----- 小説一覧 ----->
    <section class="section-wrapper">
        <div class="commonInner flex-column">
            <h2 class="section-ttl">原作一覧</h2>
            <div class="tab-wrapper" id="js-tab">
                <div class="tab-nav flex">
                    <div class="genre-nav">
                        <?php foreach($tabs as $key => $tab): ?>
                            <div class="genre-nav__item" data-nav=<?php echo $key ?>><?php echo $tab ?></div>
                        <?php endforeach ?>
                    </div>
                    <form class="search_container" action="search_novel_result.php" method="post">
                        <input type="text" name="title" placeholder="タイトルで検索">
                        <input type="submit" value="&#xf002">
                    </form>
                </div>
                <div class="tab-content">
                    <?php foreach($genres as $key => $genre): ?>
                        <div class="tab-content__item" data-content=<?php echo $key ?>>
                            <div class="grid">
                                <?php foreach($genre as $result): ?>
                                    <div class="posted-work flex">
                                        <!-- if(!isset)を使ってデフォルトにする -->
                                        <img class="posted-work__img" src="../genre_thumbnails/<?php echo $result['genre'] ?>.jpg">
                                        <div class="posted-work__content">
                                            <a class="posted-work__ttl" href="brousing_novel.php?title=<?php echo $result['save_path'] ?>"><?php echo $result['title'] ?></a>
                                            <a class="posted-work__author" href="otherUserPage.php?author=<?php echo $result['author'] ?>"><?php echo $result['author'] ?></a>
                                            <a class="posted-work__genre" href="#"><?php echo $result['genre'] ?></a>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="../js/tab.js"></script>
    <script src="../js/mypage_modal.js"></script>
</body>
</html>