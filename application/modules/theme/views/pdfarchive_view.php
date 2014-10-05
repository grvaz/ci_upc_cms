<!--1 start-->
<div class="unicorn" style="min-height: 40px!important;">
    <div class="unibox2">
        <div class="unibox1">
            <!--select start-->
            <div class="unitext">
         <form method="get" action="/pdfarchive" id="pdffilter">
                <select class="uniselect" name="year">
                    <option value="0">Любой год</option>
                    <?php foreach($years as $year){ ?>
                    <option value="<?= $year['year'] ?>" <?php if($_GET['year']==$year['year'])echo'selected'; ?>><?= $year['year'] ?></option>
                    <?php } ?>
                </select>

                <select class="uniselect" name="np_num">
                    <option value="0">Любой номер</option>
                    <?php foreach($npnums as $npnum){ ?>
                    <option value="<?= $npnum['np_num'] ?>" <?php if($_GET['np_num']==$npnum['np_num'])echo'selected'; ?>><?= $npnum['np_num'] ?></option>
                    <?php } ?>
                </select>

                <!--knopka start-->
                <input class="unibutton1" type="button" value="Применить" onclick="$('#pdffilter').submit();"/>
                <!--knopka end-->
          </form>

            </div>
            <!--select end-->

        </div>

    </div>
</div>
<!--1 end-->

<div class="vrasporka">&nbsp;</div>

<!--2 start-->

<div class="unicorn">


    <!--konteiner start-->
    <div class="unicontent">

        <!-- Help you to St. Francis Start

        shablon postroeniya stroki iz kartinok:

        <div class="unibox-all">
            <div class="unibox3"></div>
            <div class="unibox3"></div>
            <div class="unibox3"></div>
        </div>

        Help you to St. Francis End -->

<?php $cntr=0; foreach($rows as $row){  $cntr++;
if($cntr==4){$cntr=1;}
?>
        <?php if($cntr==1){ ?>
        <div class="unibox-all">
        <?php } ?>
            <div class="unibox3">

                <!--zagolovok topika start-->
                <div class="unitopic">
                №<?= $row['np_num'] ?> от <?= $row['date'] ?>
                <?php if(!empty($row['title'])){ ?>
                <br><?= $row['title'] ?>
                <?php } ?>
                </div>
                <!--zagolovok topika end-->

                <!--fotokartochka start-->
                <div class="uniphoto"><a href="<?= img_src('big', current($imgs[$row['id']])) ?>" class="fancybox" rel="gal"><img src="<?= img_src('thumb2', current($imgs[$row['id']])) ?>"/></a></div>
                <!--fotokartochka end-->

                <!--universal right start-->
                <div class="uniright">
                    <!--knopka start-->
                    <a href="/uploads/pdfarchive/<?= $row['id'] ?>.pdf" target="_blank"><input class="unibutton" type="button" value="Скачать" /></a>
                    <!--knopka end-->
                </div>
                <!--universal right end-->


            </div>
      <?php if($cntr==3){ ?>
        </div>
      <?php } ?>
<?php } ?>


      <?php if($cntr<3){
        echo'</div>';
       } ?>

    </div>
    <!--konteiner end-->


    <!--text start-->
    <div class="unitext" style="text-align: center;">
        <?= $pagenav ?>
    </div>
    <!--text end-->

</div>
<!--2end-->

<div class="vrasporka">&nbsp;</div>