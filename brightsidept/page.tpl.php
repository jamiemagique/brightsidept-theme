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
			<!--<div class="ad-logos">
				<?php 
					$src = drupal_get_path('theme', 'brightsidept').'/assets/images/logo-wave.png';
					$img = theme_image($src, 'Wave FM fitness logo', 'Wave FM fitness logo');
					$path = 'wave';
					print l($img, $path, array('html' => true));
				?>
			</div>-->
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
		
		<?php if ($is_front): ?>
			<ul class="carousel">
				<li><a href="#" title="Description of the page this points to"><img src="http://placeimg.com/940/265/any" alt="Placeholder img" /></a></li>
				<li><a href="#" title="Description of the page this points to"><img src="http://placeimg.com/940/265/animals" alt="Placeholder img" /></li>
				<li><a href="#" title="Description of the page this points to"><img src="http://placeimg.com/940/265/arch" alt="Placeholder img" /></a></li>
				<li><a href="#" title="Description of the page this points to"><img src="http://placeimg.com/940/265/nature" alt="Placeholder img" /></a></li>
			</ul>
		<?php endif; ?>
		
		<?php print $content_top; ?>
		
		<main role="main">
		  <?php print $breadcrumb; ?>
		  <?php if ($title && !isset($is_node)): ?>
				<h1 class="title"><?php print $title; ?></h1>
			<?php endif; ?>
			<?php print $messages; ?>
			<?php if ($tabs): ?>
				<?php print $tabs; ?>
			<?php endif; ?> 
			<?php print $help; ?>
			<?php print $content; ?>
			<?php print $feed_icons; ?>		
		</main>
		
		<?php if ($content_bottom): ?>
			<div class="l-content-bottom">
				<?php print $content_bottom; ?>
			</div>
		<?php endif; ?>
	
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
