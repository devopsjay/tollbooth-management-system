<!doctype html>
<html>
<head>
<title>Test</title>
<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(function() {
  $('body').on('click','.closePopup', function() {
    $('.popupElement').remove()
  });

  $(window).resize(function() {
    var popup = $('#popupWindow');
    if (popup.length > 0) {
      centerPopup();
    }
  });

  $('a').click(function(e) {
    e.preventDefault();
    var popup = $('<div/>').attr('id','popupWindow').addClass('popup').addClass('popupElement').css({left: '-999px'});
    var html = '<a class="closePopup"></a><img src="' + $(this).attr('href') + '" /><div class="action"></div>';
    popup.html(html);
    $('body').append(popup);
    centerPopup();
  });
});

function centerPopup()
{
  var popup = $('#popupWindow');
  var left = ($(window).width() - popup.width()) >> 1;
  var top = ($(window).height() - popup.height()) >> 1;
  popup.css({left: left + 'px', top: top + 'px'});
}
</script>
<style type="text/css">
.popup {
  background: #fff;
  border: 2px solid #333;
  border-radius: 5px;
  padding: 10px;
  position: absolute;
  z-index: 1000;
}
.popup img {
  display: block;
  margin-bottom: 15px;
}
.popup div.action {
  text-align: right;
}
.popup div.action input {
  background: red;
  color: white;
  border: red;
}
.closePopup {
	position: absolute;
	display: block;
	width: 32px;
	height: 32px;
	background: url(images/close-button.png) no-repeat 0 0;
	right: -16px;
	top: -16px;
}
</style>
</head>
<body>
<a href="images/a3.jpg">Click me</a>
</body>
</html>

                                      