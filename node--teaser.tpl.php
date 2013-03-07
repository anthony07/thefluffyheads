<?php
  $read_more = "<a href='{$node_url}' about='{$title}' class='view-card'>
    read full article<span class='element-invisible'>about {$title}</span>
    </a>";
?>

<article id="teaser-<?php print $node -> nid;?>" class="<?php print $classes;?>"<?php print $attributes;?>>
  <?php print render($content['field_image']);?>
  <h2<?php print $title_attributes;?> class="node-title">
    <?php print $title;?>
  </h2>

  <p class="summary"<?php print $content_attributes;?> property="content:encoded">
    <?php print "{$summary} {$read_more}"; ?>
  </p>

  <blockquote class="submission">
    <?php
      print $user_picture;
      print "<p class='authored'>{$name}<span class='date' property='dc:date dc:created' content='{$date}' datatype='xsd:dateTime'>{$age}</span></p>";
    ?>
  </blockquote>
</article>
