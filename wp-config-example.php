<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=bK<L@flie_x@NDI|FYHDYWV#{GXv7,=dd.oNcqq(JFa4whcc |#(P&9MIvZ!S|]');
define('SECURE_AUTH_KEY',  'aZ`6RSvVJ`9A+(b(b!(jcH}`I:8Q/Q9.-:AuQB`>a+[3}nh[=`G2A3]+10wJD8#D');
define('LOGGED_IN_KEY',    'D;K?vu0*b=?KG` AJo5d(+0Qn4*-{$o<$r.,2|jlww:{VS}M,bHFM,?LZ>`#j)/Y');
define('NONCE_KEY',        'S8.= |s]TN!*(T}8?/b0szvY[gF4i2P6i6Zx}Kl|Mnp0~)j[B*(@4)@7T` {(O|F');
define('AUTH_SALT',        'H6t,8x7[#5Y*x0UvC!5qiE^_hc07N &KPeI3Pi|KS|UNKPO~cCC9$|IEK*FVr@*&');
define('SECURE_AUTH_SALT', 'y_$t$eSD#X~-Ks@az} K/|Cy29(QSE]eu-4;mJiKqM,gTK+P#9>&zd>[-L?R^B|^');
define('LOGGED_IN_SALT',   'T}@s|vu1jZ74%zkMpx^.Mll^4zN-/Kn^sT@t}nC34hh9[TPV]-p-!o+zU?3!+hX)');
define('NONCE_SALT',       'KZ~Ron]n[88N(ffIOG;MoD;,P^d<+jnEpk1Y=cl;f+n=o^+cKpYG`7u9TP9S*BYD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

$protocol='http';
if (isset($_SERVER['HTTPS']))
	if (strtoupper($_SERVER['HTTPS'])=='ON')
		$protocol='https';

define('WP_SITEURL', $protocol.'://' . $_SERVER['SERVER_NAME'] . '/WordPress');
define('WP_HOME',    $protocol.'://' . $_SERVER['SERVER_NAME']);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/wp-content');
define('WP_CONTENT_URL', $protocol.'://' . $_SERVER['SERVER_NAME'] . '/wp-content');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
