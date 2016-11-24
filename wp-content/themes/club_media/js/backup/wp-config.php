<?php
die("Ok");
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
define('DB_NAME', 'clubmedia');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'contenido');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '9U?xtH0ukd%(Kw!4S[');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'moob.ciu90etoysbv.sa-east-1.rds.amazonaws.com');

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
define('AUTH_KEY',         'y1CcJprl3MMaP(i:SBkxIoa~mlj|B(8+rfV_c4~h_F>c{_~? tM9/F# B^&:c!)i');
define('SECURE_AUTH_KEY',  '{``cG9+Q*_+;0m%4rJ5^*pU6-8t.w+b`N$5CeMh*Fy-1rL#/i8,Yt(UI:qo)MBq9');
define('LOGGED_IN_KEY',    'uYkh2oi0FYu?HuwuwEn*/gt}%bC|vx+!>.,=T`!rqZ~a0nhF0lZDuRm~IfU-Sx|r');
define('NONCE_KEY',        'j+/9:`BS|U/6(d?[;hApmp(g]x_<2p Q8YVI>V)V63((jc/Z}+Tov1$A]Q_qTL!O');
define('AUTH_SALT',        ',4-+gV>|%>SB&fTI]AP,+f~JW=z4D-cu)<)-x;F%%2EVDRlM.Y-A6gkL?WYL&/hV');
define('SECURE_AUTH_SALT', 'F%d]%2t&JZb+yxf-Pq-eEmUC*=kM~^+`{CbEXto[hiR|5MOB>kbRFek^mY,{7g*q');
define('LOGGED_IN_SALT',   'DJn|#)<[rA|Z<R*&00oXCi4SEh#`Uyb2V!MuFL`W9F2< @x+<mxF{}f|n/m9zF-n');
define('NONCE_SALT',       'ru-bp*|%a?Bdc:v0E/gTDpmk4+7-4),/CIXjw^piK+k1!5>.A&=_8lJ+/_o,+d)%');

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
