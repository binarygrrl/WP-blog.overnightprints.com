<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

get_header(); ?>

<!--begin content-->
<div id="content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="article" class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
            <h3></h3>
			<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
			<?php wp_link_pages(array('before' => '<p>Pages: ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
    </div>
    <!--end content-->
</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>