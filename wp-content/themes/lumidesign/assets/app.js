$(window).scroll(stickyHeader);
$(document).ready(stickyHeader);
function stickyHeader(){
  if ($(window).scrollTop() >=35) {
      $('header').addClass('fixed');
  }
  else {
      $('header').removeClass('fixed');
  }
}
$(function () {
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function () {
        var d = new Date();
        var year = d.getFullYear();
        var month = d.getMonth();
        var day = d.getDate();
        var c = new Date(year + 1, month, day).toUTCString();
        var acceptance = 'undefined';
        var value = "; " + document.cookie;
        var parts = value.split("; " + "acceptance" + "=");
        if (parts.length == 2) {
            acceptance = parts.pop().split(";").shift();
        }
        if (acceptance === 'true') {
            runTracking(); //Run Google Analytics
        }
        else if (acceptance === 'undefined') {
            $('#acceptance-container').animate({'bottom': '5'}, 2000);
            // $('#acceptance-prihvatanje').addClass('visible');
            $('#acceptance-container button#accept').on('click', function () {
                document.cookie = 'acceptance=true; expires=' + c +'; path=/';
                acceptance = 'true';
                runTracking();
                $('#acceptance-container').animate({'bottom': '-300px'}, 2000);
            });
        }

    });
