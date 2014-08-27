<!-- Create by FIJN fijn@bk.ru -->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>

    <?= $head ?>

    <?php if(!empty($meta_keywords)){ ?>
   <meta name="keywords" content="<?= htmlspecialchars($meta_keywords, ENT_QUOTES) ?>" />
    <?php } ?>

    <?php if(!empty($meta_description)){ ?>
   <meta name="description" content="<?= htmlspecialchars($meta_description, ENT_QUOTES) ?>" />
    <?php } ?>

    <title><?= $meta_title ?></title>
</head>


<body>
<a name="topless"></a>
<div class="header">
    <div class="header1">
        <div class="header1-date"><?= $this->weekdays[date("w")] ?><br/><?= date("d") ?> <?= $this->month[date("n")-1] ?> <?= date("Y") ?>г.</div>
        <div class="header1-time"><?= date("H:i") ?></div>
    </div>
    <div class="header2">

        <!--<div class="uniright">

            <input class="uniform1" placeholder="Логин"/>

            <input class="uniform1" placeholder="Пароль"/>


        </div>-->

        <!--universal right start
        <div class="uniright">

            <input class="unibutton" style="width: 50px;" type="button" value="Вход"/>


            <input class="unibutton" type="button" value="Регистрация"/>


        </div>
        universal right end-->
        <!--<div class="header2-seti">
            место для соц сетей
        </div>-->

        <!--<input class="unisearch" placeholder="Поиск по сайту" type="text"
               style="width: 390px; float:right; margin-top: 12px; margin-right: 2px;"/>-->

    </div>
</div>
<div class="spacer"></div>
<div class="horiz-menu">


    <!--horizontal menu start-->
    <div class="navmenu">
        <ul>
            <li><a href="/">Главная</a></li>
            <li><a href="/news">Новости</a></li>
            <li><a href="/articles">Статьи</a></li>
        </ul>
    </div>
    <!--horizontal menu end-->

</div>
<div class="spacer"></div>
<div class="content">


<!--left start-->
<div class="column-left">


  <?php if(isset($articles_cat_block))echo $articles_cat_block; ?>







    <!--3 start-->
    <div class="unicorn">
        <!--zagolovok start-->
        <div class="unizag">Социальные сети</div>
        <!--zagolovok end-->

        <!--konteiner start-->
        <div class="unicontent">


            <!--zagolovok topika start-->
            <div class="unitopic">Поделиться газетой «Диалог»</div>
            <!--zagolovok topika end-->


            <!--text start-->
            <div class="unitext">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_16x16_style">
                    <a class="addthis_button_vk"></a>
                    <a class="addthis_button_odnoklassniki_ru"></a>
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript"
                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-528b165438155472"></script>
                <!-- AddThis Button END -->
            </div>
            <!--text end-->


        </div>
        <!--konteiner end-->
    </div>
    <!--3 end-->

    <div class="vrasporka">&nbsp;</div>

</div>
<!--left end-->


<!--center start-->
<div class="column-center">

<?= $content ?>

</div>
<!--center end-->


<!--right start-->
<div class="column-right">


 <?php if(isset($calendar_block))echo $calendar_block; ?>




</div>


</div>
<!--right end-->


<div class="spacer"></div>


<div class="footer">
    <div class="footer1">
        <div class="footer2">
            <!--text start-->
            <div class="unitext">
                <?= modules::run('theme/get_page', 13, 'text') ?>
            </div>
            <!--text end-->
            <!--text start-->
            <div class="unitext">
             <?= modules::run('theme/get_page', 14, 'text') ?>
            </div>
            <!--text end-->
            <!--text start-->
            <div class="unitext"><?= modules::run('theme/get_page', 15, 'text') ?></div>
            <!--text end-->

            <!--text start-->
            <div class="unitext"><?= modules::run('theme/get_page', 16, 'text') ?></div>
            <!--text end-->

        </div>
        <div class="footer3">
            <!--text start-->
            <div class="unitext">
            <?= modules::run('theme/get_page', 17, 'text') ?>
            </div>
            <!--text end-->
            <!--text start-->
            <div class="unitext">
            <?= modules::run('theme/get_page', 18, 'text') ?>
            </div>
            <!--text end-->
            <!--text start-->
            <div class="unitext"><?= modules::run('theme/get_page', 19, 'text') ?></div>
            <!--text end-->

            <!--text start-->
            <div class="unitext"><span
                    style="position: relative; left:115px; top: 40px;">разработка и поддержка сайта:</span>

                <div class="up-logo">
                    <a href="http://upgrade-pr.ru"><img src="<?= THEME_PATH ?>images/up-logo.png"></a>


                </div>

            </div>
            <!--text end-->
        </div>
        <div class="footer4">
            <!--Unicorn start-->
            <div class="unicorn">


                <!--zagolovok start-->
                <div class="unizag">Обратная связь</div>
                <!--zagolovok end-->

                <!--konteiner start-->
                <div class="unicontent">


                    <!--text start-->
                    <div class="unitext">
                        <input class="uniform" placeholder="Ваше имя" id="mail_name"/>

                        <input class="uniform" placeholder="Номер телефона или email" id="mail_email"/>

                        <textarea class="unitextarea" placeholder="Ваше сообщение, отзыв или вопрос" id="mail_mess"></textarea>
                    </div>
                    <!--text end-->


                    <!--universal right start-->
                    <div class="uniright">
                        <!--knopka start-->
                        <input class="unibutton" type="button" value="Отправить" onclick="mail_send()" />
                        <!--knopka end-->
                    </div>
                    <!--universal right end-->


                </div>
                <!--konteiner end-->


            </div>
            <!--Unicorn end-->
        </div>
    </div>
</div>
<div class="toparrow"><a href="#topless"> <img src="<?= THEME_PATH ?>images/toparrow.png" width="35" height="35"/></a></div>
</body>
</html>