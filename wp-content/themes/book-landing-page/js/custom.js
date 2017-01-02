
jQuery(document).ready(function($){

  $('.about .col').equalHeights();

  $(".tab-content").niceScroll({
    cursorcolor: "#63b03e",
    zindex: "10",
    cursorborder: "none",
    cursoropacitymin: "1",
    cursoropacitymax: "1",
    cursorwidth: "8px",
    cursorborderradius: "0px;"
  });

  $("body").niceScroll({
    cursorcolor: "#63b03e",
    zindex: "10",
    cursorborder: "none",
    cursoropacitymin: "0",
    cursoropacitymax: "1",
    cursorwidth: "8px",
    cursorborderradius: "0px;"
  });

  $('#responsive-menu-button').sidr({
  name: 'sidr-main',
  source: '#site-navigation',
  side: 'right'
  });

  $('.widget_newsletterwidget .widget-title').each(function(){
    $(this.nextSibling).wrap('<span></span>');
  });
      
});
