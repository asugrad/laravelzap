$(function() {
  if(location.pathname.split("/")[1] != ''){
    $('ul.nav li').removeClass('active');
    $('ul.nav li a[href^="/' + location.pathname.split("/")[1] + '"]').parent().addClass('active');
  }

  /* ===== Affix Sidebar ===== */
  /* Ref: http://getbootstrap.com/javascript/#affix-examples */
  
  $('#doc-menu').affix({
        offset: {
            top: ($('#header').outerHeight(true) + $('#doc-header').outerHeight(true)) + 45,
            bottom: ($('#footer').outerHeight(true) + $('#promo-block').outerHeight(true)) + 75
        }
    });

    /* Hack related to: https://github.com/twbs/bootstrap/issues/10236 */
    $(window).on('load resize', function() {
        $(window).trigger('scroll');
    });

    /* Activate scrollspy menu */
    $('body').scrollspy({target: '#doc-nav', offset: 100});

    /* Smooth scrolling */
  $('a.scrollto').on('click', function(e){
        //store hash
        var target = this.hash;
        e.preventDefault();
    $('body').scrollTo(target, 800, {offset: 0, 'axis':'y'});

  });
});
