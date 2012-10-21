jQuery(document).ready(function() {
  var $ = jQuery;
  var doc = $(this);
  var shadow = $('#header-shadow');
  var main = $('#main');

  $('.white-paper .node:even').addClass('even');
  $('.white-paper .node:odd').addClass('odd');
  //Remove all fixed width and height values from images
  $('img').removeAttr('width').removeAttr('height');
  //This for the Pager to have room for margin
  $('article.node:last-of-type').addClass('clearfix');

  //Show shadow under header when #main is under
  doc.scroll(function() {
    var scrolled = $(window).scrollTop();

    if(scrolled > 50) shadow.show('fast');
    else shadow.hide('slow');
  });
});