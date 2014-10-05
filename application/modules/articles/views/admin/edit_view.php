<br>
<?php if($id){ ?>
Редактирование <?= $rus_type[$subtype] ?> <a href="/<?= $subtype ?>/<?= $id ?>" target="_blank">№<?= $id ?></a>
<?php }else{ ?>
Создание новой <?= $rus_type[$subtype] ?>
<?php } ?>
<br><br>
<form method="post" action="/admin/articles/ed/save" enctype="multipart/form-data">
Заголовок<br><input type="text" name="edit[header]" value="<?php if(isset($header))echo htmlspecialchars($header); ?>"><br><br>
Текст<br><textarea name="edit[text]" id="editor1"><?php if(isset($text))echo $text; ?></textarea><br>
<label>Редактор <input name="edit[editor]" type="checkbox"  onclick="switch_ed(this);" value="1" <?php if($editor)echo'checked'; ?> /></label>
<br><br>

<label>Тема дня <input name="day_theme" type="checkbox" value="1" <?php if($day_theme)echo'checked'; ?> /></label>
<br><br>

<select name="cat">
  <option value="0">--Категория--</option>
<?php foreach($cats as $cat){ ?>
  <option value="<?= $cat['id'] ?>" <?php if($curr_cat==$cat['id'])echo'selected'; ?>><?= $cat['name'] ?></option>
<?php } ?>
</select><br><br>

<?php if($subtype=='articles'){ ?>
Номер газеты<br><input type="text" name="np_num" value="<?php if(isset($np_num))echo htmlspecialchars($np_num); ?>" style="width: 300px;"><br><br>
<?php } ?>

<?= $imgs ?>
<br><br>

Title<br><input type="text" name="edit[meta_title]" value="<?php if(isset($meta_title))echo htmlspecialchars($meta_title); ?>"><br><br>

Keywords<br><input type="text" name="edit[meta_keywords]" value="<?php if(isset($meta_keywords))echo htmlspecialchars($meta_keywords); ?>"><br><br>

Description<br><textarea name="edit[meta_description]"><?php if(isset($meta_description))echo $meta_description; ?></textarea><br><br>

<input type="hidden" name="edit[id]" value="<?= $id ?>">
<input type="hidden" name="edit[subtype]" value="<?= $subtype ?>">
<input name="save" type="submit" value="Сохранить">
<?php if(!empty($came_from)){ ?>
<input name="" type="button" value="Назад" onclick="location.href='<?= $came_from ?>'">
<?php } ?>
<?php if($id){ ?>
&nbsp; <input name="del" type="button" value="Удалить" onclick="if(confirm('Удалить?')){location.href='/admin/articles/index/del/<?= $subtype ?>/?&id=<?= $id ?>';}else{return false;}">
<?php } ?>
</form>