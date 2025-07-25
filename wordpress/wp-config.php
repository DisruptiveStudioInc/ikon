<?php
/**
* The base configuration for WordPress
*
* The wp-config.php creation script uses this file during the installation.
* You don't have to use the web site, you can copy this file to "wp-config.php"
* and fill in the values.
*
* This file contains the following configurations:
*
* * Database settings
* * Secret keys
* * Database table prefix
* * Localized language
* * ABSPATH
*
* @link https://wordpress.org/support/article/editing-wp-config-php/
*
* @package WordPress
*/
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'root' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
* Authentication unique keys and salts.
*
* Change these to different unique phrases! You can generate these using
* the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
*
* You can change these at any point in time to invalidate all existing cookies.
* This will force all users to have to log in again.
*
* @since 2.6.0
*/
define( 'AUTH_KEY',          '3t6A{$yV9 S SF!zN=j/gBnPbWnaq&u@J|06B=vl|uRKTAe}`VjL0* 3X`{o7`(Y' );
define( 'SECURE_AUTH_KEY',   'I%%s;AEY_sr)C5ETAd)U9-xtOp9eiqjIRdEr!agY96|2h?a_eu]LfZUhsa]_..eJ' );
define( 'LOGGED_IN_KEY',     'uy8(LQEDqgltnFIox6b)N2/U[WMyg3nF|G)f,O|B@,x[*TYHe:)c4.fP[P`73^Iy' );
define( 'NONCE_KEY',         'M!^93]yF[R:LvynwoHO;.}P2hv7T-3:/$Lg(;DnT-E_FO12~OpBFuu(_rJja4wrB' );
define( 'AUTH_SALT',         'TvcD,mS0;lCWqpMg5X}zR~L7v N=bY% smk(, FqcREKb,r+QqVH9@e;tS0-!3lT' );
define( 'SECURE_AUTH_SALT',  '^9oR;~J~>EL:R`a}}?(xv8R61&4[dUgvj%/EK,9`K>Xhw`W[0pY=u4~GF];uwG1j' );
define( 'LOGGED_IN_SALT',    '.}bt6g`QF^yy#EGe^qqB.s<z@HWSi#Y)bA(Xa#wZQE/,JFB;mg}mVgCU)&+Io!VF' );
define( 'NONCE_SALT',        '<r1E:P_bK+G]`Cd>iY.C6HOEu5?}^!}.i5HE4s7H<9NOq.>nbTiW@xtlE0do(9a4' );
define( 'WP_CACHE_KEY_SALT', 'bs6%H>5D,CiZ26R5U3XS@XMtGV.h/*NQO<y?E%P8$Dn$8H=AcULnO@<2@%DN@E y' );
/**#@-*/
/**
* WordPress database table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'intko_';
/* Add any custom values between this line and the "stop editing" line. */
/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*
* For information on other constants that can be used for debugging,
* visit the documentation.
*
* @link https://wordpress.org/support/article/debugging-in-wordpress/
*/
if ( ! defined( 'WP_DEBUG' ) ) {
define( 'WP_DEBUG', false );
}
define('ALLOW_UNFILTERED_UPLOADS', true);
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
