<?php //йцу ?>
<p style="font-size: 16px;" id="pages">


<a href="/admin/pdfarchive/index/edit/0/?&came_from=<?= req_uri_q(true) ?>">+ Добавить</a><br>



<?php foreach($rows as $row){ ?>



№<?= $row['np_num'] ?> от <?= $row['date'] ?> <span class="kvadroskobki">[<a href="/admin/pdfarchive/index/edit/<?= $row['id'] ?>/?&came_from=<?= req_uri_q(true) ?>">Править</a> | <a href="javascript:void(0)" onclick="if(confirm('Удалить?')){location.href='/admin/pdfarchive/index/del/?&id=<?= $row['id'] ?>';}else{return false;}">Удалить</a>]</span>
<br>
  <?php } ?>

<?= $pagenav ?>
</p>