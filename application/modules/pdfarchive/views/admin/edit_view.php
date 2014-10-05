<br>
<?php if($id){ ?>
Редактирование номера <?= $title ?>
<?php }else{ ?>
Добавление нового номера
<?php } ?>
<br><br>
<form method="post" action="/admin/pdfarchive/ed/save" enctype="multipart/form-data">

Номер<br><input type="number" name="edit[np_num]" value="<?php if(isset($np_num))echo htmlspecialchars($np_num); ?>"><br><br>

Дата (дд.мм.гггг)<br><input type="text" name="edit[date]" value="<?php if(isset($date))echo htmlspecialchars($date); ?>" pattern="^\d{2,2}\.\d{2,2}\.\d{4,4}$" style="width: 100px;"><br><br>

Заголовок<br><input type="text" name="edit[title]" value="<?php if(isset($title))echo htmlspecialchars($title); ?>"><br><br>

Загрузить / заменить PDF-файл<br>
<input type="file" name="pdf" /><br>
<strong><?= $exists ?></strong>
<br><br>

<?= $imgs ?><br><br>

<input type="hidden" name="edit[id]" value="<?= $id ?>">
<input name="save" type="submit" value="Сохранить">
<?php if(!empty($came_from)){ ?>
<input name="" type="button" value="Назад" onclick="location.href='<?= $came_from ?>'">
<?php } ?>
<?php if($id){ ?>
&nbsp; <input name="del" type="button" value="Удалить" onclick="if(confirm('Удалить?')){location.href='/admin/pdfarchive/index/del/?&id=<?= $id ?>';}else{return false;}">
<?php } ?>
</form>