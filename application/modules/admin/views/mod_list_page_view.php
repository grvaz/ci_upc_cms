<?php //йцу ?>
<p style="font-size: 16px;" id="pages">

<?php if(!empty($above_page['chpu'])){ ?>
<a href="/<?= $above_page['chpu'] ?>" target="_blank" style="color: #990000"><?= $above_page['header'] ?></a> /
<a href="<?= cut_uri_arg(array('per_page','subpage'),req_uri_q()) ?>&subpage=<?= $above_page['subpage_of'] ?>" title="На уровень выше" style="color: #990000">...</a>
<br>
<?php } ?>

<a href="/admin/page/ed/edit/0/<?= $above_page['add_new'] ?>?&came_from=<?= req_uri_q(true) ?>" title="Создать страницу" style="color: #000099">+ Страница</a><br>

<?php foreach($rows as $row){ ?>
<?php if($row['has_subs']){ ?>
<a href="<?= cut_uri_arg(array('per_page','subpage'),req_uri_q()) ?>&subpage=<?= $row['id'] ?>" title="Имеет подстраницы">+</a>
<?php } ?>
<a href="/<?= $row['chpu'] ?>" target="_blank"><?= $row['header'] ?></a>
<span class="kvadroskobki">[<a href="/admin/page/ed/edit/<?= $row['id'] ?>/<?= (int)$row['subpage_of'] ?>?&came_from=<?= req_uri_q(true) ?>">Править</a> |
<a href="/admin/page/ed/edit/0/<?= $row['id'] ?>?&came_from=<?= req_uri_q(true) ?>" title="Добавить подстраницу">+</a><?php if($row['id']>100){ ?> | <a href="javascript:void(0)" onclick="if(confirm('Удалить?')){location.href='/admin/page/index/del/?&id=<?= $row['id'] ?>';}else{return false;}">Удалить</a><?php } ?>]</span>
<br>
  <?php } ?>

<?= $pagenav ?>
</p>