<?php $dom_id = !empty($block_dom_id) ? $block_dom_id : $block_html_id ?>
<section id="<?php print $dom_id ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><span class="block-icon">&nbsp;</span><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

</section> <!-- /.block -->