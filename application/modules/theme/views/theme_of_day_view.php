<!--2 start-->
<div class="unicorn">
    <!--container start-->
    <div class="unicorn">


        <!--zagolovok start-->
        <div class="unizag">Тема дня</div>
        <!--zagolovok end-->

        <!--konteiner start-->
        <div class="unicontent">


            <!--zagolovok topika start-->
            <div class="unitopic"><?= $page['header'] ?></div>
            <!--zagolovok topika end-->


            <!--fotokartochka start-->
            <div class="uniphoto">
            <?php if(!empty($img)){ ?>
            <a href="<?= img_src('big', $img) ?>" class="fancybox" rel="gal"><img src="<?= img_src('big', $img) ?>" alt="" style="width: 578px;"></a>
            <?php } ?>
            </div>
            <!--fotokartochka end-->


            <!--text start-->
            <div class="unitext">
               <?= obrez_after($page['text'], 256) ?>
            </div>
            <!--text end-->


            <!--universal right start-->
            <div class="uniright">
                <!--knopka start-->
                <input class="unibutton" type="button" value="Читать далее" onclick="location.href='/<?= $page['subtype'] ?>/<?= $page['id'] ?>'"/>
                <!--knopka end-->
            </div>
            <!--universal right end-->


        </div>
        <!--konteiner end-->


    </div>
    <!--container end-->
</div>
<!--2end-->

<div class="vrasporka">&nbsp;</div>