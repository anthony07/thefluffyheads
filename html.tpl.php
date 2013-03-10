<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]> <!-->
<html version="HTML+RDFa 1.1" class="" lang="<?php print $language -> language; ?>" dir="<?php print $language -> dir; ?>" xmlns="http://www.w3.org/1999/xhtml" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:xsd="http://www.w3.org/2001/XMLSchema#" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:foaf="http://xmlns.com/foaf/0.1/">
  <!--<![endif]-->
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
  <!--[if (gte IE 6)&(lte IE 8)]>
    <script type="text/javascript" src="http://files.thefluffyheads.com/polyfills/html5shiv.js"></script>
    <script type="text/javascript" src="http://files.thefluffyheads.com/polyfills/selectivizr.js"></script>
  <![endif]-->
    <?php print $styles; ?>
    <?php print $scripts; ?>
    <meta name="wot-verification" content="67c13bb594c5f2483eaf" />
  </head>
  <?php flush(); ?>
  <body class="<?php print $classes; ?>" <?php print $attributes; ?>>
    <!-- BuySellAds Ad Code -->
    <script type="text/javascript">
    (function(){
      var bsa = document.createElement('script');
         bsa.type = 'text/javascript';
         bsa.async = true;
         bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
      (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
    })();
    </script>
    <!-- End BuySellAds Ad Code -->

    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>