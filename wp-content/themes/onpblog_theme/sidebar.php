<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */
?>

<!--begin sidebar-->

<div id="sidebar">

		<div id="connect" class="module">
<h4>Connect</h4>
<span class="connectimg"><img src="http://overnightprints.com/blog/wp-content/uploads/2009/11/s_networks.png" width="191" height="26" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="0,3,70,26" href="http://www.myspace.com/overnightprints" alt="Myspace"/>
<area shape="rect" coords="75,3,136,26" href="http://twitter.com/Overnightprints" alt="Twitter"/>
<area shape="rect" coords="141,3,190,26" href="http://www.facebook.com/OvernightPrints" alt="Facebook"/>
</map></span>

<h4>Subscribe</h4>
<ul>
<li><a href="http://overnightprints.com/blog/feed"><span class="connectimg"><img src="http://overnightprints.com/blog/wp-content/uploads/2009/12/rss_icon.jpg" border ="0" /></span></a></li>
</ul>

</div>

<div class="module">
  <a href="http://overnightprints.com/blog/contact/"><img src="http://overnightprints.com/blog/wp-content/uploads/2009/11/subart_b.jpg" /></a></div>


        <div class="whitemod"><ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<li><div class="search">
				<?php get_search_form(); ?></div>
			</li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the year <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

			<?php } ?>

			</li>
		<?php }?>
		</ul>
		
		<ul>
		
			<?php wp_list_categories('title_li=<h4>Categories</h4>'); ?>
		</ul>
			<ul>
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

			<?php } ?>

			<?php endif; ?>
		</ul>
	</div>
    <div id="products" class="module">
<h4>ONP Products</h4>
<ul>
<li><a href="http://www.overnightprints.com/businesscards">Business Cards</a></li>
<li><a href="http://www.overnightprints.com/minibusinesscards">Mini Business Cards</a></li>
<li><a href="http://www.overnightprints.com/calendars">Calendars</a></li>
<li><a href="http://www.overnightprints.com/postcards">Postcards</a></li>
<li><a href="http://www.overnightprints.com/greetingcards">Greeting Cards</a></li>
<li><a href="http://www.overnightprints.com/rackcards">Rack Cards</a></li>
<li><a href="http://www.overnightprints.com/bookmarks">Bookmarks</a></li>
<li><a href="http://www.overnightprints.com/brochures">Brochures</a></li>
<li><a href="http://www.overnightprints.com/posters">Posters</a></li>
<li><a href="http://www.overnightprints.com/letterhead">Letterhead</a></li>
<li><a href="http://www.overnightprints.com/envelopes">Envelopes</a></li>
<li><a href="http://www.overnightprints.com/rubberstamps">Self Inking Stamps</a></li>
<li><a href="http://www.overnightprints.com/magnets">Magnets</a></li>
<li><a href="http://www.overnightprints.com/addresslabels">Address Labels</a></li>
<li><a href="http://www.overnightprints.com/mailing_services">Mailing Services</a></li>
</ul>
</div>
        <!--end sidebar-->
</div>