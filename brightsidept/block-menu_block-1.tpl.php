<?php
// $Id: block.tpl.php,v 1.4 2008/09/14 12:41:20 johnalbin Exp $

/**
 * @file block.tpl.php
 *
 * Theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $block->content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: This is a numeric id connected to each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: A set of CSS classes for the DIV wrapping the block.
     Possible values are: block-MODULE, region-odd, region-even, odd, even,
     region-count-X, and count-X.
 *
 * Helper variables:
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 */
?>
<nav class="submenu <?php print $classes; ?> <?php if (function_exists('block_class')) print block_class($block); ?>">
  
  <?php if ($block->subject): ?>
    <h2 class="submenu-title"><?php print $block->subject; ?></h2>
  <?php endif; ?>
  
	<?php print $block->content; ?>
	
	<?php print $edit_links; ?>

</nav>