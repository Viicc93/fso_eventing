$(document).ready(function(){
  if ($('.mbpb-powered-by').width() > 500) {
    $('.mbpb-content').css({"width": "25%"});
  }
  if ($('.mbpb-powered-by').width() > 800) {
    $('.mbpb-content').css({"width": "20%"});
  }
  if ($('.mbpb-powered-by').width() < 501) {
    $('.mbpb-content').css({"width": "33%"});
  }
$('.mbpb-content').hide();

  var delay = 0;
  $('[id^="sid_"]').each(function () {
    $(this).delay(delay).fadeIn(2000);
    delay += 1000;
  });
});
