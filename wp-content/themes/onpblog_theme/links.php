<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<h4>Links:</h4>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>

<?php get_footer(); ?>