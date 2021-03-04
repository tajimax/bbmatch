<?php
    session_start();

    require_once('../mypage/userLogic.php');
    require_once('../mypage/display_work.php');

    $result = UserLogic::checkLogin();
    $err = $_SESSION;
    
    $NovelGenres = DisplayWorks::displayNovelTable();
    $comics = DisplayWorks::displayIllustTable();

    // 小説のタブリストを定義
    $tabs = array('総合', '恋愛', 'ファンタジー', 'バトル');

    // イラストのタブリストを定義
    $tabs2 = array('イラストのみ', '未定');

    var_dump($NovelGenres)

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

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <div id="top">
        <!----- ヘッダー部分 ----->
        <header class="header flex">
            <div class="commonInner flex">
                <a href="./search_novel.php">
                    <img class="header__logo" src="../images/header_logo.png" alt="logo">
                </a>
                <div class="btn-wrapper">
                    <a class="btn" href="login_form.php">マイページ</a>
                    <a class="btn" href="confirm_postUser.php">投稿する</a>
                </div>
            </div>
        </header>


        <!----- 投稿一覧 ----->
        <section class="section-wrapper">
            <div class="commonInner flex-column">
                <div class="tab-wrapper">
                    <!-- 小説かイラストか選択するタブ -->
                    <div class="tab-nav flex">
                        <div class="tab-nav__item" v-on:click="change3('0')" v-bind:class="{'active': isActive3 === '0'}">小説</div>
                        <div class="tab-nav__item" v-on:click="change3('1')" v-bind:class="{'active': isActive3 === '1'}">イラスト</div>
                    </div>
                    <div class="tab-content">
                        <!-- 小説コンテンツ部分 -->
                        <div class="tab-content__item" v-if="isActive3 === '0'">
                            <div class="tab-wrapper">
                                <!-- ナビゲーション部分 -->
                                <div class="tab-nav flex">
                                    <!-- 小説のジャンル別タブ -->
                                    <div class="genre-nav">
                                        <?php foreach($tabs as $key => $tab): ?>
                                            <div class="genre-nav__item" v-on:click="change('<?php echo $key?>')" v-bind:class="{'active': isActive === '<?php echo $key ?>'}"><?php echo $tab ?></div>
                                        <?php endforeach ?>
                                    </div>
                                    <!-- 小説をタイトル検索 -->
                                    <form class="search_container" action="search_novel.php" method="post">
                                        <input type="text" name="title" placeholder="タイトルで検索">
                                        <input type="submit" value="&#xf002">
                                    </form>
                                </div>
                                <!-- コンテンツ部分 -->
                                <div class="tab-content2">
                                    <?php foreach($NovelGenres as $key => $genre): ?>
                                        <div class="tab-content2__item" v-if="isActive === '<?php echo $key ?>'">
                                            <div class="grid">
                                                <?php foreach($genre as $result): ?>
                                                    <div class="posted-novel flex">
                                                        <div class="posted-work__novel-img-wrapper">
                                                            <img class="posted-work__img" src="../genre_thumbnails/<?php echo $result['genre'] ?>.jpg">
                                                        </div>
                                                        <div class="posted-work__novel-content-wrapper">
                                                            <a class="posted-work__ttl" href="./brousing_novel.php?title=<?php echo $result['save_path'] ?>"><?php echo $result['title'] ?></a>
                                                            <a class="posted-work__author" href="./otherUserPage.php?author=<?php echo $result['author'] ?>"><?php echo $result['author'] ?></a>
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
                        <!-- イラスト一覧 -->
                        <div class="tab-content__item" v-if="isActive3 === '1'">
                            <div class="tab-wrapper">
                                <div class="tab-content2">
                                    <div class="grid2">
                                        <?php foreach($comics as $comic): ?>
                                            <div class="posted-illust">
                                                <div class="posted-work__comic-img-wrapper">
                                                    <img class="posted-work__img" src="<?php echo $comic['save_path'] ?>" alt="">
                                                </div>
                                                <div class="posted-work__novel-content-wrapper">
                                                    <a class="posted-work__ttl" href="brousing.php?title=<?php echo $comic['save_path'] ?>"><?php echo $comic['title'] ?></a>
                                                    <a class="posted-work__author" href="otherUserPage.php?author=<?php echo $comic['author'] ?>"><?php echo $comic['author'] ?></a>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="../vue/common.js"></script>

</body>
</html>