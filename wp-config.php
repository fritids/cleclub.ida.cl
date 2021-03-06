<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'clelcubc_www');

/** MySQL database username */
define('DB_USER', 'clelcubc_user');

/** MySQL database password */
define('DB_PASSWORD', 'clubcle2013');

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
define('AUTH_KEY',         'Q8RxNmMSs`ctV<-ns]FM2z)s~]R</`:]+%%6(9Y5) (bdFJ35m))&4`>um1gy_XZ');
define('SECURE_AUTH_KEY',  'AZf,PhHi**UkKIS|x`f|Mu-fc=nrI9HKK0n2lV] #?Ys]abn*e5/3+j#tldlsd}>');
define('LOGGED_IN_KEY',    '^QKh(f$3U].7A!m[XL:-*zf:N~Bp.&Thm+S|FJhj(.%3z`>^ 2@aaSw4G4cQ2|pw');
define('NONCE_KEY',        'aTtMvjw/NpNK5o_vzm@o5i|ht|nin}1J-cK@i[yUd^ g_B+%PliFXHk{o6 G|=Dl');
define('AUTH_SALT',        '&-jes.C6O+%cAAqgs=>U?Vh-Lz!X#]Z*IA6FQ/3=;a8`f|I-O!%*U@y2 2X=<V_Y');
define('SECURE_AUTH_SALT', '$`psn_5o]W1v,.]9Zs4_Nm0KOTu0&cj0%/qGLH> I<{qTjL-uIQg(*{q;e_0/k?s');
define('LOGGED_IN_SALT',   'Qw~$e;7FWZv`n&u`vPq^5xC^Mg(w$wSpK(EU;duxxz.Dz3%pCc6tg|ijac5ccDf,');
define('NONCE_SALT',       'vcXwajC$H3;I#oCSG{QKTEwv84;C1Ok(ygnMsz8l>DeuLXb!* 9;0KkSEktX+DO;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  ='wp_';


define('WP_ALLOW_REPAIR', true); //mantiene la bbdd optimizada

define('WP_POST_REVISIONS', 1); //limita el nº de revisiones en la bbdd

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] ); // para usar con varios dominios

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );// para usar con varios dominios

define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '256M');
/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
//define ('WPLANG', 'es_ES');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

