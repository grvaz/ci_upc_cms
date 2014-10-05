//* Create by FIJN fijn@bk.ru йцу */

inArray = Array.prototype.indexOf ?
    function (arr, val) {
        return arr.indexOf(val) != -1
    } :
    function (arr, val) {
        var i = arr.length
        while (i--) {
            if (arr[i] === val) return true
        }
        return false
    }

$(document).ready(function(){
  $("#datepicker").datepicker ({
    onSelect : function(dateText, inst) {
       //$("#datepicker").datepicker("destroy");
       location.href='/'+curr_article_subtype+'/archive/'+dateText;
     },
     beforeShowDay: function(d) {
       //alert(d);
       //
       var month = (d.getMonth()+1);
       var day = d.getDate();
       if(d.getMonth()<9){ month="0"+month; }
       if(d.getDate()<10){ day="0"+day;     }
       var fulldate=day+'.'+month+'.'+d.getFullYear();
        //alert(fulldate);

       /*$.ajax({
  type: "post",
  async: false,
  url: "/ajax/articles/ajax_calendar",
  data: {date: fulldate, subtype: curr_article_subtype},
  success: function(data){
     calendar_act_day=data;
  }
} );*/

//alert(glob_calendar_arr[0]);

calendar_act_day=inArray(glob_calendar_arr[calend_article_subtype], fulldate);

if(!calendar_act_day){
   return [false,"","Нет материалов за этот день"];
   }else{
    return [true, "","Доступны материалы"];
   }


     }
     /*onChangeMonthYear: function(a,b,datepicker){alert(b);},
     beforeShow: function(input, inst){alert('qqq');}*/
});

$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

});

function mail_send(){
      if(!$('#mail_mess').val()){alert('Поле сообщения обязательно для заполнения'); return;}
    $.ajax({
  type: "post",
  url: "/ajax/common/ajax_feedback",
  data: {name: $('#mail_name').val(), email: $('#mail_email').val(), mess: $('#mail_mess').val()},
  success: function(msg){

  }
} );
alert('Ваше сообщение отправлено');
}


