$(function() {
  if(location.pathname.split("/")[1] != ''){
    $('ul.nav li').removeClass('active');
    $('ul.nav li a[href^="/' + location.pathname.split("/")[1] + '"]').parent().addClass('active');
  }
});
