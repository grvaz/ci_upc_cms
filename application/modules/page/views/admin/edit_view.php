<br>
<?php if($id){ ?>
Редактирование страницы <a href="/<?= htmlspecialchars($chpu) ?>" target="_blank">№<?= $id ?></a>
<?php }else{ ?>
Создание новой страницы
<?php } ?>
<br><br>
<form method="post" action="/admin/page/index/save" enctype="multipart/form-data">
Заголовок<br><input type="text" name="edit[header]" value="<?php if(isset($header))echo htmlspecialchars($header); ?>"><br><br>
Текст<br><textarea name="edit[text]" id="editor1"><?php if(isset($text))echo $text; ?></textarea><br><label>Редактор <input name="edit[editor]" type="checkbox"  onclick="switch_ed(this);" value="1" <?php if($editor)echo'checked'; ?> /></label>
<br><br>

Псевдоссылка<br><input type="text" name="edit[chpu]" value="<?php if(isset($chpu))echo htmlspecialchars($chpu); ?>"><br><br>

<?= $imgs ?><br><br>

Title<br><input type="text" name="edit[meta_title]" value="<?php if(isset($meta_title))echo htmlspecialchars($meta_title); ?>"><br><br>

Keywords<br><input type="text" name="edit[meta_keywords]" value="<?php if(isset($meta_keywords))echo htmlspecialchars($meta_keywords); ?>"><br><br>

Description<br><textarea name="edit[meta_description]"><?php if(isset($meta_description))echo $meta_description; ?></textarea><br><br>

<input type="hidden" name="edit[id]" value="<?= $id ?>">
<input type="hidden" name="edit[subpage_of]" value="<?= $subpage_of ?>">
<input name="save" type="submit" value="Сохранить">
<input name="" type="button" value="Назад" onclick="location.href='<?= $came_from ?>'">

</form>