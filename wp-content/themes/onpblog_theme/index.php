<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
		<div id="masthead">
<div id="mastwrap">
<div id="header">

    <div id="logo">
    <h1 class="logo">
    	<a href="<?php echo get_option('home'); ?>/" title="Design and Print Blog Home"><span></span><?php bloginfo('name'); ?></a>
    </h1></div>

<div id="onp"><a href="http://www.overnightprints.com">Go to Overnightprints.com</a>
</div>

</div>
</div>
</div>
        
 <div id="nav"> 
<div id="navwrap">    
<ul>
<li><a href="/blog">Home</a></li>
<li><a href="/blog/category/Designer-Interview/">Interviews</a></li>
<li><?php wp_list_pages('title_li=' ); ?></li>
</ul>
</div>
</div>     

<!--begin pagewrap-->
<div id="pagewrap">

<div id="banner" class="box"><a href="http://overnightprints.com/blog/my-adventures-up-down-the-ladders-interview-with-mear-one/"><img src="http://overnightprints.com/blog/wp-content/uploads/2010/08/8-10-10banner.png"></a></div>
<div id="content">

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div class="article" <?php post_class() ?> id="post-<?php the_ID(); ?> id="article">
			<h2 class="indexh2"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<h3><?php the_time('F jS, Y') ?>  by <?php the_author() ?> </h3>
            
			<?php the_content('Read more &raquo;'); ?>
			<p class="tags"><?php /* if (function_exists('sharethis_button')) { sharethis_button(); } */ ?><br /><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</div>

	<?php endwhile; ?>

	<?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>

<?php else : ?>

	<h4>Not Found</h4>
	<p>Sorry, but you are looking for something that isn't here.</p>
	<?php get_search_form(); ?>

<?php endif; ?>

<!--end content-->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>