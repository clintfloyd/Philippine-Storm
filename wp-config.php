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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'c,{Y&yvAeL0}JlQPcAC]LqW8yRTvwRnmnYY,Q7eV/^)E_Lfo@`KOsPpzR0,S`l4~');
define('SECURE_AUTH_KEY',  's&|Pq[RtI(4`(,QLs`ItKq.db AbUParrXibkf0))9@P!Of?Q#L$FR/N9^CQAQnB');
define('LOGGED_IN_KEY',    '`1JKE],xx9sx(X/zdb$JgO%)iPRn8?60R|U[E#}EYO<yq]H*=L8;$mVd#DCt0cX/');
define('NONCE_KEY',        '|?XIgC wTno!jq|Q)x{%/y#E !nr_;gi3Lq0}UiFD!?(/2cf9S-65-||:M[AO^2f');
define('AUTH_SALT',        'p<#qP=`=LJ|{i`[k- $@rl n[b,sQ9y.{@RnM.e!u-.6[6@ru.KTs6#z.Fo V&rW');
define('SECURE_AUTH_SALT', ';y{6YS!XOpu&:at#TX_`?!5i2ZsLapw/FB1kTAS]+Lq;mr{1i.)+UME8.%:B&s`;');
define('LOGGED_IN_SALT',   'Ux(z:07r%v@c.#WH:zk3uI9`L $gdoXOk=?r{26dPsLtGaMWzHZ2k;oBFi E@)Q/');
define('NONCE_SALT',       'N%>Qi5Ih_QrOZs!pCjH9&E$_(5eVJ4DoSbd!P_F+Mo2uuoh_xrT;%Y{[1qCiv;/2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_stormy_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
