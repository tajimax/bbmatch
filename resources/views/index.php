<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>石井花壇 | 温海温泉旅館【公式サイト】</title>
    <meta name="description" content="日本古来の素材と現代的表現を併せ持つ温泉旅館、石井花壇。 伝統的「和」の息づく空間で、至極のひとときをお過ごしください。">

    <!----- css ----->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!----- js ----->
    <script src="js/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header class="header">
        <h1 class="header__logo">
            <a href="index.html">
                <img src="img/logo01.png" alt="">
                <span>石井花壇</span>
            </a>
        </h1>
        <nav class="header__nav">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="#room">お部屋</a></li>
                <li class="nav-list__item"><a href="#food">お料理</a></li>
                <li class="nav-list__item"><a href="#hot">温泉</a></li>
            </ul>
        </nav>
        <a href="#" class="reservation-btn" id="reservation__modal_show">
            <div class="reservation-btn__wrapper">
                <img src="img/calender.png" alt="">
                <p>宿泊予約</p>
            </div>
        </a>
        <span class="mask"></span>
    </header>


<!------------------------------------------------------------------------------------------   モーダル部分   ----->
    <div class="reservation__modal">
        <img src="img/close.png" alt="" class="modal__close">
        <div class="modal__wrapper">
            <p class="modal__ttl">宿泊予約</p>
            <form class="reservation__form" action="sent.php" method="post">
                <p>お名前</p>
                <input type="text" placeholder="例：石井正悟" class="reservation__form_name" name="name">
                <p>メールアドレス</p>
                <input type="email" placeholder="例：Example@example.com" class="reservation__form_email" name="email">
                <p>ご希望プラン（空いているプランのみ表示されます）</p>
                <select name="plan" class="reservation__form_plan">
                    <option value="未選択">プランを選択してください</option>
                    <option value="①【期間限定】海辺の四季旬彩、贅沢美味懐石プラン">①【期間限定】海辺の四季旬彩、贅沢美味懐石プラン</option>
                    <option value="②平日に優雅に楽しむ、特別宿泊プラン">②平日に優雅に楽しむ、特別宿泊プラン</option>
                    <option value="③絶景貸切露天と個室会席を満喫できるファミリープラン">③絶景貸切露天と個室会席を満喫できるファミリープラン</option>
                </select>
                <p>日時選択</p>
                <input type="text" class="reservation__form_calender" readonly="readonly" placeholder="日時を選択してください"　name="date">
                <input type="submit" value="送信する" class="submit__btn">
            </form>
        </div>
    </div>
