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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'migodesignpet' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '[pCBD0e*6|%F3hRw1<v%e>9n:`m)-pbwE@2s[em~].ao;OZ5:!B`|}!?Xo&=omNQ' );
define( 'SECURE_AUTH_KEY',  'bFed-joD,z~Iz >cYU~ChK6zrFb+$N^m:[C{]0`BTip8u{HoBaUDE}nsj;Q8. LR' );
define( 'LOGGED_IN_KEY',    '!zWM>r64_6iv;Iip.4{#yC;@t)*+%2ZnL)?Q<gz8C8-$KM{a&SGi:;*}gL em/7s' );
define( 'NONCE_KEY',        '?ZQrg10Pi%0Dn{s^<VP4Ne8q=3YzBpPkuLyx^~raXVg^rIDfqDV$X}UC3zIdyFsf' );
define( 'AUTH_SALT',        'e}b^gM$%g~D^CaRu.!=<t1$)g=nE38B?wf*>b|0I5S|EQCz_xctXT~-WO-u<C:^b' );
define( 'SECURE_AUTH_SALT', 'Y)[U!:ZZG88Yb+_(053[=><sGK#XxDf>J*}?Xer(mxVpcLXyW>l^A(,3#r`@aJ! ' );
define( 'LOGGED_IN_SALT',   '*2@,EHp|<%Y6q&B8oIK~nH*qVZ<zT.2%FTkLcBJ34P.1%}726?z|$JFS&1ze^L(.' );
define( 'NONCE_SALT',       'bwbY*Xz+GKEGL=PYZ4*nCOSB*pgZ2TJixf99Jo5vCUGYzIt,N7;_OE!0;a<#{:o~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
