<!--1 start-->
    <div class="unicorn">
        <!--zagolovok start-->
        <div class="unizag">Категории</div>
        <!--zagolovok end-->

        <!--konteiner start-->
        <div class="unicontent">


            <!--ssilki start-->
            <div class="unilink1">
            <?php foreach($cats as $cat){ ?>
                <a href="/<?= $this->uri->segment(1) ?>/cat/<?= $cat['id'] ?>"><?= $cat['name'] ?></a>&nbsp;
                <div class="unilink1-item">(<?= $cat['count'] ?>)</div>
            <?php } ?>
            </div>
            <!--ssilki end-->


        </div>
    </div>
    <!--1 end-->

<div class="vrasporka">&nbsp;</div>