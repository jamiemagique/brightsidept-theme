<?php
// $Id$

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to brightsidept_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: brightsidept_breadcrumb()
 *
 *   where brightsidept is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function brightsidept_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function brightsidept_preprocess_page(&$vars, $hook) {
  $args = arg();
  if ($args[0] == 'node' && is_numeric($args[1]) && $args[2] != 'edit') {
  	$vars['is_node'] = TRUE;
  }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function brightsidept_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function brightsidept_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function brightsidept_preprocess_block(&$vars, $hook) {
  //print_r($vars['template_files']);
}
// */

/**
 * Theme a "Submitted by ..." notice.
 *
 * @param $comment
 *   The comment.
 * @ingroup themeable
 */
function brightsidept_comment_submitted($comment) {
  return t('Posted by <strong>!username</strong><br /><em>@datetime</em>',
    array(
      '!username' => theme('username', $comment),
      '@datetime' => format_date($comment->timestamp)
    ));
}


/**
 * Format the "Submitted by username on date/time" for each node
 *
 * @ingroup themeable
 */
function brightsidept_node_submitted($node) {
  return t('Posted by <strong>!username</strong><br /><em>@datetime</em>',
    array(
      '!username' => theme('username', $node),
      '@datetime' => format_date($node->created),
    ));
}

/**
 * theme_breadcrumb()
 */
function brightsidept_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    foreach ($breadcrumb as $key => $crumb) {
	    $breadcrumb[$key] = '<li>' . $crumb . '<span class="crumbs-sep"> &raquo; </span></li>';
    }
    $page_title = '<li>' . drupal_get_title() . '</li>';
    return '<nav class="crumbs"><h2 class="is-vishidden">' . t('You are here') . '</h2><ul>' . implode('', $breadcrumb) . $page_title . '</ul></nav>';
  }
}

/**
 * theme_menu_item()
 */
function brightsidept_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' ' . $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
    $class .= ' Selected';
  }
  return '<li class="' . $class . '">' . $link . $menu . "</li>\n";
}