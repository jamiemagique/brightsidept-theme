<?php
// $Id: page.tpl.php,v 1.14.2.10 2009/11/05 14:26:26 johnalbin Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 * - $body_classes_array: An array of the body classes. This is easier to
 *   manipulate then the string in $body_classes.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="<?php print $body_classes; ?>">
	
	<div class="l-site">
	
		<header class="site-header" role="banner">
			<h1 class="site-logo"><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>" rel="home"><span class="is-invisible"><?php print $site_name; ?></span></a></h1>
			<?php if ($navbar): ?>
				<a class="slide-menu" href="#menu"><i class="slide-menu-mid"></i></a>
			<?php endif; ?>
	    <?php if ($header): ?>
	    	<?php print $header; ?>
	    <?php endif; ?>
		</header>	
	
		<?php if ($navbar): ?>
			<?php print $navbar; ?>
		<?php endif; ?>
		
		<main role="main">
		  <?php print $breadcrumb; ?>
			<h1 class="title"><?php print $title; ?></h1>
			<?php print $messages; ?>
			<?php if ($tabs): ?>
				<?php print $tabs; ?>
			<?php endif; ?> 
			<?php print $help; ?>
			<?php print $content_top; ?>
			<?php print $content; ?>
			<?php print $feed_icons; ?>
			<?php print $content_bottom; ?>		
		</main>
	
		<?php if ($left): ?>
			<div class="l-sidebar-left sidebar">
				<?php print $left; ?>
			</div>
		<?php endif; ?>
		
		<?php if ($right): ?>
			<div class="l-sidebar-right sidebar">
				<?php print $right; ?>
			</div>
		<?php endif; ?>
		
		<footer class="site-footer" role="contentinfo">
			<nav class="nav-main-footer">
				<?php print theme('links', $primary_links); ?>
			</nav>
			<?php print $footer; ?>
		</footer>
	
		<?php print $closure_region; ?>
		
		<?php print $closure; ?>
	
	</div><!-- /.l-site -->
	
	<div class="bg-grad"></div>

</body>

</html>
