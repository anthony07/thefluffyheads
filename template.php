<?php
/**
 * Implements hook_html_head_alter().
 * We are overwriting the default meta character type tag with HTML5 version.
 */
function tfh_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array('charset' => 'utf-8');
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function tfh_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Make all images purgeable
 */
function tfh_preprocess_image_style(&$variables)  {
  $variables['attributes']['class'][] = 'purged';
}

/**
 * Alters the image formatting
 */
function tfh_image_formatter($variables) {
  $item = $variables['item'];
  $image = array('path' => $item['uri'], 'alt' => $item['alt'], );

  if (isset($item['attributes'])) {
    $image['attributes'] = $item['attributes'];
  }

  // Do not output an empty 'title' attribute.
  if (drupal_strlen($item['title']) > 0) {
    $image['title'] = $item['title'];
  }

  if ($variables['image_style']) {
    $image['style_name'] = $variables['image_style'];
    $output = theme('image_style', $image);
  } else {
    $output = theme('image', $image);
  }

  // Slimbox integration
  if (!empty($variables['path']['path']) && ($image['style_name'] == 'gallery')) {
    $path = $variables['path']['path'];
    $options = $variables['path']['options'];
    $options['html'] = TRUE;
    //imporant to make the markup
    $title = isset($image['title']) ? $image['title'] : $image['alt'];
    $attributes = array('attributes' => array('rel' => 'lightbox-preview', 'title' => $title, 'alt' => $image['alt']));
    $link = array_merge($options, $attributes);
    $output = l($output, $path, $link);
  }
  // Links with images
  elseif (!empty($variables['path']['path'])) {
    $path = $variables['path']['path'];
    $options = $variables['path']['options'];
    $options['html'] = TRUE;
    //imporant to make the markup
    $title = $variables['path']['options']['entity'] -> title;
    $attributes = array('attributes' => array('title' => $title, 'alt' => $image['alt']));
    $link = array_merge($options, $attributes);
    $output = l($output, $path, $link);
  }

  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function tfh_preprocess_node(&$variables) {
  $variables['title'] = t($variables['title']);
  $node = $variables['node'];
  $view_mode = $variables['view_mode'];

  switch ($view_mode) {
    case 'full':
      if(node_is_page($node)) {
        $variables['classes_array'][] = 'node-full';
        include 'gallery.php';
      }
      break;

    case 'teaser':
    case 'highlighted_node':
      $body =field_get_items('node', $node, 'body');
      $teaser = $body[0]['summary'];
      $variables['summary'] = $teaser;
      $variables['age'] = age($variables['date']);
      break;

    default:
      # code...
      break;
  }

  if ($view_mode == 'teaser') $variables['theme_hook_suggestions'][] = 'node__teaser';
  elseif ($view_mode == 'highlighted_node') $variables['theme_hook_suggestions'][] = 'node__highlighted_node';
}

/**
 * Preprocess variables for region.tpl.php
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
function tfh_preprocess_region(&$variables, $hook) {
  // Use a bare template for the content region.
  if ($variables['region'] == 'content') {
    $variables['theme_hook_suggestions'][] = 'region__bare';
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function tfh_preprocess_block(&$variables, $hook) {
  // Use a bare template for the page's main content.
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'][] = 'block__bare';
  }
  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function tfh_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $title = $variables['block'] -> subject;
  $title_no_whitespace = str_replace(' ', '-', $title);
  $dom_id = strtolower($title_no_whitespace);

  $variables['title'] = $title;
  $variables['block_dom_id'] = $dom_id;
}

/**
 * Changes the search form widget to comply to HTML5 standards
 */
function tfh_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {//edit-search-block-form--2
    // Add extra attributes to the text box
    $form['search_block_form']['#attributes']['placeholder'] = "Fluffy Search";
  }
}

/**
* theme_menu_link()
*/
function tfh_menu_link(&$variables) {
  $link = str_replace(" ", "-", $variables['element']['#original_link']['link_title']);
  $link_title = strtolower($link);
  $variables['element']['#attributes']['class'][] = $link_title;
  $variables['element']['#attributes']['class'][] = "grayscale";
  if(drupal_is_front_page() && $link_title == 'home') $variables['element']['#attributes']['class'][] = "active-trail";
  return theme_menu_link($variables);
}

/**
 * utility function that converts date to timestamp
 * @param standard time format
 */
function age($date) {
  $datetime = new DateTime($date);
  $elapsedtime = calculateAge($datetime->format('U'));
  return $elapsedtime;
}

/**
 * utility function that gets tweet age
 * @param timestamp
 */
function calculateAge($iTimestamp) {
  $iCurrentTimestamp = time();

  $iDifference = $iCurrentTimestamp - $iTimestamp;

  $iOriginalDifference = $iDifference;
  $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
  $lengths = array("60","60","24","7","4.35","12","10");

  for($j = 0; $iDifference >= $lengths[$j]; $j++)
    $iDifference /= $lengths[$j];

  if ($j == 6) {
     $sReturn = date('M Y',time() - $iOriginalDifference);
  } else {
    $iDifference = round($iDifference);
    if($iDifference != 1) $periods[$j] .= "s";
    $sReturn = $iDifference . " " . $periods[$j] . " ago";
  }

  if (trim($sReturn) == '1 day ago') $sReturn = "yesterday";

  return $sReturn;
}