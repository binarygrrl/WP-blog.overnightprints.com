<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
<meta name="blogcatalog" content="9BC9908458" /> 
	</head>
	
	<body <?php body_class(); ?>>
		<div id="masthead">
<div id="mastwrap">
<div id="header">

	<h6 id="logo">
    	<a href="<?php echo get_option('home'); ?>/" title="Design and Print Blog Home"><span></span><?php bloginfo('name'); ?></a>
    </h6>

<div id="onp"><a href="http://www.overnightprints.com?cid=b">Go to Overnightprints.com</a>
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



