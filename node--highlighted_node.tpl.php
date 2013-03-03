<?php
  hide($content['sharethis']);
  $read_more = "<a href='{$node_url}' title='{$title}' class='read-more {$view_mode}'>
    read more <span class='element-invisible'>about {$node -> title}</span>
    </a>";
?>

<article id="node-<?php print $node -> nid;?>" class="<?php print $classes . ' ' . $view_mode; ?>"<?php print $attributes;?>>
  <header>
    <h2<?php print $title_attributes;?> class="node-title">
      <?php print $title;?>
    </h2>
    <blockquote class="submitted">
      <?php
        print $user_picture;
        print "<p class='authored'>{$name} <span class='posted'>{$age}</span></p>";
        print render($content['sharethis']); ?>
    </blockquote>
  </header>

  <section class="content"<?php print $content_attributes;?> property="content:encoded">
    <?php print render($content['field_image']);?>
    <p>
      <?php print $summary . "{$read_more}"; ?>
    </p>
  </section>
</article>