<!----------------------------------------------------------------------------------------//   モーダル部分   //----->



    <section class="fv">
        <p class="fv__txt">頑 張 る 人 の<br>頑 張 ら な い 時 間</p>
        <div class="swiper-container">
            <ul class="swiper-wrapper">
                <li class="swiper-slide slide-item"><img src="img/mainbg01.jpg" alt=""></li>
                <li class="swiper-slide slide-item"><img src="img/mainbg02.jpg" alt=""></li>
                <li class="swiper-slide slide-item"><img src="img/mainbg03.jpg" alt=""></li>
            </ul>
        </div>
    </section>

    <section class="welcome">
        <div class="section__wrapper">
            <div class="welcome__wrapper">
                <h2 class="section__ttl_vr">
                    <span class="section__ttl_right">温 海 温 泉 の</span><br>
                    <span class="section__ttl_left">美 し さ に 癒 や さ れ て</span>
                </h2>
                <p data-aos="fade-in">
                    東 北 の 奥 座 敷 で あ る 温 海 温 泉 郷<br>
                    開 湯 は 約 <span>1</span> <span>3</span> <span>0</span> <span>0</span> 年 前 と さ れ 、 役 小 角 が<br>
                    発 見 し た と 伝 え ら れ ま す
                </p>
                <p data-aos="fade-in" data-aos-delay="1000">
                    石 井 花 壇 は 江 戸 よ り 続 く 由 緒 あ る 旅 館 で<br>
                    ク ラ シ ッ ク な 作 り の 中 に 大 正 ロ マ ン あ ふ れ る<br>
                    内 装 を 残 し て お り ま す
                </p>
                <p data-aos="fade-in" data-aos-delay="2000">
                    圧 倒 的 癒 や し の 空 間 で<br>
                    頑 張 る 現 代 人 に<br>
                    頑 張 ら な い 圧 倒 的 な 非 日 常 を ご 提 供 し ま す<br>
                </p>
                <p>石 井 花 壇</p>
            </div>
        </div>
    </section>

    <section class="about">
        <article class="about__content" id="room">
            <div class="about__img">
                <img src="img/oheya-top.jpg" alt="">
            </div>
            <div class="about__txt">
                <h3 class="about__txt_lg" data-aos="fade-up">喧騒から離れた空間<br>心落ち着く至極のひととき</h3>
                <p class="about__txt_sm" data-aos="fade-up">
                    まるで時が止まったかのような、圧倒的な静寂のなかで、<br>ひたすらにゆったりと…。<br>最高級の「何もしない時間」をお過ごしください。
                </p>
                <a class="about__btn">
                    <p>お部屋について</p>
                </a>
            </div>
        </article>
        <article class="about__content_rv" id="food">
            <div class="about__img">
                <img src="img/menu-top.jpg" alt="">
            </div>
            <div class="about__txt_rv">
                <h3 class="about__txt_lg" data-aos="fade-up">出迎えるのは<br>極上の温海料理</h3>
                <p class="about__txt_sm" data-aos="fade-up">
                    最も旬の食材を愉しむ、最高の贅沢を最高級A5ランクの米沢牛と共に頂く。<br>あなたの人生史に残る「極上の感動」を お約束します。
                </p>
                <a class="about__btn">料理について</a>
            </div>
        </article>
        <article class="about__content" id="hot">
            <div class="about__img">
                <img src="img/onsen-top.jpg" alt="">
            </div>
            <div class="about__txt">
                <h3 class="about__txt_lg" data-aos="fade-up">疲れ切った身体にやすらぎを<br>温海の源泉に癒やされて</h3>
                <p class="about__txt_sm" data-aos="fade-up">
                    古くは弘法大師の病をも治療したと言われる熱海の泉質。<br>現代人の疲弊しきった身体を修復する最高級の湯治場としてご活用ください。
                </p>
                <a class="about__btn">温泉について</a>
            </div>
        </article>
    </section>

    <section class="plan">
        <div class="section__wrapper">
            <div class="section__ttl">
                <img src="img/logo02.png" alt="">
                <h2>おすすめご宿泊プラン</h2>
            </div>
            <ul class="plan__list">
                <li class="plan__item">
                    <div class="plan__img">
                        <img src="img/recommended01.jpg" alt="">
                    </div>
                    <div class="plan_txt" data-aos="fade-up">
                        <p class="plan__txt_lg">
                            朝食付きプラン、日本近海で取れた<br>のどぐろを朝食として…
                        </p>
                        <p class="plan__txt_sm">
                            最高級と称されるのどぐろ、正式には「アカ<br>ムツ」と呼ばれる魚、味は独特の上品な味わ<br>いで、焼いても煮ても美味
                        </p>
                    </div>
                </li>
                <li class="plan__item">
                    <div class="plan__img">
                        <img src="img/recommended02.jpg" alt="">
                    </div>
                    <div class="plan_txt" data-aos="fade-up">
                        <p class="plan__txt_lg">
                            【期間限定】熱海蟹をたっぷりと<br>愉しむプラン。
                        </p>
                        <p class="plan__txt_sm">
                            温海で水揚げされた蟹は「温海蟹」<br>として知られ、嗜好品として愛されて<br>きました。この宿泊プランでは存分に
                        </p>
                    </div>
                </li>
                <li class="plan__item">
                    <div class="plan__img">
                        <img src="img/recommended03.jpg" alt="">
                    </div>
                    <div class="plan_txt" data-aos="fade-up">
                        <p class="plan__txt_lg">
                            【平日限定】贅沢美味懐石プラン。<br>海辺の四季旬彩プラン。
                        </p>
                        <p class="plan__txt_sm">
                            熱海近海で取れた魚を鮮度そのままに舟盛りに<br>してご提供。生きた味をお楽しみください。
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="announce">
        <div class="section__wrapper">
            <div class="section__ttl">
                <img src="img/logo02.png" alt="">
                <h2>お知らせ</h2>
            </div>
            <div class="announce__link">
                <a href="#">営業時間</a>
                <a href="#">その他</a>
            </div>
            <ul class="announce__list grid">
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news01.jpg" alt="">
                    <div class="announce__body">
                        <time>2020.12.24</time>
                        <p class="announce__txt">年末最後の営業日は27日になります。</p>
                    </div>
                </li>
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news02.jpg" alt="">
                    <div class="announce__body">
                        <time class="announce__date">2020.12.24</time>
                        <p class="announce__txt">年末最後の営業日のお知らせ</p>
                    </div>
                    <p></p>
                </li>
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news02.jpg" alt="">
                    <div class="announce__body">
                        <time class="announce__date">2020.12.11</time>
                        <p class="announce__txt">12.21は臨時休業とさせていただきますので、よろしく お願いします。</p>
                    </div>
                </li>
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news01.jpg" alt="">
                    <div class="announce__body">
                        <time class="announce__date">2020.12.24</time>
                        <p class="announce__txt">年末最後の営業日のお知らせ</p>
                    </div>
                </li>
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news01.jpg" alt="">
                    <div class="announce__body">
                        <time class="announce__date">2020.12.01</time>
                        <p class="announce__txt">和室の改装を行いますため、12.10はお休み させていただきます。</p>
                    </div>
                </li>
                <li class="announce__item" data-aos="fade-up">
                    <img src="img/news02.jpg" alt="">
                    <div class="announce__body">
                        <time class="announce__date">2020.12.24</time>
                        <p class="announce__txt">年末最後の営業日のお知らせ</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="access">
        <div class="section__wrapper">
            <div class="section__ttl">
                <img src="img/logo02.png" alt="">
                <h2>アクセス</h2>
            </div>
            <div class="access__body">
                <img src="img/access.jpg" alt="">
                <div class="access__txt">
                    <div class="access__txt_margin access__adress">
                        <p>住所</p>
                        <p>
                            〒000-0000<br>
                            山形県鶴岡市xxxxxxxxxx
                        </p>
                    </div>
                    <div class="access__txt_margin access__tel">
                        <p>TEL/FAX</p>
                        <p>000-0000-0000/00-0000-0000</p>
                    </div>
                    <div class="access__txt_margin access__open">
                        <p>営業時間</p>
                        <p>14:00-23:00</p>
                    </div>
                    <div class="access__txt_margin access__note">
                        <p>
                            ＊4名以上のご予約の場合は、最寄り駅の「鶴岡駅」より送迎が可能ですので、<br>
                            ご連絡ください。
                        </p>
                    </div>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1Cl0EEAZC6hUuv2UU8P3MlowED3dDdSM8" width="640" height="480"></iframe>
            </div>
        </div>
    </section>

    <section class="last">
        <div class="section__wrapper">
            <div class="last__menu">
                <a data-aos="fade-in">お 部 屋</a>
                <a data-aos="fade-in" data-aos-delay="1000">お 料 理</a>
                <a data-aos="fade-in" data-aos-delay="2000">温 泉</a>
            </div>
            <div class="section__ttl">
                <img src="img/logo02.png" alt="">
                <h2>石井花壇</h2>
            </div>
        </div>
        <p>〒000-0000  山形県鶴岡市xxxxxxxxxxx</p>
        <p>TEL.000-0000-0000  FAX.00-0000-0000</p>
    </section>

    <footer class="footer">
        <small class="copywright">
            Copyright © 石井花壇 All Rights Reserved.
        </small>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
    <script>
        var mySwiper = new Swiper ('.swiper-container', {})
    </script>
</body>
</html>