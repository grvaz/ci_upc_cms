<?php //йцу ?>
<p style="font-size: 16px;" id="pages">


<a href="/admin/articles/<?= $this->addtype ?>/edit/0/?&came_from=<?= req_uri_q(true) ?>">+ Добавить</a><br>



<?php foreach($rows as $row){ ?>



<a href="/<?= $row['subtype'] ?>/<?= $row['id'] ?>" target="_blank"><?= $row['header'] ?></a>
<span class="kvadroskobki">[<a href="/admin/articles/<?= $row['subtype'] ?>/edit/<?= $row['id'] ?>/?&came_from=<?= req_uri_q(true) ?>">Править</a> | <a href="javascript:void(0)" onclick="if(confirm('Удалить?')){location.href='/admin/articles/index/del/<?= $row['subtype'] ?>/?&id=<?= $row['id'] ?>';}else{return false;}">Удалить</a>]</span>
<br>
  <?php } ?>

<?= $pagenav ?>
</p>