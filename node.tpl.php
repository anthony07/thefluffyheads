<?php
  hide($content['links']);
  hide($content['sharethis']);
?>

<section id="main-article">
  <?php
    print render($title_prefix);
    print render($title_suffix);
    print $user_picture;
    print render($content['sharethis']);
  ?>
  <blockquote class="submitted">
    <?php print "<p class='authored'>{$name} on {$date}</p>" ?>
  </blockquote>

  <div class="content"<?php print $content_attributes;?>>
    <?php
      print render($content['field_image']);
      print render($content);
    ?>
  </div>
</section>
<!-- /#main-article -->