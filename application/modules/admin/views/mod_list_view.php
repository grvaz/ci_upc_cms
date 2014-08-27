<?php //йцу ?>
<p style="font-size: 16px;" id="pages">

<?php foreach($rows as $row){ ?>

<a href="/<?= $row['id'] ?>" target="_blank"><?= $row['name'] ?></a>

<br>
  <?php } ?>

<?= $pagenav ?>
</p>