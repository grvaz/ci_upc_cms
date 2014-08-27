<script type="text/javascript" src="/jsplugins/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/jsplugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
function switch_ed(chck){
  //alert(chck.checked);
  if(chck.checked){
    editor_on();
  } else {
    CKEDITOR.instances.editor1.destroy();
  }
}

function editor_on(){
 var editor = CKEDITOR.replace( 'editor1' );
 //CKFinder.setupCKEditor( editor, '/other/js/ckfinder/' ) ;
}
</script>
<?php if($editor==1){ ?>
<script type="text/javascript">
$( document ).ready(function() {
editor_on();
});
</script>
<?php } ?>