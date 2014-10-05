<!--2 start-->
<div class="unicorn">
    <!--container start-->
    <div class="unicorn">


        <!--konteiner start-->
        <div class="unicontent1">


            <!--zagolovok topika start-->
            <div class="unitopic1"><?= $header ?></div>
            <!--zagolovok topika end-->


            <!--fotokartochka start-->
            <div class="uniphoto">
            <?php if(!empty($main_img)){ ?>
            <a href="<?= img_src('big', $main_img) ?>" class="fancybox" rel="gal"><img src="<?= img_src('big', $main_img) ?>" alt=""></a>
            <?php } ?>
            </div>
            <!--fotokartochka end-->


            <!--text start-->
            <div class="unitext">
             <?= $text ?>
            </div>
            <!--text end-->

            <div class="v-rasporka1"></div>





            <!--text start-->
            <div class="unitext">
           <?php foreach($img_list as $img){ ?>
                <!--fotokartochka start-->
                <div class="uniphoto-mini"><a href="<?= img_src('big', $img) ?>" class="fancybox" rel="gal"><img src="<?= img_src('thumb3', $img) ?>" alt=""></a></div>
                <!--fotokartochka end-->

           <?php } ?>
            </div>
            <!--text end-->

            <!--text start-->
            <div class="unitext">
            <div class="unileft3">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="unileft3">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

           <?php if($this->uri->segment(1)=='articles'){ ?>
            <div class="uniright3" style="min-width: 300px;">
            Выпуск № <?= $cat_npnum['np_num'] ?>
            </div>
           <?php } ?>
                <div class="spacer"></div>
                <div class="unileft3-1">
                    Поделиться в соцсетях:
                    <br/>
                    <br/>
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
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
            </div>
            <!--text end-->


        </div>
        <!--konteiner end-->


    </div>
    <!--container end-->
</div>






<!--2 end-->

<div class="vrasporka">&nbsp;</div>