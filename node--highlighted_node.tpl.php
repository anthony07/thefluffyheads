<?php
  hide($content['sharethis']);
  $read_more = "<a href='{$node_url}' class='view-card'>
    Read more <span class='element-invisible' about='{$title}'>about {$title}</span>
    </a>";
?>

<article id="node-highlighted-<?php print $node -> nid;?>" class="card highlighted <?php print $classes;?>"<?php print $attributes;?>>
  <?php
    print render($title_prefix);
    print render($title_suffix);
    print render($content['field_image']);
  ?>
  <h2<?php print $title_attributes;?> class="node-title highlighted">
    <?php print $title;?>
  </h2>

  <p class="summary highlighted"<?php print $content_attributes;?> property="content:encoded">
    <?php print "{$summary} {$read_more}"; ?>
  </p>

  <blockquote class="submission highlighted user-<?php print $user_id;?>">
    <span class="grayscale author-img">
      <?php print $user_picture; ?>
    </span>
    <?php
      print "<p class='authored'>{$name}<span class='date' property='dc:date dc:created' content='{$date}' datatype='xsd:dateTime'>{$age}</span></p>";
      print render($content['sharethis']);
    ?>
  </blockquote>
</article>
