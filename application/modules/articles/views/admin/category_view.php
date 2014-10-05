<table style="width: 500px">
<tr>
<td><strong>Категории новостей</strong></td><td><strong>Категории статей</strong></td>
</tr>
<tr>
<td>
<a href="/admin/articles/category/edit_cat/0?&type=news">+ Добавить</a><br><br>
<?php foreach($news as $new){ ?>
<a href="/admin/articles/category/edit_cat/<?= $new['id'] ?>"><?= $new['name'] ?></a><br>
<?php } ?>
</td>
<td>
<a href="/admin/articles/category/edit_cat/0?&type=articles">+ Добавить</a><br>
<br>
<?php foreach($articles as $art){ ?>
<a href="/admin/articles/category/edit_cat/<?= $art['id'] ?>"><?= $art['name'] ?></a><br>
<?php } ?>
</td>
</tr>
</table>