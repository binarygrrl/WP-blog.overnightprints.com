<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

get_header(); ?>

	<div id="content"><?php if (have_posts()) : ?>

		<h5>Search Results</h5>

		<?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="article" <?php post_class() ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<h3><?php the_time('l, F jS, Y') ?></h3>
                                <p><?php the_excerpt(); ?></p>
				<p class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>

	<?php else : ?>

		<h5>No posts found. Try a different search?</h5>
		<?php get_search_form(); ?>

	<?php endif; ?></div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>