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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'rootpass' );

/** Database hostname */
define( 'DB_HOST', 'mariadb' );

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
define('FS_METHOD', 'direct');
define( 'AUTH_KEY',          '5vU*_})BvY< -=[9!=/d^.[szBFm7<@mG<(9W%#yf`75+Ad7r?J-).Y$}*giY|L6' );
define( 'SECURE_AUTH_KEY',   '`+$0//H}JUpsSon<QR6+YE{bA6~j118Su,-b%xGf%K0,Vn2pv)KD3jDE5a`mJ0^3' );
define( 'LOGGED_IN_KEY',     'Ko(?kW$mxNU1cGe#qMIn^||uoO+k=,C7k^kcP$}{34b-Nbc07SJI1f=Rkz6vRz:)' );
define( 'NONCE_KEY',         '/m+r^s =C-)9Z}fpdA`a&m@^oKE]?El{,m>V_F7+L.{f#hIT|NKz=`IQ4{g)OaYL' );
define( 'AUTH_SALT',         'HDGRS,JafJ=%t)&5;;TjLH)h^VpZmN(j]$F*)pE&hSmt~5#Jv8C-B&2K_M&lj+/*' );
define( 'SECURE_AUTH_SALT',  'kQwdiZo][@j4mAbug>,WL#X:pO-Ul=_,8@zf](=?!!K&U6jgHgPfYiOP~#pyq-L/' );
define( 'LOGGED_IN_SALT',    ' Ba%~-[[({]416y)aDe<F6ayidSMH}ADXuzT9g%op^q]$cemf1bAG&pmA uE}qG3' );
define( 'NONCE_SALT',        'xleD ;B@9&:g7}.tYRgF&Q{nw)1.hcqAB_nH^HmvjT9z}yeXvd3(XNX[]R}p:7,K' );
define( 'WP_CACHE_KEY_SALT', 'U}-PGhobIr#zUNd<+EXRq&?B9FBa,$}M{+l:<R!Ls(|C|4$.!j*Xn:YX_FRMkknK' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
