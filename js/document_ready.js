jQuery(document).ready(function() {
  var $ = jQuery, doc = $(this), main = $('#main'), wind0w = $(window), shadow = $('#header-shadow'), footer = $("#footer"), menu = $("#main-menu"), gallery = $('.field-name-field-gallery');
  var largeAd = $('#large-ad'), mediumAd = $('#medium-ad'), squareAd = $('#square-ad');

  //move page title inside the box
  var fluffyTitle = $('.fluffy-head-page #page-title');
  $('.taxonomy-term-description p:first-child').before(fluffyTitle);
  //This for the Pager to have room for margin
  $('article.node:last-of-type').addClass('clearfix');
  //Add a pure css arrow on active-link
  menu.find('.active').after('<span class="arrow"></span>');
  //Dynamic place a clear div in gallery field
  gallery.find('.field-item:last-child').after('<div class="clear"></div>');
  //Arrange node cards
  var left = $('#left-cards'), right = $('#right-cards');
  var nodes = $('.node-teaser'), cardWrapper = $('.white-paper > .content'), cards = $('#cards'), nodeCounter = 1;
  cards.appendTo(cardWrapper);
  nodes.each(function() {
    var current = $(this);
    switch(nodeCounter % 2) {
      case 0:
        current.appendTo(right);
        break;
      default:
        current.appendTo(left);
        break;
    }
    ++nodeCounter;
  });

  var adPadding = function() {
    //Adjust top and bottom ad paddings dynamically
    var visibleAd = $('.sidebar-ads:visible');
    visibleAd.each(function() {
      var adSize = $(this).data("width"),
        adPads = ($(this).outerWidth() - adSize) / 2;
      $(this).css({'padding-top': adPads, 'padding-bottom' : adPads});
    });
  }, adjust = function() {
    //Adjust menu and footer contents in load and resize
    var width = wind0w.width(), footerBase = $('#footer-base');
    if(width <= 1154) {
      largeAd.hide();
      mediumAd.hide();
      squareAd.show();
    } else if(width <= 1293) {
      largeAd.hide();
      mediumAd.show();
      squareAd.hide();
    } else {
      largeAd.show();
      mediumAd.hide();
      squareAd.hide();

      var footerLeft = (width-1150)/2;
      footer.css("left", footerLeft);
    }

    adPadding();
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