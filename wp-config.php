<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'onpblog');

/** MySQL database username */
define('DB_USER', 'onpblog');

/** MySQL database password */
define('DB_PASSWORD', 'peaReGo8');

/** MySQL hostname */
define('DB_HOST', 'db1.soc2.farheap.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Force SSL logins **/
define('FORCE_SSL_ADMIN', true);
define('FORCE_SSL_LOGIN', true);
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
  $_SERVER['HTTPS']='on';

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        'o+5Gdj|2^,Q+`yXx)Zzzq;A7! N>c,P2//Bwt0?2GZ[]|=L*|#Ncf[U.P;_]e6Qa');
define('SECURE_AUTH_KEY', '8nklX|^cv::K-lD=q[Z<}CTvWiCiS3b9q)&?5FXr p--uui+zX;7[pv`)QPe@)1:');
define('LOGGED_IN_KEY',   'pA.fZ;1E)+?TUS,dFzq?fnPGaJ2F|E?NpH%6:-fgzyv1~[;4}9R],53>J^UR}1$?');
define('NONCE_KEY',       'm2j<k-Iet4JK+-.Brt&-vvV>c+CTdax@sm-|:%-4F,Z8TQ:z*pA<:M)t<vxi>b~_');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
