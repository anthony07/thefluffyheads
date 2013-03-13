jQuery(document).ready(function() {
  var $ = jQuery, doc = $(this), main = $('#main'), wind0w = $(window), shadow = $('#header-shadow'), footer = $("#footer"), menu = $("#main-menu"), gallery = $('.field-name-field-gallery');

  //remove all width and height attributes of images
  $('.purged').removeAttr('width').removeAttr('height');
  //Add a pure css arrow on active-link
  menu.find('.active').after('<span class="arrow"></span>');
  //Dynamic place a clear div in gallery field
  gallery.find('.field-item:last-child').after('<div class="clear"></div>');
  //Arrange node cards
  var left = $('#left-cards'), right = $('#right-cards'), middle = $('#middle-cards');
  var nodes = $('.node-teaser'), cardWrapper = $('.term-listing-heading'), cards = $('#cards'), nodeCounter = 1;
  cards.appendTo(cardWrapper);
  nodes.each(function() {
    var current = $(this);
    switch(nodeCounter % 3) {
      case 0:
        current.appendTo(right);
        break;
      case 1:
        current.appendTo(left);
        break;
      default:
        current.appendTo(middle);
        break;
    }
    ++nodeCounter;
  });

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