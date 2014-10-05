Изображения<br>
<input name="imgs[]" type="file" multiple="">
<div class="overflow-imgs">

<table border="1" style="width: 236px;">
<tr>
<td style="text-align: center"><strong>Изображение</strong></td><td style="text-align: center"><strong>Вес</strong></td><td style="text-align: center"><strong>X</strong></td>
</tr>
<?php foreach($img_list as $img){ ?>
  <tr>
    <td><a href="<?= img_src('big', $img) ?>" target="_blank"><img src="<?= img_src('thumb1', $img) ?>" alt=""></a></td>

    <!--<td><input name="imgs_weight[<?= $img['id'] ?>]" type="text" value="<?= $img['weight'] ?>" class="imgs_weight"></td>-->

<td><select name="imgs_weight[<?= $img['id'] ?>]" value="<?= $img['weight'] ?>" class="imgs_weight">
<?php for($i=1;$i<=count($img_list);$i++){ ?>
<option value="<?= $i ?>" <?php if($i==$img['weight'])echo'selected'; ?>><?= $i ?></option>
<?php } ?>
</select></td>

    <td><input name="imgs_del[<?= $img['id'] ?>]" type="checkbox" value="<?= $img['id'] ?>"></td>
  </tr>
<?php } ?>
</table>
</div>