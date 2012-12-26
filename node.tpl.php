<?php if(!$page): ?>
<article id="node-<?php print $node -> nid;?>" class="<?php print $classes . ' ' . $view_mode; ?>"<?php print $attributes;?>>
  <?php
    $body = field_get_items('node', $node, 'body');
    $summary = $body[0]['summary'];
    $exerpt = rtrim(rtrim(substr($summary, 0, 250), '.'));
    $teaser_exerpt = substr($exerpt, 0, 190);
    $title = str_replace("'", "`", $node -> title);
    $read_more = "<a href='{$node_url}' title='{$title}' class='read-more {$view_mode}'>read more
      <span class='element-invisible'>about {$node -> title}</span>
      </a>";
  ?>
  <header class="<?php print 'user-' . $node->uid; ?>">
<?php else: ?>
<section id="main-article">
<?php endif;?>

    <?php print render($title_prefix); ?>

    <?php if (!$page): ?>
    <h2<?php print $title_attributes;?> class="node-title">
      <a href="<?php print $node_url;?>"><?php print $title;?></a>
    </h2>
    <?php endif;?>
      <?php print render($title_suffix);?>
      <?php print $user_picture;?>
      <?php if ($display_submitted):?>
      <blockquote class="submitted">
        <?php print "<p class='authored'>{$name} on {$date}</p>" ?>
      </blockquote>
      <?php endif;?>
<?php if(!$page): ?>
  </header>
<?php endif;?>

  <section class="content"<?php print $content_attributes;?>>
  <?php
    hide($content['links']);
    hide($content['sharethis']);

    print render($content['field_image']);?>

  <?php if(!$page): ?>
    <div class="field-name-body" property="content:encoded">
      <p>
        <?php $card_text = !$teaser ? $exerpt : $teaser_exerpt;
          print $card_text . "...{$read_more}"; ?>
      </p>
    </div>
  <?php else: ?>
    <?php print render($content); ?>
  <?php endif;?>
  </section>

<?php if(!$page): ?>
</article>
<?php else: ?>
</section>
<!-- /.node -->
<?php endif;?>