
<script src="/uploads/calendar.js?<?= md5(rand()) ?>"></script>
<script>
calendar_act_day='0';
curr_article_subtype='<?= $this->uri->segment(1) ?>';
calend_article_subtype='<?php if($this->uri->segment(1)=='news'){echo 0;}else{echo 1;} ?>';
</script>
