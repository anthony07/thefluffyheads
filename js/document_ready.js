jQuery(document).ready(function() {
    $ = jQuery;

    $('.white-paper .node:even').addClass('even');
    $('.white-paper .node:odd').addClass('odd');
    $('img').removeAttr('width').removeAttr('height'); //Removed all fixed width and height values from images
    $('article.node:last-of-type').addClass('clearfix'); //This for the Pager to have room for margin
});