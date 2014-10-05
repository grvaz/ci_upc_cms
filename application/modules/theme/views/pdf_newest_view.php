<!--1 start-->
<div class="unicorn">

 
        <!--zagolovok start-->
        <div class="unizag">Свежий выпуск</div>
        <!--zagolovok end-->

        <!--konteiner start-->
        <div class="unicontent">


            <!--zagolovok topika start-->
            <div class="unitopic">
            №<?= $row['np_num'] ?> от <?= $row['date'] ?>
                <?php if(!empty($row['title'])){ ?>
                <br><?= $row['title'] ?>
                <?php } ?>
            </div>
            <!--zagolovok topika end-->


            <!--fotokartochka start-->
            <div class="uniphoto"><a href="<?= img_src('big', current($img)) ?>" class="fancybox" rel="gal"><img src="<?= img_src('thumb2', current($img)) ?>" style="width: 200px;"/></a></div>
            <!--fotokartochka end-->


            <!--universal right start-->
            <div class="uniright">
                <!--knopka start-->
                <a href="/uploads/pdfarchive/<?= $row['id'] ?>.pdf" target="_blank"><input class="unibutton" type="button" value="Скачать"/></a>
                <!--knopka end-->
            </div>
            <!--universal right end-->


        </div>
        <!--konteiner end-->


</div>
<!--1 end-->
<div class="vrasporka">&nbsp;</div>