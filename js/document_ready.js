jQuery(document).ready(function() {
  var $ = jQuery, doc = $(this), shadow = $('#header-shadow'), main = $('#main'),
    wind0w = $(window), footer = $("#footer"), menu = $("#main-menu");

  $('.white-paper .node:even').addClass('even');
  $('.white-paper .node:odd').addClass('odd');
  //Remove all fixed width and height values from images
  $('img').removeAttr('width').removeAttr('height');
  //This for the Pager to have room for margin
  $('article.node:last-of-type').addClass('clearfix');

  //Adjust menu and footer contents in load and resize
  var adjust = function() {
    var width = wind0w.width(), footerBase = $('#footer-base');
    if(width < 1024) {
      footer.css("left", 0);
    } else {
      var footerLeft = (width-1024)/2;
      footer.css("left", footerLeft);
    }
  }

  adjust();
  wind0w.resize(adjust);

  //Show shadow under header when #main is under
  //Sticky navigation
  doc.scroll(function() {
    var scrolled = $(window).scrollTop();

    if(scrolled > 50) shadow.show('fast');
    else shadow.hide('slow');


    if(scrolled >= (main.outerHeight() - 600))
      menu.css({"position" : "absolute", "top" : main.outerHeight() - 600});
    else
      menu.css({"position" : "fixed", "top" : "5em"});
  });
});