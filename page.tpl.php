<header id="header" role="banner" class="clearfix">
  <div class="wrapper">
    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
      <h1 id="site-title" role="banner">The Fluffy Heads</h1>
    </a>
    <?php if ($site_slogan): ?>
      <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </div>
</header>
<div id="header-shadow" class="empty block"></div>
<!-- /#header -->

<div id="container" class="clearfix">
  <div id="wrapper" class="clearfix">
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
      <?php if ($main_menu): ?>
        <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
      <?php endif; ?>
    </div>

    <?php if ($main_menu || !empty($page['navigation'])): ?>
    <nav id="navigation" role="navigation" class="clearfix">
      <?php if (!empty($page['navigation'])): ?>
        <?php print render($page['navigation']); ?>
      <?php endif; ?>
      <?php if (empty($page['navigation'])): ?>
      <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
            ),
          )); ?>
          <?php endif; ?>
      <div id="nav-spanner">End of navigation</div>
    </nav>
    <?php endif; ?>
    <!-- /#navigation -->
    <?php
      $page_type = ($is_front || arg(0) == 'taxonomy') ? 'front-page' : 'article-page';
      $section = (arg(0) == 'taxonomy') ? 'fluffy-head-page' : 'page';
    ?>
    <section id="main" role="main" class="<?php print $page_type . ' ' . $section; ?>">
      <?php print $messages; ?>
      <?php if ($page['highlighted']): ?>
        <div id="highlighted" class="clearfix">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <div class="white-paper">
        <?php if($page_type == 'front-page'): ?>
          <section id="cards" class="clearfix">
            <div id="left-cards" class="node-column"></div>
            <div id="middle-cards" class="node-column"></div>
            <div id="right-cards" class="node-column last"></div>
          </section>
        <?php endif; ?>

        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </div>
    </section>
    <!-- /#main -->

    <section id="sidebars" role="complementary" class="clearfix">
      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" role="complementary" class="sidebar">
          <?php include_once('top-google-ads.php'); ?>
          <?php print render($page['sidebar_first']); ?>
        </aside>
      <?php endif; ?>
      <!-- /#sidebar-first -->

      <aside id="sidebar-second" role="complementary" class="sidebar">
        <?php print render($page['sidebar_second']); ?>
      </aside>
      <!-- /#sidebar-second -->
    </section>
  </div>
</div>
<!-- /#container -->

<footer id="footer" role="contentinfo" class="clearfix">
  <?php print render($page['footer']) ?>
  <div id="footer-art">
    <a class="about-us">About Us</a>
    <a class="site-map">Site Map</a>
    <a class="write-to-us">Write to Us</a>
    <img id="footer-base" src="http://files.thefluffyheads.com/assets/sprites/f-tfh.jpg" />
  </div>
  <p id="cc-license">
    <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">
    <img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a>
    <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">The Fluffy Heads</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
  </p>
</footer>
<!-- /#footer -->
