<!--4 start-->
<div class="unicorn">
    <!--zagolovok start-->
    <div class="unizag">
    Результаты поиска
    </div>
    <!--zagolovok end-->

    <!--konteiner start-->
    <div class="unicontent">

<?php foreach($rows as $row){ ?>
        <!--novost start-->

        <div class="unileft1">
            <!--fotokartochka start-->
            <div class="uniphoto">
<?php if(!empty($imgs[$row['id']])){ ?>
<a href="<?= img_src('big', current($imgs[$row['id']])) ?>" class="fancybox" rel="gal"><img src="<?= img_src('thumb2', current($imgs[$row['id']])) ?>" alt=""></a>
<?php } ?>
            </div>
            <!--fotokartochka end-->
        </div>
        <div class="uniright1">
            <!--text start-->
            <div class="unitext" style=" height: 85px;">
               <?= obrez_after($row['text'], 256) ?>
            </div>
            <!--text end-->
            <div class="uniright">
                <!--ssilki start-->
                <div class="unilink">
                    <a href="/<?= $row['chpu'] ?>">Читать далее</a>

                </div>
                <!--ssilki end-->
            </div>
        </div>


        <div class="spacer"></div>
        <!--novost end-->


<?php } ?>


        <!--text start-->
        <div class="unitext" style="text-align: center;">

        </div>
        <!--text end-->


    </div>
    <!--konteiner end-->
</div>
<!--4 end-->

<div class="vrasporka">&nbsp;</div>