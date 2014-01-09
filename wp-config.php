<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'micek');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'WP_ALLOW_MULTISITE', true );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8uMg`PchO;WE$B+<7_@;z0sv;%8AtxG(@]sN@6[x9O6s8sD~M,a%SpO(_}cb%*6X');
define('SECURE_AUTH_KEY',  'irY9nPD}H7<gL^HTvye[)UzMyN1D 7$sD/uYAsq;SP.)/1&tB_lPa^oGhx`b&b62');
define('LOGGED_IN_KEY',    'z#*ui[jJo WQ6_Yk_ie{fiP^[o]gXSC!};Z7#8SGH19u0Np@_p4Bmv[,.kvh,Djp');
define('NONCE_KEY',        '0i2zU7d_tTc F$9uLFEd]P+ gTa<{3uHOKD:pL%Y}ZfKk8U%1`;w]mM_VuOF4NSL');
define('AUTH_SALT',        '^){H;],4IE5&Ot>H%qDKJn.;?8I%GRG!E/7X%&YN1whEY%V4=.M6G]5+D7q-SKDj');
define('SECURE_AUTH_SALT', ':fyc@wSmpyMP7O5^kY6Qd!mNY~rUA!_ad:Hj$0FV$ZKDbnm(y`+y3,rh$Os:QWCD');
define('LOGGED_IN_SALT',   '`G&OkOsC@|7K5oa^94&J.x>T)U5okT:pTGG^Rqy|VA3*H7z~]2Ztn@sorZ_PsV0k');
define('NONCE_SALT',       'fXN^iB.m$(J~1t/Z-TV#E9Ob#ZGq(z/P6h(,G:K$Tdo6o@W5{~I(@djZ==4+tU4U');

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
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/micek/';
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/micek/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
