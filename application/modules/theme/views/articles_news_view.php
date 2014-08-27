<!--4 start-->
<div class="unicorn">
    <!--zagolovok start-->
    <div class="unizag">
    <?php if($this->uri->segment(2)=='archive'){ ?>
    <?= $type_txt ?> за <?= $this->uri->segment(3) ?>
    <?php }else{ ?>
    Последние <?= $type_txt ?> <?php if($this->uri->segment(2)=='cat'){ ?>
    в категории "<?= $one_curr_cat['name'] ?>"
    <?php } ?>
    <?php } ?>
    </div>
    <!--zagolovok end-->

    <!--konteiner start-->
    <div class="unicontent">

<?php foreach($articles[0] as $row){ ?>
        <!--novost start-->

        <div class="unileft1">
            <!--fotokartochka start-->
            <div class="uniphoto">
            <?php if(isset($articles[1][$row['id']]['id'])){ ?>
            <a href="<?= img_src('big', $articles[1][$row['id']]) ?>" class="fancybox" rel="gal"><img src="<?= img_src('thumb1', $articles[1][$row['id']]) ?>" alt=""></a>
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
                    <a href="/<?= $type ?>/<?= $row['id'] ?>">Читать далее</a>

                </div>
                <!--ssilki end-->
            </div>
        </div>


        <div class="spacer"></div>
        <!--novost end-->


<?php } ?>


        <!--text start-->
        <div class="unitext" style="text-align: center;">
            <?= $pagenav ?>
        </div>
        <!--text end-->

        
    </div>
    <!--konteiner end-->
</div>
<!--4 end-->

<div class="vrasporka">&nbsp;</div>