<?php
  $read_more = "<a href='{$node_url}' title='{$title}' class='view-card {$view_mode}'>
    read more <span class='element-invisible'>about {$node -> title}</span>
    </a>";
?>

<article id="node-<?php print $node -> nid;?>" class="<?php print $classes . ' ' . $view_mode; ?>"<?php print $attributes;?>>
  <?php print render($content['field_image']);?>
  <header>
    <h2<?php print $title_attributes;?> class="node-title">
      <?php print $title;?>
    </h2>
  </header>

  <section class="content"<?php print $content_attributes;?> property="content:encoded">
    <p class="node-summary">
      <?php print "{$summary} {$read_more}"; ?>
    </p>
  </section>

  <blockquote class="submission">
    <?php
      print $user_picture;
      print "<p class='authored'><span class='author hidden'>{$name}</span><span class='posted'>{$age}</span></p>";
    ?>
  </blockquote>

</article>