<br>
<?php if($id){ ?>
Редактирование категории (<?= $type_ ?>)
<?php }else{ ?>
Создание новой категории (<?= $type_ ?>)
<?php } ?>
<br><br>
<form method="post" action="/admin/articles/index/save_cat">
Категория<br><input type="text" name="edit[name]" value="<?php if(isset($name))echo htmlspecialchars($name); ?>"><br><br>


<input type="hidden" name="edit[id]" value="<?= $id ?>">
<input type="hidden" name="edit[type]" value="<?= $type ?>">
<input name="save" type="submit" value="Сохранить">
<?php if($id){ ?>
&nbsp; <input name="del" type="button" value="Удалить" onclick="if(confirm('Удалить категорию?')){location.href='/admin/articles/index/del_cat?&id=<?= $id ?>';}else{return false;}">
<?php } ?>
</form>