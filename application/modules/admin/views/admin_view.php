<?php //йцу ?>
<!-- Created by FIJN fijn@bk.ru -->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="/application/modules/admin/views/admtheme/css/style.css" media="all"/> <!--ненадо это просто так стиль-->

    <!-- ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ adminka start ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ -->
    <link rel="stylesheet" type="text/css" href="/application/modules/admin/views/admtheme/css/adminka.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="/application/modules/admin/views/admtheme/css/adm.css" media="all"/>

    <!-- ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ adminka end ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ -->

    <title>Администрирование</title>
    <?= $head ?>
</head>


<body>

<!-- ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ adminka start ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ -->

<div class="adminka">
    <!--vertikalnie vkladki start-->
    <div class="section vertical">

        <ul class="tabs">
            <a href="/admin/page"><li <?php if($vmenu_=='page')echo'class="current"'; ?>>Страницы</li></a>
            <a href="/admin/articles"><li <?php if($vmenu_=='articles')echo'class="current"'; ?>>Новости / Статьи</li></a>
            <a href="/admin/?logout"><li>Выйти</li></a>
        </ul>



        <div class="box visible">



                <!--horizontal vkladki start-->

            <div class="horizTabs">
                <!-- Это сами вкладки -->
                <ul class="horizTabNavigation">
<?php foreach($hmenu as $item=>$name){
$hm=explode('/',$item);
 ?>
                <li><a href="/admin/<?= $vmenu ?>/<?= $item ?>" <?php if($hmenu_==$hm[0])echo'class="selected"'; ?>><?= $name ?></a></li>
<?php } ?>
                </ul>
                <!-- Это контейнеры содержимого -->
                <div id="horiz1">
                   <?= $content ?>
                </div>

            </div>

            <!--horizontal vkladki end-->


        </div>


    </div>
    <!-- .section vertikal-->
    <!--vertikalnie vkladki end-->
</div>
<!-- ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ adminka end ♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣♣ -->
</body>
</html>