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
define('DB_NAME', 'wordpress_ej1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Kf.n?<?S>MOc*c1N}sSX_O:iG2rQ;K<3kxxlX-x[:W{N]j;AX<2L@|H>a0n<#Z|2');
define('SECURE_AUTH_KEY',  '#@nx3Lx$UX wIKE$Kv&$B|omzA^_;R)0YOnf[q^Ui%G0wsf6DzK6SAu u!@TOkt=');
define('LOGGED_IN_KEY',    '|G-c.nXeEJ Y7!%_LRYo|fzo_`k9#J5?-lg9(3#A&$29!F+E#>aOhYUT}}og2OU4');
define('NONCE_KEY',        '8;*(J?k7|lKAFF4re$_&= 4|Ttci~Ig6)bX~j;nRgm(-UdEz0v(-1oonHRg[|)8-');
define('AUTH_SALT',        '9Nj:ECzTOh<bRvO0<K~O}9f!C@/vcPi0Y?)IdzLPHygM`yMy5kp86<u4..c.Cj9*');
define('SECURE_AUTH_SALT', 'o!a!9^Meg{=h7/kXAEfe2/V:w<|JH4gf?}yFXGtPIZHL~ @gSPsU{3aGWfNr4/v)');
define('LOGGED_IN_SALT',   'Zu6;Hz.;vi(>jY?X7HC{`dR6rxy);rW:`?RknJEPD]Ka/+BAZR}Rmk1SQyDe|/$$');
define('NONCE_SALT',       'pe9s`IYQ-,s0|P4]`q*;`(|k :1bhh4~./}/#zebc6=3Lf%|cPNL$^V~azhL%lZ ');

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

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
